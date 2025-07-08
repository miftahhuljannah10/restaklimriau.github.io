<x-layouts.admin>
    <x-slot name="title">Tambah Surat Keluar</x-slot>

    <!-- Breadcrumb -->
    <x-main.layouts.breadcrumb :items="[
        ['title' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['title' => 'Surat Keluar', 'url' => route('admin.tata-usaha.surat-keluar.index')],
        ['title' => 'Tambah'],
    ]" />

    <!-- Main Content -->
    <x-main.cards.content-card title="Tambah Surat Keluar">
        <x-slot name="header-actions">
            <x-main.buttons.action-button href="{{ route('admin.tata-usaha.surat-keluar.index') }}" variant="secondary"
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
        <form action="{{ route('admin.tata-usaha.surat-keluar.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- Nomor Surat -->
                <div class="col-md-6 mb-3">
                    <label for="no_surat" class="form-label">Nomor Surat <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('no_surat') is-invalid @enderror" id="no_surat"
                        name="no_surat" value="{{ old('no_surat') }}" placeholder="Contoh: 123/SK/2023" required>
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
                            id="tanggal_surat" name="tanggal_surat" value="{{ old('tanggal_surat', date('Y-m-d')) }}"
                            required>
                        @error('tanggal_surat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Klasifikasi Surat -->
                <div class="col-md-6 mb-3">
                    <label for="klasifikasi_id" class="form-label">Klasifikasi <span
                            class="text-danger">*</span></label>
                    <div class="input-group">
                        <select class="form-select @error('klasifikasi_id') is-invalid @enderror" id="klasifikasi_id"
                            name="klasifikasi_id" required>
                            <option value="" disabled selected>-- Pilih Klasifikasi --</option>
                            @foreach ($klasifikasi as $k)
                                <option value="{{ $k->id }}"
                                    {{ old('klasifikasi_id') == $k->id ? 'selected' : '' }}>
                                    {{ $k->kode }} - {{ $k->nama }}
                                </option>
                            @endforeach
                        </select>
                        <button type="button" id="btnAddKlasifikasi" class="btn btn-outline-primary">
                            <i class="fas fa-plus"></i>
                        </button>
                        @error('klasifikasi_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Tujuan -->
                <div class="col-md-6 mb-3">
                    <label for="tujuan" class="form-label">Tujuan <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('tujuan') is-invalid @enderror" id="tujuan"
                        name="tujuan" value="{{ old('tujuan') }}" placeholder="Tujuan surat" required>
                    @error('tujuan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Perihal -->
                <div class="col-12 mb-3">
                    <label for="perihal" class="form-label">Perihal <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('perihal') is-invalid @enderror" id="perihal"
                        name="perihal" value="{{ old('perihal') }}" placeholder="Perihal surat" required>
                    @error('perihal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Sifat -->
                <div class="col-md-6 mb-3">
                    <label for="sifat" class="form-label">Sifat <span class="text-danger">*</span></label>
                    <select class="form-select @error('sifat') is-invalid @enderror" id="sifat" name="sifat"
                        required>
                        <option value="" disabled selected>-- Pilih Sifat --</option>
                        <option value="Biasa" {{ old('sifat') == 'Biasa' ? 'selected' : '' }}>Biasa</option>
                        <option value="Penting" {{ old('sifat') == 'Penting' ? 'selected' : '' }}>Penting</option>
                        <option value="Segera" {{ old('sifat') == 'Segera' ? 'selected' : '' }}>Segera</option>
                        <option value="Rahasia" {{ old('sifat') == 'Rahasia' ? 'selected' : '' }}>Rahasia</option>
                    </select>
                    @error('sifat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- File Scanning -->
                <div class="col-md-6 mb-3">
                    <label for="scanning" class="form-label">File Scan</label>
                    <input type="file" class="form-control @error('scanning') is-invalid @enderror" id="scanning"
                        name="scanning" accept=".pdf,.jpg,.jpeg,.png">
                    <small class="form-text text-muted">Format: PDF, JPG, JPEG, PNG. Maks: 2MB</small>
                    @error('scanning')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Catatan -->
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
                <x-main.buttons.action-button href="{{ route('admin.tata-usaha.surat-keluar.index') }}"
                    variant="secondary">
                    Batal
                </x-main.buttons.action-button>
                <x-main.buttons.submit-button variant="primary">
                    <i class="fas fa-save me-1"></i> Simpan
                </x-main.buttons.submit-button>
            </div>
        </form>
    </x-main.cards.content-card>

    <!-- Modal untuk Tambah Klasifikasi -->
    <div class="modal fade" id="modalAddKlasifikasi" tabindex="-1" aria-labelledby="modalAddKlasifikasiLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAddKlasifikasiLabel">Tambah Klasifikasi Surat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="kode" class="form-label">Kode <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="kode" name="kode"
                            placeholder="Contoh: 001">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nama" name="nama"
                            placeholder="Nama klasifikasi">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" id="saveKlasifikasi" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Modal controls
            const btnAddKlasifikasi = document.getElementById('btnAddKlasifikasi');
            const modal = new bootstrap.Modal(document.getElementById('modalAddKlasifikasi'));
            const saveKlasifikasi = document.getElementById('saveKlasifikasi');

            btnAddKlasifikasi.addEventListener('click', function() {
                modal.show();
            });

            saveKlasifikasi.addEventListener('click', function() {
                const kode = document.getElementById('kode').value;
                const nama = document.getElementById('nama').value;

                if (!kode || !nama) {
                    alert('Kode dan Nama harus diisi!');
                    return;
                }

                // AJAX request to save new klasifikasi
                fetch('{{ route('admin.tata-usaha.klasifikasi-surat.ajax') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            kode,
                            nama
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Add new option to select
                            const select = document.getElementById('klasifikasi_id');
                            const option = document.createElement('option');
                            option.value = data.klasifikasi.id;
                            option.text = `${data.klasifikasi.kode} - ${data.klasifikasi.nama}`;
                            option.selected = true;
                            select.add(option);

                            // Close modal and reset form
                            modal.hide();
                            document.getElementById('kode').value = '';
                            document.getElementById('nama').value = '';
                        } else {
                            alert(data.message || 'Terjadi kesalahan saat menyimpan data');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Terjadi kesalahan saat menyimpan data');
                    });
            });
        });
    </script>
</x-layouts.admin>
