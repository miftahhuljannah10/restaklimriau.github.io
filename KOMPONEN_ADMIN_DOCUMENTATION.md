# Dokumentasi Komponen Admin Panel

## Daftar Komponen Yang Tersedia

### 1. ALERTS

-   `flash-message.blade.php` - Flash message untuk notifikasi
-   `validation-errors.blade.php` - Tampilan error validasi

### 2. BUTTONS

-   `action-button.blade.php` - Tombol aksi umum
-   `icon-button.blade.php` - Tombol dengan icon
-   `submit-button.blade.php` - Tombol submit form

### 3. CARDS

-   `stats-card.blade.php` - Card untuk statistik/dashboard
-   `content-card.blade.php` - Card untuk konten umum

### 4. DATATABLES

-   `basic-table.blade.php` - Tabel dasar dengan fitur sorting
-   `action-buttons.blade.php` - Tombol aksi untuk tabel (View/Edit/Delete)
-   `pagination.blade.php` - Pagination untuk tabel

### 5. FORMS

-   `text-input.blade.php` - Input text/email/password
-   `textarea.blade.php` - Input textarea
-   `select.blade.php` - Input select/dropdown
-   `file-upload.blade.php` - Upload file dengan preview
-   `search-input.blade.php` - Input pencarian dengan filter

### 6. LAYOUTS

-   `admin-header.blade.php` - Header admin panel
-   `admin-sidebar.blade.php` - Sidebar navigasi admin
-   `breadcrumb.blade.php` - Breadcrumb navigasi

### 7. MODALS

-   `confirm-delete.blade.php` - Modal konfirmasi hapus
-   `form-modal.blade.php` - Modal untuk form input

---

## Cara Penggunaan

### 1. Flash Message

```blade
<x-main.alerts.flash-message />
```

### 2. Validation Errors

```blade
<x-main.alerts.validation-errors />
```

### 3. Action Button

```blade
<x-main.buttons.action-button
    href="{{ route('admin.create') }}"
    variant="primary"
    size="md">
    Tambah Data
</x-main.buttons.action-button>
```

### 4. Stats Card

```blade
<x-main.cards.stats-card
    title="Total User"
    value="150"
    icon="users"
    color="blue"
    trend="up"
    trendValue="12%" />
```

### 5. DataTable dengan Action Buttons

```blade
<x-main.datatables.basic-table
    :headers="['No', 'Nama', 'Email', 'Role', 'Aksi']"
    :data="$users"
    sortable="true">

    @foreach($users as $user)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            <td>
                <x-main.datatables.action-buttons
                    :viewUrl="route('admin.users.show', $user)"
                    :editUrl="route('admin.users.edit', $user)"
                    :deleteAction="route('admin.users.destroy', $user)"
                    :itemId="$user->id"
                    :itemName="$user->name" />
            </td>
        </tr>
    @endforeach
</x-main.datatables.basic-table>

<x-main.datatables.pagination :paginator="$users" />
```

### 6. Form Input

```blade
<x-main.forms.text-input
    label="Nama Lengkap"
    name="name"
    :value="old('name', $user->name ?? '')"
    placeholder="Masukkan nama lengkap"
    required="true" />

<x-main.forms.select
    label="Role"
    name="role_id"
    :options="$roles"
    :selected="old('role_id', $user->role_id ?? '')"
    placeholder="Pilih role..."
    required="true" />

<x-main.forms.file-upload
    label="Foto Profil"
    name="photo"
    accept="image/*"
    :preview="$user->photo ?? null" />
```

### 7. Search Input dengan Filter

```blade
<x-main.forms.search-input
    placeholder="Cari user..."
    :action="route('admin.users.index')"
    :showFilters="true">

    {{-- Filter Content --}}
    <x-slot name="filters">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <x-main.forms.select
                label="Role"
                name="role_filter"
                :options="$roles"
                :selected="request('role_filter')"
                placeholder="Semua Role" />

            <x-main.forms.select
                label="Status"
                name="status_filter"
                :options="['active' => 'Aktif', 'inactive' => 'Tidak Aktif']"
                :selected="request('status_filter')"
                placeholder="Semua Status" />
        </div>
    </x-slot>

    {{-- Actions --}}
    <x-slot name="actions">
        <x-main.buttons.action-button
            href="{{ route('admin.users.create') }}"
            variant="primary"
            size="md">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah User
        </x-main.buttons.action-button>
    </x-slot>
</x-main.forms.search-input>
```

