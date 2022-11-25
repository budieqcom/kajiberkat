        <!-- Begin Page Content -->
        <div class="container-fluid">
			<!-- Page Heading -->
			<div class="alert alert-primary" role="alert">
				<h6><strong>Hai, <?=ucfirst($profile['nama_lengkap']);?>... Selamat datang di KAJIBERKAT</strong></h6>
			</div>
			<div class="row">
				<div class="col-xl-3 col-md-6 mb-4">
	              <div class="card border-left-primary shadow h-100 py-2 animate__animated animate__bounceInDown">
	                <div class="card-body">
	                  <div class="row no-gutters align-items-center">
	                    <div class="col mr-2">
	                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Pangkat</div>
	                      <div class="h5 mb-0 font-weight-bold text-gray-800">
							  <a href="#"><?=$jlh_pangkat;?></a>
						  </div>
	                    </div>
	                    <div class="col-auto">
	                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
	                    </div>
	                  </div>
	                </div>
	              </div>
            	</div>
            	<div class="col-xl-3 col-md-6 mb-4">
	              <div class="card border-left-warning shadow h-100 py-2 animate__animated animate__bounceInUp">
	                <div class="card-body">
	                  <div class="row no-gutters align-items-center">
	                    <div class="col mr-2">
	                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Jabatan</div>
	                      <div class="h5 mb-0 font-weight-bold text-gray-800">
							  <a href="#"><?=$jlh_jabatan;?></a>
						  </div>
	                    </div>
	                    <div class="col-auto">
	                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
	                    </div>
	                  </div>
	                </div>
	              </div>
            	</div>
            	<div class="col-xl-3 col-md-6 mb-4">
	              <div class="card border-left-danger shadow h-100 py-2 animate__animated animate__bounceInRight">
	                <div class="card-body">
	                  <div class="row no-gutters align-items-center">
	                    <div class="col mr-2">
	                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data KGB</div>
	                      <div class="h5 mb-0 font-weight-bold text-gray-800">
							  <a href="#"><?=$jlh_kgb;?></a>
						  </div>
	                    </div>
	                    <div class="col-auto">
	                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
	                    </div>
	                  </div>
	                </div>
	              </div>
            	</div>
			</div>
        </div>
        <!-- /.container-fluid -->
	</div>
	<!-- End of Main Content -->