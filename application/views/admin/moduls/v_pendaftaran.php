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
<?php $title = "<i class='fa fa-file-image-o'></i>&nbsp;Pendaftaran"; ?>
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
	<button class="btn btn-danger" onclick="Tambah()"><i class="fa fa-plus"></i> Tambah Data</button>
</div><br />
<!-- <table id="dynamic-table" class="table table-striped table-bordered table-hover"> -->
	<table id="example" class="display responsive nowrap" cellspacing="0" width="100%">
    <thead>
        <tr>
        	<th></th>
            <th>No.</th>
            
			<th>Nama</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>HP</th>
            <th>Pekerjaan</th>
            <th>Perusahaan</th>
            <th>Telp Kantor</th>
            <th>Bidang Usaha</th>
            <th>Jabatan</th>
            <th>Foto</th>
           
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

<style type="text/css"> #loader{display: none} #preview{display: none}</style>
<div class="row">
<div class="col-xs-12">
<div id="form-data" style="display:none;">
<div class="widget-box">
<div class="widget-header">
		<h4 class="widget-title">Form Kategori Pendaftaran</h4>

	<div class="widget-toolbar">
		<a href="#" data-action="collapse">
			<i class="ace-icon fa fa-chevron-up"></i>
		</a>

		<a onclick="Batal()" data-action="close">
			<i class="ace-icon fa fa-times"></i>
		</a>
	</div>
	</div>

