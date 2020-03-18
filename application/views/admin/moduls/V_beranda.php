<?php $title = "<i class='fas fa-home'></i>&nbsp;Beranda"; ?>

<!-- <div id="idImgLoader" style="margin: 0 auto; text-align: center;">

  <img src='<?php echo base_url();?>assetsadmin/img/loader-dark.gif' />

</div>

<div id="data" style="display:none;"> -->



<!-- Boostrap Dialog -->



<div class="col-sm-12 widget-container-col ui-sortable">

                    <div class="widget-box ui-sortable-handle">

                      <div style="margin-top: 15px;" class="widget-header widget-header-small">

                        <h2 class="widget-title smaller">Form Beranda </h2>

                        <ul class="nav nav-tabs" style="margin-top: 15px;" id="myTab">

                            <li class="active">

                              <a data-toggle="tab" href="#home"><i class="fas fa-image" style="margin-right: 5px;"></i>Foto</a>

                            </li>



                            <li>

                              <a data-toggle="tab" href="#profile"><i class="fas fa-table" style="margin-right: 5px;"></i>Data</a>

                            </li>



                          </ul>



                        <!-- #section:custom/widget-box.tabbed -->

                       <!--  <div class="widget-toolbar no-border">

                          <ul class="nav nav-tabs" id="myTab">

                            <li class="active">

                              <a data-toggle="tab" href="#home">Foto</a>

                            </li>



                            <li>

                              <a data-toggle="tab" href="#profile">Data</a>

                            </li>



                          </ul>

                        </div> -->



                        <!-- /section:custom/widget-box.tabbed -->

                      </div>



                      <div class="widget-body">

                        <div class="widget-main padding-6">

                          <div class="tab-content">

                            <div id="home" class="tab-pane in active">

                              <?php //echo form_open_multipart('C_beranda/update1', 'role="form"'); ?>

                              <form class="form-horizontal" role="form" id="formAksi" action="<?php echo base_url('C_beranda/update1') ?>" method="POST" enctype="multipart/form-data">

                              <input type="hidden" name="id_beranda"/> 

                              <div class="form-body">

