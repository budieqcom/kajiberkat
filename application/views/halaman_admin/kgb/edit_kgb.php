<div class="container-fluid">
        <div class="card bg-gradient-success text-white shadow">
            <div class="card-body">
                <ul>
                    <li><strong><?= $data_user['gelar_depan'].' '.$data_user['nama_lengkap'].' '.$data_user['gelar_belakang'] ?></strong></li>
                    <li><strong>N I P : <?= $data_user['nip']?></strong></li>
                </ul>
            </div>
        </div>
		<form method="post" action="<?=base_url()?>index.php/admin/proses_edit_kgb/<?=$data_user['id']?>" enctype="multipart/form-data">
			<div class="row mt-4">
				<div class="col-xl-6 col-sm-12 mb-4">
				<div class="card">
					<div class="card-body">
						<div class="form-group">
							<label><strong>Golongan Ruang</strong></label>
							<select class="form-control" name="golongan">
								<option value="">--- Pilih Golongan ---</option>
								<?php foreach ($golongan as $g):?>
									<?php if ($g['golongan'] == $data_kgb['golongan_ruang']):?>
										<option value="<?=$g['golongan']?>" selected><?=$g['golongan']?></option>
									<?php else:?>
										<option value="<?=$g['golongan']?>"><?=$g['golongan']?></option>
									<?php endif;?>
								<?php endforeach;?>
							</select>
						</div>
						<div class="form-group">
							<label><strong>Gaji Pokok Rp.</strong></label>
							<input type="text" class="form-control" id="gaji_pokok" name="gaji_pokok" value="<?=number_format($data_kgb['gaji_pokok'],0,",",".")?>">
						</div>
						<div class="form-group">
							<label><strong>Besaran Gaji</strong></label>
							<input type="text" class="form-control" id="besaran_gaji" name="besaran_gaji" value="<?=number_format($data_kgb['besaran_gaji'],0,",",".")?>">
						</div>
						<div class="form-group">
							<label><strong>Pejabat Pembuat Surat KGB</strong></label>
							<input type="text" class="form-control" name="pejabat_kgb" value="<?=$data_kgb['pejabat_kgb']?>">
						</div>
						<div class="form-group">
							<label><strong>Nomor Surat KGB</strong></label>
							<input type="text" class="form-control" name="no_surat_kgb" value="<?=$data_kgb['nomor_surat_kgb']?>">
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-6 col-sm-12 mb-4">
				<div class="card">
					<div class="card-body">
						<div class="form-group">
							<label><strong>Tanggal Surat KGB</strong></label>
							<div class="input-group mb-3">
								<input type="text" class="form-control datepicker" name="tanggal_surat_kgb" value="<?=tgl_indo($data_kgb['tanggal_surat_kgb'])?>">
								<div class="input-group-append">
									<span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label><strong>TMT KGB</strong></label>
							<div class="input-group mb-3">
								<input type="text" class="form-control datepicker" name="tmt_kgb" value="<?=tgl_indo($data_kgb['tmt_kgb'])?>">
								<div class="input-group-append">
									<span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label><strong>Dokumen KGB</strong></label>
							<?php if ($data_kgb['dokumen_kgb']):?>
								<a class="btn btn-secondary btn-sm" href="<?=base_url('dokumen_kgb/').$data_kgb['dokumen_kgb']?>" target="_blank"><?=$data_kgb['dokumen_kgb']?></a>
							<?php else:?>
								<a class="btn btn-danger btn-sm" href="#">Tidak ada Dokumen KGB</a>
							<?php endif;?>
							<input type="file" class="form-control" name="dokumen_kgb_baru">
						</div>		
                    </div>
                </div>
                <div class="float-right mt-4">
					<button type="submit" class="btn btn-primary btn-sm "><i class="far fa-save"></i> &nbsp; Simpan</button> &nbsp;
					<a href="<?=base_url()?>index.php/admin/kgb/<?=$data_user['id']?>" class="btn btn-danger btn-sm"><i class="far fa-window-close"></i> &nbsp; Batal</a>
				</div>
            </div>
			</div>
			<input type="hidden" name="id_kgb" value="<?=$data_kgb['id']?>">
			<input type="hidden" name="id_pegawai" value="<?=$pns['id_pegawai']?>">
            <input type="hidden" name="nip_pegawai" value="<?=$pns['nip_pegawai']?>">
            <input type="hidden" name="dokumen_kgb_lama" value="<?=$data_kgb['dokumen_kgb']?>">
            <input type="hidden" name="path_dokumen_kgb_lama" value="<?=$data_kgb['path_dokumen_kgb']?>">
		</form>
	</div>
</div>