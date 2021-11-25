<?php 
	session_start();
	include 'config.php';
	if($_SESSION['status'] != true){
		echo '<script>window.location="login.php"</script>';
	}
    $hp = mysqli_query($mysqli, "SELECT * FROM tb_hp WHERE id_hp = '".$_GET['id']."' ");
	if(mysqli_num_rows($hp) == 0){
		echo '<script>window.location="data-produk.php"</script>';
	}
	$h = mysqli_fetch_object($hp);

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
                    <input type="text" name="nama" placeholder="Nama Produk" value="<?php echo $h->nama ?>" class="
                        input-control" required>
                    <input type="text" name="harga" placeholder="Harga" value="<?php echo $h->harga ?>"
                        class="input-control" required>
                    <img src="assets/hp/<?php echo $h->gambar ?>" width="150px">
                    <input type="hidden" name="foto" value="<?php echo $h->gambar ?>">
                    <input type="file" name="gambar" class="input-control">
                    <input type="text" name="stok" placeholder="Stok" value="<?php echo $h->stok ?>"
                        class="input-control" required>
                    <input type="submit" name="submit" value="Submit" class="btn">
                </form>

                <?php 
					if(isset($_POST['submit'])){

						// data inputan dari form
						$nama = $_POST['nama'];
						$harga = $_POST['harga'];
						$stok = $_POST['stok'];
						$foto = $_POST['foto'];

						// data gambar yang baru
						$filename = $_FILES['gambar']['name'];
						$tmp_name = $_FILES['gambar']['tmp_name'];

						

						// jika admin ganti gambar
						if($filename != ''){
							$type1 = explode('.', $filename);
							$type2 = $type1[1];

							$newname = 'hp'.time().'.'.$type2;

							// menampung data format file yang diizinkan
							$tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

							// validasi format file
							if(!in_array($type2, $tipe_diizinkan)){
								// jika format file tidak ada di dalam tipe diizinkan
								echo '<script>alert("Format file tidak diizinkan")</scrtip>';

							}else{
								unlink('./assets/hp/'.$foto);
								move_uploaded_file($tmp_name, './assets/hp/'.$newname);
								$namagambar = $newname;
							}

						}else{
							// jika admin tidak ganti gambar
							$namagambar = $foto;
							
						}

						// query update data produk
						$update = mysqli_query($mysqli, "UPDATE tb_hp SET 
						nama = '".$nama."',
						gambar = '".$namagambar."',
						harga = '".$harga."',
						stok = '".$stok."'
						WHERE id_hp = '".$h->id_hp."' ");

						if($update){
							echo '<script>alert("Ubah data berhasil")</script>';
							echo '<script>window.location="data-hp.php"</script>';
						}else{
							echo 'gagal '.mysqli_error($mysqli);
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