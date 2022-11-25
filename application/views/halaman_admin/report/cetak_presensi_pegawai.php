<h3>Data Presensi <?= $presensi_pegawai['0']['gelar_depan'].' '.$presensi_pegawai['0']['nama_lengkap'].' '.$presensi_pegawai['0']['gelar_belakang'] ?></h3>
<h3><?= bulan_indo($period) ?></h3>
<table border="1" cellpadding="3">
    <thead align="center">
        <tr>
            <th width="40">No.</th>
            <th>Tanggal Absen</th>
            <th>Jam Masuk</th>
            <th>Jam Pulang</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    $no = 1;
    foreach ($presensi_pegawai as $data):
    ?>
        <tr>
            <td align="center"><?=$no?></td>
            <td align="center"><?=tgl_indo($data['tanggal_absen'])?></td>
            <td align="center"><?=$data['jam_masuk']?></td>
            <td align="center"><?=$data['jam_pulang']?></td>
        </tr>
    <?php 
    $no++;
    endforeach;
    ?>
    </tbody>
</table>