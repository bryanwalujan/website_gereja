<?php

namespace App\Http\Controllers;

use App\Models\Church;
use App\Models\Workshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PublicDashboardController extends Controller
{
    public function index(Request $request)
    {
        // Log untuk debugging
        Log::info('Accessing dashboard', [
            'url' => $request->fullUrl(),
            'region' => $request->region,
            'search' => $request->search,
            'method' => $request->method(),
            'churches_count' => Church::count(),
        ]);

        $query = Church::query();

        // Pemetaan parameter URL ke nilai region di database
        $regionMap = [
            'sumatera-kalimantan' => 'Sumatra dan Kalimantan',
            'jawa' => 'Jawa',
            'sulawesi-papua' => 'Sulawesi dan Papua',
        ];

        // Filter berdasarkan region
        if ($request->has('region') && array_key_exists($request->region, $regionMap)) {
            $query->where('region', $regionMap[$request->region]);
        }

        // Filter berdasarkan pencarian
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('pastor_name', 'like', "%{$search}%")
                  ->orWhere('address', 'like', "%{$search}%");
            });
        }

        $churches = $query->get();
        $workshops = Workshop::with('church')->get();

        return view('dashboard', compact('churches', 'workshops'));
    }

    public function showChurch($id)
    {
        $church = Church::findOrFail($id);
        return view('church_detail', compact('church'));
    }

    // Opsional: Jika route workshop diperlukan
//     public function showWorkshop($id)
//     {
//         $workshop = Workshop::findOrFail($id);
//         return view('workshop_detail', compact('workshop'));
//     }
}