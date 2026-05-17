<!DOCTYPE html>
<html>
<head>
    <title><?= $title; ?></title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .header { text-align: center; margin-bottom: 30px; }
        .header h2 { margin: 0; }
        .header p { margin: 5px 0 0; }
        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body onload="window.print()">
    <div class="header">
        <h2>SISTEM ADMINISTRASI RW 011</h2>
        <p>Laporan Data Seluruh Warga</p>
        <p>Tanggal Cetak: <?= date('d/m/Y H:i'); ?></p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama Lengkap</th>
                <th>TTL</th>
                <th>L/P</th>
                <th>Agama</th>
                <th>Status Kawin</th>
                <th>Pekerjaan</th>
                <th>Alamat</th>
                <th>RT/RW</th>
                <th>Status Warga</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($warga as $row): ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['nik']; ?></td>
                <td><?= $row['nama_lengkap']; ?></td>
                <td><?= $row['tempat_lahir']; ?>, <?= date('d-m-Y', strtotime($row['tanggal_lahir'])); ?></td>
                <td><?= $row['jenis_kelamin']; ?></td>
                <td><?= $row['agama']; ?></td>
                <td><?= $row['status_perkawinan']; ?></td>
                <td><?= $row['pekerjaan']; ?></td>
                <td><?= $row['alamat']; ?></td>
                <td><?= $row['rt']; ?>/<?= $row['rw']; ?></td>
                <td><?= $row['status_warga']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div style="margin-top: 50px; float: right; text-align: center; width: 200px;">
        <p>Dicetak oleh,</p>
        <br><br><br>
        <p><b><?= $this->session->userdata('nama'); ?></b></p>
    </div>

    <div class="no-print" style="margin-top: 20px;">
        <a href="<?= base_url('admin/warga'); ?>" style="padding: 8px 15px; background-color: #6c757d; color: white; text-decoration: none; border-radius: 4px;">Kembali</a>
    </div>
</body>
</html>
