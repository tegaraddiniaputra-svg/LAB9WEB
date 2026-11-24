# Lab9Web — Praktikum Pemrograman Web (PHP Modular)

## Identitas Praktikum
- **Nama Mahasiswa:** Tegar Addinia Putra
- **NIM:** 312510031
- **Mata Kuliah:** Pemrograman Web
- **Topik:** Praktikum 9 — PHP Modular (Template Layout, Function Helper, Routing Whitelist, dan Integrasi CRUD `data_barang`)

## Tujuan Project
1. Memahami pengertian, tujuan, dan manfaat modularisasi program PHP.
2. Membedakan penggunaan `include`, `require`, `include_once`, dan `require_once` beserta konstanta `__DIR__`.
3. Menyusun template layout bersama (`header.php` dan `footer.php`) yang digunakan oleh beberapa halaman tanpa duplikasi kode.
4. Membuat dan memanggil fungsi PHP berparameter dengan *type declaration*, nilai *default*, *escaping* aman, serta nilai kembalian (`return`).
5. Menata struktur direktori aplikasi secara modular (`config`, `views`, `helpers`, `modules`, `assets`).
6. Menerapkan *routing* berdasarkan parameter URL (`$_GET['page']`) dengan validasi *whitelist* dan halaman `404`.
7. Mengintegrasikan aplikasi CRUD `data_barang` (database `latihan_1`) dari praktikum sebelumnya ke dalam struktur modular.

## Kebutuhan Perangkat
- **Web Server & Runtime:** XAMPP / Laragon (Apache, PHP 8.x, MySQL/MariaDB)
- **Database:** MySQL / MariaDB dengan database `latihan_1` dan tabel `data_barang`
- **Editor & Version Control:** Visual Studio Code dan Git
- **Browser:** Google Chrome / Microsoft Edge / browser modern lainnya

## Cara Menjalankan Aplikasi
1. Letakkan atau ekstrak folder proyek ke dalam direktori `htdocs` web server lokal, misalnya:
   `C:\xampp\htdocs\Lab9Web`
2. Buka **XAMPP Control Panel**, lalu jalankan layanan **Apache** dan **MySQL**.
3. Pastikan database `latihan_1` dan tabel `data_barang` tersedia di MySQL, serta sesuaikan kredensial koneksi bila diperlukan pada `app/config/database.php`.
4. Jika memiliki berkas gambar dari folder `gambar/` pada proyek CRUD sebelumnya, salin ke `app/assets/img/`.
5. Akses aplikasi dan latihan melalui browser:
   - **Aplikasi utama & CRUD:** `http://localhost/Lab9Web/app/index.php?page=barang/list`
   - **Dashboard & halaman template:** `http://localhost/Lab9Web/app/index.php?page=dashboard`, `home`, `profil`, `kontak`
   - **Uji rute tidak dikenal (404):** `http://localhost/Lab9Web/app/index.php?page=admin/rahasia`
   - **Latihan awal:** `http://localhost/Lab9Web/latihan_c/uji-include.php`, `http://localhost/Lab9Web/latihan_d/home.php`, dan `http://localhost/Lab9Web/latihan_e/halaman1.php`

## Struktur Direktori
```text
Lab9Web/
├── backup_crud_lama/          # Salinan arsip kode CRUD praktikum sebelumnya (tidak diubah)
├── latihan_c/                 # Praktik pengujian include & require
│   ├── pesan.php
│   ├── uji-include.php
│   └── uji-require.php
├── latihan_d/                 # Praktik template layout bersama & multi-halaman
│   ├── header.php
│   ├── footer.php
│   ├── home.php
│   ├── about.php
│   ├── kontak.php
│   └── style.css
├── latihan_e/                 # Praktik library function & pemanggilan antarhalaman
│   ├── helpers.php
│   ├── halaman1.php
│   └── halaman2.php
├── app/                       # Aplikasi utama modular dengan router & CRUD
│   ├── .htaccess              # Aturan URL rewrite opsional untuk Apache
│   ├── index.php              # Entry point & router berbasis whitelist
│   ├── config/
│   │   └── database.php       # Konfigurasi koneksi database MySQLi
│   ├── views/                 # Template bersama & tampilan halaman
│   │   ├── header.php
│   │   ├── footer.php
│   │   ├── dashboard.php
│   │   ├── home.php
│   │   ├── profil.php
│   │   ├── kontak.php
│   │   └── 404.php
│   ├── helpers/
│   │   └── functions.php      # Fungsi format, diskon, validasi, ringkas teks, escaping, flash
│   ├── modules/
│   │   └── barang/            # Modul CRUD tabel data_barang
│   │       ├── list.php
│   │       ├── add.php
│   │       ├── edit.php
│   │       └── delete.php
│   └── assets/
│       ├── css/
│       │   └── style.css      # Styling tata letak, navigasi aktif, tabel, form, dan alert
│       └── img/               # Direktori berkas gambar barang
└── README.md
```

