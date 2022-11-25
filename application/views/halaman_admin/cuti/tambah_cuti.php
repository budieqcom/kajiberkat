        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <form method="post" action="<?= base_url() ?>index.php/perizinan/proses_tambah_cuti/<?= $data_pegawai['id'] ?>" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-xl-6 col-sm-12 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <strong>Tambah Cuti</strong>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <ul>
                                        <li><h5><strong><?= $data_pegawai['gelar_depan'].' '.$data_pegawai['nama_lengkap'].' '.$data_pegawai['gelar_belakang'] ?></strong></h5></li>
                                        <li><strong>N I P : <?= $data_pegawai['nip']?></strong></li>
                                        <li><strong>Sisa Cuti : <?= (date('Y') - 2).': '. $sisa_cuti['n2']?> / <?= (date('Y') - 1).': '. $sisa_cuti['n1']?> / <?= date('Y').': '. $sisa_cuti['n']?></strong></li>
                                    </ul>
                                </div>
                                <div class="form-group">
                                    <label><strong>Tanggal Surat Cuti</strong></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control datepicker" name="tanggal_surat_cuti">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><strong>Alasan Cuti</strong></label>
                                    <textarea class="form-control" name="alasan_cuti" id="alasan_cuti"></textarea>
                                </div>
                                <div class="form-group">
                                    <label><strong>Alamat Saat Cuti</strong></label>
                                    <textarea class="form-control" name="alamat_cuti" id="alamat_cuti"></textarea>
                                </div>
                                <div class="form-group">
                                    <label><strong>Lokasi Cuti</strong></label>
                                    <select class="form-control" name="lokasi_cuti">
                                        <option value="">--- Pilih Lokasi Cuti ---</option>
                                        <?php foreach($lokasi_cuti as $lk):?>
                                        <option value="<?= $lk['id']?>"><?=$lk['nama']?></option>
                                        <?php endforeach; ?>
                                    </select>                        
                                </div>
                                <div class="form-group">
        							<label><strong>Jenis Cuti</strong></label>
									<select class="form-control" name="jenis_cuti">
										<option value="">--- Pilih Jenis Cuti ---</option>
										<?php foreach($jenis_cuti as $jc):?>
										<option value="<?= $jc['id'];?>"><?= $jc['nama'];?></option>
										<?php endforeach; ?>
									</select>                        
								</div>
                                <div class="form-group">
                                    <label><strong>Tanggal Mulai Cuti</strong></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control datepicker" name="tanggal_mulai_cuti">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                    </div> 
                                </div>
                                <div class="form-group">
									<label><strong>Tanggal Selesai Cuti</strong></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control datepicker" name="tanggal_selesai_cuti">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                    </div>
								</div>
                                <div class="form-group">
                                    <label><strong>Lama Cuti (Hari)</strong></label>
                                    <input type="number" class="form-control" name="lama_cuti">
                                </div>
                                <div class="form-group">
                                    <label><strong>Nama Atasan</strong></label>
                                    <select class="form-control select2" name="atasan_cuti">
                                        <option value="">--- Pilih Nama Atasan ---</option>
                                        <?php foreach($data_semua_pegawai as $dp):?>
                                        <option value="<?=$dp['id']?>"><?=$dp['gelar_depan'].' '.$dp['nama_lengkap'].' ' .$dp['gelar_belakang']?></option>
                                        <?php endforeach; ?>
                                    </select>                        
                                </div>
                                <div class="form-group">
                                    <label><strong>Nama Pejabat</strong></label>
                                    <select class="form-control select2" name="pejabat_cuti">
                                        <option value="">--- Pilih Nama Pejabat ---</option>
                                        <?php foreach($data_semua_pegawai as $dp):?>
                                        <option value="<?=$dp['id']?>"><?=$dp['gelar_depan'].' '.$dp['nama_lengkap'].' ' .$dp['gelar_belakang']?></option>
                                        <?php endforeach; ?>
                                    </select>                        
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id_pegawai" value="<?= $data_pegawai['id'] ?>">
                        <div class="float-right mt-4">
                            <button type="submit" class="btn btn-primary btn-sm "><i class="far fa-save"></i> &nbsp; Simpan</button> &nbsp;
                            <a href="<?= base_url() ?>index.php/perizinan/daftar_cuti/<?= $data_pegawai['id']?>" class="btn btn-danger btn-sm"><i class="far fa-window-close"></i> &nbsp; Batal</a>
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