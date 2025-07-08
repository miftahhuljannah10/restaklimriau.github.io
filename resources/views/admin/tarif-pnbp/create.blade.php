<x-layouts.admin>
    <x-slot name="title">Tambah Tarif PNBP</x-slot>

    <!-- Breadcrumb -->
    <x-main.layouts.breadcrumb :items="[
        ['title' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['title' => 'Tarif PNBP', 'url' => route('tarif-pnbp.index')],
        ['title' => 'Tambah'],
    ]" />

    <!-- Main Content -->
    <x-main.cards.content-card title="Tambah Tarif PNBP">
        <x-slot name="header-actions">
            <x-main.buttons.action-button href="{{ route('tarif-pnbp.index') }}" variant="secondary" size="sm">
                Kembali
            </x-main.buttons.action-button>
        </x-slot>

        <form action="{{ route('tarif-pnbp.store') }}" method="POST">
            @csrf

            <!-- Informasi Dasar Tarif -->
            <div class="mb-4">
                <h5 class="mb-3">Informasi Dasar Tarif</h5>

                <div class="row">
                    <!-- Nama Tarif -->
                    <div class="col-md-6 mb-3">
                        <label for="nama_tarif" class="form-label">Nama Tarif <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nama_tarif') is-invalid @enderror"
                            id="nama_tarif" name="nama_tarif" value="{{ old('nama_tarif') }}"
                            placeholder="Masukkan nama tarif" required>
                        @error('nama_tarif')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Kode Tarif -->
                    <div class="col-md-6 mb-3">
                        <label for="kode_tarif" class="form-label">Kode Tarif <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('kode_tarif') is-invalid @enderror"
                            id="kode_tarif" name="kode_tarif" value="{{ old('kode_tarif') }}"
                            placeholder="Masukkan kode tarif" required>
                        @error('kode_tarif')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <!-- Satuan -->
                    <div class="col-md-6 mb-3">
                        <label for="satuan" class="form-label">Satuan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('satuan') is-invalid @enderror" id="satuan"
                            name="satuan" value="{{ old('satuan') }}" placeholder="Masukkan satuan" required>
                        @error('satuan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Besaran -->
                    <div class="col-md-6 mb-3">
                        <label for="besaran" class="form-label">Besaran (Rp) <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('besaran') is-invalid @enderror" id="besaran"
                            name="besaran" value="{{ old('besaran') }}" placeholder="Masukkan besaran tarif"
                            step="0.01" required>
                        @error('besaran')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <!-- Deskripsi -->
                    <div class="col-12 mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="4"
                            placeholder="Masukkan deskripsi tarif">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="d-flex justify-content-end gap-2">
                <x-main.buttons.action-button href="{{ route('tarif-pnbp.index') }}" variant="secondary">
                    Batal
                </x-main.buttons.action-button>
                <x-main.buttons.submit-button variant="primary">
                    Simpan
                </x-main.buttons.submit-button>
            </div>
        </form>
    </x-main.cards.content-card>
</x-layouts.admin>
