        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
            <div class="card">

                <div class="card-body ">
                    <?= $this->session->flashdata('message'); ?>
                    <form method="post" action="<?= base_url('supplier/edit/') . $detail['id']; ?>">
                        <div class="form-row">
                            <div class="col">
                                <b><label for="nama_supplier">Nama Supplier</label></b>
                                <input type="text" class="form-control" placeholder="Nama Supplier" id="nama_supplier" name="nama_supplier" value="<?= $detail['nama_supplier']; ?>">
                                <?= form_error('nama_supplier', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col">
                                <b><label for="alamat">Alamat</label></b>
                                <input type="text" class="form-control" placeholder="Alamat Supplier" id="alamat" name="alamat" value="<?= $detail['alamat']; ?>">
                                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div><br>
                        <div class="form-row">
                            <div class="col-lg-6">
                                <b><label for="keterangan">Keterangan</label></b>
                                <select class="form-control" id="ket" name="ket">
                                    <option <?= $detail['ket']; ?>><?= $detail['ket']; ?></option>
                                    <option value="Sumbangan">Sumbangan</option>
                                    <option value="Pembelian">Pembelian</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                                <?= form_error('ket', '<small class="text-danger pl-3">', '</small>'); ?>

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
                <a href=" <?= base_url('supplier') ?>" class="btn btn-sm btn-danger btn-round btn-icon" data-toggle="tooltip" data-original-title="Tambah Data">
                    <span class="btn-inner--icon"><i class="fas fa-reply"></i></span>
                    <span class="btn-inner--text">Kembali</span>
                </a>
            </div>

            </form>
        </div>



        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->