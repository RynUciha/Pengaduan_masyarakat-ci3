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
    <div class="row">
        <div class="col-lg-8">
            <?= form_open_multipart('UbahProfileController_m') ?>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>"
                    placeholder="Masukan Nama Baru">
            </div>
            <div class="form-group">
                <label for="telp">Telp</label>
                <input type="text" class="form-control" id="telp" name="telp" value="<?= $user['telp']; ?>"
                    placeholder="Masukan Telp Baru">
            </div>
            <div class="form-group">
                <div class="col-sm-2">Foto</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/profile_m/') . $user['foto_profile']; ?>"
                                class="img-thumbnail">
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="foto_profile" name="foto_profile">
                            <label class="custom-file-label" for="foto_profile">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>