  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Data Agama
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class=""></i>Data agama</a></li>
        <li class="active">Daftar agama</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!--css khusus halaman ini -->
      <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">


      <!--content -->
<div class="box box-solid box-primary">
  <div class="box-header with-border">
    <h3 class="box-title"><i class="fa fa-book"></i> Daftar Agama</h3>
    <div class="box-tools pull-right">
    
    </div><!-- /.box-tools -->

  </div><!-- /.box-header -->
   <div class="box-body">
   <div class="btn-group"><a href="<?php echo base_url(); ?>agama/creatAgama"  class="btn btn-success" role="button" data-toggle="tooltip" title="Tambah Anggota"><i class="fa fa-plus"></i>  Tambah Agama</a></div>
   <div class="form-group">
     <?= $this->session->flashdata('messaage'); ?>
   </div>
   <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                  <tr>
                      <th width="10%">No</th>
                      <th width="20%">Nama</th>
                      <th width="15%">Pilihan</th>
                  </tr>
              </thead>
              <tbody>  
                <?php $no = 1 ?>
                <?php foreach ($data_agama->result_array() as $dat): ?>
                  <tr>
                      <td width="10%"><?= $no++ ?></td>
                      <td width="20%"><?= $dat['agama'] ?></td>
                    <td>
                    <div class="btn-group">
                     <a href="<?= base_url('agama/editAgama')?>?id_agama=<?= $dat['id_agama']?>" class="btn btn-warning" role="button" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a>&nbsp;
                    <span data-toggle="modal" data-target="#confirm-delete" >
                    <a class="btn btn-danger" role="button" data-toggle="tooltip" data-placement="top" title="Hapus" href="<?= base_url()?>agama/delAgama?id_agama=<?= $dat['id_agama']?>"><i class="fa fa-trash" ></i></a>
                    </span>
                    </div>
                  </td>
                </tr>

              <?php endforeach ?>
              </tbody>
              <tfoot>
                  <tr>
                      <th width="10%">No</th>
                      <th width="20%">Nama</th>
                      <th width="15%">Pilihan</th>
                  </tr>
              </tfoot>
          </table>
        </div>
        <div class="box-footer">
          Menampilkan daftar Anggota, untuk melihat detail buku klik tombol +, mengedit dan menghapus buku klik tombol pada kolom pilihan.
        </div><!-- box-footer -->
      </div><!-- /.box -->

    </section>
</div>

