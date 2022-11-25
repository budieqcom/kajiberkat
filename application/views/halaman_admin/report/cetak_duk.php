<h3>Laporan Nominatif</h3>
<table border="1" cellpadding="3">
    <thead align="center">
        <tr>
            <th>No.</th>
            <th>NIP</th>
            <th>Nama Lengkap</th>
            <th>Tempat<br>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Pangkat<br>TMT</th>
            <th>Jabatan<br>TMT</th>
            <th>Pendidikan</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    $no = 1;
    foreach ($nominatif as $n):
    ?>
        <tr>
            <td align="center"><?=$no;?></td>
            <td align="center"><?=$n['nip_pegawai']?></td>
            <td><?=$n['gelar_depan'].' '.$n['nama_pegawai'].' '.$n['gelar_belakang']?></td>
            <td align="center"><?=$n['tempat_lahir']?>,<br><?=tgl_indo2($n['tanggal_lahir'])?></td>
            <td align="center"><?=$n['jenis_kelamin']?></td>
            <td align="center"><?=$n['golongan_ruang']?>,<br><?=tgl_indo2($n['tmt_golongan'])?></td>
            <td align="center"><?=$n['jabatan']?>,<br><?=tgl_indo2($n['tmt_mulai'])?></td>
            <td align="center"><?=$n['tingkat_pendidikan']?></td>
            <td><?=$n['alamat']?></td>
        </tr>
    <?php 
    $no++;
    endforeach;?>
    </tbody>
</table>