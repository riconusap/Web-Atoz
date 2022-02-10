<?php

include('../../assets/relasi/koneksi.php');
include('../../assets/relasi/security.php');

?>
<?php
if (isset($_POST['submit'])) {

    $id_user    	= $admin['id_admin'];
	$nama_event		= $_POST['nama_event'];
	$lokasi			= $_POST['lokasi'];
	$tahun			= $_POST['tahun'];

    $filename 		= $_FILES['file']['name'];
	$fileTmp		= $_FILES['file']['tmp_name'];
	$fileSize		= $_FILES['file']['size'];
	$fileError		= $_FILES['file']['error'];
	$fileType		= $_FILES['file']['type'];

	$fileExt = explode('.', $filename);
	$fileActualExt = strtolower(end($fileExt));

	$allowedExt = array('jpg', 'jpeg', 'png', 'svg');

	if (in_array($fileActualExt, $allowedExt)) {
		if ($fileError === 0) {
			if ($fileSize < 10485760) {
				$fileNameNew = uniqid('', true) . "." . $fileActualExt;
				$fileDestination = $path_project . $fileNameNew;
				move_uploaded_file($fileTmp, $fileDestination);
				$cek_berita = mysqli_query($konek, "SELECT * FROM project WHERE id_project='$id'") or die(mysqli_error($konek));
				if (mysqli_num_rows($cek_berita) == 0) {
					mysqli_query($konek, "INSERT INTO project VALUES(id_project=null ,'$nama_event','$lokasi','$tahun', '$fileNameNew' , '$id_user', timestamp=null )") or die(mysqli_error($konek));
					echo '<script>
							alert("Berhasil menambahkan data.");
							document.location = "index.php?page=project";
							</script>';
				} else {
					echo '<script>
							alert("Tidak Berhasil Menambahkan Data ke Database.");
							document.location = "index.php?page=project";
						  </script>';
				}   
			} else {
				echo
				'<script>
						alert("Ukuran File terlalu Besar.");
						document.location = "index.php?page=page=project";
					</script>';
			}
		} else {
			echo
			'<script>
					alert("Terjadi Kesalahan Saat Upload Gambar, Silahkan Periksa Kembali.");
					document.location = "index.php?page=page=project";
				</script>';
		}
	} else {
		echo
		'<script>
				alert("Ekstensi Gambar Tidak Di Izinkan.");
			</script>';
	}
}
?>


<form action="index.php?page=tambah_project" method="post" enctype="multipart/form-data">
<div class="container-fluid">
    <h3 class="text-center text-dark mb-4">Tambah Project&nbsp;</h3>
    <div class="card shadow">
        <div class="card-header py-3"></div>
        <div class="card-body">
            <div class="row">

                <div class="col-auto d-xl-flex justify-content-xl-start" style="width: 100%;margin-bottom: 10px;">
                    <p class="text-dark d-xl-flex justify-content-xl-center align-items-xl-center" style="font-size: 23px;margin: 10px;width: 50%;">Nama Event</p>
                    <input class="border rounded shadow-sm" name="nama_event" type="text" style="width: 50%;">
                </div>

				<div class="col-auto d-xl-flex justify-content-xl-start" style="width: 100%;margin-bottom: 10px;">
                    <p class="text-dark d-xl-flex justify-content-xl-center align-items-xl-center" style="font-size: 23px;margin: 10px;width: 50%;">Lokasi</p>
                    <input class="border rounded shadow-sm" name="lokasi" type="text" style="width: 50%;">
                </div>

				<div class="col-auto d-xl-flex justify-content-xl-start" style="width: 100%;margin-bottom: 10px;">
                    <p class="text-dark d-xl-flex justify-content-xl-center align-items-xl-center" style="font-size: 23px;margin: 10px;width: 50%;">Tahun</p>
                    <input class="border rounded shadow-sm" name="tahun" type="text" style="width: 50%;">
                </div>
				
                <div class="col-auto d-xl-flex justify-content-xl-start" style="width: 100%;margin-bottom: 10px;">
                    <p class="text-dark d-xl-flex justify-content-xl-center align-items-xl-center" style="font-size: 23px;margin: 10px;width: 50%;">Gambar</p>
                    <input class="border rounded shadow-sm" name="file" type="file" style="width: 50%;">
                </div>
				
				<div class="item form-group d-flex justify-content-center w-100 mt-4">
					<div class="col-md-6 col-sm-6 offset-md-3 d-flex f-left">
						<input  id="tombol" type="submit" name="submit" class="btn btn-primary m-3" value="Simpan">
						<a href="index.php?page=tampil_produk" class="btn btn-warning m-3">Kembali</a>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
</div>
</form>