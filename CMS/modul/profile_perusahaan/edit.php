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
		$select = mysqli_query($konek, "SELECT * FROM profile_perusahaan WHERE id='$id'") or die(mysqli_error($konek));

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
		$nama_perusahaan	= $_POST['nama_perusahaan'];

		$no_telp1			= $_POST['no_telp1'];
		$no_telp2			= $_POST['no_telp2'];
		$no_telp			= $_POST['no_telp'];

		$maps				= $_POST['maps'];
		$alamat				= $_POST['alamat'];
		$email				= $_POST['email'];

		$oldFile 			= $data['logo'];

		$filename 		= $_FILES['file']['name'];
		$fileTmp		= $_FILES['file']['tmp_name'];
		$fileSize		= $_FILES['file']['size'];
		$fileError		= $_FILES['file']['error'];
		$fileType		= $_FILES['file']['type'];

		$fileExt 	= explode('.', $filename);

		$fileActualExt = strtolower(end($fileExt));

		$allowedExt = array('jpg', 'jpeg', 'png', 'svg');
		if (empty($filename)) {
			mysqli_query($konek, "UPDATE profile_perusahaan SET nama_perusahaan='$nama_perusahaan',no_telp='$no_telp',no_telp1='$no_telp1',no_telp2='$no_telp2',email='$email',place_id='$maps',alamat='$alamat' WHERE id='$id'") or die(mysqli_error($konek));
			echo '<script>
                alert("Berhasil menambahkan data.");
                document.location = "index.php?page=profile_perusahaan&id='.$id.'";
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
						mysqli_query($konek, "UPDATE profile_perusahaan SET nama_perusahaan='$nama_perusahaan',no_telp='$no_telp',no_telp1='$no_telp1',no_telp2='$no_telp2',email='$email',place_id='$maps',alamat='$alamat', logo='$fileNameNew' WHERE id='$id'") or die(mysqli_error($konek));
						echo '<script>
							alert("Berhasil menambahkan data.");
							document.location = "index.php?page=profile_perusahaan&id='.$id.'";
							</script>';
					} else {
						echo
							'<script>
						alert("Ukuran File terlalu Besar.");
						document.location = "index.php?page=profile_perusahaan&id='.$id.'";
					</script>';
					}
				} else {
					echo
						'<script>
					alert("Terjadi Kesalahan Saat Upload Gambar, Silahkan Periksa Kembali.");
					document.location = "index.php?page=profile_perusahaan&id='.$id.'";
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
	<form action="index.php?page=profile_perusahaan&id=1" method="post" enctype="multipart/form-data">

		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Perusahaan</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="nama_perusahaan" class="form-control" value="<?php echo $data['nama_perusahaan']; ?>" required>
			</div>
		</div>

		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">No Telepon (Tanpa 0)</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="no_telp" class="form-control" value="<?php echo $data['no_telp']; ?>" required>
			</div>
		</div>

		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">No Wa 1 (Tanpa 0)</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="no_telp1" class="form-control" value="<?php echo $data['no_telp1']; ?>" required>
			</div>
		</div>

		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">No Wa 2 (Tanpa 0)</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="no_telp2" class="form-control" value="<?php echo $data['no_telp2']; ?>" required>
			</div>
		</div>

		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Email</label>
			<div class="col-md-6 col-sm-6">
				<input type="email" name="email" class="form-control" value="<?php echo $data['email']; ?>" required>
			</div>
		</div>

		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Alamat</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="alamat" class="form-control" value="<?php echo $data['alamat']; ?>" required>
			</div>
		</div>

		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Maps (Place ID)</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="maps" class="form-control" value="<?php echo $data['place_id']; ?>" required>
			</div>
		</div>

		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Logo Perusahaan</label>
			<div class="col-md-6 col-sm-6">
				<img src="assets/img/<?php echo $data['logo'] ?>" style="width: 130px" />
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