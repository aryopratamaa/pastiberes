<div class="row">
    <div class="col-md-6 mb-3">
        <label for="namabengkel" class="form-label fw-bold">Nama Cabang Bengkel <span class="text-danger">*</span></label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-shop"></i></span>
            <input type="text" id="namabengkel" name="namabengkel" class="form-control @error('namabengkel') is-invalid @enderror" value="{{ old('namabengkel', $bengkel->namabengkel ?? '') }}" placeholder="Contoh: PastiBeres Sudirman" required>
        </div>
        @error('namabengkel') <small class="text-danger mt-1">{{ $message }}</small> @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label for="tipeID" class="form-label fw-bold">Tipe Layanan <span class="text-danger">*</span></label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-layers"></i></span>
            <select id="tipeID" name="tipeID" class="form-select @error('tipeID') is-invalid @enderror" required>
                <option value="">-- Pilih Tipe Layanan --</option>
                @foreach($tipelayanans as $tl)
                    <option value="{{ $tl->id }}" {{ old('tipeID', $bengkel->tipeID ?? '') == $tl->id ? 'selected' : '' }}>
                        {{ $tl->tipe }}
                    </option>
                @endforeach
            </select>
        </div>
        @error('tipeID') <small class="text-danger mt-1">{{ $message }}</small> @enderror
    </div>
</div>

<div class="form-group mb-3">
    <label for="alamat" class="form-label fw-bold">Alamat Lengkap <span class="text-danger">*</span></label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
        <input type="text" id="alamat" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat', $bengkel->alamat ?? '') }}" placeholder="Contoh: Jl. Merdeka No. 12" required>
    </div>
    @error('alamat') <small class="text-danger mt-1">{{ $message }}</small> @enderror
</div>

<div class="form-group mb-4">
    <label for="deskripsi" class="form-label fw-bold">Deskripsi / Fasilitas Cabang</label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-info-circle"></i></span>
        <textarea id="deskripsi" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4" placeholder="Fasilitas ruang tunggu, kapasitas servis, dll...">{{ old('deskripsi', $bengkel->deskripsi ?? '') }}</textarea>
    </div>
    @error('deskripsi') <small class="text-danger mt-1">{{ $message }}</small> @enderror
</div>