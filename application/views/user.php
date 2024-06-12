<hr class="sidebar-divider">
<!-- Heading -->
<div class="sidebar-heading"> User </div>
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
        aria-controls="collapseTwo">
        <i class="fas fa-user"></i>
        <span>Profile</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Profile:</h6>
            <a class="collapse-item" href="<?= base_url('profilecontroller_m'); ?>">Profile Saya</a>
            <a class="collapse-item" href="<?= base_url('changepasswordcontroller_m'); ?>">Ganti Password</a>
        </div>
    </div>
</li>
<?php // form pengaduan diakses oleh masyarakat ?>
<?php if ($this->session->userdata('username') && $this->session->userdata('level') == NULL) { ?>
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true"
            aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Pengaduan</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Pengaduan:</h6>
                <a class="collapse-item" href="<?= base_url('Masyarakat/PengaduanController'); ?>">Tulis Pengaduan</a>
            </div>
        </div>
    </li>
<?php } ?>