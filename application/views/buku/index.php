        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 col">
              <div class="row">
                <h6 class="m-0 font-weight-bold text-primary col-sm-12 col-md-8 ">Daftar Buku Di Perpustakaan</h6>
                <div class=" col-sm-12 col-md-4 text-right">
                  <a href="<?= base_url('buku/export'); ?>" class="btn btn-sm btn-danger btn-round btn-icon" data-toggle="tooltip" target="blamk" data-original-title="Tambah Data">
                    <span class="btn-inner--icon"><i class="fas fa-file-pdf"></i></span>
                    <span class="btn-inner--text">Cetak</span>
                  </a>
                  <a href="<?= base_url('buku/addbuku'); ?>" class="btn btn-sm btn-success btn-round btn-icon" data-toggle="tooltip" data-original-title="Tambah Data">
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
              <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
              <?php if ($this->session->flashdata('message')) : ?>
              <?php endif; ?>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama Buku</th>
                      <th>Pengarang</th>
                      <th>Penerbit</th>
                      <th>Tahun</th>
                      <th>Supplier</th>
                      <th>Keterangan</th>
                      <th>Status</th>
                      <th>Stok</th>
                      <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($buku as $b) : ?>
                      <tr>
                        <td><?= $i; ?></td>
                        <td><?= $b['nama_buku']; ?></td>
                        <td><?= $b['pengarang']; ?></td>
                        <td><?= $b['penerbit']; ?></td>
                        <td><?= $b['tahun']; ?></td>
                        <td><?= $b['nama_supplier']; ?></td>
                        <td><?= $b['ket']; ?></td>
                        <td><?= $b['status']; ?></td>
                        <td><?= $b['stok']; ?></td>
                        <td>
                          <a href="<?= base_url('buku/detail/') . $b['id']; ?>" class="badge badge-warning ">Detail</a>
                          <a href="<?= base_url('buku/edit/') . $b['id']; ?>" class="badge badge-success" >edit</a>
                          <a data-kode="<?= $b['id']; ?>"  href='javascript:void(0)' class="del_buku badge badge-danger ">delete</a>
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