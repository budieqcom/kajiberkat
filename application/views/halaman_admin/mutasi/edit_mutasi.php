        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <form method="post" action="<?= base_url() ?>index.php/mutasi/proses_edit_mutasi" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-xl-6 col-sm-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label><strong>NIP Pegawai</strong></label>
                                    <select class="form-control" name="nip_pegawai" disabled>
										<option>--- Pilih Pegawai ---</option>
										<?php foreach ($data_pegawai as $dp): ?>
											<?php if ($dp['nip'] == $data_mutasi['nip_pegawai']): ?>
												<option value="<?= $dp['nip'] ?>" selected><?= $dp['nip'].' '.$dp['gelar_depan'].' '.$dp['nama_lengkap'].' '.$dp['gelar_belakang']?></option>
											<?php else: ?>
												<option value="<?= $dp['nip'] ?>"><?= $dp['nip'].' '.$dp['gelar_depan'].' '.$dp['nama_lengkap'].' '.$dp['gelar_belakang']?></option>
											<?php endif;?>
										<?php endforeach;?>
									</select>
                                </div>
                                <div class="form-group">
                                    <label><strong>Jenis Mutasi</strong></label>
                                    <select class="form-control" name="jenis_mutasi">
                                        <option value="">--- Pilih Jenis Mutasi ---</option>
                                        <?php foreach ($jenis_mutasi as $jm) : ?>
                                            <?php if ($jm['nama'] == $data_mutasi['jenis_mutasi']) : ?>
                                                <option value="<?= $jm['nama'] ?>" selected><?= $jm['nama'] ?></option>
                                            <?php else : ?>
                                                <option value="<?= $jm['nama'] ?>"><?= $jm['nama'] ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><strong>Tanggal Mutasi</strong></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control datepicker" name="tanggal_mutasi" value="<?= tgl_indo($data_mutasi['tanggal_mutasi']) ?>">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><strong>Nomor SK Mutasi</strong></label>
                                    <input type="text" class="form-control" name="no_sk_mutasi" value="<?= $data_mutasi['no_sk_mutasi'] ?>">
                                </div>
                                <div class="form-group">
                                    <label><strong>Dokumen Mutasi</strong>&nbsp; 
									<?php if ($data_mutasi['dokumen_sk_mutasi']): ?>
									<a class="btn btn-default btn-sm" href="<?=base_url('dokumen_mutasi/').$data_mutasi['dokumen_sk_mutasi']?>" target="_blank"><strong><?=$data_mutasi['dokumen_sk_mutasi']?></strong></a>
									<?php else:?>
										<a class="btn btn-danger btn-sm" href="#">Tidak ada Dokumen SK Mutasi</a>
									<?php endif; ?>
									</label>
                                    <input type="file" class="form-control" name="dokumen_sk_mutasi">
                                </div>
                            </div>
                            <input type="hidden" name="id_mutasi" value="<?= $data_mutasi['id']?>">
                            <input type="hidden" name="dokumen_sk_mutasi_lama" value="<?=  $data_mutasi['dokumen_sk_mutasi']?>">
                        </div>
                        <div class="float-right mt-4">
                            <button type="submit" class="btn btn-primary btn-sm "><i class="far fa-save"></i> &nbsp; Simpan</button> &nbsp;
                            <a href="<?= base_url() ?>index.php/mutasi/daftar_mutasi" class="btn btn-danger btn-sm"><i class="far fa-window-close"></i> &nbsp; Batal</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->