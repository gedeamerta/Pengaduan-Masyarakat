<?php 
require "../../connection.php";
require "../../class/MasyarakatClass.php";

$nik = $_POST['nik'];
$isi_laporan = $_POST['isi_laporan'];

$classMasyarakat = new Masyarakat($pdo);

$insert = $classMasyarakat->insert_pengaduan($nik, $isi_laporan);

if($insert > 0){
    echo"
        <script>
            alert('Berhasil Mengirim Pengaduan.');
            setTimeout(function() {
                window.location.href='../../../masyarakat/dashboard.php';
            }, 500);
        </script>
    ";
}else {
    echo"
        <script>
            alert('Terjadi Kesalahan !');

        </script>
    ";
}