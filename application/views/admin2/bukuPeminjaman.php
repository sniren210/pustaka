 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- header content -->
    <section class="content-header">
    	<h3>Tambah Peminjamann</h3>
    	<form class="form-inline">
		  <div class="form-group mb-2">
		    <label for="staticEmail2" class="sr-only">Email</label>
		    <input type="text" class="form-control" id="staticEmail2" value="email@example.com">
		  </div>
		  <div class="form-group mx-sm-3 mb-2">
		    <label for="inputPassword2" class="sr-only">Password</label>
		    <input type="password" class="form-control" id="inputPassword2" placeholder="Password">
		  </div>
		  <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
		</form>
    </section>
    

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h2>Buku Peminjaman</h2>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Aksi</th>
                  <th>Judul</th>
                  <th>Sinopsis</th>
                  <th>Kategori</th>
                  <th>Thumbnail</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Other browsers</td>
                  <td>
                    <form>
                      <button type="button" class="btn btn-danger btn-sm">Hapus</button>
                      <button type="button" class="btn btn-info btn-sm">Detail</button>
                    </form>
                  </td>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

    
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>


<!-- jQuery 2.2.3 -->
<script src="<?= base_url('assets/') ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

