<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <?= $title; ?>
    </h1>
    <?php if ($laporan): ?>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Nik</th>
                    <th scope="col">kategori</th>
                    <th scope="col">Laporan</th>
                    <th scope="col">Tgl P</th>
                    <th scope="col">Status</th>
                    <th scope="col">Tanggapan</th>
                    <th scope="col">Tgl T</th>
                    <th scope="col">Aksi</th> <!-- Kolom untuk tombol cetak -->
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($laporan as $l): ?>
                    <tr>
                        <th scope="row">
                            <?= $no++; ?>
                        </th>
                        <td>
                            <?= $l['nama'] ?>
                        </td>
                        <td>
                            <?= $l['nik'] ?>
                        </td>
                        <td>
                            <?= $l['jenis_laporan'] ?>
                        </td>
                        <td>
                            <?= $l['isi_laporan'] ?>
                        </td>
                        <td>
                            <?= $l['tgl_pengaduan'] ?>
                        </td>
                        <td>
                            <?php
                            // ... Kode status ...
                            ?>
                        </td>
                        <td>
                            <?= $l['tanggapan'] == null ? '-' : $l['tanggapan']; ?>
                        </td>
                        <td>
                            <?= $l['tgl_tanggapan'] == null ? '-' : $l['tgl_tanggapan']; ?>
                        </td>
                        <td>
                            <!-- Tautan cetak untuk data ini -->
                            <a target="_blank" href="<?= base_url('Admin/LaporanController/cetak_laporan/'.$l['nik']) ?>"
                                class="btn btn-sm btn-primary">Cetak</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="text-center">Belum ada data</p>
    <?php endif; ?>
</div>
<!-- /.container-fluid -->
