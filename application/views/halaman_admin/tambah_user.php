	<!-- Begin Page Content -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						<strong>Tambah User </strong>
					</div>
					<div class="card-body">
						<form method="post" action="<?=base_url()?>index.php/halaman_admin/proses_tambah_user" enctype="multipart/form-data">
							<div class="form-group">
								<label for="nama_lengkap"><strong>Nama Lengkap *</strong></label>
								<input type="text" class="form-control" name="nama_lengkap" required>
							</div>
							<div class="form-group">
								<label for="nip"><strong>NIP *</strong></label>
								<input type="text" class="form-control" name="nip" required>
							</div>
							<div class="form-group">
								<label for="pass"><strong>Password *</strong></label>
								<input type="text" class="form-control" name="pass" required>
							</div>
							<div class="form-group">
								<label for="level"><strong>Level *</strong></label>
								<select class="form-control" name="level" required>
									<option>Pilih Level</option>
									<option value="admin">Administrator</option>
									<option value="hakim">Hakim</option>
									<option value="pegawai">Pegawai</option>
									<option value="honorer">Honorer</option>
								</select>
							</div>
							<div class="form-group">
								<label for="foto"><strong>Foto</strong></label>
								<input type="file" class="form-control" name="foto">
							</div>
							<div class="form-group">
								<div class="float-right">
									<button type="submit" class="btn btn-primary btn-sm"><i class="far fa-save"></i> &nbsp; Simpan</button> &nbsp;
									<a href="<?=base_url()?>index.php/halaman_admin/daftar_user" class="btn btn-danger btn-sm"><i class="far fa-window-close"></i> &nbsp; Batal</a>
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