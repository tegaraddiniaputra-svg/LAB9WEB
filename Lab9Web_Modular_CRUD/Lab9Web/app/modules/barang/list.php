<?php
/** @var mysqli $conn */
$sql = 'SELECT id_barang, nama, kategori, harga_jual, harga_beli, stok, gambar FROM data_barang ORDER BY id_barang DESC';
$result = mysqli_query($conn, $sql);
?>
<section>
    <h2>Data Barang</h2>
    <a class="btn" href="<?= e(urlPage('barang/add')); ?>">+ Tambah Barang</a>

    <table>
        <thead>
            <tr>
                <th>Gambar</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Harga Jual</th>
                <th>Harga Beli</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result && mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td>
                            <?php $srcGambar = urlGambar($row['gambar'] ?? null); ?>
                            <?php if ($srcGambar !== ''): ?>
                                <img src="<?= e($srcGambar); ?>" alt="<?= e((string) $row['nama']); ?>" width="60">
                            <?php else: ?>
                                <span>-</span>
                            <?php endif; ?>
                        </td>
                        <td><?= e((string) $row['nama']); ?></td>
                        <td><?= e((string) $row['kategori']); ?></td>
                        <td><?= e(formatRupiah((float) $row['harga_jual'])); ?></td>
                        <td><?= e(formatRupiah((float) $row['harga_beli'])); ?></td>
                        <td><?= e((string) $row['stok']); ?></td>
                        <td>
                            <a class="btn" href="<?= e(urlPage('barang/edit', ['id' => (int) $row['id_barang']])); ?>">Ubah</a>
                            <a class="btn btn-danger" href="<?= e(urlPage('barang/delete', ['id' => (int) $row['id_barang']])); ?>" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">Belum ada data</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</section>
