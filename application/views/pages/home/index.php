    <section id="main-slider" class="no-margin">
        <div class="carousel slide">
            <ol class="carousel-indicators">
                <li data-target="#main-slider" data-slide-to="0" class="active"></li>
                <li data-target="#main-slider" data-slide-to="1"></li>
                <li data-target="#main-slider" data-slide-to="2"></li>
                <li data-target="#main-slider" data-slide-to="3"></li>
                <li data-target="#main-slider" data-slide-to="4"></li>
                <li data-target="#main-slider" data-slide-to="5"></li>
                <li data-target="#main-slider" data-slide-to="6"></li>
                <li data-target="#main-slider" data-slide-to="7"></li>
            </ol>
            <div class="carousel-inner">
           
                <div class="item active" style="background-image: url(<?php echo base_url()?>assets/images/slider1.jpg)"></div>
           
                <div class="item" style="background-image: url(<?php echo base_url()?>assets/images/slider2.jpg)"></div>
                
                <div class="item" style="background-image: url(<?php echo base_url()?>assets/images/slider3.jpg)"></div>
                
                <div class="item" style="background-image: url(<?php echo base_url()?>assets/images/slider4.jpg)"></div>
             
                <div class="item" style="background-image: url(<?php echo base_url()?>assets/images/slider5.jpg)"></div>
               
                <div class="item" style="background-image: url(<?php echo base_url()?>assets/images/slider6.jpg)"></div>
                
                <div class="item" style="background-image: url(<?php echo base_url()?>assets/images/slider7.jpg)"></div>
            </div><!--/.carousel-inner-->
        </div>
        <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
            <i class="icon-angle-left"></i>
        </a>
        <a class="next hidden-xs" href="#main-slider" data-slide="next">
            <i class="icon-angle-right"></i>
        </a>
    </section>


<section>
        <div class="section section-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Kegiatan</h1>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="section">
            <div class="container">
                <div class="row">
                    <?php $a=0; $b=$beranda[0]['jumlah_produk']; 

                            foreach ($produk as $k) {

                            $a++;

                            if ($a<=$b) {

                            // $c='';$d='';

                        //      if ($a%4==0) {

                        //          $c='last-grid';

                        //          $d='<div class="clear"> </div><br><br>';

                        //      }

                                ?>  
                    <!-- Blog Post Excerpt -->
                    <div class="col-sm-6">
                        <div class="blog-post blog-single-post">
                            <div class="single-post-title">
                                <h2><a href="<?= base_url('Karya/detail/'.$k['id_produk'])?>"><?php echo $k['nama_produk'] ?></a></h2>
                            </div>

                            <div class="single-post-image">
                                <img src="img/blog/2.jpg" alt="Post Title">
                            </div>
                            
                            <div class="single-post-info">
                                <!-- <i class="glyphicon glyphicon-time"></i><?php echo substr($k['tanggal'])?> <a href="#" title="Show Comments"></a> -->
                            </div>
                            
                            <div class="single-post-content">
                                <p><?php echo substr($k['deskripsi_produk'], 0, 500)."...." ?></p>
                                <a href="<?= base_url('Karya/detail/'.$k['id_produk'])?>" class="btn">Detail</a>
                            </div>
                        </div>
                    </div>
                    <?php } }?>
                    <div class="pagination-wrapper ">
                        <a href="<?= base_url('Karya')?>" class="btn">Lihat Semua</a>
                    </div>

                </div>
            </div>
        </div>

</section>

<section>

        <div class="section">
            <div class="container">
                <div class="row">
                <div class="col-sm-4">
                <img class="img-responsive" src="<?php echo base_url()?>assets/images/<?php echo $beranda[0]['foto_tentang'] ?>" alt="About Us">
                </div>
                <div class="col-sm-8">
                        <h2>Tentang Kami</h2>
                        <h2><?php echo $beranda[0]['judul_tentang'] ?></h2>
                        <p><?php echo $beranda[0]['deskripsi_tentang'] ?></p>
                               
                    </div>
                </div>
            </div>
        </div>
</section>