### 8. Form Modal

```blade
<x-main.modals.form-modal
    modalId="userModal"
    title="Tambah User Baru"
    :submitUrl="route('admin.users.store')"
    method="POST"
    size="lg"
    showModal="showUserModal">

    <div class="space-y-4">
        <x-main.forms.text-input
            label="Nama Lengkap"
            name="name"
            placeholder="Masukkan nama lengkap"
            required="true" />

        <x-main.forms.text-input
            label="Email"
            name="email"
            type="email"
            placeholder="Masukkan email"
            required="true" />

        <x-main.forms.select
            label="Role"
            name="role_id"
            :options="$roles"
            placeholder="Pilih role..."
            required="true" />
    </div>
</x-main.modals.form-modal>
```

### 9. Layout Admin dengan Sidebar

```blade
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100" x-data="{ sidebarOpen: false }">
    <div class="flex h-screen">
        {{-- Sidebar --}}
        <x-main.layouts.admin-sidebar />

        {{-- Main Content --}}
        <div class="flex-1 flex flex-col overflow-hidden">
            {{-- Header --}}
            <x-main.layouts.admin-header />

            {{-- Page Content --}}
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
                {{-- Breadcrumb --}}
                <x-main.layouts.breadcrumb :items="[
                    ['title' => 'User Management', 'url' => route('admin.users.index')],
                    ['title' => 'Daftar User']
                ]" />

                {{-- Flash Messages --}}
                <x-main.alerts.flash-message />

                {{-- Page Content --}}
                <div class="bg-white rounded-lg shadow-sm">
                    <!-- Your page content here -->
                </div>
            </main>
        </div>
    </div>
</body>
</html>
```

### 10. Dashboard Stats Cards

```blade
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <x-main.cards.stats-card
        title="Total User"
        value="{{ $totalUsers }}"
        icon="users"
        color="blue"
        trend="up"
        trendValue="12%" />

    <x-main.cards.stats-card
        title="Surat Masuk"
        value="{{ $suratMasuk }}"
        icon="inbox"
        color="green"
        trend="up"
        trendValue="5%" />

    <x-main.cards.stats-card
        title="Surat Keluar"
        value="{{ $suratKeluar }}"
        icon="outbox"
        color="yellow"
        trend="down"
        trendValue="2%" />

    <x-main.cards.stats-card
        title="Total Berita"
        value="{{ $totalBerita }}"
        icon="news"
        color="purple"
        trend="up"
        trendValue="8%" />
</div>
```

---

## Tips Penggunaan

1. **Konsistensi**: Gunakan komponen ini secara konsisten di seluruh admin panel
2. **Customization**: Setiap komponen dapat dikustomisasi dengan props yang tersedia
3. **Responsive**: Semua komponen sudah responsive dan mobile-friendly
4. **Accessibility**: Komponen sudah mengikuti standar accessibility
5. **Performance**: Komponen menggunakan Alpine.js untuk interaktivitas yang ringan

## Struktur File Komponen

```
resources/views/components/main/
├── alerts/
│   ├── flash-message.blade.php
│   └── validation-errors.blade.php
├── buttons/
│   ├── action-button.blade.php
│   ├── icon-button.blade.php
│   └── submit-button.blade.php
├── cards/
│   ├── content-card.blade.php
│   └── stats-card.blade.php
├── datatables/
│   ├── action-buttons.blade.php
│   ├── basic-table.blade.php
│   └── pagination.blade.php
├── forms/
│   ├── file-upload.blade.php
│   ├── search-input.blade.php
│   ├── select.blade.php
│   ├── text-input.blade.php
│   └── textarea.blade.php
├── layouts/
│   ├── admin-header.blade.php
│   ├── admin-sidebar.blade.php
│   └── breadcrumb.blade.php
└── modals/
    ├── confirm-delete.blade.php
    └── form-modal.blade.php
```

Semua komponen siap digunakan dan sudah terintegrasi dengan Tailwind CSS dan Alpine.js!
