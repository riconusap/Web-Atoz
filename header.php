<nav class="navbar navbar-light navbar-expand-lg navigation-clean-button" style="/*padding: 0 0 2.5rem;*/">
        <div class="container">
            <a class="navbar-brand" href="#">
            <img src="assets/img/logo%201.png?h=b4d4be1201fe545b11839357006488be" width="130">
        </a>
    <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1" style="border-style: none;">
        <span class="visually-hidden">Toggle navigation</span>
        <span class="navbar-toggler-icon"></span>
    </button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav mx-auto" style="font-size: 1.2rem;">
                    <li class="nav-item"><a class="nav-link" href="index.php?page=home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?page=our_projects">Projects</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?page=services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?page=contact_us">Contact Us</a></li>
                </ul>
                    <?php   
                    if (isset($_SESSION['user'])) {
                        $user_login =  '
                        <div class="dropdown">
                    <a aria-expanded="true" data-bs-toggle="dropdown" class="dropdown-toggle" href="#" style="color:black;">
                        <img data-bs-toggle="tooltip" class="border rounded-circle" src="'.$hostname.'assets/img/avatars/'. $user['foto'] .'" style="width:50px;height:50px" title="Edit your profile" />
                    </a>
                        <div class="dropdown-menu"><a class="dropdown-item" href="index.php?page=edit_profil&username='. $user['email'] .'">Edit Profile</a>
                        <a class="dropdown-item" href="index.php?page=inbox_proposal&username='. $user['email'] .'">Tambah Proposal</a>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                     </div>
                        ';
                        echo $user_login
                        ;
                    } else {
                        $user_not_login = '
                        <span class="navbar-text actions">                                         
                        <a class="btn btn-light action-button" role="button" href="login.php" style="color: #ffffff;background: rgb(14,46,63);font-size: 1.2rem;height: 48px;">
                        Send us your proposal
                        </a>
                        </span>
                        ';
                        echo $user_not_login;
                    }
                    ?>
                

                

            </div>
        </div>
    </nav>
<script>

</script>