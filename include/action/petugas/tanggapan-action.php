<?php 
require "../../connection.php";
require "../../class/AdminClass.php";

$id_pengaduan = $_POST['id_pengaduan'];
$tanggapan = $_POST['tanggapan'];
$id_petugas = $_POST['id_petugas'];
$status = $_POST['status'];

$classAdmin = new Admin($pdo);

$insert = $classAdmin->insert_tanggapan($id_pengaduan, $tanggapan, $id_petugas, $status);

if($insert > 0){
    echo"
        <script>
            alert('Tanggapan Berhasil ditambahkan !');
            setTimeout(function() {
                window.location.href='../../../petugas/dashboard.php';
            }, 500);
        </script>
    ";
}else {
    echo"
        <script>
            alert('Gagal memberi Tanggapan');
            // setTimeout(function() {
            //     window.location.href='../../../petugas/dashboard.php';
            // }, 500);
        </script>
    ";
}