        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="card bg-gradient-success text-white shadow">
                <div class="card-body">
                    <ul>
                        <li><strong><?= $data_user['gelar_depan'].' '.$data_user['nama_lengkap'].' '.$data_user['gelar_belakang'] ?></strong></li>
                        <li><strong>N I P : <?= $data_user['nip']?></strong></li>
                    </ul>
                </div>
            </div>
            <form method="post" action="<?=base_url()?>index.php/admin/proses_edit_saudara/<?=$data_user['id']?>" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-xl-6 col-sm-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label><strong>Hubungan Keluarga</strong></label>
                                    <select class="form-control" name="hubungan_keluarga">
                                        <option value="">--- Pilih Hubungan Keluarga ---</option>
                                        <?php foreach ($hubungan_keluarga as $hk):?>
                                            <?php if ($hk['nama'] == $data_saudara['hubungan_keluarga']):?>
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
                                            <?php if ($pk['nama'] == $data_saudara['pekerjaan']):?>
                                                <option value="<?=$pk['nama']?>" selected><?=$pk['nama']?></option>
                                            <?php else:?>
                                                <option value="<?=$pk['nama']?>"><?=$pk['nama']?></option>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><strong>Nama</strong></label>
                                    <input type="text" class="form-control" name="nama" value="<?=$data_saudara['nama']?>">
                                </div>
                                <div class="form-group">
                                    <label><strong>NIK</strong></label>
                                    <input type="text" class="form-control" name="nik" value="<?=$data_saudara['nik']?>">
                                </div>
                                <div class="form-group">
                                    <label><strong>Alamat Kantor</strong></label>
                                    <input type="text" class="form-control" name="alamat_kantor" value="<?=$data_saudara['alamat_kantor']?>">
                                </div>
                                <div class="form-group">
                                    <label><strong>Tempat Lahir</strong></label>
                                    <input type="text" class="form-control" name="tempat_lahir" value="<?=$data_saudara['tempat_lahir']?>">
                                </div>
                                <div class="form-group">
                                    <label><strong>Tanggal Lahir</strong></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control datepicker" name="tanggal_lahir" value="<?=tgl_indo($data_saudara['tanggal_lahir'])?>">
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
                                            <?php if ($jk['nama'] == $data_saudara['jenis_kelamin']):?>
                                                <option value="<?=$jk['nama']?>" selected><?=$jk['nama']?></option>
                                            <?php else:?>
                                                <option value="<?=$jk['nama']?>"><?=$jk['nama']?></option>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-sm-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label><strong>Pendidikan</strong></label>
                                    <select class="form-control" name="pendidikan">
                                        <option value="">--- Pilih Pendidikan ---</option>
                                        <?php foreach ($pendidikan as $pd):?>
                                            <?php if ($pd['nama'] == $data_saudara['pendidikan']):?>
                                                <option value="<?=$pd['nama']?>" selected><?=$pd['nama']?></option>
                                            <?php else:?>
                                                <option value="<?=$pd['nama']?>"><?=$pd['nama']?></option>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><strong>Agama</strong></label>
                                    <select class="form-control" name="agama">
                                        <option value="">--- Pilih Agama ---</option>
                                        <?php foreach ($agama as $a):?>
                                            <?php if ($a['nama'] == $data_saudara['agama']):?>
                                                <option value="<?=$a['nama']?>" selected><?=$a['nama']?></option>
                                            <?php else:?>
                                                <option value="<?=$a['nama']?>"><?=$a['nama']?></option>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><strong>Status Kesehatan</strong></label>
                                    <select class="form-control" name="status_kesehatan">
                                        <option value="">--- Pilih Status Kesehatan ---</option>
                                        <?php foreach ($status_kesehatan as $sk):?>
                                            <?php if ($sk['nama'] == $data_saudara['status_kesehatan']):?>
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
                                            <?php if ($sp['nama'] == $data_saudara['status_perkawinan']):?>
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
                                            <?php if ($mh['nama'] == $data_saudara['masih_hidup']):?>
                                                <option value="<?=$mh['nama']?>" selected><?=$mh['nama']?></option>
                                            <?php else:?>
                                                <option value="<?=$mh['nama']?>"><?=$mh['nama']?></option>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="float-right mt-4">
                            <button type="submit" class="btn btn-primary btn-sm "><i class="far fa-save"></i> &nbsp; Simpan</button> &nbsp;
                            <a href="<?=base_url()?>index.php/admin/saudara/<?=$data_user['id']?>" class="btn btn-danger btn-sm"><i class="far fa-window-close"></i> &nbsp; Batal</a>
                        </div>
                        <input type="hidden" name="id_saudara" value="<?=$data_saudara['id']?>">
                        <input type="hidden" name="id_pegawai" value="<?=$pns['id_pegawai']?>">
                        <input type="hidden" name="nip_pegawai" value="<?=$pns['nip_pegawai']?>">
                    </div>
                </div>
            </form>
        </div>
        <!-- /.container-fluid -->                
    </div>
    <!-- End of Main Content -->