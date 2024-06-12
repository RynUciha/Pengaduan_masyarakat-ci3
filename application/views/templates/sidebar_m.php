<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <!-- <i class="fas fa-laugh-wink"></i> -->
            </div>
            <div class="sidebar-brand-text mx-3">Pengaduan Masyarakat </div>
        </a>
        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading"> User </div>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-user"></i>
                <span>Profil</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Profil:</h6>
                    <a class="collapse-item" href="<?= base_url('ProfileController_m'); ?>">Profil Saya</a>
                    <a class="collapse-item" href="<?= base_url('UbahProfileController_m'); ?>">Edit profile</a>
                    <a class="collapse-item" href="<?= base_url('ChangePasswordController_m'); ?>">Ganti Password</a>
                </div>
            </div>
        </li>
        <?php // form pengaduan diakses oleh masyarakat ?>
        <?php if ($this->session->userdata('username')): ?>
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Pengaduan</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Pengaduan:</h6>
                        <a class="collapse-item" href="<?= base_url('Masyarakat/PengaduanController'); ?>">Tulis
                            Pengaduan</a>
                    </div>
                </div>
            </li>
        <?php endif; ?>
        <?php // end form pengaduan diakses oleh masyarakat ?>
        <!-- Divider -->
        <!-- Nav Item - Logout -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Auth'); ?>">
                <i class="fas fa-sign-out-alt"></i>
                <span>Keluar</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
    <!-- End of Sidebar -->