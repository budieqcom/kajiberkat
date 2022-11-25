    <div class="container-fluid">
        <div class="card bg-gradient-success text-white shadow">
            <div class="card-body">
                <ul>
                    <li><strong><?= $data_user['gelar_depan'].' '.$data_user['nama_lengkap'].' '.$data_user['gelar_belakang'] ?></strong></li>
                    <li><strong>N I P : <?= $data_user['nip']?></strong></li>
                </ul>
            </div>
        </div>
		<form method="post" action="<?=base_url()?>index.php/admin/proses_update_cpns/<?=$data_user['id']?>" enctype="multipart/form-data">
			<div class="row mt-4">
				<div class="col-xl-6 col-sm-12 mb-4">
					<div class="card">
						<div class="card-body">
							<div class="form-group">
								<label><strong>Golongan CPNS</strong></label>
								<select class="form-control" name="golongan">
									<option value="">--- Pilih Golongan ---</option>
									<?php foreach ($golongan as $g):?>
										<?php if ($g['golongan'] == $cpns['golongan_ruang']):?>
											<option value="<?=$g['golongan']?>" selected><?=$g['golongan']?></option>
										<?php else:?>
											<option value="<?=$g['golongan']?>"><?=$g['golongan']?></option>
										<?php endif;?>
									<?php endforeach;?>
								</select>
							</div>
							<div class="form-group">
								<label><strong>TMT CPNS</strong></label>
								<div class="input-group mb-3">
									<input type="text" class="form-control datepicker" name="tmt_cpns" value="<?=tgl_indo($cpns['tmt_golongan']);?>">
									<div class="input-group-append">
										<span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label><strong>Nomor SK CPNS</strong></label>
								<input type="text" class="form-control" name="no_sk_cpns" value="<?=$cpns['no_sk_cpns'];?>">
							</div>
							<div class="form-group">
								<label><strong>Tanggal SK CPNS</strong></label>
								<div class="input-group mb-3">
									<input type="text" class="form-control datepicker" name="tanggal_sk_cpns" value="<?=tgl_indo($cpns['tanggal_sk_cpns'])?>">
									<div class="input-group-append">
										<span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label><strong>Dokumen SK CPNS</strong> &nbsp;
									<?php if ($cpns['dokumen_sk_cpns']):?>
										<a class="btn btn-default btn-sm" href="<?=base_url('dokumen_cpns/').$cpns['dokumen_sk_cpns']?>" target="_blank"><strong><?=$cpns['dokumen_sk_cpns']?></strong></a>
									<?php else:?>
										<a class="btn btn-danger btn-sm" href="#">Tidak ada dokumen SK CPNS</a>
									<?php endif;?>
								</label>
								<input type="file" class="form-control" name="dokumen_baru">
							</div>
							<div class="form-group">
								<label><strong>Pejabat Penandatangan SK</strong></label>
								<input type="text" class="form-control" name="pejabat_penandatangan_sk" value="<?=$cpns['pejabat_penandatangan_sk']?>">
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-6 col-sm-12 mb-4">
					<div class="card">
						<div class="card-body">
							<div class="form-group">
								<label><strong>Nomor Persetujuan Teknis</strong></label>
								<input type="text" class="form-control" name="nomor_persetujuan" value="<?=$cpns['nomor_persetujuan']?>">
							</div>
							<div class="form-group">
								<label><strong>Tanggal Persetujuan Teknis</strong></label>
								<div class="input-group mb-3">
									<input type="text" class="form-control datepicker" name="tanggal_persetujuan" value="<?=tgl_indo($cpns['tanggal_persetujuan'])?>">
									<div class="input-group-append">
										<span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label><strong>Gaji Pokok Rp.</strong></label>
								<input type="text" class="form-control" name="gaji_pokok" id="gaji_pokok" value="<?= ($cpns['gaji_pokok'] != "") ? number_format($cpns['gaji_pokok'],0,",",".") : "0" ?>">
							</div>
							<div class="form-group">
								<label><strong>Masa Kerja (bulan)</strong></label>
								<input type="text" class="form-control" name="masa_kerja" value="<?=$cpns['masa_kerja']?>">
							</div>
						</div>
					</div>
					<div class="float-right mt-4">
						<button type="submit" class="btn btn-primary btn-sm "><i class="far fa-save"></i> &nbsp; Simpan</button> &nbsp;
						<a href="<?=base_url()?>index.php/admin/cpns/<?=$data_user['id']?>" class="btn btn-danger btn-sm"><i class="far fa-window-close"></i> &nbsp; Batal</a>
					</div>
				</div>
			</div>
			<input type="hidden" name="id" value="<?=$cpns['id_pegawai']?>">
			<input type="hidden" name="dokumen_lama" value="<?=$cpns['dokumen_sk_cpns']?>">
			<input type="hidden" name="path_dokumen_lama" value="<?=$cpns['path_dokumen_sk_cpns']?>">
		</form>
		<script>
		var format_rupiah = document.getElementById('gaji_pokok');
		format_rupiah.addEventListener('keyup', function(e)
		{
			format_rupiah.value = formatRupiah(this.value, '');
		});
		
		function formatRupiah(angka, prefix)
		{
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split = number_string.split(','),
			sisa = split[0].length % 3,
			format_rupiah = split[0].substr(0, sisa),
			ribuan = split[0].substr(sisa).match(/\d{3}/gi);
			if (ribuan)
			{
				separator = sisa ? '.' : '';
				format_rupiah += separator + ribuan.join('.');
			}
			format_rupiah = split[1] != undefined ? format_rupiah + ',' + split[1] : format_rupiah;
			return prefix == undefined ? format_rupiah : (format_rupiah ? '' + format_rupiah : '');
		}
		</script>
	</div>
</div>