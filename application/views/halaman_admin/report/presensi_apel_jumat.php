        <!-- Begin Page Content -->
        <div class="container-fluid">
			<!-- Page Heading -->
			<div class="col mt-3">
				<?=$this->session->flashdata('pesan');?>
				<form method="post" action="<?= base_url()?>index.php/report/presensi_apel_jumat">
                    <ul class="nav nav-tabs">
                        <li class="active"><a class="nav-link active" href="<?= base_url()?>index.php/report/presensi_harian">Report Presensi Harian</a></li>
                        <li><a class="nav-link active" href="<?= base_url() ?>index.php/report/presensi_pegawai"> Report Presensi Hakim/Pegawai</a></li>
						<li><a class="nav-link active" href="<?= base_url() ?>index.php/report/presensi_apel_senin"> Report Presensi Apel Senin</a></li>
						<li><a class="nav-link active" href="<?= base_url() ?>index.php/report/presensi_apel_jumat"> Report Presensi Apel Jumat</a></li>
                    </ul>
					<div class="card">
						<div class="card-header">
							<strong>Data Presensi Apel Jumat - <?= tgl_indo2($period) ?></strong>
                            <div class="float-right">
                                <a href="<?= base_url()?>index.php/report/cetak_presensi_apel_jumat/<?= $period ?>" class="btn btn-primary btn-sm"><i class="fas fa-print"></i> &nbsp; Export</a>&nbsp;
                            </div>
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
											<th>Tanggal</th>
											<th>Jam</th>
										</tr>
									</thead>
									<tbody>
									<?php 
									$no = 1;
									foreach ($presensi_jumat as $data):
									?>
										<tr>
											<td align="center"><?=$no?></td>
											<td align="center"><?= $data['gelar_depan'].' '.$data['nama_lengkap'].' '.$data['gelar_belakang'] ?><br><?= $data['nip'] ?></td>
											<td align="center"><?=tgl_indo($data['tanggal'])?></td>
											<td align="center"><?=$data['jam']?></td>
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