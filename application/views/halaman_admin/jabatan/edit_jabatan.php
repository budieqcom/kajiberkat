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
            <form method="post" action="<?= base_url() ?>index.php/admin/proses_edit_jabatan/<?= $data_user['id']?>" enctype="multipart/form-data">
                <div class="row mt-4">
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
                                        <?php foreach ($kjabatan as $kj) : ?>
                                            <?php if ($kj['nama'] == $edit_jabatan['kelompok_jabatan']) : ?>
                                                <option value="<?= $kj['nama'] ?>" selected><?= $kj['nama'] ?></option>
                                            <?php else : ?>
                                                <option value="<?= $kj['nama'] ?>"><?= $kj['nama'] ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <labeL><strong>Flag Aktif</strong></labeL>
                                    <select class="form-control" name="flag_aktif">
                                        <option value="">--- Pilih Flag Aktif ---</option>
                                        <?php foreach ($flag_aktif as $fa) : ?>
                                            <?php if ($fa['nama'] == $edit_jabatan['flag_aktif']) : ?>
                                                <option value="<?= $fa['nama']; ?>" selected><?= $fa['nama'] ?></option>
                                            <?php else : ?>
                                                <option value="<?= $fa['nama']; ?>"><?= $fa['nama'] ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <labeL><strong>Unit Kerja</strong></labeL>
                                    <select class="form-control" name="unit_kerja">
                                        <option value="">--- Pilih Unit Kerja ---</option>
                                        <?php foreach ($unit_kerja as $uk) : ?>
                                            <?php if ($uk['nama'] == $edit_jabatan['unit_kerja']) : ?>
                                                <option value="<?= $uk['nama']; ?>" selected><?= $uk['nama'] ?></option>
                                            <?php else : ?>
                                                <option value="<?= $uk['nama']; ?>"><?= $uk['nama'] ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><strong>Jabatan</strong></label>
                                    <select class="form-control" name="jabatan">
                                        <option value="">--- Pilih Jabatan ---</option>
                                        <?php foreach ($jenis_jabatan as $jj) : ?>
                                            <?php if ($jj['nama'] == $edit_jabatan['jabatan']) : ?>
                                                <option value="<?= $jj['nama'] ?>" selected><?= $jj['nama'] ?></option>
                                            <?php else : ?>
                                                <option value="<?= $jj['nama'] ?>"><?= $jj['nama'] ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><strong>TMT Mulai</strong></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control datepicker" name="tmt_mulai" value="<?= tgl_indo($edit_jabatan['tmt_mulai']) ?>">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><strong>TMT Selesai</strong></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control datepicker" name="tmt_selesai" value="<?= tgl_indo($edit_jabatan['tmt_selesai']) ?>">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><strong>Tanggal Pelantikan</strong></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control datepicker" name="tanggal_pelantikan" value="<?= tgl_indo($edit_jabatan['tanggal_pelantikan']) ?>">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><strong>Tanggal SK</strong></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control datepicker" name="tanggal_sk" value="<?= tgl_indo($edit_jabatan['tanggal_sk']) ?>">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><strong>Nomor SK</strong></label>
                                    <input type="text" class="form-control" name="nomor_sk" value="<?= $edit_jabatan['nomor_sk'] ?>">
                                </div>
                                <div class="form-group">
                                    <label><strong>Pejabat SK</strong></label>
                                    <input type="text" class="form-control" name="pejabat_sk" value="<?= $edit_jabatan['pejabat_sk'] ?>">
                                </div>
                                <div class="form-group">
                                    <label><strong>Dokumen SK</strong></label>
                                    <?php if ($edit_jabatan['dokumen_sk']) : ?>
                                        <a class="btn btn-default btn-sm" href="<?= base_url('dokumen_jabatan/') . $edit_jabatan['dokumen_sk'] ?>" target="_blank"><strong><?= $edit_jabatan['dokumen_sk'] ?></strong></a>
                                    <?php else : ?>
                                        <a class="btn btn-danger btn-sm" href="#">Tidak ada Dokumen SK</a>
                                    <?php endif; ?>
                                    <input type="file" class="form-control" name="dokumen_sk_baru">
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
                                        <input type="text" class="form-control datepicker" name="tanggal_spp" value="<?= tgl_indo($edit_jabatan['tanggal_spp']) ?>">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><strong>Nomor SPP</strong></label>
                                    <input type="text" class="form-control" name="nomor_spp" value="<?= $edit_jabatan['nomor_spp'] ?>">
                                </div>
                                <div class="form-group">
                                    <label><strong>Pejabat SPP</strong></label>
                                    <input type="text" class="form-control" name="pejabat_spp" value="<?= $edit_jabatan['pejabat_spp'] ?>">
                                </div>
                                <div class="form-group">
                                    <label><strong>Dokumen SPP</strong></label>
                                    <?php if ($edit_jabatan['dokumen_spp']) : ?>
                                        <a class="btn btn-default btn-sm" href="<?= base_url('dokumen_jabatan/') . $edit_jabatan['dokumen_spp'] ?>" target="_blank"><strong><?= $edit_jabatan['dokumen_spp'] ?></strong></a>
                                    <?php else : ?>
                                        <a class="btn btn-danger btn-sm" href="#">Tidak ada Dokumen SPP</a>
                                    <?php endif; ?>
                                    <input type="file" class="form-control" name="dokumen_spp_baru">
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
                                        <input type="text" class="form-control datepicker" name="tanggal_spmt" value="<?= tgl_indo($edit_jabatan['tanggal_spmt']) ?>">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><strong>TMT SPMT</strong></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control datepicker" name="tmt_spmt" value="<?= tgl_indo($edit_jabatan['tmt_spmt']) ?>">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><strong>Nomor SPMT</strong></label>
                                    <input type="text" class="form-control" name="nomor_spmt" value="<?= $edit_jabatan['nomor_spmt'] ?>">
                                </div>
                                <div class="form-group">
                                    <label><strong>Pejabat SPMT</strong></label>
                                    <input type="text" class="form-control" name="pejabat_spmt" value="<?= $edit_jabatan['pejabat_spmt'] ?>">
                                </div>
                                <div class="form-group">
                                    <label><strong>Dokumen SPMT</strong></label>
                                    <?php if ($edit_jabatan['dokumen_spmt']) : ?>
                                        <a class="btn btn-default btn-sm" href="<?= base_url('dokumen_jabatan/') . $edit_jabatan['dokumen_spmt'] ?>" target="_blank"><strong><?= $edit_jabatan['dokumen_spmt'] ?></strong></a>
                                    <?php else : ?>
                                        <a class="btn btn-danger btn-sm" href="#">Tidak ada Dokumen SPMT</a>
                                    <?php endif; ?>
                                    <input type="file" class="form-control" name="dokumen_spmt_baru">
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
                                        <input type="text" class="form-control datepicker" name="tanggal_spmj" value="<?= tgl_indo($edit_jabatan['tanggal_spmj']) ?>">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><strong>Nomor SPMJ</strong></label>
                                    <input type="text" class="form-control" name="nomor_spmj" value="<?= $edit_jabatan['nomor_spmj'] ?>">
                                </div>
                                <div class="form-group">
                                    <label><strong>Pejabat SPMJ</strong></label>
                                    <input type="text" class="form-control" name="pejabat_spmj" value="<?= $edit_jabatan['pejabat_spmj'] ?>">
                                </div>
                                <div class="form-group">
                                    <label><strong>Dokumen SPMJ</strong></label>
                                    <?php if ($edit_jabatan['dokumen_spmj']) : ?>
                                        <a class="btn btn-default btn-sm" href="<?= base_url('dokumen_jabatan/') . $edit_jabatan['dokumen_spmj'] ?>" target="_blank"><strong><?= $edit_jabatan['dokumen_spmj'] ?></strong></a>
                                    <?php else : ?>
                                        <a class="btn btn-danger btn-sm" href="#">Tidak ada Dokumen SPMJ</a>
                                    <?php endif; ?>
                                    <input type="file" class="form-control" name="dokumen_spmj_baru">
                                </div>
                            </div>
                        </div>
                        <div class="float-right mt-4">
                            <button type="submit" class="btn btn-primary btn-sm "><i class="far fa-save"></i> &nbsp; Simpan</button> &nbsp;
                            <a href="<?= base_url() ?>index.php/admin/jabatan/<?=$data_user['id']?>" class="btn btn-danger btn-sm"><i class="far fa-window-close"></i> &nbsp; Batal</a>
                        </div>
                        <input type="hidden" name="id_jabatan" value="<?= $edit_jabatan['id'] ?>">
                        <input type="hidden" name="id_pegawai" value="<?= $edit_jabatan['id_pegawai'] ?>">
                        <input type="hidden" name="nip_pegawai" value="<?= $edit_jabatan['nip_pegawai'] ?>">
                        <input type="hidden" name="dokumen_sk_lama" value="<?= $edit_jabatan['dokumen_sk'] ?>">
                        <input type="hidden" name="path_dokumen_sk_lama" value="<?= $edit_jabatan['path_dokumen_sk'] ?>">
                        <input type="hidden" name="dokumen_spp_lama" value="<?= $edit_jabatan['dokumen_spp'] ?>">
                        <input type="hidden" name="path_dokumen_spp_lama" value="<?= $edit_jabatan['path_dokumen_spp'] ?>">
                        <input type="hidden" name="dokumen_spmt_lama" value="<?= $edit_jabatan['dokumen_spmt'] ?>">
                        <input type="hidden" name="path_dokumen_spmt_lama" value="<?= $edit_jabatan['path_dokumen_spmt'] ?>">
                        <input type="hidden" name="dokumen_spmj_lama" value="<?= $edit_jabatan['dokumen_spmj'] ?>">
                        <input type="hidden" name="path_dokumen_spmj_lama" value="<?= $edit_jabatan['path_dokumen_spmj'] ?>">
                    </div>
                </div>
            </form>
        </div>
        <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->