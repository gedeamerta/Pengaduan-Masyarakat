<?php 
require "../../connection.php";
require "../../class/AdminClass.php";

$nama_petugas = $_POST['nama_petugas'];
$username = $_POST['username'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$telp = $_POST['telp'];

$id_petugas = $_POST['id_petugas'];

$classAdmin = new Admin($pdo);

$insert = $classAdmin->edit_petugas($nama_petugas, $username, $password, $password2, $telp, $id_petugas);

if($password != $password2){
        echo"
            <script>
                alert('Password tidak sama !');
                setTimeout(function() {
                    window.location.href='../../../admin/dashboard.php';
                }, 500);
            </script>
        ";
}else {
    if($insert > 0){
        echo"
            <script>
                alert('Berhasil Edit Petugas !');
                setTimeout(function() {
                    window.location.href='../../../admin/dashboard.php';
                }, 500);
            </script>
        ";
    }else {
        echo "gagal tambah";
    }
}