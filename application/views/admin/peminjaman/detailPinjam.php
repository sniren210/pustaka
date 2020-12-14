



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Daftar Agama
      </h1>
      <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-book?>"></i>Data Agama</a></li>
        <li class="active">Input Agama</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
<!--css khusus  halaman ini -->
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
                    <p>Anda akan menghapus Data Peminjaman  ini</p>
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
    <h3 class="box-title"><i class="fa fa-book"></i> Daftar Pengembalian Buku</h3>
    <div class="box-tools pull-right">
    
    </div><!-- /.box-tools -->
  <div class="box-footer">
  <div class="btn-group">
    <td>
     <div align ="left">
      <a  href="<?php echo base_url(); ?>admin/Pinjam"  class="btn btn-danger" role="button" data-toggle="tooltip" title="Data Pinjam"></i>Data Pinjam</a>
      <a  href="<?php echo base_url(); ?>admin/Pinjam/vw_kembali"  class="btn btn-danger" role="button" data-toggle="tooltip" title="Data Kembali"></i>Data Kembali</a>
      </div>
   </td>
  </div>
  </div>
  </div><!-- /.box-header -->
   <div class="box-body">
   <div class="btn-group"><a href="<?php echo base_url(); ?>admin/Pinjam/create"  class="btn btn-success" role="button" data-toggle="tooltip" title="Tambah Peminjaman"><i class="fa fa-plus"></i>Tambah Peminjaman</a></div>
   <div class="form-group"></div>
   <table id="data-pinjam" class="table table-striped table-bordered" cellspacing="0" width="100%">
       <thead>
            <tr>
                <th>No</th>
                <th class="center"> <i class="glyphicon glyphicon-plus"></i></th>
                <th>Tanggal Pinjam</th>
                <th>ID Anggota</th>
                <th>Nama Anggota</th>
                <th>Tanggal Kembali</th>
                <th>Total Buku</th>
                <th>Status</th>
                <th>Detail</th>
                <th>Pilihan</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th class="center"> <i class="glyphicon glyphicon-plus"></i></th>
                <th>Tanggal Pinjam</th>
                <th>ID Anggota</th>
                <th>Nama Anggota</th>
                <th>Tanggal Kembali</th>
                <th>Total Buku</th>
                <th>Status</th>
                <th>Detail</th>
                <th>Pilihan</th>
            </tr>
        </tfoot>
        <tbody>
         <?php
  $no = 1;
    foreach($data_pinjam->result_array() as $op)
    {
      if ($op['status']==1) {
      
    ?>
            <tr>
                <td><?php echo $no++ ;?></td>
                <td class="details-control"><i class="btn btn-box-tool" data-toggle="tooltip" title="Tampilkan Detail"><i class="glyphicon glyphicon-plus"></i></i>
                </td>
                <?php $oridate=$op['tgl_pinjam'];
                $date=date("d-M-Y",strtotime($oridate));?>
                <td><?php echo $date;?></td>
                <td><?php echo $op['id_anggota'];?></td>
                <td><?php $nama=$op['id_anggota'];
                    foreach ($anggota ->result_array()  as $op2) {
                      if($op2['id_anggota']==$nama){
                          echo $op2['nama'];
                      }
                    }?></td>
                 <?php $oridate2=$op['tgl_kembali'];
                $date2=date("d-M-Y",strtotime($oridate2));?>
                <td><?php echo $date2;?></td>
                <td><?php echo $op['total_buku'];?></td>
   
                <td><?php $status=$op['status'];

                if($status==1){
                          echo '<span class="label label-success">Semua kembali</span>';
                      }
                      else{
                        echo '<span class="label label-danger">Belum Kembali</span>';
                      }
               
                    ?></td> 

                <?php $detail=$model->get_detail('tb_detail_pinjam','id_pinjam',$op['id_pinjam']);?>
                <td>
                </td> 
                <td width="15.5%">
                <?php echo 
                  '<div class="btn-group">
                    <a href="'.base_url().'admin/Kembali/vw_dt_back/?id_pinjam='.$op['id_pinjam'].'" class="btn btn-info" role="button" data-toggle="tooltip" title="Detail Kembali"><i class="fa fa-list"></i></a>
                    </div>
                    <span data-toggle="modal" data-target="#confirm-delete" data-href="'.base_url().'admin/Pinjam/hapus_kembali/?id_pinjam='.$op['id_pinjam'].'">
                    <a class="btn btn-danger" role="button" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash"></i></a>                     
                    </span>
                </td>
            </tr>';?>
<?php
    }
    }
  ?>            
         </tbody>
    </table>
  </div>
  <div class="box-footer">
    Menampilkan daftar Peminjaman, untuk mengedit dan menghapus data peminjaman klik tombol pada kolom pilihan.
  </div><!-- box-footer -->
</div><!-- /.box -->






    </section>
    <!-- /.content -->
  </div>

