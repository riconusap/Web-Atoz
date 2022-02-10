<?php
include('../../assets/relasi/koneksi.php');
?>


	<?php
	//jika sudah mendapatkan parameter GET id dari URL
	if (isset($_GET['id'])) {
		//membuat variabel $id untuk menyimpan id dari GET id di URL
		$id = $_GET['id'];

		//query ke database SELECT tabel produk berdasarkan id = $id
		$select = mysqli_query($konek, "SELECT * 
                                        FROM foto_project 
                                        INNER JOIN project 
                                        ON foto_project.id_project = project.id_project  
                                        WHERE foto_project.id_project = '$id'") 
                                        or die(mysqli_error($konek));

		//jika hasil query = 0 maka muncul pesan error
		if (mysqli_num_rows($select) == 0) {
			echo '
            <a class="btn btn-primary text-center mb-1" role="button" style="margin: px;margin-right: 8px;" href="index.php?page=show_all_pic_tambah&id=' . $id . '"><i class="fas fa-plus" style="font-size: 13px;margin-right: 8px;"></i>Tambah Foto Foto</a>
            <a class="btn btn-warning text-center mb-1" role="button" style="margin: px;margin-right: 8px;" href="index.php?page=project"><i class="fas fa-backward" style="font-size: 13px;margin-right: 8px;"></i>Kembali</a>
            ';
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
        $id_foto	    = $_POST['id_foto'];
        $id_project     = $data['id_project']; 
        $nama_foto     = $_POST['nama_foto']; 
        $oldFile 		= $data['foto'];

        $filename 		= $_FILES['file']['name'];
		$fileTmp		= $_FILES['file']['tmp_name'];
		$fileSize		= $_FILES['file']['size'];
		$fileError		= $_FILES['file']['error'];
		$fileType		= $_FILES['file']['type'];

        $fileExt     	= explode('.', $filename);
        
        $fileActualExt  = strtolower(end($fileExt));

		$allowedExt = array('jpg', 'jpeg', 'png', 'svg', 'webp');

        if (empty($filename)) {
            mysqli_query($konek, "UPDATE foto_project SET nama_foto='$nama_foto' WHERE id_foto_project=$id_foto") or die(mysqli_error($konek));
            echo '<script>
                            alert("Berhasil menambahkan data.");
                            document.location = "index.php?page=show_all_pic&id='.$data['id_project'].'";
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
                    mysqli_query($konek, "UPDATE foto_project SET foto='$fileNameNew' WHERE id_foto_project= '$id_foto' ") or die(mysqli_error($konek));
                    echo '<script>
                        alert("Berhasil menambahkan data. ID : ' . $id_foto .'");
                        document.location = "index.php?page=show_all_pic&id='.$data['id_project'].'";
                        </script>';
                } else {
                    echo '<script>
                    alert("Ukuran File terlalu Besar.");
                    document.location = "index.php?page=show_all_pic&id='.$data['id_project'].'";
                </script>';
                }
            } else {
                echo '<script>
                alert("Terjadi Kesalahan Saat Upload Gambar, Silahkan Periksa Kembali.");
                document.location = "index.php?page=show_all_pic&id='.$data['id_project'].'";
            </script>';
            }
        } else {
            echo '<script>
            alert("Ekstensi Gambar Tidak Di Izinkan, Ekstensi : .' . $fileExt .'");
            document.location = "index.php?page=show_all_pic&id='.$data['id_project'].'";
        </script>';
        }
	}
}
	?>

<div class="container-fluid">
    <h3 class="text-center text-dark mb-4">Project&nbsp;</h3>
    <div class="card shadow">
        
        <div class="card-header py-3">
            <a class="btn btn-primary text-center mb-1" role="button" href="index.php?page=project"><i class="fas fa-arrow-left" style="font-size: 13px;"></i>&nbsp;Kembali<br></a>
            <a class="btn btn-primary text-center mb-1" role="button" style="margin: px;margin-right: 8px;" href="index.php?page=show_all_pic_tambah&id=<?php echo $id; ?>"><i class="fas fa-plus" style="font-size: 13px;margin-right: 8px;"></i>Tambah Foto Foto</a>
        </div>
        <div class="card-body d-flex flex-wrap" style="width: 100%;height: 100%;">

        <!-- SQL panggil semua image di tabel foto_project -->
        <?php
        $hasil_project = mysqli_query($konek, "SELECT * 
                                                FROM foto_project 
                                                INNER JOIN project 
                                                ON foto_project.id_project = project.id_project  
                                                WHERE foto_project.id_project = '$id'");
        
        // START CARD
        while ($data = mysqli_fetch_assoc($hasil_project)) {
        echo 
        '<div class="card m-1" style="width: 18rem;">
        <img style="width:100%;height:250px" src="assets/img/project/'.  $data['foto'] .'" class="card-img-top" alt="...">
        <div class="card-body">
            
            <div class="container d-flex">
                <button class="btn btn-primary text-center" onclick="openForm'.$data['id_foto_project'].'()" role="button" style="margin: 0px;margin-right: 8px;"><i class="far fa-edit" style="font-size: 13px;margin-right: 8px;"></i>Ubah!</button>
                <a href="modul/project/show_all_pic_delete.php?id=' . $data['id_foto_project'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
            </div>';
            // Form Update Foto
            echo
            '<div class="form-popup mt-4" id="myForm'.$data['id_foto_project'].'">
                <form action="index.php?page=show_all_pic&id=' . $data['id_project'] .'" class="form-container"  method="post" enctype="multipart/form-data">
                    <h4>Update Gambar</h4>

                    <input type="text" name="id_foto" value="'.$data['id_foto_project'].'"style="display:none;">

                    <label for="email"><b>Gambar</b></label>
                    <input type="file" placeholder="Masukan Gambar...." name="file">
                    <input type="text" placeholder="Nama Gambar :" name="nama_foto" value="'. $data['nama_foto'] .'">

                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                    <button type="button" name="submit" class="btn btn-danger" onclick="closeForm'.$data['id_foto_project'].'()">Close</button>
                    </form>
            </div>';
        // Form Update Foto
        echo
            '</div>
        </div>
        <script>
            function openForm'.$data['id_foto_project'].'() {
            document.getElementById("myForm'.$data['id_foto_project'].'").style.display = "block";
            }

            function closeForm'.$data['id_foto_project'].'() {
            document.getElementById("myForm'.$data['id_foto_project'].'").style.display = "none";
            }
        </script>
        ';
        }?>
        <!-- END CARD -->

    </div>
</div>
</div>


