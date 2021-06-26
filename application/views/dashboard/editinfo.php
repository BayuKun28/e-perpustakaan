        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
            <div class="card">
                <div class="card-body ">
                    <?= $this->session->flashdata('message'); ?>
                    <form method="post" action="<?= base_url('dashboard/editinfo') ?>">
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="catatan">Catatan</label>
                                <?php foreach ($mading as $m) : ?>
                                <textarea class="form-control" id="isian" name="isian" rows="3" required="true"><?= $m['isi']; ?></textarea>
                                <?php endforeach; ?>
                            </div>
                        </div>

                </div>
            </div>
            <br>

            <div class="text-right">
                <a href=" <?= base_url('dashboard') ?>" class="btn btn-sm btn-danger btn-round btn-icon" data-toggle="tooltip" data-original-title="Tambah Data">
                    <span class="btn-inner--icon"><i class="fas fa-reply"></i></span>
                    <span class="btn-inner--text">Kembali</span>
                </a>
                <button type="submit" class="btn btn-sm btn-success btn-round btn-icon" data-toggle="tooltip" data-original-title="Tambah Data">
                    <span class="btn-inner--icon"><i class="fas fa-check"></i></span>
                    <span class="btn-inner--text">Simpan</span>
                </button>
            </div>


            </form>
        </div>



        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->