<?php
require_once __DIR__ . '/helpers.php';

echo "30°C = " . konversiCelciusKeFahrenheit(30) . "°F<br>";
echo "Predikat nilai 86: " . e(tentukanStatusNilai(86)) . "<br>";
echo "Total belanja (3 x Rp25.000): " . formatRupiah(hitungTotal(25000, 3)) . "<br>";
