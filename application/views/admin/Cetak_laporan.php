<?php if ($laporan): ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laporan Detail</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                line-height: 1.6;
            }
            .container {
                max-width: 800px;
                margin: 0 auto;
                padding: 20px;
                border: 1px solid #ccc;
                border-radius: 10px;
                background-color: #fff;
                box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            }
            .title {
                text-align: center;
                margin-bottom: 20px;
            }
            .kop {
                margin-bottom: 30px;
            }
            .kop p {
                margin: 0;
            }
            .laporan-detail {
                margin-bottom: 30px;
            }
            .laporan-detail h2 {
                margin-bottom: 10px;
            }
            .laporan-detail p {
                margin-bottom: 15px;
            }
            .tgl-pelaporan {
                margin-top: 30px;
                text-align: right;
                font-style: italic;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <?php foreach ($laporan as $item): ?>
                <div class="kop">
                    <p>PEMERINTAH KOTA XXX</p>
                    <p>DINAS PELAPORAN MASYARAKAT</p>
                    <p>Jl. Contoh No. 123, Kota XXX</p>
                    <p>Telp: (012) 345-6789 | Email: dinaspelaporan@kotaxxx.go.id</p>
                </div>
                <h1 class="title">Surat Laporan</h1>
                <div class="laporan-detail">
                    <h2>Nama Pelapor: <?= $item['nama'] ?></h2>
                    <p>Hal yang Dilaporkan: <?= $item['jenis_laporan'] ?></p>
                    <p>Laporan:</p>
                    <p><?= $item['isi_laporan'] ?></p>
                </div>
                <div class="tgl-pelaporan">
                    <p>Tanggal Pelaporan: <?= $item['tgl_pengaduan'] ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </body>
    </html>
<?php else: ?>
    <p class="text-center">Belum ada data</p>
<?php endif; ?>
