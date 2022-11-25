        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <form method="post" action="<?= base_url() ?>index.php/mutasi/proses_tambah_mutasi" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-xl-6 col-sm-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label><strong>Pilih Pegawai</strong></label>
                                    <select class="form-control" name="nip_pegawai">
                                        <option value="">--- Pilih Pegawai ---</option>
                                        <?php foreach ($data_pegawai as $dp) : ?>
                                            <option value="<?= $dp['nip'] ?>"><?= $dp['nip'].' '.$dp['gelar_depan'].' '.$dp['nama_lengkap'].' '.$dp['gelar_belakang']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><strong>Jenis Mutasi</strong></label>
                                    <select class="form-control" name="jenis_mutasi">
                                        <option value="">--- Pilih Jenis Mutasi ---</option>
                                        <?php foreach ($jenis_mutasi as $jm) : ?>
                                            <option value="<?= $jm['nama'] ?>"><?= $jm['nama'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><strong>Tanggal Mutasi</strong></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control datepicker" name="tanggal_mutasi">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><strong>Nomor SK Mutasi</strong></label>
                                    <input type="text" class="form-control" name="no_sk_mutasi">
                                </div>
                                <div class="form-group">
                                    <label><strong>Dokumen Mutasi</strong></label>
                                    <input type="file" class="form-control" name="dokumen_sk_mutasi">
                                </div>
                            </div>
                        </div>
                        <div class="float-right mt-4">
                            <button type="submit" class="btn btn-primary btn-sm "><i class="far fa-save"></i> &nbsp; Simpan</button> &nbsp;
                            <a href="<?= base_url() ?>index.php/mutasi/daftar_mutasi" class="btn btn-danger btn-sm"><i class="far fa-window-close"></i> &nbsp; Batal</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->