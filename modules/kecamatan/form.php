<?php
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?>
<!-- tampilan form add data -->
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
  <i class="fa fa-edit icon-title"></i> Input Data kecamatan
  </h1>
  <ol class="breadcrumb">
    <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
    <li><a href="?module=kecamatan"> Data kecamatan </a></li>
    <li class="active"> Tambah </li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <!-- form start -->
        <form role="form" class="form-horizontal" action="modules/kecamatan/proses.php?act=insert"  method="POST" enctype="multipart/form-data">
          <div class="box-body">
            <div class="form-group">
              <label class="col-sm-2 control-label">ID Kecamatan</label>
              <div class="col-sm-5">
                <input type="number" class="form-control" name="id" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Regencies Name</label>
              <div class="col-sm-5">
                <select class="chosen-select" name="regency_id" data-placeholder="-- Pilih Regency --" onchange="tampil_kabupaten(this)" autocomplete="off" required>
                  <option value=""></option>
                  <?php
                  $query_kabupaten = mysqli_query($mysqli, "SELECT id, name FROM regencies ORDER BY name ASC")
                  or die('Ada kesalahan pada query tampil kabupaten: '.mysqli_error($mysqli));
                  while ($data_kabupaten = mysqli_fetch_assoc($query_kabupaten)) {
                  echo"<option value=\"$data_kabupaten[id]\"> $data_kabupaten[id] | $data_kabupaten[name] </option>";
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Nama kecamatan</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="name" required>
              </div>
            </div>
            
            </div><!-- /.box body -->
            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=kecamatan" class="btn btn-default btn-reset">Batal</a>
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
            // fungsi query untuk menampilkan data dari tabel kecamatan
            $query = mysqli_query($mysqli, "SELECT * FROM provinces WHERE id='$_GET[id]'")
            or die('Ada kesalahan pada query tampil Data kecamatan : '.mysqli_error($mysqli));
            $data  = mysqli_fetch_assoc($query);
            }
            ?>
            <!-- tampilan form edit data -->
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <h1>
              <i class="fa fa-edit icon-title"></i> Ubah kecamatan
              </h1>
              <ol class="breadcrumb">
                <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
                <li><a href="?module=kecamatan"> kecamatan </a></li>
                <li class="active"> Ubah </li>
              </ol>
            </section>
            <!-- Main content -->
            <section class="content">
              <div class="row">
                <div class="col-md-12">
                  <div class="box box-primary">
                    <!-- form start -->
                    <form role="form" class="form-horizontal" action="modules/kecamatan/proses.php?act=update" method="POST">
                      <div class="box-body">
                        
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Id kecamatan</label>
                          <div class="col-sm-5">
                            <input type="number" class="form-control" name="id" value="<?php echo $data['id']; ?>" readonly required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Province Name</label>
                          <div class="col-sm-5">
                            <select class="chosen-select" name="province_id" data-placeholder="-- Pilih Regency --" onchange="tampil_kabupaten(this)" autocomplete="off" required>
                              <option value=""></option>
                              <?php
                              $query_kabupaten = mysqli_query($mysqli, "SELECT id, name FROM regencies ORDER BY name ASC")
                              or die('Ada kesalahan pada query tampil kabupaten: '.mysqli_error($mysqli));
                              while ($data_kabupaten = mysqli_fetch_assoc($query_kabupaten)) {
                              echo"<option value=\"$data_kabupaten[id]\"> $data_kabupaten[id] | $data_kabupaten[name] </option>";
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Nama kecamatan</label>
                          <div class="col-sm-5">
                            <input type="text" class="form-control" name="name" required>
                          </div>
                        </div>
                        
                        </div> <!-- /.box body -->
                        <div class="box-footer">
                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                              <a href="?module=kecamatan" class="btn btn-default btn-reset">Batal</a>
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