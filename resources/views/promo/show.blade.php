@extends('layouts.master')
@section('title', 'Detail Promo')

@section('content')
<div class="page-heading">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Rincian Promo</h3>
        <div>
            <a href="{{ route('promo.index') }}" class="btn btn-secondary btn-sm"><i class="bi bi-arrow-left"></i> Kembali</a>
            <a href="{{ route('promo.edit', $promo->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Edit</a>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <div class="d-flex align-items-center mb-4">
                <div class="bg-primary rounded d-flex align-items-center justify-content-center me-3" style="width: 60px; height: 60px;">
                    <i class="bi bi-tags fs-2 text-white"></i>
                </div>
                <div>
                    <h4 class="fw-bold mb-1">Promo Diskon {{ $promo->persen }}%</h4>
                    <span class="text-muted">Promo ID: #{{ str_pad($promo->id, 4, '0', STR_PAD_LEFT) }}</span>
                </div>
            </div>

            <table class="table table-borderless mt-3">
                <tr>
                    <td width="25%" class="text-muted fw-bold text-uppercase align-top" style="font-size: 0.8rem;">Cabang Penyelenggara</td>
                    <td><i class="bi bi-shop text-primary me-1"></i> {{ $promo->bengkel->namabengkel ?? 'Cabang Dihapus' }}</td>
                </tr>
                <tr>
                    <td class="text-muted fw-bold text-uppercase" style="font-size: 0.8rem;">Masa Berlaku</td>
                    <td class="fw-bold text-danger">{{ \Carbon\Carbon::parse($promo->mulai_tgl)->format('d M Y') }} - {{ \Carbon\Carbon::parse($promo->hingga_tgl)->format('d M Y') }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection