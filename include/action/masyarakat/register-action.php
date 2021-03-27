<?php 
require "../../connection.php";
require "../../class/MasyarakatClass.php";

$nik = $_POST['nik'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$telp = $_POST['telp'];

$classMasyarakat = new Masyarakat($pdo);

$register = $classMasyarakat->register($nik, $nama, $username, $password, $password2, $telp);

if($register > 0){
    echo"
        <script>
            alert('Berhasil Registrasi !');
            setTimeout(function() {
                window.location.href='../../../masyarakat/dashboard.php';
            }, 500);
        </script>
    ";
}else {
    echo "masyarakat gagal;";
}