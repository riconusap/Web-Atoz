
<?php
include('../../assets/relasi/koneksi.php');
?>


	<?php
	//jika sudah mendapatkan parameter GET id dari URL
	if (isset($_GET['id'])) {
		//membuat variabel $id untuk menyimpan id dari GET id di URL
		$id = $_GET['id'];

		//query ke database SELECT tabel produk berdasarkan id = $id
		$select = mysqli_query($konek, "SELECT * FROM project WHERE id_project='$id'") or die(mysqli_error($konek));

		//jika hasil query = 0 maka muncul pesan error
		if (mysqli_num_rows($select) == 0) {
			echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
			exit();
			//jika hasil query > 0
		} else {
			//membuat variabel $data dan menyimpan data row dari query
			$data = mysqli_fetch_assoc($select);
		}
	}
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

	$oldFile 		= $data['thumbnail'];

	$fileExt = explode('.', $filename);
	$fileActualExt = strtolower(end($fileExt));

	$allowedExt = array('jpg', 'jpeg', 'png', 'svg', 'webp');
	
	if (empty($filename)) {
		mysqli_query($konek, "UPDATE project SET nama_event='$nama_event',lokasi='$lokasi',tahun='$tahun', id_admin='$id_user', timestamp=null WHERE id_project=$id") or die(mysqli_error($konek));
		echo '<script>
						alert("Berhasil menambahkan data.");
						document.location = "index.php?page=project";
						</script>';
	} else {
		if (in_array($fileActualExt, $allowedExt)) {
			$delPath = $path_project . $oldFile;
			unlink($delPath);
			if ($fileError === 0) {
				if ($fileSize < 10485760) {
					$fileNameNew = uniqid('', true) . "." . $fileActualExt;
					$fileDestination = $path_project . $fileNameNew;
					move_uploaded_file($fileTmp, $fileDestination);
					mysqli_query($konek, "UPDATE project SET nama_event='$nama_event',lokasi='$lokasi',tahun='$tahun',thumbnail='$fileNameNew' , id_admin='$id_user',timestamp=null WHERE id_project=$id") or die(mysqli_error($konek));
					echo '<script>
						alert("Berhasil menambahkan data.");
						document.location = "index.php?page=project";
						</script>';
				} else {
					echo
						'<script>
					alert("Ukuran File terlalu Besar.");
					document.location = "index.php?page=project";
				</script>';
				}
			} else {
				echo
					'<script>
				alert("Terjadi Kesalahan Saat Upload Gambar, Silahkan Periksa Kembali.");
				document.location = "index.php?page=project";
			</script>';
			}
		} else {
			echo
				'<script>
			alert("Ekstensi Gambar Tidak Di Izinkan.");
		</script>';
		}
	}
}
?>
<form action="index.php?page=edit_project&id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
<div class="container-fluid">
    <h3 class="text-center text-dark mb-4">Edit Project&nbsp;</h3>
    <div class="card shadow">
        <div class="card-header py-3"></div>
        <div class="card-body">
            <div class="row">

                <div class="col-auto d-xl-flex justify-content-xl-start" style="width: 100%;margin-bottom: 10px;">
                    <p class="text-dark d-xl-flex justify-content-xl-center align-items-xl-center" style="font-size: 23px;margin: 10px;width: 50%;">Nama Event</p>
					<input class="border rounded shadow-sm" name="nama_event" type="text" style="width: 50%;" value="<?= $data['nama_event']; ?>">
                </div>

				<div class="col-auto d-xl-flex justify-content-xl-start" style="width: 100%;margin-bottom: 10px;">
                    <p class="text-dark d-xl-flex justify-content-xl-center align-items-xl-center" style="font-size: 23px;margin: 10px;width: 50%;">Lokasi</p>
					<input class="border rounded shadow-sm" type="text" name="lokasi" style="width: 50%;" value="<?= $data['lokasi']; ?>">
                </div>

				<div class="col-auto d-xl-flex justify-content-xl-start" style="width: 100%;margin-bottom: 10px;">
                    <p class="text-dark d-xl-flex justify-content-xl-center align-items-xl-center" style="font-size: 23px;margin: 10px;width: 50%;">Tahun</p>
					<input class="border rounded shadow-sm" type="text" name="tahun" style="width: 50%;" value="<?= $data['tahun']; ?>">
                </div>

				<div class="col-auto d-xl-flex justify-content-xl-start" style="width: 100%;margin-bottom: 10px;">
				<label class="col-form-label col-md-3 col-sm-3 label-align"> Thumbnail </label>
					<img src="assets/img/project/<?php echo $data['thumbnail'] ?>" style="width: 130px" />
                </div>

				<div class="col-auto d-xl-flex justify-content-xl-start" style="width: 100%;margin-bottom: 10px;">
					<label class="col-form-label col-md-3 col-sm-3 label-align">UPDATE THUMBNAIL</label>
				<input id="fileUpload" type="file" name="file">
					<p style="color: red">Ukuran Maksimal : 10MB</p>
					<p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif | .svg | .Webp</p>
                </div>


                <div class="col-auto d-xl-flex flex-column justify-content-xl-start" style="width: 100%;">
                    <button class="btn btn-primary" name="submit" type="submit">Simpan</button>
					<a href="index.php?page=prject" class="btn btn-warning">Kembali</a>
                </div>


				
            </div>
        </div>
    </div>
</div>
</div>
</form>