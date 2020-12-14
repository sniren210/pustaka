
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- Button trigger modal -->
    <section class="content-header">
      <button type="button" class="btn btn-primary btn-lg " data-toggle="modal" data-target="#exampleModal">
        Tambah Data buku
      </button>
    </section>
    

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h2>Data Table Buku</h2>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Aksi</th>
                  <th>Kondisi</th>
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
                      <button type="button" class="btn btn-success btn-sm">Update</button>
                      <button type="button" class="btn btn-info btn-sm">Detail</button>
                    </form>
                  </td>
                  <td>-</td>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h3 class="modal-title" id="exampleModalLabel">Form Tambah Data Buku</h3>
          </div>
          <div class="modal-body">
            <?= form_open_multipart('admin/tambahbuku'); ?>
              <div class="form-group">
                <label for="exampleFormControlInput1">Judul Buku</label>
                <input type="text" name="judul" class="form-control" id="exampleFormControlInput1">
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Kategori Buku</label>
                <select class="form-control" name="kategori" id="exampleFormControlSelect1">
                  <option>Pendidikan</option>
                  <option>Novel</option>
                  <option>Komik</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Sinopsis Buku</label>
                <textarea class="form-control" name="sinopsis" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>
                <div class="form-group">
                  <label for="exampleFormControlFile1">Thumbnail Buku</label>
                  <input type="file" name="thumbnail" class="form-control-file" id="exampleFormControlFile1">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
            </form>
        </div>
      </div>
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

