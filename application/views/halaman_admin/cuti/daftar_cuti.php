        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="col mt-3">
                <?= $this->session->flashdata('pesan'); ?>
                <div class="card">
                    <div class="card-header">
						<strong>Daftar Cuti</strong>
						<div class="float-right">
							<a href="<?=base_url()?>index.php/perizinan/tambah_cuti/<?=$data_pegawai['id']?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> &nbsp; Tambah Cuti</a>&nbsp;
                            <a href="<?=base_url()?>index.php/perizinan/sisa_cuti/<?=$data_pegawai['id']?>" class="btn btn-info btn-sm"><i class="fas fa-cogs"></i> &nbsp; Sisa Cuti</a>&nbsp; &nbsp;
                            <a href="<?=base_url()?>index.php/perizinan/daftar_pegawai" class="btn btn-warning btn-sm"><i class="fa fa-step-backward"></i> &nbsp; Kembali</a>
						</div>
					</div>
                    <div class="card-body">
                        <ul>
                            <li><h5><strong><?= $data_pegawai['gelar_depan'].' '.$data_pegawai['nama_lengkap'].' '.$data_pegawai['gelar_belakang'] ?></strong></h5>  </li>
                            <li><strong>N I P : <?= $data_pegawai['nip']?></strong></li>
                            <li><strong>Sisa Cuti : <?= (date('Y') - 2).': '. $sisa_cuti['n2']?> / <?= (date('Y') - 1).': '. $sisa_cuti['n1']?> / <?= date('Y').': '. $sisa_cuti['n']?></strong></li>
                        </ul>
                        <div class="table-responsive">
                            <table class="table table-sm table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead align="center">
                                    <tr>
                                        <th width="66px">No.</th>
                                        <th>Jenis Cuti</th>
                                        <th width="120">Tanggal<br>Mulai</th>
                                        <th width="120">Tanggal<br>Selesai</th>
                                        <th width="60">Lama<br>(Hari)</th>
                                        <th width="120">Proses</th>
                                        <th width="120">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                               <?php 
								$no = 1;
								foreach ($daftar_cuti as $dc):
                                    if ($dc['proses'] == "Disetujui"):
								?>
									<tr>
										<td align="center"><?= $no ?></td>
										<td align="center"><?= $dc['jenis_cuti_nama'] ?></td>
                                        <td align="center"><?= tgl_indo($dc['tanggal_mulai_cuti']) ?></td>
                                        <td align="center"><?= tgl_indo($dc['tanggal_selesai_cuti']) ?></td>
                                        <td align="center"><?= $dc['lama_cuti'] ?></td>
                                        <td align="center"><?= $dc['proses'] ?></td>
                                        <td align="center">
                                            <a class="btn disabled btn-primary btn-sm" href="<?=base_url()?>index.php/perizinan/cetak_cuti/<?=$dc['id']?>/<?=$dc['id_pegawai']?>"><i class="fas fa-print"></i></a> &nbsp;
                                            <a class="btn disabled btn-success btn-sm" href="<?=base_url()?>index.php/perizinan/edit_cuti/<?=$dc['id']?>/<?=$dc['id_pegawai']?>"><i class="fas fa-pencil-alt"></i></a>
                                            <a class="btn disabled btn-danger btn-sm" href="<?=base_url()?>index.php/perizinan/hapus_cuti/<?=$dc['id']?>/<?=$dc['id_pegawai']?>" onclick="return confirm('Yakin akan menghapus data?');"><i class="far fa-trash-alt"></i></a>
                                        </td>
									</tr>
								<?php 
								$no++;
                                    else:
                                ?>
                                    <tr>
                                        <td align="center"><?= $no ?></td>
                                        <td align="center"><?= $dc['jenis_cuti_nama'] ?></td>
                                        <td align="center"><?= tgl_indo($dc['tanggal_mulai_cuti']) ?></td>
                                        <td align="center"><?= tgl_indo($dc['tanggal_selesai_cuti']) ?></td>
                                        <td align="center"><?= $dc['lama_cuti'] ?></td>
                                        <td align="center"><?= $dc['proses'] ?></td>
                                        <td align="center">
                                            <a class="btn btn-primary btn-sm" href="<?=base_url()?>index.php/perizinan/cetak_cuti/<?=$dc['id']?>/<?=$dc['id_pegawai']?>"><i class="fas fa-print"></i></a> &nbsp;
                                            <a class="btn btn-success btn-sm" href="<?=base_url()?>index.php/perizinan/edit_cuti/<?=$dc['id']?>/<?=$dc['id_pegawai']?>"><i class="fas fa-pencil-alt"></i></a>
                                            <a class="btn btn-danger btn-sm" href="<?=base_url()?>index.php/perizinan/hapus_cuti/<?=$dc['id']?>/<?=$dc['id_pegawai']?>" onclick="return confirm('Yakin akan menghapus data?');"><i class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                <?php
                                    endif;
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
        <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 2000);
        </script>
