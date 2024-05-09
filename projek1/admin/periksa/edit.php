<!DOCTYPE html>
<html lang="en">
<?php include_once('../include/meta.php');
require_once('../dbkoneksi.php');
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include_once('../include/header.php') ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include_once('../include/sidebar.php') ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Periksa</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="card col-md-12">
                            <div class="card-body">
                                <form action="" method="post">

                                    <?php
                                    if (isset($_POST['tanggal'])) {
                                        $tanggal = $_POST['tanggal'];
                                        $berat = $_POST['berat'];
                                        $tinggi = $_POST['tinggi'];
                                        $tensi = $_POST['tensi'];
                                        $keterangan = $_POST['keterangan'];
                                        $pasien_id = $_POST['pasien_id'];
                                        $dokter_id = $_POST['dokter_id'];

                                        $sql = "UPDATE periksa SET tanggal = :tanggal, berat = :berat, tinggi = :tinggi, tensi = :tensi, keterangan = :keterangan,  pasien_id = :pasien_id,  dokter_id = :dokter_id WHERE id = :id";
                                        $stmt = $dbh->prepare($sql);
                                        $stmt->bindParam(':tanggal', $tanggal);
                                        $stmt->bindParam(':berat', $berat);
                                        $stmt->bindParam(':tinggi', $tinggi);
                                        $stmt->bindParam(':tensi', $tensi);
                                        $stmt->bindParam(':keterangan', $keterangan);
                                        $stmt->bindParam(':pasien_id', $pasien_id);
                                        $stmt->bindParam(':dokter_id', $dokter_id);
                                        $stmt->bindParam(':id', $_POST['id']);
                                        $stmt->execute();
                                        echo '<meta http-equiv="refresh" content="0; url=index.php"><script>alert("Data Sudah Berhasil Diubah")</script>';
                                    }
                                    if (isset($_GET['id'])) {
                                        $sql = "SELECT * FROM periksa WHERE id = :id";
                                        $stmt = $dbh->prepare($sql);
                                        $stmt->bindParam(':id', $_GET['id']);
                                        $stmt->execute();
                                        $data = $stmt->fetch();
                                    }
                                    ?>
                                    <div class="form-group">
                                        <label for="tanggal">Tanggal Periksa</label>
                                        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $data['tanggal'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="berat">Berat Badan</label>
                                        <input type="number" class="form-control" id="berat" name="berat" value="<?= $data['berat'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="tinggi">Tinggi Badan</label>
                                        <input type="number" class="form-control" id="tinggi" name="tinggi" value="<?= $data['tinggi'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="tensi">Tensi Badan</label>
                                        <input type="number" class="form-control" id="tensi" name="tensi" value="<?= $data['tensi'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <textarea class="form-control" id="keterangan" name="keterangan" value="<?= $data['keterangan'] ?>" required><?= $data['keterangan'] ?></textarea>
                                        <div class="form-group">
                                            <label for="pasien_id">Pasien</label>
                                            <select name="pasien_id" class="form-control" id="pasien_id">
                                                <option value="" hidden>Pilih Pasien</option>
                                                <?php
                                                $sql = "SELECT * FROM pasien";
                                                $stmt = $dbh->prepare($sql);
                                                $stmt->execute();
                                                $result = $stmt->fetchAll();
                                                foreach ($result as $kel) {
                                                    $selected = $kel['id'] == $data['pasien_id'] ? "selected" : "";
                                                    echo "<option value='$kel[id]'>$kel[nama]</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="dokter_id">Dokter id</label>
                                            <select name="dokter_id" class="form-control" id="dokter_id">
                                                <option value="" hidden>Pilih Dokter</option>
                                                <?php
                                                $sql = "SELECT * FROM paramedik";
                                                $stmt = $dbh->prepare($sql);
                                                $stmt->execute();
                                                $result = $stmt->fetchAll();
                                                foreach ($result as $kel) {
                                                    $selected = $kel['id'] == $data['dokter_id'] ? "selected" : "";
                                                    echo "<option value='$kel[id]'>$kel[nama]</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <button class="btn btn-primary my-2" type="submit">Ubah</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include_once('../include/footer.php') ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>