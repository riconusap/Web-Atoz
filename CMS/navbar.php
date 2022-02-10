<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="background-color: rgb(255,255,255);">
    <div class="container-fluid d-flex flex-column p-0">
        <a class="navbar-brand d-flex flex-column justify-content-center align-items-center sidebar-brand m-0" href="#" style="margin: 10px;margin-left: 10px;">
            <div class="sidebar-brand-icon"><img src="./assets/img/<?php echo $data_setting['logo'] ?>" style="width:80px"></div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="nav navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item" role="presentation"></li>
            <li class="nav-item" role="presentation"><a class="nav-link" href="index.php"><i class="fas fa-home"></i><span>Beranda</span></a></li>
            <li class="nav-item" role="presentation"><a class="nav-link" href="index.php?page=profile_perusahaan&id=1"><i class="fas fa-table"></i><span>Profile Perusahaan</span></a></li>
            <li class="nav-item" role="presentation"><a class="nav-link" href="index.php?page=project"><i class="fas fa-table"></i><span>Project</span></a></li>
            <li class="nav-item" role="presentation"><a class="nav-link" href="index.php?page=home&id=1"><i class="fas fa-table"></i><span>Setting Home</span></a></li>
            <li class="nav-item" role="presentation"><a class="nav-link" href="index.php?page=inbox_proposal"><i class="fas fa-table"></i><span>Inbox Proposal</span></a></li>
        </ul>
        <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
    </div>
</nav>
<script>
$(function() {
  $('nav a[href^="index.php' + location.pathname.split("?")[1] + '"]').addClass('active');
});
</script>