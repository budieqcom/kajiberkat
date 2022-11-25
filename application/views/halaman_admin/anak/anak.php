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
						<strong>Daftar Anak</strong>
						<div class="float-right">
							<a href="<?=base_url()?>index.php/admin/tambah_anak/<?=$data_user['id']?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> &nbsp; Tambah Data</a> &nbsp;
							<a href="<?=base_url()?>index.php/halaman_admin/detail_user/<?=$data_user['id']?>" class="btn btn-warning btn-sm"><i class="fa fa-step-backward"></i> &nbsp; Kembali</a>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-sm table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead align="center">
									<tr>
										<th width="40">No.</th>
										<th>Foto</th>
										<th>Nama Anak</th>
										<th>Tempat Lahir</th>
										<th>Tanggal Lahir</th>
										<th>Pekerjaan</th>
										<th width="100">Aksi</th>
									</tr>
								</thead>
								<tbody>
								<?php 
								$no = 1;
								foreach ($data_anak as $da):
								?>
									<tr>
										<td align="center"><?=$no?></td>
										<td align="center"><img class="image-profile rounded-circle" src="<?=base_url('dokumen_anak/').$da['file_foto']?>" height=40></td>
										<td align="center"><?=$da['nama']?></td>
										<td align="center"><?=$da['tempat_lahir']?></td>
										<td align="center"><?=tgl_indo2($da['tanggal_lahir'])?></td>
										<td align="center"><?=$da['pekerjaan']?></td>
										<td align="center">
											<a class="btn btn-success btn-sm" href="<?=base_url()?>index.php/admin/edit_anak/<?=$da['id_pegawai']?>/<?=$da['id']?>"><i class="fas fa-pencil-alt"></i></a> 
											<a class="btn btn-danger btn-sm" href="<?=base_url()?>index.php/admin/hapus_anak/<?=$da['id_pegawai']?>/<?=$da['id']?>" onclick="return confirm('Yakin akan menghapus data?');"><i class="far fa-trash-alt"></i></a>
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