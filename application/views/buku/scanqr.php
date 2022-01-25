        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
            <div class="card">

                <div class="card-body">
                    <form>
                        <div class="form-row">
                            <div class="col-3">
                            <video id="preview" width="100%"></video>
                            </div>
                            <div class="col-3">
                                <b><label for="text">Result</label></b>
                                <input type="text" class="form-control " placeholder="text" id="text" name="text">
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

<!-- <script>
    let scanner = new Instascan.Scanner({
     video: document.getElementById('preview')
    });

    scanner.addListener('scan',function(content){
        // alert(content);
        window.open(document.getElementById('text').value=content);
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


</script> -->

<script type="text/javascript">
    
    $(document).ready(function(){
        $('#text').autocomplete({
            source : "<?= site_url('buku/autofillqr/?')?>",
            select : function(event, ui{
                ('[name=namabuku]').val(ui.item.nama_buku);
            })
        })
    })


</script>