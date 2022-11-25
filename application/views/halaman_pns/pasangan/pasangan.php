        <!-- Begin Page Content -->
        <div class="container-fluid">
			<!-- Page Heading -->
			<div class="col mt-3">
				<?=$this->session->flashdata('pesan');?>
				<div class="card">
					<div class="card-header">
						<strong>Riwayat Pasangan</strong>
						<div class="float-right">
							<a href="<?=base_url()?>index.php/pasangan/tambah_pasangan" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> &nbsp; Tambah Data</a>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-sm table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead align="center">
									<tr>
										<th width="40">No.</th>
										<th>Foto</th>
										<th>Nama Pasangan</th>
										<th>Tempat Lahir</th>
										<th>Tanggal Lahir</th>
										<th>Pekerjaan</th>
										<th width="100">Aksi</th>
									</tr>
								</thead>
								<tbody>
								<?php 
								$no = 1;
								foreach ($data_pasangan as $dp):
								?>
									<tr>
										<td><?=$no?></td>
										<td align="center"><img class="image-profile rounded-circle" src="<?=base_url('dokumen_pasangan/').$dp['file_foto']?>" width="50"></td>
										<td align="center"><?=$dp['nama']?></td>
										<td align="center"><?=$dp['tempat_lahir']?></td>
										<td align="center"><?=tgl_indo2($dp['tanggal_lahir'])?></td>
										<td align="center"><?=$dp['pekerjaan']?></td>
										<td align="center">
											<a class="btn btn-success btn-sm" href="<?=base_url()?>index.php/pasangan/edit_pasangan/<?=$dp['id']?>"><i class="fas fa-pencil-alt"></i></a> 
											<a class="btn btn-danger btn-sm" href="<?=base_url()?>index.php/pasangan/hapus_pasangan/<?=$dp['id']?>" onclick="return confirm('Yakin akan menghapus data?');"><i class="far fa-trash-alt"></i></a>
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