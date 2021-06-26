        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
            <div class="card">

                <div class="card-body ">

                    <form>
                        <div class="form-row">
                            <div class="col">
                                <b><label for="judul_buku">Judul Buku</label></b>
                                <input type="text" class="form-control" placeholder="Judul Buku" id="judul_buku" name="judul_buku" disabled value="<?= $detail['nama_buku'] ?>">

                            </div>
                            <div class="col">
                                <b><label for="supplier">Nama Supplier</label></b>
                                <input type="text" class="form-control" placeholder="Nama Supplier" id="Nama_supplier" name="supplier" disabled value="<?= $detail['nama_supplier'] ?>">

                            </div>
                        </div><br>
                        <div class="form-row">
                            <div class="col">
                                <b><label for="pengarang">Nama Pengarang</label></b>
                                <input type="text" class="form-control" placeholder="Pengarang" id="pengarang" name="pengarang" disabled value="<?= $detail['pengarang'] ?>">


                            </div>
                            <div class="col">
                                <b><label for="penerbit">Nama Penerbit</label></b>
                                <input type="text" class="form-control" placeholder="Penerbit" id="penerbit" name="penerbit" disabled value="<?= $detail['penerbit'] ?>">


                            </div>
                        </div><br>
                        <div class="form-row">
                            <div class="col-6">
                                <b><label for="tahun">Tahun Terbit</label></b>
                                <input type="text" class="form-control" placeholder="Tahun" id="tahun" name="tahun" disabled value="<?= $detail['tahun'] ?>">


                            </div>
                            <div class="col">
                                <b><label for="status">Status Buku</label></b>
                                <input type="text" class="form-control" placeholder="Status Buku" id="Status" name="status" disabled value="<?= $detail['status'] ?>">

                            </div>
                        </div><br>
                        <div class="form-row">
                            <div class="col-lg-6">
                                <b><label for="ket">Keterangan Buku</label></b>
                                <input type="text" class="form-control" placeholder="Keterangan Buku" id="ket" name="ket" disabled value="<?= $detail['ket'] ?>">

                            </div>
                        </div>
                </div>
            </div>
            <br>
            <div class="text-right">
                <a href=" <?= base_url('buku') ?>" class="btn btn-sm btn-danger btn-round btn-icon" data-toggle="tooltip" data-original-title="Tambah Data">
                    <span class="btn-inner--icon"><i class="fas fa-reply"></i></span>
                    <span class="btn-inner--text">Kembali</span>
                </a>
            </div>
            </form>


            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->