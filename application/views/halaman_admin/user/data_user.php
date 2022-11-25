<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div class="card bg-gradient-success text-white shadow">
				<div class="card-body">
					<ul>
                        <li><strong><?= $data_user['gelar_depan'].' '.$data_user['nama_lengkap'].' '.$data_user['gelar_belakang'] ?></strong></li>
                        <li><strong>N I P : <?= $data_user['nip']?></strong></li>
                    </ul>
				</div>
			</div>
		</div>
	</div>
	<div class="row mt-4">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					<strong>Data Hakim/Pegawai</strong>
					<div class="float-right">
                        <a href="<?=base_url()?>index.php/halaman_admin/daftar_user" class="btn btn-warning btn-sm"><i class="fa fa-step-backward"></i> &nbsp; Kembali</a>
					</div>
				</div>				
				<div class="card-body">
					<strong>Data Pokok</strong>
					<hr>
                    <div class="row">
                    	<div class="col-xl-2 col-md-6 mb-4">
                    		<a href="<?=base_url()?>index.php/admin/pegawai/<?=$data_user['id']?>">
                    			<div class="card border-left-primary shadow h-100 py-2">
			        				<div class="card-body">
			        					<div class="row no-gutters align-items-center">
			        						<div class="col mr-2">
			        							<div class="mb-0 font-weight-bold text-primary-800">Biodata Pegawai</div>
			        						</div>
			        						<div class="col-auto">
			        							<i class="fas fa-user fa-2x text-gray-300"></i>
			        						</div>
			        					</div>
			        				</div>
		        				</div>
                    		</a>
                    	</div>
                    	<div class="col-xl-2 col-md-6 mb-4">
                    		<a href="<?=base_url()?>index.php/admin/pasangan/<?=$data_user['id']?>">
                    			<div class="card border-left-primary shadow h-100 py-2">
			        				<div class="card-body">
			        					<div class="row no-gutters align-items-center">
			        						<div class="col mr-2">
			        							<div class="mb-0 font-weight-bold text-primary-800">Pasangan</div>
			        						</div>
			        						<div class="col-auto">
			        							<i class="fas fa-user-friends fa-2x text-gray-300"></i>
			        						</div>
			        					</div>
			        				</div>
		        				</div>
                    		</a>
                    	</div>
                    	<div class="col-xl-2 col-md-6 mb-4">
                    		<a href="<?=base_url()?>index.php/admin/anak/<?=$data_user['id']?>">
                    			<div class="card border-left-primary shadow h-100 py-2">
			        				<div class="card-body">
			        					<div class="row no-gutters align-items-center">
			        						<div class="col mr-2">
			        							<div class="mb-0 font-weight-bold text-primary-800">Anak</div>
			        						</div>
			        						<div class="col-auto">
			        							<i class="fas fa-users fa-2x text-gray-300"></i>
			        						</div>
			        					</div>
			        				</div>
		        				</div>
                    		</a>
                    	</div>
                    	<div class="col-xl-2 col-md-6 mb-4">
                    		<a href="<?=base_url()?>index.php/admin/ortu/<?=$data_user['id']?>">
                    			<div class="card border-left-primary shadow h-100 py-2">
			        				<div class="card-body">
			        					<div class="row no-gutters align-items-center">
			        						<div class="col mr-2">
			        							<div class="mb-0 font-weight-bold text-primary-800">Orang Tua</div>
			        						</div>
			        						<div class="col-auto">
			        							<i class="fas fa-user-plus fa-2x text-gray-300"></i>
			        						</div>
			        					</div>
			        				</div>
		        				</div>
                    		</a>
                    	</div>
                    	<div class="col-xl-2 col-md-6 mb-4">
                    		<a href="<?=base_url()?>index.php/admin/saudara/<?=$data_user['id']?>">
                    			<div class="card border-left-primary shadow h-100 py-2">
			        				<div class="card-body">
			        					<div class="row no-gutters align-items-center">
			        						<div class="col mr-2">
			        							<div class="mb-0 font-weight-bold text-primary-800">Saudara</div>
			        						</div>
			        						<div class="col-auto">
			        							<i class="fas fa-user-tag fa-2x text-gray-300"></i>
			        						</div>
			        					</div>
			        				</div>
		        				</div>
                    		</a>
                    	</div>
        			</div>
        			<strong>Riwayat Pekerjaan</strong>
        			<hr>
        			<div class="row">
                    	<div class="col-xl-2 col-md-6 mb-4">
                    		<a href="<?=base_url()?>index.php/admin/cpns/<?=$data_user['id']?>">
                    			<div class="card border-left-primary shadow h-100 py-2">
			        				<div class="card-body">
			        					<div class="row no-gutters align-items-center">
			        						<div class="col mr-2">
			        							<div class="mb-0 font-weight-bold text-primary-800">CPNS</div>
			        						</div>
			        						<div class="col-auto">
			        							<i class="fas fa-user-graduate fa-2x text-gray-300"></i>
			        						</div>
			        					</div>
			        				</div>
		        				</div>
                    		</a>
                    	</div>
                    	<div class="col-xl-2 col-md-6 mb-4">
                    		<a href="<?=base_url()?>index.php/admin/pns/<?=$data_user['id']?>">
                    			<div class="card border-left-primary shadow h-100 py-2">
			        				<div class="card-body">
			        					<div class="row no-gutters align-items-center">
			        						<div class="col mr-2">
			        							<div class="mb-0 font-weight-bold text-primary-800">PNS</div>
			        						</div>
			        						<div class="col-auto">
			        							<i class="fas fa-user-tie fa-2x text-gray-300"></i>
			        						</div>
			        					</div>
			        				</div>
		        				</div>
                    		</a>
                    	</div>
                    	<div class="col-xl-2 col-md-6 mb-4">
                    		<a href="<?=base_url()?>index.php/admin/pangkat/<?=$data_user['id']?>">
                    			<div class="card border-left-primary shadow h-100 py-2">
			        				<div class="card-body">
			        					<div class="row no-gutters align-items-center">
			        						<div class="col mr-2">
			        							<div class="mb-0 font-weight-bold text-primary-800">Pangkat</div>
			        						</div>
			        						<div class="col-auto">
			        							<i class="fas fa-shield-alt fa-2x text-gray-300"></i>
			        						</div>
			        					</div>
			        				</div>
		        				</div>
                    		</a>
                    	</div>
                    	<div class="col-xl-2 col-md-6 mb-4">
                    		<a href="<?=base_url()?>index.php/admin/jabatan/<?=$data_user['id']?>">
                    			<div class="card border-left-primary shadow h-100 py-2">
			        				<div class="card-body">
			        					<div class="row no-gutters align-items-center">
			        						<div class="col mr-2">
			        							<div class="mb-0 font-weight-bold text-primary-800">Jabatan</div>
			        						</div>
			        						<div class="col-auto">
			        							<i class="fas fa-id-card fa-2x text-gray-300"></i>
			        						</div>
			        					</div>
			        				</div>
		        				</div>
                    		</a>
                    	</div>
                    	<div class="col-xl-2 col-md-6 mb-4">
                    		<a href="<?=base_url()?>index.php/admin/kgb/<?=$data_user['id']?>">
                    			<div class="card border-left-primary shadow h-100 py-2">
			        				<div class="card-body">
			        					<div class="row no-gutters align-items-center">
			        						<div class="col mr-2">
			        							<div class="mb-0 font-weight-bold text-primary-800">K G B</div>
			        						</div>
			        						<div class="col-auto">
			        							<i class="fas fa-handshake fa-2x text-gray-300"></i>
			        						</div>
			        					</div>
			        				</div>
		        				</div>
                    		</a>
                    	</div>
        			</div>
				</div>
			</div>
		</div>
	</div>
</div>