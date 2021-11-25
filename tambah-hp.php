<?php 
	session_start();
	include 'config.php';
	if($_SESSION['status'] != true){
		echo '<script>window.location="login.php"</script>';
	}
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
    <!-- header -->
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
    <div class="section">
        <div class="container">
            <h3>Edit Data HP</h3>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="text" name="nama" placeholder="Nama Produk" class="input-control" required>
                    <input type="text" name="harga" placeholder="Harga" class="input-control" required>
                    <input type="file" name="gambar" class="input-control" required>
                    <input type="text" name="stok" placeholder="Stok" class="input-control" required>
                    <input type="submit" name="submit" value="Submit" class="btn">
                </form>
                <?php 

                    if(isset($_POST['submit'])){
                        // print_r($_FILES['gambar']);

                        //menampung data dari form
						$nama 		= $_POST['nama'];
						$harga 		= $_POST['harga'];
						$stok 	= $_POST['stok'];

                        //menampung data upload
                        $filename = $_FILES['gambar']['name'];
						$tmp_name = $_FILES['gambar']['tmp_name'];
                        $tipe1 = explode('.', $filename);
						$tipe2 = $tipe1[1];

                        $newname = 'hp'.time().'.'.$tipe2;

                        //menampung data format yang diizinkan
                        $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                        //validasi data format
                        if(!in_array($tipe2, $tipe_diizinkan)){
                            //jika format file tidak sesuai
                            echo '<script>alert("Format file tidak sesuai")</script>';
                        }
                        else{
                            //jika format file sesuai
                            //proses upload dan insert
                            move_uploaded_file($tmp_name, './assets/hp/'.$newname);

                            $insert = $insert = mysqli_query($mysqli, "INSERT INTO tb_hp VALUES (
                            null,
                            '".$nama."',
                            '".$newname."',
                            '".$harga."',
                            '".$stok."'
                                ) ");

                                if($insert){
                                    echo '<script>alert("Tambah data berhasil")</script>';
                                    echo '<script>window.location="data-hp.php"</script>';
                                }else{
                                    echo 'gagal '.mysqli_error($mysqli);
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
            <small>Copyright &copy; 2020 - Bukawarung.</small>
        </div>
    </footer>
</body>

</html>