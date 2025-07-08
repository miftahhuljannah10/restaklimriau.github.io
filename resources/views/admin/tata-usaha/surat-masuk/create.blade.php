<x-layouts.admin>
    <x-slot name="title">Tambah Surat Masuk</x-slot>

    <!-- Breadcrumb -->
    <x-main.layouts.breadcrumb :items="[
        ['title' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['title' => 'Surat Masuk', 'url' => route('admin.tata-usaha.surat-masuk.index')],
        ['title' => 'Tambah'],
    ]" />

    <!-- Main Content -->
    <x-main.cards.content-card title="Tambah Surat Masuk">
        <x-slot name="header-actions">
            <x-main.buttons.action-button href="{{ route('admin.tata-usaha.surat-masuk.index') }}" variant="secondary"
                size="sm">
                Kembali
            </x-main.buttons.action-button>
        </x-slot>

        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Errors -->
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Terjadi kesalahan:</strong>
                <ul class="mt-2 mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        <!-- Form -->
        <form action="{{ route('admin.tata-usaha.surat-masuk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="no_surat" class="form-label">Nomor Surat <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('no_surat') is-invalid @enderror" id="no_surat"
                        name="no_surat" value="{{ old('no_surat') }}" placeholder="Contoh: 123/SM/2023" required>
                    @error('no_surat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="tanggal_surat" class="form-label">Tanggal Surat <span
                            class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-calendar-alt"></i>
                        </span>
                        <input type="date" class="form-control @error('tanggal_surat') is-invalid @enderror"
                            id="tanggal_surat" name="tanggal_surat" value="{{ old('tanggal_surat') ?? date('Y-m-d') }}"
                            required>
                        @error('tanggal_surat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="perihal" class="form-label">Perihal <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('perihal') is-invalid @enderror" id="perihal"
                        name="perihal" value="{{ old('perihal') }}" placeholder="Perihal surat" required>
                    @error('perihal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="dari" class="form-label">Dari <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('dari') is-invalid @enderror" id="dari"
                        name="dari" value="{{ old('dari') }}" placeholder="Pengirim surat" required>
                    @error('dari')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="jenis" class="form-label">Jenis <span class="text-danger">*</span></label>
                    <select class="form-select @error('jenis') is-invalid @enderror" id="jenis" name="jenis"
                        required>
                        <option value="" disabled selected>-- Pilih Jenis --</option>
                        <option value="Biasa" {{ old('jenis') == 'Biasa' ? 'selected' : '' }}>Biasa</option>
                        <option value="Penting" {{ old('jenis') == 'Penting' ? 'selected' : '' }}>Penting</option>
                        <option value="Segera" {{ old('jenis') == 'Segera' ? 'selected' : '' }}>Segera</option>
                        <option value="Rahasia" {{ old('jenis') == 'Rahasia' ? 'selected' : '' }}>Rahasia</option>
                    </select>
                    @error('jenis')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="scanning" class="form-label">File Scan</label>
                    <input type="file" class="form-control @error('scanning') is-invalid @enderror" id="scanning"
                        name="scanning" accept=".pdf,.jpg,.jpeg,.png">
                    <small class="form-text text-muted">Format: PDF, JPG, JPEG, PNG. Maks: 2MB</small>
                    @error('scanning')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 mb-3">
                    <label for="catatan" class="form-label">Catatan</label>
                    <textarea class="form-control @error('catatan') is-invalid @enderror" id="catatan" name="catatan" rows="3"
                        placeholder="Catatan tambahan (opsional)">{{ old('catatan') }}</textarea>
                    @error('catatan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Form Actions -->
            <div class="d-flex justify-content-end gap-2">
                <x-main.buttons.action-button href="{{ route('admin.tata-usaha.surat-masuk.index') }}"
                    variant="secondary">
                    Batal
                </x-main.buttons.action-button>
                <x-main.buttons.submit-button variant="primary">
                    Simpan
                </x-main.buttons.submit-button>
            </div>
        </form>
    </x-main.cards.content-card>
</x-layouts.admin>
