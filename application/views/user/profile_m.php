<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">
		<?= $title; ?>
	</h1>
	<div class="row">
		<div class="col-lg-8">
			<?= $this->session->flashdata('pesan'); ?>
		</div>
	</div>
	<div class="card mb-3 col-lg-8">
		<div class="row no-gutters">
			<div class="col-md-4">
			<img src="<?= base_url('assets/profile_m/') . $user['foto_profile']; ?>" class="img-thumbnail">
			</div>
			<div class="col-md-8">
				<div class="card-body">
					<h5 class="card-title">Username :
						<?= $user['username']; ?>
					</h5>
					<p class="card-text">nama :
						<?= $user['nama'] ?>
					</p>
					<p class="card-text">Telp :
						<?= $user['telp'] ?>
					</p>
				</div>
			</div>
		</div>
	</div>