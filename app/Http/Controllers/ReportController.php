<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bengkel;
use App\Models\TipeLayanan;
use App\Models\Promo;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function laporanLayanan()
    {
        $data = TipeLayanan::all();
        // Memanggil view khusus laporan dan mengirimkan data
        $pdf = Pdf::loadView('report.layanan', compact('data'));
        // stream() digunakan untuk melihat PDF di browser. Gunakan download() jika ingin langsung terunduh.
        return $pdf->stream('Laporan_Tipe_Layanan.pdf');
    }

    public function laporanBengkel()
    {
        $data = Bengkel::with('tipeLayanan')->get();
        $pdf = Pdf::loadView('report.bengkel', compact('data'));
        return $pdf->stream('Laporan_Cabang_Bengkel.pdf');
    }

    public function laporanPromo()
    {
        $data = Promo::with('bengkel')->get();
        $pdf = Pdf::loadView('report.promo', compact('data'));
        return $pdf->stream('Laporan_Promo_Servis.pdf');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
