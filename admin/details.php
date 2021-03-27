<?php 
require "../include/connection.php";
require "../include/class/AdminClass.php";

$classAdmin = new Admin($pdo);

$id_pengaduan = $_GET['id_pengaduan'];
$fetch_pengaduan = $classAdmin->fetch_pengaduan($id_pengaduan);
$fetch_tanggapan = $classAdmin->fetch_tanggapan($id_pengaduan);

if(!isset($_SESSION['login_admin'])){
    header("Location: ../admin/index.php");
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard Masyarakat</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Theme style -->
    <link rel="stylesheet" href="../assets/adminlte/css/adminlte.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                        <a href="#" class="d-block"><?= $_SESSION['username'] ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item has-treeview">
                            <a href="dashboard.php" class="nav-link">
                                <p>
                                    Data Petugas
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="form-pengaduan.php" class="nav-link active">
                                <p>
                                    Form Pengaduan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../include/action/admin/logout.php" class="nav-link"
                                onclick="return confirm('Apakah anda yakin ingin keluar ?')">
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Form Pengaduan</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-md-12">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">Semua Data Pengaduan</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <button type="button" onclick="print()"
                                        class="btn btn-secondary mb-2">Print</button>
                                    <table class="table">
                                        <?php $i = 1; ?>
                                        <?php if($fetch_pengaduan == 'nodata') : ?>
                                        <tr>
                                            <td>Tidak ada data form pengaduan</td>
                                        </tr>
                                        <?php else : ?>
                                        <thead>
                                            <tr>
                                                <td>No</td>
                                                <td>Nama</td>
                                                <td>Tanggal Mengadu</td>
                                                <td>Isi Pengaduan</td>
                                                <td>Tanggapan Petugas</td>
                                                <td>Detail Tanggapan</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><?= $fetch_pengaduan->nama; ?></td>
                                                <td><?= $fetch_pengaduan->tgl_pengaduan; ?></td>
                                                <td><?= $fetch_pengaduan->isi_laporan; ?></td>
                                                <?php if($fetch_tanggapan == 'nodata'): ?>
                                                <td>Belum ada tanggapan</td>
                                                <?php else: ?>
                                                <td>
                                                    <?= $fetch_tanggapan->tanggapan; ?>
                                                </td>
                                                <?php endif; ?>
                                                <td>
                                                    <a class="btn btn-primary"
                                                        href="tanggapan.php?id_pengaduan=<?= $fetch_tanggapan->id_pengaduan; ?>">Tanggapan</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <?php endif; ?>
                                    </table>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.0.5
            </div>
            <strong>Copyright &copy; 2021 Gedeamerta.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../assets/adminlte/plugins/jquery/jquery.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/adminlte/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../assets/adminlte/js/demo.js"></script>
    <!-- Page Script -->
</body>

</html>