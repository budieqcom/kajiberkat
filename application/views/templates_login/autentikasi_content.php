<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card o-hidden border-0 shadow-lg my-5 animate__animated animate__heartBeat">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4"><?= $judul ?></h1>
                                </div>
                                <?= $this->session->flashdata('pesan'); ?>
                                <form class="user" method="post" action="<?= base_url() ?>index.php/autentikasi/login">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="user" name="user" placeholder="Masukkan NIP sebagai akun user..." value="<?=set_value('user')?>" autofocus required>
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="pass" name="pass" placeholder="Password" value="<?=set_value('pass');?>" required>
                                        <?= form_error('pass', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                    <button class="btn btn-primary btn-user btn-block" type="submit">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
window.setTimeout(function() {
  $(".alert").fadeTo(500, 0).slideUp(500, function() {
    $(this).remove();
  });
}, 2000);
</script>