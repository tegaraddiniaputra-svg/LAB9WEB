<?php

declare(strict_types=1);

function tampilkanSalam(): void
{
    echo "Selamat belajar PHP modular!";
}

function sapaPengguna(string $nama): string
{
    return "Halo, " . htmlspecialchars($nama, ENT_QUOTES, 'UTF-8');
}

function hitungLuasPersegiPanjang(float $panjang, float $lebar): float
{
    return $panjang * $lebar;
}

function hitungDiskon(float $harga, float $persen = 10): float
{
    return $harga * ($persen / 100);
}

function konversiCelciusKeFahrenheit(float $c): float
{
    return ($c * 9 / 5) + 32;
}

function tentukanStatusNilai(float $nilai): string
{
    if ($nilai >= 85) {
        return 'A (Sangat Baik)';
    }
    if ($nilai >= 75) {
        return 'B (Baik)';
    }
    if ($nilai >= 60) {
        return 'C (Cukup)';
    }
    return 'D (Perlu Perbaikan)';
}

function hitungTotal(float $harga, int $jumlah): float
{
    return $harga * $jumlah;
}

function formatRupiah(float $angka): string
{
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

function e(string $nilai): string
{
    return htmlspecialchars($nilai, ENT_QUOTES, 'UTF-8');
}
