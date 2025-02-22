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
    <?php if ($this->session->userdata('level') == 'admin' or $this->session->userdata('level') == 'petugas'): ?>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('DashboardController') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
    <?php endif; ?>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading"> User </div>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
        aria-controls="collapseTwo">
        <i class="fas fa-user"></i>
        <span>Profil</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Profil:</h6>
          <a class="collapse-item" href="<?= base_url('ProfileController'); ?>">Profil Saya</a>
          <a class="collapse-item" href="<?= base_url('UbahProfileController'); ?>">Edit Profil</a>
          <a class="collapse-item" href="<?= base_url('ChangePasswordController'); ?>">Ganti Password</a>
        </div>
      </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <?php // dropdown admin hanya oleh akun admin dan petugas ?>
    <?php if ($this->session->userdata('level') == 'admin' or $this->session->userdata('level') == 'petugas'): ?>
      <!-- Heading -->
      <div class="sidebar-heading"> Kelola Data </div>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
          aria-controls="collapsePages">
          <i class="fas fa-user-cog"></i>
          <span>Master Data</span>
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
            <?php if ($this->session->userdata('level') == 'admin'): ?>
              <h6 class="collapse-header">Registrasi:</h6>
              <a class="collapse-item" href="<?= base_url('Admin/PetugasController'); ?>">Tambah User</a>
            <?php endif; ?>
            <?php // end tambah petugas admin akses ?>
          </div>
        </div>
      </li>
    <?php endif; ?>
    <?php // end dropdown admin hanya oleh akun admin dan petugas ?>
    <?php // generate laporan akses admin ?>
    <?php if ($this->session->userdata('level') == 'admin'): ?>
      <!-- Nav Item - Generate Laporan -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Admin/LaporanController'); ?>">
          <i class="fas fa-file-pdf"></i>
          <span>Generate Laporan</span></a>
      </li>
    <?php endif; ?>
    <?php // end generate laporan akses admin ?>
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