@extends('layouts.master')
@section('title', 'Dashboard')

@section('content')
<div class="page-heading">
    <h3>Dashboard Utama</h3>
    <p class="text-subtitle text-muted">Ringkasan data sistem manajemen bengkel PastiBeres.</p>
</div>

<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon blue mb-2">
                                        <i class="bi bi-layers text-white fs-3"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Tipe Layanan</h6>
                                    <h6 class="font-extrabold mb-0 fs-4">{{ $totalLayanan }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon green mb-2">
                                        <i class="bi bi-shop text-white fs-3"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Cabang Bengkel</h6>
                                    <h6 class="font-extrabold mb-0 fs-4">{{ $totalBengkel }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon purple mb-2">
                                        <i class="bi bi-people text-white fs-3"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Total Pengguna</h6>
                                    <h6 class="font-extrabold mb-0 fs-4">{{ $totalUser }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon red mb-2">
                                        <i class="bi bi-tags text-white fs-3"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Promo Servis</h6>
                                    <h6 class="font-extrabold mb-0 fs-4">{{ $totalPromo }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 col-xl-6">
                    <div class="card shadow-sm">
                        <div class="card-header bg-transparent border-bottom">
                            <h4 class="card-title">5 Cabang Bengkel Terbaru</h4>
                        </div>
                        <div class="card-body mt-3">
                            <div class="table-responsive">
                                <table class="table table-hover table-sm">
                                    <thead>
                                        <tr>
                                            <th>Nama Cabang</th>
                                            <th>Tipe Layanan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($bengkelTerbaru as $b)
                                        <tr>
                                            <td class="fw-bold">{{ $b->namabengkel }}</td>
                                            <td><span class="badge bg-light-success text-success">{{ $b->tipeLayanan->tipe ?? '-' }}</span></td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="2" class="text-center text-muted">Belum ada data cabang.</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-xl-6">
                    <div class="card shadow-sm">
                        <div class="card-header bg-transparent border-bottom">
                            <h4 class="card-title">5 Promo Terbaru</h4>
                        </div>
                        <div class="card-body mt-3">
                            <div class="table-responsive">
                                <table class="table table-hover table-sm">
                                    <thead>
                                        <tr>
                                            <th>Cabang</th>
                                            <th>Diskon</th>
                                            <th>Mulai Berlaku</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($promoTerbaru as $p)
                                        <tr>
                                            <td class="fw-bold">{{ $p->bengkel->namabengkel ?? '-' }}</td>
                                            <td><span class="badge bg-danger">{{ $p->persen }}%</span></td>
                                            <td>{{ \Carbon\Carbon::parse($p->mulai_tgl)->format('d M Y') }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3" class="text-center text-muted">Belum ada data promo.</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
@endsection