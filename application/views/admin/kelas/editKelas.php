
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Kelas
      </h1>
      <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-book?>"></i>Data Kelas</a></li>
        <li class="active">Edit Kelas</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">


      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap-datepicker.css">
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/select2.min.css">
      <!--content -->
      <div class="box box-solid box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-pencil"></i> <i class="fa fa-book"></i>Edit Kelas</h3>
          <div class="box-tools pull-right">
          </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
         <div class="box-body">

          <?php if(!empty(validation_errors())){
              echo '<div class="alert alert-warning alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                      <p>Inputan tidak terisi dengan benar. Cek kembali</p>';
                      echo validation_errors();
                   echo '</div>';

          }?>
          <!--show error message here -->
          <div class="form-group"></div>
<form class="form-horizontal" method="post"  action="<?php echo base_url(); ?>kelas/editKelas" role="form">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">ID Kelas</label>
                  <div class="col-sm-4">
                    <input type="text" value="<?php echo $kelas['id_kelas'];?>"  disabled=disabled class="form-control" name="id_kelas" placeholder="id Lengkap" >
                     <input type="hidden" value="<?php echo $kelas['id_kelas'];?>"  name="id_kelas" >
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Kelas</label>
                  <div class="col-sm-4">
                    <input type="text" value="<?php echo $kelas['kelas'];?>"  class="form-control" name="kelas" placeholder="kelas" >
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
              </div>
              <div class="col-sm-4">
                  <div class="btn-group">
                   <button type="reset" class="btn btn-info"><i class="fa fa-refresh"></i> Reset</button>
        </div>
                   <div class="btn-group">
                   <button type="submit" class="btn btn-success"><i class="fa fa-pencil"></i> Update</button>
                  </div>
              </div>
              <!-- /.box-footer -->
            </form>

        </div>
        <div class="box-footer">
        <td>
          <div align ="Right"> <a  href="<?php echo base_url(); ?>kelas"  class="btn btn-danger" role="button" data-toggle="tooltip" title="Kembali"></i>Back</a></div>
        </td>
        </div>
        <div class="box-footer">
          Update Data Buku Perpustakaan, edit form diatas untuk mengubah data buku. 
        </div><!-- box-footer -->
      </div><!-- /.box -->




    </section>
    <!-- /.content -->
  </div>
