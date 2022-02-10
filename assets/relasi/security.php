<?php
if (isset($_SESSION['user'])) {
    if (isset($_SESSION['user'])) {
            $akun = $_SESSION['user'];
            $user = mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM user where email='$akun'"));
    }
} else {
    // header('location:index.php');
}