        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
            <div class="card">
                <?=
                    $this->session->flashdata('message');
                ?>
                <div class="card-body ">

                    <form method="post" action="<?= base_url('menu/edit/') . $detail['id']; ?>">
                        <div class="form-row">

                            <div class="col-lg-6">
                                <b><label for="menu">Menu</label></b>
                                <input type="text" class="form-control" placeholder="Menu" id="menu" name="menu" value="<?= $detail['menu'] ?>">
                                <?= form_error('menu', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                </div>
            </div>
            <br>
            <div class="text-right">
                <button type="submit" class="btn btn-sm btn-success btn-round btn-icon" data-toggle="tooltip" data-original-title="Tambah Data">
                    <span class="btn-inner--icon"><i class="fas fa-user-edit"></i></span>
                    <span class="btn-inner--text">Simpan</span>
                </button>
                <a href=" <?= base_url('menu') ?>" class="btn btn-sm btn-danger btn-round btn-icon" data-toggle="tooltip" data-original-title="Tambah Data">
                    <span class="btn-inner--icon"><i class="fas fa-reply"></i></span>
                    <span class="btn-inner--text">Kembali</span>
                </a>
                </form>
            </div>



            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->