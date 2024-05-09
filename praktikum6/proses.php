<?php 
require_once 'koneksi.php';

$_kode = $_POST['kode'];
$_nama_lengkap = $_POST['nama_lengkap']; // Menghapus spasi ekstra
$_tmp_lahir = $_POST['tmp_lahir'];
$_tgl_lahir = $_POST['tgl_lahir'];
$_gender = $_POST['gender'];
$_email = $_POST['email'];
$_alamat = $_POST['alamat'];
$_kelurahan = $_POST['kelurahan'];
$_proses = $_POST['proses']; // Menghapus spasi ekstra

// Sistem data ke dalam array $data
$data = [$_kode, $_nama_lengkap, $_tmp_lahir, $_tgl_lahir, $_gender, $_email, $_alamat, $_kelurahan];

if($_proses == 'tambah') {
    $sql = "INSERT INTO pasien(kode, nama, tmp_lahir, tgl_lahir, gender, email, alamat, kelurahan_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);
}

header('location: data_pasien.php'); // Menambahkan titik koma di akhir dan mengganti nama file ke 'data_pasien.php'
?>