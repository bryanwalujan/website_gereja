<?php

namespace App\Http\Controllers;

use App\Models\Workshop;
use App\Models\WorkshopRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class WorkshopController extends Controller
{
    public function index(Request $request)
    {
        $activeRegion = $request->query('region', 'Jawa');
        $validRegions = ['Kalimantan-Sumatra', 'Jawa', 'Sulawesi-Papua'];
        
        if (!in_array($activeRegion, $validRegions)) {
            $activeRegion = 'Jawa';
        }

        $workshops = Workshop::with('church')
            ->whereNotNull('start_date')
            ->whereNotNull('end_date')
            ->where('region', $activeRegion)
            ->orderBy('start_date', 'desc')
            ->take(3)
            ->get();

        $workshops->each(function ($workshop) {
            $workshop->label = $this->determineWorkshopLabel($workshop, now());
        });

        return view('workshops.index', compact('workshops', 'activeRegion', 'validRegions'));
    }

    public function show($id)
    {
        $workshop = Workshop::with('church')
            ->whereNotNull('start_date')
            ->whereNotNull('end_date')
            ->findOrFail($id);
            
        $workshop->label = $this->determineWorkshopLabel($workshop, now());

        return view('workshops.show', compact('workshop'));
    }

    public function showRegistrationForm($id)
    {
        $workshop = Workshop::with('church')
            ->whereNotNull('start_date')
            ->whereNotNull('end_date')
            ->findOrFail($id);
        
        $workshop->label = $this->determineWorkshopLabel($workshop, now());

        if ($workshop->label !== 'pendaftaran dibuka') {
            return redirect()->route('workshops.show', $id)
                ->with('error', 'Pendaftaran tidak tersedia untuk workshop ini.');
        }

        return view('workshops.daftar', compact('workshop'));
    }

    public function register(Request $request, $id)
    {
        $workshop = Workshop::findOrFail($id);

        $label = $this->determineWorkshopLabel($workshop, now());
        if ($label !== 'pendaftaran dibuka') {
            return redirect()->route('workshops.show', $id)
                ->with('error', 'Pendaftaran tidak tersedia untuk workshop ini.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
        ]);

        WorkshopRegistration::create([
            'workshop_id' => $id,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
        ]);

        $workshop->increment('participant_count');

        return redirect()->route('workshops.show', $id)
            ->with('success', 'Pendaftaran berhasil!');
    }

    public function downloadMaterial($id)
    {
        $workshop = Workshop::findOrFail($id);

        if (!$workshop->material_file) {
            return redirect()->back()->with('error', 'File materi tidak tersedia.');
        }

        $filePath = storage_path('app/public/' . $workshop->material_file);
        if (!Storage::exists('public/' . $workshop->material_file)) {
            return redirect()->back()->with('error', 'File materi tidak ditemukan.');
        }

        return response()->download($filePath);
    }

    protected function determineWorkshopLabel($workshop, Carbon $now): string
    {
        if (is_null($workshop->start_date) || is_null($workshop->end_date)) {
            return 'tidak terjadwal';
        }

        if ($now->lessThan($workshop->start_date)) {
            return $workshop->participant_count < $workshop->max_participants 
                ? 'pendaftaran dibuka' 
                : 'pendaftaran penuh';
        }

        if ($now->between($workshop->start_date, $workshop->end_date)) {
            return 'akan datang';
        }

        return 'selesai';
    }

    // Hapus atau komen fungsi ini jika tidak digunakan
    /*
    public function showRegistrationList(Request $request)
    {
        $activeRegion = $request->query('region', 'Jawa');
        $validRegions = ['Kalimantan-Sumatra', 'Jawa', 'Sulawesi-Papua'];
        
        if (!in_array($activeRegion, $validRegions)) {
            $activeRegion = 'Jawa';
        }

        $workshops = Workshop::with('church')
            ->whereNotNull('start_date')
            ->whereNotNull('end_date')
            ->where('region', $activeRegion)
            ->orderBy('start_date', 'desc')
            ->take(3)
            ->get();

        $workshops->each(function ($workshop) {
            $workshop->label = $this->determineWorkshopLabel($workshop, now());
        });

        return view('workshops.daftar', compact('workshops', 'activeRegion', 'validRegions'));
    }
    */
}