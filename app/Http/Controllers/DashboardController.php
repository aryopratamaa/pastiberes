<?php

namespace App\Http\Controllers;

use App\Models\TipeLayanan;
use App\Models\Bengkel;
use App\Models\User;
use App\Models\Promo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 1. Total Data (Untuk 4 Kotak di atas)
        $totalLayanan = TipeLayanan::count();
        $totalBengkel = Bengkel::count();
        $totalUser = User::count();
        $totalPromo = Promo::count();

        // 2. Data Grafik 1 (Bar Chart): Menghitung jumlah cabang per tipe layanan
        $bengkelPerTipe = DB::table('bengkels')
            ->join('tipe_layanans', 'bengkels.tipeID', '=', 'tipe_layanans.id')
            ->select('tipe_layanans.tipe as nama', DB::raw('count(bengkels.id) as total'))
            ->groupBy('tipe_layanans.id', 'tipe_layanans.tipe')
            ->get();

        // 3. Data Grafik 2 (Doughnut Chart): Menghitung jumlah user per role
        $userPerRole = User::select('role')
            ->selectRaw('count(*) as total')
            ->groupBy('role')
            ->pluck('total', 'role');

        // 4. Tabel 5 Data Terbaru (Bagian bawah)
        $bengkelTerbaru = Bengkel::with('tipeLayanan')->latest()->limit(5)->get();
        $promoTerbaru = Promo::with('bengkel')->latest()->limit(5)->get();

        return view('dashboard', compact(
            'totalLayanan', 
            'totalBengkel', 
            'totalUser', 
            'totalPromo',
            'bengkelPerTipe',
            'userPerRole',
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
