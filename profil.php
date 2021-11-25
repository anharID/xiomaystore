<?php
    include 'config.php';
    session_start();
    if($_SESSION['status']!=true){
        echo '<script>window.location="login.php"</script>';
    }
    $query = mysqli_query($mysqli, "SELECT * FROM tb_admin WHERE id_admin='".$_SESSION['id']."'");
    $d = mysqli_fetch_object($query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Xiomay Store</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
</head>

<body>
    <!-- header-->
    <header>
        <div class="container">
            <h1>Xiomay Store</h1>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="data-hp.php">Data HP</a></li>
                <li><a href="data-aksesoris.php">Data Aksesoris</a></li>
                <li>
                    <a href="data-ekosistem.php">Data Ekosistem</a>
                </li>
                <li>
                    <a href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </header>

    <!-- content -->
    <div class="session">
        <div class="container">
            <h3>Profil</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control"
                        value="<?php echo $d -> nama  ?>" required>
                    <input type="email" name="email" placeholder="Email" class="input-control"
                        value="<?php echo $d -> email  ?>" required>
                    <input type="text" name="alamat" placeholder="Alamat" class="input-control"
                        value="<?php echo $d -> alamat  ?>" required>
                    <input type="submit" name="submit" value="Ubah Profil" class="btn">

                </form>

                <?php
                    if(isset($_POST['submit'])){
                        $nama = ucwords($_POST['nama']) ;
                        $email = $_POST['email'];
                        $alamat = ucwords($_POST['alamat']) ;

                        $up = mysqli_query($mysqli, "UPDATE tb_admin SET 
                                    nama='".$nama."', 
                                    email='".$email."', 
                                    alamat='".$alamat."' 
                                    WHERE id_admin = '".$d->id_admin."'");

                        if($up){
                            echo '<script>alert("Update data berhasil")</script>';
                            echo '<script>window.location="profil.php"</script>';
                        }
                        else{
                            echo 'gagal. '.mysqli_error($mysqli);
                        }
                    }
                ?>
            </div>
            <h3>Ubah Password</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="password" name="pass1" placeholder="Password Baru" class="input-control" required>
                    <input type="password" name="pass2" placeholder="Konfirmasi Password Baru" class="input-control"
                        required>
                    <input type="submit" name="ubah_pass" value="Ubah Password" class="btn">

                </form>

                <?php
                    if(isset($_POST['ubah_pass'])){
                        $pass1 = $_POST['pass1'];
                        $pass2 = $_POST['pass2'];
                        
                        if($pass2!=$pass1){
                            echo '<script>alert("Konfirmasi Password Baru tidak sesuai")</script>';
                        }
                        else{
                            $up_pass = mysqli_query($mysqli, "UPDATE tb_admin SET 
                                    psword ='".MD5($pass1)."'
                                    WHERE id_admin = '".$d->id_admin."'");
                            if($up_pass){
                                echo '<script>alert("Update password berhasil")</script>';
                                echo '<script>window.location="profil.php"</script>';
                            }
                            else{
                                echo 'gagal. '.mysqli_error($mysqli);
                            }
                        }
                    }
                ?>
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2021 - Xiomay Store</small>
        </div>
    </footer>
</body>

</html