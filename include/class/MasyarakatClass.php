<?php 
class Masyarakat {
    
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function login($username, $password)
    {
        $query = $this->pdo->query("SELECT * FROM masyarakat WHERE username = '$username'");
        if($query->rowCount() > 0)
        {
            $rows = $query->fetch(PDO::FETCH_OBJ);
            if($rows->password == $password){
                $_SESSION['login_masyarakat'] = true;
                $_SESSION['username'] = $rows->username;
                return true;
            }
        }
        return false;
    }

    public function register($nik, $nama, $username, $password, $password2, $telp)
    {
        $query = $this->pdo->query("SELECT * FROM masyarakat WHERE username = '$username' OR nik = '$nik'");
        if($query->rowCount() > 0)
        {
            echo" 
                <script>
                    alert('Username Dan NIK telah terdaftar');
                    setTimeout(function() {
                        window.location.href='../../../masyarakat/register.php';
                    }, 500);
                </script>
            ";
            exit;
        }else {
            if($password != $password2){
                echo"
                    <script>
                    alert('Password tidak sama !');
                        setTimeout(function() {
                            window.location.href='../../../masyarakat/register.php';
                            }, 500);
                    </script>
                ";
            exit;
            }else {
                $prepare = $this->pdo->prepare("INSERT INTO masyarakat (nik, nama, username, password, telp) VALUES(:nik, :nama, :username, :password, :telp)");
                $prepare->bindParam(":nik", $nik);
                $prepare->bindParam(":nama", $nama);
                $prepare->bindParam(":username", $username);
                $prepare->bindParam(":password", $password);
                $prepare->bindParam(":telp", $telp);

                if($prepare->execute()){
                    $_SESSION['login_masyarakat'] = true;
                    $_SESSION['username'] = $username;
                    return $prepare->rowCount();
                }
            }
        }
    }

    public function fetch_masyarakat($username)
    {
        $query = $this->pdo->query("SELECT * FROM masyarakat WHERE username = '$username'");
        if($query->rowCount() > 0){
            $rows = $query->fetch(PDO::FETCH_OBJ);
            return $rows;
        }
        return false;
    }

    public function insert_pengaduan($nik, $isi_laporan)
    {
        $targetDir = __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "assets" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR;
        $targetFile = $targetDir . basename($_FILES['foto']['name']);
        move_uploaded_file($_FILES['foto']['tmp_name'], $targetFile);
        
        date_default_timezone_set('Asia/Makassar');
        $date = date("Y-m-d");
        $status = 0;
        $prepare = $this->pdo->prepare("INSERT INTO pengaduan (tgl_pengaduan, nik, isi_laporan, foto, status) VALUES (:tgl_pengaduan, :nik, :isi_laporan, :foto, :status)");

        $prepare->bindParam(":tgl_pengaduan", $date);
        $prepare->bindParam(":nik", $nik);
        $prepare->bindParam("isi_laporan", $isi_laporan);
        $prepare->bindParam(":foto", $_FILES['foto']['name']);
        $prepare->bindParam(":status", $status);

        $prepare->execute();
        return $prepare->rowCount();
    }
}