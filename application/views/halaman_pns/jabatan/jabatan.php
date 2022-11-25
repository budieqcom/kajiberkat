        <!-- Begin Page Content -->
        <div class="container-fluid">
        	<!-- Page Heading -->
        	<div class="col mt-3">
        		<?= $this->session->flashdata('pesan'); ?>
        		<div class="card">
        			<div class="card-header">
        				<strong>Riwayat Jabatan</strong>
        				<div class="float-right">
        					<a href="<?= base_url() ?>index.php/jabatan/tambah_jabatan" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> &nbsp; Tambah Data</a>
        				</div>
        			</div>
        			<div class="card-body">
        				<div class="table-responsive">
        					<table class="table table-sm table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
        						<thead align="center">
        							<tr>
        								<th>No.</th>
        								<th>Jabatan</th>
        								<th>Unit Kerja</th>
        								<th>TMT Mulai</th>
        								<th>Kelompok Jabatan</th>
        								<th width="90">Aksi</th>
        							</tr>
        						</thead>
        						<tbody>
        							<?php
									$no = 1;
									foreach ($jabatan as $j) :
									?>
        								<tr>
        									<td align="center"><?= $no ?></td>
        									<td align="center"><?= $j['jabatan'] ?></td>
        									<td align="center"><?= $j['unit_kerja'] ?></td>
        									<td align="center"><?= tgl_indo2($j['tmt_mulai']) ?></td>
        									<td align="center"><?= $j['kelompok_jabatan'] ?></td>
        									<td align="center">
        										<a class="btn btn-success btn-sm" href="<?= base_url() ?>index.php/jabatan/edit_jabatan/<?= $j['id'] ?>"><i class="fas fa-pencil-alt"></i></a>
        										<a class="btn btn-danger btn-sm" href="<?= base_url() ?>index.php/jabatan/hapus_jabatan/<?= $j['id'] ?>" onclick="return confirm('Yakin akan menghapus data?');"><i class="far fa-trash-alt"></i></a>
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