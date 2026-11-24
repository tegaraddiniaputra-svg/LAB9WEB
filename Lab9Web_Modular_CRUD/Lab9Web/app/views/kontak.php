<?php
$contohEmail = 'mahasiswa@kampus.ac.id';
?>
<section>
    <h2>Kontak</h2>
    <p>Email resmi: <strong><?= e($contohEmail); ?></strong> (Status validasi: <?= validasiEmail($contohEmail) ? 'Valid' : 'Tidak valid'; ?>).</p>
</section>
