        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <form method="post" action="<?= base_url()?>index.php/izin_pegawai/proses_edit_izin" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-xl-6 col-sm-12 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <strong>Edit Izin Tidak Masuk</strong>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <ul>
                                        <li><h5><strong><?= $data_pegawai['gelar_depan'].' '.$data_pegawai['nama_lengkap'].' '.$data_pegawai['gelar_belakang'] ?></strong></h5></li>
                                        <li><strong>N I P : <?= $data_pegawai['nip']?></strong></li>
                                    </ul>
                                </div>
                                <div class="form-group">
                                    <label><strong>Tanggal Surat Izin</strong></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control datepicker" name="tanggal_surat_izin" value="<?= tgl_indo($data_izin['tanggal_surat_izin']) ?>">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><strong>Alasan Izin</strong></label>
                                    <textarea class="form-control" name="alasan_izin" id="alasan_izin"><?= $data_izin['alasan_izin'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label><strong>Alamat Saat Izin</strong></label>
                                    <textarea class="form-control" name="alamat_izin" id="alamat_izin"><?= $data_izin['alamat_izin'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label><strong>Lokasi Izin</strong></label>
                                    <select class="form-control" name="lokasi_izin">
                                        <option value="">--- Pilih Lokasi Izin ---</option>
                                        <?php foreach ($lokasi_cuti as $lk):?>
                                            <?php if ($data_izin['lokasi_izin'] == $lk['id']): ?>
                                                <option value="<?= $lk['id']?>" selected><?=$lk['nama']?></option>
                                            <?php else: ?>
                                                <option value="<?= $lk['id']?>"><?=$lk['nama']?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>                        
                                </div>
                                <div class="form-group">
                                    <label><strong>Tanggal Mulai Izin</strong></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control datepicker" name="tanggal_mulai_izin" value="<?= tgl_indo($data_izin['tanggal_mulai_izin']) ?>">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                    </div> 
                                </div>
                                <div class="form-group">
									<label><strong>Tanggal Selesai Izin</strong></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control datepicker" name="tanggal_selesai_izin" value="<?= tgl_indo($data_izin['tanggal_selesai_izin']) ?>">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                    </div>
								</div>
                                <div class="form-group">
                                    <label><strong>Lama Izin (Hari)</strong></label>
                                    <input type="number" class="form-control" name="lama_izin" value="<?= $data_izin['lama_izin'] ?>">
                                </div>
                                <div class="form-group">
                                    <label><strong>Nama Pejabat</strong></label>
                                    <select class="form-control select2" name="pejabat_izin">
                                        <option value="">--- Pilih Nama Pejabat ---</option>
                                        <?php foreach($data_semua_pegawai as $dp):?>
                                            <?php if ($data_izin['pejabat'] == $dp['id']):?>
                                                <option value="<?=$dp['id']?>" selected><?=$dp['gelar_depan'].' '.$dp['nama_lengkap'].' ' .$dp['gelar_belakang']?></option>
                                            <?php else: ?>
                                                <option value="<?=$dp['id']?>"><?=$dp['gelar_depan'].' '.$dp['nama_lengkap'].' ' .$dp['gelar_belakang']?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>                        
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="<?= $data_izin['id'] ?>">
                        <input type="hidden" name="id_pegawai" value="<?= $data_pegawai['id'] ?>">
                        <div class="float-right mt-4">
                            <button type="submit" class="btn btn-primary btn-sm "><i class="far fa-save"></i> &nbsp; Simpan</button> &nbsp;
                            <a href="<?= base_url() ?>index.php/izin_pegawai/daftar_izin_pegawai" class="btn btn-danger btn-sm"><i class="far fa-window-close"></i> &nbsp; Batal</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
        <script>
        
        </script>