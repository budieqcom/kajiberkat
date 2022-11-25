	<!-- Begin Page Content -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						<strong>Update Profil</strong>
					</div>
					<div class="card-body">
						<form method="post" action="<?=base_url()?>index.php/halaman_admin/proses_update_profil_admin" enctype="multipart/form-data">
							<input type="hidden" name="id" value="<?=$user['id'];?>">
							<input type="hidden" name="foto_lama" value="<?=$user['file_foto'];?>">
							<div class="form-group">
								<label for="nama_admin">Nama Lengkap *</label>
								<input type="text" class="form-control" name="nama_admin" value="<?=$user['nama_lengkap']?>" required>
							</div>
							<div class="form-group">
								<label for="nip_admin">NIP *</label>
								<input type="text" class="form-control" name="nip_admin" value="<?=$user['nip'];?>" required>
							</div>
							<div class="form-group">
								<label for="pass_admin">Password *</label>
								<input type="text" class="form-control" name="pass_admin" value="<?=$user['pass2'];?>" required>
							</div>
							<div class="form-group">
								<label for="foto_baru">
									<strong>Foto </strong>&nbsp;
									<img class="img-profile rounded-circle" src="<?=base_url('dokumen_foto/').$user['file_foto'];?>" width="50">
								</label>
								<input type="file" class="form-control" name="foto_baru">
							</div>
							<div class="form-group">
								<div class="float-right">
									<button type="submit" class="btn btn-primary btn-sm"><i class="far fa-save"></i> &nbsp; Simpan</button> &nbsp;
									<a href="<?=base_url()?>index.php/halaman_admin/" class="btn btn-danger btn-sm"><i class="far fa-window-close"></i> &nbsp; Batal</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->