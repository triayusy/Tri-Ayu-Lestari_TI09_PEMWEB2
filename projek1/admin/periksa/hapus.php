<?php
require_once('../dbkoneksi.php');

if (isset($_GET['id'])) {
    $sql = "SELECT * FROM periksa WHERE id=?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$_GET['id']]);

    $periksa = $stmt->fetch();
    if ($periksa) {
        $sql = "DELETE FROM periksa WHERE id=?";
        $stmt = $dbh->prepare($sql);
        $stmt->execute([$_GET['id']]);
        echo "<script>alert('Data Berhasil Dihapus')</script>";
        echo '<meta http-equiv="refresh" content="0; url=index.php">';
    } else {
        echo "<script>alert('Data tidak ditemukan')</script>";
        echo '<meta http-equiv="refresh" content="0; url=index.php">';
    }
}
