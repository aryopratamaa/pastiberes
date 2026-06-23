@extends('layouts.master')
@section('title', 'Tambah Tipe Layanan')

@section('content')
<div class="page-heading">
    <h3>Tambah Tipe Layanan Baru</h3>
    <p class="text-subtitle text-muted">Silakan masukkan detail tipe layanan bengkel di bawah ini.</p>
</div>

<div class="page-content">
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('tipelayanan.store') }}" method="POST">
                @csrf
                
                @include('tipelayanan._form')

                <div class="d-flex justify-content-end mt-4 pt-3 border-top">
                    <a href="{{ route('tipelayanan.index') }}" class="btn btn-light-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection