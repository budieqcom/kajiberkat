        <!-- Begin Page Content -->
        <div class="container-fluid">
			<!-- Page Heading -->
			<div class="col mt-3">
				<?=$this->session->flashdata('pesan');?>
				<form method="post" action="<?= base_url()?>index.php/presensi/daftar_presensi_skrg">
					<div class="card mt-4">
						<div class="card-header">
							<strong>Data Presensi</strong>
						</div>
						<div class="card-body">
							<div class="row justify-content-center">
								<div class="col-lg-3 col-sm-12">
									<label><strong>Periode</strong></label>
									<div class="input-group mb-3">
										<input type="text" class="form-control datepicker" name="periode">
										<div class="input-group-append">
											<span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
										</div>&nbsp;<button class="btn btn-info btn-sm" type="submit"><i class="fas fa-search"></i></button>
									</div> 
								</div>
							</div>
							<div class="table-responsive">
								<table class="table table-sm table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead align="center">
										<tr>
											<th width="40">No.</th>
											<th>Nama Lengkap<br>N I P</th>
											<th>Tanggal Absen</th>
											<th>Jam Masuk</th>
											<th>Jam Pulang</th>
										</tr>
									</thead>
									<tbody>
									<?php 
									$no = 1;
									foreach ($daftar_presensi as $data):
									?>
										<tr>
											<td align="center"><?=$no?></td>
											<td align="center"><?= $data['gelar_depan'].' '.$data['nama_lengkap'].' '.$data['gelar_belakang'] ?><br><?= $data['nip'] ?></td>
											<td align="center"><?=tgl_indo($data['tanggal_absen'])?></td>
											<td align="center"><?=$data['jam_masuk']?></td>
											<td align="center"><?=$data['jam_pulang']?></td>
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
				</form>
			</div>
        </div>
        <!-- /.container-fluid -->
	</div>
	<!-- End of Main Content -->