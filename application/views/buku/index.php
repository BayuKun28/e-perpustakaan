        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 col">
              <div class="row">
                <h6 class="m-0 font-weight-bold text-primary col-sm-12 col-md-8 ">Daftar Buku Di Perpustakaan</h6>
                <div class=" col-sm-6 col-md-4 text-right">
                  <a class="btn btn-sm btn-warning btn-round btn-icon" data-toggle="modal" data-target="#qrscanmodal">
                    <span class="btn-inner--icon"><i class="fas fa-danger"></i></span>
                    <span class="btn-inner--text"><font color="white"> Scan QR </font> </span>
                  </a>
                  <a href="<?= base_url('buku/export'); ?>" class="btn btn-sm btn-danger btn-round btn-icon" data-toggle="tooltip" target="blamk" data-original-title="Tambah Data">
                    <span class="btn-inner--icon"><i class="fas fa-file-pdf"></i></span>
                    <span class="btn-inner--text">Cetak</span>
                  </a>
                  <a href="<?= base_url('buku/addbuku'); ?>" class="btn btn-sm btn-success btn-round btn-icon" data-toggle="tooltip" data-original-title="Tambah Data">
                    <span class="btn-inner--icon"><i class="fas fa-user-edit"></i></span>
                    <span class="btn-inner--text">Tambah</span>
                  </a>
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
                      <th>QRCODE</th>
                      <th>Nama Buku</th>
                      <th>Pengarang</th>
                      <th>Penerbit</th>
                      <th>Tahun</th>
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
                        <td>
                          <?php
                            // $kode = base_url() ."/buku/edit/".$b['id'];
                            $kode = $b['id'];
                            require_once('assets/qrcode/qrlib.php');
                            QRcode::png($kode,"files/qrcode/kode".$i.".png","M",2,2);
                          ?>
                          <img src="<?= base_url(); ?>files/qrcode/kode<?= $i ?>.png" alt="">
                        </td>
                        <td><?= $b['nama_buku']; ?></td>
                        <td><?= $b['pengarang']; ?></td>
                        <td><?= $b['penerbit']; ?></td>
                        <td><?= $b['tahun']; ?></td>
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
<div class="modal fade" id="qrscanmodal" tabindex="-1" role="dialog" aria-labelledby="qrscanmodalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="qrscanmodalLabel">SCAN QR</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
                            <form>
                                <div class="form-row">
                                    <div class="col">
                                    <video id="preview" width="100%" class="rounded"></video>
                                    </div>
                                </div>
                                <div class="col">
                                        <b><label for="text">Result</label></b>
                                        <input type="text" class="form-control " placeholder="" id="text" name="text" readonly="true">
                                </div>
                            </form>
                        </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary"  id="oncam" >Close</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closecam" >Close</button>
      </div>
    </div>
  </div>
</div>


<script>
    let scanner = new Instascan.Scanner({
     video: document.getElementById('preview')
    });

    scanner.addListener('scan',function(content){
        // alert(content);
        window.open(document.getElementById('text').value=content);
        scanner.stop();
    });

    Instascan.Camera.getCameras().then(function(cameras){
    if(cameras.length > 0){
        scanner.start(cameras[0]);
    } else {
        alert('No Cameras Found');
    }
    
    }).catch(function(e){
       console.error(e);
    });
</script>