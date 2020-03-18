<section class="page-title" style="background-image:url(<?php echo base_url()?>assets/public/themes/admin-lte/images/attorneys/bg.jpg);">

        <div class="container clearfix">

            <div class="pull-left"><h3>Detail Aktivitas</h3></div>

            <div class="pull-right">

                <ul class="bread-crumb clearfix">

                    <li><a href="index-2.html">Beranda</a></li>                    

                    <li>Detail Aktivitas</li>

                </ul>

            </div>

        </div>

</section>
<section id="blog_area">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
					<div class="blog_section style-two">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="item style-two">
								<div class="image-holder">
									<figure>
										<img src="<?php echo base_url()?>assets/images/<?php echo $detail->file_foto_aktivitas?>" alt="" style="width: 60%;">
									</figure>
								</div>
								<div class="item-content clearfix">
									<div class="blog-details">
										
										<div class="date_details">
											<h2><?php echo $detail->nama_aktivitas ?></h2>
											
										</div>
									</div>
									<div class="content-text">
										<p><?php echo $detail->deskripsi_aktivitas ?>.</p>
									</div>
								</div>
							
							</div>
						</div>
							
					</div>

					
				</div>
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="blog_sidebar">
						
						<div class="single_sidebar"> 
							<h2>Aktivitas Lain</h2> 
							<?php foreach ($detail_lain as $value) {
								
							 ?>
							<div class="blog_details">
								<div class="blogimg">
									<img src="<?php echo base_url()?>assets/images/<?php echo $value['file_foto_aktivitas']?>" alt="img">
								</div>  
								<div class="sidber_text">
									<h3><a href="<?= base_url('Aktivitas/detail/'.$value['id_aktivitas'])?>"><?php echo $value['nama_aktivitas']?></a></h3>
								</div>
							</div>
							<?php }?>
						</div>
						
					</div> 
				</div>
				
			</div>
		</div>
	</section>