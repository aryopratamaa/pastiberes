@extends('layouts.master')
@section('title', 'Data Pengguna')

@section('content')
<div class="page-heading">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Kelola Hak Akses Pengguna</h3>
            <p class="text-subtitle text-muted">Daftar akun staf dan mekanik aplikasi PastiBeres.</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first text-end">
            <a href="{{ route('user.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Tambah Pengguna
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
                            <th width="25%">Nama Lengkap</th>
                            <th width="20%">Email</th>
                            <th width="15%" class="text-center">Role</th>
                            <th width="20%">Penempatan</th>
                            <th width="15%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $index => $u)
                        <tr>
                            <td class="text-center">{{ $users->firstItem() + $index }}</td>
                            <td class="fw-bold text-dark">{{ $u->name }}</td>
                            <td>{{ $u->email }}</td>
                            <td class="text-center">
                                @if($u->role == 'admin')
                                    <span class="badge bg-danger">Admin</span>
                                @elseif($u->role == 'manager')
                                    <span class="badge bg-warning">Manager</span>
                                @else
                                    <span class="badge bg-primary">Mekanik</span>
                                @endif
                            </td>
                            <td>{{ $u->bengkel->namabengkel ?? '-' }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-1">
                                    <a href="{{ route('user.show', $u->id) }}" class="btn btn-sm btn-info text-white" title="Detail">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('user.edit', $u->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    
                                    <form action="{{ route('user.destroy', $u->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus akun ini?')">
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
                            <td colspan="6" class="text-center text-muted py-4">Belum ada data pengguna.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($users->hasPages())
            <div class="mt-4 d-flex justify-content-end">
                {{ $users->links('pagination::bootstrap-5') }}
            </div>
            @endif

        </div>
    </div>
</div>
@endsection