<?php

namespace App\Http\Controllers;

use App\Models\Church;
use App\Models\Workshop;
use App\Models\WorkshopRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PublicDashboardController extends Controller
{
    public function index()
    {
        $churches = Church::all();
        $workshops = Workshop::with('church')->get();
        return view('dashboard', compact('churches', 'workshops'));
    }

    public function showChurch($id)
    {
        $church = Church::findOrFail($id);
        return view('church_detail', compact('church'));
    }

    public function downloadMaterial($id)
    {
        $workshop = Workshop::findOrFail($id);
        if ($workshop->material_file) {
            return Storage::disk('public')->download($workshop->material_file);
        }
        return redirect()->back()->with('error', 'File materi tidak tersedia.');
    }

    public function registerWorkshop(Request $request, $id)
    {
        $workshop = Workshop::findOrFail($id);

        // Periksa apakah workshop masih akan datang
        $today = now()->toDateString();
        if ($workshop->start_date < $today) {
            return redirect()->back()->with('error', 'Pendaftaran hanya tersedia untuk pelatihan yang akan datang.');
        }

        // Periksa kapasitas peserta
        $currentRegistrations = WorkshopRegistration::where('workshop_id', $id)->count();
        if ($currentRegistrations >= $workshop->max_participants) {
            return redirect()->back()->with('error', 'Kuota peserta telah penuh.');
        }

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:255',
        ]);

        // Simpan pendaftaran
        WorkshopRegistration::create([
            'workshop_id' => $id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()->back()->with('success', 'Pendaftaran berhasil! Kami akan menghubungi Anda untuk konfirmasi.');
    }
}