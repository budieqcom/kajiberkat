        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="col mt-3">
                <?= $this->session->flashdata('pesan'); ?>
                <ul class="nav nav-tabs">
                    <li class="active"><a class="nav-link active" href="<?= base_url()?>index.php/perizinan/daftar_cuti_pegawai">Daftar Cuti</a></li>
                    <?php if ($jumlah_mohon_cuti['jumlah'] > 0): ?>
                    <li><a class="nav-link active" href="<?= base_url()?>index.php/perizinan/daftar_mohon_cuti">Permohonan Cuti <span class="badge badge-danger badge-sm"><?= $jumlah_mohon_cuti['jumlah'] ?></span></a></li>
                     <?php else: ?>
                    <li><a class="nav-link active" href="<?= base_url()?>index.php/perizinan/daftar_mohon_cuti">Permohonan Cuti</a></li>
                    <?php endif; ?>
                </ul>
                <div class="card">
                    <div class="card-header"><strong>Daftar Cuti Pegawai</strong></div>
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
                                foreach ($daftar_cuti as $dc):
                                ?>
                                    <tr>
                                        <td align="center"><?= $no ?></td>
                                        <td align="center"><?= $dc['gelar_depan_pegawai'].' '.$dc['nama_pegawai'].' '.$dc['gelar_belakang_pegawai'] ?><br><?= $dc['nip'] ?></td>
                                        <td align="center"><?= tgl_indo($dc['tanggal_mulai']) ?></td>
                                        <td align="center"><?= tgl_indo($dc['tanggal_selesai']) ?></td>
                                        <td align="center"><?= $dc['lama_cuti'] ?></td>
                                        <td align="center"><?= $dc['proses'] ?></td>
                                        <td align="center"><?= $dc['gelar_depan_pejabat'].' '.$dc['nama_pejabat'].' '.$dc['gelar_belakang_pejabat'] ?><br><?= $dc['nip_pejabat'] ?></td>
                                        <td align="center"><a class="btn btn-default btn-sm" href="<?= base_url('dokumen_cuti/').$dc['dokumen_surat_cuti_nama'] ?>"><?= $dc['dokumen_surat_cuti_nama'] ?></a></td>
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