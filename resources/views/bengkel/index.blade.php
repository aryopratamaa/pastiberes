@extends('layouts.master')
@section('title', 'Data Cabang Bengkel')

@section('content')
<div class="page-heading">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Kelola Cabang Bengkel</h3>
            <p class="text-subtitle text-muted">Daftar lokasi cabang bengkel PastiBeres.</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first text-end">
            <a href="{{ route('bengkel.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Tambah Cabang
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
                            <th width="25%">Nama Cabang</th>
                            <th width="20%" class="text-center">Tipe Layanan</th>
                            <th width="30%">Alamat</th>
                            <th width="20%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bengkels as $index => $b)
                        <tr>
                            <td class="text-center">{{ $bengkels->firstItem() + $index }}</td>
                            <td class="fw-bold text-dark">{{ $b->namabengkel }}</td>
                            <td class="text-center">
                                <span class="badge bg-light-primary text-primary px-3 py-2">
                                    {{ $b->tipeLayanan->tipe ?? '-' }}
                                </span>
                            </td>
                            <td>{{ \Illuminate\Support\Str::limit($b->alamat, 45) }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-1">
                                    <a href="{{ route('bengkel.show', $b->id) }}" class="btn btn-sm btn-info text-white" title="Detail">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('bengkel.edit', $b->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    
                                    <form action="{{ route('bengkel.destroy', $b->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Perhatian: Menghapus cabang ini akan MENGHAPUS SEMUA User dan Promo yang terhubung ke cabang ini. Lanjutkan?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">Belum ada data cabang bengkel yang terdaftar.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($bengkels->hasPages())
            <div class="mt-4 d-flex justify-content-end">
                {{ $bengkels->links('pagination::bootstrap-5') }}
            </div>
            @endif

        </div>
    </div>
</div>
@endsection