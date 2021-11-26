<?php
    include 'config.php';

    if(isset($_GET['idh'])){
        $getdelete=mysqli_query($mysqli, "SELECT gambar FROM tb_hp WHERE id_hp='".$_GET['idh']."'");
        $d=mysqli_fetch_object($getdelete);
        unlink('./assets/hp/'.$d->gambar);

        $delete_hp=mysqli_query($mysqli, "DELETE FROM tb_hp WHERE id_hp = '".$_GET['idh']."'");
        echo '<script>window.location="data-hp.php"</script>';
    }

    if(isset($_GET['id_a'])){
        $getdelete=mysqli_query($mysqli, "SELECT gambar FROM tb_aksesoris WHERE id_aksesoris='".$_GET['id_a']."'");
        $d=mysqli_fetch_object($getdelete);
        unlink('./assets/aksesoris/'.$a->gambar);

        $delete_aksesoris=mysqli_query($mysqli, "DELETE FROM tb_aksesoris WHERE id_aksesoris = '".$_GET['id_a']."'");
        echo '<script>window.location="data-aksesoris.php"</script>';
    }

    if(isset($_GET['id_e'])){
        $getdelete=mysqli_query($mysqli, "SELECT gambar FROM tb_ekosistem WHERE id_produk='".$_GET['id_e']."'");
        $d=mysqli_fetch_object($getdelete);
        unlink('./assets/ekosistem/'.$d->gambar);

        $delete_ekosistem=mysqli_query($mysqli, "DELETE FROM tb_ekosistem WHERE id_produk = '".$_GET['id_e']."'");
        echo '<script>window.location="data-ekosistem.php"</script>';
    }
?>