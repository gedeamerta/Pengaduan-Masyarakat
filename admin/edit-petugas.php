<?php 
require "../include/connection.php";
require "../include/class/AdminClass.php";

$classAdmin = new Admin($pdo);

$id_petugas = $_GET['id_petugas'];
$fetch_petugas = $classAdmin->fetch_petugas($id_petugas);

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
                            <a href="dashboard.php" class="nav-link active">
                                <p>
                                    Data Petugas
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="form-pengaduan.php" class="nav-link">
                                <p>
                                    Form Pengaduan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../include/action/admin/logout.php"
                                onclick="return confirm('Apakah anda yakin ingin keluar ?')" class="nav-link">
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
                            <h1>Data Petugas</h1>
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
                                    <h3 class="card-title">Add Petugas</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form action="../include/action/admin/edit-petugas-action.php" method="POST">
                                        <div class="row">
                                            <input type="hidden" name="id_petugas"
                                                value="<?= $fetch_petugas->id_petugas ?>">
                                            <div class="col-lg-6 col-sm-12 form-group">
                                                <label for="petugas">Nama Petugas</label>
                                                <input type="text" name="nama_petugas" class="form-control" required
                                                    value="<?= $fetch_petugas->nama_petugas ?>">
                                            </div>
                                            <div class="col-lg-6 col-sm-12 form-group">
                                                <label for="Username">Username</label>
                                                <input type="text" name="username" class="form-control" required
                                                    value="<?= $fetch_petugas->username ?>">
                                            </div>
                                            <div class="col-lg-12 col-sm-12 form-group">
                                                <label for="telp">Number Phone</label>
                                                <input type="number" name="telp" class="form-control" required
                                                    value="<?= $fetch_petugas->telp ?>">
                                            </div>
                                            <div class="col-lg-6 col-sm-12 form-group">
                                                <label for="password">Password</label>
                                                <input type="password" name="password" class="form-control">
                                            </div>
                                            <div class="col-lg-6 col-sm-12 form-group">
                                                <label for="password2">Re-type Password</label>
                                                <input type="password" name="password2" class="form-control">
                                            </div>
                                        </div>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i>
                                            Send</button>
                                    </div>
                                </div>
                                </form>
                                <!-- /.card-footer -->
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