@extends('layouts.master')
@section('title', 'Data Promo')

@section('content')
<div class="page-heading">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Kelola Promo Servis</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first text-end">
            <a href="{{ route('promo.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Tambah Promo
            </a>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="card shadow-sm">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible show fade">
                    <i class="bi bi-check-circle"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th width="5%" class="text-center">No</th>
                            <th width="25%">Cabang Bengkel</th>
                            <th width="15%" class="text-center">Diskon</th>
                            <th width="35%">Periode Berlaku</th>
                            <th width="20%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($promos as $index => $p)
                        <tr>
                            <td class="text-center">{{ $promos->firstItem() + $index }}</td>
                            <td class="fw-bold text-dark">{{ $p->bengkel->namabengkel ?? '-' }}</td>
                            <td class="text-center"><span class="badge bg-danger">{{ $p->persen }} %</span></td>
                            <td>
                                {{ \Carbon\Carbon::parse($p->mulai_tgl)->format('d M Y') }} 
                                <span class="text-muted mx-1">s/d</span> 
                                {{ \Carbon\Carbon::parse($p->hingga_tgl)->format('d M Y') }}
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-1">
                                    <a href="{{ route('promo.show', $p->id) }}" class="btn btn-sm btn-info text-white" title="Detail"><i class="bi bi-eye"></i></a>
                                    <a href="{{ route('promo.edit', $p->id) }}" class="btn btn-sm btn-warning" title="Edit"><i class="bi bi-pencil-square"></i></a>
                                    <form action="{{ route('promo.destroy', $p->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus promo ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Hapus"><i class="bi bi-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">Belum ada data promo saat ini.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($promos->hasPages())
            <div class="mt-4 d-flex justify-content-end">
                {{ $promos->links('pagination::bootstrap-5') }}
            </div>
            @endif

        </div>
    </div>
</div>
@endsection