<h3>DATA PRESENSI APEL JUMAT HAKIM/PEGAWAI</h3>
<h3><?= tgl_indo2($period) ?></h3>
<table border="1" cellpadding="3">
    <tr>
        <th width="40">No.</th>
        <th>Nama Lengkap</th>
        <th>N I P</th>
        <th>Tanggal Absen</th>
        <th>Jam</th>
    </tr>
    <?php 
    $no = 1;
    foreach ($presensi_jumat as $data):
    ?>
    <tr>
        <td align="center"><?=$no?></td>
        <td align="center"><?= $data['gelar_depan'].' '.$data['nama_lengkap'].' '.$data['gelar_belakang'] ?></td>
        <td align="center"><?=$data['nip']?></td>
        <td align="center"><?=tgl_indo($data['tanggal'])?></td>
        <td align="center"><?=$data['jam']?></td>
    </tr>
    <?php 
    $no++;
    endforeach;
    ?>
</table>