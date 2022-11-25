	<!-- Begin Page Content -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<?= $this->session->flashdata('pesan'); ?>
				<div class="card">
					<div class="card-header">
						<strong>Daftar User</strong>
						<div class="float-right">
							<a href="<?= base_url('index.php/halaman_admin/tambah_user') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> &nbsp; Tambah User</a>&nbsp; &nbsp;
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered table-sm table-striped" id="dataTable" width="100%" cellspacing="0">
								<thead align="center">
									<tr>
										<th width="40">No.</th>
										<th width="100">Foto</th>
										<th width="100">NIP</th>
										<th>Nama Lengkap</th>
										<th width="100">Level</th>
										<th width="100">#</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($daftar_user as $user) :
									?>
										<tr>
											<td align="center"><?= $no; ?></td>
											<td align="center"><img class="img-profile rounded-circle" src="../../dokumen_foto/<?= $user['file_foto'] ?>" height=30></td>
											<td><?= $user['nip']; ?></td>
											<td><?= $user['nama_lengkap']; ?></td>
											<td align="center"><?= ucfirst($user['level']); ?></td>
											<td align="center">
											    <?php if ($user['level'] == "hakim" || $user['level'] == "pegawai" || $user['level'] == "honorer"): ?>
											    <a class="btn btn-info btn-sm" href="<?=base_url()?>index.php/halaman_admin/detail_user/<?= $user['id']?>"><i class="fas fa-sign-in-alt"></i></a>
												<a href="<?= base_url() ?>index.php/halaman_admin/hapus_user/<?= $user['id'] ?>/<?= $user['level'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin akan menghapus data?');"><i class="far fa-trash-alt"></i></a>
												<?php elseif ($user['level'] == "admin"): ?>
												<a class="btn disabled btn-info btn-sm" href="<?=base_url()?>index.php/halaman_admin/detail_user/<?= $user['id']?>"><i class="fas fa-sign-in-alt"></i></a>
												<a href="<?= base_url() ?>index.php/halaman_admin/hapus_user/<?= $user['id'] ?>/<?= $user['level'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin akan menghapus data?');"><i class="far fa-trash-alt"></i></a>
											    <?php endif; ?>
												
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
	</div>
	<!-- /.container-fluid -->
	</div>
	<!-- End of Main Content -->
	<script>
	window.setTimeout(function() {
  		$(".alert").fadeTo(500, 0).slideUp(500, function() {
    		$(this).remove();
  		});
	}, 2000);
	</script>