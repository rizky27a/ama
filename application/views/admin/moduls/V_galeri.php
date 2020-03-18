<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
 <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />
 <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
 <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

 <style type="text/css">
 	
 	td.details-control {
	    background: url('https://cdn.rawgit.com/DataTables/DataTables/6c7ada53ebc228ea9bc28b1b216e793b1825d188/examples/resources/details_open.png') no-repeat center center;
	    cursor: pointer;
	}
	tr.shown td.details-control {
	    background: url('https://cdn.rawgit.com/DataTables/DataTables/6c7ada53ebc228ea9bc28b1b216e793b1825d188/examples/resources/details_close.png') no-repeat center center;
	}
 </style>
<?php $title = "<i class='fa fa-file-image-o'></i>&nbsp;Foto Galeri"; ?>
<div id="idImgLoader" style="margin: 0 auto; text-align: center;">
	<img src='<?php echo base_url();?>assetsadmin/img/loader-dark.gif' />
</div>
<div id="data" style="display:none;">
<section class="content">
<div class="page-header">
	<h1>
		<?php echo $title;?>
	</h1>
</div><!-- /.page-header -->

<div id="panel-data">
<div class="widget-box">
<div class="widget-header">

	<div class="widget-toolbar">
		<a href="#" data-action="collapse">
			<i class="ace-icon fa fa-chevron-up"></i>
		</a>

		<a href="#" data-action="close">
			<i class="ace-icon fa fa-times"></i>
		</a>
	</div>
	</div>

<div class="widget-body">
<div class="widget-main">
<div class="row">
<div class="col-xs-12">
<div class="box-header">
	<button class="btn btn-default" onclick="reload_table()"><i class="fa fa-refresh"></i> Reload</button>
	<button class="btn btn-danger" onclick="TambahTambah()"><i class="fa fa-plus"></i> Tambah Data</button>
</div><br />
<!-- <table id="dynamic-table" class="table table-striped table-bordered table-hover"> -->
	<table id="dynamic-table" class="display responsive nowrap" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>No.</th>			
            <th>Foto Galeri</th>           
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>
</div><!-- /.span -->
</div>					
</div><!-- /.row -->
</div>
</div>
</div>
<!--<table id="dynamic-table" class="display responsive nowrap" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>No.</th>      
			<th>ID Foto</th>
	        <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>
</div>
</div>					
</div>
</div>
</div>
</div>
-->
<style type="text/css"> #loader{display: none} #preview{display: none}</style>
<div class="row">
<div class="col-xs-12">
<div id="form-data" style="display:none;">


<div class="col-xs-12">
<div id="home" class="tab-pane fade in active">
	<form action="<?php echo site_url('C_galeri/ajax_add'); ?>" id="form-add" name="form" class="form-horizontal" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id_foto"/> 
		<div class="form-body">
		<div class="form-group">
				<label class="control-label col-md-3"></label>
				<div class="form-group" align="center"> 
			 <div class="alert alert-warning text-center" style="width:50% ; ">
		<strong>Peringatan!</strong><br>
            Max Size : 2 MB<br>
            Max Dimension : 2024 x 1468 (px)<br>
            Allowed Image : JPG | PNG
        </div>
      </div>
			</div>
			<div class="form-group" >
		<label class="control-label col-md-3">Pilih File  (<?php echo $data_ukuran->ukuran_foto_galeri?>)</label>
		<div class="input-group col-md-6">
			<input type="file" name="userfile" id="userfile">
			<span class="help-block"></span>
			<div class="input-group-btn">
				<button type="submit" class="btn btn-primary" id="btnSave">Upload</button>
			</div>
		</div>
		</div>
		<div class="form-group" >
			<label class="control-label col-md-3">Preview</label>
				<div class="input-group col-md-9">
					<img id="loader-upload" src="<?= base_url(); ?>uploads/load.gif" style="height: 30px;">
					<img id="preview" src="#" style="height: 100px;border: 1px solid #DDC; " />
				</div>
		</div>
	</div>
			</div>
	</form>			
</div><!-- /.row -->
</div>
</div><!-- /.row -->
</div>	

