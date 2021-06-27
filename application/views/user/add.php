<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('message'); ?>
    <form method="post" action="<?= base_url('user/add'); ?>">
        <div class="form-row">
            <div class="col">
                <b><label for="nama">Nama </label></b>
                <input type="text" class="form-control" placeholder="Tulis Nama" id="name" name="name" value="<?= set_value('name') ?>">
                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="col">
                <b><label for="email">Email</label></b>
                <input type="text" class="form-control" placeholder="Tulis Email" id="email" name="email" value="<?= set_value('email') ?>">
                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
        </div><br>
        <div class="form-row">
            <div class="col">
                <b><label for="role">Akses</label></b>
                <select class="form-control" id="role" name="role">
                    <?php foreach ($role as $r) : ?>
                        <option value="<?= $r['id']; ?>"><?= $r['role']; ?></option>
                    <?php endforeach; ?>
                </select>
                <?= form_error('role', '<small class="text-danger pl-3">', '</small>'); ?>

            </div>
            <div class="col">
                <b><label for="aktif">Is Active</label></b>
                <select class="form-control" id="aktif" name="aktif">
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                </select>
                <?= form_error('aktif', '<small class="text-danger pl-3">', '</small>'); ?>

            </div>
        </div><br>
        <div class="form-row">
            <div class="col">
                <b><label for="password">Password</label></b>
                <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password" value="<?= set_value('password1') ?>">
                <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class=" col">
                <b><label for="password2">Ulangi Password</label></b>
                <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
            </div>
        </div>
        <br>
        <div class="text-right">
            <button type="submit" class="btn btn-sm btn-success btn-round btn-icon" data-toggle="tooltip" data-original-title="Update Profile">
                <span class="btn-inner--icon"><i class="fas fa-user-edit"></i></span>
                <span class="btn-inner--text">Tambah</span>
            </button>
            <a href=" <?= base_url('dashboard') ?>" class="btn btn-sm btn-danger btn-round btn-icon" data-toggle="tooltip" data-original-title="Tambah Data">
                <span class="btn-inner--icon"><i class="fas fa-reply"></i></span>
                <span class="btn-inner--text">Kembali</span>
            </a>
        </div>
    </form>


</div>


<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->