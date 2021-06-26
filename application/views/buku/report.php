<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title><?= $title; ?></title>
   <link href="<?= base_url('sb-admin') ?>/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
   <div class="row">
      <div class="col text-center">
         <center> <h3 class="h3 text-dark"><?= $title; ?></h3></center>
         <!-- <h4 class="h4 text-dark "><strong><?= $perusahaan->nama_perusahaan ?></strong></h4> -->
      </div>
   </div>
   <hr>
   <div class="row">
      <table border="1" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
         <thead>
            <tr>
               <td align="center">No</td>
               <td align="center">Nama Buku</td>
               <td align="center">Pengarang</td>
               <td align="center">Penerbit</td>
               <td align="center">Tahun</td>
               <td align="center">Supplier</td>
               <td align="center">Keterangan</td>
               <td align="center">Stok</td>  
            </tr>
         </thead>
         <tbody>
            <?php $i = 1; ?>
                    <?php foreach ($buku as $b) : ?>
                      <tr>
                        <td align="center"><?= $i; ?></td>
                        <td ><?= $b['nama_buku']; ?></td>
                        <td ><?= $b['pengarang']; ?></td>
                        <td ><?= $b['penerbit']; ?></td>
                        <td align="center"><?= $b['tahun']; ?></td>
                        <td ><?= $b['nama_supplier']; ?></td>
                        <td align="center"><?= $b['ket']; ?></td>
                        <td align="center"><?= $b['stok']; ?></td>
                      </tr>
                      <?php $i++; ?>
                    <?php endforeach ?>
         </tbody>
         </table>
   </div>
</body>
</html>