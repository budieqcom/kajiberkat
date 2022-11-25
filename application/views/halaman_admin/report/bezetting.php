	<!-- Begin Page Content -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						<strong>Daftar Bezetting Pegawai PA Medan</strong>
						<div class="float-right">
							<a href="<?= base_url()?>index.php/report/cetak_bezetting" class="btn btn-primary btn-sm"><i class="fas fa-print"></i> &nbsp; Export</a>&nbsp; &nbsp;
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered table-sm table-striped" id="dataTable" width="100%" cellspacing="0">
								<thead align="center">
									<tr>
										<th>No.</th>
										<th>NIP</th>
										<th>Nama Lengkap,<br>Tempat,<br>Tanggal Lahir</th>
                                        <th>Pangkat<br>TMT</th>
                                        <th>Jabatan<br>TMT</th>
                                        <th>Pendidikan</th>
									</tr>
								</thead>
								<tbody>
                                <?php 
                                $no = 1;
                                foreach ($bezetting as $b):
                                ?>
                                    <tr>
                                        <td align="center"><?=$no;?></td>
                                        <td align="center"><?=$b['nip_pegawai']?></td>
                                        <td><?=$b['gelar_depan'].' '.$b['nama_pegawai'].' '.$b['gelar_belakang']?>,<br><?=$b['tempat_lahir']?>, <br><?=tgl_indo2($b['tanggal_lahir'])?></td>
                                        <td align="center"><?=$b['golongan_ruang']?>,<br><?=tgl_indo2($b['tmt_golongan'])?></td>
                                        <td align="center"><?=$b['jabatan']?>,<br><?=tgl_indo2($b['tmt_mulai'])?></td>
                                        <td align="center"><?=$b['tingkat_pendidikan']?></td>
                                    </tr>
                                <?php 
                                $no++;
                                endforeach;?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->
	</div>
	<!-- End of Main Content -->