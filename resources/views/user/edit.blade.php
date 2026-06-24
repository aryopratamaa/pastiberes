@extends('layouts.master')
@section('title', 'Edit Pengguna')

@section('content')
<div class="page-heading">
    <h3>Edit Akun Pengguna</h3>
    <p class="text-subtitle text-muted">Perbarui informasi profil dan hak akses pengguna.</p>
</div>

<div class="page-content">
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('user.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                @include('user._form')

                <div class="d-flex justify-content-end mt-4 pt-3 border-top">
                    <a href="{{ route('user.index') }}" class="btn btn-light-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-warning"><i class="bi bi-save"></i> Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection