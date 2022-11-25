        <!-- Begin Page Content -->
        <div class="container-fluid">
			<!-- Page Heading -->
			<div class="col mt-3">
				<?=$this->session->flashdata('pesan');?>
				<div class="card">
					<div class="card-header">
						<strong>Daftar Alamat</strong>
						<div class="float-right">
							<a href="<?=base_url()?>index.php/alamat/tambah_alamat" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> &nbsp; Tambah Data</a>
							<a href="<?=base_url()?>index.php/pegawai/biodata_pegawai" class="btn btn-warning btn-sm"><i class="fa fa-step-backward"></i> &nbsp; Kembali</a>	
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-sm table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead align="center">
									<tr>
										<th width="40">No.</th>
										<th width="280">Jenis Alamat</th>
										<th>Alamat</th>
										<th width="100">Aksi</th>
									</tr>
								</thead>
								<tbody>
                                <?php 
                                $no = 1;
                                foreach ($data_alamat as $da):
                                ?>
									<tr>
                                        <td><?=$no;?></td>
                                        <td align="center"><?=$da['jenis_alamat']?></td>
                                        <td><?=$da['alamat']?></td>
                                        <td align="center">
                                            <a class="btn btn-success btn-sm" href="<?=base_url()?>index.php/alamat/edit_alamat/<?=$da['id']?>"><i class="fas fa-pencil-alt"></i></a> 
											<a class="btn btn-danger btn-sm" href="<?=base_url()?>index.php/alamat/hapus_alamat/<?=$da['id']?>" onclick="return confirm('Yakin akan menghapus data?');"><i class="far fa-trash-alt"></i></a>
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
        <!-- /.container-fluid -->
	</div>
	<!-- End of Main Content -->