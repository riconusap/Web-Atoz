<?php
//set time zone location sesuai negara, jadikan Asia Jakarta
date_default_timezone_set('Asia/Jakarta');

//**************************start koneksi ***************************//

//set koneksi ke server sesuai host, user, password dan database
$server = "localhost";
$user = "atox3513_admin";
$pass = "BR]xbt1;es(5";
$database = "atox3513_db_atoz";

//koneksikan ke server
$konek = mysqli_connect($server, $user, $pass, $database) or die('Error Connection Network');

// **************************end koneksi *********************************//

//*********************pengaturan lainnya*****************************//

//buat parameter untuk mempercepat penulisan url misal

$hostname = "https://atozmp.co.id/CMS/";
$abspath = $_SERVER['DOCUMENT_ROOT'];

$path_project = $abspath . '/CMS/assets/img/project/';
$path_logo    = $abspath . '/CMS/assets/img/';
$path_pdf    = $abspath . '/CMS/assets/pdf_proposal/';
$path_ava    = $abspath . '/CMS/assets/img/avatars/';

