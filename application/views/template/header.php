


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Pustaka - Baca dan Pinjam Buku Di mana saja, Kapan Saja</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->
    <style>

input {
 position: absolute;
 font-size: 50px;
 opacity: 0;
 right: 0;
 top: 0;
}
.identitas{
  width: 100%;
  height: 5%;
}
/*.upload{
  margin-left: 10%;
  margin-top: 10%;
}*/
</style>


  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bootstrap/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="<?= base_url();?>assets/cristian/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url();?>assets/cristian/css/animate.css">
    
    <link rel="stylesheet" href="<?= base_url();?>assets/cristian/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url();?>assets/cristian/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= base_url();?>assets/cristian/css/magnific-popup.css">

    <link rel="stylesheet" href="<?= base_url();?>assets/cristian/css/aos.css">

    <link rel="stylesheet" href="<?= base_url();?>assets/cristian/css/ionicons.min.css">
    
    <link rel="stylesheet" href="<?= base_url();?>assets/cristian/css/flaticon.css">
    <link rel="stylesheet" href="<?= base_url();?>assets/cristian/css/icomoon.css">
    <link rel="stylesheet" href="<?= base_url();?>assets/cristian/css/style.css">
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
      <div class="container">
        <img src="<?= base_url('assets/img/e-libraryfix.png') ?>" style="margin: 10px;" width="100" height="80" class="logo">
        <a class="navbar-brand" href=""> Pustaka</a>
        <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav nav ml-auto">
            <?php if ($this->session->userdata('roleId') == 1): ?>
              <li class="nav-item"><a href="<?= base_url('admin') ?>" class="nav-link"><span><i class="fa  fa-bookmark"></i>Halaman Admin</span></a></li>
              
            <?php endif ?>
            <li class="nav-item"><a href="<?= base_url('app') ?>" class="nav-link"><span><i class="fa fa-home"></i> Beranda</span></a></li>
            <li class="dropdown nav-item">
              <a href="#" class="nav-link"><span><i class="icon-leaf"></i> Kategori<i class="icon-angle-down"></i></span></a>
              <ul class="dropdown-menu" style="text-align: center; background-color: white;">
                <li><a style="color: black;" href="<?= base_url('app/pendidikan') ?>">Pendidikan</a></li>
                <li><a style="color: black;" href="<?= base_url('app/Umum') ?>">Umum</a></li>
                <li><a style="color: black;" href="<?= base_url('app/Novel') ?>">Novel</a></li>
                <li><a style="color: black;" href="<?= base_url('app/Komik') ?>">Komik</a></li>
              </ul>
            </li>
            <li class="nav-item"><a href="<?= base_url('app/tentang') ?>" class="nav-link"><span><i class="fa fa-exclamation-circle"></i> Tentang</span></a></li>
            <li class="nav-item"><a href="<?= base_url('app/kontak') ?>" class="nav-link"><span><i class="fa  fa-phone"></i> Kontak</span></a></li>
            <?php if ($this->session->userdata('roleId') != null): ?>            
              <li class="nav-item"><a href="<?= base_url('Logdaf/logout') ?>" class="btn btn-primary btn-outline-primary "><span> Keluar Akun</span></a></li>
            <?php endif ?>
            <?php if ($this->session->userdata('roleId') == null): ?>            
              <li class="nav-item"><a href="<?= base_url('Logdaf') ?>" class="btn btn-primary btn-outline-primary "><span> Masuk Akun</span></a></li>
            <?php endif ?>

          </ul>
        </div>
      </div>
    </nav>