## Daftar Rute (`app/index.php`)
| Parameter `page` | File Tujuan | Keterangan |
| :--- | :--- | :--- |
| `dashboard` | `views/dashboard.php` | Halaman ringkasan aplikasi |
| `home` | `views/home.php` | Halaman beranda dengan pemanfaatan fungsi helper |
| `profil` | `views/profil.php` | Halaman profil menggunakan template bersama |
| `kontak` | `views/kontak.php` | Halaman kontak dengan validasi email |
| `barang/list` | `modules/barang/list.php` | Menampilkan daftar data barang (`data_barang`) |
| `barang/add` | `modules/barang/add.php` | Form & proses tambah data barang beserta upload gambar |
| `barang/edit` | `modules/barang/edit.php` | Form & proses ubah data barang berdasarkan `id` |
| `barang/delete` | `modules/barang/delete.php` | Proses hapus data barang beserta pesan notifikasi (*flash*) |
| *(tidak terdaftar)* | `views/404.php` | Mengirim kode status HTTP `404` dan menampilkan halaman tidak ditemukan |

## Langkah Praktikum
1. Menyalin proyek CRUD praktikum sebelumnya ke `backup_crud_lama/` sebagai arsip acuan.
2. Menguji perbedaan perilaku `include` dan `require` pada folder `latihan_c/` dengan memanfaatkan `__DIR__`.
3. Menyusun template layout bersama (`header.php` dan `footer.php`) serta CSS pada `latihan_d/` dan menerapkannya ke beberapa halaman.
4. Membuat kumpulan fungsi berparameter dan bernilai *return* pada `helpers.php` (`latihan_e/`) serta memanggilnya dari halaman berbeda.
5. Membangun aplikasi utama pada folder `app/` dengan struktur `config/`, `views/`, `helpers/`, `modules/`, dan `assets/`.
6. Mengimplementasikan *router* berbasis *whitelist* di `app/index.php`, penanda menu aktif pada navigasi, serta halaman `404`.
7. Mengintegrasikan operasi CRUD `data_barang` ke `app/modules/barang/`, menambahkan *flash message* sukses/gagal, dan menguji seluruh fitur di browser.

## Kendala dan Cara Mengatasinya
- **Apache menampilkan `404 Not Found` saat mengakses URL aplikasi:** Struktur folder hasil ekstrak sempat bertumpuk sehingga path URL tidak sesuai dengan lokasi file. Solusinya adalah merapikan penempatan folder ke `C:\xampp\htdocs\Lab9Web\app\index.php`.
- **Gambar pada daftar barang tidak muncul (*broken image*):** Berkas gambar dari folder `gambar/` pada proyek lama belum berada di `app/assets/img/`. Solusinya adalah menyalin gambar ke `app/assets/img/` dan menggunakan helper `urlGambar()` agar path gambar konsisten.
- **Potensi *headers already sent* saat *redirect* setelah aksi CRUD:** Pengalihan halaman (`header('Location: ...')`) harus terjadi sebelum output HTML utama dicetak. Solusinya adalah mengeksekusi rute aksi (`barang/add`, `barang/edit`, `barang/delete`) di `app/index.php` sebelum memuat `views/header.php`.