<!DOCTYPE html>
<html lang="en">
<?php
include_once('../include/meta.php');
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
                        <h1 class="h3 mb-0 text-gray-800">Data Paramedik</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <a href="tambah.php" class="btn btn-primary btn-sm my-2">Tambah</a>
                                    <div class="table-responsive">
                                        <table class="table table-bordered text-center">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>TTL</th>
                                                    <th>Gender</th>
                                                    <th>Kategori</th>
                                                    <th>No. Telp</th>
                                                    <th>Alamat</th>
                                                    <th>Unit Kerja id</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                $sql = "SELECT paramedik.*, unit_kerja.nama as unit_kerja FROM paramedik INNER JOIN unit_kerja ON paramedik.unit_kerja_id = unit_kerja.id";
                                                $stmt = $dbh->prepare($sql);
                                                $stmt->execute();
                                                $result = $stmt->fetchAll();
                                                foreach ($result as $row) { ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $row['nama'] ?></td>
                                                        <td><?= $row['tmp_lahir'] ?>. <?= date('d F Y', strtotime($row['tgl_lahir'])); ?></td>
                                                        <td>
                                                            <?php
                                                            if ($row['gender'] == 0) {
                                                                echo "Wanita";
                                                            } else {
                                                                echo "Pria";
                                                            }
                                                            ?>
                                                        </td>

                                                        <td><?= $row['kategori'] ?></td>
                                                        <td><?= $row['telpon'] ?></td>
                                                        <td><?= $row['alamat'] ?></td>
                                                        <td><?= $row['unit_kerja'] ?></td>
                                                        <td>
                                                            <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-primary">Edit</a>
                                                            <a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-danger">Hapus</a>
                                                        </td>
                                                    </tr>
                                                <?php }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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