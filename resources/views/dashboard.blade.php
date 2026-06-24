@extends('layouts.master')
@section('title', 'Dashboard Utama')

@section('content')
<div class="page-heading">
    <h3>Dashboard Utama</h3>
    <p class="text-subtitle text-muted">Ringkasan data statistik sistem PastiBeres.</p>
</div>

<div class="page-content">
    <div class="row">
        <div class="col-6 col-lg-3 col-md-6 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body px-4 py-4-5 d-flex align-items-center gap-3">
                    <div class="stats-icon blue">
                        <i class="bi bi-layers text-white fs-4"></i>
                    </div>
                    <div>
                        <h6 class="text-muted font-semibold mb-0">Tipe Layanan</h6>
                        <h4 class="font-extrabold mb-0">{{ $totalLayanan }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body px-4 py-4-5 d-flex align-items-center gap-3">
                    <div class="stats-icon green">
                        <i class="bi bi-shop text-white fs-4"></i>
                    </div>
                    <div>
                        <h6 class="text-muted font-semibold mb-0">Cabang Bengkel</h6>
                        <h4 class="font-extrabold mb-0">{{ $totalBengkel }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body px-4 py-4-5 d-flex align-items-center gap-3">
                    <div class="stats-icon purple">
                        <i class="bi bi-people text-white fs-4"></i>
                    </div>
                    <div>
                        <h6 class="text-muted font-semibold mb-0">Total Pengguna</h6>
                        <h4 class="font-extrabold mb-0">{{ $totalUser }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body px-4 py-4-5 d-flex align-items-center gap-3">
                    <div class="stats-icon red">
                        <i class="bi bi-tags text-white fs-4"></i>
                    </div>
                    <div>
                        <h6 class="text-muted font-semibold mb-0">Promo Servis</h6>
                        <h4 class="font-extrabold mb-0">{{ $totalPromo }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-3">Distribusi Cabang per Tipe Layanan</h5>
                    
                    <div style="position: relative; height: 280px; width: 100%; display: flex; justify-content: center;">
                        <canvas id="chartTipe"></canvas>
                    </div>
                    
                    <table class="table table-sm mt-4 mb-0">
                        <thead>
                            <tr>
                                <th>Tipe Layanan</th>
                                <th class="text-end">Jumlah Cabang</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($bengkelPerTipe as $tipe)
                            <tr>
                                <td>{{ $tipe->nama }}</td>
                                <td class="text-end fw-bold text-primary">{{ $tipe->total }}</td>
                            </tr>
                            @empty
                            <tr><td colspan="2" class="text-center text-muted">Belum ada data.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-3">Distribusi Pengguna Berdasarkan Role</h5>
                    
                    <div style="position: relative; height: 280px; width: 100%; display: flex; justify-content: center;">
                        <canvas id="chartRole"></canvas>
                    </div>

                    <table class="table table-sm mt-4 mb-0">
                        <thead>
                            <tr>
                                <th>Role (Hak Akses)</th>
                                <th class="text-end">Total Akun</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($userPerRole as $role => $jumlah)
                            <tr>
                                <td class="text-uppercase">{{ $role }}</td>
                                <td class="text-end fw-bold text-success">{{ $jumlah }}</td>
                            </tr>
                            @empty
                            <tr><td colspan="2" class="text-center text-muted">Belum ada data.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-3">5 Cabang Bengkel Terbaru</h5>
                    <table class="table table-sm mb-0">
                        <thead>
                            <tr>
                                <th>Nama Cabang</th>
                                <th>Tipe Layanan</th>
                                <th>Tgl Terdaftar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($bengkelTerbaru as $b)
                            <tr>
                                <td class="fw-bold">{{ $b->namabengkel }}</td>
                                <td><span class="badge bg-light-primary text-primary">{{ $b->tipeLayanan->tipe ?? '-' }}</span></td>
                                <td>{{ $b->created_at->format('d/m/Y') }}</td>
                            </tr>
                            @empty
                            <tr><td colspan="3" class="text-center text-muted">Belum ada data.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-3">5 Promo Servis Terbaru</h5>
                    <table class="table table-sm mb-0">
                        <thead>
                            <tr>
                                <th>Cabang</th>
                                <th>Diskon</th>
                                <th>Mulai Berlaku</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($promoTerbaru as $p)
                            <tr>
                                <td>{{ $p->bengkel->namabengkel ?? '-' }}</td>
                                <td><span class="badge bg-danger">{{ $p->persen }}%</span></td>
                                <td>{{ \Carbon\Carbon::parse($p->mulai_tgl)->format('d M Y') }}</td>
                            </tr>
                            @empty
                            <tr><td colspan="3" class="text-center text-muted">Belum ada data.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // 1. Render Bar Chart (Tipe Layanan)
    const tipeLabels = @json($bengkelPerTipe->pluck('nama'));
    const tipeData = @json($bengkelPerTipe->pluck('total'));

    new Chart(document.getElementById('chartTipe'), {
        type: 'bar',
        data: {
            labels: tipeLabels,
            datasets: [{
                label: 'Jumlah Cabang',
                data: tipeData,
                backgroundColor: '#435ebe', // Warna biru mazer
                borderRadius: 5
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false, // Wajib agar tidak melar
            plugins: { legend: { display: false } },
            scales: { y: { beginAtZero: true, ticks: { precision: 0 } } }
        }
    });

    // 2. Render Doughnut Chart (Role Pengguna)
    const roleLabels = @json($userPerRole->keys());
    const roleData = @json($userPerRole->values());

    new Chart(document.getElementById('chartRole'), {
        type: 'doughnut',
        data: {
            labels: roleLabels,
            datasets: [{
                data: roleData,
                backgroundColor: ['#57caeb', '#5ddab4', '#ff7976'] // Warna-warni mazer
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false, // Wajib agar tidak melar / bentuk donat bulat sempurna
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
});
</script>
@endsection