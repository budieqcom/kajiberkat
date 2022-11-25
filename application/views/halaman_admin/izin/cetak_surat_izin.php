<?php 
$url = base_url("template/template_izin.rtf");
$template = file_get_contents($url);

$tgl_sekarang = tgl_indo2(date('Y-m-d'));
$nama_pgw = $data_izin['nama_pegawai'];
$nip_pgw = $data_izin['nip'];
$mkt = $masa_kerja['mkt'];
$mkb = $masa_kerja['mkb'];
$tgl_surat_izin = tgl_indo2($data_izin['tanggal_surat_izin']);
$tgl_mulai_izin = tgl_indo2($data_izin['tanggal_mulai_izin']);
$tgl_selesai_izin = tgl_indo2($data_izin['tanggal_selesai_izin']);
$alasan_izin = $data_izin['alasan_izin'];
$alamat_izin = $data_izin['alamat_izin'];
$hp_pgw = $data_pegawai['nomor_hp'];
$lama_izin = $data_izin['lama_izin'];
$nama_pjb = $data_izin['nama_pejabat'];
$nip_pjb = $data_izin['nip_pejabat'];

$template = str_replace("#tgl_surat_izin#", $tgl_surat_izin, $template);
$template = str_replace("#nama_pegawai#", $nama_pgw, $template);
$template = str_replace("#nip_pegawai#", $nip_pgw, $template);
$template = str_replace("#mkt#", $mkt, $template);
$template = str_replace("#mkb#", $mkb, $template);
$template = str_replace("#alasan_izin#", $alasan_izin, $template);
$template = str_replace("#lama_izin#", $lama_izin, $template);
$template = str_replace("#tgl_mulai_izin#", $tgl_mulai_izin, $template);
$template = str_replace("#tgl_selesai_izin#", $tgl_selesai_izin, $template);
$template = str_replace("#alamat_izin#", $alamat_izin, $template);
$template = str_replace("#hp_pegawai#", $hp_pgw, $template);
$template = str_replace("#nama_pejabat#", $nama_pjb, $template);
$template = str_replace("#nip_pejabat#", $nip_pjb, $template);

header("Content-Type: application/vnd.ms-word");
header("Expires: 0");
header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
header("Content-disposition: attachment; filename=surat_izin.rtf");
header("Content-length: ".strlen($template));
echo $template;
?>