<!-- form gambar slider -->    

      <div class="form-group" >

        <div class="alert alert-warning text-center">

                                <!-- <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> -->

                                <strong>Peringatan!</strong><br>

            Max Size : 2 MB<br>

            Max Dimension : 2024 x 1468 (px)<br>

            Allowed Image : JPG | PNG

                              </div>

                              <?php if ($this->session->flashdata('berhasil')) { echo '

          <div class="alert alert1 alert-success">

            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

            <strong>Berhasil!</strong> '.$this->session->flashdata('berhasil').'

          </div>

          ';} if ($this->session->flashdata('gagal')) { echo '

            <div class="alert alert1 alert-danger">

            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

            <strong>Gagal!</strong> '.$this->session->flashdata('gagal').'

          </div>

          ';}?>

          <script type="text/javascript">

            window.setTimeout(function() {

                $(".alert1").fadeTo(500, 0).slideUp(500, function(){

                    $(this).remove(); 

                });

            }, 5000);

          </script>

        <!-- <label class="control-label col-md-3"></label>

        <div class="input-group col-md-6">

          <div style="

            width: 100%;

            line-height: 10pt;

            background: #fb0;

            border-radius: 5px;

            padding: 5px;

            font-size: 8pt;

            box-sizing: border-box;

            text-align: center;

          ">

            Max Size : 2 MB<br>

            Max Dimension : 2024 x 1468 (px)<br>

            Allowed Image : JPG | PNG

          </div>

        </div> -->

      </div>

  



  <div class="form-group" >

      <div class="row">

        <div class="col-md-4" align="right">

          <label class="control-label"> Gambar Slider 1  (<?php echo $data_ukuran->ukuran_foto_slider?>)</label>

        </div>

        <div class="col-md-4">

          <input type="file" name="file-upload" id="file-upload">

        </div>

        <div class="col-md-4">

          <img id="preview-upload" src="#" style="height: 100px;border: 1px solid #DDC; " />

          <a href="<?php echo base_url('C_beranda/delete_gambar/1') ?>" class="btn btn-danger" type="button" style="margin-left: 15px;" id="btn_delete" onclick="return confirm('Anda yakin menghapus data?'); return false;">

            <i class="ace-icon fa fa-trash-alt bigger-110"></i>

            Delete

          </a>

          <span class="help-block"></span>

        </div>

      </div>

    </div>



  <div class="form-group" >

      <div class="row">

        <div class="col-md-4" align="right">

          <label class="control-label"> Gambar Slider 2  (<?php echo $data_ukuran->ukuran_foto_slider?>)</label>

        </div>

        <div class="col-md-4">

          <input type="file" name="file-upload2" id="file-upload2">

        </div>

        <div class="col-md-4">

          <img id="preview-upload2" src="#" style="height: 100px;border: 1px solid #DDC; " />

          <a href="<?php echo base_url('C_beranda/delete_gambar/2') ?>" class="btn btn-danger" type="button" style="margin-left: 15px;" id="btn_delete" onclick="return confirm('Anda yakin menghapus data?'); return false;">

            <i class="ace-icon fa fa-trash-alt bigger-110"></i>

            Delete

          </a>        

        </div>

        <span class="help-block"></span>

      </div>

    </div>



  <div class="form-group" >

      <div class="row">

        <div class="col-md-4" align="right">

          <label class="control-label"> Gambar Slider 3  (<?php echo $data_ukuran->ukuran_foto_slider?>)</label>

        </div>

        <div class="col-md-4">

          <input type="file" name="file-upload3" id="file-upload3">

        </div>

        <div class="col-md-4">

          <img id="preview-upload3" src="#" style="height: 100px;border: 1px solid #DDC; " />

          <a href="<?php echo base_url('C_beranda/delete_gambar/3') ?>" class="btn btn-danger" type="button" style="margin-left: 15px;" id="btn_delete" onclick="return confirm('Anda yakin menghapus data?'); return false;">

            <i class="ace-icon fa fa-trash-alt bigger-110"></i>

            Delete

          </a>

          <span class="help-block"></span>

        </div>

      </div>

    </div>



  <div class="form-group" >

      <div class="row">

        <div class="col-md-4" align="right">

          <label class="control-label"> Gambar Slider 4  (<?php echo $data_ukuran->ukuran_foto_slider?>)</label>

        </div>

        <div class="col-md-4">

          <input type="file" name="file-upload4" id="file-upload4">

        </div>

        <div class="col-md-4">

          <img id="preview-upload4" src="#" style="height: 100px;border: 1px solid #DDC; " />

          <a href="<?php echo base_url('C_beranda/delete_gambar/4') ?>" class="btn btn-danger" type="button" style="margin-left: 15px;" id="btn_delete" onclick="return confirm('Anda yakin menghapus data?'); return false;">

            <i class="ace-icon fa fa-trash-alt bigger-110"></i>

            Delete

          </a>

          <span class="help-block"></span>

        </div>

      </div>

    </div>



  <div class="form-group" >

      <div class="row">

        <div class="col-md-4" align="right">

          <label class="control-label"> Gambar Slider 5  (<?php echo $data_ukuran->ukuran_foto_slider?>)</label>

        </div>

        <div class="col-md-4">

          <input type="file" name="file-upload5" id="file-upload5">

        </div>

        <div class="col-md-4">

          <img id="preview-upload5" src="#" style="height: 100px;border: 1px solid #DDC; " />

          <a href="<?php echo base_url('C_beranda/delete_gambar/5') ?>" class="btn btn-danger" type="button" style="margin-left: 15px;" id="btn_delete" onclick="return confirm('Anda yakin menghapus data?'); return false;">

            <i class="ace-icon fa fa-trash-alt bigger-110"></i>

            Delete

          </a>

          <span class="help-block"></span>

        </div>

      </div>

    </div>



  <div class="form-group" >

      <div class="row">

        <div class="col-md-4" align="right">

          <label class="control-label"> Foto Tentang  (<?php echo $data_ukuran->ukuran_foto_tentang?>)</label>

        </div>

        <div class="col-md-4">

          <input type="file" name="foto_tentang" id="foto_tentang">

        </div>

        <div class="col-md-4">

          <img class="img-fluid" id="preview-upload6" src="#" style="height: 100px;border: 1px solid #DDC; " />

          <span class="help-block"></span>

        </div>

      <div class="col-md-offset-6 col-md-8">

        <button class="btn btn-info" type="submit" id="btn_save2">

          <i class="ace-icon fa fa-check bigger-110"></i>

          Submit

        </button>



        &nbsp; &nbsp; &nbsp;

    </div>

      </div>

    </div>

    

                            </div></form></div>



                            <div id="profile" class="tab-pane">

                             <form class="form-horizontal" role="form" id="form"> 

                             <input type="hidden" name="id_beranda"> 

                             <div class="form-body">

                              <div class="alert alert-info text-center">

                                <!-- <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> -->

                                <strong>Info!</strong><br> Di form Jumlah Produk Maksimal Produk adalah <?php echo ($count_max) ?> (Sesuai jumlah produk di tabel tb_produk)

                              </div>

                             <!-- <label class="control-label col-md-3"></label>

                             <div class="input-group col-md-6" style="margin-bottom: 15px;">

                                <div style="

                                  width: 100%;

                                  line-height: 10pt;

                                  background: #33b5e5;

                                  border-radius: 5px;

                                  padding: 5px;

                                  font-size: 11pt;

                                  box-sizing: border-box;

                                  text-align: center;

                                ">

                                  Di form Jumlah Produk Maksimal Produk adalah <?php echo ($count_max) ?>

                                </div>

                              </div>  -->

                             <div class="form-group">

                              <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Keyword </label>

                                <div class="col-sm-10">

                                  <input type="text" id="keyword" name="keyword" placeholder="Keyword" class="col-xs-10 col-sm-9" />

                                </div>

                              </div>

                              

                              <div class="form-group">

                              <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Jumlah Produk </label>

                                <div class="col-sm-10">

                                  <input type="number" max="<?php echo ($count_max) ?>" min="0" id="jumlah_produk" name="jumlah_produk" placeholder="akun Instagram" class="col-xs-10 col-sm-9" />                

                                </div>

                              </div>



                              <div class="form-group">

                              <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Judul Tentang </label>

                                <div class="col-sm-10">

                                  <input type="text" id="judul_tentang" name="judul_tentang" placeholder="akun Facebook" class="col-xs-10 col-sm-9" />

                                </div>

                              </div>



                              <div class="form-group">

                              <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Deskripsi Tentang </label>

                                <div class="col-sm-10">

                                  <textarea class="col-xs-10 col-sm-9"  id="deskripsi_tentang" name="deskripsi_tentang" placeholder="Deskripsi Tentang"></textarea>

                                </div>

                              </div>

                              <div class="form-group">

                              <label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>

                                <div class="col-sm-10">

                                  <button class="btn btn-info" type="button" id="btn_save3" onclick="save2()">

                                      <i class="ace-icon fa fa-check bigger-110"></i>

                                      Submit

                                    </button>



                                    &nbsp; &nbsp; &nbsp;

                                    <button class="btn" type="reset" onclick="return confirm('Anda yakin ingin mereset data?'); return false;">

                                    <i class="ace-icon fa fa-undo bigger-110"></i>

                                      Reset

                                    </button>

                                </div>

                              </div>

                              <!-- <div class="form-group">

                              <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Deskripsi Tentang </label>

                                <div class="col-sm-10">

                                  <textarea  class="col-xs-10 col-sm-9"  id="deskripsi_tentang" name="deskripsi_tentang" placeholder="Deskripsi Tentang"></textarea>

=======

                                <div class="col-sm-8">

                                  <textarea style="height: 50px;" class="col-xs-2 col-sm-9"  id="deskripsi_tentang" name="deskripsi_tentang" placeholder="Deskripsi Tentang"></textarea>

>>>>>>> 539815df68b5ae8d7780eb1f5389391e61739dda

=======

                              <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Deskripsi Tentang </label>

                                <div class="col-sm-8">

                                  <textarea style="height: 50px;" class="col-xs-2 col-sm-9"  id="deskripsi_tentang" name="deskripsi_tentang" placeholder="Deskripsi Tentang"></textarea>

>>>>>>> 539815df68b5ae8d7780eb1f5389391e61739dda

                                </div>

                                <script>CKEDITOR.replace( 'deskripsi_tentang' );</script>

                                <div class="row justify-content-center">

                                  <div class="col-md-offset-2 col-md-9" style="margin-top: 15px;">

                                    <button class="btn btn-info" type="button" id="btn_save3" onclick="save2()">

                                      <i class="ace-icon fa fa-check bigger-110"></i>

                                      Submit

                                    </button>



                                    &nbsp; &nbsp; &nbsp;

                                    <button class="btn" type="reset">

                                    <i class="ace-icon fa fa-undo bigger-110"></i>

                                      Reset

                                    </button>

                                </div>

                              </div>

                              </div> -->





                            </div>                        

                          </form>

                            </div>

                          </div>

                        </div>

                      </div>

                    </div>

                  </div>







<script>

  var save_method;

  var link = "<?php echo site_url('C_beranda')?>";

  var table;

  function ckeditor(){
    tinyMCE.init({
             
              // mode : "textareas",

              mode : "exact",
              elements : "deskripsi_tentang",

                
              // ===========================================
              // Set THEME to ADVANCED
              // ===========================================
                
              theme : "advanced",
                
              // ===========================================
              // INCLUDE the PLUGIN
              // ===========================================
             
              plugins : "jbimages,autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",
                
              // ===========================================
              // Set LANGUAGE to EN (Otherwise, you have to use plugin's translation file)
              // ===========================================
             
              language : "en",
                 
              theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
              theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
              theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
             
              // ===========================================
              // Put PLUGIN'S BUTTON on the toolbar
              // ===========================================
             
              theme_advanced_buttons4 : "jbimages,|,insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
                
              theme_advanced_toolbar_location : "top",
              theme_advanced_toolbar_align : "left",
              theme_advanced_statusbar_location : "bottom",
              theme_advanced_resizing : true,
                
              // ===========================================
              // Set RELATIVE_URLS to FALSE (This is required for images to display properly)
              // ===========================================
             
              relative_urls : false
                
            });
  }

  $(document).ready(function(){

    $('#form-upload').submit(function(e) {

      tinyMCE.triggerSave();

      e.preventDefault(); var formData = new FormData($(this)[0]);

      $.ajax({

        url: $(this).attr("action"), type: 'POST', dataType: 'json', data: formData, async: true,

        beforeSend: function() { $('#btnSave').text('saving...'); $('#btnSave').attr('disabled',true); },

        success: function(response) {

          if(response.status) { swal_berhasil(); update();

          } else { reload_table(); swal_error(response.error); }

        },

        complete: function() { $('#btnSave').text('save'); $('#btnSave').attr('disabled',false); },

        cache: false, contentType: false, processData: false

      });

    });



    function readURL(input) {

      if (input.files && input.files[0]) {

        var rd = new FileReader(); 

        rd.onload = function (e) { $('#preview-upload').attr('src', e.target.result); }; rd.readAsDataURL(input.files[0]);

      }

    }

    $("#file-upload").change(function(){ readURL(this); });



    function readURL2(input) {

      if (input.files && input.files[0]) {

        var rd2 = new FileReader(); 

        rd2.onload = function (e) { $('#preview-upload2').attr('src', e.target.result); }; rd2.readAsDataURL(input.files[0]);

      }

    }

    $("#file-upload2").change(function(){ readURL2(this); });



    function readURL3(input) {

      if (input.files && input.files[0]) {

        var rd3 = new FileReader(); 

        rd3.onload = function (e) { $('#preview-upload3').attr('src', e.target.result); }; rd3.readAsDataURL(input.files[0]);

      }

    }

    $("#file-upload3").change(function(){ readURL3(this); });



    function readURL4(input) {

      if (input.files && input.files[0]) {

        var rd4 = new FileReader(); 

        rd4.onload = function (e) { $('#preview-upload4').attr('src', e.target.result); }; rd4.readAsDataURL(input.files[0]);

      }

    }

    $("#file-upload4").change(function(){ readURL4(this); });



    function readURL5(input) {

      if (input.files && input.files[0]) {

        var rd5 = new FileReader(); 

        rd5.onload = function (e) { $('#preview-upload5').attr('src', e.target.result); }; rd5.readAsDataURL(input.files[0]);

      }

    }

    $("#file-upload5").change(function(){ readURL5(this); });



    function readURL6(input) {

      if (input.files && input.files[0]) {

        var rd6 = new FileReader(); 

        rd6.onload = function (e) { $('#preview-upload6').attr('src', e.target.result); }; rd6.readAsDataURL(input.files[0]);

      }

    }

    $("#foto_tentang").change(function(){ readURL6(this); });

  });

  

  $(document).ready(function(){

    edit();
    setTimeout(function(){
            ckeditor();
      }, 2000);

    });





   

  function Batal() { 

    $('#form-data').slideUp(500,'swing');

    $('#panel-data').fadeIn(1000); 

  }

  

  // function save1() {

  //     $('#btn_save2').text('Saving...');

  //     $('#btn_save2').attr('disabled', true);



      

  //     url = "<?= site_url()?>C_beranda/update1/";

  //     tinyMCE.triggerSave();  



  //     $.ajax({

  //       url: url,

  //       type: "POST",

  //       data: $('#formAksi').serialize(),

  //       dataType: "JSON",

  //       success: function(result) {

  //         //edit();

  //         setTimeout(function(){

  //           $('#btn_save2').text('Save');

  //           $('#btn_save2').attr('disabled', false);

  //           // document.getElementById('formAksi').reset();

  //         }, 1000);

  //         swal_berhasil(); edit();

  //       }, error: function(jqXHR, textStatus, errorThrown) {

  //         // alert('Error adding/update data');

  //         swal({ title:"ERROR", text:"Error adding / update data", type: "warning", closeOnConfirm: true}); 

  //         $('#btnSave1').text('save'); $('#btnSave1').attr('disabled',false);  

  //       }

  //     });

  // }



  function save2() {

    // $('#btn_save3').text('Saving...');

    // $('#btn_save3').attr('disabled', true);
     tinyMCE.triggerSave();
    var url;

    url = "<?= site_url()?>C_beranda/update/";

    $('#btn_save3').text('Submit'); $('#btn_save3').attr('disabled',true);

   

    $.ajax({

      url : url, type: "POST", dataType: "JSON", data: $('#form').serialize(),

      success: function(data) {

        if(data.status) { swal_berhasil(); edit();

        $('#btn_save3').text('Submit'); $('#btn_save3').attr('disabled',false); 

        } else {

          for (var i = 0; i < data.inputerror.length; i++) {

            $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); 

            $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); 

          }

        }

      },

      error: function (jqXHR, textStatus, errorThrown) {

        swal({ title:"ERROR", text:"Error adding / update data", type: "warning", closeOnConfirm: true}); 

        // $('#btn_save3').text('save'); $('#btn_save3').attr('disabled',false);  

      }      

    });

  }

  

  function edit() {

      save_method = 'update';

      // $('#panel-data').fadeOut('slow');

      // $('#form-data').fadeIn('slow');

      // document.getElementById('formAksi').reset();

      $.ajax({

        url : link+"/ajax_edit/",

        type: "GET",

        dataType: "JSON",

        success: function(result) {  

          if (result.file_slider1==''){

           var img = '<?php echo base_url();?>assets/images/default.png'; 

         }else{

           var img = '<?php echo base_url();?>assets/images/'+result.file_slider1;

          }  



          if (result.file_slider2==''){

            var img2 = '<?php echo base_url();?>assets/images/default.png'; 

          }else{

            var img2 = '<?php echo base_url();?>assets/images/'+result.file_slider2;

          }  

           

          if (result.file_slider3==''){

            var img3 = '<?php echo base_url();?>assets/images/default.png'; 

          }else{ 

           var img3 = '<?php echo base_url();?>assets/images/'+result.file_slider3;

          }

          

          if (result.file_slider4==''){

            var img4 = '<?php echo base_url();?>assets/images/default.png'; 

          }else{

            var img4 = '<?php echo base_url();?>assets/images/'+result.file_slider4;

          } 

           



          if (result.file_slider5==''){

            var img5 = '<?php echo base_url();?>assets/images/default.png'; 

          }else{ 

           var img5 = '<?php echo base_url();?>assets/images/'+result.file_slider5;

          } 



          if (result.foto_tentang==''){

            var img6 = '<?php echo base_url();?>assets/images/default.png'; 

          }else{

           var img6 = '<?php echo base_url();?>assets/images/'+result.foto_tentang;

          } 

           $('#preview-upload').attr('src', img);

           $('#preview-upload2').attr('src', img2);

           $('#preview-upload3').attr('src', img3);

           $('#preview-upload4').attr('src', img4);

           $('#preview-upload5').attr('src', img5);

           $('[name="id_beranda"]').val(result.id_beranda);

           $('[name="keyword"]').val(result.keyword);

           $('[name="jumlah_produk"]').val(result.jumlah_produk);

           $('#preview-upload6').attr('src', img6);

           $('[name="judul_tentang"]').val(result.judul_tentang);

           $('[name="deskripsi_tentang"]').val(result.deskripsi_tentang);

        }, error: function (jqXHR, textStatus, errorThrown) {

          alert('Error get data from ajax');

        }

      });

  }





</script>



