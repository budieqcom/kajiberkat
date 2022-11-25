        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="col mt-3">
                <?= $this->session->flashdata('pesan'); ?>
                <div class="card">
                    <div class="card-header"><strong>Perizinan</strong></div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead align="center">
                                    <tr>
                                        <th width="40">No.</th>
                                        <th width="183">N I P</th>
                                        <th>Nama Hakim/Pegawai</th>
                                        <th width="220">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                               <?php 
								$no = 1;
								foreach ($daftar_pegawai as $dp):
								?>
									<tr>
										<td align="center"><?= $no ?></td>
										<td align="center"><?= $dp['nip'] ?></td>
										<td><?= $dp['gelar_depan'].' '.$dp['nama_lengkap'].' '.$dp['gelar_belakang'] ?></td>
										<td align="center">
                                            <a class="btn btn-info btn-sm" href="<?= base_url() ?>index.php/perizinan/daftar_cuti/<?= $dp['id']?>"><i class="fas fa-sign-in-alt"></i> Izin Cuti</a>&nbsp;
                                            <a class="btn btn-success btn-sm" href="<?= base_url() ?>index.php/perizinan/daftar_izin/<?= $dp['id']?>"><i class="fas fa-sign-in-alt"></i> Tidak Masuk</a>&nbsp;
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