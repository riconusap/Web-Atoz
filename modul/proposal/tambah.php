<?php
if (isset($_POST['submit'])) {

    

    $id_user    	= $user['id_user'];
	$judul		    = $_POST['judul'];

    $filename 		= $_FILES['file']['name'];
	$fileTmp		= $_FILES['file']['tmp_name'];
	$fileSize		= $_FILES['file']['size'];
	$fileError		= $_FILES['file']['error'];
	$fileType		= $_FILES['file']['type'];

	$fileExt = explode('.', $filename);
	$fileActualExt = strtolower(end($fileExt));

	$allowedExt = array('pdf', 'docx');

	if (in_array($fileActualExt, $allowedExt)) {
		if ($fileError === 0) {
			if ($fileSize < 10485760) {
				$fileNameNew = uniqid('', true) . "." . $fileActualExt;
				$fileDestination = $path_pdf . $fileNameNew;
				move_uploaded_file($fileTmp, $fileDestination);
				$cek_berita = mysqli_query($konek, "SELECT * FROM inbox_proposal WHERE id_proposal='$id'") or die(mysqli_error($konek));
				if (mysqli_num_rows($cek_berita) == 0) {
					mysqli_query($konek, "INSERT INTO inbox_proposal VALUES(id_proposal=null, '$judul' , '$fileNameNew' , '$id_user', timestamp=null, 'On Hold' )") or die(mysqli_error($konek));
					echo '<script>
							alert("Berhasil menambahkan data.");
							document.location = "index.php?page=inbox_proposal&username='. $user['email'] .'";
							</script>';
				} else {
					echo '<script>
							alert("Tidak Berhasil Menambahkan Data ke Database.");
							document.location = "index.php?page=inbox_proposal&username='. $user['email'] .'";
						  </script>';
				}   
			} else {
				echo
				'<script>
						alert("Ukuran File terlalu Besar.");
						document.location = "index.php?page=inbox_proposal&username='. $user['email'] .'";
					</script>';
			}
		} else {
			echo
			'<script>
					alert("Terjadi Kesalahan Saat Upload Gambar, Silahkan Periksa Kembali.");
					document.location = "index.php?page=inbox_proposal&username='. $user['email'] .'";
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


<form action="index.php?page=tambah_proposal" method="post" enctype="multipart/form-data">
<div class="container-fluid">
    <h3 class="text-center text-dark mb-4">Tambah Project&nbsp;</h3>
    <div class="card shadow">
        <div class="card-header py-3"></div>
        <div class="card-body">
            <div class="row">

                <div class="col-auto d-xl-flex justify-content-xl-start" style="width: 100%;margin-bottom: 10px;">
                    <p class="text-dark d-xl-flex justify-content-xl-center align-items-xl-center" style="font-size: 23px;margin: 10px;width: 50%;">Judul Proposal</p>
                    <input class="border rounded shadow-sm" name="judul" type="text" style="width: 50%;">
                </div>

                <div class="col-auto d-xl-flex justify-content-xl-start" style="width: 100%;margin-bottom: 10px;">
                    <p class="text-dark d-xl-flex justify-content-xl-center align-items-xl-center" style="font-size: 23px;margin: 10px;width: 50%;">PDF</p>
                    <input class="border rounded shadow-sm" name="file" type="file" style="width: 50%;">
                </div>
				
				<div class="item form-group d-flex justify-content-center w-100 mt-4">
					<div class="col-md-6 col-sm-6 offset-md-3 d-flex f-left">
						<input  id="tombol" type="submit" name="submit" class="btn btn-primary m-3" value="Simpan">
						<a href="index.php?page=inbox_proposal&username=<?php echo $user['email'] ?>" class="btn btn-warning m-3">Kembali</a>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
</div>
</form>