        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 col">
                    <div class="row">
                        <h6 class="m-0 font-weight-bold text-primary col-sm-12 col-md-8 ">Daftar Pengembalian Di Perpustakaan</h6>
                        <div class=" col-sm-12 col-md-4 text-right">
                            <a href="<?= base_url('transaksi/kembaliadd'); ?>" class="btn btn-sm btn-success btn-round btn-icon" data-toggle="tooltip" data-original-title="Tambah Data">
                                <span class="btn-inner--icon"><i class="fas fa-user-edit"></i></span>
                                <span class="btn-inner--text">Tambah</span>
                            </a>
                            <button class="btn btn-sm btn-round btn-icon btn-info" data-toggle="tooltip" data-original-title="Segarkan Data">
                                <span class=" btn-inner--icon"><i class="fas fa-reply"></i></span>
                                <span class="btn-inner--text">Refresh</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Peminjam</th>
                                    <th>Buku Yang Dipinjam</th>
                                    <th>Tanggal Peminjaman</th>
                                    <th>Tanggal Seharusnya Kembali</th>
                                    <th>Catatan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($pinjam as $p) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $p['nama_peminjam']; ?></td>
                                        <td><?= $p['nama_buku']; ?></td>
                                        <td><?= $p['tanggal_pinjam']; ?></td>
                                        <td><?= $p['tanggal_harus_kembali']; ?></td>
                                        <td><?= $p['catatan']; ?></td>
                                        <td>
                                            <a href="<?= base_url('transaksi/detailkembali/') . $p['id']; ?>" class="badge badge-warning">Detail</a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
        <script>
            function sweet() {
                swal("Good job!", "You clicked the button!", "success");
            }
        </script>