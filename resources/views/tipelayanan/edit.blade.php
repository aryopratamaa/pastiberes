@extends('layouts.master')
@section('title', 'Edit Tipe Layanan')

@section('content')
<div class="page-heading">
    <h3>Edit Tipe Layanan</h3>
    <p class="text-subtitle text-muted">Perbarui informasi detail layanan bengkel di bawah ini.</p>
</div>

<div class="page-content">
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('tipelayanan.update', $tipelayanan->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                @include('tipelayanan._form')

                <div class="d-flex justify-content-end mt-4 pt-3 border-top">
                    <a href="{{ route('tipelayanan.index') }}" class="btn btn-light-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-warning"><i class="bi bi-save"></i> Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection