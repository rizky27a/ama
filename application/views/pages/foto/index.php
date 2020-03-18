 <section class="page-cover" id="cover-about-us">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="page-title">Foto</h1>
                        <ul class="breadcrumb">
                            <li><a href="#">Beranda</a></li>
                            <li class="active">Foto</li>
                        </ul>
                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end page-cover -->
<section class="innerpage-wrapper">
            <div id="gallery-page" class="innerpage-section-padding"> 
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="page-heading">
                                <h2>Foto</h2>
                                <hr class="heading-line">
                            </div><!-- end page-heading -->
                
                            <div class="row">
                                <div id="gallery">
                                     <?php foreach ($galeri as $k) {
                              
                                    ?>
                                    <div class="gallery-product col-xs-12 col-sm-6 col-md-4 col-lg-4">
                                        <div class="gallery-block">
                                            <div class="gallery-img ">
                                                <img src="<?php echo base_url()?>assets/images/<?php echo $k['file_foto']?>" class="img-responsive" alt="gallery-img">
                                                <div class="gallery-mask">
                                                    <div class="gallery-title">
                                                        </div>  <!-- end gallery-title --> 
                                                    <a href="<?php echo base_url()?>assets/images/<?php echo $k['file_foto']?>" title="image-1" class="with-caption image-link"><span><i class="fa fa-arrows-v"></i></span></a>
                                                </div><!-- end gallery-mask -->
                                            </div><!-- end gallery-img -->
                                        </div><!-- end gallery-block -->
                                    </div><!-- end gallery-product -->
                                    
                                    <?php } ?>  

                                </div><!-- end gallery -->  
                            </div><!-- end row -->
                            
                           
                        </div><!-- end columns -->
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end gallery-page -->
        </section>