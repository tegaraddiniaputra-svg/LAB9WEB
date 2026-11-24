<?php

declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/helpers/functions.php';

$routes = [
    'dashboard'     => __DIR__ . '/views/dashboard.php',
    'home'          => __DIR__ . '/views/home.php',
    'profil'        => __DIR__ . '/views/profil.php',
    'kontak'        => __DIR__ . '/views/kontak.php',
    'barang/list'   => __DIR__ . '/modules/barang/list.php',
    'barang/add'    => __DIR__ . '/modules/barang/add.php',
    'barang/edit'   => __DIR__ . '/modules/barang/edit.php',
    'barang/delete' => __DIR__ . '/modules/barang/delete.php',
];

$rawPage = $_GET['page'] ?? 'barang/list';
$page = (is_string($rawPage) && $rawPage !== '') ? $rawPage : '404';

if (!array_key_exists($page, $routes)) {
    http_response_code(404);
    $contentFile = __DIR__ . '/views/404.php';
    $currentPage = '404';
} else {
    $contentFile = $routes[$page];
    $currentPage = $page;
}

$actionRoutes = ['barang/add', 'barang/edit', 'barang/delete'];
if (in_array($currentPage, $actionRoutes, true)) {
    require $contentFile;
}

require_once __DIR__ . '/views/header.php';
if (!in_array($currentPage, $actionRoutes, true)) {
    require $contentFile;
}
require_once __DIR__ . '/views/footer.php';
