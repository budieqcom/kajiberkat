        <!-- Begin Page Content -->
        <div class="container-fluid">
			<!-- Page Heading -->
			<div class="col mt-3">
				<form method="post" action="<?= base_url()?>index.php/report/presensi_pegawai">
                    <ul class="nav nav-tabs">
                        <li class="active"><a class="nav-link active" href="<?= base_url()?>index.php/report/presensi_harian">Report Presensi Harian</a></li>
                        <li><a class="nav-link active" href="<?= base_url() ?>index.php/report/presensi_pegawai"> Report Presensi Hakim/Pegawai</a></li>
						<li><a class="nav-link active" href="<?= base_url() ?>index.php/report/presensi_apel_senin"> Report Presensi Apel Senin</a></li>
						<li><a class="nav-link active" href="<?= base_url() ?>index.php/report/presensi_apel_jumat"> Report Presensi Apel Jumat</a></li>
                    </ul>
					<div class="card">
						<div class="card-header">
							<?php if ($presensi_pegawai): ?>
							<strong>Data Presensi <?= $presensi_pegawai['0']['gelar_depan'].' '.$presensi_pegawai['0']['nama_lengkap'].' '.$presensi_pegawai['0']['gelar_belakang'].' ('.$presensi_pegawai['0']['nip'].')' ?></strong>
							<?php else: ?>
							<strong>Data Presensi</strong>
							<?php endif; ?>
                            <div class="float-right">
								<?php if ($presensi_pegawai): ?>
                                <a href="<?= base_url()?>index.php/report/cetak_presensi_pegawai/<?= $period ?>/<?= $presensi_pegawai['0']['id_pegawai'] ?>" class="btn btn-primary btn-sm"><i class="fas fa-print"></i> &nbsp; Export</a>&nbsp;
								<?php else: ?>
								<a href="#" class="btn btn-primary btn-sm"><i class="fas fa-print"></i> &nbsp; Export</a>&nbsp;
								<?php endif; ?>
                            </div>
						</div>
						<div class="card-body">
							<div class="row justify-content-center">
                                <div class="col-lg-3 col-sm-12">
                                    <div class="form-group">
                                        <label><strong>Periode</strong></label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control datepicker2" name="periode">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label><strong>Pilih Pegawai</strong></label>
                                        <select class="form-control select2" name="id_pegawai">
                                            <option value="">--- Pilih Pegawai ---</option>
                                            <?php foreach($daftar_pegawai as $data):?>
                                            <option value="<?=$data['id']?>"><?=$data['nip'].' - '.$data['gelar_depan'].' '.$data['nama_lengkap'].' ' .$data['gelar_belakang']?></option>
                                            <?php endforeach; ?>
                                        </select>                        
                                    </div>
                                    <button class="btn btn-info btn-sm float-right" type="submit"><i class="fas fa-search"></i> Lihat Data</button>
                                </div>
							</div>
							<div class="table-responsive">
								<table class="table table-sm table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead align="center">
										<tr>
											<th width="40">No.</th>
											<th>Tanggal Absen</th>
											<th>Jam Masuk</th>
											<th>Jam Pulang</th>
										</tr>
									</thead>
									<tbody>
									<?php 
									$no = 1;
									foreach ($presensi_pegawai as $data):
									?>
										<tr>
											<td align="center"><?=$no?></td>
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
        <script>
        $(document).ready(function() {
            $(".datepicker2").datepicker({
                format: 'mm-yyyy',
                startView: 'months',
                autoclose: true,
                locale: 'id',
                todayHighlight: true,
            });
        });	
        </script>
        <!-- /.container-fluid -->
	</div>
	<!-- End of Main Content -->