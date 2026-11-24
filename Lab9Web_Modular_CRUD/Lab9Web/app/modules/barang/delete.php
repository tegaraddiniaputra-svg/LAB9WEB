<?php
/** @var mysqli $conn */
$id = (int) ($_GET['id'] ?? 0);

if ($id > 0) {
    $sql = "DELETE FROM data_barang WHERE id_barang = {$id}";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        setFlash('success', 'Data barang berhasil dihapus.');
    } else {
        setFlash('error', 'Gagal menghapus data barang.');
    }
} else {
    setFlash('error', 'ID barang tidak valid.');
}

header('Location: ' . urlPage('barang/list'));
exit;
