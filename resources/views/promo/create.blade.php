@extends('layouts.master')
@section('title', 'Tambah Promo')

@section('content')
<div class="page-heading">
    <h3>Buat Promo Baru</h3>
</div>

<div class="page-content">
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('promo.store') }}" method="POST">
                @csrf
                @include('promo._form')
                <div class="d-flex justify-content-end mt-4 pt-3 border-top">
                    <a href="{{ route('promo.index') }}" class="btn btn-light-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan Promo</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection