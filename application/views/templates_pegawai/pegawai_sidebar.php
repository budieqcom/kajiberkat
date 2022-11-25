	<!-- Sidebar -->
    <ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">
		<!-- Sidebar - Brand -->
		<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url()?>index.php/halaman_pns">
			<div class="sidebar-brand-icon">
				<!--<i class="fas fa-archive rotate-n-15"></i>-->
				<i class="fas fa-landmark rotate-n-15"></i>
			</div>
			<div class="sidebar-brand-text mx-3">KAJIBERKAT</div>
		</a>
		<!-- Divider -->
		<hr class="sidebar-divider my-0">
		<!-- Nav Item - Dashboard -->
		<li class="nav-item">
        	<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBiodata" aria-expanded="true" aria-controls="collapseBiodata">
          		<i class="fas fa-fw fa-bookmark"></i>
          		<span>Data Pokok</span>
        	</a>
        	<div id="collapseBiodata" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          		<div class="bg-white py-2 collapse-inner rounded">
            		<a class="collapse-item" href="<?=base_url()?>index.php/pegawai/biodata_pegawai">Biodata Pegawai</a>
                <a class="collapse-item" href="<?=base_url()?>index.php/pasangan/pasangan">Pasangan</a>
                <a class="collapse-item" href="<?=base_url()?>index.php/anak/anak">Anak</a>
                <a class="collapse-item" href="<?=base_url()?>index.php/ortu/ortu">Orang Tua</a></a>
                <a class="collapse-item" href="<?=base_url()?>index.php/saudara/saudara">Saudara</a></a>
          		</div>
        	</div>
      	</li>
      	<li class="nav-item">
        	<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCPNS" aria-expanded="true" aria-controls="collapseCPNS">
          		<i class="fas fa-network-wired"></i>
          		<span>Riwayat Pekerjaan</span>
        	</a>
        	<div id="collapseCPNS" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          		<div class="bg-white py-2 collapse-inner rounded">
            		<a class="collapse-item" href="<?=base_url()?>index.php/cpns/cpns">C P N S</a>
            		<a class="collapse-item" href="<?=base_url()?>index.php/halaman_pns/pns">P N S</a>
            		<a class="collapse-item" href="<?=base_url()?>index.php/pangkat/pangkat">Pangkat</a>
            		<a class="collapse-item" href="<?=base_url()?>index.php/jabatan/jabatan">Jabatan</a>
            		<a class="collapse-item" href="<?=base_url()?>index.php/kgb/kgb">K G B</a>
          		</div>
        	</div>
      	</li>
		<!-- Divider -->
		<hr class="sidebar-divider my-0">
		<!-- <li class="nav-item">
        	<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePresensi" aria-expanded="true" aria-controls="collapsePresensi">
          		<i class="fas fa-address-book"></i>
          		<span>Presensi</span>
        	</a>
        	<div id="collapsePresensi" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          		<div class="bg-white py-2 collapse-inner rounded">
            		<a class="collapse-item" href="<?=base_url()?>index.php/presensi_pegawai">Kehadiran & Kepulangan</a>
                	<a class="collapse-item" href="<?=base_url()?>index.php/presensi_pegawai/apel_senin">Apel Senin Pagi</a>
					<a class="collapse-item" href="<?=base_url()?>index.php/presensi_pegawai/apel_jumat">Apel Jumat Sore</a>
          		</div>
        	</div>
      	</li> -->
		<li class="nav-item">
			<a class="nav-link" href="<?=base_url()?>index.php/presensi_pegawai"><i class="fas fa-address-book"></i><span>Presensi</span></a>
		</li>
		<li class="nav-item">
        	<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseIzin" aria-expanded="true" aria-controls="collapseIzin">
          		<i class="fas fa-handshake"></i>
          		<span>Permohonan Izin</span>
        	</a>
        	<div id="collapseIzin" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          		<div class="bg-white py-2 collapse-inner rounded">
            		<a class="collapse-item" href="<?=base_url()?>index.php/cuti_pegawai/daftar_cuti_pegawai/">Izin Cuti</a>
                	<a class="collapse-item" href="<?=base_url()?>index.php/izin_pegawai/daftar_izin_pegawai">Izin Tidak Masuk</a>
          		</div>
        	</div>
      	</li>
    </ul>
    <!-- End of Sidebar -->
