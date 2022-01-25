        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
            <div class="card">

                <div class="card-body">
                    <form>
                        <div class="form-row">
                            <div class="col-3">
                            <video id="preview" width="100%" rounded="true"></video>
                            </div>
                            <div class="col-3">
                                <!-- <b><label for="text">Result</label></b> -->
                                <input type="text" class="form-control " placeholder="text" id="text" name="text" hidden="true">
                            </div>
                            
                        </div>
                    </form>

                    <div class="form-row">
                            <div class="col-6">
                                <b><label for="text">Nama Buku</label></b>
                                <input type="text" class="form-control " placeholder="" id="namabuku" name="namabuku">
                            </div>
                            <div class="col-6">
                                <b><label for="text">Pengarang</label></b>
                                <input type="text" class="form-control " placeholder="" id="pengarang" name="pengarang">
                            </div>
                            <div class="col-6">
                                <b><label for="text">Penerbit</label></b>
                                <input type="text" class="form-control " placeholder="" id="penerbit" name="penerbit">
                            </div>
                            
                    </div>
                </div>


        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

<script>
    let scanner = new Instascan.Scanner({
     video: document.getElementById('preview')
    });

    scanner.addListener('scan',function(content){
        // alert(content);
        // window.open(document.getElementById('text').value=content);
        document.getElementById('text').value=content;
        var idbuku = document.getElementById('text').value;
        $.ajax({
                       url:"<?php echo site_url('transaksi/getbukuqr');?>",
                       type:"POST",
                       data:'&idbuku='+idbuku,
                       success:function(data){
                           var hasil = JSON.parse(data);  
                     
            $.each(hasil, function(key,val){ 
                           document.getElementById('namabuku').value=val.nama_buku;
                           document.getElementById('pengarang').value=val.pengarang;
                           document.getElementById('penerbit').value=val.penerbit;
                });
            }
                   });
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

<!-- <script type="text/javascript">
function autofill(){   
    var idbuku = document.getElementById('text').value;
        $.ajax({
                       url:"<?php echo site_url('transaksi/getbukuqr');?>",
                       data:'&idbuku='+idbuku,
                       success:function(data){
                           var hasil = JSON.parse(data);  
                     
            $.each(hasil, function(key,val){ 
                           document.getElementById('namabuku').value=val.nama_buku;
                           document.getElementById('pengarang').value=val.pengarang;
                           document.getElementById('penerbit').value=val.penerbit;
                });
            }
                   });
    };

</script> -->