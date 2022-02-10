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
			//membuat variabel $data dan menyimpan data row dari query
			$data = mysqli_fetch_assoc($select);
	}
	?>
    <?php
	
    if(isset($_POST['submit'])){

         $name           = $_POST['name'];
         $file           = $_FILES['file']['name'];

        foreach ($file as $key => $value) {
           
            $filename 		= $_FILES['file']['name'][$key];
	        $fileTmp		= $_FILES['file']['tmp_name'][$key];
	        $fileSize		= $_FILES['file']['size'][$key];
	        $fileError		= $_FILES['file']['error'][$key];
	        $fileType		= $_FILES['file']['type'][$key];

            $fileExt     	= explode('.', $filename);
        
            $fileActualExt  = strtolower(end($fileExt));

		    $allowedExt = array('jpg', 'jpeg', 'png', 'svg', 'webp');

            if (in_array($fileActualExt, $allowedExt)) {
                if ($fileError === 0) {
                    if ($fileSize < 10485760) {
                        $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                        $fileDestination = $path_project . $fileNameNew;
                        move_uploaded_file($fileTmp, $fileDestination);
                        $cek_berita = mysqli_query($konek, "SELECT * FROM foto_project WHERE id_foto_project='$id'") or die(mysqli_error($konek));
                        if (mysqli_num_rows($cek_berita) == 0) {
                            mysqli_query($konek, "INSERT INTO foto_project VALUE(null,'$id','".$fileNameNew."', '$name[$key]')") or die(mysqli_error($konek));
                            echo '<script>
                                    alert("Berhasil menambahkan data.");
                                    document.location = "index.php?page=show_all_pic&id='. $id .'";
                                    </script>';
                        } else {
                            echo '<script>
                                    alert("Tidak Berhasil Menambahkan Data ke Database.");
                                    document.location = "index.php?page=show_all_pic_tambah&id='. $id .'";
                                  </script>';
                        }   
                    } else {
                        echo
                        '<script>
                                alert("Ukuran File terlalu Besar.");
                                document.location = "index.php?page=show_all_pic_tambah&id='. $id .'";
                            </script>';
                    }
                } else {
                    echo
                    '<script>
                            alert("Terjadi Kesalahan Saat Upload Gambar, Silahkan Periksa Kembali.");
                            document.location = "index.php?page=show_all_pic_tambah&id='. $id .'";
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

<form action="" method="post" enctype="multipart/form-data">
<div class="container-fluid">
    <h3 class="text-center text-dark mb-4">Tambah Project&nbsp;</h3>
    <div class="card shadow">
        <div class="card-header py-3"></div>
        <div class="card-body">
            <div class="row">
				
                <table id="table_field" class="col-auto d-xl-flex justify-content-xl-start" style="width: 100%;margin-bottom: 10px;">
                    <tr>
                        <th>
                            Image
                        </th>
                        <th>
                            Nama
                        </th>
                        <th>
                            Aksi
                        </th>
                    </tr>
                    <tr>
                        <td>
                        <input class="border rounded shadow-sm" name="file[]" type="file" style="width: 50%;">
                        </td>
                        <td>
                        <input class="border rounded shadow-sm" name="name[]" type="name" style="width: 50%;">
                        </td>
                        <td>
                        <input  id="tombol_tambah" type="button" name="add" class="btn btn-primary m-3" value="ADD">
                        </td>
                    </tr>
                </table>
				
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
<script type="text/javascript">
    $(document).ready(function(){
        var html = '<tr><td><input class="border rounded shadow-sm" name="file[]" type="file" style="width: 50%;"></td><td><input class="border rounded shadow-sm" name="name[]" type="name" style="width: 50%;"></td><td><input  id="tombol_hapus" type="button" name="hapus" class="btn btn-primary m-3" value="Hapus"></td></tr>';
        var max = 12;
        var x = 1;

        $("#tombol_tambah").click(function () {
            if (x<max) {
                $("#table_field").append(html);
                x++;
            }
        });

        $("#table_field").on('click','#tombol_hapus',function() {
           $(this).closest('tr').remove();
           x--; 
        });
    });
</script>


