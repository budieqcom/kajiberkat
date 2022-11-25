        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <form method="post" action="<?= base_url() ?>index.php/perizinan/proses_setuju_cuti/<?= $data['id'] ?>/<?= $data['id_pegawai'] ?>" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-xl-6 col-sm-12 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <strong>Penyetujuan Permohonan Cuti</strong>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <ul>
                                        <li><h5><strong><?= $data['nama_pegawai']?></strong></h5></li>
                                        <li><strong>N I P : <?= $data['nip']?></strong></li>
                                    </ul>
                                </div>
                                <div class="form-group">
                                    <label><strong>Tanggal Surat Cuti</strong></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control datepicker" name="tanggal_surat_cuti" value="<?= tgl_indo($data['tanggal_surat']) ?>">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><strong>Tanggal Mulai Cuti</strong></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control datepicker" name="tanggal_mulai_cuti" value="<?= tgl_indo($data['tanggal_mulai']) ?>">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                    </div> 
                                </div>
                                <div class="form-group">
									<label><strong>Tanggal Selesai Cuti</strong></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control datepicker" name="tanggal_selesai_cuti" value="<?= tgl_indo($data['tanggal_selesai']) ?>">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                    </div>
								</div>
                                <div class="form-group">
                                    <label><strong>Lama Cuti (Hari)</strong></label>
                                    <input type="number" class="form-control" name="lama_cuti" value="<?= $data['lama_cuti'] ?>">
                                </div>
                                
                                <div class="form-group">
                                    <label><strong>Dokumen Surat Cuti</strong></label>
                                    <input type="file" class="form-control" name="dokumen_surat_cuti">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="jenis_cuti" value="<?= $data['id_jenis_cuti'] ?>">
                        <div class="float-right mt-4">
                            <button type="submit" class="btn btn-primary btn-sm "><i class="far fa-save"></i> &nbsp; Simpan</button> &nbsp;
                            <a href="<?= base_url() ?>index.php/perizinan/daftar_mohon_cuti" class="btn btn-danger btn-sm"><i class="far fa-window-close"></i> &nbsp; Batal</a>
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