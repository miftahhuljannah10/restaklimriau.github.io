<x-layouts.admin>
    <x-slot name="title">Edit Tarif PNBP</x-slot>

    <!-- Breadcrumb -->
    <x-main.layouts.breadcrumb :items="[
        ['title' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['title' => 'Tarif PNBP', 'url' => route('tarif-pnbp.index')],
        ['title' => 'Edit'],
    ]" />

    <!-- Main Content -->
    <x-main.cards.content-card title="Edit Tarif PNBP">
        <x-slot name="header-actions">
            <x-main.buttons.action-button href="{{ route('tarif-pnbp.index') }}" variant="secondary" size="sm">
                Kembali
            </x-main.buttons.action-button>
        </x-slot>

        <form action="{{ route('tarif-pnbp.update', $tarif->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Informasi Dasar Tarif -->
            <div class="mb-4">
                <h5 class="mb-3">Informasi Dasar Tarif</h5>

                <div class="row">
                    <!-- Nama Tarif -->
                    <div class="col-md-6 mb-3">
                        <label for="nama_tarif" class="form-label">Nama Tarif <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nama_tarif') is-invalid @enderror"
                            id="nama_tarif" name="nama_tarif" value="{{ old('nama_tarif', $tarif->nama_tarif) }}"
                            placeholder="Masukkan nama tarif" required>
                        @error('nama_tarif')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Satuan -->
                    <div class="col-md-6 mb-3">
                        <label for="satuan" class="form-label">Satuan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('satuan') is-invalid @enderror" id="satuan"
                            name="satuan" value="{{ old('satuan', $tarif->satuan) }}" placeholder="Masukkan satuan"
                            required>
                        @error('satuan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <!-- Jenis Tarif -->
                    <div class="col-md-4 mb-3">
                        <label for="jenis_tarif" class="form-label">Jenis Tarif <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('jenis_tarif') is-invalid @enderror"
                            id="jenis_tarif" name="jenis_tarif" value="{{ old('jenis_tarif', $tarif->jenis_tarif) }}"
                            placeholder="Masukkan jenis tarif" required>
                        @error('jenis_tarif')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tarif -->
                    <div class="col-md-4 mb-3">
                        <label for="tarif" class="form-label">Tarif <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('tarif') is-invalid @enderror" id="tarif"
                            name="tarif" value="{{ old('tarif', $tarif->tarif) }}" placeholder="Masukkan tarif"
                            required>
                        @error('tarif')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Waktu -->
                    <div class="col-md-4 mb-3">
                        <label for="waktu" class="form-label">Waktu <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('waktu') is-invalid @enderror" id="waktu"
                            name="waktu" value="{{ old('waktu', $tarif->waktu) }}" placeholder="Masukkan waktu"
                            required>
                        @error('waktu')
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
                    Simpan Perubahan
                </x-main.buttons.submit-button>
            </div>
        </form>
    </x-main.cards.content-card>
</x-layouts.admin>
