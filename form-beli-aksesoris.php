<?php
    include 'config.php';

    if($_GET['id-a']){
        $aksesoris = mysqli_query($mysqli, "SELECT * FROM tb_aksesoris WHERE id_aksesoris = '".$_GET['id-a']."' ");
        $a = mysqli_fetch_array($aksesoris);
        $produk = $a['nama'];
        $harga = $a['harga'];
        $stok=$a['stok'];
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

    <div class="session">
        <div class="container">
            <h3>Detail Pembelian</h3>
            <div class="box">
                <div>
                    <h4 style="color: red;">Nama Produk</h4>
                    <p class="nama"><?php echo $produk ?></p>
                    <h4 style="color: red;">Harga</h4>
                    <p class="harga">Rp. <?php echo number_format($harga) ?></p>

                </div>
            </div>
        </div>
    </div>

    <div class="session">
        <div class="container">
            <h3>Form Pembelian</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="date" name="tanggal" class="input-control" required>
                    <input type="text" name="nama" placeholder="Masukkan Nama Anda" class="input-control" required>
                    <input type="text" name="alamat" placeholder="Alamat" class="input-control" required>
                    <input type="submit" name="submit" value="Konfirmasi" class="btn">

                </form>

                <?php
                    if(isset($_POST['submit'])){
                        $tgl = ucwords($_POST['tanggal']) ;
                        $nama = ucwords($_POST['nama']) ;
                        $alamat = ucwords($_POST['alamat']) ;

                        $trpembeli = mysqli_query($mysqli, "INSERT INTO tb_pembeli VALUES( 
                                    null,
                                   '".$nama."', 
                                   '".$alamat."' )");
                        
                        if($trpembeli){

                            $trproduk = mysqli_query($mysqli, "INSERT INTO tb_transaksi VALUES (
                                    null,
                                    '".$tgl."',
                                    '".$produk."',
                                    '".$harga."' )");
                            
                            
                            $after = mysqli_query($mysqli, "UPDATE tb_aksesoris SET stok = '".$stok."'-1 WHERE id_aksesoris = '".$a['id_aksesoris']."' ");

                            echo '<script>alert("Terimakasih")</script>';
                            echo '<script>window.location="aksesoris.php"</script>';
                        }
                        else{
                            echo 'gagal. '.mysqli_error($mysqli);
                        }
                    }
                ?>
            </div>
        </div>
    </div>

</body>

</html>