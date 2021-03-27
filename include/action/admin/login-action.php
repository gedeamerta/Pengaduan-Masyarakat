<?php 
require "../../connection.php";
require "../../class/AdminClass.php";

$username = $_POST['username'];
$password = $_POST['password'];

$classAdmin = new Admin($pdo);

$login = $classAdmin->login_petugas($username, $password);

if($login == 'admin'){
    echo"
        <script>
            alert('Selamat Datang Admin !');
            setTimeout(function() {
                window.location.href='../../../admin/dashboard.php';
            }, 500);
        </script>
    ";
}elseif($login == 'petugas') {
    echo"
        <script>
            alert('Selamat Datang Petugas !');
            setTimeout(function() {
                window.location.href='../../../petugas/dashboard.php';
            }, 500);
        </script>
    ";
}else {
    echo"
        <script>
            alert('Username atau Password anda salah !');
            setTimeout(function() {
                window.location.href='../../../admin/index.php';
            }, 500);
        </script>
    ";
}