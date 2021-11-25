<?php
    $databaseHost = 'localhost';
    $databaseName = 'ta_sbd_anhar';
    $databaseUsername = 'root';
    $databasePassword = '';

    $mysqli = mysqli_connect($databaseHost, $databaseUsername,
    $databasePassword, $databaseName) or die ('gagal terhubung ke database');
?>