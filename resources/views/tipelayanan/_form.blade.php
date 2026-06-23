<div class="form-group mb-3">
    <label for="tipe" class="form-label fw-bold">Nama Tipe Layanan <span class="text-danger">*</span></label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-layers"></i></span>
        <input type="text" id="tipe" name="tipe" class="form-control @error('tipe') is-invalid @enderror" value="{{ old('tipe', $tipelayanan->tipe ?? '') }}" placeholder="Contoh: Servis Mesin, Cuci Salju" required>
    </div>
    @error('tipe') 
        <small class="text-danger mt-1">{{ $message }}</small> 
    @enderror
</div>

<div class="form-group mb-4">
    <label for="deskripsi" class="form-label fw-bold">Deskripsi / Keterangan</label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-info-circle"></i></span>
        <textarea id="deskripsi" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4" placeholder="Masukkan keterangan detail mengenai layanan ini...">{{ old('deskripsi', $tipelayanan->deskripsi ?? '') }}</textarea>
    </div>
    @error('deskripsi') 
        <small class="text-danger mt-1">{{ $message }}</small> 
    @enderror
</div>