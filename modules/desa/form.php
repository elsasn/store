<?php
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?>
<!-- tampilan form add data -->
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
  <i class="fa fa-edit icon-title"></i> Input Data Desa
  </h1>
  <ol class="breadcrumb">
    <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
    <li><a href="?module=desa"> Data Desa </a></li>
    <li class="active"> Tambah </li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <!-- form start -->
        <form role="form" class="form-horizontal" action="modules/desa/proses.php?act=insert"  method="POST" enctype="multipart/form-data">
          <div class="box-body">
            <div class="form-group">
              <label class="col-sm-2 control-label">ID desa</label>
              <div class="col-sm-5">
                <input type="number" class="form-control" name="id" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">District Name</label>
              <div class="col-sm-5">
                <select class="chosen-select" name="district_id" data-placeholder="-- Pilih Kecamatan --" onchange="tampil_kecamatan(this)" autocomplete="off" required>
                  <option value=""></option>
                  <?php
                  $query_kecamatan = mysqli_query($mysqli, "SELECT id, name FROM districts ORDER BY name ASC")
                  or die('Ada kesalahan pada query tampil kecamatan: '.mysqli_error($mysqli));
                  while ($data_kecamatan = mysqli_fetch_assoc($query_kecamatan)) {
                  echo"<option value=\"$data_kecamatan[id]\"> $data_kecamatan[id] | $data_kecamatan[name] </option>";
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Nama Desa</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="name" required>
              </div>
            </div>
            
            </div><!-- /.box body -->
            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=desa" class="btn btn-default btn-reset">Batal</a>
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
            // fungsi query untuk menampilkan data dari tabel desa
            $query = mysqli_query($mysqli, "SELECT * FROM provinces WHERE id='$_GET[id]'")
            or die('Ada kesalahan pada query tampil Data desa : '.mysqli_error($mysqli));
            $data  = mysqli_fetch_assoc($query);
            }
            ?>
            <!-- tampilan form edit data -->
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <h1>
              <i class="fa fa-edit icon-title"></i> Ubah desa
              </h1>
              <ol class="breadcrumb">
                <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
                <li><a href="?module=desa"> desa </a></li>
                <li class="active"> Ubah </li>
              </ol>
            </section>
            <!-- Main content -->
            <section class="content">
              <div class="row">
                <div class="col-md-12">
                  <div class="box box-primary">
                    <!-- form start -->
                    <form role="form" class="form-horizontal" action="modules/desa/proses.php?act=update" method="POST">
                      <div class="box-body">
                        
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Id desa</label>
                          <div class="col-sm-5">
                            <input type="number" class="form-control" name="id" value="<?php echo $data['id']; ?>" readonly required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">District Name</label>
                          <div class="col-sm-5">
                            <select class="chosen-select" name="district_id" data-placeholder="-- Pilih Kecamatan --" onchange="tampil_kecamatan(this)" autocomplete="off" required>
                              <option value=""></option>
                              <?php
                              $query_kecamatan = mysqli_query($mysqli, "SELECT id, name FROM districts ORDER BY name ASC")
                              or die('Ada kesalahan pada query tampil kecamatan: '.mysqli_error($mysqli));
                              while ($data_kecamatan = mysqli_fetch_assoc($query_kecamatan)) {
                              echo"<option value=\"$data_kecamatan[id]\"> $data_kecamatan[id] | $data_kecamatan[name] </option>";
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Nama Desa</label>
                          <div class="col-sm-5">
                            <input type="text" class="form-control" name="name" required>
                          </div>
                        </div>
                        
                        </div> <!-- /.box body -->
                        <div class="box-footer">
                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                              <a href="?module=desa" class="btn btn-default btn-reset">Batal</a>
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