<section>
    <h2>Halaman Home</h2>
    <p><?= e(ringkasTeks('Selamat datang di aplikasi PHP modular dengan template bersama, fungsi helper terpusat, dan routing berbasis whitelist.', 120)); ?></p>
    <p>Contoh harga promo (diskon 15% dari Rp250.000): <strong><?= e(formatRupiah(hitungDiskon(250000, 15))); ?></strong></p>
</section>
