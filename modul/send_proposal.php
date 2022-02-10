        <?php
        $email = $_GET['username'];
        $hasil_pro = mysqli_query($konek, "SELECT id_proposal, id_user, judul, instansi,pdf_proposal, timestamp,respon, user.nama, user.instansi FROM inbox_proposal INNER JOIN user ON user.id_user = inbox_proposal.id_user where email='$email'");
        $data_prop = mysqli_fetch_assoc($hasil_pro);
        ?>
        <div style="padding: 24px;">
            <div class="d-flex flex-column flex-sm-row flex-md-row flex-lg-row flex-xl-row flex-xxl-row">
                <button class="btn btn-primary" type="button" style="background: rgb(14,46,63);margin-right: 8px;"><i class="fas fa-plus" style="margin-right: 8px;"></i><a style="color:white" href="index.php?page=tambah_proposal">Tambah Proposal</a> </button>
                <!-- <form class="d-flex"><input class="form-control" type="text" placeholder="Search For Judul Proposal..."><button class="btn btn-primary" type="button" style="background: rgb(14,46,63);"><i class="fas fa-search"></i></button></form> -->
            </div>
            <div class="container-fluid h-100">
    <h3 class="text-center text-dark mb-4">Proposal&nbsp;</h3>
    <div class="card shadow">
        <div class="card-header py-3"></div>
        <div class="card-body" style="width: 100%;height: 100%;">
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info" style="width: 100%;height: 100%;">
                <table class="table dataTable my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Proposal</th>
                            <th>Unduh Proposal</th>
                            <th>Respon</th>
                            <th>Waktu Upload</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
				$hasil_project = mysqli_query($konek, "SELECT id_proposal, judul, instansi,pdf_proposal, timestamp,respon, user.nama, user.instansi FROM inbox_proposal INNER JOIN user ON user.id_user = inbox_proposal.id_user where email='$email'");
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if (mysqli_num_rows($hasil_project) > 0) {
					//membuat variabel $no untuk menyimpan nomor urut
					//melakukan perulangan while dengan dari dari query $sql

					$no = 1;
					$batas = 6;
					$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
					$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

					$previous = $halaman - 1;
					$next = $halaman + 1;

					$jumlah_data = mysqli_num_rows($hasil_artikel);
					$total_halaman = ceil($jumlah_data / $batas);
                    
					$sql_project = mysqli_query($konek, "SELECT id_proposal, judul, instansi,pdf_proposal,respon, timestamp, user.nama, user.instansi FROM inbox_proposal INNER JOIN user ON user.id_user = inbox_proposal.id_user where email='$email' limit $halaman_awal, $batas") or die(mysqli_error($konek));
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
                        $respon = strtolower($data['respon']);
                        $color_respon = "";
                        if ($respon==="terima") {
                            $color_respon = "blue";
                            $status__new = "Di Terima";
                        } elseif ($respon==="tolak") {
                            $color_respon = "red";
                            $status__new = "Di Tolak";
                        } else {
                            $color_respon = "grey";
                            $status__new = "On Hold";
                        }
						echo
                        '<tr>
                            <td>'. $no.'</td>

                            <td>'. $data['judul'] .'</td>

                            <td><a href="'.$hostname.'/assets/pdf_proposal/'. $data['pdf_proposal'] .'">'. $data['pdf_proposal'] .'</a></td>

                            <td style="color:'.$color_respon.'" ><a>'. $status__new .'</a></td>

                            <td>'. $data['timestamp'] .'</td>

                            <td>
                            <a class="btn btn-danger text-center mb-1" role="button" style="margin: 0px;margin-right: 8px;"  href="index.php?page=inbox_proposal_delete&id='.$data['id_proposal'].'" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">
                            <i class="fas fa-eye" style="font-size: 13px;"></i>&nbsp;Hapus<br>
                            </a>
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
												echo "href='index.php?page=inbox_proposal&halaman=$Previous'";
											} ?>>Previous</a>
				</li>
				<?php
				for ($x = 1; $x <= $total_halaman; $x++) {
				?>
					<li class="page-item"><a class="page-link" href="index.php?page=inbox_proposal&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
				<?php
				}
				?>
				<li class="page-item">
					<a class="page-link" <?php if ($halaman < $total_halaman) {
												echo "href='index.php?page=inbox_proposal&halaman=$next'";
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
        </div>