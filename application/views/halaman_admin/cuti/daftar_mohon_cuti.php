        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="col mt-3">
                <?= $this->session->flashdata('pesan'); ?>
                <ul class="nav nav-tabs">
                    <li><a class="nav-link active" href="<?= base_url()?>index.php/perizinan/daftar_cuti_pegawai">Daftar Cuti</a></li>
                    <?php if ($jumlah_mohon_cuti['jumlah'] > 0): ?>
                    <li><a class="nav-link active" href="<?= base_url()?>index.php/perizinan/daftar_mohon_cuti">Permohonan Cuti <span class="badge badge-danger badge-sm"><?= $jumlah_mohon_cuti['jumlah'] ?></span></a></li>
                     <?php else: ?>
                    <li><a class="nav-link active" href="<?= base_url()?>index.php/perizinan/daftar_mohon_cuti">Permohonan Cuti</a></li>
                    <?php endif; ?>
                </ul>
                <div class="card">
                    <div class="card-header"><strong>Permohonan Cuti Pegawai</strong></div>
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
                                        <th width="100">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $no = 1;
                                foreach ($daftar_mohon_cuti as $mohon_cuti):
                                ?>
                                    <tr>
                                        <td align="center"><?= $no ?></td>
                                        <td align="center"><?= $mohon_cuti['gelar_depan_pegawai'].' '.$mohon_cuti['nama_pegawai'].' '.$mohon_cuti['gelar_belakang_pegawai'] ?><br><?= $mohon_cuti['nip'] ?></td>
                                        <td align="center"><?= tgl_indo($mohon_cuti['tanggal_mulai']) ?></td>
                                        <td align="center"><?= tgl_indo($mohon_cuti['tanggal_selesai']) ?></td>
                                        <td align="center"><?= $mohon_cuti['lama_cuti'] ?></td>
                                        <td align="center"><?= $mohon_cuti['proses'] ?></td>
                                        <td align="center"><?= $mohon_cuti['gelar_depan_pejabat'].' '.$mohon_cuti['nama_pejabat'].' '.$mohon_cuti['gelar_belakang_pejabat'] ?><br><?= $mohon_cuti['nip_pejabat'] ?></td>
                                        <td align="center">
                                            <a class="btn btn-success btn-sm" href="<?= base_url()?>index.php/perizinan/setuju_mohon_cuti/<?= $mohon_cuti['id'] ?>/<?= $mohon_cuti['id_pegawai'] ?>"><i class="fas fa-check"></i></a>&nbsp;
                                            <a class="btn btn-danger btn-sm" href="<?= base_url()?>index.php/perizinan/hapus_mohon_cuti/<?= $mohon_cuti['id'] ?>" onclick="return confirm('Yakin akan menghapus data?');"><i class="fas fa-times"></i></a>
                                        </td>
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