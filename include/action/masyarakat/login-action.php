<?php 
require "../../connection.php";
require "../../class/MasyarakatClass.php";

$username = $_POST['username'];
$password = $_POST['password'];

$classMasyarakat = new Masyarakat($pdo);

$login = $classMasyarakat->login($username, $password);

if($login){
    echo"
        <script>
            alert('Selamat Datang !');
            setTimeout(function() {
                window.location.href='../../../masyarakat/dashboard.php';
            }, 500);
        </script>
    ";
}else {
    echo"
        <script>
            alert('Password atau Username anda salah');
            setTimeout(function() {
                window.location.href='../../../index.php';
            }, 500);
        </script>
    ";
}