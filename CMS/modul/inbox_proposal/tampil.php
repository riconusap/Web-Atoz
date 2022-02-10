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
                            <th>Nama Pengirim</th>
                            <th>Instansi</th>
                            <th>Judul</th>
                            <th>Unduh Proposal</th>
                            <th>Respon</th>
                            <th>Waktu Upload</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
				$hasil_project = mysqli_query($konek, "SELECT id_proposal, judul, instansi,pdf_proposal, timestamp,respon, user.nama, user.instansi FROM inbox_proposal INNER JOIN user ON user.id_user = inbox_proposal.id_user");
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
                    
					$sql_project = mysqli_query($konek, "SELECT id_proposal, judul, instansi,pdf_proposal,respon, timestamp, user.nama,user.email, user.instansi FROM inbox_proposal INNER JOIN user ON user.id_user = inbox_proposal.id_user limit $halaman_awal, $batas") or die(mysqli_error($konek));
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
                            $color_respon = "primary";
                        } elseif ($respon==="tolak") {
                            $color_respon = "danger";
                        } else {
                            $color_respon = "secondary";
                        }
						echo
                        '<tr>
                            <td>'. $no.'</td>
                            <td>'. $data['nama'].'</td>
                            <td>'. $data['instansi'] .'</td>
                            <td>'. $data['judul'].'</td>
                            <td><a href="'.$hostname.'/assets/pdf_proposal/'. $data['pdf_proposal'] .'">'. $data['pdf_proposal'] .'</a></td>
                            <td>
                            <button class="btn btn-'. $color_respon .' dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            '. strtoupper($data['respon']).'
                            </button>
                            <form>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <a class="dropdown-item" style="cursor:pointer;" role="button" style="margin: 0px;margin-right: 8px;"  href="index.php?page=inbox_proposal_respon&id='.$data['id_proposal'].'&respon=hold" onclick="return confirm(\'Hold Proposal ini??\')" value="Hold">Hold</a>
                                    <a class="dropdown-item" style="cursor:pointer;" role="button" style="margin: 0px;margin-right: 8px;"  href="index.php?page=inbox_proposal_respon&id='.$data['id_proposal'].'&respon=terima" onclick="return confirm(\'Terima Proposal ini?\')" value="Terima">Terima</a>
                                    <a class="dropdown-item" style="cursor:pointer;" role="button" style="margin: 0px;margin-right: 8px;"  href="index.php?page=inbox_proposal_respon&id='.$data['id_proposal'].'&respon=tolak" onclick="return confirm(\'Tolak Proposal ini?\')" value="Tolak">Tolak</a>
                                </div>
                            </form>
                            </td>
                            <td>'. $data['timestamp'] .'</td>

                            <td class="text-center d-flex flex-wrap">
                            <a class="btn btn-danger text-center mb-1" role="button" style="margin: 0px;margin-right: 8px;"  href="index.php?page=inbox_proposal_delete&id='.$data['id_proposal'].'" onclick="return confirm(\'Yakin ingin menghapus data ini?\')"><i class="fas fa-eye" style="font-size: 13px;"></i>&nbsp;Hapus<br></a>
                            <a class="btn btn-primary text-center mb-1" role="button" style="margin: 0px;margin-right: 8px;"  href="mailto:'.$data['email'].'"><i class="fas fa-envelope-open"></i></i>&nbsp;Kirim Email<br></a>
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