<?php

namespace App\Http\Controllers;

use App\Models\TipeLayanan;
use Illuminate\Http\Request;

class TipeLayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = TipeLayanan::latest()->paginate(5);
        return view('tipelayanan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipelayanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tipe' => 'required|string|max:255',
            'deskripsi' => 'nullable|string'
        ]);

        TipeLayanan::create($validated);
        return redirect()->route('tipelayanan.index')->with('success', 'Tipe Layanan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(TipeLayanan $tipelayanan)
    {
        return view('tipelayanan.show', compact('tipelayanan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipeLayanan $tipelayanan)
    {
        return view('tipelayanan.edit', compact('tipelayanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipeLayanan $tipelayanan)
    {
        $validated = $request->validate([
            'tipe' => 'required|string|max:255',
            'deskripsi' => 'nullable|string'
        ]);

        $tipelayanan->update($validated);

        return redirect()->route('tipelayanan.index')->with('success', 'Tipe Layanan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipeLayanan $tipelayanan)
    {
        $tipelayanan->delete();
        return redirect()->route('tipelayanan.index')->with('success', 'Tipe Layanan berhasil dihapus!');
    }
}
