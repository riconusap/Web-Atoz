<?php
include('../../assets/relasi/koneksi.php');
?>


<div class="container" style="margin-top:20px">
	<center>
		<font size="6">SETTING</font>
	</center>

	<hr>

	<?php
	//jika sudah mendapatkan parameter GET id dari URL
	if (isset($_GET['id'])) {
		//membuat variabel $id untuk menyimpan id dari GET id di URL
		$id = $_GET['id'];

		//query ke database SELECT tabel produk berdasarkan id = $id
		$select = mysqli_query($konek, "SELECT * FROM home WHERE id='1'") or die(mysqli_error($konek));

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
		$isi	= $_POST['isi'];
		$about	= $_POST['about'];

		$oldFile 			= $data['bg_home'];

		$filename 		= $_FILES['file']['name'];
		$fileTmp		= $_FILES['file']['tmp_name'];
		$fileSize		= $_FILES['file']['size'];
		$fileError		= $_FILES['file']['error'];
		$fileType		= $_FILES['file']['type'];

		$fileExt 	= explode('.', $filename);

		$fileActualExt = strtolower(end($fileExt));

		$allowedExt = array('jpg', 'jpeg', 'png', 'svg','webp');
		if (empty($filename)) {
			mysqli_query($konek, "UPDATE home SET isi='$isi',about_us='$about' WHERE id='$id'") or die(mysqli_error($konek));
			echo '<script>
                alert("Berhasil menambahkan data.");
                document.location = "index.php?page=home&id='.$id.'";
                </script>';
		} else {
			if (in_array($fileActualExt, $allowedExt)) {
				$delPath = $path_logo . $oldFile;
				unlink($delPath);
				if ($fileError === 0) {
					if ($fileSize < 10485760) {
						$fileNameNew = uniqid('', true) . "." . $fileActualExt;
						$fileDestination = $path_logo . $fileNameNew;
						move_uploaded_file($fileTmp, $fileDestination);
						mysqli_query($konek, "UPDATE home SET isi='$isi',about_us='$about', bg_home='$fileNameNew' WHERE id='$id'") or die(mysqli_error($konek));
						echo '<script>
							alert("Berhasil menambahkan data.");
							document.location = "index.php?page=home&id='.$id.'";
							</script>';
					} else {
						echo
							'<script>
						alert("Ukuran File terlalu Besar.");
						document.location = "index.php?page=home&id='.$id.'";
					</script>';
					}
				} else {
					echo
						'<script>
					alert("Terjadi Kesalahan Saat Upload Gambar, Silahkan Periksa Kembali.");
					document.location = "index.php?page=home&id='.$id.'";
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
	<form action="index.php?page=home&id=1" method="post" enctype="multipart/form-data">

		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Moto</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="isi" class="form-control" value="<?php echo $data['isi']; ?>" required>
			</div>
		</div>

		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">About US</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="about" class="form-control" value="<?php echo $data['about_us']; ?>" required>
			</div>
		</div>

		
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Hackground Header</label>
			<div class="col-md-6 col-sm-6">
				<img src="assets/img/<?php echo $data['bg_home'] ?>" style="width: 130px" />
			</div>
		</div>

		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">UPLOAD LOGO</label>
			<div class="col-md-6 col-sm-6 ">
				<input id="fileUpload" type="file" name="file">
				<p style="color: red">Ukuran Maksimal : 10MB</p>
				<p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif | .svg</p>
			</div>
		</div>


		<div class="item form-group">
			<div class="col-md-6 col-sm-6 offset-md-3">
				<input id="tombol" type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</div>

	</form>

</div>