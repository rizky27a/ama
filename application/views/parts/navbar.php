    <header class="navbar navbar-inverse navbar-fixed-top" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><img src="<?php echo base_url()?>assets/images/ama-logo.png" style="width: 20%;" alt="Basica"></a>

            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li <?php if ($active=='beranda') { echo 'class="active"'; } ?>><a href="<?= base_url('Home')?>">Beranda</a></li>
                    <li <?php if ($active=='karya') { echo 'class="active"'; } ?>><a href="<?= base_url('Karya')?>">Kegiatan</a></li>
                    <li <?php if ($active=='foto') { echo 'class="active"'; } ?>><a href="<?= base_url('Foto')?>">Foto</a></li>
                    <li <?php if ($active=='kontak') { echo 'class="active"'; } ?>><a href="<?= base_url('Contact')?>">Kontak</a></li>
                    <li <?php if ($active=='daftar') { echo 'class="active"'; } ?>><a href="<?= base_url('Daftar')?>">Pendaftaran</a></li>
                </ul>
            </div>
        </div>
    </header>
