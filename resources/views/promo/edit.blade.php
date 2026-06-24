@extends('layouts.master')
@section('title', 'Edit Promo')

@section('content')
<div class="page-heading">
    <h3>Edit Promo Servis</h3>
</div>

<div class="page-content">
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('promo.update', $promo->id) }}" method="POST">
                @csrf
                @method('PUT')
                @include('promo._form')
                <div class="d-flex justify-content-end mt-4 pt-3 border-top">
                    <a href="{{ route('promo.index') }}" class="btn btn-light-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-warning"><i class="bi bi-save"></i> Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection