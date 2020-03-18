 <section class="page-cover" id="cover-about-us">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                    	<h1 class="page-title">Paket Wisata</h1>
                        <ul class="breadcrumb">
                            <li><a href="#">Beranda</a></li>
                            <li class="active">Paket Wisata</li>
                        </ul>
                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end page-cover -->

<section id="destinations" class="section-padding">
        	<div class="container">
        		<div class="row">
        			<div class="col-sm-12">
                    	<div class="page-heading">
                        	<h2>Paket Wisata</h2>
                            <hr class="heading-line">
                        </div><!-- end page-heading -->
                        
                        <div class="row">
                        	<?php $a=0;
							foreach ($produk as $k) {
					 		$a++;
					 		
							// $c='';$d='';
					 	// 		if ($a%4==0) {
					 	// 			$c='last-grid';
					 	// 			$d='<div class="clear"> </div><br><br>';
					 	// 		}
					 			?>		
                        	<div class="col-sm-6 col-md-6">
                        		<div class="main-block destination-block">
                                	<div class="row">
                                    	<div class="col-sm-12 col-md-6 col-md-push-6 no-pd-l">
                                        	<div class="main-img destination-img">
                                            	<a href="tour-detail-right-sidebar.html">
                                                    <img src="<?php echo base_url()?>assets/images/<?php echo $k['file_foto_produk']?>" class="img-responsive" alt="destination-img">
                                                </a>
                                            </div><!-- end destination-img -->
                                        </div><!-- end columns -->
                                        
                                		<div class="col-sm-12 col-md-6 col-md-pull-6 no-pd-r">
                                        	<div class="destination-info">
                                                <div class="destination-title">
                                                    <a href="<?= base_url('Home/detail/'.$k['id_produk'])?>"><?php echo $k['nama_produk'] ?></a>
                                                    <p><?php echo substr($k['deskripsi_produk'], 0, 100)."...." ?></p>
                                                    <a href="<?= base_url('Karya/detail/'.$k['id_produk'])?>" class="btn btn-orange">Detail</a>
                                                </div><!-- end destination-title -->
                                            </div><!-- end destination-info -->
                                        </div><!-- end columns -->
                                        
                                    </div><!-- end row -->	
                                </div><!-- end destination-block -->
                        	</div><!-- end columns -->
                        	
                            <?php } ?>
                            
                        </div><!-- end row -->
                        
                    </div><!-- end columns -->
                </div><!-- end row -->
        	</div><!-- end container -->
        </section>        
