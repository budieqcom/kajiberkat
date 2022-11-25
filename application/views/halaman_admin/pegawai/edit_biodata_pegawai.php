        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <div class="card bg-gradient-success text-white shadow">
                        <div class="card-body">
                            <ul>
                                <li><strong><?= $data_user['gelar_depan'].' '.$data_user['nama_lengkap'].' '.$data_user['gelar_belakang'] ?></strong></li>
                                <li><strong>N I P : <?= $data_user['nip']?></strong></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Heading -->
            <form method="post" action="<?=base_url()?>index.php/admin/proses_update_pegawai/<?=$profile['id']?>" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-xl-6 col-sm-12 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <label><strong>Biodata</strong></label>
                            </div>
                            <div class="card-body">
                                <input type="hidden" name="id" value="<?=$profile['id']?>">
                                <input type="hidden" name="foto_lama" value="<?=$profile['file_foto']?>">
                                <div class="form-group">
                                    <label><strong>Gelar Depan</strong></label>
                                    <input type="text" class="form-control" name="gelar_depan" value="<?=$profile['gelar_depan']?>">
                                </div>
                                <div class="form-group">
                                    <label><strong>Gelar Belakang</strong></label>
                                    <input type="text" class="form-control" name="gelar_belakang" value="<?=$profile['gelar_belakang']?>">
                                </div>
                                <div class="form-group">
                                    <label><strong>Nama Lengkap</strong></label>
                                    <input type="text" class="form-control" name="nama_lengkap" value="<?=$profile['nama_lengkap']?>">
                                </div>
                                <div class="form-group">
                                    <label><strong>NIK</strong></label>
                                    <input type="text" class="form-control" name="nik" value="<?=$profile['nik']?>">
                                </div>
                                <div class="form-group">
                                    <label><strong>NIP</strong></label>
                                    <input type="text" class="form-control" name="nip" value="<?=$profile['nip']?>">
                                </div>
                                <div class="form-group">
                                    <label><strong>Agama</strong></label>
                                    <select class="form-control" name="agama">
                                        <option value="">--- Pilih Agama ---</option>
                                        <?php foreach ($agama as $a):?>
                                            <?php if ($a['nama'] == $profile['agama']):?>
                                                <option value="<?=$a['nama']?>" selected><?=$a['nama']?></option>
                                            <?php else:?>
                                                <option value="<?=$a['nama']?>"><?=$a['nama']?></option>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><strong>Status Perkawinan</strong></label>
                                    <select class="form-control" name="status_perkawinan">
                                        <option value="">--- Pilih Status Perkawinan ---</option>
                                        <?php foreach ($status_perkawinan as $st_kawin):?>
                                            <?php if ($st_kawin['nama'] == $profile['status_perkawinan']):?>
                                                <option value="<?=$st_kawin['nama']?>" selected><?=$st_kawin['nama']?></option>
                                            <?php else:?>
                                                <option value="<?=$st_kawin['nama']?>"><?=$st_kawin['nama']?></option>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><strong>No. Telepon</strong></label>
                                    <input type="text" class="form-control" name="no_telepon" value="<?=$profile['nomor_telepon']?>">
                                </div>
                                <div class="form-group">
                                    <label><strong>No. Handphone</strong></label>
                                    <input type="text" class="form-control" name="no_hp" value="<?=$profile['nomor_hp']?>">
                                </div>
                                <div class="form-group">
                                    <label><strong>Foto</strong></label> &nbsp;
                                    <img class="img-profile rounded-circle" src="<?=base_url('dokumen_foto/').$profile['file_foto']?>" height=80>
                                    <input type="file" class="form-control" name="foto_baru">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-sm-12 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <label><strong>Kelahiran</strong></label>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label><strong>Tempat Lahir</strong></label>
                                    <input type="text" class="form-control" name="tempat_lahir" value="<?=$profile['tempat_lahir']?>">
                                </div>
                                <div class="form-group">
                                    <label><strong>Tanggal Lahir</strong></label>
									<div class="input-group mb-3">
										<input type="text" class="form-control datepicker" name="tanggal_lahir" value="<?=tgl_indo($profile['tanggal_lahir'])?>">
										<div class="input-group-append">
											<span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
										</div>
									</div>
                                </div>
                                <div class="form-group">
                                    <label><strong>Jenis Kelamin</strong></label>
                                    <select class="form-control" name="jenis_kelamin">
                                        <option value="">--- Pilih Jenis Kelamin ---</option>
                                        <?php foreach ($jenis_kelamin as $jk):?>
                                            <?php if ($jk['nama'] == $profile['jenis_kelamin']):?>
                                                <option value="<?=$jk['nama']?>" selected><?=$jk['nama']?></option>
                                            <?php else:?>
                                                <option value="<?=$jk['nama']?>"><?=$jk['nama']?></option>
                                            <?php endif; ?>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-4">
                            <div class="card-header">
                                <label><strong>Lain-lain</strong></label>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label><strong>Tingkat Pendidikan</strong></label>
                                    <select class="form-control" name="tingkat_pendidikan">
                                        <option value="">--- Pilih Tingkat Pendidikan</option>
                                        <?php foreach ($tingkat_pendidikan as $tp):?>
                                            <?php if ($tp['nama'] == $profile['tingkat_pendidikan']):?>
                                                <option value="<?=$tp['nama']?>" selected><?=$tp['nama']?></option>
                                            <?php else:?>
                                                <option value="<?=$tp['nama']?>"><?=$tp['nama']?></option>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><strong>Email</strong></label>
                                    <input type="email" class="form-control" name="email" value="<?=$profile['email']?>">
                                </div>
                                <div class="form-group">
                                    <label><strong>Password</strong></label>
                                    <input type="text" class="form-control" name="pass" value="<?=$profile['pass']?>" >
                                </div>
                            </div>
                        </div>
                        <div class="float-right mt-4">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="far fa-save"></i> &nbsp; Simpan</button> &nbsp;
                            <a href="<?=base_url()?>index.php/admin/pegawai/<?=$data_user['id']?>" class="btn btn-danger btn-sm"><i class="far fa-window-close"></i> &nbsp; Batal</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.container-fluid -->                
	</div>
	<!-- End of Main Content -->