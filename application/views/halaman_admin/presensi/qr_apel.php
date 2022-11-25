        <!-- Begin Page Content -->
        <div class="container-fluid">
			<!-- Page Heading -->
			<div class="col mt-3">
				<?=$this->session->flashdata('pesan');?>
				<form method="post" action="#">
					<div class="card mt-4">
						<div class="card-header">
							<strong>Cetak QRCode Apel</strong>
						</div>
						<div class="card-body">
							<div class="row justify-content-center">
								<div class="col-lg-3 col-sm-12">
									<img class="img-fluid" src="<?= base_url('dokumen_config/config').$kode_satker['value'].'.png' ?>" width="100%">
								</div>
							</div>
							<div class="table-responsive">
								
							</div>
						</div>
					</div>
				</form>
			</div>
        </div>
        <!-- /.container-fluid -->
	</div>
	<!-- End of Main Content -->