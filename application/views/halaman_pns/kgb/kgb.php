        <!-- Begin Page Content -->
        <div class="container-fluid">
			<!-- Page Heading -->
			<div class="col mt-3">
				<?=$this->session->flashdata('pesan');?>
				<div class="card">
					<div class="card-header">
						<strong>Riwayat KGB</strong>
						<div class="float-right">
							<a href="<?=base_url()?>index.php/kgb/tambah_kgb" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> &nbsp; Tambah Data</a>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-sm table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead align="center">
									<tr>
										<th>No.</th>
										<th>Golongan Ruang</th>
										<th>Gaji Pokok Rp.</th>
										<th>Besaran Gaji Rp.</th>
										<th>No. Surat KGB</th>
										<th>TMT KGB</th>
										<th width="90">Aksi</th>
									</tr>
								</thead>
								<tbody>
								<?php 
								$no = 1;
								foreach ($kgb as $k):
								?>
									<tr>
										<td><?=$no?></td>
										<td align="center"><?=$k['golongan_ruang']?></td>
										<td align="center"><?=number_format($k['gaji_pokok'],0,",",".")?></td>
										<td align="center"><?=number_format($k['besaran_gaji'],0,",",".")?></td>
										<td align="center"><?=$k['nomor_surat_kgb']?></td>
										<td align="center"><?=tgl_indo2($k['tmt_kgb'])?></td>
										<td align="center">
											<a class="btn btn-success btn-sm" href="<?=base_url()?>index.php/kgb/edit_kgb/<?=$k['id']?>"><i class="fas fa-pencil-alt"></i></a> 
											<a class="btn btn-danger btn-sm" href="<?=base_url()?>index.php/kgb/hapus_kgb/<?=$k['id']?>" onclick="return confirm('Yakin akan menghapus data?');"><i class="far fa-trash-alt"></i></a>
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