@extends('layouts.master')
@section('title', 'Data Tipe Layanan')

@section('content')
<div class="page-heading">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Kelola Tipe Layanan</h3>
            <p class="text-subtitle text-muted">Daftar jenis layanan yang tersedia.</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first text-end">
            <a href="{{ route('tipelayanan.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Tambah Layanan
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
                            <th width="30%">Tipe Layanan</th>
                            <th>Deskripsi</th>
                            <th width="25%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $index => $item)
                        <tr>
                            <td class="text-center">{{ $data->firstItem() + $index }}</td>
                            <td class="fw-bold text-dark">{{ $item->tipe }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($item->deskripsi ?? '-', 50) }}</td>
                            <td class="text-center">
                                <a href="{{ route('tipelayanan.show', $item->id) }}" class="btn btn-sm btn-info text-white">
                                    <i class="bi bi-eye"></i> Detail
                                </a>
                                <a href="{{ route('tipelayanan.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                
                                <form action="{{ route('tipelayanan.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">Belum ada data tipe layanan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($data->hasPages())
            <div class="mt-4 d-flex justify-content-end">
                {{ $data->links('pagination::bootstrap-5') }}
            </div>
            @endif

        </div>
    </div>
</div>
@endsection