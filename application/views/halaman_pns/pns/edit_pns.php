        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <form method="post" action="<?= base_url() ?>index.php/halaman_pns/proses_update_pns" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-xl-6 col-sm-12 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <label><strong>Perubahan Data PNS</strong></label>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label><strong>Golongan PNS</strong></label>
                                    <select class="form-control" name="golongan">
                                        <option value="">--- Pilih Golongan ---</option>
                                        <?php foreach ($golongan as $g) : ?>
                                            <?php if ($g['golongan'] == $pns['golongan_ruang']) : ?>
                                                <option value="<?= $g['golongan'] ?>" selected><?= $g['golongan'] ?></option>
                                            <?php else : ?>
                                                <option value="<?= $g['golongan'] ?>"><?= $g['golongan'] ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><strong>Nomor SK PNS</strong></label>
                                    <input type="text" class="form-control" name="no_sk_pns" value="<?= $pns['no_sk_pns'] ?>">
                                </div>
                                <div class="form-group">
                                    <label><strong>Tanggal SK PNS</strong></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control datepicker" name="tanggal_sk_pns" value="<?= tgl_indo($pns['tanggal_sk_pns']) ?>">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><strong>Nomor Persetujuan Teknis</strong></label>
                                    <input type="text" class="form-control" name="nomor_persetujuan" value="<?= $pns['nomor_persetujuan'] ?>">
                                </div>
                                <div class="form-group">
                                    <label><strong>Tanggal Persetujuan Teknis</strong></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control datepicker" name="tanggal_persetujuan" value="<?= tgl_indo($pns['tanggal_persetujuan']) ?>">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><strong>Gaji Pokok Rp.</strong></label>
                                    <input type="text" class="form-control" id="gaji_pokok" name="gaji_pokok" value="<?= ($pns['gaji_pokok']) ? number_format($pns['gaji_pokok'], 0, ",", ".") : '0' ?>">
                                </div>
                                <div class="form-group">
                                    <label><strong>TMT Golongan</strong></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control datepicker" name="tmt_golongan" value="<?= tgl_indo($pns['tmt_golongan']) ?>">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><strong>Masa Kerja (Tahun)</strong></label>
                                    <input type="text" class="form-control" name="masa_kerja_tahun" value="<?= $pns['masa_kerja_tahun'] ?>">
                                </div>
                                <div class="form-group">
                                    <label><strong>Masa Kerja (Bulan)</strong></label>
                                    <input type="text" class="form-control" name="masa_kerja_bulan" value="<?= $pns['masa_kerja_bulan'] ?>">
                                </div>
                                <div class="form-group">
                                    <label><strong>Pejabat Penandatangan SK</strong></label>
                                    <input type="text" class="form-control" name="pejabat_penandatangan_sk" value="<?= $pns['pejabat_penandatangan_sk'] ?>">
                                </div>
                                <div class="form-group">
                                    <label><strong>Dokumen SK Pangkat</strong></label> &nbsp;
                                    <?php if ($pns['dokumen_sk_pns']) : ?>
                                        <a class="btn btn-default btn-sm" href="<?= base_url('dokumen_pns/') . $pns['dokumen_sk_pns'] ?>" target="_blank"><strong><?= $pns['dokumen_sk_pns'] ?></strong></a>
                                    <?php else : ?>
                                        <a class="btn btn-danger btn-sm" href="#">Tidak ada dokumen SK PNS</a>
                                    <?php endif; ?>
                                    <input type="file" class="form-control" name="dokumen_sk_pns_baru" value="<?= $pns['dokumen_sk_pns'] ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-sm-12 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <label><strong>Informasi Jabatan</strong></label>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label><strong>Kelompok Jabatan</strong></label>
                                    <select class="form-control" name="kjabatan">
                                        <option value="">--- Pilih Kelompok Jabatan ---</option>
                                        <?php foreach ($kjabatan as $kj) : ?>
                                            <?php if ($kj['nama'] == $pns['kelompok_jabatan']) : ?>
                                                <option value="<?= $kj['nama'] ?>" selected><?= $kj['nama'] ?></option>
                                            <?php else : ?>
                                                <option value="<?= $kj['nama'] ?>"><?= $kj['nama'] ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><strong>Jabatan</strong></label>
                                    <select class="form-control" name="jabatan">
                                        <option value="">--- Pilih Jabatan ---</option>
                                        <?php foreach ($jabatan as $j) : ?>
                                            <?php if ($j['nama'] == $pns['jabatan']) : ?>
                                                <option value="<?= $j['nama'] ?>" selected><?= $j['nama'] ?></option>
                                            <?php else : ?>
                                                <option value="<?= $j['nama'] ?>"><?= $j['nama'] ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><strong>TMT Selesai</strong></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control datepicker" name="tmt_selesai" value="<?= tgl_indo($pns['tmt_selesai']) ?>">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><strong>Pejabat SK</strong></label>
                                    <input type="text" class="form-control" name="pejabat_sk" value="<?= $pns['pejabat_sk'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="card mt-4">
                            <div class="card-header">
                                <label><strong>Informasi SPMT</strong></label>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label><strong>Tanggal SPMT</strong></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control datepicker" name="tanggal_spmt" value="<?= tgl_indo($pns['tanggal_spmt']) ?>">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><strong>Nomor SPMT</strong></label>
                                    <input type="text" class="form-control" name="nomor_spmt" value="<?= $pns['nomor_spmt'] ?>">
                                </div>
                                <div class="form-group">
                                    <label><strong>TMT SPMT</strong></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control datepicker" name="tmt_spmt" value="<?= tgl_indo($pns['tmt_spmt']) ?>">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><strong>Pejabat SPMT</strong></label>
                                    <input type="text" class="form-control" name="pejabat_spmt" value="<?= $pns['pejabat_spmt'] ?>">
                                </div>
                                <div class="form-group">
                                    <label><strong>Dokumen SPMT</strong></label> &nbsp;
                                    <?php if ($pns['dokumen_spmt']) : ?>
                                        <a class="btn btn-default btn-sm" href="<?= base_url('dokumen_pns/') . $pns['dokumen_spmt'] ?>" target="_blank"><strong><?= $pns['dokumen_spmt'] ?></strong></a>
                                    <?php else : ?>
                                        <a class="btn btn-danger btn-sm" href="#">Tidak ada dokumen SPMT</a>
                                    <?php endif; ?>
                                    <input type="file" class="form-control" name="dokumen_spmt_baru" value="<?= $pns['dokumen_spmt'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="float-right mt-4">
                            <button type="submit" class="btn btn-primary btn-sm "><i class="far fa-save"></i> &nbsp; Simpan</button> &nbsp;
                            <a href="<?= base_url() ?>index.php/halaman_pns/pns" class="btn btn-danger btn-sm"><i class="far fa-window-close"></i> &nbsp; Batal</a>
                        </div>
                        <input type="hidden" name="id_pns" value="<?= $pns['id_pegawai'] ?>">
                        <input type="hidden" name="dokumen_sk_pns_lama" value="<?= $pns['dokumen_sk_pns'] ?>">
                        <input type="hidden" name="path_dokumen_sk_pns_lama" value="<?= $pns['path_dokumen_sk_pns'] ?>">
                        <input type="hidden" name="dokumen_spmt_lama" value="<?= $pns['dokumen_spmt'] ?>">
                        <input type="hidden" name="path_dokumen_spmt_lama" value="<?= $pns['path_dokumen_spmt'] ?>">
                    </div>
                </div>
            </form>
        </div>
        <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->