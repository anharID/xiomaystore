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
            <form action="index.php" method="get">
                <input type="text" name="keyword" placeholder="Cari Sesuatu">
                <input type="submit" name="search" value="Cari Produk">
            </form>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <h3>Daftar HP Tersedia</h3>
            <div class="box">

                <?php
                        $hp = mysqli_query($mysqli, "SELECT * FROM tb_hp  ORDER BY id_hp DESC");
                        if(isset($_GET['keyword'])){
                            $hp = mysqli_query($mysqli, "SELECT * FROM tb_hp WHERE nama LIKE '%".$_GET['keyword']."%' ORDER BY id_hp DESC");
                        }
					    if(mysqli_num_rows($hp) > 0){
						while($h = mysqli_fetch_array($hp)){
                            
				?>
                <a href="form-beli-hp.php?id-hp=<?php echo $h['id_hp'] ?>">
                    <div class="col-4">
                        <img src="assets/hp/<?php echo $h['gambar'] ?>">
                        <p class="nama"><?php echo substr($h['nama'], 0, 30) ?></p>
                        <p class="harga">Rp. <?php echo number_format($h['harga']) ?></p>
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