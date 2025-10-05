<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // ambil jumlah mata kuliah per dosen
        $data = Dosen::withCount('mataKuliahs')
            ->orderByDesc('mata_kuliahs_count')
            ->get(['id', 'nama']);

        // bentuk array untuk chart
        $labels = $data->pluck('nama');
        $counts = $data->pluck('mata_kuliahs_count');

        return view('dashboard', compact('labels', 'counts'));
    }
}
