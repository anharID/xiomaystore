<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Xiomay Sotre</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>

<body id="bg-login">
    <div class="box-login">
        <h2>Login</h2>
        <form auction="" method="POST">
            <input type="text" name="email" placeholder="Masukkan Email" class="input-control">
            <input type="password" name="pass" placeholder="Password" class="input-control">
            <input type="submit" name="submit" value="login" class="btn">
        </form>
        <?php
            
            if(isset($_POST['submit'])){
                include "config.php";
                session_start();
                $email = $_POST['email'];
                $pass = $_POST['pass'];

                $cek = mysqli_query($mysqli, "SELECT * FROM tb_admin WHERE email = '".$email."' AND psword = '".MD5($pass)."'");

                if (mysqli_num_rows($cek)>0){
                    $d = mysqli_fetch_object($cek);
                    $_SESSION["status"] = true;
                    $_SESSION["a_global"] = $d;
                    $_SESSION["id"] = $d -> id_admin;

                    echo '<script>window.location="dashboard.php"</script>';
                }
                else{
                    echo '<script>alert("Email atau Password tidak sesuai")</script>';
                }
            }
            ?>
    </div>
</body>

</html>