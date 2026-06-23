@extends('layouts.master')
@section('title', 'Edit Bengkel')

@section('content')
<div class="page-heading">
    <h3>Edit Cabang Bengkel</h3>
    <p class="text-subtitle text-muted">Perbarui data lokasi dan fasilitas cabang.</p>
</div>

<div class="page-content">
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('bengkel.update', $bengkel->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                @include('bengkel._form')

                <div class="d-flex justify-content-end mt-4 pt-3 border-top">
                    <a href="{{ route('bengkel.index') }}" class="btn btn-light-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-warning"><i class="bi bi-save"></i> Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection