<?php
    session_start();
    if($_SESSION['status']!=true){
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
            <h3>Dashboard</h3>
            <div class="box">
                <h4>Selamat Datang, <?php echo $_SESSION['a_global'] -> nama ?></h4>
            </div>
        </div>
    </div>

    <div class="session">
        <div class="container">
            <h3>Riwayat Transaksi Pembeli</h3>
            <div class="box">
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Produk dibeli</th>
                            <th>Harga</th>
                            <th>Nama Pembeli</th>
                            <th>Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'config.php';
                            $no=1;
                            $transaksi = mysqli_query($mysqli, "SELECT * FROM view_transaksi");

                            if(mysqli_num_rows($transaksi) > 0 ){
                            while($row=mysqli_fetch_object($transaksi)){
                            ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row->tanggal ?></td>
                            <td><?php echo $row->produk ?></td>
                            <td><?php echo $row->harga ?></td>
                            <td><?php echo $row->nama ?></td>
                            <td><?php echo $row->alamat ?></td>
                        </tr>
                        <?php }} else{ ?>
                        <td colspan="6">Tidak ada data</td>
                        <?php } ?>
                    </tbody>
                </table>
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

</html>