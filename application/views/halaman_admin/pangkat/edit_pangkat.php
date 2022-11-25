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
            <form method="post" action="<?= base_url() ?>index.php/admin/proses_edit_pangkat/<?=$data_user['id']?>" enctype="multipart/form-data">
                <div class="row mt-4">
                    <div class="col-xl-6 col-sm-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label><strong>Jenis Pangkat</strong></label>
                                    <select class="form-control" name="jenis_pangkat">
                                        <option value="">--- Pilih Jenis Pangkat ---</option>
                                        <?php foreach ($jenis_pangkat as $jp) : ?>
                                            <?php if ($jp['nama'] == $edit_pangkat['jenis_pangkat']) : ?>
                                                <option value="<?= $jp['nama'] ?>" selected><?= $jp['nama'] ?></option>
                                            <?php else : ?>
                                                <option value="<?= $jp['nama'] ?>"><?= $jp['nama'] ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><strong>Golongan Ruang</strong></label>
                                    <select class="form-control" name="golongan_ruang">
                                        <option value="">--- Pilih Golongan Ruang ---</option>
                                        <?php foreach ($golongan_ruang as $gr) : ?>
                                            <?php if ($gr['golongan'] == $edit_pangkat['golongan_ruang']) : ?>
                                                <option value="<?= $gr['golongan'] ?>" selected><?= $gr['golongan'] ?></option>
                                            <?php else : ?>
                                                <option value="<?= $gr['golongan'] ?>"><?= $gr['golongan'] ?></option>
                                            <?php endif; ?> <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><strong>TMT Golongan</strong></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control datepicker" name="tmt_golongan" value="<?= tgl_indo($edit_pangkat['tmt_golongan']) ?>">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><strong>Gaji Pokok Rp.</strong></label>
                                    <input type="text" class="form-control" id="gaji_pokok" name="gaji_pokok" value="<?= ($edit_pangkat['gaji_pokok'] != "") ? number_format($edit_pangkat['gaji_pokok'], 0, ",", ".") : '0' ?>">
                                </div>
                                <div class="form-group">
                                    <label><strong>Pejabat Penandatangan SK</strong></label>
                                    <input type="text" class="form-control" name="pejabat_penandatangan_sk" value="<?= $edit_pangkat['pejabat_penandatangan_sk'] ?>">
                                </div>
                                <div class="form-group">
                                    <label><strong>Nomor SK Pangkat</strong></label>
                                    <input type="text" class="form-control" name="no_sk_pangkat" value="<?= $edit_pangkat['no_sk_pangkat'] ?>">
                                </div>
                                <div class="form-group">
                                    <label><strong>Tanggal SK Pangkat</strong></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control datepicker" name="tanggal_sk_pangkat" value="<?= tgl_indo($edit_pangkat['tanggal_sk_pangkat']) ?>">
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
                                    <input type="text" class="form-control" name="nomor_persetujuan" value="<?= $edit_pangkat['nomor_persetujuan'] ?>">
                                </div>
                                <div class="form-group">
                                    <label><strong>Tanggal Persetujuan Teknis</strong></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control datepicker" name="tanggal_persetujuan" value="<?= tgl_indo($edit_pangkat['tanggal_persetujuan']) ?>">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><strong>Masa Kerja (Tahun)</strong></label>
                                    <input type="text" class="form-control" name="masa_kerja_tahun" value="<?= $edit_pangkat['masa_kerja_tahun'] ?>">
                                </div>
                                <div class="form-group">
                                    <label><strong>Masa Kerja (Bulan)</strong></label>
                                    <input type="text" class="form-control" name="masa_kerja_bulan" value="<?= $edit_pangkat['masa_kerja_bulan'] ?>">
                                </div>
                                <div class="form-group">
                                    <label><strong>Dokumen SK Pangkat </strong></label>
                                    <?php if ($edit_pangkat['dokumen_sk_pangkat']) : ?>
                                        <a class="btn btn-success btn-sm" href="<?= base_url('dokumen_pangkat/') . $edit_pangkat['dokumen_sk_pangkat'] ?>" target="_blank">
                                            <?= $edit_pangkat['dokumen_sk_pangkat'] ?>
                                        </a>
                                    <?php else : ?>
                                        <a class="btn btn-danger btn-sm" href="#">Tidak ada dokumen SK Pangkat</a>
                                    <?php endif; ?>
                                    <input type="file" class="form-control" name="dokumen_sk_pangkat_baru">
                                </div>
                                <div class="form-group">
                                    <label><strong>Dokumen Persetujuan Teknis </strong></label>
                                    <?php if ($edit_pangkat['dokumen_persetujuan']) : ?>
                                        <a class="btn btn-success btn-sm" href="<?= base_url('dokumen_pangkat/') . $edit_pangkat['dokumen_persetujuan'] ?>" target="_blank">
                                            <?= $edit_pangkat['dokumen_persetujuan'] ?>
                                        </a>
                                    <?php else : ?>
                                        <a class="btn btn-danger btn-sm" href="#">Tidak ada dokumen Persetujuan</a>
                                    <?php endif; ?>
                                    <input type="file" class="form-control" name="dokumen_persetujuan_baru">
                                </div>
                            </div>
                        </div>
                        <div class="float-right mt-4">
                            <button type="submit" class="btn btn-primary btn-sm "><i class="far fa-save"></i> &nbsp; Simpan</button> &nbsp;
                            <a href="<?= base_url() ?>index.php/admin/pangkat/<?=$data_user['id']?>" class="btn btn-danger btn-sm"><i class="far fa-window-close"></i> &nbsp; Batal</a>
                        </div>
                        <input type="hidden" name="id_pangkat" value="<?= $edit_pangkat['id'] ?>">
                        <input type="hidden" name="id_pns" value="<?= $edit_pangkat['id_pegawai'] ?>">
                        <input type="hidden" name="nip_pns" value="<?= $edit_pangkat['nip_pegawai'] ?>">
                        <input type="hidden" name="dokumen_sk_pangkat_lama" value="<?= $edit_pangkat['dokumen_sk_pangkat'] ?>">
                        <input type="hidden" name="path_dokumen_sk_pangkat_lama" value="<?= $edit_pangkat['path_dokumen_sk_pangkat'] ?>">
                        <input type="hidden" name="dokumen_persetujuan_lama" value="<?= $edit_pangkat['dokumen_persetujuan'] ?>">
                        <input type="hidden" name="path_dokumen_persetujuan_lama" value="<?= $edit_pangkat['path_dokumen_persetujuan'] ?>">
                    </div>
                </div>
            </form>
        </div>
        <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->