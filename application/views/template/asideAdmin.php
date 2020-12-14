<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">Dasboard</li>
        <li><a href="admin"><i class="fa fa-home"></i> <span>Dasboard</span></a></li>
        <li class="header">MASTER DATA</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Master Anggota</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?= base_url('anggota') ?>"><i class="fa fa-user"></i>Data Anggota</a></li>
            <li><a href="<?= base_url('kelas') ?>"><i class="fa fa-building-o"></i>Data Kelas</a></li>
             <li><a href="<?= base_url('agama') ?>"><i class="fa fa-moon-o"></i>Data Agama</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i> <span>Master Buku</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('buku') ?>"><i class="fa fa-book"></i>Data Buku</a></li>
            <li><a href="<?= base_url('kategori') ?>"><i class="fa fa-tags"></i>Data Kategori</a></li>
             <li><a href="<?= base_url('rak') ?>"><i class="fa fa-archive"></i>Data Rak</a></li>
             <li><a href="<?= base_url('pengarang') ?>"><i class="fa fa-pencil-square-o"></i>Data Pengarang</a></li>
          </ul>
        </li>
        <li class="header">Transaksi</li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i> <span>Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li><a href="<?= base_url('peminjaman') ?>"><i class="fa fa-book"></i>Data Peminjaman</a></li>
              <!--li><a href="<?php echo base_url(); ?>admin/transaksi/pengembalian"><i class="fa fa-book"></i>Data Pengembalian</a></-->
          </ul>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i> <span>Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li><a href="<?= base_url('report') ?>"><i class="fa fa-book"></i>Buku Report</a></li>
              <li><a href="<?php echo base_url('Report/pengembalian'); ?>"><i class="fa fa-book"></i>Report Pengembalian</a></li>
          </ul>
        </li>
        <li class="header">DENDA</li>
        <li><a href="<?= base_url('denda') ?>"><i class="fa fa-usd"></i> <span>Denda</span></a></li>
        <li class="header">Halaman</li>
        <li><a href="<?= base_url('app') ?>"><i class="fa fa-bookmark"></i> Halaman Utama</a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
