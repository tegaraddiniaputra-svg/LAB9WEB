<?php
/** @var mysqli $conn */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $nama = mysqli_real_escape_string($conn, trim((string) ($_POST['nama'] ?? '')));
    $kategori = mysqli_real_escape_string($conn, trim((string) ($_POST['kategori'] ?? '')));
    $harga_jual = (float) ($_POST['harga_jual'] ?? 0);
    $harga_beli = (float) ($_POST['harga_beli'] ?? 0);
    $stok = (int) ($_POST['stok'] ?? 0);
    $gambar = '';

    if (isset($_FILES['file_gambar']) && $_FILES['file_gambar']['error'] === UPLOAD_ERR_OK) {
        $filename = str_replace(' ', '_', basename((string) $_FILES['file_gambar']['name']));
        $targetDir = dirname(__DIR__, 2) . '/assets/img/';
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        $destination = $targetDir . $filename;
        if (move_uploaded_file((string) $_FILES['file_gambar']['tmp_name'], $destination)) {
            $gambar = $filename;
        }
    }

    $gambarEsc = mysqli_real_escape_string($conn, $gambar);
    $sql = "INSERT INTO data_barang (nama, kategori, harga_jual, harga_beli, stok, gambar)
            VALUES ('{$nama}', '{$kategori}', '{$harga_jual}', '{$harga_beli}', '{$stok}', '{$gambarEsc}')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        setFlash('success', 'Data barang berhasil ditambahkan.');
    } else {
        setFlash('error', 'Gagal menambahkan data barang.');
    }

    header('Location: ' . urlPage('barang/list'));
    exit;
}
?>
<section>
    <h2>Tambah Barang</h2>
    <form method="post" action="<?= e(urlPage('barang/add')); ?>" enctype="multipart/form-data">
        <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" name="nama" required>
        </div>
        <div class="form-group">
            <label>Kategori</label>
            <select name="kategori">
                <option value="Komputer">Komputer</option>
                <option value="Elektronik">Elektronik</option>
                <option value="Hand Phone">Hand Phone</option>
            </select>
        </div>
        <div class="form-group">
            <label>Harga Jual</label>
            <input type="number" step="any" name="harga_jual" required>
        </div>
        <div class="form-group">
            <label>Harga Beli</label>
            <input type="number" step="any" name="harga_beli" required>
        </div>
        <div class="form-group">
            <label>Stok</label>
            <input type="number" name="stok" required>
        </div>
        <div class="form-group">
            <label>File Gambar</label>
            <input type="file" name="file_gambar" accept="image/*">
        </div>
        <button type="submit" name="submit" value="Simpan">Simpan</button>
        <a class="btn" href="<?= e(urlPage('barang/list')); ?>">Kembali</a>
    </form>
</section>
