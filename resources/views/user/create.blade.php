@extends('layouts.master')
@section('title', 'Tambah Pengguna')

@section('content')
<div class="page-heading">
    <h3>Tambah Pengguna Baru</h3>
    <p class="text-subtitle text-muted">Buat akun untuk karyawan yang akan mengakses sistem.</p>
</div>

<div class="page-content">
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('user.store') }}" method="POST">
                @csrf
                
                @include('user._form')

                <div class="d-flex justify-content-end mt-4 pt-3 border-top">
                    <a href="{{ route('user.index') }}" class="btn btn-light-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection