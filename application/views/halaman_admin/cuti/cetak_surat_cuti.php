<?php 
$url = base_url("template/template_cuti.rtf");
$template = file_get_contents($url);

$tgl_sekarang = tgl_indo2(date('Y-m-d'));
$nama_pgw = $data_cuti['nama_pegawai'];
$nip_pgw = $data_cuti['nip'];
$mkt = $masa_kerja['mkt'];
$mkb = $masa_kerja['mkb'];
$tgl_surat = tgl_indo2($data_cuti['tanggal_surat']);
$tgl_mulai = tgl_indo2($data_cuti['tanggal_mulai']);
$tgl_selesai = tgl_indo2($data_cuti['tanggal_selesai']);
$alasan_cuti = $data_cuti['alasan_cuti'];
$alamat_cuti = $data_cuti['alamat_cuti'];
$hp_pgw = $data_pegawai['nomor_hp'];
$lama_cuti = $data_cuti['lama_cuti'];
$n = $sisa_cuti['n'];
$n1 = $sisa_cuti['n1'];
$n2 = $sisa_cuti['n2'];
$nama_pjb = $data_cuti['nama_pejabat'];
$nip_pjb = $data_cuti['nip_pejabat'];
$nama_atasan = $data_cuti['nama_atasan'];
$nip_atasan = $data_cuti['nip_atasan'];

$template = str_replace("#tgl_surat#", $tgl_surat, $template);
$template = str_replace("#nama_pegawai#", $nama_pgw, $template);
$template = str_replace("#nip_pegawai#", $nip_pgw, $template);
$template = str_replace("#mkt#", $mkt, $template);
$template = str_replace("#mkb#", $mkb, $template);
$template = str_replace("#alasan_cuti#", $alasan_cuti, $template);
$template = str_replace("#lama_cuti#", $lama_cuti, $template);
$template = str_replace("#tgl_mulai_cuti#", $tgl_mulai, $template);
$template = str_replace("#tgl_selesai_cuti#", $tgl_selesai, $template);
$template = str_replace("#alamat_cuti#", $alamat_cuti, $template);
$template = str_replace("#hp_pegawai#", $hp_pgw, $template);
$template = str_replace("#n2#", $n2, $template);
$template = str_replace("#n1#", $n1, $template);
$template = str_replace("#n#", $n, $template);
$template = str_replace("#nama_atasan#", $nama_atasan, $template);
$template = str_replace("#nip_atasan#", $nip_atasan, $template);
$template = str_replace("#nama_pejabat#", $nama_pjb, $template);
$template = str_replace("#nip_pejabat#", $nip_pjb, $template);

header("Content-Type: application/vnd.ms-word");
header("Expires: 0");
header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
header("Content-disposition: attachment; filename=surat_cuti.rtf");
header("Content-length: ".strlen($template));
echo $template;
?>