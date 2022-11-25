        <!-- Begin Page Content -->
        <div class="container-fluid">
			<!-- Page Heading -->
			<div class="col mt-3">
				<?=$this->session->flashdata('pesan');?>
				<div class="card">
					<div class="card-header">
						<strong>Daftar Saudara</strong>
						<div class="float-right">
							<a href="<?=base_url()?>index.php/saudara/tambah_saudara" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> &nbsp; Tambah Data</a>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-sm table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead align="center">
									<tr>
										<th width="40">No.</th>
										<th>Hubungan Keluarga</th>
										<th>Nama Saudara</th>
										<th>Jenis Kelamin</th>
										<th>Pekerjaan</th>
										<th width="100">Aksi</th>
									</tr>
								</thead>
								<tbody>
								<?php 
								$no = 1;
								foreach ($data_saudara as $ds):
								?>
									<tr>
										<td><?=$no?></td>
										<td align="center"><?=$ds['hubungan_keluarga']?></td>
										<td align="center"><?=$ds['nama']?></td>
										<td align="center"><?=$ds['jenis_kelamin']?></td>
										<td align="center"><?=$ds['pekerjaan']?></td>
										<td align="center">
											<a class="btn btn-success btn-sm" href="<?=base_url()?>index.php/saudara/edit_saudara/<?=$ds['id']?>"><i class="fas fa-pencil-alt"></i></a> 
											<a class="btn btn-danger btn-sm" href="<?=base_url()?>index.php/saudara/hapus_saudara/<?=$ds['id']?>" onclick="return confirm('Yakin akan menghapus data?');"><i class="far fa-trash-alt"></i></a>
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