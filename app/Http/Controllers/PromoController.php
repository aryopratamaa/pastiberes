<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use App\Models\Bengkel;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil data promo beserta relasi bengkelnya
        $promos = Promo::with('bengkel')->latest()->paginate(5);
        return view('promo.index', compact('promos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bengkels = Bengkel::all();
        return view('promo.create', compact('bengkels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'persen'     => 'required|numeric|min:1|max:100',
            'mulai_tgl'  => 'required|date',
            'hingga_tgl' => 'required|date|after_or_equal:mulai_tgl',
            'bengkelID'  => 'required|exists:bengkels,id',
        ]);

        Promo::create($validated);
        return redirect()->route('promo.index')->with('success', 'Promo Servis berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Promo $promo)
    {
        return view('promo.show', compact('promo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Promo $promo)
    {
        $bengkels = Bengkel::all();
        return view('promo.edit', compact('promo', 'bengkels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Promo $promo)
    {
        $validated = $request->validate([
            'persen'     => 'required|numeric|min:1|max:100',
            'mulai_tgl'  => 'required|date',
            'hingga_tgl' => 'required|date|after_or_equal:mulai_tgl',
            'bengkelID'  => 'required|exists:bengkels,id',
        ]);

        $promo->update($validated);
        return redirect()->route('promo.index')->with('success', 'Promo Servis berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promo $promo)
    {
        $promo->delete();
        return redirect()->route('promo.index')->with('success', 'Promo Servis berhasil dihapus!');
    }
}
