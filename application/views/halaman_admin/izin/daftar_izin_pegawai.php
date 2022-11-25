        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="col mt-3">
                <?= $this->session->flashdata('pesan'); ?>
                <ul class="nav nav-tabs">
                    <li class="active"><a class="nav-link active" href="<?= base_url()?>index.php/perizinan/daftar_izin_pegawai">Daftar Izin Tidak Masuk</a></li>
                    <?php if ($jumlah_mohon_izin['jumlah'] > 0): ?>
                    <li><a class="nav-link active" href="<?= base_url()?>index.php/perizinan/daftar_mohon_izin">Permohonan Izin Tidak Masuk <span class="badge badge-danger badge-sm"><?= $jumlah_mohon_izin['jumlah'] ?></span></a></li>
                    <?php else: ?>
                    <li><a class="nav-link active" href="<?= base_url()?>index.php/perizinan/daftar_mohon_izin">Permohonan Izin Tidak Masuk</a></li>
                    <?php endif; ?>
                </ul>
                <div class="card">
                    <div class="card-header"><strong>Daftar Izin Tidak Masuk Pegawai</strong></div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead align="center">
                                    <tr>
                                        <th width="40">No.</th>
                                        <th>Hakim/Pegawai<br>N I P</th>
                                        <th width="80">Tanggal<br>Mulai</th>
                                        <th width="80">Tanggal<br>Selesai</th>
                                        <th width="40">Lama<br>(Hari)</th>
                                        <th width="100">Proses</th>
                                        <th>Pejabat<br>N I P</th>
                                        <th width="150">Berkas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $no = 1;
                                foreach ($daftar_izin as $di):
                                ?>
                                    <tr>
                                        <td align="center"><?= $no ?></td>
                                        <td align="center"><?= $di['gelar_depan_pegawai'].' '.$di['nama_pegawai'].' '.$di['gelar_belakang_pegawai'] ?><br><?= $di['nip'] ?></td>
                                        <td align="center"><?= tgl_indo($di['tanggal_mulai_izin']) ?></td>
                                        <td align="center"><?= tgl_indo($di['tanggal_selesai_izin']) ?></td>
                                        <td align="center"><?= $di['lama_izin'] ?></td>
                                        <td align="center"><?= $di['proses'] ?></td>
                                        <td align="center"><?= $di['gelar_depan_pejabat'].' '.$di['nama_pejabat'].' '.$di['gelar_belakang_pejabat'] ?><br><?= $di['nip_pejabat'] ?></td>
                                        <td align="center"><a class="btn btn-default btn-sm" href="<?= base_url('dokumen_izin/').$di['dokumen_surat_izin_nama'] ?>"><?= $di['dokumen_surat_izin_nama'] ?></a></td>
                                    </tr>
                                <?php 
                                $no++;
                                endforeach; 
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->