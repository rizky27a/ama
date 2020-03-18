 <section class="section section-breadcrumbs" id="cover-about-us">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                    	<h1 class="page-title">Pendaftaran</h1>
                        <ul class="breadcrumb">
                            <li><a href="#">Beranda</a></li>
                            <li class="active">Pendaftaran</li>
                        </ul>
                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end page-cover -->

<section id="destinations" class="section-padding">

            <div class="container">

                <div class="row">

                    <div class="col-sm-12">

                        
                     <form id="form-add" class="form-horizontal" action="<?= site_url('C_Pendaftaran/ajax_add')?>" method="POST" role="form" enctype="multipart/form-data">
  <input type="hidden" name="id_user">
  <div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Nama Lengkap </label>
    <div class="col-sm-10">
      <input type="text" id="nama_lengkap" name="nama_lengkap" placeholder= "Nama Lengkap" class="col-xs-10 col-sm-5" required />
      <span class="help-block"></span>
    </div>
  </div>
  <div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Tempat </label>
    <div class="col-sm-10">
      <input type="text" id="tempat" name="tempat" placeholder= "Tempat" class="col-xs-10 col-sm-5"required />
      <span class="help-block"></span>
    </div>
  </div>
  <div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Tanggal Lahir </label>
    <div class="col-sm-10">
      <input type="date" id="tanggal_lahir" name="tanggal_lahir" placeholder= "Tanggal Lahir" class="col-xs-10 col-sm-5"required />
      <span class="help-block"></span>
    </div>
  </div>
  <div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Jenis Kelamin </label>
    <div class="col-sm-4">
      <select class="form-control" name="jenis_kel" >
                <option value="Pria">Pria</option>
                <option value="Wanita">Wanita</option>
              </select>
     
      <span class="help-block"></span>
    </div>
  </div>
   
  <div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Alamat </label>
    <div class="col-sm-6">
      <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat" class="col-xs-10 col-sm-5" cols="30" rows="10" required></textarea>
      <span class="help-block"></span>
    </div>
  </div>
  <div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Alamat E-mail </label>
    <div class="col-sm-10">
      <input type="email" id="alamat_email" name="alamat_email" placeholder= "Alamat Email" class="col-xs-10 col-sm-5" required />
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
      <input type="number" id="no_hp" name="no_hp" placeholder= "Nomor HP" class="col-xs-10 col-sm-5" required/>
      <span class="help-block"></span>
    </div>
  </div>
  <div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Pendidikan Terakhir </label>
    <div class="col-sm-10">
      <input type="text" id="pend_terakhir" name="pend_terakhir" placeholder= "Pendidikan Terakhir" class="col-xs-10 col-sm-5" required/>
      <span class="help-block"></span>
    </div>
  </div>
  <div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Pekerjaan </label>
    <div class="col-sm-10">
      <input type="text" id="pekerjaan" name="pekerjaan" placeholder= "Pekerjaan" class="col-xs-10 col-sm-5" required/>
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
     
    </div>
  </div>
  <div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Username </label>
    <div class="col-sm-10">
      <input type="text" id="username" name="username" placeholder= "Username" class="col-xs-10 col-sm-5" required="" />
      <span class="help-block"></span>
    </div>
  </div>
  <div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Password </label>
    <div class="col-sm-10">
      <input type="password" id="password" name="password" placeholder= "Password" class="col-xs-10 col-sm-5" required="" />
      <span class="help-block"></span>
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


                    </div><!-- end columns -->

                </div><!-- end row -->

            </div><!-- end container -->

        </section>


