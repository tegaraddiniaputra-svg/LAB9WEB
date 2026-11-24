<?php

declare(strict_types=1);

$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'latihan_1';

$conn = mysqli_connect($host, $user, $pass, $db);
if ($conn === false) {
    error_log('Koneksi database gagal: ' . mysqli_connect_error());
    http_response_code(500);
    exit('Koneksi ke server gagal.');
}

mysqli_set_charset($conn, 'utf8mb4');
