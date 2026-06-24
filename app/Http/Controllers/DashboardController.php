<?php

namespace App\Http\Controllers;

use App\Models\TipeLayanan;
use App\Models\Bengkel;
use App\Models\User;
use App\Models\Promo;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 1. Menghitung total data untuk ditampilkan di Card atas
        $totalLayanan = TipeLayanan::count();
        $totalBengkel = Bengkel::count();
        $totalUser = User::count();
        $totalPromo = Promo::count();

        // 2. Mengambil 5 data terbaru untuk ditampilkan di Tabel
        $bengkelTerbaru = Bengkel::with('tipeLayanan')->latest()->limit(5)->get();
        $promoTerbaru = Promo::with('bengkel')->latest()->limit(5)->get();

        // 3. Mengirim semua variabel ke view dashboard
        return view('dashboard', compact(
            'totalLayanan', 
            'totalBengkel', 
            'totalUser', 
            'totalPromo',
            'bengkelTerbaru',
            'promoTerbaru'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
