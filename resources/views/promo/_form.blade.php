<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label fw-bold">Penempatan Cabang Bengkel <span class="text-danger">*</span></label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-shop"></i></span>
            <select name="bengkelID" class="form-select @error('bengkelID') is-invalid @enderror" required>
                <option value="">-- Pilih Cabang Bengkel --</option>
                @foreach($bengkels as $b)
                    <option value="{{ $b->id }}" {{ old('bengkelID', $promo->bengkelID ?? '') == $b->id ? 'selected' : '' }}>
                        {{ $b->namabengkel }}
                    </option>
                @endforeach
            </select>
        </div>
        @error('bengkelID') <small class="text-danger mt-1">{{ $message }}</small> @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label fw-bold">Potongan Diskon (%) <span class="text-danger">*</span></label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-percent"></i></span>
            <input type="number" name="persen" class="form-control @error('persen') is-invalid @enderror" value="{{ old('persen', $promo->persen ?? '') }}" placeholder="Contoh: 10" min="1" max="100" required>
        </div>
        @error('persen') <small class="text-danger mt-1">{{ $message }}</small> @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label fw-bold">Tanggal Mulai <span class="text-danger">*</span></label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-calendar-event"></i></span>
            <input type="date" name="mulai_tgl" class="form-control @error('mulai_tgl') is-invalid @enderror" value="{{ old('mulai_tgl', $promo->mulai_tgl ?? '') }}" required>
        </div>
        @error('mulai_tgl') <small class="text-danger mt-1">{{ $message }}</small> @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label fw-bold">Tanggal Berakhir <span class="text-danger">*</span></label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-calendar-x"></i></span>
            <input type="date" name="hingga_tgl" class="form-control @error('hingga_tgl') is-invalid @enderror" value="{{ old('hingga_tgl', $promo->hingga_tgl ?? '') }}" required>
        </div>
        @error('hingga_tgl') <small class="text-danger mt-1">{{ $message }}</small> @enderror
    </div>
</div>