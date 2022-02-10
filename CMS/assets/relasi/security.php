<?php

//jika session tidak sesuai dengan data_admin  maka akan diarahkan ke halaman logout.php atau keluar dari sistem
if (isset($_SESSION['author'])) {
        if (isset($_SESSION['author'])) {
                $akun = $_SESSION['author'];
                $admin = mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM admin where username='$akun'"));
        }
} else {
        //jika session sesuai maka session akan digunakan untuk memanggil data dari user
        header('location:logout.php');
}


