<?php
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?>
<!-- tampilan form add data -->
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
  <i class="fa fa-edit icon-title"></i> Input Data kabupaten
  </h1>
  <ol class="breadcrumb">
    <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
    <li><a href="?module=kabupaten"> Data kabupaten </a></li>
    <li class="active"> Tambah </li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <!-- form start -->
        <form role="form" class="form-horizontal" action="modules/kabupaten/proses.php?act=insert"  method="POST" enctype="multipart/form-data">
          <div class="box-body">
            <div class="form-group">
              <label class="col-sm-2 control-label">ID kabupaten</label>
              <div class="col-sm-5">
                <input type="number" class="form-control" name="id" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Province Name</label>
              <div class="col-sm-5">
                <select class="chosen-select" name="province_id" data-placeholder="-- Pilih Provinsi --" onchange="tampil_provinsi(this)" autocomplete="off" required>
                  <option value=""></option>
                  <?php
                  $query_provinsi = mysqli_query($mysqli, "SELECT id, name FROM provinces ORDER BY name ASC")
                  or die('Ada kesalahan pada query tampil provinsi: '.mysqli_error($mysqli));
                  while ($data_provinsi = mysqli_fetch_assoc($query_provinsi)) {
                  echo"<option value=\"$data_provinsi[id]\"> $data_provinsi[id] | $data_provinsi[name] </option>";
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Nama Kabupaten</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="name" required>
              </div>
            </div>
            
            </div><!-- /.box body -->
            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=kabupaten" class="btn btn-default btn-reset">Batal</a>
                </div>
              </div>
              </div><!-- /.box footer -->
            </form>
            </div><!-- /.box -->
            </div><!--/.col -->
            </div>   <!-- /.row -->
            </section><!-- /.content -->
            <?php
            }
            // jika form edit data yang dipilih
            // isset : cek data ada / tidak
            elseif ($_GET['form']=='edit') {
            if (isset($_GET['id'])) {
            // fungsi query untuk menampilkan data dari tabel kabupaten
            $query = mysqli_query($mysqli, "SELECT * FROM provinces WHERE id='$_GET[id]'")
            or die('Ada kesalahan pada query tampil Data kabupaten : '.mysqli_error($mysqli));
            $data  = mysqli_fetch_assoc($query);
            }
            ?>
            <!-- tampilan form edit data -->
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <h1>
              <i class="fa fa-edit icon-title"></i> Ubah kabupaten
              </h1>
              <ol class="breadcrumb">
                <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
                <li><a href="?module=kabupaten"> kabupaten </a></li>
                <li class="active"> Ubah </li>
              </ol>
            </section>
            <!-- Main content -->
            <section class="content">
              <div class="row">
                <div class="col-md-12">
                  <div class="box box-primary">
                    <!-- form start -->
                    <form role="form" class="form-horizontal" action="modules/kabupaten/proses.php?act=update" method="POST">
                      <div class="box-body">
                        
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Id kabupaten</label>
                          <div class="col-sm-5">
                            <input type="number" class="form-control" name="id" value="<?php echo $data['id']; ?>" readonly required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Province Name</label>
                          <div class="col-sm-5">
                            <select class="chosen-select" name="province_id" data-placeholder="-- Pilih Provinsi --" onchange="tampil_provinsi(this)" autocomplete="off" required>
                              <option value=""></option>
                              <?php
                              $query_provinsi = mysqli_query($mysqli, "SELECT id, name FROM provinces ORDER BY name ASC")
                              or die('Ada kesalahan pada query tampil provinsi: '.mysqli_error($mysqli));
                              while ($data_provinsi = mysqli_fetch_assoc($query_provinsi)) {
                              echo"<option value=\"$data_provinsi[id]\"> $data_provinsi[id] | $data_provinsi[name] </option>";
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Nama Kabupaten</label>
                          <div class="col-sm-5">
                            <input type="text" class="form-control" name="name" required>
                          </div>
                        </div>
                        
                        </div> <!-- /.box body -->
                        <div class="box-footer">
                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                              <a href="?module=kabupaten" class="btn btn-default btn-reset">Batal</a>
                            </div>
                          </div>
                          </div><!-- /.box footer -->
                        </form>
                        </div><!-- /.box -->
                        </div><!--/.col -->
                        </div>   <!-- /.row -->
                        </section><!-- /.content -->
                        <?php
                        }
                        ?>