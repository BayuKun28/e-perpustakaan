        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
            <div class="card">
                <?=
                    $this->session->flashdata('message');
                ?>
                <div class="card-body ">
                    <form method="post" action="<?= base_url('menu/editsub/') . $detail['id']; ?>">
                        <div class="form-row">
                            <div class="col-lg-6">
                                <b><label for="title">Title</label></b>
                                <input type="text" class="form-control" placeholder="Title" id="title" name="title" value="<?= $detail['title'] ?>">
                                <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col">
                                <b><label for="menu">Menu</label></b>
                                <select class="form-control" id="menu" name="menu">
                                    <option value="<?= $detail['idm'] ?>"><?= $detail['menu'] ?> </option>
                                    <?php foreach ($menu as $m) : ?>
                                        <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('menu', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-6">
                                <b><label for="url">URL</label></b>
                                <input type="text" class="form-control" placeholder="url" id="url" name="url" value="<?= $detail['url'] ?>">
                                <?= form_error('url', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-lg-6">
                                <b><label for="icon">Icon</label></b>
                                <input type="text" class="form-control" placeholder="icon" id="icon" name="icon" value="<?= $detail['icon'] ?>">
                                <?= form_error('icon', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <b><label for="active">Active</label></b>
                                <select class="form-control" id="active" name="active">
                                    <option value="<?= $detail['is_active'] ?>"> <?php
                                                                                    if ($detail['is_active'] == 1) {
                                                                                        echo 'Aktif';
                                                                                    } else {
                                                                                        echo 'Tidak Aktif';
                                                                                    }
                                                                                    ?> </option>
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
                                </select>
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
                <a href=" <?= base_url('menu/submenu') ?>" class="btn btn-sm btn-danger btn-round btn-icon" data-toggle="tooltip" data-original-title="Tambah Data">
                    <span class="btn-inner--icon"><i class="fas fa-reply"></i></span>
                    <span class="btn-inner--text">Kembali</span>
                </a>
                </form>
            </div>



            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->