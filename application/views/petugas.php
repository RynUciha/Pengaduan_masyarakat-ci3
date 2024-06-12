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
            <a class="collapse-item" href="<?= base_url('profilecontroller'); ?>">Profile Saya</a>
            <a class="collapse-item" href="<?= base_url('changepasswordcontroller'); ?>">Ganti Password</a>
        </div>
    </div>
</li>
<?php // end form pengaduan diakses oleh masyarakat ?>
<!-- Divider -->
<hr class="sidebar-divider">
<?php // dropdown admin hanya oleh akun admin dan petugas ?>
<?php if ($this->session->userdata('level') == 'admin' or $this->session->userdata('level') == 'petugas') { ?>
    <!-- Heading -->
    <div class="sidebar-heading"> Admin </div>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-user-cog"></i>
            <span>Admin</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Tanggapan:</h6>
                <a class="collapse-item" href="<?= base_url('Admin/TanggapanController'); ?>">Pengaduan Masuk</a>
                <a class="collapse-item" href="<?= base_url('Admin/TanggapanController/tanggapan_proses'); ?>">Pengaduan
                    Proses</a>
                <a class="collapse-item" href="<?= base_url('Admin/TanggapanController/tanggapan_tolak'); ?>">Pengaduan
                    Ditolak</a>
                <a class="collapse-item" href="<?= base_url('Admin/TanggapanController/tanggapan_selesai'); ?>">Pengaduan
                    Selesai</a>
                <div class="collapse-divider"></div>
                <?php // tambah petugas admin akses ?>
                <?php if ($this->session->userdata('level') == 'admin') { ?>
                    <h6 class="collapse-header">Registrasi:</h6>
                    <a class="collapse-item" href="<?= base_url('Admin/PetugasController'); ?>">Tambah Petugas</a>
                <?php } ?>
                <?php // end tambah petugas admin akses ?>
            </div>
        </div>
    </li>
<?php } ?>