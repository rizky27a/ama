<section class="page-title" style="background-image:url(<?php echo base_url()?>assets/public/themes/admin-lte/images/attorneys/bg.jpg);">

        <div class="container clearfix">

            <div class="pull-left"><h3>Aktivitas</h3></div>

            <div class="pull-right">

                <ul class="bread-crumb clearfix">

                    <li><a href="#">Beranda</a></li>

                    <li>Aktivitas</li>

                </ul>

            </div>

        </div>

	</section>
<section class="attorneys">

		<div class="container">

			<div class="section-text">

			

				<h2>Aktivitas</h2>

			

			</div>

			<div class="outer-box">

				<div class="row clearfix">


					<?php $a=0;
					foreach ($aktivitas as $k) {
			 		$a++;
			 		
					// $c='';$d='';
			 	// 		if ($a%4==0) {
			 	// 			$c='last-grid';
			 	// 			$d='<div class="clear"> </div><br><br>';
			 	// 		}
			 			?>	

					<div class="col-md-4 col-sm-6 col-xs-12">

						<div class="single-box text-center">

							<div class="iner-box">

								<figure>

									<img src="<?php echo base_url()?>assets/images/<?php echo $k['file_foto_aktivitas']?>" alt="">

								</figure>

								<div class="content-text text-center">		

									<div class="content">

										<a href="<?= base_url('Aktifitas/detail_aktivitas/'.$k['id_aktivitas'])?>"><h4><?php echo $k['nama_aktivitas'] ?></h4></a>

										<span class="curve"></span>

									</div>

									<div class="icon-box text-center">

										<p><?php echo substr($k['deskripsi_aktivitas'], 0, 100)."...." ?></p>

										

									</div>

								</div>

							</div>

						</div>

					</div>

					<?php  }?>

					

				</div>

			</div>				

		</div>

		

	</section>