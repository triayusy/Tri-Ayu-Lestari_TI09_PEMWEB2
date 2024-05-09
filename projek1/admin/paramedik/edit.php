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
                        <h1 class="h3 mb-0 text-gray-800">Data Pasien</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="card col-md-12">
                            <div class="card-body">
                                <form action="" method="post">

                                    <?php
                                    if (isset($_POST['nama'])) {
                                        $nama = $_POST['nama'];
                                        $tmp_lahir = $_POST['tmp_lahir'];
                                        $tgl_lahir = $_POST['tgl_lahir'];
                                        $gender = $_POST['gender'];
                                        $kategori = $_POST['kategori'];
                                        $telepon = $_POST['telepon'];
                                        $alamat = $_POST['alamat'];
                                        $unit_kerja_id = $_POST['unit_kerja_id'];

                                        $sql = "UPDATE paramedik SET nama = :nama, tmp_lahir = :tmp_lahir, tgl_lahir = :tgl_lahir, gender = :gender, kategori = :kategori,  telepon = :telepon,  alamat = :alamat, unit_kerja_id = :unit_kerja_id WHERE id = :id";
                                        $stmt = $dbh->prepare($sql);
                                        $stmt->bindParam(':nama', $nama);
                                        $stmt->bindParam(':tmp_lahir', $tmp_lahir);
                                        $stmt->bindParam(':tgl_lahir', $tgl_lahir);
                                        $stmt->bindParam(':gender', $gender);
                                        $stmt->bindParam(':telepon', $telepon);
                                        $stmt->bindParam(':kategori', $kategori);
                                        $stmt->bindParam(':telepon', $telepon);
                                        $stmt->bindParam(':alamat', $alamat);
                                        $stmt->bindParam(':unit_kerja_id', $unit_kerja_id);
                                        $stmt->bindParam(':id', $_POST['id']);
                                        $stmt->execute();
                                        echo '<meta http-equiv="refresh" content="0; url=index.php"><script>alert("Data Sudah Berhasil Diubah")</script>';
                                    }
                                    if (isset($_GET['id'])) {
                                        $sql = "SELECT * FROM paramedik WHERE id = :id";
                                        $stmt = $dbh->prepare($sql);
                                        $stmt->bindParam(':id', $_GET['id']);
                                        $stmt->execute();
                                        $data = $stmt->fetch();
                                    }
                                    ?>
                                    <div class="form-group">
                                        <label for="nama">Nama Dokter</label>
                                        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="tmp_lahir">Tempat lahir</label>
                                        <input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir" value="<?= $data['tmp_lahir'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_lahir">Tanggal lahir</label>
                                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $data['tgl_lahir'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Gender Dokter</label><br>
                                        <input type="radio" id="genderPR" name="gender" <?= $data['gender'] == 0 ? "checked" : "" ?> value="0">
                                        <label for="genderPR">Perempuan</label><br>
                                        <input type="radio" id="genderLK" name="gender" <?= $data['gender'] == 1 ? "checked" : "" ?> value="1">
                                        <label for="genderLK">Laki-laki</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="kategori">Kategori</label>
                                        <select name="kategori" class="form-control" id="kategori">
                                            <option value="" hidden>Pilih Kategori</option>
                                            <?php
                                            try {
                                                $sql = "SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS 
                                                        WHERE TABLE_SCHEMA = 'dbpuskesmas' 
                                                        AND TABLE_NAME = 'paramedik' 
                                                        AND COLUMN_NAME = 'kategori'";
                                                $stmt = $dbh->prepare($sql);
                                                $stmt->execute();
                                                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                                                if ($result) {
                                                    $type = $result['COLUMN_TYPE'];
                                                    preg_match("/^enum\(\'(.*)\'\)$/", $type, $matches);
                                                    $enums = explode("','", $matches[1]);

                                                    foreach ($enums as $enum) {
                                                        $selected = ($enum == $data['kategori']) ? 'selected' : '';
                                                        echo "<option value='$enum' $selected>$enum</option>";
                                                    }
                                                }
                                            } catch (PDOException $e) {
                                                echo "Error: " . $e->getMessage();
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="telepon">No. Telp</label>
                                        <input type="number" class="form-control" id="telepon" name="telepon" value="<?= $data['telepon'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control" id="alamat" name="alamat" value="<?= $data['alamat'] ?>" required><?= $data['alamat'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="unit_kerja_id">Unit Kerja</label>
                                        <select name="unit_kerja_id" class="form-control" id="unit_kerja_id">
                                            <option value="" hidden>Pilih Unit Kerja</option>
                                            <?php
                                            $sql = "SELECT * FROM unit_kerja";
                                            $stmt = $dbh->prepare($sql);
                                            $stmt->execute();
                                            $result = $stmt->fetchAll();
                                            foreach ($result as $kel) {
                                                $selected = $kel['id'] == $data['unit_kerja_id'] ? "selected" : "";
                                                echo "<option value='$kel[id]' $selected>$kel[nama]</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Ubah</button>
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