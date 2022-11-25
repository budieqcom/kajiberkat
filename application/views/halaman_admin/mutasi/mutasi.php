        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="col mt-3">
                <?= $this->session->flashdata('pesan'); ?>
                <div class="card">
                    <div class="card-header">
                        <strong>Daftar Mutasi</strong>
                        <div class="float-right">
                            <a href="<?= base_url() ?>index.php/mutasi/tambah_mutasi" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> &nbsp; Tambah Data</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead align="center">
                                    <tr>
                                        <th width="40">No.</th>
                                        <th width="280">Jenis Mutasi</th>
                                        <th>NIP Pegawai</th>
                                        <th>Nama Pegawai</th>
                                        <th>Tanggal Mutasi</th>
                                        <th width="100">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data_mutasi as $dm) :
                                    ?>
                                        <tr>
                                            <td align="right"><?= $no ?></td>
                                            <td align="center"><?= $dm['jenis_mutasi'] ?></td>
                                            <td align="center"><?= $dm['nip_pegawai'] ?></td>
                                            <td align="center"><?= $dm['gelar_depan'].' '.$dm['nama_pegawai'].' '.$dm['gelar_belakang'] ?></td>
                                            <td align="center"><?= tgl_indo2($dm['tanggal_mutasi']) ?></td>
                                            <td align="center">
                                                <a class="btn btn-success btn-sm" href="<?= base_url() ?>index.php/mutasi/edit_mutasi/<?= $dm['id'] ?>"><i class="fas fa-pencil-alt"></i></a>
                                                <a class="btn btn-danger btn-sm" href="<?= base_url() ?>index.php/mutasi/hapus_mutasi/<?= $dm['id'] ?>" onclick="return confirm('Yakin akan menghapus data?');"><i class="far fa-trash-alt"></i></a>
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