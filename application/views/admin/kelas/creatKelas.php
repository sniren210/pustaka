  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Daftar Anggota
      </h1>
      <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-book?>"></i>Data Anggota</a></li>
        <li class="active">Input Anggota</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap-datepicker.css">
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/select2.min.css">
      <!--content -->
      <div class="box box-solid box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-plus"></i> <i class="fa fa-book"></i> Tambah Anggota</h3>
          <div class="box-tools pull-right">
          </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
         <div class="box-body">

          <!--show error message here -->
          <div class="form-group"></div>
          <form class="form-horizontal" method="post"  action="<?php echo base_url(); ?>kelas/creatKelas" role="form">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Kelas</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="kelas" placeholder="kelas" required="required" >
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
              </div>
              <div class="col-sm-4">
                  <div class="btn-group">
                   <button type="reset" class="btn btn-info"><i class="fa fa-refresh"></i>Reset</button>
        </div>
                   <div class="btn-group">
                   <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i>Tambah</button>
                  </div>
              </div>
              <!-- /.box-footer -->
            </form>
        </div>
        <div class="box-footer">
        <td>
          <div align ="Right"> <a  href="<?= base_url(); ?>kelas"  class="btn btn-danger" role="button" data-toggle="tooltip" title="Kembali"></i>Back</a></div>
        </td>
        </div>
        <div class="box-footer">
          Menambah Data Aanggota Perpustakaan, isi form diatas untuk menambahkan data Anggota. 
        </div><!-- box-footer -->
      </div><!-- /.box -->


    </section>
    <!-- /.content -->
  </div>

