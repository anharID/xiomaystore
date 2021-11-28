<?php
    include 'config.php';
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
                <li><a href="index.php">HP</a></li>
                <li><a href="aksesoris.php">Aksesoris</a></li>
                <li><a href="ekosistem.php">Ekosistem</a></li>
            </ul>
        </div>
    </header>

    <!-- search -->
    <div class="search">
        <div class="container">
            <form action="aksesoris.php">
                <input type="text" name="search" placeholder="Cari Produk">
                <input type="submit" name="cari" value="Cari Produk">
            </form>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <h3>Daftar Aksesoris Tersedia</h3>
            <div class="box">
                <?php 
                    
					$aksesoris = mysqli_query($mysqli, "SELECT * FROM tb_aksesoris  ORDER BY id_aksesoris DESC");
                    if(isset($_GET['search'])){
                        $aksesoris = mysqli_query($mysqli, "SELECT * FROM tb_aksesoris WHERE nama LIKE '%".$_GET['search']."%' ORDER BY id_aksesoris DESC");
                    }
					if(mysqli_num_rows($aksesoris) > 0){
						while($a = mysqli_fetch_array($aksesoris)){
				?>
                <a href="form-beli-aksesoris.php?id-a=<?php echo $a['id_aksesoris'] ?>">
                    <div class="col-4">
                        <img src="assets/aksesoris/<?php echo $a['gambar']?>">
                        <p class="nama"><?php echo $a['nama'] ?></p>
                        <p class="harga">Rp. <?php echo number_format($a['harga']) ?></p>
                    </div>
                </a>
                <?php }}else{ ?>
                <p>Produk tidak ada</p>
                <?php } ?>
            </div>
        </div>
    </div>


</body>

</html>