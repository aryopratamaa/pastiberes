@extends('layouts.master')
@section('title', 'Detail Tipe Layanan')

@section('content')
<div class="page-heading">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Rincian Tipe Layanan</h3>
        <div>
            <a href="{{ route('tipelayanan.index') }}" class="btn btn-secondary btn-sm"><i class="bi bi-arrow-left"></i> Kembali</a>
            <a href="{{ route('tipelayanan.edit', $tipelayanan->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Edit</a>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <div class="d-flex align-items-center mb-4">
                <div class="bg-primary rounded d-flex align-items-center justify-content-center me-3" style="width: 60px; height: 60px;">
                    <i class="bi bi-layers fs-2 text-white"></i>
                </div>
                <div>
                    <h4 class="fw-bold mb-1">{{ $tipelayanan->tipe }}</h4>
                    <span class="text-muted">Layanan ID: #{{ str_pad($tipelayanan->id, 4, '0', STR_PAD_LEFT) }}</span>
                </div>
            </div>

            <table class="table table-borderless mt-3">
                <tr>
                    <td width="20%" class="text-muted fw-bold text-uppercase" style="font-size: 0.8rem;">Tanggal Dibuat</td>
                    <td>{{ $tipelayanan->created_at ? $tipelayanan->created_at->format('d F Y') : '-' }}</td>
                </tr>
                <tr>
                    <td class="text-muted fw-bold text-uppercase align-top" style="font-size: 0.8rem;">Deskripsi Operasional</td>
                    <td>{{ $tipelayanan->deskripsi ?? 'Tidak ada deskripsi yang ditambahkan.' }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection