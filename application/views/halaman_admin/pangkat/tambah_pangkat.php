        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="card bg-gradient-success text-white shadow">
                <div class="card-body">
                    <ul>
                        <li><strong><?= $data_user['gelar_depan'].' '.$data_user['nama_lengkap'].' '.$data_user['gelar_belakang'] ?></strong></li>
                        <li><strong>N I P : <?= $data_user['nip']?></strong></li>
                    </ul>
                </div>
            </div>
            <form method="post" action="<?=base_url()?>index.php/admin/proses_tambah_pangkat/<?=$data_user['id']?>" enctype="multipart/form-data">
                <div class="row mt-4">
                    <div class="col-xl-6 col-sm-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label><strong>Jenis Pangkat</strong></label>
                                    <select class="form-control" name="jenis_pangkat">
                                        <option value="">--- Pilih Jenis Pangkat ---</option>
                                        <?php foreach ($jenis_pangkat as $jp):?>
                                            <option value="<?=$jp['nama']?>"><?=$jp['nama']?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><strong>Golongan Ruang</strong></label>
                                    <select class="form-control" name="golongan_ruang">
                                        <option value="">--- Pilih Golongan Ruang ---</option>
                                        <?php foreach ($golongan_ruang as $gr):?>
                                            <option value="<?=$gr['golongan']?>"><?=$gr['golongan']?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><strong>TMT Golongan</strong></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control datepicker" name="tmt_golongan">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>    
                                    </div>  
                                </div>
                                <div class="form-group">
                                    <label><strong>Gaji Pokok Rp.</strong></label>
                                    <input type="text" class="form-control" id="gaji_pokok" name="gaji_pokok">
                                </div>
                                <div class="form-group">
                                    <label><strong>Pejabat Penandatangan SK</strong></label>
                                    <input type="text" class="form-control" name="pejabat_penandatangan_sk">
                                </div>
                                <div class="form-group">
                                    <label><strong>Nomor SK Pangkat</strong></label>
                                    <input type="text" class="form-control" name="no_sk_pangkat">
                                </div>
                                <div class="form-group">
                                    <label><strong>Tanggal SK Pangkat</strong></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control datepicker" name="tanggal_sk_pangkat">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-sm-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label><strong>Nomor Persetujuan Teknis</strong></label>
                                    <input type="text" class="form-control" name="nomor_persetujuan">
                                </div>
                                <div class="form-group">
                                    <label><strong>Tanggal Persetujuan Teknis</strong></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control datepicker" name="tanggal_persetujuan">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><strong>Masa Kerja (Tahun)</strong></label>
                                    <input type="text" class="form-control" name="masa_kerja_tahun">
                                </div>
                                <div class="form-group">
                                    <label><strong>Masa Kerja (Bulan)</strong></label>
                                    <input type="text" class="form-control" name="masa_kerja_bulan">
                                </div>
                                <div class="form-group">
                                    <label><strong>Dokumen SK Pangkat</strong></label>
                                    <input type="file" class="form-control" name="dokumen_sk_pangkat">
                                </div>
                                <div class="form-group">
                                    <label><strong>Dokumen Persetujuan Teknis</strong></label>
                                    <input type="file" class="form-control" name="dokumen_persetujuan">
                                </div>
                            </div>
                        </div>
                        <div class="float-right mt-4">
                        	<button type="submit" class="btn btn-primary btn-sm "><i class="far fa-save"></i> &nbsp; Simpan</button> &nbsp;
							<a href="<?=base_url()?>index.php/admin/pangkat/<?=$data_user['id']?>" class="btn btn-danger btn-sm"><i class="far fa-window-close"></i> &nbsp; Batal</a>
                        </div>
                        <input type="hidden" name="id_pns" value="<?=$pns['id_pegawai']?>">
                        <input type="hidden" name="nip_pns" value="<?=$pns['nip_pegawai']?>">
                    </div>
                </div>
            </form>
        </div>
        <!-- /.container-fluid -->                
	</div>
	<!-- End of Main Content -->