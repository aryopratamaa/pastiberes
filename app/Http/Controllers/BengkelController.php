<?php

namespace App\Http\Controllers;

use App\Models\Bengkel;
use App\Models\TipeLayanan;
use Illuminate\Http\Request;

class BengkelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Gunakan with() untuk menarik relasi agar load website lebih cepat
        $bengkels = Bengkel::with('tipeLayanan')->latest()->paginate(5);
        return view('bengkel.index', compact('bengkels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Tarik data Tipe Layanan untuk mengisi Dropdown
        $tipelayanans = TipeLayanan::all();
        return view('bengkel.create', compact('tipelayanans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'namabengkel' => 'required|string|max:255|unique:bengkels,namabengkel',
            'tipeID' => 'required|exists:tipe_layanans,id',
            'alamat' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        Bengkel::create($validated);
        return redirect()->route('bengkel.index')->with('success', 'Cabang Bengkel berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bengkel $bengkel)
    {
        return view('bengkel.show', compact('bengkel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bengkel $bengkel)
    {
        $tipelayanans = TipeLayanan::all();
        return view('bengkel.edit', compact('bengkel', 'tipelayanans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bengkel $bengkel)
    {
        $validated = $request->validate([
            // Abaikan ID yang sedang diedit agar tidak bentrok dengan aturan unique
            'namabengkel' => 'required|string|max:255|unique:bengkels,namabengkel,' . $bengkel->id,
            'tipeID' => 'required|exists:tipe_layanans,id',
            'alamat' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $bengkel->update($validated);
        return redirect()->route('bengkel.index')->with('success', 'Cabang Bengkel berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bengkel $bengkel)
    {
        $bengkel->delete();
        return redirect()->route('bengkel.index')->with('success', 'Cabang Bengkel berhasil dihapus!');
    }
}
