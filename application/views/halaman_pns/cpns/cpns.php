	<div class="container-fluid">
		<div class="row">
			<div class="col mt-4">
				<?= $this->session->flashdata('pesan'); ?>
				<div class="card">
					<div class="card-header">
						<strong>Informasi Golongan Dan SK CPNS</strong>
						<div class="float-right">
							<a href="<?= base_url() ?>index.php/cpns/edit_cpns" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i> &nbsp; Edit Data</a>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" cellspacing="0">
								<tr>
									<td style="width: 30%;text-align:right"><strong>Golongan CPNS</strong></td>
									<td><?= $cpns['golongan_ruang'] ?></td>
								</tr>
								<tr>
									<td style="width: 30%;text-align:right"><strong>TMT CPNS</strong></td>
									<td><?= tgl_indo2($cpns['tmt_golongan']) ?></td>
								</tr>
								<tr>
									<td style="width: 30%;text-align:right"><strong>Nomor SK CPNS</strong></td>
									<td><?= $cpns['no_sk_cpns'] ?></td>
								</tr>
								<tr>
									<td style="width: 30%;text-align:right"><strong>Tanggal SK CPNS</strong></td>
									<td><?= tgl_indo2($cpns['tanggal_sk_cpns']) ?></td>
								</tr>
								<tr>
									<td style="width: 30%;text-align:right"><strong>Dokumen SK CPNS</strong></td>
									<td>
										<?php if ($cpns['dokumen_sk_cpns']) : ?>
											<a class="btn btn-default btn-sm" href="<?= base_url('dokumen_cpns/') . $cpns['dokumen_sk_cpns'] ?>" target="_blank"><strong><?= $cpns['dokumen_sk_cpns'] ?></strong></a>
										<?php else : ?>
											<a class="btn btn-danger btn-sm" href="#">Tidak ada dokumen SK CPNS</a>
										<?php endif; ?>
									</td>
								</tr>
								<tr>
									<td style="width: 30%;text-align:right"><strong>Pejabat Penandatangan SK</strong></td>
									<td><?= $cpns['pejabat_penandatangan_sk'] ?></td>
								</tr>
								<tr>
									<td style="width: 30%;text-align:right"><strong>Nomor Persetujuan Teknis</strong></td>
									<td><?= $cpns['nomor_persetujuan'] ?></td>
								</tr>
								<tr>
									<td style="width: 30%;text-align:right"><strong>Tanggal Persetujuan Teknis</strong></td>
									<td><?= tgl_indo2($cpns['tanggal_persetujuan']) ?></td>
								</tr>
								<tr>
									<td style="width: 30%;text-align:right"><strong>Gaji Pokok Rp.</strong></td>
									<td>
										<?php 
											echo ($cpns['gaji_pokok']) ? number_format($cpns['gaji_pokok'], 0, ",", ".") : '0'
										?>
									</td>
								</tr>
								<tr>
									<td style="width: 30%;text-align:right"><strong>Masa Kerja (bulan)</strong></td>
									<td><?= $cpns['masa_kerja'] ?></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>