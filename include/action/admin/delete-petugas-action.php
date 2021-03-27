<?php 
require "../../connection.php";
require "../../class/AdminClass.php";

$id_petugas = $_GET['id_petugas'];

$classAdmin = new Admin($pdo);

$delete = $classAdmin->delete_petugas($id_petugas);

if($delete){
    echo"
        <script>
            alert('Data Berhasil Dihapus');
            setTimeout(function() {
                window.location.href='../../../admin/dashboard.php';
            }, 500);
        </script>
    ";
}else {
    echo"
        <script>
            alert('Data Gagal Dihapus');
            setTimeout(function() {
                window.location.href='../../../admin/dashboard.php';
            }, 500);
        </script>
    ";
}