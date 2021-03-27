<?php 
class Admin {
    
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Start Petugas
    public function login_petugas($username, $password)
    {
        $query = $this->pdo->query("SELECT * FROM petugas WHERE username = '$username'");
        if($query->rowCount() > 0)
        {
            $rows = $query->fetch(PDO::FETCH_OBJ);

            if($rows->level == 'admin') {
                if($rows->password == $password){
                    $_SESSION['login_admin'] = true;
                    $_SESSION['username'] = $rows->username;
                    return 'admin';
                }
            }else {
                if($rows->password == $password){
                    $_SESSION['login_petugas'] = true;
                    $_SESSION['username'] = $rows->username;
                    return 'petugas';
                }
            }
        }
        return false;
    }

    public function fetch_admin($username)
    {
        $query = $this->pdo->query("SELECT * FROM petugas WHERE username = '$username'");
        if($query->rowCount() > 0){
            $rows = $query->fetch(PDO::FETCH_OBJ);
            return $rows;
        }
        return false;
    }

    public function fetch_all_pengaduan()
    {
        $query = $this->pdo->query("SELECT pengaduan.*, masyarakat.nama, masyarakat.nik FROM pengaduan INNER JOIN masyarakat ON pengaduan.nik = masyarakat.nik");
        if($query->rowCount() > 0){
            while($rows = $query->fetch(PDO::FETCH_OBJ)){
                $data[] = $rows;
            }
            return $data;
        }else {
            return 'nodata';
        }
    }

    public function fetch_pengaduan($id_pengaduan)
    {
        $query = $this->pdo->query("SELECT pengaduan.*, masyarakat.nik, masyarakat.nama FROM pengaduan INNER JOIN masyarakat ON pengaduan.nik = masyarakat.nik WHERE id_pengaduan = '$id_pengaduan'");
        if($query->rowCount() > 0){
            $rows = $query->fetch(PDO::FETCH_OBJ);
            return $rows;
        }
        return 'nodata';
    }

    public function insert_tanggapan($id_pengaduan, $tanggapan, $id_petugas, $status)
    {   
        date_default_timezone_set('Asia/Makassar');
        $date = date("Y-m-d");
        
        $prepare = $this->pdo->prepare("INSERT INTO tanggapan (id_pengaduan, tgl_tanggapan, tanggapan, id_petugas) VALUES (:id_pengaduan, :tgl_tanggapan, :tanggapan, :id_petugas)");
        
        $prepare->bindParam(":id_pengaduan", $id_pengaduan);
        $prepare->bindParam(":tgl_tanggapan", $date);
        $prepare->bindParam(":tanggapan", $tanggapan);
        $prepare->bindParam(":id_petugas", $id_petugas);
        
        if($prepare->execute()){
            $update = $this->pdo->prepare("UPDATE pengaduan SET status = :status WHERE id_pengaduan = :id_pengaduan");

            $update->bindParam(":id_pengaduan", $id_pengaduan);
            $update->bindParam(":status", $status);
            $update->execute();
        }
        return $prepare->rowCount();
    }
    // End Petugas


    // Start Admin 
    public function fetch_all_petugas()
    {
        $query = $this->pdo->query("SELECT * FROM petugas WHERE level = 'petugas'");
        if($query->rowCount() > 0){
            while($rows = $query->fetch(PDO::FETCH_OBJ)){
                $data[] = $rows;
            }
            return $data;
        }else {
            return 'nodata';
        }
    }

    public function fetch_petugas($id_petugas)
    {
        $query = $this->pdo->query("SELECT * FROM petugas WHERE id_petugas = '$id_petugas'");
        if($query->rowCount() > 0){
            $rows = $query->fetch(PDO::FETCH_OBJ);
            return $rows;
        }
        return false;
    }

    public function fetch_tanggapan($id_pengaduan)
    {
        $query = $this->pdo->query("SELECT tanggapan.*, pengaduan.id_pengaduan FROM tanggapan INNER JOIN pengaduan ON tanggapan.id_pengaduan = pengaduan.id_pengaduan WHERE tanggapan.id_pengaduan = '$id_pengaduan' ORDER BY tanggapan.id_tanggapan DESC");
        if($query->rowCount() > 0){
            $rows = $query->fetch(PDO::FETCH_OBJ);
            return $rows;
        }
        return 'nodata';
    }

    public function fetch_all_tanggapan($id_pengaduan)
    {
        $query = $this->pdo->query("SELECT tanggapan.*, petugas.id_petugas, petugas.nama_petugas FROM tanggapan INNER JOIN petugas ON tanggapan.id_petugas = petugas.id_petugas WHERE tanggapan.id_pengaduan = '$id_pengaduan' ORDER BY tanggapan.id_tanggapan DESC");
        if($query->rowCount() > 0){
            while($rows = $query->fetch(PDO::FETCH_OBJ)){
                $data[] = $rows;
            }
            return $data;
        }else {
            return 'nodata';
        }
    }

    public function delete_petugas($id_petugas)
    {
        $delete = $this->pdo->prepare("DELETE FROM petugas WHERE id_petugas = '$id_petugas'");
        $delete->bindParam(":id_petugas", $id_petugas);
        $delete->execute();
        return 'deleted';
    }

    public function add_petugas($nama_petugas, $username, $password, $password2, $telp)
    {
        $query = $this->pdo->query("SELECT * FROM petugas WHERE username = '$username'");
        if($query->rowCount() > 0)
        {
            echo" 
                <script>
                    alert('Username Telah terdaftar');
                    setTimeout(function() {
                        window.location.href='../../../admin/dashboard.php';
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
                            window.location.href='../../../admin/dashboard.php';
                            }, 500);
                    </script>
                ";
                exit;
            }else {
                $level = 'petugas';
                $prepare = $this->pdo->prepare("INSERT INTO petugas (nama_petugas, username, password, telp, level) VALUES(:nama_petugas, :username, :password, :telp, :level)");

                $prepare->bindParam(":nama_petugas", $nama_petugas);
                $prepare->bindParam(":username", $username);
                $prepare->bindParam(":password", $password);
                $prepare->bindParam(":telp", $telp);
                $prepare->bindParam(":level", $level);

                $prepare->execute();
                return $prepare->rowCount();
            }
        }
    }

    public function edit_petugas($nama_petugas, $username, $password, $password2, $telp, $id_petugas)
    {
        if($password != $password2){
                echo"
                    <script>
                    alert('Password tidak sama !');
                        setTimeout(function() {
                            window.location.href='../../../admin/dashboard.php';
                            }, 500);
                    </script>
                ";
                exit;
        }else {
            if(!isset($password) || $password == null){
                $update = $this->pdo->prepare("UPDATE petugas SET nama_petugas = :nama_petugas,  username = :username, telp = :telp WHERE id_petugas = :id_petugas");

                $update->bindParam(":nama_petugas", $nama_petugas);
                $update->bindParam(":username", $username);
                $update->bindParam(":telp", $telp);
                $update->bindParam(":id_petugas", $id_petugas);

                $update->execute();
                return $update->rowCount();
            }else {
                $update = $this->pdo->prepare("UPDATE petugas SET nama_petugas = :nama_petugas,  username = :username, password =  :password, telp = :telp WHERE id_petugas = :id_petugas");

                $update->bindParam(":nama_petugas", $nama_petugas);
                $update->bindParam(":username", $username);
                $update->bindParam(":password", $password);
                $update->bindParam(":telp", $telp);
                $update->bindParam(":id_petugas", $id_petugas);

                $update->execute();
                return $update->rowCount();
            }
        }
    }
}