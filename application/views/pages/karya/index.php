        <section class="section section-breadcrumbs" id="cover-about-us" >
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                    	
                        <ul class="breadcrumb">
                            <li><a href="#">Beranda</a></li>
                            <li class="active">Paket Wisata</li>
                        </ul>
                        <h1 class="page-title">Paket Wisata</h1>
                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end page-cover -->

        <section id="destinations" class="section-padding">
        	<div class="container">
        		<div class="row">
                    <div class="col-sm-12">
                        <div class="page-heading text-center">
                            <h2>Paket Wisata</h2>
                            <hr class="heading-line">
                        </div>
                        <?php $a=0;
                        foreach ($produk as $k) {
                        $a++;
                                
                                
                        ?>
                    <div class="col-sm-6">
                        <div class="blog-post blog-single-post">
                            <div class="single-post-title">
                                <h4><a href="<?= base_url('Home/detail/'.$k['id_produk'])?>"><?php echo $k['nama_produk'] ?></a></h4>
                            </div>

                            <div class="single-post-image">
                                <img src="<?php echo base_url()?>assets/images/<?php echo $k['file_foto_produk']?>" alt="Post Title">
                            </div>
                            
                            <div class="single-post-info">
                                <i class="glyphicon glyphicon-time"></i>15 OCT, 2014 <a href="#" title="Show Comments"><i class="glyphicon glyphicon-comment"></i>11</a>
                            </div>
                            
                            <div class="single-post-content">
                                <p><?php echo substr($k['deskripsi_produk'], 0, 500)."...." ?></p>
                            <a href="blog-post.html" class="btn">Detail</a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                </div><!-- end row -->
        	</div><!-- end container -->
        </section>        
