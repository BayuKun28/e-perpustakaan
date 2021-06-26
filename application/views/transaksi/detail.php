        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
            <div class="card">
                <div class="card-body ">
                    <?= $this->session->flashdata('message'); ?>
                    <form">
                        <div class="form-row">
                            <div class="col">
                                <b><label for="nama_peminjam">Nama Peminjam</label></b>
                                <input type="text" class="form-control" placeholder="Nama Peminjam" id="nama_peminjam" name="nama_peminjam" disabled value="<?= $detail['nama_peminjam'] ?>">
                                <?= form_error('nama_peminjam', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col">
                                <b><label for="nama_buku">Nama Buku</label></b><br>
                                <input type="text" class="form-control" placeholder="Nama Buku" id="nama_buku" name="nama_buku" disabled value="<?= $detail['nama_buku']; ?>">
                                <?= form_error('nama_buku', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div><br>
                        <div class="form-row">

                            <div class="col">
                                <b><label for="tanggal_pinjam">Tanggal Pinjam</label></b>
                                <input type="text" class="form-control" placeholder="Tanggal Pinjam" id="tanggal_pinjam" name="tanggal_pinjam" disabled value="<?= $detail['tanggal_pinjam']; ?>">
                                <?= form_error('tanggal_pinjam', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col">
                                <b><label for="tanggal_harus_kembali">Tanggal Harus Kembali</label></b>
                                <input type="text" class="form-control" placeholder="Tanggal Harus Kembali" id="tanggal_harus_kembali" name="tanggal_harus_kembali" disabled value="<?= $detail['tanggal_harus_kembali']; ?>">
                                <?= form_error('tanggal_harus_kembali', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div><br>
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="catatan">Catatan</label>
                                <textarea class="form-control" id="catatan" name="catatan" rows="3" readonly="true"><?= $detail['catatan']; ?></textarea>
                            </div>
                        </div>

                </div>
            </div>
            <br>

            <div class="text-right">
                <a href=" <?= base_url('transaksi/peminjaman') ?>" class="btn btn-sm btn-danger btn-round btn-icon" data-toggle="tooltip" data-original-title="Tambah Data">
                    <span class="btn-inner--icon"><i class="fas fa-reply"></i></span>
                    <span class="btn-inner--text">Kembali</span>
                </a>
            </div>

            </form">
        </div>



        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->