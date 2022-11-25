        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <form method="post" action="<?= base_url() ?>index.php/perizinan/proses_setuju_izin/<?= $data['id'] ?>/<?= $data['id_pegawai'] ?>" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-xl-6 col-sm-12 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <strong>Penyetujuan Permohonan Izin</strong>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <ul>
                                        <li><h5><strong><?= $data['nama_pegawai']?></strong></h5></li>
                                        <li><strong>N I P : <?= $data['nip']?></strong></li>
                                    </ul>
                                </div>
                                <div class="form-group">
                                    <label><strong>Tanggal Surat Izin</strong></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control datepicker" name="tanggal_surat_izin" value="<?= tgl_indo($data['tanggal_surat_izin']) ?>">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><strong>Tanggal Mulai Izin</strong></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control datepicker" name="tanggal_mulai_izin" value="<?= tgl_indo($data['tanggal_mulai_izin']) ?>">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                    </div> 
                                </div>
                                <div class="form-group">
									<label><strong>Tanggal Selesai Izin</strong></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control datepicker" name="tanggal_selesai_izin" value="<?= tgl_indo($data['tanggal_selesai_izin']) ?>">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                    </div>
								</div>
                                <div class="form-group">
                                    <label><strong>Lama Izin (Hari)</strong></label>
                                    <input type="number" class="form-control" name="lama_izin" value="<?= $data['lama_izin'] ?>">
                                </div>
                                
                                <div class="form-group">
                                    <label><strong>Dokumen Surat Izin Tidak Masuk</strong></label>
                                    <input type="file" class="form-control" name="dokumen_surat_izin">
                                </div>
                            </div>
                        </div>
                        <div class="float-right mt-4">
                            <button type="submit" class="btn btn-primary btn-sm "><i class="far fa-save"></i> &nbsp; Simpan</button> &nbsp;
                            <a href="<?= base_url() ?>index.php/perizinan/daftar_mohon_izin" class="btn btn-danger btn-sm"><i class="far fa-window-close"></i> &nbsp; Batal</a>
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