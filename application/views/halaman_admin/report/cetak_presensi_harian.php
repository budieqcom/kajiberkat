<h3>DATA PRESENSI HAKIM/PEGAWAI</h3>
<h3><?= tgl_indo2($period) ?></h3>
<table border="1" cellpadding="3">
    <tr>
        <th width="40">No.</th>
        <th>Nama Lengkap</th>
        <th>N I P</th>
        <th>Tanggal Absen</th>
        <th>Jam Masuk</th>
        <th>Jam Pulang</th>
    </tr>
    <?php 
    $no = 1;
    foreach ($presensi_harian as $data):
    ?>
    <tr>
        <td align="center"><?=$no?></td>
        <td align="center"><?= $data['gelar_depan'].' '.$data['nama_lengkap'].' '.$data['gelar_belakang'] ?></td>
        <td align="center"><?=$data['nip']?></td>
        <td align="center"><?=tgl_indo($data['tanggal_absen'])?></td>
        <td align="center"><?=$data['jam_masuk']?></td>
        <td align="center"><?=$data['jam_pulang']?></td>
    </tr>
    <?php 
    $no++;
    endforeach;
    ?>
</table>