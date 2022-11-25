        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <form method="post" action="<?=base_url()?>index.php/ortu/proses_edit_ortu" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-xl-6 col-sm-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label><strong>Hubungan Keluarga</strong></label>
                                    <select class="form-control" name="hubungan_keluarga">
                                        <option value="">--- Pilih Hubungan Keluarga ---</option>
                                        <?php foreach ($hubungan_keluarga as $hk):?>
                                            <?php if ($hk['nama'] == $data_ortu['hubungan_keluarga']):?>
                                                <option value="<?=$hk['nama']?>" selected><?=$hk['nama']?></option>
                                            <?php else:?>
                                                <option value="<?=$hk['nama']?>"><?=$hk['nama']?></option>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><strong>Pekerjaan</strong></label>
                                    <select class="form-control" name="pekerjaan">
                                        <option value="">--- Pilih Pekerjaan ---</option>
                                        <?php foreach ($pekerjaan as $pk):?>
                                            <?php if ($pk['nama'] == $data_ortu['pekerjaan']):?>
                                                <option value="<?=$pk['nama']?>" selected><?=$pk['nama']?></option>
                                            <?php else:?>
                                                <option value="<?=$pk['nama']?>"><?=$pk['nama']?></option>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><strong>Nama</strong></label>
                                    <input type="text" class="form-control" name="nama" value="<?=$data_ortu['nama']?>">
                                </div>
                                <div class="form-group">
                                    <label><strong>NIK</strong></label>
                                    <input type="text" class="form-control" name="nik" value="<?=$data_ortu['nik']?>">
                                </div>
                                <div class="form-group">
                                    <label><strong>Alamat Kantor</strong></label>
                                    <input type="text" class="form-control" name="alamat_kantor" value="<?=$data_ortu['alamat_kantor']?>">
                                </div>
                                <div class="form-group">
                                    <label><strong>Tempat Lahir</strong></label>
                                    <input type="text" class="form-control" name="tempat_lahir" value="<?=$data_ortu['tempat_lahir']?>">
                                </div>
                                <div class="form-group">
                                    <label><strong>Tanggal Lahir</strong></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control datepicker" name="tanggal_lahir" value="<?=tgl_indo($data_ortu['tanggal_lahir'])?>">
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
                                    <label><strong>Agama</strong></label>
                                    <select class="form-control" name="agama">
                                        <option value="">--- Pilih Agama ---</option>
                                        <?php foreach ($agama as $a):?>
                                            <?php if ($a['nama'] == $data_ortu['agama']):?>
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
                                            <?php if ($sk['nama'] == $data_ortu['status_kesehatan']):?>
                                                <option value="<?=$sk['nama']?>" selected><?=$sk['nama']?></option>
                                            <?php else:?>
                                                <option value="<?=$sk['nama']?>"><?=$sk['nama']?></option>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><strong>Status Perkawinan</strong></label>
                                    <select class="form-control" name="status_perkawinan">
                                        <option value="">--- Pilih Status Perkawinan --</option>
                                        <?php foreach ($status_perkawinan as $sp):?>
                                            <?php if ($sp['nama'] == $data_ortu['status_perkawinan']):?>
                                                <option value="<?=$sp['nama']?>" selected><?=$sp['nama']?></option>
                                            <?php else:?>
                                                <option value="<?=$sp['nama']?>"><?=$sp['nama']?></option>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><strong>Masih Hidup</strong></label>
                                    <select class="form-control" name="masih_hidup">
                                        <option value="">--- Pilih Masih Hidup ---</option>
                                        <?php foreach ($masih_hidup as $mh):?>
                                            <?php if ($mh['nama'] == $data_ortu['masih_hidup']):?>   
                                                <option value="<?=$mh['nama']?>" selected><?=$mh['nama']?></option>
                                            <?php else:?>
                                                <option value="<?=$mh['nama']?>"><?=$mh['nama']?></option>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><strong>Foto</strong></label> &nbsp;
                                    <?php if ($data_ortu['file_foto']):?>
                                        <img class="img-profile rounded-circle" src="<?=base_url('dokumen_ortu/').$data_ortu['file_foto']?>" width="80">
                                    <?php else:?>
                                        <a class="btn btn-danger btn-sm" href="#">Tidak ada ada File Foto</a>
                                    <?php endif;?>
                                    <input type="file" class="form-control" name="file_foto_baru">
                                </div>
                            </div>
                        </div>
                        <div class="float-right mt-4">
                        	<button type="submit" class="btn btn-primary btn-sm "><i class="far fa-save"></i> &nbsp; Simpan</button> &nbsp;
							<a href="<?=base_url()?>index.php/ortu/ortu" class="btn btn-danger btn-sm"><i class="far fa-window-close"></i> &nbsp; Batal</a>
                        </div>
                        <input type="hidden" name="id_ortu" value="<?=$data_ortu['id']?>">
                        <input type="hidden" name="id_pegawai" value="<?=$pns['id_pegawai']?>">
                        <input type="hidden" name="nip_pegawai" value="<?=$pns['nip_pegawai']?>">
                        <input type="hidden" name="file_foto_lama" value="<?=$data_ortu['file_foto']?>">
                        <input type="hidden" name="path_file_foto_lama" value="<?=$data_ortu['path_file_foto']?>">
                    </div>
                </div>
            </form>
        </div>
        <!-- /.container-fluid -->                
	</div>
	<!-- End of Main Content -->