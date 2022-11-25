        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <form method="post" action="<?=base_url()?>index.php/alamat/proses_edit_alamat" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-xl-6 col-sm-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label><strong>Jenis Alamat</strong></label>
                                    <select class="form-control" name="jenis_alamat">
                                        <option value="">--- Pilih Jenis Alamat ---</option>
                                        <?php foreach ($jenis_alamat as $ja):?>
                                            <?php if ($ja['nama'] == $data_alamat['jenis_alamat']):?>
                                                <option value="<?=$ja['nama']?>" selected><?=$ja['nama']?></option>
                                            <?php else:?>
                                                <option value="<?=$ja['nama']?>"><?=$ja['nama']?></option>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><strong>Alamat</strong></label>
                                    <textarea class="form-control" name="alamat" rows="3"><?=$data_alamat['alamat']?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="float-right mt-4">
                        	<button type="submit" class="btn btn-primary btn-sm "><i class="far fa-save"></i> &nbsp; Simpan</button> &nbsp;
							<a href="<?=base_url()?>index.php/alamat/alamat" class="btn btn-danger btn-sm"><i class="far fa-window-close"></i> &nbsp; Batal</a>
                        </div>
                        <input type="hidden" name="id_alamat" value="<?=$data_alamat['id']?>">
                        <input type="hidden" name="id_pegawai" value="<?=$pns['id_pegawai']?>">
                        <input type="hidden" name="nip_pegawai" value="<?=$pns['nip_pegawai']?>">
                    </div>                    
                </div>
            </form>
        </div>
        <!-- /.container-fluid -->                
	</div>
	<!-- End of Main Content -->