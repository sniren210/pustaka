  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Data Anggota
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class=""></i>Data anggota</a></li>
        <li class="active">Daftar anggota</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!--css khusus halaman ini -->
      <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">


      <!--content -->
<div class="box box-solid box-primary">
  <div class="box-header with-border">
    <h3 class="box-title"><i class="fa fa-book"></i> Daftar Anggota</h3>
    <div class="box-tools pull-right">
    
    </div><!-- /.box-tools -->

  </div><!-- /.box-header -->
   <div class="box-body">
   <div class="btn-group"><a href="<?php echo base_url(); ?>Anggota/creatAnggota"  class="btn btn-success" role="button" data-toggle="tooltip" title="Tambah Anggota"><i class="fa fa-plus"></i>  Tambah Anggota</a></div>
   <div class="form-group">
     <?= $this->session->flashdata('messaage'); ?>
   </div>
   <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                  <tr>
                      <th width="10%">No</th>
                      <th width="10%" class="center"> <i class="glyphicon glyphicon-plus"></i></th>
                      <th width="15%">ID Anggota</th>
                      <th width="20%">Nama</th>
                      <th width="15%">Gender</th>
                      <th width="10%">Kelas</th>
                      <th width="15%">Pilihan</th>
                  </tr>
              </thead>
              <tbody>  
                <?php $no = 1 ?>
                <?php foreach ($data_anggota->result_array() as $dat): ?>
                  <tr>
                      <td width="10%"><?= $no++ ?></td>
                      <td width="10%" class="center"> <i class="glyphicon glyphicon-plus"></i></td>
                      <td width="15%"><?= $dat['id_anggota'] ?></td>
                      <td width="20%"><?= $dat['nama'] ?></td>
                      <td width="15%"><?= $dat['jenis_kelamin'] ?></td>
                      <td width="10%"><?= $dat['id_kelas'] ?></td>
                    <td>
                    <div class="btn-group">
                     <a href="<?= base_url('anggota/editAnggota')?>?id_anggota=<?= $dat['id_anggota']?>" class="btn btn-warning" role="button" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a>&nbsp;
                    <span data-toggle="modal" data-target="#confirm-delete" >
                    <a class="btn btn-danger" role="button" data-toggle="tooltip" data-placement="top" title="Hapus" href="<?= base_url()?>anggota/delAnggota?id_anggota=<?= $dat['id_anggota']?>"><i class="fa fa-trash" ></i></a>
                    </span>
                    </div>
                  </td>
                </tr>

              <?php endforeach ?>
              </tbody>
              <tfoot>
                  <tr>
                      <th width="10%">No</th>
                      <th width="10%" class="center"> <i class="glyphicon glyphicon-plus"></i></th>
                      <th width="15%">ID Anggota</th>
                      <th width="20%">Nama</th>
                      <th width="15%">Gender</th>
                      <th width="10%">Kelas</th>
                      <th width="15%">Pilihan</th>
                  </tr>
              </tfoot>
          </table>
        </div>
        <div class="box-footer">
          Menampilkan daftar Anggota, untuk melihat detail buku klik tombol +, mengedit dan menghapus buku klik tombol pada kolom pilihan.
        </div><!-- box-footer -->
      </div><!-- /.box -->

                      <!--modal dialog untuk hapus -->
<!--                 <?php foreach ($data_anggota->result_array() as $dat): ?>
                  <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Konfirmasi Hapus</h4>
                                </div>
                            
                                <div class="modal-body">
                                    <p>Anda akan menghapus Data Anggota  ini</p>
                                    <p><strong>Peringatan</strong>  Setelah data dihapus, data tidak dapat dikembalikan!</p>
                                    <br />
                                    <p>Ingin melanjutkan menghapus?</p>
                                    <p class="debug-url"></p>
                                </div>
                                
                                <div class="modal-footer">

                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <a class="btn btn-danger btn-ok" href="<?= base_url()?>admin/delAnggota?id_anggota=<?= $dat['id_anggota']?>">Hapus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?> -->


    </section>
</div>