<style type="text/css"> #loader-upload{display: none}</style>
<div id="form-update" style="display:none;">


	<div id="home" class="tab-pane fade in active">
	<form action="<?php echo site_url('C_galeri/ajax_update'); ?>" id="form" name="form" class="form-horizontal" enctype="multipart/form-data">
		<input type="hidden" name="id_foto"/> 
		<div class="form-body">
		<div class="form-group">
				<label class="control-label col-md-3"></label>
				<div class="form-group" >
        <div class="alert alert-warning text-center">
		<strong>Peringatan!</strong><br>
            Max Size : 2 MB<br>
            Max Dimension : 2024 x 1468 (px)<br>
            Allowed Image : JPG | PNG
        </div>
      </div>
			</div>
			<div class="form-group" >
		<label class="control-label col-md-3">Pilih File</label>
		<div class="input-group col-md-6">
			<input type="file" name="file_foto" id="file_foto">
			<span class="help-block"></span>
			<div class="input-group-btn">
				<button type="submit" class="btn btn-primary" id="btnSave">Upload</button>
			</div>
		</div>
		</div>
		<div class="form-group" >
			<label class="control-label col-md-3">Preview</label>
				<div class="input-group col-md-9">
					<img id="loader-upload" src="<?= base_url(); ?>uploads/load.gif" style="height: 30px;">
					<img id="preview-upload" src="#" style="height: 100px;border: 1px solid #DDC; " />
				</div>
		</div>
	</div>
			</div>
	</form>

	<div id="messages" class="tab-pane fade">
	<form id="form-upload" class="form-horizontal" role="form" action="<?= site_url('C_galeri/upload')?>" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="id_foto"/> 
		<div class="form-body">
		<div class="form-group" >
			<label class="control-label col-md-3"></label>
			<div class="input-group col-md-6">
				<div style="
					width: 100%;
					line-height: 10pt;
					background: #fb0;
					border-radius: 5px;
					padding: 5px;
					font-size: 8pt;
					box-sizing: border-box;
				">
					Max Size : 2 MB<br>
					Max Dimension : 2024 x 1468 (px)<br>
					Allowed Image : JPG | PNG | GIF
				</div>
			</div>
		
		<div class="form-group" >
		<label class="control-label col-md-3">Pilih File</label>
		<div class="input-group col-md-6">
			<input type="file" name="file_foto" id="file_foto">
			<span class="help-block"></span>
			<div class="input-group-btn">
				<button type="submit" class="btn btn-primary">Upload</button>
			</div>
		</div>
		</div>
		<div class="form-group" >
			<label class="control-label col-md-3">Preview</label>
				<div class="input-group col-md-9">
					<img id="loader-upload" src="<?= base_url(); ?>uploads/load.gif" style="height: 30px;">
					<img id="preview-upload" src="#" style="height: 100px;border: 1px solid #DDC; " />
				</div>
		</div>

	</div>			
			<div class="form-group" >
			<label class="control-label col-md-3">Pilih File</label>
			<div class="input-group col-md-6">
				<input type="file" name="file_foto" id="file_foto">
				<span class="help-block"></span>
				<div class="input-group-btn">
					<button type="submit" onclick="save()"class="btn btn-primary">Upload</button>
				</div>
			</div>
			</div>
			<div class="form-group" >
				<label class="control-label col-md-3">Preview</label>
					<div class="input-group col-md-9">
						<img id="loader-upload" src="<?= base_url(); ?>uploads/load.gif" style="height: 30px;">
						<img id="preview-upload" src="#" style="height: 100px;border: 1px solid #DDC; " />
					</div>
			</div>
		</div>
	</form>	
	</div>

</div>
</div>

