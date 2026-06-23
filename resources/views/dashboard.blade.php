@extends('layouts.master')
@section('title', 'Dashboard')

@section('content')
<div class="page-heading">
    <h3>Dashboard Utama</h3>
    <p class="text-subtitle text-muted">Selamat datang di sistem manajemen bengkel terpadu.</p>
</div>

<div class="page-content">
    <section class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body p-5">
                    <h2 class="fw-bolder text-primary mb-3">
                        Solusi Cepat, Kendaraan Sehat, Hati Tenang.
                    </h2>
                    <p class="text-dark fs-6 mb-4" style="line-height: 1.8;">
                        <strong>PastiBeres!</strong> adalah platform manajemen bengkel terpadu untuk mempermudah reservasi, melacak riwayat servis, dan menikmati promo terbaik dari jaringan bengkel mitra kami.
                    </p>
                    
                    <h6 class="fw-bold text-muted text-uppercase mb-3">Kenapa memilih PastiBeres!?</h6>
                    <div class="d-flex flex-wrap gap-2">
                        <span class="badge bg-primary px-3 py-2 rounded-pill">Mekanik Handal</span>
                        <span class="badge bg-success px-3 py-2 rounded-pill">Suku Cadang Asli</span>
                        <span class="badge bg-warning px-3 py-2 rounded-pill text-dark">Layanan Transparan</span>
                        <span class="badge bg-danger px-3 py-2 rounded-pill">Promo Menarik</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection