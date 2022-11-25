        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="col mt-3">
                <?= $this->session->flashdata('pesan'); ?>
                <ul class="nav nav-tabs">
                    <li><a class="nav-link active" href="<?= base_url()?>index.php/perizinan/daftar_izin_pegawai">Daftar Izin Tidak Masuk</a></li>
                    <?php if ($jumlah_mohon_izin['jumlah'] > 0): ?>
                    <li><a class="nav-link active" href="<?= base_url()?>index.php/perizinan/daftar_mohon_izin">Permohonan Izin Tidak Masuk <span class="badge badge-danger badge-sm"><?= $jumlah_mohon_izin['jumlah'] ?></span></a></li>
                    <?php else: ?>
                    <li><a class="nav-link active" href="<?= base_url()?>index.php/perizinan/daftar_mohon_izin">Permohonan Izin Tidak Masuk</a></li>
                    <?php endif; ?>
                </ul>
                <div class="card">
                    <div class="card-header"><strong>Permohonan Izin Tidak Masuk Pegawai</strong></div>
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
                                foreach ($daftar_mohon_izin as $mohon_izin):
                                ?>
                                    <tr>
                                        <td align="center"><?= $no ?></td>
                                        <td align="center"><?= $mohon_izin['gelar_depan_pegawai'].' '.$mohon_izin['nama_pegawai'].' '.$mohon_izin['gelar_belakang_pegawai'] ?><br><?= $mohon_izin['nip'] ?></td>
                                        <td align="center"><?= tgl_indo($mohon_izin['tanggal_mulai_izin']) ?></td>
                                        <td align="center"><?= tgl_indo($mohon_izin['tanggal_selesai_izin']) ?></td>
                                        <td align="center"><?= $mohon_izin['lama_izin'] ?></td>
                                        <td align="center"><?= $mohon_izin['proses'] ?></td>
                                        <td align="center"><?= $mohon_izin['gelar_depan_pejabat'].' '.$mohon_izin['nama_pejabat'].' '.$mohon_izin['gelar_belakang_pejabat'] ?><br><?= $mohon_izin['nip_pejabat'] ?></td>
                                        <td align="center">
                                            <a class="btn btn-success btn-sm" href="<?= base_url()?>index.php/perizinan/setuju_mohon_izin/<?= $mohon_izin['id'] ?>/<?= $mohon_izin['id_pegawai'] ?>"><i class="fas fa-check"></i></a>&nbsp;
                                            <a class="btn btn-danger btn-sm" href="<?= base_url()?>index.php/perizinan/hapus_mohon_izin/<?= $mohon_izin['id'] ?>" onclick="return confirm('Yakin akan menghapus data?');"><i class="fas fa-times"></i></a>
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