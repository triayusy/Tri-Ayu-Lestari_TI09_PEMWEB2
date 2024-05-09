<?php
if (isset($_POST['username'])) {
    session_start();
    require_once('dbkoneksi.php');
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "Select * FROM users where username = ? and password = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$username, $password]);
    $row = $stmt->fetch();

    if ($row) {
        $_SESSION['login'] = true;
        $_SESSION['nama'] = $row['nama'];
        echo "<script>alert('Selamat Datang Ayuu');window.location.href='index.php'</script>";
    } else {
        echo "<script>alert('username atau Password Salah');window.location.href='login.html'</script>";
    }
}