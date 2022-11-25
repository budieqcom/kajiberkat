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
            <form method="post" action="<?=base_url()?>index.php/admin/proses_edit_pasangan/<?=$profile['id']?>" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-xl-6 col-sm-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label><strong>Nama Pasangan</strong></label>
                                    <input type="text" class="form-control" name="nama_pasangan" value="<?=$data_pasangan['nama']?>">
                                </div>
                                <div class="form-group">
                                    <label><strong>Hubungan Keluarga</strong></label>
                                    <select class="form-control" name="hubungan_keluarga">
                                        <option value="">--- Pilih Hubungan Keluarga ---</option>
                                        <?php foreach ($hubungan_keluarga as $hk):?>
                                            <?php if ($hk['nama'] == $data_pasangan['hubungan_keluarga']):?>
                                                <option value="<?=$hk['nama']?>" selected><?=$hk['nama']?></option>
                                            <?php else:?>
                                                <option value="<?=$hk['nama']?>"><?=$hk['nama']?></option>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><strong>NIK</strong></label>
                                    <input type="text" class="form-control" name="nik" value="<?=$data_pasangan['nik']?>">
                                </div>
                                <div class="form-group">
                                    <label><strong>Pekerjaan</strong></label>
                                    <select class="form-control" name="pekerjaan">
                                        <option value="">--- Pilih Pekerjaan ---</option>
                                        <?php foreach ($pekerjaan as $pk):?>
                                            <?php if ($pk['nama'] == $data_pasangan['pekerjaan']):?>
                                                <option value="<?=$pk['nama']?>" selected><?=$pk['nama']?></option>
                                            <?php else:?>
                                                <option value="<?=$pk['nama']?>"><?=$pk['nama']?></option>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><strong>Nomor Kartu</strong></label>
                                    <input type="text" class="form-control" name="nomor_kartu" value="<?=$data_pasangan['nomor_kartu']?>">
                                </div>
                                <div class="form-group">
                                    <label><strong>Alamat Kantor</strong></label>
                                    <input type="text" class="form-control" name="alamat_kantor" value="<?=$data_pasangan['alamat_kantor']?>">
                                </div>
                                <div class="form-group">
                                    <label><strong>Tempat Lahir</strong></label>
                                    <input type="text" class="form-control" name="tempat_lahir" value="<?=$data_pasangan['tempat_lahir']?>">
                                </div>
                                <div class="form-group">
                                    <label><strong>Tanggal Lahir</strong></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control datepicker" name="tanggal_lahir" value="<?=tgl_indo($data_pasangan['tanggal_lahir'])?>">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-sm-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label><strong>Foto</strong></label> &nbsp;
                                    <?php if ($data_pasangan['file_foto']):?>
                                        <img class="image-profile rounded-circle" src="<?=base_url('dokumen_pasangan/').$data_pasangan['file_foto']?>" width="80">
                                    <?php else:?>
                                        <a class="btn btn-danger btn-sm" href="#">Tidak ada File Foto</a>
                                    <?php endif;?>
                                    <input type="file" class="form-control" name="file_foto_baru">
                                </div>
                                <div class="form-group">
                                    <label><strong>Dokumen Buku Nikah</strong></label>
                                    <?php if ($data_pasangan['buku_nikah']):?>
                                        <a class="btn btn-default btn-sm" href="<?=base_url('dokumen_pasangan/').$data_pasangan['buku_nikah']?>" target="_blank"><strong><?= $data_pasangan['buku_nikah'] ?></strong></a>
                                    <?php else:?>
                                        <a class="btn btn-danger btn-sm" href="#">Tidak ada ada Dokumen Buku Nikah</a>
                                    <?php endif;?>
                                    <input type="file" class="form-control" name="buku_nikah_baru">
                                </div>
                                <div class="form-group">
                                    <label><strong>Agama</strong></label>
                                    <select class="form-control" name="agama">
                                        <option value="">--- Pilih Agama ---</option>
                                        <?php foreach ($agama as $a):?>
                                            <?php if ($a['nama'] == $data_pasangan['agama']):?>
                                                <option value="<?=$a['nama']?>" selected><?=$a['nama']?></option>
                                            <?php else:?>
                                                <option value="<?=$a['nama']?>"><?=$a['nama']?></option>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><strong>Status Kesehatan</strong></label>
                                    <select class="form-control" name="status_sehat">
                                        <option value="">--- Pilih Status Kesehatan ---</option>
                                        <?php foreach ($status_kesehatan as $sk):?>
                                            <?php if ($sk['nama'] == $data_pasangan['status_kesehatan']):?>
                                                <option value="<?=$sk['nama']?>" selected><?=$sk['nama']?></option>
                                            <?php else:?>
                                                <option value="<?=$sk['nama']?>"><?=$sk['nama']?></option>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><strong>Pendidikan</strong></label>
                                    <select class="form-control" name="pendidikan">
                                        <option value="">--- Pilih Pendidikan ---</option>
                                        <?php foreach ($pendidikan as $pd):?>
                                            <?php if ($pd['nama'] == $data_pasangan['pendidikan']):?>
                                                <option value="<?=$pd['nama']?>" selected><?=$pd['nama']?></option>
                                            <?php else:?>
                                                <option value="<?=$pd['nama']?>"><?=$pd['nama']?></option>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><strong>Masih Hidup</strong></label>
                                    <select class="form-control" name="masih_hidup">
                                        <option value="">--- Pilih Masih Hidup ---</option>
                                        <?php foreach ($masih_hidup as $mh):?>
                                            <?php if ($mh['nama'] == $data_pasangan['masih_hidup']):?>
                                                <option value="<?=$mh['nama']?>" selected><?=$mh['nama']?></option>
                                            <?php else:?>
                                                <option value="<?=$mh['nama']?>"><?=$mh['nama']?></option>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><strong>Berhak Tunjangan</strong></label>
                                    <select class="form-control" name="berhak_tunjangan">
                                        <option value="">--- Pilih Berhak Tunjangan ---</option>
                                        <?php foreach ($berhak_tunjangan as $bh):?>
                                            <?php if ($bh['nama'] == $data_pasangan['berhak_tunjangan']):?>
                                                <option value="<?=$bh['nama']?>" selected><?=$bh['nama']?></option>
                                            <?php else:?>
                                                <option value="<?=$bh['nama']?>"><?=$bh['nama']?></option>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><strong>Status Perkawinan</strong></label>
                                    <select class="form-control" name="status_perkawinan">
                                        <option value="">--- Pilih Status Perkawinan --</option>
                                        <?php foreach ($status_perkawinan as $sp):?>
                                            <?php if ($sp['nama'] == $data_pasangan['status_perkawinan']):?>
                                                <option value="<?=$sp['nama']?>" selected><?=$sp['nama']?></option>
                                            <?php else:?>
                                                <option value="<?=$sp['nama']?>"><?=$sp['nama']?></option>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><strong>Tanggal Nikah</strong></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control datepicker" name="tanggal_nikah" value="<?=tgl_indo($data_pasangan['tanggal_nikah'])?>">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="float-right mt-4">
                        	<button type="submit" class="btn btn-primary btn-sm "><i class="far fa-save"></i> &nbsp; Simpan</button> &nbsp;
							<a href="<?=base_url()?>index.php/admin/pasangan/<?=$profile['id']?>" class="btn btn-danger btn-sm"><i class="far fa-window-close"></i> &nbsp; Batal</a>
                        </div>
                        <input type="hidden" name="id_pasangan" value="<?=$data_pasangan['id']?>">
                        <input type="hidden" name="id_pegawai" value="<?=$pns['id_pegawai']?>">
                        <input type="hidden" name="nip_pegawai" value="<?=$pns['nip_pegawai']?>">
                        <input type="hidden" name="file_foto_lama" value="<?=$data_pasangan['file_foto']?>">
                        <input type="hidden" name="path_file_foto_lama" value="<?=$data_pasangan['path_file_foto']?>">
                        <input type="hidden" name="buku_nikah_lama" value="<?=$data_pasangan['buku_nikah']?>">
                        <input type="hidden" name="path_buku_nikah_lama" value="<?=$data_pasangan['path_buku_nikah']?>">
                    </div>
                </div>
            </form>
        </div>
        <!-- /.container-fluid -->                
	</div>
	<!-- End of Main Content -->