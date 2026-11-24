# Lab9Web — Praktikum Pemrograman Web (PHP Modular)

## Tujuan Project
Menerapkan modularisasi program PHP melalui pemisahan template bersama (`header.php` & `footer.php`), fungsi helper terpusat (`helpers/functions.php`), routing berbasis whitelist (`index.php`), serta integrasi aplikasi CRUD (`data_barang` pada database `latihan_1`).

## Kebutuhan Perangkat
- XAMPP / Laragon (Apache, PHP 8.x, MySQL/MariaDB)
- Browser modern
- Visual Studio Code & Git

## Cara Menjalankan Aplikasi
1. Ekstrak folder `Lab9Web` ke dalam `htdocs` (misalnya `C:\xampp\htdocs\Lab9Web`).
2. Jalankan layanan **Apache** dan **MySQL** pada XAMPP.
3. Pastikan database `latihan_1` dan tabel `data_barang` tersedia di MySQL, lalu sesuaikan konfigurasi bila perlu di `app/config/database.php`.
4. Akses `http://localhost/Lab9Web/app/index.php?page=barang/list` di browser.

## Struktur Direktori
- `backup_crud_lama/`: Arsip kode CRUD sebelumnya (`koneksi.php`, `index.php`, `tambah.php`, `ubah.php`, `hapus.php`).
- `latihan_c/`: Pengujian `include` dan `require`.
- `latihan_d/`: Latihan template layout (`header.php`, `footer.php`, `home.php`, `about.php`, `kontak.php`, `style.css`).
- `latihan_e/`: Latihan fungsi (`helpers.php`, `halaman1.php`, `halaman2.php`).
- `app/index.php`: Router utama dan titik masuk aplikasi dengan whitelist rute dan penanganan 404.
- `app/config/database.php`: Konfigurasi koneksi database `mysqli`.
- `app/views/`: Template bersama (`header.php`, `footer.php`, `404.php`) serta halaman `dashboard.php`, `home.php`, `profil.php`, dan `kontak.php`.
- `app/helpers/functions.php`: Kumpulan fungsi helper (`e()`, `formatRupiah()`, `hitungDiskon()`, `validasiEmail()`, `ringkasTeks()`, `is_select()`, `setFlash()`, `getFlash()`, `urlPage()`, `urlGambar()`).
- `app/modules/barang/`: Modul CRUD `data_barang` (`list.php`, `add.php`, `edit.php`, `delete.php`).
- `app/assets/css/style.css` & `app/assets/img/`: Berkas gaya CSS dan gambar produk.

## Daftar Rute (`app/index.php`)
- `dashboard` -> `views/dashboard.php`
- `home` -> `views/home.php`
- `profil` -> `views/profil.php`
- `kontak` -> `views/kontak.php`
- `barang/list` -> `modules/barang/list.php`
- `barang/add` -> `modules/barang/add.php`
- `barang/edit` -> `modules/barang/edit.php`
- `barang/delete` -> `modules/barang/delete.php`
