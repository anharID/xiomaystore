<?php
    include 'config.php';

    if(isset($_GET['idh'])){
        $hp=mysqli_query($mysqli, "SELECT gambar FROM tb_hp WHERE id_hp='".$_GET['idh']."'");
        $h=mysqli_fetch_object($hp);
        unlink('./assets/hp/'.$h->gambar);

        $delete=mysqli_query($mysqli, "DELETE FROM tb_hp WHERE id_hp = '".$_GET['idh']."'");
        echo '<script>window.location="data-hp.php"</script>';
    }
?>