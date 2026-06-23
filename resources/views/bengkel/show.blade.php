@extends('layouts.master')
@section('title', 'Detail Bengkel')

@section('content')
<div class="page-heading">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Rincian Cabang Bengkel</h3>
        <div>
            <a href="{{ route('bengkel.index') }}" class="btn btn-secondary btn-sm"><i class="bi bi-arrow-left"></i> Kembali</a>
            <a href="{{ route('bengkel.edit', $bengkel->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Edit</a>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <div class="d-flex align-items-center mb-4">
                <div class="bg-primary rounded d-flex align-items-center justify-content-center me-3" style="width: 60px; height: 60px;">
                    <i class="bi bi-shop fs-2 text-white"></i>
                </div>
                <div>
                    <h4 class="fw-bold mb-1">{{ $bengkel->namabengkel }}</h4>
                    <span class="text-muted">Bengkel ID: #{{ str_pad($bengkel->id, 4, '0', STR_PAD_LEFT) }}</span>
                </div>
            </div>

            <table class="table table-borderless mt-3">
                <tr>
                    <td width="25%" class="text-muted fw-bold text-uppercase" style="font-size: 0.8rem;">Tipe Layanan</td>
                    <td><span class="badge bg-primary px-3 py-2">{{ $bengkel->tipeLayanan->tipe ?? 'Tipe Dihapus' }}</span></td>
                </tr>
                <tr>
                    <td class="text-muted fw-bold text-uppercase" style="font-size: 0.8rem;">Tanggal Registrasi</td>
                    <td>{{ $bengkel->created_at ? $bengkel->created_at->format('d F Y') : '-' }}</td>
                </tr>
                <tr>
                    <td class="text-muted fw-bold text-uppercase align-top" style="font-size: 0.8rem;">Alamat Lengkap</td>
                    <td><i class="bi bi-geo-alt-fill text-danger me-1"></i> {{ $bengkel->alamat }}</td>
                </tr>
                <tr>
                    <td class="text-muted fw-bold text-uppercase align-top" style="font-size: 0.8rem;">Deskripsi / Fasilitas</td>
                    <td>{{ $bengkel->deskripsi ?? 'Tidak ada keterangan fasilitas tambahan.' }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection