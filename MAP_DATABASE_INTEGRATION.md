# Equipment Map Integration - Database Implementation

## Summary of Changes

This document explains the changes made to integrate the equipment map with database data instead of hardcoded values.

## Files Modified

### 1. Controller Created: `app/Http/Controllers/CekKetersediaanDataController.php`

-   Fetches equipment data from the database
-   Filters out records with null coordinates
-   Formats data for the map component

### 2. Controller Created: `app/Http/Controllers/DetailAlatController.php`

-   Handles detail view for individual equipment
-   Fetches equipment data with relationships (provinsi, kabupaten, kecamatan)
-   Provides comprehensive metadata display

### 3. Route Updated: `routes/web.php`

-   Changed cek-ketersediaan-data route to use controller
-   Added detail-alat route with nomor_pos parameter

### 4. View Updated: `resources/views/components/before-login/layanan/cek-ketersediaan-map.blade.php`

-   Removed hardcoded data array
-   Now uses data passed from controller via `@json($titikAlat)`

### 5. Models Enhanced:

-   **Provinsi.php**: Added `getNamaAttribute()` accessor
-   **Kabupaten.php**: Added `getNamaAttribute()` accessor
-   **Kecamatan.php**: Added `getNamaAttribute()` accessor

## Database Structure

The system uses the following relationships:

-   `alat` -> `provinsi_id` -> `provinsi.id`
-   `alat` -> `kabupaten_id` -> `kabupaten.id`
-   `alat` -> `kecamatan_id` -> `kecamatan.id`

## Column Mapping

### Database Columns → Display Names

-   `nama_provinsi` → Provinsi
-   `nama_kabupaten` → Kabupaten/Kota
-   `nama_kecamatan` → Kecamatan
-   `nama_pos` → Nama Pos
-   `jenis_alat` → Jenis Alat
-   `nomor_pos` → Kode Alat
-   `lintang` → Latitude
-   `bujur` → Longitude

## How It Works

1. **Map Page (`/cek-ketersediaan-data`)**:

    - Controller fetches all equipment with valid coordinates
    - Data is passed to the map component
    - Map markers are clickable and link to detail pages

2. **Detail Page (`/masyarakat/detail-alat/{nomor_pos}`)**:

    - Controller finds equipment by nomor_pos
    - Loads related data (provinsi, kabupaten, kecamatan)
    - Displays comprehensive metadata

3. **Error Handling**:
    - Invalid nomor_pos redirects to map with error message
    - Missing relationships show "-" instead of error
    - Null coordinates are filtered from map

## Testing

A test seeder (`TestAlatSeeder`) has been created to insert sample data:

```bash
php artisan db:seed --class=TestAlatSeeder
```

This creates:

-   Test provinsi: "Riau"
-   Test kabupaten: "Kampar"
-   Test kecamatan: "Bangkinang"
-   Two test equipment records with proper relationships

## Usage

1. Visit `/cek-ketersediaan-data` to see the map
2. Click any marker to view detailed information
3. Data is dynamically loaded from the database
4. All location information (provinsi, kabupaten, kecamatan) now displays correctly
