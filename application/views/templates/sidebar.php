<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin'); ?> ">
                <div class="sidebar-brand-icon ">
                    <img src="<?= base_url('assets/img/logo.png'); ?>" style="width: 50px;" alt="">
                </div>
                <div class="sidebar-brand-text mx-3">E-Vote</div>
            </a>
            <br>
            <!-- Heading -->
            <div class="sidebar-heading">
                <h7 style="color: rgb(212, 214, 214);"> <b>Data</b> </h7>
            </div>

            <hr class="sidebar-divider mt-1 mb-2">

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('candidate'); ?>">
                    <i class="fas fa-user-friends"></i>
                    <span>Data Candidate</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('leader'); ?>">
                    <i class="far fa-address-card"></i>
                    <span>Data Leader</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('v_leader'); ?>">
                    <i class="far fa-address-book"></i>
                    <span>Data Vice Leader</span>
                </a>
            </li>
            <hr class="sidebar-divider mt-1 mb-2">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('vote'); ?>">
                    <i class="fas fa-vote-yea"></i>
                    <span>Data Vote</span>
                </a>
            </li>
            <hr class="sidebar-divider  mb-1 d-none d-md-block">
            <li class="nav-item mb-2">
                <a class="nav-link" href="<?= base_url('auth/logout') ?>">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->