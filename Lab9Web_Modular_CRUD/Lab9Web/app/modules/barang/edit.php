<?php
/** @var mysqli $conn */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $id = (int) ($_POST['id'] ?? 0);
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

    $sql = "UPDATE data_barang SET
                nama = '{$nama}',
                kategori = '{$kategori}',
                harga_jual = '{$harga_jual}',
                harga_beli = '{$harga_beli}',
                stok = '{$stok}'";
    if ($gambar !== '') {
        $gambarEsc = mysqli_real_escape_string($conn, $gambar);
        $sql .= ", gambar = '{$gambarEsc}'";
    }
    $sql .= " WHERE id_barang = {$id}";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        setFlash('success', 'Data barang berhasil diubah.');
    } else {
        setFlash('error', 'Gagal mengubah data barang.');
    }

    header('Location: ' . urlPage('barang/list'));
    exit;
}

$id = (int) ($_GET['id'] ?? 0);
$sql = "SELECT * FROM data_barang WHERE id_barang = {$id}";
$result = mysqli_query($conn, $sql);
$data = $result ? mysqli_fetch_assoc($result) : null;

if (!$data) {
    setFlash('error', 'Data barang tidak ditemukan.');
    header('Location: ' . urlPage('barang/list'));
    exit;
}
?>
<section>
    <h2>Ubah Barang</h2>
    <form method="post" action="<?= e(urlPage('barang/edit')); ?>" enctype="multipart/form-data">
        <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" name="nama" value="<?= e((string) $data['nama']); ?>" required>
        </div>
        <div class="form-group">
            <label>Kategori</label>
            <select name="kategori">
                <option <?= is_select('Komputer', (string) $data['kategori']); ?> value="Komputer">Komputer</option>
                <option <?= is_select('Elektronik', (string) $data['kategori']); ?> value="Elektronik">Elektronik</option>
                <option <?= is_select('Hand Phone', (string) $data['kategori']); ?> value="Hand Phone">Hand Phone</option>
            </select>
        </div>
        <div class="form-group">
            <label>Harga Jual</label>
            <input type="number" step="any" name="harga_jual" value="<?= e((string) $data['harga_jual']); ?>" required>
        </div>
        <div class="form-group">
            <label>Harga Beli</label>
            <input type="number" step="any" name="harga_beli" value="<?= e((string) $data['harga_beli']); ?>" required>
        </div>
        <div class="form-group">
            <label>Stok</label>
            <input type="number" name="stok" value="<?= e((string) $data['stok']); ?>" required>
        </div>
        <div class="form-group">
            <label>File Gambar</label>
            <input type="file" name="file_gambar" accept="image/*">
        </div>
        <input type="hidden" name="id" value="<?= e((string) $data['id_barang']); ?>">
        <button type="submit" name="submit" value="Simpan">Simpan</button>
        <a class="btn" href="<?= e(urlPage('barang/list')); ?>">Batal</a>
    </form>
</section>
