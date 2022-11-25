	<!-- Sidebar -->
	<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
		<!-- Sidebar - Brand -->
		<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>index.php/halaman_admin">
			<div class="sidebar-brand-icon rotate-n-15">
				<!--<i class="fas fa-archive rotate-n-15"></i>-->
				<i class="fas fa-landmark"></i>
			</div>
			<div class="sidebar-brand-text mx-3">KAJIBERKAT</div>
		</a>
		<!-- Divider -->
		<hr class="sidebar-divider my-0">
		<!-- Nav Item - Dashboard -->
		<!-- <li class="nav-item">
			<a class="nav-link" href="<?= base_url() ?>index.php/halaman_admin/daftar_user"><i class="fas fa-users"></i><span> Data User</span></a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="<?= base_url() ?>index.php/mutasi/daftar_mutasi"><i class="fas fa-mail-bulk"></i><span> Mutasi</span></a>
		</li> -->
		<li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePresensi" aria-expanded="true" aria-controls="collapsePresensi">
				<i class="fas fa-code-branch"></i><span> Presensi</span>
			</a>
			<div id="collapsePresensi" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<a class="collapse-item" href="<?= base_url()?>index.php/presensi/scan_code">Scan Code Pegawai</a>
					<a class="collapse-item" href="<?= base_url()?>index.php/perizinan/daftar_izin_pegawai">Daftar Presensi Pegawai </a>
					<!-- <a class="collapse-item" href="#">Report Presensi</a> -->
				</div>
			</div>
		</li>
		<!-- <li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePerizinan" aria-expanded="true" aria-controls="collapsePerizinan">
				<i class="fas fa-code-branch"></i><span> Perizinan</span>
			</a>
			<div id="collapsePerizinan" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<a class="collapse-item" href="<?= base_url()?>index.php/perizinan/daftar_cuti_pegawai">Daftar Izin Cuti</a>
					<a class="collapse-item" href="<?= base_url()?>index.php/perizinan/daftar_izin_pegawai">Daftar Tidak Masuk </a>
					<a class="collapse-item" href="<?= base_url()?>index.php/perizinan/daftar_pegawai">Input Perizinan</a>
				</div>
			</div>
		</li> -->
		<!-- <li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReport" aria-expanded="true" aria-controls="collapseReport">
				<i class="fas fa-fw fa-print"></i><span> Report</span>
			</a>
			<div id="collapseReport" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<a class="collapse-item" href="<?=base_url()?>index.php/report/duk">D U K</a>
					<a class="collapse-item" href="<?=base_url()?>index.php/report/bezetting">Bezetting</a>
					<!-- <a class="collapse-item" href="#">Keadaan Pegawai</a>
					<a class="collapse-item" href="#">Kenaikan Pangkat</a>
					<a class="collapse-item" href="#">K G B</a>
					<a class="collapse-item" href="#">Pensiun</a> -->
				</div>
			</div>
		</li> -->
		<!-- Divider -->
		<!-- <hr class="sidebar-divider d-none d-md-block"> -->
		<!-- Sidebar Toggler (Sidebar) -->
		
		<!-- <div class="text-center d-none d-md-inline">
			<button class="rounded-circle border-0" id="sidebarToggle"></button>
		</div> -->
		
	</ul>
	<!-- End of Sidebar -->
