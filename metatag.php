<?php
//session dimulai
session_start();
//abaikan error pada browser
error_reporting(0);

include('./assets/relasi/koneksi.php');
include('./assets/relasi/security.php');

$sql = mysqli_query($konek, "SELECT* FROM profile_perusahaan where id='1'") or die(mysqli_error($konek)); 
$data = mysqli_fetch_array($sql);

$sql_home = mysqli_query($konek, "SELECT* FROM home where id='1'") or die(mysqli_error($konek)); 
$data_home = mysqli_fetch_array($sql_home);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    
    <!--=============== REMIXICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        
    <!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway&amp;display=swap">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">

    <title>Contractor Exhibiton | Kota Jakarta Timur | <?php echo $data['nama_perusahaan']; ?></title>
    <link rel="icon" href="<?php echo $hostname; ?>/assets/img/<?php echo $data['logo']; ?>" type="image/png" sizes="26x26">
    <link rel="stylesheet" href="<?php echo $hostname; ?>/assets/css/style_user/styles.css">

    
</head>