<script>
	var zonk=''; 
	var save_method;
	var link = "<?php echo site_url('C_galeri')?>";
	var table;
	
	$(document).ready(function(){
	$('#form-add').submit(function(e) {
		tinyMCE.triggerSave();
		e.preventDefault(); var formData = new FormData($(this)[0]);
		$.ajax({
			url: $(this).attr("action"), type: 'POST', dataType: 'json', data: formData, async: true,
			beforeSend: function() { $('#btnSave').text('saving...'); $('#btnSave').attr('disabled',true); },
			success: function(response) {
				if(response.status) { Batal(); reload_table(); swal_berhasil();
				} else { Batal(); reload_table(); swal_error(response.error); }
			},
			complete: function() { $('#btnSave').text('save'); $('#btnSave').attr('disabled',false); },
			cache: false, contentType: false, processData: false
		});
		return false;
	});
	
	function readURL(input) {
		$("#preview").show();
		if (input.files && input.files[0]) {
			var rd = new FileReader(); 
			rd.onload = function (e) { $('#preview').attr('src', e.target.result); }; rd.readAsDataURL(input.files[0]);
		}
	}
	$("#userfile").change(function(){ readURL(this); });

	});
	
	$(document).ready(function(){
		$('#form').submit(function(e) {
			//tinyMCE.triggerSave();
			e.preventDefault(); var formData = new FormData($(this)[0]);
			$.ajax({
				url: $(this).attr("action"), type: 'POST', dataType: 'json', data: formData, async: true,
				beforeSend: function() { $('#btnSave').text('saving...'); $('#btnSave').attr('disabled',true); },
				success: function(response) {
					if(response.status) { Batal2(); reload_table(); swal_berhasil();
					} else { Batal2(); reload_table(); swal_error(response.error); }
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
		$("#file_foto").change(function(){ readURL(this); });
	});
	
	function save() {
		var url;
		url = "<?= site_url()?>C_galeri/update/";
		tinyMCE.triggerSave();
		$('#btnSave').text('saving...'); $('#btnSave').attr('disabled',true);
		$.ajax({
			url : url, type: "POST", dataType: "JSON", data: $('#form').serialize(),
			success: function(data) {
				if(data.status) {  Batal2(); reload_table(); swal_berhasil(); 
				} else {
					for (var i = 0; i < data.inputerror.length; i++) {
						$('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); 
						$('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); 
					}
				}2
				$('#btnSave').text('save'); $('#btnSave').attr('disabled',false); 
			},
			error: function (jqXHR, textStatus, errorThrown) {
				swal({ title:"ERROR", text:"Error adding / update data", type: "warning", closeOnConfirm: true}); 
				$('#btnSave').text('save'); $('#btnSave').attr('disabled',false);  
			}
		});
	}
	
	$(document).ready(function(){
      //$('#idImgLoader').show(2000);
	  $('#idImgLoader').fadeOut(2000);
	  setTimeout(function(){
            data();
      }, 2000);
	  
	  setTimeout(function(){
            ckeditor();
      }, 2000);
	  
	  setTimeout(function(){
            ckeditor2();
      }, 2000);
    });
	
	function ckeditor(){
		tinyMCE.init({
             
              mode : "textareas",
                
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
	
	function ckeditor2(){
		tinyMCE.init({
             
              mode : "#teksarea",
                
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
	
	function data(){
		$('#data').fadeIn();
	}
	
	$(document).ready(function() {
		table = $('#dynamic-table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
		"bDestroy": true,
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('C_galeri/ajax_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],

    });
	
	}).fnDestroy();
	
	function reload_table() {
    	table.ajax.reload(null, false);
	}
	
	function TambahTambah() {
		$('.form-group').removeClass('has-error');
		$('.help-block').empty(); 
		save_method = 'add'; 
		$('#panel-data').fadeOut('slow');
		$('#form-data').fadeIn('slow'); 
		$('[name="userfile"]').val(zonk);
		document.getElementById('form-add').reset();
	}
	
	function Batal() { 
		$('#form-data').slideUp(500,'swing');
		$('#panel-data').fadeIn(1000); 
	}
	
	function edit(id_foto) {
			save_method = 'update';
			$('#panel-data').fadeOut('slow');
			$('#form-update').fadeIn('slow');
			var my_editor_id = 'teksarea';
			// set the content empty
			// tinymce.get(my_editor_id).setContent(''); 
			$.ajax({
				url : link+"/ajax_edit/"+id_foto,
				type: "GET",
				dataType: "JSON",
				success: function(result) {  
					console.log(result);
					var img = '<?= base_url(); ?>assets/images/'+result.file_foto;
					$('[name="id_foto"]').val(result.id_foto);
					//$('[name="album_nama"]').val(result.album_nama);
					$('#preview-upload').attr('src', img);
					//$('[name="album_title_meta"]').val(result.album_title_meta);
					//tinymce.editors[1].setContent(result.album_deskripsi_meta);
					//$('[name="album_keyword_meta"]').val(result.album_keyword_meta);

				}, error: function (jqXHR, textStatus, errorThrown) {
					alert('Error get data from ajax');
				}
			});
	}
	
	function hapus(id_foto) {
		if (confirm('Are you sure delete this data?')) {
			$.ajax ({
				url : "<?php echo site_url('C_galeri/ajax_delete')?>/"+id_foto,
				type: "POST",
				dataType: "JSON",
				success: function(data) {
					setTimeout(function(){
                        Batal();
                    }, 1000);
					
					setTimeout(function(){
                        reload_table();
					}, 1000);
					swal_berhasil(); 
				}, error: function (jqXHR, textStatus, errorThrown) {
					swal({ title:"ERROR", text:"Error delete data", type: "warning", closeOnConfirm: true}); 
					$('#btnSave').text('save'); $('#btnSave').attr('disabled',false); 
				}
			});
		}
	}
	
	function Batal() { 
		$('#form-data').slideUp(500,'swing');
		$('#panel-data').fadeIn(1000); 
	}
	
	function Batal2() { 
		$('#form-update').slideUp(500,'swing');
		$('#panel-data').fadeIn(1000); 
	}
</script>	

