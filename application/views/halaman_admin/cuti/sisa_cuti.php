        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <form method="post" action="<?= base_url()?>index.php/Perizinan/proses_sisa_cuti/<?= $data_pegawai['id'] ?>" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-xl-6 col-sm-12 mb-4">
                        <!-- <?= $this->session->flashdata('pesan'); ?> -->
                        <div class="card">
                            <div class="card-header">
                                <strong>Sisa Cuti</strong>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <ul>
                                        <li><h5><strong><?= $data_pegawai['gelar_depan'].' '.$data_pegawai['nama_lengkap'].' '.$data_pegawai['gelar_belakang'] ?></strong></h5></li>
                                        <li><strong>N I P : <?= $data_pegawai['nip']?></strong></li>
                                    </ul>
                                </div>
                                <div class="form-group">
                                    <label><strong>N (<?= date('Y') ?>)</strong></label>
                                    <input type="number" class="form-control" name="n" value="<?= $sisa_cuti['n'];?>">
                                </div>
                                <div class="form-group">
                                    <label><strong>N - 1 (<?= (date('Y') - 1) ?>)</strong></label>
                                    <input type="number" class="form-control" name="n1" value="<?= $sisa_cuti['n1'];?>">
                                </div>
                                <div class="form-group">
                                    <label><strong>N - 2 (<?= (date('Y')- 2) ?>)</strong></label>
                                    <input type="number" class="form-control" name="n2" value="<?= $sisa_cuti['n2'];?>">
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
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 2000);
        </script>