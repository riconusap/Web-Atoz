<?php
include('metatag.php');
?>

<style>
.modal-backdrop {
    /* bug fix - no overlay */    
    display: none;    
}

.float{
	position:fixed;
	width:80px;
	height:50px;
	bottom:40px;
	left:40px;
	background-color:rgb(14,46,63);
	color:#FFF;
	border-radius:50px;
	text-align:center;
	box-shadow: 2px 2px 3px #999;
    transition: 0.5s;
}

.my-float{
	margin-top:22px;
    text-align: center;
    border-radius:50px;
    font-size: 32px;
}

.float:hover{
    text-decoration: none;
    border-radius:50px;
    background-color:#FFF;
}
</style>
<body>
<?php include('./header.php') ?>
    <main class="main">

    <?php

        $queries = array();
        parse_str($_SERVER['QUERY_STRING'], $queries);
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        switch ($queries['page']) {

            case 'our_projects':
                # code...
                include 'modul/project.php';
                break;

            case 'services':
                # code...
                include 'modul/services.php';
                break;

            case 'contact_us':
                # code...
                include 'modul/contact_us.php';
                break;

            case 'project':
                # code...
                include 'modul/project.php';
                break;

            case 'project_library':
                # code...
                include 'modul/list_pic.php';
                break;

            case 'inbox_proposal':
                # code...
                include 'modul/send_proposal.php';
                break;
                case 'tambah_proposal':
                    # code...
                    include 'modul/proposal/tambah.php';
                    break;

            case 'inbox_proposal_delete':
                # code...
                include 'modul/proposal/delete.php';
                break;

            case 'edit_profil':
                # code...
                include 'modul/profil/edit.php';
                break;

            case 'tampil_profil':
                # code...
                include 'modul/profil/edit.php';
                break;
                
                
            default:
                #code...
                include 'modul/home.php';
                break;
        }


    ?> 
    </main>


    
    <footer class="d-flex d-xxl-flex flex-column justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center justify-content-xxl-center align-items-xxl-center footer-basic" style="color: var(--bs-dark);background: var(--bs-light);">
            <?php include('./footer.php') ?>
    </footer>

    <div class="modal fade" role="dialog" tabindex="1" id="modal-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Contact us via</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex d-xxl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center justify-content-xxl-center align-items-xxl-center">
                    <div class="btn-group" role="group">
                    <button class="btn btn-primary" type="button" style="margin-right: 13px;background: rgb(20,68,92);border-style: none;"><a target="_blank" style="color: white;" href="https://wa.me/62<?php echo $data['no_telp2'] ?>">Whatsapp 1</a></button>
                    <button class="btn btn-primary" type="button" style="background: rgb(20,68,92);border-style: none;"><a target="_blank" style="color: white;" href="https://wa.me/62<?php echo $data['no_telp2'] ?>">Whatsapp 2</a></button></div>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button></div>
            </div>
        </div>
    </div>
    <a href="https://wa.me/62<?php echo $data['no_telp1'] ?>" class="float"><i class="ri-whatsapp-fill my-float"></i></a>

<!--=============== MAIN JS ===============-->
 <script src="<?php echo $hostname; ?>/assets/js/main.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
 <script src="assets/js/script.min.js"></script>
        
</body>
</html>
