	<div class="container-fluid">
		<div class="row">
			<div class="col-xl">
				<?= $this->session->flashdata('pesan'); ?>
				<div class="card">
					<div class="card-header">
						<strong>Informasi Golongan Dan SK PNS</strong>
						<div class="float-right">
							<a href="<?= base_url() ?>index.php/halaman_pns/edit_pns" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i> &nbsp; Edit Data</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card mb-4 mt-4">
			<div class="card-header">
				<strong>Informasi Jabatan</strong>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-hover detail-view" id="dataTable" cellspacing="0">
						<tr>
							<td style="width:30%;text-align:right"><strong>Jabatan</strong></td>
							<td><?= $pns['jabatan'] ?></td>
						</tr>
						<tr>
							<td style="width:30%;text-align:right"><strong>Pejabat SK</strong></td>
							<td><?= $pns['pejabat_penandatangan_sk'] ?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="card mb-4 mt-4">
			<div class="card-header">
				<strong>Informasi SK PNS</strong>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-hover" id="dataTable" cellspacing="0">
						<tr>
							<td style="width:30%;text-align:right"><strong>Nomor SK PNS</strong></td=>
							<td><?= $pns['no_sk_pns'] ?></td>
						</tr>
						<tr>
							<td style="width:30%;text-align:right"><strong>Tanggal SK PNS</strong></tdalign=>
							<td><?= tgl_indo2($pns['tanggal_sk_pns']) ?></td>
						</tr>
						<tr>
							<td style="width:30%;text-align:right"><strong>Pejabat SK</strong></td>
							<td><?= $pns['pejabat_penandatangan_sk'] ?></td>
						</tr>
						<tr>
							<td style="width:30%;text-align:right"><strong>Dokumen SK PNS</strong></td>
							<td>
								<?php if ($pns['dokumen_sk_pns']) : ?>
									<a class="btn btn-default btn-sm" href="<?= base_url('dokumen_pns/') . $pns['dokumen_sk_pns'] ?>" target="_blank"><strong><?= $pns['dokumen_sk_pns'] ?></strong></a>
								<?php else : ?>
									<a class="btn btn-danger btn-sm" href="#">Tidak ada dokumen SK PNS</a>
								<?php endif; ?>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="card mb-4 mt-4">
			<div class="card">
				<div class="card-header">
					<strong>Informasi SPMT</strong>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-hover" id="dataTable" cellspacing="0">
							<tr>
								<td style="width:30%;text-align:right"><strong>TMT SPMT</strong></td>
								<td><?= tgl_indo2($pns['tmt_spmt']) ?></td>
							</tr>
							<tr>
								<td style="width:30%;text-align:right"><strong>Nomor SPMT</strong></td=>
								<td><?= $pns['nomor_spmt'] ?></td>
							</tr>
							<tr>
								<td style="width:30%;text-align:right"><strong>Tanggal SPMT</strong></td>
								<td><?= tgl_indo2($pns['tanggal_spmt']) ?></td>
							</tr>
							<tr>
								<td style="width:30%;text-align:right"><strong>Pejabat SPMT</strong></td>
								<td><?= $pns['pejabat_spmt'] ?></td>
							</tr>
							<tr>
								<td style="width:30%;text-align:right"><strong>Dokumen SPMT</strong></td>
								<td>
									<?php if ($pns['dokumen_spmt']) : ?>
										<a class="btn btn-default btn-sm" href="<?= base_url('dokumen_pns/') . $pns['dokumen_spmt'] ?>" target="_blank"><strong><?= $pns['dokumen_spmt'] ?></strong></a>
									<?php else : ?>
										<a class="btn btn-danger btn-sm" href="#">Tidak ada dokumen SPMT</a>
									<?php endif; ?>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="card mt-4">
			<div class="card">
				<div class="card-header">
					<strong>Informasi TMT</strong>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-hover" id="dataTable" cellspacing="0">
							<tr>
								<td style="width:30%;text-align:right"><strong>TMT Mulai</strong></tdn=>
								<td><?= tgl_indo2($pns['tmt_golongan']) ?></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>

	</div>