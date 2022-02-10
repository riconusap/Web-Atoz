<?php
include('../../koneksi.php');
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
		$select = mysqli_query($conect, "SELECT * FROM setting WHERE id='$id'") or die(mysqli_error($conect));

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
		$ig				= $_POST['ig'];
		$fb				= $_POST['fb'];
		$twitter		= $_POST['twitter'];

		$perkenalan		= $_POST['perkenalan'];

		$maps			= $_POST['maps'];
		$telepon		= $_POST['telepon'];
		$email			= $_POST['email'];
		$yt				= $_POST['yt'];

		$oldFileNavbar 		= $data['gambar_produk'];
		$oldFileLogo		= $data['gambar_produk'];
		$oldFileToko 		= $data['gambar_produk'];

		$filenameNav 		= $_FILES['background_navbar']['name'];
		$fileTmpNav			= $_FILES['background_navbar']['tmp_name'];
		$fileSizeNav		= $_FILES['background_navbar']['size'];
		$fileErrorNav		= $_FILES['background_navbar']['error'];
		$fileTypeNav		= $_FILES['background_navbar']['type'];

		$filenamelogo 		= $_FILES['logo']['name'];
		$fileTmplogo		= $_FILES['logo']['tmp_name'];
		$fileSizelogo		= $_FILES['logo']['size'];
		$fileErrorlogo		= $_FILES['logo']['error'];
		$fileTypelogo		= $_FILES['logo']['type'];

		$filenameToko 		= $_FILES['toko_fisik']['name'];
		$fileTmpToko		= $_FILES['toko_fisik']['tmp_name'];
		$fileSizeToko		= $_FILES['toko_fisik']['size'];
		$fileErrorToko		= $_FILES['toko_fisik']['error'];
		$fileTypeToko		= $_FILES['toko_fisik']['type'];

		$fileExtNav 	= explode('.', $filenameNav);
		$fileExtLogo	= explode('.', $filenamelogo);
		$fileExtToko	= explode('.', $filenameToko);

		$fileActualExtNav = strtolower(end($fileExtNav));
		$fileActualExtLogo = strtolower(end($fileExtLogo));
		$fileActualExtToko = strtolower(end($fileExtToko));

		$allowedExt = array('jpg', 'jpeg', 'png', 'svg');
		if (!isset($_FILES[$filenameToko])) {
			include('toko.php');
		} else if (!isset($_FILES[$filenameNav])) {
			include('nav.php');
		} elseif (!isset($_FILES[$filenamelogo])) {
			include('logo.php');
		} else if (!isset($_FILES[$filenamelogo]) && !isset($_FILES[$filenameNav]) && !isset($_FILES[$filenameToko])) {
			mysqli_query($conect, "UPDATE setting SET link_fb='$fb',link_twitter='$twitter',link_ig='$ig',perkenalan='$perkenalan',no_telp='$telepon',email='$email',maps='$maps',yt='$yt' WHERE id='$id'") or die(mysqli_error($conect));
			echo '<script>
                alert("Berhasil menambahkan data.");
                document.location = "index.php?page=tampil_produk";
                </script>';
		} else {
			include('all_pic.php');
		}
	}
	?>

	<form action="index.php?page=edit_setting&id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">

		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">LINK IG</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="ig" class="form-control" value="<?php echo $data['link_ig']; ?>" required>
			</div>
		</div>

		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">LINK TWITTER</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="twitter" class="form-control" value="<?php echo $data['link_twitter']; ?>" required>
			</div>
		</div>

		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">LINK FB</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="fb" class="form-control" value="<?php echo $data['link_fb']; ?>" required>
			</div>
		</div>

		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Perkenalan</label>
			<div class="col-md-6 col-sm-6">
				<textarea style="height: 150px;" type="text" name="perkenalan" class="form-control" required><?php echo $data['perkenalan']; ?></textarea>
			</div>
		</div>

		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">NO TELEPON</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="telepon" class="form-control" value="<?php echo $data['no_telp']; ?>" required>
			</div>
		</div>

		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">EMAIL</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="email" class="form-control" value="<?php echo $data['email']; ?>" required>
			</div>
		</div>

		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">MAPS</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="maps" class="form-control" value="<?php echo $data['maps']; ?>" required>
			</div>
		</div>

		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">YOUTUBE LINK</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="yt" class="form-control" value="<?php echo $data['yt']; ?>" required>
			</div>
		</div>

		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">FOTO TOKO FISIK</label>
			<div class="col-md-6 col-sm-6">
				<img src="assets/images/setting/<?php echo $data['toko_fisik'] ?>" style="width: 130px" />
			</div>
		</div>

		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">UPLOAD FOTO FISIK</label>
			<div class="col-md-6 col-sm-6 ">
				<input id="fileUpload" type="file" name="toko_fisik">
				<p style="color: red">Ukuran Maksimal : 10MB</p>
				<p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif | .svg</p>
			</div>
		</div>

		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align"> LOGO </label>
			<div class="col-md-6 col-sm-6">
				<img src="assets/images/setting/<?php echo $data['logo'] ?>" style="width: 130px" />
			</div>
		</div>

		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">UPLOAD LOGO</label>
			<div class="col-md-6 col-sm-6 ">
				<input id="fileUpload" type="file" name="logo">
				<p style="color: red">Ukuran Maksimal : 10MB</p>
				<p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif | .svg</p>
			</div>
		</div>

		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align"> NAVBAR BACKGROUND</label>
			<div class="col-md-6 col-sm-6">
				<img src="assets/images/setting/<?php echo $data['background_navbar'] ?>" style="width: 130px" />
			</div>
		</div>

		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">UPLOAD NAVBAR BACKGROUND</label>
			<div class="col-md-6 col-sm-6 ">
				<input id="fileUpload" type="file" name="background_navbar">
				<p style="color: red">Ukuran Maksimal : 10MB</p>
				<p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif | .svg</p>
			</div>
		</div>

		<div class="item form-group">
			<div class="col-md-6 col-sm-6 offset-md-3">
				<input id="tombol" type="submit" name="submit" class="btn btn-primary" value="Simpan">
				<a href="index.php?page=tampil_produk" class="btn btn-warning">Kembali</a>
			</div>
		</div>

	</form>

</div>