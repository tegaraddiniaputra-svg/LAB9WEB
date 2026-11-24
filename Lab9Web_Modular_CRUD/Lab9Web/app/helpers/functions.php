<?php

declare(strict_types=1);

function e(string $nilai): string
{
    return htmlspecialchars($nilai, ENT_QUOTES, 'UTF-8');
}

function formatRupiah(float $angka): string
{
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

function hitungDiskon(float $harga, float $persen = 10): float
{
    $persenAman = max(0.0, min(100.0, $persen));
    return $harga - ($harga * ($persenAman / 100));
}

function validasiEmail(string $email): bool
{
    return filter_var(trim($email), FILTER_VALIDATE_EMAIL) !== false;
}

function ringkasTeks(string $teks, int $panjang = 80): string
{
    $bersih = trim($teks);
    if (mb_strlen($bersih, 'UTF-8') <= $panjang) {
        return $bersih;
    }
    return rtrim(mb_substr($bersih, 0, $panjang, 'UTF-8')) . '...';
}

function is_select(string $var, string $val): string
{
    return $var === $val ? 'selected="selected"' : '';
}

function setFlash(string $tipe, string $pesan): void
{
    $_SESSION['flash'] = [
        'tipe'  => $tipe,
        'pesan' => $pesan,
    ];
}

function getFlash(): ?array
{
    if (!isset($_SESSION['flash']) || !is_array($_SESSION['flash'])) {
        return null;
    }
    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']);
    return $flash;
}

function urlPage(string $page, array $params = []): string
{
    $query = array_merge(['page' => $page], $params);
    return '/Lab9Web/app/index.php?' . http_build_query($query);
}

function urlGambar(?string $gambar): string
{
    if (empty($gambar)) {
        return '';
    }
    $bersih = ltrim($gambar, '/');
    if (str_starts_with($bersih, 'gambar/')) {
        $bersih = substr($bersih, strlen('gambar/'));
    }
    return '/Lab9Web/app/assets/img/' . rawurlencode($bersih);
}
