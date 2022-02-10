<?php
//abaikan error yang muncul pada browser
error_reporting(0);
//sesi dimulai
session_start();
//panggil koneksi.php untuk menghubungkan ke database
include "cms/assets/relasi/koneksi.php";

//jika sesi sudah admin (sudah pernah login)  maka akan  di direct ke halaman home.php
if (isset($_SESSION["user"])) {
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
        $sql_cek = mysqli_query($konek, "SELECT * FROM user where email='$user' and password_user='$pass_md5'");
        $cek_admin = mysqli_num_rows($sql_cek);
        if ($cek_admin == "0") {
            //jika username dan password tidak terdaftar di user
            $er_email = "<div class='alert alert-danger alert-dismissible' role='alert'>
                         <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                         <span aria-hidden='true'>&times;</span>
                         </button><strong>Login Gagal !</strong> <br>Username dan Password tidak valid</div>";
            //jika username dan password terdaftar di user maka akan menuju halaman home.php
        } else {
                $_SESSION['user'] = $user;
                echo "<script>alert('Welcome !');document.location='index.php'</script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway&amp;display=swap">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body>
    <!-- Start: Login Form Clean -->
    <section class="login-clean">
        <form method="post">
            <h2 class="visually-hidden">Login Form</h2>
            <div class="illustration"><img src="assets/img/logo%201.png?h=b4d4be1201fe545b11839357006488be" width="150px"></div>
            <div class="mb-3">
                <input class="form-control" type="email" name="username" placeholder="Email" value="<?php echo $_POST['email']; ?>">
            </div>
            <div class="input-group" id="show_hide_password">
                <input id="pass1" style="margin: 10px;margin-right: 0px;margin-left: 0px;font-family: Lora, serif;" type="password" name="password" placeholder="Password" class="form-control" value="<?php echo $_POST['password']; ?>" maxlength="15">

                <div style="margin: 10px;margin-right: 0px;margin-left: 0px; border-radius:20px" class="input-group-addon">
                    <span class="input-group-text" id="basic-addon1">
                        <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i> </a></span>
                </div>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary d-block w-100" type="submit" name="login" style="background: rgb(14,46,63);">Log In</button>
            </div>

            <?php echo $er_email ?>
            <?php echo $er_pass ?>
            
            <a class="forgot" href="register.php">Click Here To Register</a>
            <a class="forgot" href="#">Forgot your email or password?</a>
            <br>
            <a class="forgot" href="index.php?page=home">Kembali</a>
            
            
        </form>
        
    </section><!-- End: Login Form Clean -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.min.js?h=6dac8d294ec5d11ebfbcf6a98f7a20a5"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="<?php echo $hostname; ?>assets/js/script.min.js"></script>
    <script>
        $(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });
});
    </script>
</body>

</html>