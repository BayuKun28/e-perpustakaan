        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
            <div class="card">

                <div class="card-body ">

                    <form>
                        <div class="form-row">
                            <div class="col">
                                <b><label for="nama_supplier">Nama Supplier</label></b>
                                <input type="text" class="form-control" placeholder="Nama Supplier" id="nama_supplier" name="nama_supplier" disabled value="<?= $detail['nama_supplier'] ?>">

                            </div>
                            <div class="col">
                                <b><label for="alamat">Alamat</label></b>
                                <input type="text" class="form-control" placeholder="Alamat Supplier" id="alamat" name="alamat" disabled value="<?= $detail['alamat'] ?>">

                            </div>
                        </div><br>
                        <div class="form-row">
                            <div class="col-lg-6">
                                <b><label for="ket">Keterangan</label></b>
                                <input type="text" class="form-control" placeholder="ket" id="ket" name="ket" disabled value="<?= $detail['ket'] ?>">
                            </div>
                        </div>
                </div>
            </div>
            <div class="text-right">
                <a href=" <?= base_url('supplier') ?>" class="btn btn-sm btn-danger btn-round btn-icon" data-toggle="tooltip" data-original-title="Tambah Data">
                    <span class="btn-inner--icon"><i class="fas fa-reply"></i></span>
                    <span class="btn-inner--text">Kembali</span>
                </a>
            </div>
            <br>
        </div>
        </form>


        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->