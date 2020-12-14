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
      	<form class="form-horizontal" method="post"  action="<?= base_url(); ?>anggota/creatAnggota" role="form">
                    <div class="box-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Nama</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" name="nama" placeholder="Nama" required="required" >
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="col-sm-2 control-label">Gender</label>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <label class="form-check-label">
                              <input class="form-check-input" required="required" type="radio" name="jk" id="inlineRadio1" value="Laki-laki"> Laki - Laki
                            </label>
                          </div>
                          <div class="form-check form-check-inline">
                            <label class="form-check-label">
                              <input class="form-check-input" required="required" type="radio" name="jk" id="inlineRadio2" value="Perempuan"> Perempuan
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                       <label class="col-sm-2 control-label">Kelas</label>
                       <div class="col-sm-5">
      		               <select name="kelas" class="js-example-basic-single form-control" data-placeholder="Klik untuk memilih">
      		  				<option value="">&nbsp;</option>
                    <?php foreach ($data_kelas->result_array() as $data): ?>
                      <option value="<?= $data['id_kelas'] ?>"><?= $data['kelas'] ?></option>
                      
                    <?php endforeach ?>
              						</select>
      		      		</div>
                    </div>
                    <div class="form-group">
                       <label class="col-sm-2 control-label">Agama</label>
                       <div class="col-sm-5">
      		            <select  name="agama" class="js-example-basic-single form-control" data-placeholder="Klik untuk memilih">
      		  				<option value="">&nbsp;</option>
                    <?php foreach ($data_agama->result_array() as $data): ?>
                      <option value="<?= $data['id_agama'] ?>"><?= $data['agama'] ?></option>
                      
                    <?php endforeach ?>
      						</select>
      		      		</div>
                    </div>
                      
                       <div class="form-group">
                        <label class="col-sm-2 control-label">HP</label>
                        <div class="col-sm-4">
                          <input type="text" maxlength="15" required="required" class="form-control" name="hp" placeholder="No hp" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Alamat</label>
                        <div class="col-sm-5">
                         <textarea class="form-control" name="alamat" rows="4" placeholder="Alamat" required="required"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Keterangan</label>
                        <div class="col-sm-5">
                         <textarea class="form-control" name="ket" rows="4" placeholder="Keterangan"></textarea>
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
                         <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</button>
                        </div>
                    </div>
                    <!-- /.box-footer -->
                  </form>
        </div>
        <div class="box-footer">
        <td>
          <div align ="Right"> <a  href="<?= base_url(); ?>anggota/Anggota"  class="btn btn-danger" role="button" data-toggle="tooltip" title="Kembali"></i>Back</a></div>
        </td>
        </div>
        <div class="box-footer">
          Menambah Data Aanggota Perpustakaan, isi form diatas untuk menambahkan data Anggota. 
        </div><!-- box-footer -->
      </div><!-- /.box -->


    </section>
    <!-- /.content -->
  </div>

