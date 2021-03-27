<?php 
require "../../connection.php";
require "../../class/AdminClass.php";

$nama_petugas = $_POST['nama_petugas'];
$username = $_POST['username'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$telp = $_POST['telp'];

$classAdmin = new Admin($pdo);

$insert = $classAdmin->add_petugas($nama_petugas, $username, $password, $password2, $telp);

if($insert > 0){
    echo"
        <script>
            alert('Berhasil Tambah Petugas !');
            setTimeout(function() {
                window.location.href='../../../admin/dashboard.php';
            }, 500);
        </script>
    ";
}else {
    echo "gagal tambah";
}