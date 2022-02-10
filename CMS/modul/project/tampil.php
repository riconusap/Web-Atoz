<div class="container-fluid">
    <h3 class="text-center text-dark mb-4">Project&nbsp;</h3>
    <div class="card shadow">
        <div class="card-header py-3"></div>
        <div class="card-body" style="width: 100%;height: 100%;">
        <a class="btn btn-primary mb-2" role="button" href="index.php?page=tambah_project"><i class="fas fa-plus" style="font-size: 13px;"></i>&nbsp;Tambah Project<br></a>
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info" style="width: 100%;height: 100%;">
                <table class="table dataTable my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Event</th>
                            <th>Lokasi</th>
                            <th>Tahun</th>
                            <th>Upload By</th>
                            <th>Waktu Upload</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
				$hasil_project = mysqli_query($konek, "SELECT id_project, nama_event, tahun, lokasi,timestamp , admin.nama FROM project INNER JOIN admin ON admin.id_admin = project.id_admin");
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if (mysqli_num_rows($hasil_project) > 0) {
					//membuat variabel $no untuk menyimpan nomor urut
					//melakukan perulangan while dengan dari dari query $sql

					$no = 1;
					$batas = 20;
					$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
					$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

					$previous = $halaman - 1;
					$next = $halaman + 1;

					$jumlah_data = mysqli_num_rows($hasil_artikel);
					$total_halaman = ceil($jumlah_data / $batas);
                    
					$sql_project = mysqli_query($konek, "SELECT id_project, nama_event, tahun, lokasi,timestamp , admin.nama FROM project INNER JOIN admin ON admin.id_admin = project.id_admin limit $halaman_awal, $batas") or die(mysqli_error($konek));
					$nomor = $halaman_awal + 1;
					//membuat paginantion

					while ($data = mysqli_fetch_assoc($sql_project)) {
						//menampilkan data perulangan
                        // $akses_tambah = '';
                        // $akses_edit = '';
                        // if (isset($_SESSION['author'])) {
                        //     $akses_edit = '<a class="btn btn-primary text-center" role="button" style="margin: 0px;margin-right: 8px;" href="index.php?page=edit_project&id=' . $data['id_project'] . '"><i class="far fa-edit" style="font-size: 13px;margin-right: 8px;"></i>Ubah!</a>';
                        //     $akses_tambah = '';
                        // } else {
                        //     $akses_edit = '';
                        //     $akses_tambah = '';
                        // }
						echo
                        '<tr>
                        <td>'. $no.'</td>
                            <td>'.substr($data['nama_event'],0,32 ).'</td>
                            <td>'. $data['lokasi'] .'</td>
                            <td>'. $data['tahun'] .'</td>
                            <td>'. $data['nama'] .'</td>
                            <td>'. $data['timestamp'] .'</td>

                            <td class="text-center d-flex flex-wrap">
                            <a class="btn btn-primary text-center mb-1" role="button" style="margin: px;margin-right: 8px;" href="index.php?page=show_all_pic&id=' . $data['id_project'] . '"><i class="far fa-eye" style="font-size: 13px;margin-right: 8px;"></i>Lihat Semua Foto</a>
                            <a class="btn btn-primary text-center mb-1" role="button" style="margin: 0px;margin-right: 8px;" href="index.php?page=edit_project&id=' . $data['id_project'] . '"><i class="far fa-edit" style="font-size: 13px;margin-right: 8px;"></i>Ubah!</a>
                            <a class="btn btn-danger text-center mb-1" role="button" style="margin: 0px;margin-right: 8px;"  href="index.php?page=delete_project&id='.$data['id_project'].'" onclick="return confirm(\'Yakin ingin menghapus data ini?\')"><i class="fas fa-trash" style="font-size: 13px;"></i>&nbsp;Hapus<br></a>
                            </td>
                            
                        </tr>';
                        $no++;
                    }
                 } else {
                        echo '
                        <tr>
                            <td colspan="6">Tidak ada data.</td>
                        </tr>
                        ';
                    }
                    ?>

                    </tbody>
                    <tfoot>
                        <tr></tr>
                    </tfoot>
                </table>
            </div>
            

            <div class="row justify-content-center">
                <div class="col-auto col-md-6">
                <nav>
			<ul class="pagination justify-content-center">
				<li class="page-item">
					<a class="page-link" <?php if ($halaman > 1) {
												echo "href='index.php?page=project&halaman=$Previous'";
											} ?>>Previous</a>
				</li>
				<?php
				for ($x = 1; $x <= $total_halaman; $x++) {
				?>
					<li class="page-item"><a class="page-link" href="index.php?page=project&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
				<?php
				}
				?>
				<li class="page-item">
					<a class="page-link" <?php if ($halaman < $total_halaman) {
												echo "href='index.php?page=project&halaman=$next'";
											} ?>>Next</a>
				</li>
			</ul>
		</nav>
                </div>
            </div>
        </div>
    </div>
</div>
</div>