<div class="widget-body">
<div class="widget-main">
<div class="row">
<div class="col-xs-12">
<form id="form-add" class="form-horizontal" action="<?= site_url('Pendaftaran/ajax_add')?>" method="POST" role="form" enctype="multipart/form-data">
	<input type="hidden" name="id_user">
	<div class="form-group">
	<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Nama Lengkap </label>
		<div class="col-sm-10">
			<input type="text" id="nama_lengkap" name="nama_lengkap" placeholder= "Nama Lengkap" class="col-xs-10 col-sm-5" />
			<span class="help-block"></span>
		</div>
	</div>
	<div class="form-group">
	<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Tempat </label>
		<div class="col-sm-10">
			<input type="text" id="tempat" name="tempat" placeholder= "Tempat" class="col-xs-10 col-sm-5" />
			<span class="help-block"></span>
		</div>
	</div>
	<div class="form-group">
	<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Tanggal Lahir </label>
		<div class="col-sm-10">
			<input type="date" id="tanggal_lahir" name="tanggal_lahir" placeholder= "Tanggal Lahir" class="col-xs-10 col-sm-5" />
			<span class="help-block"></span>
		</div>
	</div>
	<div class="form-group">
	<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Jenis Kelamin </label>
		<div class="col-sm-10">
			<input type="text" id="jenis_kel" name="jenis_kel" placeholder= "Jenis Kelamin" class="col-xs-10 col-sm-5" />
			<span class="help-block"></span>
		</div>
	</div>
	<div class="form-group">
	<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Alamat </label>
		<div class="col-sm-6">
			<textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat" class="col-xs-10 col-sm-5" cols="30" rows="10"></textarea>
			<span class="help-block"></span>
		</div>
	</div>
	<div class="form-group">
	<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Alamat E-mail </label>
		<div class="col-sm-10">
			<input type="text" id="alamat_email" name="alamat_email" placeholder= "Alamat Email" class="col-xs-10 col-sm-5" />
			<span class="help-block"></span>
		</div>
	</div>
	<div class="form-group">
	<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Telepon </label>
		<div class="col-sm-10">
			<input type="number" id="telepon" name="telepon" placeholder= "Telepon" class="col-xs-10 col-sm-5" />
			<span class="help-block"></span>
		</div>
	</div>
	<div class="form-group">
	<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Nomor HP </label>
		<div class="col-sm-10">
			<input type="number" id="no_hp" name="no_hp" placeholder= "Nomor HP" class="col-xs-10 col-sm-5" />
			<span class="help-block"></span>
		</div>
	</div>
	<div class="form-group">
	<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Pendidikan Terakhir </label>
		<div class="col-sm-10">
			<input type="text" id="pend_terakhir" name="pend_terakhir" placeholder= "Pendidikan Terakhir" class="col-xs-10 col-sm-5" />
			<span class="help-block"></span>
		</div>
	</div>
	<div class="form-group">
	<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Pekerjaan </label>
		<div class="col-sm-10">
			<input type="text" id="pekerjaan" name="pekerjaan" placeholder= "Pekerjaan" class="col-xs-10 col-sm-5" />
			<span class="help-block"></span>
		</div>
	</div>
	<div class="form-group">
	<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Perusahaan </label>
		<div class="col-sm-10">
			<input type="text" id="perusahaan" name="perusahaan" placeholder= "Perusahaan" class="col-xs-10 col-sm-5" />
			<span class="help-block"></span>
		</div>
	</div>
	<div class="form-group">
	<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Alamat Kantor </label>
		<div class="col-sm-6">
			<textarea class="form-control" id="alamat_kantor" name="alamat_kantor" placeholder="Alamat Kantor" class="col-xs-10 col-sm-5" cols="30" rows="10"></textarea>
			<span class="help-block"></span>
		</div>
	</div>
	<div class="form-group">
	<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Telepon Kantor </label>
		<div class="col-sm-10">
			<input type="number" id="telepon_kantor" name="telepon_kantor" placeholder= "Telepon Kantor" class="col-xs-10 col-sm-5" />
			<span class="help-block"></span>
		</div>
	</div>
	<div class="form-group">
	<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Bidang Usaha </label>
		<div class="col-sm-10">
			<input type="text" id="bidang_usaha" name="bidang_usaha" placeholder= "Bidang Usaha" class="col-xs-10 col-sm-5" />
			<span class="help-block"></span>
		</div>
	</div>
	<div class="form-group">
	<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Jabatan </label>
		<div class="col-sm-10">
			<input type="text" id="jabatan" name="jabatan" placeholder= "Jabatan" class="col-xs-10 col-sm-5" />
			<span class="help-block"></span>
		</div>
	</div>

	<div class="form-group" >
		<label class="col-sm-2 control-label no-padding-right" for="form-field-1"></label>
		<div class="col-md-6">
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
	</div>
	

	<div class="form-group">
	<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Gambar (<?php echo $data_ukuran->ukuran_foto_produk?>)</label>
		<div class="col-sm-10">
			<input type="file" name="file-upload" id="file-upload" required>
			<span class="help-block"></span>
			<img id="loader" src="<?= base_url(); ?>uploads/load.gif" style="height: 30px;">
			<img id="preview" src="#" style="height: 100px;border: 1px solid #DDC; " />
		</div>
	</div>
	<div class="col-md-offset-2 col-md-9">
				<button class="btn btn-info" type="submit" onClick="ajaxUpdate()" id="btnSave">
					<i class="ace-icon fa fa-check bigger-110"></i>
					Submit
				</button>

				&nbsp; &nbsp; &nbsp;
				<button class="btn" type="reset">
				<i class="ace-icon fa fa-undo bigger-110"></i>
					Reset
				</button>
	</div>
</form>
</div>
</div>
</div>					
</div><!-- /.row -->
</div>
</div><!-- /.row -->
</div>	

