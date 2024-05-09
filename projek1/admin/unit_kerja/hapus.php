<?php
require_once('../dbkoneksi.php');

if (isset($_GET['id'])) {
    $sql = "SELECT * FROM unit_kerja WHERE id=?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$_GET['id']]);

    $unit_kerja = $stmt->fetch();
    if ($unit_kerja) {
        $sql = "DELETE FROM unit_kerja WHERE id=?";
        $stmt = $dbh->prepare($sql);
        $stmt->execute([$_GET['id']]);
        echo "<script>alert('Data Berhasil Dihapus')</script>";
        echo '<meta http-equiv="refresh" content="0; url=index.php">';
    } else {
        echo "<script>alert('Data tidak ditemukan')</script>";
        echo '<meta http-equiv="refresh" content="0; url=index.php">';
    }
}
