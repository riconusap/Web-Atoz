<?php
include('metatag.php');
$data_setting = mysqli_fetch_assoc(mysqli_query($konek, "SELECT * FROM profile_perusahaan"));
?>

<body id="page-top">
    <div id="wrapper">
        <?php
        include('navbar.php');
        ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow" role="presentation">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small"><i class="fas fa-align-right" style="margin-right: 3px;"></i><?= $admin['nama'] ?></span><img class="border rounded-circle img-profile" src="assets/img/avatars/<?= $admin['foto'] ?>"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu">
                                        <a class="dropdown-item" role="presentation" href="index.php?page=tampil_profil&id=<?php echo $admin['id_admin']?>"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Profil</a>
                                        <a class="dropdown-item" role="presentation" target="/blank" href="../index.php"><i class="fab fa-weebly fa-sm fa-fw mr-2 text-gray-400"></i>Cek Website</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" role="presentation" href="logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Keluar</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="col justify-content-center">
                    <?php

                    $queries = array();
                    parse_str($_SERVER['QUERY_STRING'], $queries);
                    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                    switch ($queries['page']) {


                        case 'project':
                            # code...
                            include 'modul/project/tampil.php';
                            break;
                        case 'tambah_project':
                            # code...
                            include 'modul/project/tambah.php';
                            break;
                        case 'edit_project':
                            # code...
                            include 'modul/project/edit.php';
                            break;
                        case 'delete_project':
                            # code...
                            include 'modul/project/delete.php';
                            break;

                        case 'show_all_pic';
                            include 'modul/project/show_all_pic.php';
                            break;
                        case 'show_all_pic_tambah';
                            include 'modul/project/show_all_pic_tambah.php';
                            break;
                        case 'show_all_pic_delete';
                            include 'modul/project/show_all_pic_delete.php';
                            break;
                        case 'show_all_pic_edit';
                            include 'modul/project/show_all_pic_edit.php';
                            break;

                        case 'inbox_proposal':
                            # code...
                            include 'modul/inbox_proposal/tampil.php';
                            break;
                        case 'inbox_proposal_delete':
                            # code...
                            include 'modul/inbox_proposal/delete.php';
                            break;
                        case 'inbox_proposal_respon':
                            # code...
                            include 'modul/inbox_proposal/respon.php';
                            break;

                        case 'profile_perusahaan':
                            # code...
                            include 'modul/profile_perusahaan/edit.php';
                            break;

                        case 'home':
                            # code...
                            include 'modul/home/edit.php';
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
                            include 'home.php';
                            break;
                    }
                    ?>

                </div>
                <?php
                include('footer.php');
                ?>