<style type="text/css"> #loader-upload{display: none}</style>
<div id="form-update" style="display:none;">
<div class="tabbable">
	<ul class="nav nav-tabs" id="formAksi">
		<li class="active">
			<a data-toggle="tab" href="#home">
			<i class="green ace-icon fa fa-home bigger-120"></i>
				Form
			</a>
		</li>

		<li>
			<a data-toggle="tab" href="#messages">
			<i class="green ace-icon fa fa-file-image-o bigger-120"></i>
				Gambar
			</a>
		</li>

											
	</ul>

	<div class="tab-content">
	<div id="home" class="tab-pane fade in active">
	<form action="#" id="form" name="form" class="form-horizontal" enctype="multipart/form-data">

		<input type="hidden" name="id_user"/> 
		<div class="form-group">
		<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Nama Lengkap </label>
			<div class="col-sm-10">
				<input type="text" id="nama_lengkap" name="nama_lengkap" placeholder= "Nama Lengkap" class="col-xs-10 col-sm-5" />
				<span class="help-block"></span>
			</div>
		</div>
		<div class="form-group">
		<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Tempat </label>
			<div class="col-sm-10">
				<input type="text" id="tempat" name="tempat" placeholder= "Tempat" class="col-xs-10 col-sm-5" />
				<span class="help-block"></span>
			</div>
		</div>
		<div class="form-group">
		<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Tanggal Lahir </label>
			<div class="col-sm-10">
				<input type="date" id="tanggal_lahir" name="tanggal_lahir" placeholder= "Tanggal Lahir" class="col-xs-10 col-sm-5" />
				<span class="help-block"></span>
			</div>
		</div>
		<div class="form-group">
		<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Jenis Kelamin </label>
			<div class="col-sm-10">
				<input type="text" id="jenis_kel" name="jenis_kel" placeholder= "Jenis Kelamin" class="col-xs-10 col-sm-5" />
				<span class="help-block"></span>
			</div>
		</div>
		<div class="form-group">
		<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Alamat </label>
			<div class="col-sm-6">
				<textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat" class="col-xs-10 col-sm-5" cols="30" rows="10"></textarea>
				<span class="help-block"></span>
			</div>
		</div>
		<div class="form-group">
		<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Alamat E-mail </label>
			<div class="col-sm-10">
				<input type="text" id="alamat_email" name="alamat_email" placeholder= "Alamat Email" class="col-xs-10 col-sm-5" />
				<span class="help-block"></span>
			</div>
		</div>
		<div class="form-group">
		<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Telepon </label>
			<div class="col-sm-10">
				<input type="number" id="telepon" name="telepon" placeholder= "Telepon" class="col-xs-10 col-sm-5" />
				<span class="help-block"></span>
			</div>
		</div>
		<div class="form-group">
		<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Nomor HP </label>
			<div class="col-sm-10">
				<input type="number" id="no_hp" name="no_hp" placeholder= "Nomor HP" class="col-xs-10 col-sm-5" />
				<span class="help-block"></span>
			</div>
		</div>
		<div class="form-group">
		<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Pendidikan Terakhir </label>
			<div class="col-sm-10">
				<input type="text" id="pend_terakhir" name="pend_terakhir" placeholder= "Pendidikan Terakhir" class="col-xs-10 col-sm-5" />
				<span class="help-block"></span>
			</div>
		</div>
		<div class="form-group">
		<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Pekerjaan </label>
			<div class="col-sm-10">
				<input type="text" id="pekerjaan" name="pekerjaan" placeholder= "Pekerjaan" class="col-xs-10 col-sm-5" />
				<span class="help-block"></span>
			</div>
		</div>
		<div class="form-group">
		<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Perusahaan </label>
			<div class="col-sm-10">
				<input type="text" id="perusahaan" name="perusahaan" placeholder= "Perusahaan" class="col-xs-10 col-sm-5" />
				<span class="help-block"></span>
			</div>
		</div>
		<div class="form-group">
		<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Alamat Kantor </label>
			<div class="col-sm-6">
				<textarea class="form-control" id="alamat_kantor" name="alamat_kantor" placeholder="Alamat Kantor" class="col-xs-10 col-sm-5" cols="30" rows="10"></textarea>
				<span class="help-block"></span>
			</div>
		</div>
		<div class="form-group">
		<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Telepon Kantor </label>
			<div class="col-sm-10">
				<input type="number" id="telepon_kantor" name="telepon_kantor" placeholder= "Telepon Kantor" class="col-xs-10 col-sm-5" />
				<span class="help-block"></span>
			</div>
		</div>
		<div class="form-group">
		<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Bidang Usaha </label>
			<div class="col-sm-10">
				<input type="text" id="bidang_usaha" name="bidang_usaha" placeholder= "Bidang Usaha" class="col-xs-10 col-sm-5" />
				<span class="help-block"></span>
			</div>
		</div>
		<div class="form-group">
		<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Jabatan </label>
			<div class="col-sm-10">
				<input type="text" id="jabatan" name="jabatan" placeholder= "Jabatan" class="col-xs-10 col-sm-5" />
				<span class="help-block"></span>
			</div>
		</div>
		
	</form>
	</div>

	<div id="messages" class="tab-pane fade">
	<form id="form-upload" class="form-horizontal" role="form" action="<?= site_url('Pendaftaran/upload')?>" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="id_user"/> 
		<div class="form-body">

			<div class="form-group" align="center"> 
			 <div class="alert alert-warning text-center" style="width:50% ; ">
                                <!-- <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> -->
                                <strong>Peringatan!</strong><br>
            Max Size : 2 MB<br>
            Max Dimension : 2024 x 1468 (px)<br>
            Allowed Image : JPG | PNG
                              </div>


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
					">
						Max Size : 2 MB<br>
						Max Dimension : 2024 x 1468 (px)<br>
						Allowed Image : JPG | PNG | GIF
					</div>
				</div> -->
			</div>

			<div class="form-group" >
			<label class="control-label col-md-3">Pilih File</label>
			<div class="input-group col-md-6">
				<input type="file" name="file-upload" id="file-upload">
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
	</form>	
	</div>

	</div>
