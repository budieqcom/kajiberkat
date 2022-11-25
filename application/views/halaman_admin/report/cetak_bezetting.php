<h3>Laporan Bezetting</h3>
<table border="1" cellpadding="3">
    <thead align="center">
        <tr>
            <th>No.</th>
            <th>NIP</th>
            <th>Nama Lengkap,<br>Tempat,<br>Tanggal Lahir</th>
            <th>Pangkat<br>TMT</th>
            <th>Jabatan<br>TMT</th>
            <th>Pendidikan</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    $no = 1;
    foreach ($bezetting as $b):
    ?>
        <tr>
            <td align="center"><?=$no;?></td>
            <td align="center"><?=$b['nip_pegawai']?></td>
            <td><?=$b['gelar_depan'].' '.$b['nama_pegawai'].' '.$b['gelar_belakang']?>,<br><?=$b['tempat_lahir']?>, <br><?=tgl_indo2($b['tanggal_lahir'])?></td>
            <td align="center"><?=$b['golongan_ruang']?>,<br><?=tgl_indo2($b['tmt_golongan'])?></td>
            <td align="center"><?=$b['jabatan']?>,<br><?=tgl_indo2($b['tmt_mulai'])?></td>
            <td align="center"><?=$b['tingkat_pendidikan']?></td>
        </tr>
    <?php 
    $no++;
    endforeach;?>
    </tbody>
</table>