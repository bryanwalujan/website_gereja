<?php

namespace App\Http\Controllers;

use App\Models\Church;
use App\Models\Workshop;
use Illuminate\Http\Request;

class PublicDashboardController extends Controller
{
    public function index()
    {
        // Ambil semua data gereja
        $churches = Church::all();
        
        // Ambil semua data workshop
        $workshops = Workshop::with('church')->get();
        
        return view('dashboard', compact('churches', 'workshops'));
    }

    public function showChurch($id)
    {
        // Ambil data gereja berdasarkan ID
        $church = Church::findOrFail($id);
        
        return view('church_detail', compact('church'));
    }
}