</div>
</div>
<script>
	var zonk=''; 
	var save_method;
	var link = "<?php echo site_url('Pendaftaran')?>";
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
		$('#form-upload').submit(function(e) {
			tinyMCE.triggerSave();
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
		$("#file-upload").change(function(){ readURL(this); });
	});
	
	function save() {
		var url;
		url = "<?= site_url()?>Pendaftaran/update/";
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
				}
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
      setTimeout(function(){
	      reload_table();
	  },2000);
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
		table = $('#example').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
		"bDestroy": true,
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Pendaftaran/ajax_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
         responsive: {
            details: {
                type: 'column'
            }
        },
        columnDefs: [ {
            className: 'control',
            orderable: false,
            targets:   0
        } ],
        order: [ 1, 'asc' ]

    });
	
	}).fnDestroy();
	
	function reload_table() {
    	table.ajax.reload(null, false);
	}
	
	function Tambah() {
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
	
	function edit(id) {
			save_method = 'update';
			$('#panel-data').fadeOut('slow');
			$('#form-update').fadeIn('slow');
			//var my_editor_id = 'teksarea';
			// set the content empty
			//tinymce.get(my_editor_id).setContent(''); 
			$.ajax({
				url : link+"/ajax_edit/"+id,
				type: "GET",
				dataType: "JSON",
				success: function(result) {  
					var img = '<?= base_url(); ?>assets/images/'+result.foto;
					$('[name="id_user"]').val(result.id_user);
					$('[name="nama_lengkap"]').val(result.nama_lengkap);
					$('[name="tempat"]').val(result.tempat);
					$('[name="tanggal_lahir"]').val(result.tanggal_lahir);
					$('[name="jenis_kel"]').val(result.jenis_kel);
					$('[name="alamat"]').val(result.alamat);
					$('[name="alamat_email"]').val(result.alamat_email);
					$('[name="telepon"]').val(result.telepon);
					$('[name="no_hp"]').val(result.no_hp);
					$('[name="pend_terakhir"]').val(result.pend_terakhir);
					$('[name="pekerjaan"]').val(result.pekerjaan);
					$('[name="perusahaan"]').val(result.perusahaan);
					$('[name="alamat_kantor"]').val(result.alamat_kantor);
					$('[name="telepon_kantor"]').val(result.telepon_kantor);
					$('[name="bidang_usaha"]').val(result.bidang_usaha);
					$('[name="jabatan"]').val(result.jabatan);
					$('#preview-upload').attr('src', img);
					//$('[name="deskripsi_produk1"]').val(result.deskripsi_produk);
					tinymce.editors[1].setContent(result.alamat);

				}, error: function (jqXHR, textStatus, errorThrown) {
					alert('Error get data from ajax');
				}
			});
	}
	
	function hapus(id) {
		if (confirm('Are you sure delete this data?')) {
			$.ajax ({
				url : "<?php echo site_url('Pendaftaran/ajax_delete')?>/"+id,
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
