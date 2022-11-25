        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <form method="post" action="<?=base_url()?>index.php/jabatan/proses_tambah_jabatan" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-xl-6 col-sm-12 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <strong>Informasi Jabatan</strong>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label><strong>Kelompok Jabatan</strong></label>
                                    <select class="form-control" name="kelompok_jabatan">
                                        <option value="">--- Pilih Kelompok jabatan ---</option>
                                        <?php foreach ($kjabatan as $kj):?>
                                            <option value="<?=$kj['nama']?>"><?=$kj['nama']?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <labeL><strong>Flag Aktif</strong></labeL>
                                    <select class="form-control" name="flag_aktif">
                                        <option value="">--- Pilih Flag Aktif ---</option>
                                        <?php foreach ($flag_aktif as $fa):?>
                                            <option value="<?=$fa['nama'];?>"><?=$fa['nama']?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <labeL><strong>Unit Kerja</strong></labeL>
                                    <select class="form-control" name="unit_kerja">
                                        <option value="">--- Pilih Unit Kerja ---</option>
                                        <?php foreach ($unit_kerja as $uk):?>
                                            <option value="<?=$uk['nama'];?>"><?=$uk['nama']?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><strong>Jabatan</strong></label>
                                    <select class="form-control" name="jabatan">
                                        <option value="">--- Pilih Jabatan ---</option>
                                        <?php foreach ($jenis_jabatan as $jj):?>
                                            <option value="<?=$jj['nama']?>"><?=$jj['nama']?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><strong>TMT Mulai</strong></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control datepicker" name="tmt_mulai">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>    
                                    </div>  
                                </div>
                                <div class="form-group">
                                    <label><strong>TMT Selesai</strong></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control datepicker" name="tmt_selesai">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>    
                                    </div>  
                                </div>
                                <div class="form-group">
                                    <label><strong>Tanggal Pelantikan</strong></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control datepicker" name="tanggal_pelantikan">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>    
                                    </div>  
                                </div>
                                <div class="form-group">
                                    <label><strong>Tanggal SK</strong></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control datepicker" name="tanggal_sk">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>    
                                    </div>  
                                </div>
                                <div class="form-group">
                                    <label><strong>Nomor SK</strong></label>
                                    <input type="text" class="form-control" name="nomor_sk">
                                </div>
                                <div class="form-group">
                                    <label><strong>Pejabat SK</strong></label>
                                    <input type="text" class="form-control" name="pejabat_sk">
                                </div>
                                <div class="form-group">
                                    <label><strong>Dokumen SK</strong></label>
                                    <input type="file" class="form-control" name="dokumen_sk">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-sm-12 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <strong>Informasi SPP</strong>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label><strong>Tanggal SPP</strong></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control datepicker" name="tanggal_spp">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>    
                                    </div>  
                                </div>
                                <div class="form-group">
                                    <label><strong>Nomor SPP</strong></label>
                                    <input type="text" class="form-control" name="nomor_spp">
                                </div>
                                <div class="form-group">
                                    <label><strong>Pejabat SPP</strong></label>
                                    <input type="text" class="form-control" name="pejabat_spp">
                                </div>
                                <div class="form-group">
                                    <label><strong>Dokumen SPP</strong></label>
                                    <input type="file" class="form-control" name="dokumen_spp">
                                </div>
                            </div>
                        </div>
                        <div class="card mt-4">
                            <div class="card-header">
                                <strong>Informasi SPMT</strong>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label><strong>Tanggal SPMT</strong></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control datepicker" name="tanggal_spmt">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>    
                                    </div>  
                                </div>
                                <div class="form-group">
                                    <label><strong>TMT SPMT</strong></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control datepicker" name="tmt_spmt">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>    
                                    </div>  
                                </div>
                                <div class="form-group">
                                    <label><strong>Nomor SPMT</strong></label>
                                    <input type="text" class="form-control" name="nomor_spmt">
                                </div>
                                <div class="form-group">
                                    <label><strong>Pejabat SPMT</strong></label>
                                    <input type="text" class="form-control" name="pejabat_spmt">
                                </div>
                                <div class="form-group">
                                    <label><strong>Dokumen SPMT</strong></label>
                                    <input type="file" class="form-control" name="dokumen_spmt">
                                </div>
                            </div>
                        </div>
                        <div class="card mt-4">
                            <div class="card-header">
                                <strong>Informasi SPMJ</strong>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label><strong>Tanggal SPMJ</strong></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control datepicker" name="tanggal_spmj">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>    
                                    </div>  
                                </div>
                                <div class="form-group">
                                    <label><strong>Nomor SPMJ</strong></label>
                                    <input type="text" class="form-control" name="nomor_spmj">
                                </div>
                                <div class="form-group">
                                    <label><strong>Pejabat SPMJ</strong></label>
                                    <input type="text" class="form-control" name="pejabat_spmj">
                                </div>
                                <div class="form-group">
                                    <label><strong>Dokumen SPMJ</strong></label>
                                    <input type="file" class="form-control" name="dokumen_spmj">
                                </div>
                            </div>
                        </div>
                        <div class="float-right mt-4">
                        	<button type="submit" class="btn btn-primary btn-sm "><i class="far fa-save"></i> &nbsp; Simpan</button> &nbsp;
							<a href="<?=base_url()?>index.php/jabatan/jabatan" class="btn btn-danger btn-sm"><i class="far fa-window-close"></i> &nbsp; Batal</a>
                        </div>
                        <input type="hidden" name="id_pegawai" value="<?=$pns['id_pegawai']?>">
                        <input type="hidden" name="nip_pegawai" value="<?=$pns['nip_pegawai']?>">
                    </div>
                </div>
            </form>
        </div>
        <!-- /.container-fluid -->                
	</div>
	<!-- End of Main Content -->