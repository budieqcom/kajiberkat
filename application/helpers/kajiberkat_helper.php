<?php
function kgb_berikut($tgl_kgb)
{
	$pecah_kgb = explode("-",$tgl_kgb);
	return ($pecah_kgb[0]+2).'-'.$pecah_kgb[1].'-'.$pecah_kgb[2];
}

function pangkat_berikut($tgl_pangkat)
{
	$pecah_pangkat = explode("-",$tgl_pangkat);
	return ($pecah_pangkat[0]+4).'-'.$pecah_pangkat[1].'-'.$pecah_pangkat[2];
}
?>