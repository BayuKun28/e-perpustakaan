        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
            <div class="card">

                <div class="card-body ">
                    <?= $this->session->flashdata('message'); ?>
                    <form id="pinjamanadd" method="post" action="<?= base_url('transaksi/pinjamadd'); ?>">
                        <div class="form-row">
                            <div class="col">
                                <b><label for="nama_peminjam">Nama Peminjam</label></b>
                                <!-- <input type="text" class="form-control form-control-user" id="nama_peminjam" name="nama_peminjam" placeholder="Masukan Nama Peminjam"> -->
                                <br> <select class="form-control itemNamepeminjam form-control-user" id="nama_peminjam" name="nama_peminjam">
                                </select>
                                <?= form_error('nama_peminjam', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col">
                                <b><label for="nama_buku">Nama Buku</label></b><br>
                                <select class="form-control itemNamebuku" id="nama_buku" name="nama_buku">
                                </select>
                                <?= form_error('nama_buku', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div><br>
                        <div class="form-row">

                            <div class="col">
                                <b><label for="tanggal_pinjam">Tanggal Pinjam</label></b>
                                <input type="date" name="tanggal_pinjam" class="form-control tanggal" />
                                <?= form_error('tanggal_pinjam', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col">
                                <b><label for="tanggal_harus_kembali">Tanggal Harus Kembali</label></b>
                                <input type="date" name="tanggal_harus_kembali" class="form-control tanggal" />
                                <?= form_error('tanggal_harus_kembali', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div><br>
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="catatan">Catatan</label>
                                <textarea class="form-control" id="catatan" name="catatan" rows="3"></textarea>
                            </div>
                        </div>

                </div>
            </div>
            <br>

            <div class="text-right">
                <button type="submit" class="btn btn-sm btn-success btn-round btn-icon" data-toggle="tooltip" data-original-title="Tambah Data">
                    <span class="btn-inner--icon"><i class="fas fa-user-edit"></i></span>
                    <span class="btn-inner--text">Pinjam</span>
                </button>
                <a href=" <?= base_url('transaksi/peminjaman') ?>" class="btn btn-sm btn-danger btn-round btn-icon" data-toggle="tooltip" data-original-title="Tambah Data">
                    <span class="btn-inner--icon"><i class="fas fa-reply"></i></span>
                    <span class="btn-inner--text">Kembali</span>
                </a>
            </div>

            </form>
        </div>



        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->