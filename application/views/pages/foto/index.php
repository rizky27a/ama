        <section class="section section-breadcrumbs" id="cover-about-us">
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
                
       
        <div class="section">
            <div class="container">
                <div class="row">
            
            <ul class="grid cs-style-2">
                  <?php foreach ($galeri as $k) {
                              
                                    ?>
          
                <div class="col-md-4 col-sm-6">
                    <figure>
                        <img src="<?php echo base_url()?>assets/images/<?php echo $k['file_foto']?>" alt="img04">
                        <figcaption>
                            <h3>Settings</h3>
                            <span>Jacob Cummings</span>
                            <a href="portfolio-item.html">Take a look</a>
                        </figcaption>
                    </figure>
                </div>  
                <?php } ?> 
                
            </ul>

                
                </div>
                
                <ul class="pager">
                  <li><a href="#">Previous</a></li>
                  <li><a href="#">Next</a></li>
                </ul>
                
            </div>
        </div>
