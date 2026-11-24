<?php
$activePage = $currentPage ?? 'barang/list';
$flash = getFlash();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Praktikum 9 - PHP Modular</title>
    <link rel="stylesheet" href="/Lab9Web/app/assets/css/style.css">
</head>
<body>
<div class="container">
    <header>
        <h1>Aplikasi PHP Modular</h1>
        <p>Template bersama, function helper, routing whitelist, dan integrasi CRUD data_barang</p>
    </header>
    <nav>
        <a href="<?= e(urlPage('dashboard')); ?>" class="<?= $activePage === 'dashboard' ? 'active' : ''; ?>">Dashboard</a>
        <a href="<?= e(urlPage('home')); ?>" class="<?= $activePage === 'home' ? 'active' : ''; ?>">Home</a>
        <a href="<?= e(urlPage('profil')); ?>" class="<?= $activePage === 'profil' ? 'active' : ''; ?>">Profil</a>
        <a href="<?= e(urlPage('kontak')); ?>" class="<?= $activePage === 'kontak' ? 'active' : ''; ?>">Kontak</a>
        <a href="<?= e(urlPage('barang/list')); ?>" class="<?= str_starts_with($activePage, 'barang/') ? 'active' : ''; ?>">Data Barang</a>
    </nav>
    <main>
        <?php if ($flash !== null): ?>
            <div class="<?= $flash['tipe'] === 'success' ? 'alert-success' : 'alert-error'; ?>">
                <?= e((string) $flash['pesan']); ?>
            </div>
        <?php endif; ?>
