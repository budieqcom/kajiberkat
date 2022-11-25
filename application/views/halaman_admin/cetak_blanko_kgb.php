<?php 
$url = base_url("template/blanko_kgb.rtf");
$template = file_get_contents($url);

$tgl_sekarang = tgl_indo2(date('Y-m-d'));
$nama_pgw = $data_blanko_kgb['nama_pegawai'];
$nip_pgw = $data_blanko_kgb['nip_pegawai'];
$pangkat_pgw = $data_blanko_kgb['golongan_ruang'];
$jabatan_pgw = $data_blanko_kgb['jabatan'];
$golongan_pgw = $data_blanko_kgb['golongan'];
$gaji_lama_pgw = number_format($data_blanko_kgb['gaji_pokok'],0,",",".");
$mkt = $masa_kerja['mkt'];
$mkb = $masa_kerja['mkb'];

$template = str_replace("#nama_pegawai#", $nama_pgw, $template);
$template = str_replace("#nip_pegawai#", $nip_pgw, $template);
$template = str_replace("#pangkat#", $pangkat_pgw, $template);
$template = str_replace("#jabatan#", $jabatan_pgw, $template);
$template = str_replace("#golongan#", $golongan_pgw, $template);
$template = str_replace("#mkt#", $mkt, $template);
$template = str_replace("#mkb#", $mkb, $template);
$template = str_replace("#gaji_lama#", $gaji_lama_pgw, $template);

header("Content-Type: application/vnd.ms-word");
header("Expires: 0");
header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
header("Content-disposition: attachment; filename=blanko_kgb_".$nip_pgw.".rtf");
header("Content-length: ".strlen($template));
echo $template;
?>