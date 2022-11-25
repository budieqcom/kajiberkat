	<!-- Begin Page Content -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						<strong>Konfigurasi Sistem </strong>
					</div>
					<div class="card-body">
						<form method="post" action="#" enctype="multipart/form-data">
							<div class="form-group">
								<label for="nama_pengadilan"><strong>Nama Pengadilan</strong></label>
								<input type="text" class="form-control" name="nama_pengadilan" value="<?= $nama_pa['value']; ?>" required>
							</div>
							<div class="form-group">
								<label for="alamat_pengadilan"><strong>Alamat Pengadilan</strong></label>
								<input type="text" class="form-control" name="alamat_pengadilan" value="<?= $alamat_pa['value']; ?>" required>
							</div>
							<div class="form-group">
								<label for="kode_satker"><strong>Kode Satker</strong></label>
								<input type="text" class="form-control" name="kode_satker" value="<?= $kode_satker['value']; ?>" required>
							</div>
                            <div class="form-group">
								<label for="kode_pengadilan"><strong>Kode Pengadilan</strong></label>
								<input type="text" class="form-control" name="kode_pengadilan" value="<?= $kode_pa['value']; ?>" required>
							</div>
							<!-- <div class="form-group">
								<label for="nama_ketua"><strong>Nama Ketua Pengadilan</strong></label>
								<input type="text" class="form-control" name="nama_ketua" required>
							</div>
                            <div class="form-group">
								<label for="nip_ketua_pengadilan"><strong>NIP Ketua Pengadilan</strong></label>
								<input type="text" class="form-control" name="nip_ketua" required>
							</div>
							<div class="form-group">
								<label for="nama_wakil"><strong>Nama Wakil Ketua Pengadilan</strong></label>
								<input type="text" class="form-control" name="nama_wakil" required>
							</div>
                            <div class="form-group">
								<label for="nip_wakil"><strong>NIP Wakil Ketua Pengadilan</strong></label>
								<input type="text" class="form-control" name="nip_wakil" required>
							</div>
                            <div class="form-group">
								<label for="nama_panitera"><strong>Nama Panitera</strong></label>
								<input type="text" class="form-control" name="nama_panitera" required>
							</div>
                            <div class="form-group">
								<label for="nip_panitera"><strong>NIP Panitera</strong></label>
								<input type="text" class="form-control" name="nip_panitera" required>
							</div>
                            <div class="form-group">
								<label for="nama_sekretaris"><strong>Nama Sekretaris</strong></label>
								<input type="text" class="form-control" name="nama_sekretaris" required>
							</div>
                            <div class="form-group">
								<label for="nip_sekretaris"><strong>NIP Sekretaris</strong></label>
								<input type="text" class="form-control" name="nip_sekretaris" required>
							</div> -->
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