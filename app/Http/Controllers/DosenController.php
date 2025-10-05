<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $q = $request->query('q');
        $items = Dosen::query()
            ->when($q, function ($query) use ($q) {
                $query->where(function ($sub) use ($q) {
                    $sub->where('nama', 'like', "%{$q}%")
                        ->orWhere('email', 'like', "%{$q}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();
        return view('dosens.index', compact('items', 'q'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dosens.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|unique:dosens,email',
        ]);

        Dosen::create($data);
        return redirect()->route('dosens.index')->with('success', 'Dosen berhasil ditambahkan.');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dosen $dosen)
    {
        return view('dosens.edit', compact('dosen'));
    }   
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dosen $dosen)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|unique:dosens,email,' . $dosen->id,
        ]);
        $dosen->update($data);
        return redirect()->route('dosens.index')->with('success', 'Dosen berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dosen $dosen)
    {
        $dosen->delete();
        return back()->with('ok','Dosen berhasil dihapus.');
    }
}
