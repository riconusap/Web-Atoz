<?php include('cms/assets/relasi/koneksi.php') ?>
<?php
if (isset($_GET['id'])) {
    //membuat variabel $id untuk menyimpan id dari GET id di URL
    $id = $_GET['id'];
    //query ke database SELECT tabel produk berdasarkan id = $id
    $select = mysqli_query($konek, "SELECT * FROM foto_project WHERE id_project='$id'") or die(mysqli_error($konek));
    $sql_project = mysqli_query($konek, "SELECT* FROM project where id_project='$id'") or die(mysqli_error($konek)); 
    $data_project = mysqli_fetch_array($sql_project);
}
?>
    
        <!--==================== PROJECTS ====================-->
        <section class="place section" id="place">
            <h1 class="text-center"><?php echo $data_project['nama_event'] ?></h1>
            <center><p>Tahun : <?php echo $data_project['tahun'] ?></p></center>
            <center><a href="index.php?page=project" class="btn btn-primary" type="button" style="background: rgb(14,46,63);">Kembali</a></center>
            <div class="d-inline-flex flex-column flex-grow-0 flex-shrink-0 justify-content-center align-items-center flex-sm-column justify-content-sm-center align-items-sm-center flex-md-column flex-lg-row justify-content-lg-center align-items-lg-start flex-xl-row justify-content-xl-center flex-xxl-row justify-content-xxl-center align-items-xxl-center" style="/*grid-template-columns: auto auto auto auto;*/">
                <div class="row d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex d-xxl-flex justify-content-center justify-content-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center justify-content-xxl-center align-items-xxl-center row-cols-auto">
                <?php 
                    while ($data = mysqli_fetch_array($select)) :
                ?>
                    <div class="col" style="width: 300px;"><img src="CMS/assets/img/project/<?php echo $data['foto'] ?>" style="width: 100%;border-style: none;padding: 1.6rem;height: 300px;"></div>
                <?php
                    endwhile; 
                ?>
                </div>
            </div>
        </section>

        