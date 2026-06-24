@extends('layouts.master')
@section('title', 'Detail Pengguna')

@section('content')
<div class="page-heading">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Rincian Pengguna</h3>
        <div>
            <a href="{{ route('user.index') }}" class="btn btn-secondary btn-sm"><i class="bi bi-arrow-left"></i> Kembali</a>
            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Edit</a>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <div class="d-flex align-items-center mb-4">
                <div class="bg-primary rounded d-flex align-items-center justify-content-center me-3" style="width: 60px; height: 60px;">
                    <i class="bi bi-person fs-2 text-white"></i>
                </div>
                <div>
                    <h4 class="fw-bold mb-1">{{ $user->name }}</h4>
                    <span class="badge bg-light-primary text-primary text-uppercase">{{ $user->role }}</span>
                </div>
            </div>

            <table class="table table-borderless mt-3">
                <tr>
                    <td width="25%" class="text-muted fw-bold text-uppercase" style="font-size: 0.8rem;">Email Terdaftar</td>
                    <td class="fw-bold">{{ $user->email }}</td>
                </tr>
                <tr>
                    <td class="text-muted fw-bold text-uppercase align-top" style="font-size: 0.8rem;">Penempatan Cabang</td>
                    <td><i class="bi bi-shop text-primary me-1"></i> {{ $user->bengkel->namabengkel ?? 'Cabang Dihapus' }}</td>
                </tr>
                <tr>
                    <td class="text-muted fw-bold text-uppercase" style="font-size: 0.8rem;">Bergabung Sejak</td>
                    <td>{{ $user->created_at ? $user->created_at->format('d F Y') : '-' }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection