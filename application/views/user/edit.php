<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('message'); ?>

    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><b><?= $user['name']; ?></b></h5>
                    <p class="card-text"><?= $user['email']; ?></p>
                    <p class="card-text"><small class="text-muted">Member Since <?= date('d F Y', $user['date_created']); ?> </small></p>
                </div>
            </div>
        </div>
    </div>

    <form method="post" action="<?= base_url('user/edit'); ?>">
        <div class="form-row">
            <div class="col">
                <b><label for="nama">Nama </label></b>
                <input type="text" class="form-control" placeholder="Tulis Nama" id="nama" name="nama" value="<?= $user['name']; ?>">
                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="col">
                <b><label for="email">Email</label></b>
                <input type="text" class="form-control" placeholder="Tulis Email" id="email" name="email" value="<?= $user['email']; ?>">
                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
        </div><br>
        <div class="form-row">
            <div class="col">
                <b><label for="role">Akses</label></b>
                <select class="form-control" id="role" name="role">
                    <option value="<?php if ($user['role_id'] == 1) {
                                        echo '1';
                                    } elseif ($user['role_id'] == 2) {
                                        echo '2';
                                    } elseif ($user['role_id'] == 3) {
                                        echo '3';
                                    } ?>"><?php if ($user['role_id'] == 1) {
                                                echo 'Administrator';
                                            } elseif ($user['role_id'] == 2) {
                                                echo 'Member';
                                            } elseif ($user['role_id'] == 3) {
                                                echo 'Pengunjung';
                                            } ?></option>
                    <?php foreach ($role as $r) : ?>
                        <option value="<?= $r['id']; ?>"><?= $r['role']; ?></option>
                    <?php endforeach; ?>
                </select>
                <?= form_error('role', '<small class="text-danger pl-3">', '</small>'); ?>

            </div>
            <div class="col">
                <b><label for="aktif">Is Active</label></b>
                <select class="form-control" id="aktif" name="aktif">
                    <option value="<?php if ($user['is_active'] == 1) {
                                        echo '1';
                                    } else {
                                        echo '2';
                                    } ?>"><?php if ($user['is_active'] == 1) {
                                                echo 'Aktif';
                                            } else {
                                                echo 'Tidak Aktif';
                                            } ?></option>
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                </select>
                <?= form_error('aktif', '<small class="text-danger pl-3">', '</small>'); ?>

            </div>
        </div>

        <br>
        <div class="text-right">
            <button type="submit" class="btn btn-sm btn-success btn-round btn-icon" data-toggle="tooltip" data-original-title="Update Profile">
                <span class="btn-inner--icon"><i class="fas fa-user-edit"></i></span>
                <span class="btn-inner--text">Update Profile</span>
            </button>
            <a href=" <?= base_url('buku') ?>" class="btn btn-sm btn-danger btn-round btn-icon" data-toggle="tooltip" data-original-title="Tambah Data">
                <span class="btn-inner--icon"><i class="fas fa-reply"></i></span>
                <span class="btn-inner--text">Kembali</span>
            </a>
        </div>
    </form>

    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->