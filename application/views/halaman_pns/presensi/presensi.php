        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12 col-sm-12 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <strong>Presensi Pegawai</strong>
                            <div class="float-right">
                                <?php if ($qrcode['tanggal'] == date('Y-m-d')): ?>
							    <a href="<?=base_url()?>index.php/presensi_pegawai/buat_kode_presensi/<?= $data_pegawai['id']?>" class="btn disabled btn-primary btn-sm"><i class="fas fa-plus"></i> &nbsp; Buat Kode</a> &nbsp;
                                <?php else: ?>
                                <a href="<?=base_url()?>index.php/presensi_pegawai/buat_kode_presensi/<?= $data_pegawai['id']?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> &nbsp; Buat Kode</a> &nbsp;
                                <?php endif; ?>
                                <a href="<?=base_url()?>index.php/halaman_pns" class="btn btn-warning btn-sm"><i class="fa fa-step-backward"></i> &nbsp; Kembali</a>
						    </div>
                        </div>
                        <div class="card-body">
                            <ul>
                                <li><h5><strong><?= $data_pegawai['gelar_depan'].' '.$data_pegawai['nama_lengkap'].' '.$data_pegawai['gelar_belakang'] ?></strong></h5></li>
                                <li><strong>N I P : <?= $data_pegawai['nip']?></strong></li>
                            </ul>
                            <div class="form-group">
                                <div class="row justify-content-center">
                                    <?php if (!empty($qrcode['kode'])): ?>
                                    <img class="img-fluid" src="<?= base_url('dokumen_qrcode/').'qrcode'.$qrcode['kode'] ?>"></td>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
        <script>
        
        </script>