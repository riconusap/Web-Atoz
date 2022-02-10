    
<?php
include('../../assets/relasi/koneksi.php');
?>


	<?php
	//jika sudah mendapatkan parameter GET id dari URL
	if (isset($_GET['id'])) {
		//membuat variabel $id untuk menyimpan id dari GET id di URL
		$id = $_GET['id'];

		//query ke database SELECT tabel produk berdasarkan id = $id
		$select = mysqli_query($konek, "SELECT * FROM admin WHERE id_admin='$id'") or die(mysqli_error($konek));

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

    
    if (isset($_POST['simpan_foto'])) 
    {
        $id = $admin['id_admin'];
        $oldFile 		= $admin['foto'];
        
		$filename 		= $_FILES['gambar']['name'];
		$fileTmp		= $_FILES['gambar']['tmp_name'];
		$fileSize		= $_FILES['gambar']['size'];
		$fileError		= $_FILES['gambar']['error'];
		$fileType		= $_FILES['gambar']['type'];

		$fileExt = explode('.', $filename);
		$fileActualExt = strtolower(end($fileExt));

		$allowedExt = array('jpg', 'jpeg', 'png', 'svg');
		if (in_array($fileActualExt, $allowedExt)) {
			$delPath = $path_ava . $oldFile;
			unlink($delPath);
			if ($fileError === 0) {
				if ($fileSize < 10485760) {
					$fileNameNew = uniqid('', true) . "." . $fileActualExt;
					$fileDestination = $path_ava . $fileNameNew;
					move_uploaded_file($fileTmp, $fileDestination);
					mysqli_query($konek, "UPDATE admin SET foto='$fileNameNew' WHERE id_admin='$id'") or die(mysqli_error($konek));
					echo '<script>
							alert("Berhasil menambahkan data. '. $fileNameNew .' ");
							document.location = "index.php?page=tampil_profil";
							</script>';
				} else {
					echo
					'<script>
						alert("Ukuran File terlalu Besar.");
						document.location = "index.php?page=tampil_profil";
					</script>';
				}
			} else {
				echo
				'<script>
					alert("Terjadi Kesalahan Saat Upload Gambar, Silahkan Periksa Kembali.");
					document.location = "index.php?page=tampil_profil";
				</script>';
			}
		} else {
			echo
			'<script>
				alert("Ekstensi Gambar Tidak Di Izinkan.");
			</script>';
		}
    }
    
    if (isset($_POST['profil_submit'])){
        $id         = $admin['id_admin'];
        $username   = $_POST['username'];
        $name       = $_POST['name'];
        $instagram  = $_POST['instagram'];

        if($username == $admin['username']){
            mysqli_query($konek, "UPDATE admin SET username='$username', nama='$name', instagram='$instagram' WHERE id_admin='$id'") or die(mysqli_error($konek));
        echo '<script>
                        alert("Berhasil Mengubah Data.");
                        document.location = "index.php?page=tampil_profil";
                        </script>';
        } else {
            mysqli_query($konek, "UPDATE admin SET username='$username', nama='$name', instagram='$instagram' WHERE id_admin='$id'") or die(mysqli_error($konek));
            echo '<script>
                            alert("Berhasil Mengubah Data, Silahkan Login Kembali.");
                            document.location = "index.php?page=tampil_profil";
                            </script>';
            include('logout.php');
            
        }
    }
    ?>

    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-lg-4">
            <form action="index.php?page=tampil_profil" method="post" enctype="multipart/form-data">
                <div class="card mb-3">
                    <div class="card-body text-center shadow">
                        <img class="rounded-circle shadow-sm mb-3 mt-4" src="<?php echo $hostname ?>assets/img/avatars/<?php echo $admin['foto'] ?>" width="160" height="160" />
                        <div class="mb-3">
                            <div class="item form-group">
			                        
				                        <input type="file" name="gambar" >
			                        
                                    <button style="margin: 10px;" class="btn btn-primary" name="simpan_foto" type="submit"><i class="fas fa-save" style="margin-right: 3px;"></i>Simpan</button>
                                    </div>
		                </div>
                       
                    </div>
                </div>
            </form>
            </div>

            <div class="col-lg-8">
                <div class="row">
                    <div class="col" style="height: 100%;width: 100px;">
                        <div class="card shadow mb-3">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 font-weight-bold">Pengaturan Profil</p>
                            </div>
                            <div class="card-body">
                            <form action="index.php?page=tampil_profil" method="post" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group"><label for="username"><strong>Username</strong></label><input maxlength="8" type="text" class="form-control" name="username" value="<?= $admin['username'] ?>" /></div>
                                        </div>
                                        <?= $instagram_edit; ?>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group"><label for="first_name"><strong>Nama</strong></label><input type="text" class="form-control" name="name" value="<?= $admin['nama'] ?>" /></div>
                                        </div>
                                    </div>

                                    <div class=" form-group">
                                    <button class="btn btn-primary btn-sm" name="profil_submit" type="submit">
                                    <i class="fas fa-save" style="margin-right: 3px;"></i>Simpan</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>