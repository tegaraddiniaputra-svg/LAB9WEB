<?php
require_once __DIR__ . '/helpers.php';

$hargaAwal = 150000;
$potongan = hitungDiskon($hargaAwal, 20);
$hargaAkhir = $hargaAwal - $potongan;

echo "Potongan 20%: " . formatRupiah($potongan) . "<br>";
echo "Harga setelah diskon: " . formatRupiah($hargaAkhir) . "<br>";
echo e('<script>alert("xss")</script>') . "<br>";
