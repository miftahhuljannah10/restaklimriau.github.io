<x-layouts.admin>
    <x-slot name="title">Edit Surat Masuk</x-slot>

    <!-- Breadcrumb -->
    <x-main.layouts.breadcrumb :items="[
        ['title' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['title' => 'Surat Masuk', 'url' => route('admin.tata-usaha.surat-masuk.index')],
        ['title' => 'Edit'],
    ]" />

    <!-- Main Content -->
    <x-main.cards.content-card title="Edit Surat Masuk">
        <x-slot name="header-actions">
            <x-main.buttons.action-button href="{{ route('admin.tata-usaha.surat-masuk.show', $suratMasuk) }}"
                variant="secondary" size="sm">
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
        <form action="{{ route('admin.tata-usaha.surat-masuk.update', $suratMasuk) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <!-- Nomor Surat -->
                <div class="col-md-6 mb-3">
                    <label for="no_surat" class="form-label">Nomor Surat <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('no_surat') is-invalid @enderror" id="no_surat"
                        name="no_surat" value="{{ old('no_surat', $suratMasuk->no_surat) }}" required>
                    @error('no_surat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tanggal Surat -->
                <div class="col-md-6 mb-3">
                    <label for="tanggal_surat" class="form-label">Tanggal Surat <span
                            class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-calendar-alt"></i>
                        </span>
                        <input type="date" class="form-control @error('tanggal_surat') is-invalid @enderror"
                            id="tanggal_surat" name="tanggal_surat"
                            value="{{ old('tanggal_surat', $suratMasuk->tanggal_surat) }}" required>
                        @error('tanggal_surat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Perihal -->
                <div class="col-md-6 mb-3">
                    <label for="perihal" class="form-label">Perihal <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('perihal') is-invalid @enderror" id="perihal"
                        name="perihal" value="{{ old('perihal', $suratMasuk->perihal) }}" required>
                    @error('perihal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Dari -->
                <div class="col-md-6 mb-3">
                    <label for="dari" class="form-label">Dari <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('dari') is-invalid @enderror" id="dari"
                        name="dari" value="{{ old('dari', $suratMasuk->dari) }}" required>
                    @error('dari')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Jenis -->
                <div class="col-md-6 mb-3">
                    <label for="jenis" class="form-label">Jenis <span class="text-danger">*</span></label>
                    <select class="form-select @error('jenis') is-invalid @enderror" id="jenis" name="jenis"
                        required>
                        <option value="" disabled>-- Pilih Jenis --</option>
                        <option value="Biasa" {{ old('jenis', $suratMasuk->jenis) == 'Biasa' ? 'selected' : '' }}>
                            Biasa</option>
                        <option value="Penting" {{ old('jenis', $suratMasuk->jenis) == 'Penting' ? 'selected' : '' }}>
                            Penting</option>
                        <option value="Segera" {{ old('jenis', $suratMasuk->jenis) == 'Segera' ? 'selected' : '' }}>
                            Segera</option>
                        <option value="Rahasia" {{ old('jenis', $suratMasuk->jenis) == 'Rahasia' ? 'selected' : '' }}>
                            Rahasia</option>
                    </select>
                    @error('jenis')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- File Scanning -->
                <div class="col-md-6 mb-3">
                    <label for="scanning" class="form-label">File Scan</label>
                    @if ($suratMasuk->scanning)
                        <div class="mb-2 p-3 bg-light rounded">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-file-pdf text-primary me-2"></i>
                                    <span class="text-muted">File saat ini: {{ $suratMasuk->scanning }}</span>
                                </div>
                                <a href="{{ route('admin.tata-usaha.surat-masuk.download', $suratMasuk) }}"
                                    class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-download me-1"></i> Download
                                </a>
                            </div>
                        </div>
                    @endif
                    <input type="file" class="form-control @error('scanning') is-invalid @enderror" id="scanning"
                        name="scanning" accept=".pdf,.jpg,.jpeg,.png">
                    <small class="form-text text-muted">
                        Format: PDF, JPG, JPEG, PNG. Maks: 2MB
                        @if ($suratMasuk->scanning)
                            <br><span class="text-warning">Kosongkan jika tidak ingin mengubah file</span>
                        @endif
                    </small>
                    @error('scanning')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Catatan -->
                <div class="col-12 mb-3">
                    <label for="catatan" class="form-label">Catatan</label>
                    <textarea class="form-control @error('catatan') is-invalid @enderror" id="catatan" name="catatan" rows="3"
                        placeholder="Catatan tambahan (opsional)">{{ old('catatan', $suratMasuk->catatan) }}</textarea>
                    @error('catatan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Form Actions -->
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-muted small">
                    <i class="fas fa-clock me-1"></i>
                    Terakhir diupdate: {{ $suratMasuk->updated_at->format('d F Y H:i') }}
                </div>
                <div class="d-flex gap-2">
                    <x-main.buttons.action-button href="{{ route('admin.tata-usaha.surat-masuk.show', $suratMasuk) }}"
                        variant="secondary">
                        Batal
                    </x-main.buttons.action-button>
                    <x-main.buttons.submit-button variant="primary">
                        <i class="fas fa-save me-1"></i> Update Surat
                    </x-main.buttons.submit-button>
                </div>
            </div>
        </form>
    </x-main.cards.content-card>
</x-layouts.admin>
