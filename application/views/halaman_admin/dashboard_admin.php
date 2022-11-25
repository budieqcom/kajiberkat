        <!-- Begin Page Content -->
        <div class="container-fluid">
        	<!-- Page Heading -->
        	<div class="alert alert-primary" role="alert">
        	       <h6><strong>Hai, <?= ucfirst($user['nama_lengkap']); ?>... </strong></h6>
        	</div>
        	<div class="row">
        	    <div class="col-xl-4 col-md-6 mb-4">
        			<div class="card border-left-primary shadow h-100 py-2">
        				<div class="card-body">
        					<div class="row no-gutters align-items-center">
        						<div class="col mr-2">
        							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Admin</div>
        							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_admin['jumlah_admin']; ?> Orang</div>
        						</div>
        						<div class="col-auto">
        							<i class="fas fa-calendar fa-2x text-gray-300"></i>
        						</div>
        					</div>
        				</div>
        			</div>
        		</div>
        		<div class="col-xl-4 col-md-6 mb-4">
        			<div class="card border-left-primary shadow h-100 py-2">
        				<div class="card-body">
        					<div class="row no-gutters align-items-center">
        						<div class="col mr-2">
        							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Hakim</div>
        							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_hakim['jumlah_hakim']; ?> Orang</div>
        						</div>
        						<div class="col-auto">
        							<i class="fas fa-calendar fa-2x text-gray-300"></i>
        						</div>
        					</div>
        				</div>
        			</div>
        		</div>
        		<div class="col-xl-4 col-md-6 mb-4">
        			<div class="card border-left-primary shadow h-100 py-2">
        				<div class="card-body">
        					<div class="row no-gutters align-items-center">
        						<div class="col mr-2">
        							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Pegawai</div>
        							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_pegawai['jumlah_pegawai']; ?> Orang</div>
        						</div>
        						<div class="col-auto">
        							<i class="fas fa-calendar fa-2x text-gray-300"></i>
        						</div>
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
			<div class="row">
				<div class="col-lg-6 col-md-6 mb-4">
					<div class="card shadow h-100 py-2">
						<div class="card-header">
							<div class="h5 mb-0 font-weight-bold text-gray-800">Status Kehadiran Hari Ini</div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-sm table-striped table-bordered" width="100%" cellspacing="0">
									<thead align="center">
										<tr>
											<th width="60">No.</th>
											<th>Uraian</th>
											<th width="100">Jumlah</th>
											<!-- <th>#</th> -->
										</tr>
									</thead>
									<tbody>
										<tr>
											<td align="center">1</td>
											<td >Cuti</td>
											<td align="center"><?= $jumlah_cuti['cuti'] ?></td>
											<!-- <td align="center">Detil</td> -->
										</tr>
										<tr>
											<td align="center">2</td>
											<td>Izin</td>
											<td align="center"><?= $jumlah_izin['izin'] ?></td>
											<!-- <td align="center">Detil</td> -->
										</tr>
										<tr>
											<td align="center">3</td>
											<td>Hadir</td>
											<td align="center"><?= $jumlah_hadir['hadir'] ?></td>
											<!-- <td></td> -->
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 mb-4">
					<div class="card shadow h-100 py-2">
						<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
							<div class="h5 mb-0 font-weight-bold text-gray-800">Status Cuti Hari Ini</div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-sm table-striped table-bordered" width="100%" cellspacing="0">
									<thead align="center">
										<tr>
											<th width="60">No.</th>
											<th>Uraian</th>
											<th>Jumlah</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td align="center">1</td>
											<td>Cuti Tahunan</td>
											<td align="center"><?= $rekap_cuti['tahunan'] ?></td>
										</tr>
										<tr>
											<td align="center">2</td>
											<td>Cuti Besar</td>
											<td align="center"><?= $rekap_cuti['besar'] ?></td>
										</tr>
										<tr>
											<td align="center">3</td>
											<td>Cuti Sakit</td>
											<td align="center"><?= $rekap_cuti['sakit'] ?></td>
										</tr>
										<tr>
											<td align="center">4</td>
											<td>Cuti Melahirkan</td>
											<td align="center"><?= $rekap_cuti['melahirkan'] ?></td>
										</tr>
										<tr>
											<td align="center">5</td>
											<td>Cuti Karena Alasan Penting</td>
											<td align="center"><?= $rekap_cuti['alasan_penting'] ?></td>
										</tr>
										<tr>
											<td align="center">6</td>
											<td>Cuti Di Luar Tanggungan Negara</td>
											<td align="center"><?= $rekap_cuti['luar_tanggungan'] ?></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
        	</div>
			<div class="row">
				<div class="col-lg-6 col-md-6 mb-4">
					<div class="card shadow h-100 py-2">
						<div class="card-header">
							<div class="h5 mb-0 font-weight-bold text-gray-800">Daftar Kenaikan Pangkat (5 Bulan)</div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-sm table-striped table-bordered" width="100%" cellspacing="0">
									<thead align="center">
										<tr>
											<th width="40">No.</th>
											<th>Nama<br>Lengkap</th>
											<th>Gol/Ruang<br>TMT (Lama)</th>
											<th>Gol/Ruang<br>TMT (Baru)</th>
										</tr>
									</thead>
									<tbody>
									<?php 
									$no = 1;
									foreach ($kenaikan_pangkat as $data):
									?>
										<tr>
											<td align="center"><?= $no ?></td>
											<td><?= $data['nama_pegawai'] ?></td>
											<td align="center"><?= $data['golongan_ruang'] ?><br><?= tgl_indo($data['tmt_golongan']) ?></td>
											<td align="center"><?= tgl_indo($data['tmt_golongan_berikut']) ?></td>
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
				<div class="col-lg-6 col-md-6 mb-4">
					<div class="card shadow h-100 py-2">
						<div class="card-header">
							<div class="h5 mb-0 font-weight-bold text-gray-800">Daftar Kenaikan Gaji Berkala (3 Bulan)</div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-sm table-striped table-bordered" width="100%" cellspacing="0">
									<thead align="center">
										<tr>
											<th width="40">No.</th>
											<th>Nama<br>Lengkap</th>
											<th>TMT KGB<br>(Lama)</th>
											<th>TMT KGB<br>(Baru)</th>
											<th>#</th>
										</tr>
									</thead>
									<tbody>
									<?php 
									$no = 1;
									foreach ($kgb as $row):
									?>
										<tr>
											<td align="center"><?= $no ?></td>
											<td><?= $row['nama_pegawai'] ?></td>
											<td align="center"><?= tgl_indo($row['tmt_kgb']) ?></td>
											<td align="center"><?= tgl_indo($row['tmt_kgb_berikut']) ?></td>
											<td align="center">
											<a class="btn btn-primary btn-sm" href="<?=base_url()?>index.php/halaman_admin/cetak_blanko_kgb/<?=$row['id_pegawai']?>"><i class="fas fa-print"></i> </a> 
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

		<!-- <script>
		$(document).ready(function(){
			setTimeout(function() {
					toastr.options = {
						closeButton: false,
						progressBar: true,
						showMethod: 'slideDown',
						positionClass: 'toast-top-full-width',
						timeOut: 6000
					};
					toastr.success('<strong>Selamat Datang di KAJIBERKAT</strong>');
				}, 1300);
		});	
		</script> -->