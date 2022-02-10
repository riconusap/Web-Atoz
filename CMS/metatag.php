<?php
//session dimulai
session_start();
//abaikan error pada browser
error_reporting(0);
//panggil file koneksi untuk mengkoneksinkan dengan database
include "assets/relasi/koneksi.php";
//panggil file security untuk mengecek session admin
include "assets/relasi/security.php";

$data_setting = mysqli_fetch_assoc(mysqli_query($konek, "SELECT * FROM profile_perusahaan"));
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - <?php echo $data_setting['nama_perusahaan'] ?></title>
    <link rel="stylesheet" href="<?php echo $hostname; ?>assets/bootstrap/css/bootstrap.min.css?h=533bf8cde801c1db51ec98ecb8864293">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?php echo $hostname; ?>assets/fonts/fontawesome5-overrides.min.css?h=18313f04cea0e078412a028c5361bd4e">
    <link rel="stylesheet" href="<?php echo $hostname; ?>assets/css/styles.min.css?h=2dfa09c36b422055eb1484a6ca4c3cca">
    <link rel="stylesheet" href="<?php echo $hostname; ?>assets/css/project.css">
    <link rel="stylesheet" href="<?php echo $hostname; ?>assets/css/styles_main.css">

    <script src="https://cdn.ckeditor.com/4.16.0/basic/ckeditor.js"></script>
    <link rel="icon" href="./assets/img/<?php echo $data_setting['logo'] ?>" type="image/png" sizes="26x26">
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
</head>