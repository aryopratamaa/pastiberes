<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label fw-bold">Nama Lengkap <span class="text-danger">*</span></label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-person"></i></span>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $user->name ?? '') }}" placeholder="Contoh: Budi Santoso" required>
        </div>
        @error('name')
            <small class="text-danger mt-1">{{ $message }}</small>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label fw-bold">Alamat Email <span class="text-danger">*</span></label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email', $user->email ?? '') }}" placeholder="Contoh: budi@pastiberes.com" required>
        </div>
        @error('email')
            <small class="text-danger mt-1">{{ $message }}</small>
        @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label fw-bold">Password Akun @if (!isset($user))
                <span class="text-danger">*</span>
            @endif
        </label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-lock"></i></span>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                placeholder="Minimal 6 karakter" {{ isset($user) ? '' : 'required' }}>
        </div>
        @if (isset($user))
            <small class="text-muted"><i class="bi bi-info-circle"></i> Biarkan kosong jika tidak ingin mengubah
                password.</small>
        @endif
        @error('password')
            <br><small class="text-danger mt-1">{{ $message }}</small>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label fw-bold">Hak Akses (Role) <span class="text-danger">*</span></label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-shield-check"></i></span>
            <select name="role" class="form-select @error('role') is-invalid @enderror" required>
                <option value="">-- Pilih Hak Akses --</option>
                <option value="admin" {{ old('role', $user->role ?? '') == 'admin' ? 'selected' : '' }}>Admin (Pusat)
                </option>
                <option value="manager" {{ old('role', $user->role ?? '') == 'manager' ? 'selected' : '' }}>Manager
                    (Cabang)</option>
                <option value="mekanik" {{ old('role', $user->role ?? '') == 'mekanik' ? 'selected' : '' }}>Mekanik
                </option>
            </select>
        </div>
        @error('role')
            <small class="text-danger mt-1">{{ $message }}</small>
        @enderror
    </div>
</div>

<div class="form-group mb-4">
    <label class="form-label fw-bold">Penempatan Cabang Bengkel <span class="text-danger">*</span></label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-shop"></i></span>
        <select name="BengkelsID" class="form-select @error('BengkelsID') is-invalid @enderror" required>
    <option value="">-- Pilih Cabang Bengkel --</option>
    @foreach($bengkels as $b)
        <option value="{{ $b->id }}" {{ old('bengkelsID', $user->BengkelsID ?? $user->bengkelsID ?? '') == $b->id ? 'selected' : '' }}>
            {{ $b->namabengkel }}
        </option>
    @endforeach
</select>
    </div>
    @error('bengkelsID')
        <small class="text-danger mt-1">{{ $message }}</small>
    @enderror
</div>
