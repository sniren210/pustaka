

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
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">


      <!--modal dialog untuk hapus -->
      <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Konfirmasi Hapus</h4>
                    </div>
                
                    <div class="modal-body">
                        <p>Anda akan menghapus Data Rak  ini</p>
                        <p><strong>Peringatan</strong>  Setelah data dihapus, data tidak dapat dikembalikan!</p>
                        <br />
                        <p>Ingin melanjutkan menghapus?</p>
                        <p class="debug-url"></p>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-danger btn-ok">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
      <!--content -->
      <div class="box box-solid box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-book"></i> Daftar Rak</h3>
        <div class="box-tools pull-right">
        
        </div><!-- /.box-tools -->

      </div><!-- /.box-header -->
       <div class="box-body">
       <div class="btn-group"><a href="<?php echo base_url(); ?>Rak/creatRak"  class="btn btn-success" role="button" data-toggle="tooltip" title="Tambah Rak"><i class="fa fa-plus"></i>  Tambah Rak</a></div>
       <div class="form-group"></div>
       <table id="example2" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th width="10%">No</th>
                    <th width="15%">Rak</th>
                    <th width="60%">Kategori</th>
                    <th width="15%">Pilihan</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th width="10%">No</th>
                    <th width="15%">Rak</th>
                    <th width="60%">Kategori</th>
                    <th width="15%">Pilihan</th>
                </tr>
            </tfoot>
            <tbody>
             <?php
      $no = 1;
        foreach($data_rak->result_array() as $op)
        {
        ?>
                <tr>
                    <td width="5%"><?php echo $no++ ;?></td>
                    <!--td class="details-control"><i class="btn btn-box-tool" data-toggle="tooltip" title="Tampilkan Detail"><i class="glyphicon glyphicon-plus"></i></i>
                    </td-->
                    <td width="20%"><?php echo $op['nama_rak'];?></td>
                    <td width="50%"><?php $kategori=$op['id_kategori'];
                        foreach ($data_kategori ->result_array()  as $op2) {
                          if($op2['id_kategori']==$kategori){
                              echo $op2['kategori'];
                          }
                        }?>
                    </td>
                    <td width="25%">
                    <?php echo 
                        '<div class="btn-group">
                         <a href="'.base_url().'Rak/editRak/?no_rak='.$op['no_rak'].'" class="btn btn-warning" role="button" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                         &nbsp&nbsp
                        <span data-toggle="modal" data-target="#confirm-delete">
                        <a class="btn btn-danger" role="button" data-toggle="tooltip" data-placement="top" title="Hapus" href="'.base_url().'Rak/delRak/?no_rak='.$op['no_rak'].'"><i class="fa fa-trash"></i></a>
                        </span>
                    </td>
                </tr>';?>
      <?php
        }
      ?>            
             </tbody>
        </table>
      </div>
      <div class="box-footer">
        Menampilkan daftar Rak, untuk mengedit dan menghapus data rak klik tombol pada kolom pilihan.
      </div><!-- box-footer -->
      </div><!-- /.box -->




      
  

    </section>
</div>

