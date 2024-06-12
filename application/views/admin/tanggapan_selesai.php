<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

	<?= validation_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">','<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>') ?>
	<?= $this->session->flashdata('msg'); ?>

	<?php if ( ! empty($data_pengaduan)) { ?>

		<div class="table-responsive">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">Kategori</th>
          <th scope="col">Isi Laporan</th>
          <th scope="col">Tgl Melapor</th>
          <th scope="col">Foto</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; ?>
        <?php foreach ($data_pengaduan as $dp): ?>
          <tr>
            <th scope="row">
              <?= $no++; ?>
            </th>
            <td>
              <?= $dp['nama']; ?>
            </td>
            <td>
              <?= $dp['jenis_laporan']; ?>
            </td>
            <td>
              <?= $dp['isi_laporan']; ?>
            </td>
            <td>
              <?= $dp['tgl_pengaduan']; ?>
            </td>
            <td>
              <img width="100" src="<?= base_url() ?>assets/uploads/<?= $dp['foto']; ?>" alt="">
            </td>
            <td>
              <?php
              if ($dp['status'] == '0'):
                echo '<span class="badge badge-secondary">Sedang di verifikasi</span>';
              elseif ($dp['status'] == 'proses'):
                echo '<span class="badge badge-primary">Sedang di proses</span>';
              elseif ($dp['status'] == 'selesai'):
                echo '<span class="badge badge-success">Selesai di kerjakan</span>';
              elseif ($dp['status'] == 'tolak'):
                echo '<span class="badge badge-danger">Pengaduan di tolak</span>';
              else:
                echo '-';
              endif;
              ?>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

		<?php }else{ ?>
			<div class="text-center">Belum Ada Pengaduan</div>
		<?php } ?>


	</div>