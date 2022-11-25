        <!-- Begin Page Content -->
        <div class="container-fluid">
        	<!-- Page Heading -->
        	<div class="col mt-3">
        		<?= $this->session->flashdata('pesan'); ?>
        		<div class="card">
        			<div class="card-header">
        				<strong>Biodata</strong>
        				<div class="float-right">
        					<a href="<?= base_url() ?>index.php/alamat/alamat" class="btn btn-primary btn-sm"><i class="fas fa-home"></i> &nbsp; Daftar Alamat</a> &nbsp;
        					<a href="<?= base_url() ?>index.php/pegawai/edit_biodata_pegawai" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i> &nbsp; Edit Data</a>
        				</div>
        			</div>
        			<div class="card-body">
        				<div class="table-responsive">
        					<table class="table table-hover" id="dataTable" cellspacing="0">
        						<tr>
        							<td style="width: 20%;text-align:right"><strong>Nama Lengkap</strong></td>
        							<td><?= $profile['gelar_depan'] . ' ' . $profile['nama_lengkap'] . ' ' . $profile['gelar_belakang']; ?></td>
        							<td style="width: 20%;text-align:right"><strong>N I K</strong></td>
        							<td><?= $profile['nik']; ?></td>
        						</tr>
        						<tr>
        							<td style="width: 20%;text-align:right"><strong>NIP Lama</strong></td>
        							<td></td>
        							<td style="width: 20%;text-align:right"><strong>NIP Baru</strong></td>
        							<td><?= $profile['nip'] ?></td>
        						</tr>
        						<tr>
        							<td style="width: 20%;text-align:right"><strong>Agama</strong></td>
        							<td><?= $profile['agama']; ?></td>
        							<td style="width: 20%;text-align:right"><strong>Status Perkawinan</strong></td>
        							<td><?= $profile['status_perkawinan'] ?></td>
        						</tr>
        						<tr>
        							<td style="width: 20%;text-align:right"><strong>No. Telepon</strong></td>
        							<td><?= $profile['nomor_telepon'] ?></td>
        							<td style="width: 20%;text-align:right"><strong>No. Handphone</strong></td>
        							<td><?= $profile['nomor_hp'] ?></td>
        						</tr>
        						<tr>
        							<td style="width: 20%;text-align:right"><strong>Foto</strong></td>
        							<td><img class="img-profile rounded-circle" src="<?= base_url('dokumen_foto/') . $profile['file_foto'] ?>" width="80"></td>
        							<td></td>
        							<td></td>
        							<td></td>
        						</tr>
        					</table>
        				</div>
        			</div>
        		</div>
        	</div>
        	<div class="col mt-3">
        		<div class="card">
        			<div class="card-header">
        				<strong>Kelahiran</strong>
        			</div>
        			<div class="card-body">
        				<div class="table-responsive">
        					<table class="table table-hover" id="dataTable" cellspacing="0">
        						<tr>
        							<td style="width: 20%;text-align:right"><strong>Tempat Lahir</strong></td>
        							<td><?= $profile['tempat_lahir'] ?></td>
        							<td style="width: 20%;text-align:right"><strong>Tanggal Lahir</strong></td>
        							<td><?= tgl_indo2($profile['tanggal_lahir']) ?></td>
        						</tr>
        						<tr>
        							<td style="width: 20%;text-align:right"><strong>Jenis Kelamin</strong></td>
        							<td><?= $profile['jenis_kelamin'] ?></td>
        							<td></td>
        							<td></td>
        							<td></td>
        						</tr>
        					</table>
        				</div>
        			</div>
        		</div>
        	</div>
        	<div class="col mt-3">
        		<div class="card">
        			<div class="card-header">
        				<strong>Lain - lain</strong>
        			</div>
        			<div class="card-body">
        				<div class="table-responsive">
        					<table class="table table-hover" id="dataTable" cellspacing="0">
        						<tr>
        							<td style="width: 20%;text-align:right"><strong>Tingkat Pendidikan</strong></td>
        							<td><?= $profile['tingkat_pendidikan'] ?></td>
        							<td style="width: 20%;text-align:right"><strong>Email</strong></td>
        							<td><?= $profile['email'] ?></td>
        						</tr>
        					</table>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
        <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->