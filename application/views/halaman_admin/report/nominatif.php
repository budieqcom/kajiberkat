	<!-- Begin Page Content -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						<strong>Daftar Nominatif Pegawai PA Medan</strong>
						<div class="float-right">
							<a href="<?= base_url() ?>index.php/report/cetak_duk" class="btn btn-primary btn-sm"><i class="fas fa-print"></i> &nbsp; Export</a>&nbsp; &nbsp;
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered table-sm table-striped" id="dataTable" width="100%" cellspacing="0">
								<thead align="center">
									<tr>
										<th>No.</th>
										<th>NIP</th>
										<th>Nama Lengkap</th>
										<th>Tempat<br>Tanggal Lahir</th>
										<th>Jenis Kelamin</th>
                                        <th>Pangkat<br>TMT</th>
                                        <th>Jabatan<br>TMT</th>
                                        <th>Pendidikan</th>
                                        <th>Alamat</th>
									</tr>
								</thead>
								<tbody>
                                <?php 
                                $no = 1;
                                foreach ($nominatif as $n):
                                ?>
                                    <tr>
                                        <td align="center"><?=$no;?></td>
                                        <td align="center"><?=$n['nip_pegawai']?></td>
                                        <td><?=$n['gelar_depan'].' '.$n['nama_pegawai'].' '.$n['gelar_belakang']?></td>
                                        <td align="center"><?=$n['tempat_lahir']?>,<br><?=tgl_indo2($n['tanggal_lahir'])?></td>
                                        <td align="center"><?=$n['jenis_kelamin']?></td>
                                        <td align="center"><?=$n['golongan_ruang']?>,<br><?=tgl_indo2($n['tmt_golongan'])?></td>
                                        <td align="center"><?=$n['jabatan']?>,<br><?=tgl_indo2($n['tmt_mulai'])?></td>
                                        <td align="center"><?=$n['tingkat_pendidikan']?></td>
                                        <td><?=$n['alamat']?></td>
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