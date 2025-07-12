# Equipment Map Integration - Database Implementation (Updated)

## Summary of Changes

This document explains the changes made to integrate the equipment map with database data instead of hardcoded values, including rainfall data integration.

## Files Modified

### 1. Controller Created: `app/Http/Controllers/CekKetersediaanDataController.php`

-   Fetches equipment data from the database
-   Filters out records with null coordinates
-   Formats data for the map component

### 2. Controller Enhanced: `app/Http/Controllers/DetailAlatController.php`

-   Handles detail view for individual equipment
-   Fetches equipment data with relationships (provinsi, kabupaten, kecamatan)
-   **NEW**: Integrates real rainfall data from `alat_curah_hujan` table
-   **NEW**: Calculates rainfall statistics (total, average, min, max)
-   Provides comprehensive metadata display with rainfall information

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
-   **Alat.php**: Added relationship to `AlatCurahHujan` model

## Database Structure

The system uses the following relationships:

-   `alat` -> `provinsi_id` -> `provinsi.id`
-   `alat` -> `kabupaten_id` -> `kabupaten.id`
-   `alat` -> `kecamatan_id` -> `kecamatan.id`
-   `alat` -> `nomor_pos` -> `alat_curah_hujan.nomor_pos` (rainfall data)

## Rainfall Data Integration

### Chart Data Source

-   Charts now display real rainfall data from `alat_curah_hujan` table
-   Data includes 12 months: januari, februari, maret, april, mei, juni, juli, agustus, september, oktober, november, desember
-   If no rainfall data exists, chart shows zeros with appropriate message

### Rainfall Statistics

The detail page now shows additional rainfall statistics:

-   **Total Curah Hujan Normal**: Sum of all 12 months (mm/tahun)
-   **Rata-rata Curah Hujan Normal**: Average per month (mm/bulan)
-   **Curah Hujan Normal Maksimum**: Highest monthly value (mm)
-   **Curah Hujan Normal Minimum**: Lowest monthly value (mm)

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

### Rainfall Data Columns

-   `januari` through `desember` → Monthly rainfall values in mm
-   Displayed in both chart format and statistical summary

## How It Works

1. **Map Page (`/cek-ketersediaan-data`)**:

    - Controller fetches all equipment with valid coordinates
    - Data is passed to the map component
    - Map markers are clickable and link to detail pages

2. **Detail Page (`/masyarakat/detail-alat/{nomor_pos}`)**:

    - Controller finds equipment by nomor_pos
    - Loads related data (provinsi, kabupaten, kecamatan)
    - **NEW**: Fetches rainfall data from `alat_curah_hujan` table
    - **NEW**: Calculates and displays rainfall statistics
    - **NEW**: Generates dynamic chart with real rainfall data
    - Displays comprehensive metadata

3. **Error Handling**:
    - Invalid nomor_pos redirects to map with error message
    - Missing relationships show "-" instead of error
    - Missing rainfall data shows zeros with appropriate message
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
-   **NEW**: Sample rainfall data for both test equipment

Sample rainfall data:

-   **TEST001**: Variable rainfall from 80mm (July) to 200mm (April)
-   **TEST002**: Variable rainfall from 65mm (July) to 185mm (April)

## Usage

1. Visit `/cek-ketersediaan-data` to see the map
2. Click any marker to view detailed information
3. **NEW**: View the "Normal Curah Hujan" tab to see rainfall chart and statistics
4. Data is dynamically loaded from the database
5. All location information (provinsi, kabupaten, kecamatan) now displays correctly
6. **NEW**: Rainfall charts show real data from the database

## Features Summary

✅ **Map Integration**: Equipment markers load from database  
✅ **Geographic Data**: Provinsi, Kabupaten, Kecamatan display correctly  
✅ **Rainfall Charts**: Real data from `alat_curah_hujan` table  
✅ **Rainfall Statistics**: Automatic calculation of totals, averages, min/max  
✅ **Error Handling**: Graceful handling of missing data  
✅ **Test Data**: Seeder provides sample data for testing
