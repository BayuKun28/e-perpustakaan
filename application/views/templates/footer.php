<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; SIPerpus <?= date('Y'); ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
<!-- <script src="htpps://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
 --><script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
<!-- Page level plugins -->
<script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>
<script src="<?= base_url('assets/'); ?>js/sweetalert/dist/sweetalert2.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/bootstrap-datepicker.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> -->

<script>
tinymce.init({
selector: “textarea#elm1”,
theme: “modern”,
plugins: [
“advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker”,
“searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking”,
“save table contextmenu directionality emoticons template paste textcolor importcss colorpicker textpattern”
],
external_plugins: {
//”moxiemanager”: “/moxiemanager-php/plugin.js”
},
content_css: “css/development.css”,
add_unload_trigger: false,
toolbar: “insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons table”,
image_advtab: true,
style_formats: [
{title: ‘Bold text’, format: ‘h1’},
{title: ‘Red text’, inline: ‘span’, styles: {color: ‘#ff0000’}},
{title: ‘Red header’, block: ‘h1’, styles: {color: ‘#ff0000’}},
{title: ‘Example 1’, inline: ‘span’, classes: ‘example1’},
{title: ‘Example 2’, inline: ‘span’, classes: ‘example2’},
{title: ‘Table styles’},
{title: ‘Table row 1’, selector: ‘tr’, classes: ‘tablerow1’}
],
template_replace_values : {
username : “Jack Black”
},
template_preview_replace_values : {
username : “Preview user name”
},
link_class_list: [
{title: ‘Example 1’, value: ‘example1’},
{title: ‘Example 2’, value: ‘example2’}
],
image_class_list: [
{title: ‘Example 1’, value: ‘example1’},
{title: ‘Example 2’, value: ‘example2’}
],
templates: [
{title: ‘Some title 1’, description: ‘Some desc 1’, content: ‘<strong class=”red”>My content: {$username}</strong>’},
{title: ‘Some title 2’, description: ‘Some desc 2’, url: ‘development.html’}
],
setup: function(ed) {
/*ed.on(
‘Init PreInit PostRender PreProcess PostProcess BeforeExecCommand ExecCommand Activate Deactivate ‘ +
‘NodeChange SetAttrib Load Save BeforeSetContent SetContent BeforeGetContent GetContent Remove Show Hide’ +
‘Change Undo Redo AddUndo BeforeAddUndo’, function(e) {
console.log(e.type, e);
});*/
},
spellchecker_callback: function(method, data, success) {
if (method == “spellcheck”) {
var words = data.match(this.getWordCharPattern());
var suggestions = {};
for (var i = 0; i < words.length; i++) {
suggestions[words[i]] = [“First”, “second”];
}
success({words: suggestions, dictionary: true});
}
if (method == “addToDictionary”) {
success();
}
}
});
</script>


<script type="text/javascript">
    $('.itemNamebuku').select2({
        ajax: {
            url: "<?= base_url(); ?>/transaksi/getdatabuku",
            dataType: "json",
            delay: 250,
            data: function(params) {
                return {
                    buk: params.term
                };
            },
            processResults: function(data) {
                var results = [];
                $.each(data, function(index, item) {
                    results.push({
                        id: item.id,
                        text: item.nama_buku
                    });
                });
                return {
                    results: results
                }
            }
        }
    });
</script>
<script type="text/javascript">
    $('.itemNamepeminjam').select2({
        ajax: {
            url: "<?= base_url(); ?>/transaksi/getdatapeminjam",
            dataType: "json",
            delay: 250,
            data: function(params) {
                return {
                    peminjam: params.term
                };
            },
            processResults: function(data) {
                var results = [];
                $.each(data, function(index, item) {
                    results.push({
                        id: item.id,
                        text: item.name
                    });
                });
                return {
                    results: results
                }
            }
        }
    });
</script>


<script type="text/javascript">
    

$(document).on('click', '.del_buku', function(event) {
          event.preventDefault();
          let kode = $(this).attr('data-kode');
          let delete_url = "<?= base_url(); ?>/buku/delete/" + kode;


            Swal.fire({
                title: 'Hapus Buku',
                text: "Apakah Anda Yakin Ingin Menghapus Data Ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then(async (result) => {
                if(result.value) {
                  window.location.href = delete_url;
                }
            });
        });

</script>


<script type="text/javascript">
$(document).on('click', '.del_sup', function(event) {
          event.preventDefault();
          let kode = $(this).attr('data-kode');
          let delete_url = "<?= base_url(); ?>/supplier/delete/" + kode;


            Swal.fire({
                title: 'Hapus Supplier',
                text: "Apakah Anda Yakin Ingin Menghapus Data Ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then(async (result) => {
                if(result.value) {
                  window.location.href = delete_url;
                }
            });
        });

</script>


  <?php 
       if (!empty($this->session->flashdata('message'))){
           $pesan = $this->session->flashdata('message');
                if($pesan == "Berhasil"){
                    // die($pesan);
                $script = "
                    <script>
                            Swal.fire({
                              icon: 'success',
                              title: 'Data',
                              text: 'Data Berhasil Ditambah'
                            }) 
                    </script>
                ";             
            }elseif($pesan == "Berhasil Dihapus"){
                    // die($pesan);
                $script = "
                    <script>
                            Swal.fire({
                              icon: 'success',
                              title: 'Data',
                              text: 'Berhasil Dihapus'
                            }) 
                    </script>
                ";
                } 

            elseif($pesan == "Berhasil Di Update"){
                    // die($pesan);
                $script = "
                    <script>
                            Swal.fire({
                              icon: 'success',
                              title: 'Data',
                              text: 'Berhasil Di Update'
                            }) 
                    </script>
                ";
                }    

            else
            {
                $script = 
                    "
                    <script>
                                Swal.fire({
                                  icon: 'error',
                                  title: 'Buku',
                                  text: 'Gagal'
                                }) 

                    </script>
                    ";
            }
        }else{
            $script = "";
        } 
        echo $script;
    ?>
    

<!-- <script type="text/javascript">
    
    const flashData = $('.flash-data').data('flashdata');

    if (flashData) {
        Swal({

            title:'Data Buku',
            text:'Berhasil' + flashData,
            type:'success'

        });
    }

</script> -->

<!-- <script type="text/javascript">
          $('#databuku').on('click','.hapus-buku', function (e) {
            e.preventDefault();
            var id =  $(this).data('id');
            swal({
                title: 'Konfirmasi',
                text: "Anda ingin menghapus ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                cancelButtonText: 'Tidak',
                reverseButtons: true
              }).then((result) => {
                if (result.value) {
                  $.ajax({
                    url:"<?=base_url('/buku/delete')?>",  
                    method:"post",
                    beforeSend :function () {
                    swal({
                        title: 'Menunggu',
                        html: 'Memproses data',
                        onOpen: () => {
                          swal.showLoading()
                        }
                      })      
                    },    
                    data:{id:id},
                    success:function(data){
                      swal(
                        'Hapus',
                        'Berhasil Terhapus',
                        'success'
                      )
                      databuku.ajax.reload(null, false)
                    }
                  })
              } else if (result.dismiss === swal.DismissReason.cancel) {
                  swal(
                    'Batal',
                    'Anda membatalkan penghapusan',
                    'error'
                  )
                }
              })
            });
    
</script> -->



<script type="text/javascript">
    $(".remove").click(function(){
        var id = $(this).parents("tr").attr("id");
    
       swal({
        title: "Are you sure?",
        text: "You will not be able to recover this imaginary file!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel plx!",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm) {
        if (isConfirm) {
          $.ajax({
             url: '/buku/delete'+id,
             type: 'DELETE',
             error: function() {
                alert('Something is wrong');
             },
             success: function(data) {
                  $("#"+id).remove();
                  swal("Deleted!", "Your imaginary file has been deleted.", "success");
             }
          });
        } else {
          swal("Cancelled", "Your imaginary file is safe :)", "error");
        }
      });
     
    });
    
</script>
</body>

</html>