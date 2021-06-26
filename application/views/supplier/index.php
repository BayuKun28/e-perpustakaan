        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 col">
                    <div class="row">
                        <h6 class="m-0 font-weight-bold text-primary col-sm-12 col-md-8 ">Daftar Supplier Perpustakaan</h6>
                        <div class=" col-sm-12 col-md-4 text-right">
                            <a href="<?= base_url('supplier/addsup'); ?>" class="btn btn-sm btn-success btn-round btn-icon" data-toggle="tooltip" data-original-title="Tambah Data">
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
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Supplier</th>
                                    <th>Alamat</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($supplier as $s) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $s['nama_supplier']; ?></td>
                                        <td><?= $s['alamat']; ?></td>
                                        <td><?= $s['ket']; ?></td>
                                        <td>
                                            <a href="<?= base_url('supplier/detail/') . $s['id']; ?>" class="badge badge-warning">Detail</a>
                                            <a href="<?= base_url('supplier/edit/') . $s['id']; ?>" class="badge badge-success" onclick="swal()">edit</a>
                                            <a data-kode="<?= $s['id']; ?>"  href='javascript:void(0)' class="del_sup badge badge-danger ">delete</a>
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