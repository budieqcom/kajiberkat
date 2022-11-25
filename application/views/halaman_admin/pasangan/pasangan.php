        <!-- Begin Page Content -->
        <div class="container-fluid">
			<!-- Page Heading -->
			<div class="col mt-3">
				<div class="card bg-gradient-success text-white shadow">
                    <div class="card-body">
                        <ul>
                            <li><strong><?= $data_user['gelar_depan'].' '.$data_user['nama_lengkap'].' '.$data_user['gelar_belakang'] ?></strong></li>
                            <li><strong>N I P : <?= $data_user['nip']?></strong></li>
                        </ul>
                    </div>
                </div>
				<?=$this->session->flashdata('pesan');?>
				<div class="card mt-4">
					<div class="card-header">
						<strong>Riwayat Pasangan</strong>
						<div class="float-right">
							<a href="<?=base_url()?>index.php/admin/tambah_pasangan/<?=$data_user['id']?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> &nbsp; Tambah Data</a> &nbsp;
							<a href="<?=base_url()?>index.php/halaman_admin/detail_user/<?=$data_user['id']?>" class="btn btn-warning btn-sm"><i class="fa fa-step-backward"></i> &nbsp; Kembali</a>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-sm table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead align="center">
									<tr>
										<th>No.</th>
										<th>Foto</th>
										<th>Nama Pasangan</th>
										<th>Tempat Lahir</th>
										<th>Tanggal Lahir</th>
										<th>Pekerjaan</th>
										<th>#</th>
									</tr>
								</thead>
								<tbody>
								<?php 
								$no = 1;
								foreach ($data_pasangan as $dp):
								?>
									<tr>
										<td align="center"><?=$no?></td>
										<td align="center"><img class="image-profile rounded-circle" src="<?=base_url('dokumen_pasangan/').$dp['file_foto']?>" height=40></td>
										<td align="center"><?=$dp['nama']?></td>
										<td align="center"><?=$dp['tempat_lahir']?></td>
										<td align="center"><?=tgl_indo2($dp['tanggal_lahir'])?></td>
										<td align="center"><?=$dp['pekerjaan']?></td>
										<td align="center">
											<a class="btn btn-success btn-sm" href="<?=base_url()?>index.php/admin/edit_pasangan/<?=$dp['id_pegawai']?>/<?=$dp['id']?>"><i class="fas fa-pencil-alt"></i></a> 
											<a class="btn btn-danger btn-sm" href="<?=base_url()?>index.php/admin/hapus_pasangan/<?=$dp['id_pegawai']?>/<?=$dp['id']?>" onclick="return confirm('Yakin akan menghapus data?');"><i class="far fa-trash-alt"></i></a>
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