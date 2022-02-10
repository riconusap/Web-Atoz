<?php
//abaikan error yang muncul pada browser
error_reporting(0);
//sesi dimulai
session_start();
//panggil koneksi.php untuk menghubungkan ke database
include "assets/relasi/koneksi.php";

//jika sesi sudah admin (sudah pernah login)  maka akan  di direct ke halaman home.php
if (isset($_SESSION["author"])) {
    header("location:");
}

// function input terdapat di file koneksi.php
$user = mysqli_real_escape_string($konek, $_POST['username']);
$pass = mysqli_real_escape_string($konek, $_POST['password']);
$pass_md5 = md5($pass);

if (isset($_POST['login'])) {
    if ($user == "") {
        $er_email = "<div class='alert alert-warning alert-dismissible' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span></button>
                    <strong>Username Kosong !</strong> <br> Username wajib diisi</div>";
    } else if ($pass == "") {
        $er_pass = "<div class='alert alert-warning alert-dismissible' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span></button>
                    <strong>Password Kosong !</strong> <br> Password Wajib diisi</div>";
    } else {
        //cek apakah username terdaftar atau tidak di user
        $sql_cek = mysqli_query($konek, "SELECT * FROM admin where username='$user' and password_user='$pass_md5'");
        $cek_admin = mysqli_num_rows($sql_cek);
        if ($cek_admin == "0") {
            //jika username dan password tidak terdaftar di user
            $er_email = "<div class='alert alert-danger alert-dismissible' role='alert'>
                         <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                         <span aria-hidden='true'>&times;</span>
                         </button><strong>Login Gagal !</strong> <br>Username dan Password tidak valid</div>";
            //jika username dan password terdaftar di user maka akan menuju halaman home.php
        } else {
                $_SESSION['author'] = $user;
                echo "<script>alert('Welcome !');document.location='index.php'</script>";
        }
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>LOGIN | TAGPLAY</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css?h=b77fcacdf19cdc69ba29d7caf9b73864">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css?h=18313f04cea0e078412a028c5361bd4e">
    <link rel="stylesheet" href="assets/css/styles.min.css?h=2dfa09c36b422055eb1484a6ca4c3cca">
</head>

<body>
    <div class="container">
        <!-- Start: Login Form -->
        <div class="card shadow-lg d-xl-flex justify-content-xl-center align-items-xl-center o-hidden border-0 my-5">
            <div class="card-body p-0" style="width: 100%;height: 100%;">
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-flex">
                        <div class="flex-grow-1 bg-login-image" style="background-image: url(<?php echo $hostname; ?>assets/img/dogs/image3.jpeg?h=cbc3a40dae521ddee89bf6b026abde71);width: 100%;height: 179%;"></div>
                    </div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h4 class="text-dark mb-4">Welcome Back!</h4>
                            </div>
                            <form class="d-flex d-xl-flex flex-column justify-content-center align-items-center justify-content-xl-center align-items-xl-center" style="margin: 0px;" method="post">

                                <input type="text" name="username" style="margin: 10px;margin-right: 0px;margin-left: 0px;font-family: Lora, serif;" placeholder="Username" class="form-control" maxlength="40" value="<?php echo $_POST['username']; ?>" autofocus>

                                <div class="input-group" id="show_hide_password">
                                    <input id="pass1" style="margin: 10px;margin-right: 0px;margin-left: 0px;font-family: Lora, serif;" type="password" name="password" placeholder="Password" class="form-control" value="<?php echo $_POST['password']; ?>" maxlength="15">

                                    <div style="margin: 10px;margin-right: 0px;margin-left: 0px; border-radius:20px" class="input-group-addon">
                                        <span class="input-group-text" id="basic-addon1">
                                            <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i> </a></span>
                                    </div>
                                </div>

                                <?php echo $er_email ?>
                                <?php echo $er_pass ?>

                                <button class="btn btn-primary" name="login" type="submit" style="font-family: Lora, serif;margin-top: 16px;">Masuk</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End: Login Form -->

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="<?php echo $hostname; ?>assets/js/script.min.js?h=6a2ce2a1fe9e153fc682342fcb5d233c"></script>
    <script src="./assets/js/script.js"></script>
</body>

</html>