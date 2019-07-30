<?php
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?>
<!-- tampilan form add data -->
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
  <i class="fa fa-edit icon-title"></i> Input pelanggan
  </h1>
  <ol class="breadcrumb">
    <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
    <li><a href="?module=pelanggan"> pelanggan </a></li>
    <li class="active"> Tambah </li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <!-- form start -->
        <form role="form" class="form-horizontal" action="modules/pelanggan/proses.php?act=insert" method="POST">
          <div class="box-body">
            <?php
            // fungsi untuk membuat id transaksi
            $query_id = mysqli_query($mysqli, "SELECT RIGHT(id_pelanggan,6) as kode FROM pelanggan
            ORDER BY id_pelanggan DESC LIMIT 1")
            or die('Ada kesalahan pada query tampil id_pelanggan : '.mysqli_error($mysqli));
            $count = mysqli_num_rows($query_id);
            if ($count <> 0) {
            // mengambil data kode_pelanggan
            $data_id = mysqli_fetch_assoc($query_id);
            $kode    = $data_id['kode']+1;
            } else {
            $kode = 1;
            }
            // buat kode_pelanggan
            $buat_id   = str_pad($kode, 6, "0", STR_PAD_LEFT);
            $id_pelanggan = "PLG-$buat_id";
            ?>
            <div class="form-group">
              <label class="col-sm-2 control-label">Id pelanggan</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="id_pelanggan" value="<?php echo $id_pelanggan; ?>" readonly required>
              </div>
            </div>
             <div class="form-group">
              <label class="col-sm-2 control-label">Nama pelanggan</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="nama_pelanggan" autocomplete="off" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">E -  Mail pelanggan</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="email_pelanggan" autocomplete="off" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Password pelanggan</label>
              <div class="col-sm-5">
                <input type="password" class="form-control" name="password_pelanggan" autocomplete="off" required>
              </div>
            </div>
          
            <div class="form-group">
              <label class="col-sm-2 control-label">No Telp</label>
              <div class="col-sm-5">
                <div class="input-group">
                  <span class="input-group-addon"></span>
                  <input type="text" class="form-control" id="no_telp" name="no_telp" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Alamat</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="alamat" autocomplete="off" required>
              </div>
            </div>
            
            
            </div><!-- /.box body -->
            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=pelanggan" class="btn btn-default btn-reset">Batal</a>
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
            // fungsi query untuk menampilkan data dari tabel pelanggan
            $query = mysqli_query($mysqli, "SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id]'")
            or die('Ada kesalahan pada query tampil Data pelanggan : '.mysqli_error($mysqli));
            $data  = mysqli_fetch_assoc($query);
            }
            ?>
            <!-- tampilan form edit data -->
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <h1>
              <i class="fa fa-edit icon-title"></i> Ubah pelanggan
              </h1>
              <ol class="breadcrumb">
                <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
                <li><a href="?module=pelanggan"> pelanggan </a></li>
                <li class="active"> Ubah </li>
              </ol>
            </section>
            <!-- Main content -->
            <section class="content">
              <div class="row">
                <div class="col-md-12">
                  <div class="box box-primary">
                    <!-- form start -->
                    <form role="form" class="form-horizontal" action="modules/pelanggan/proses.php?act=update" method="POST">
                      <div class="box-body">
                        
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Id pelanggan</label>
                          <div class="col-sm-5">
                            <input type="text" class="form-control" name="id_pelanggan" value="<?php echo $id_pelanggan; ?>" readonly required>
                          </div>
                        </div>
                        <div class="form-group">
              <label class="col-sm-2 control-label">Nama pelanggan</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="nama_pelanggan" autocomplete="off" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">E -  Mail pelanggan</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="email_pelanggan" autocomplete="off" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Password pelanggan</label>
              <div class="col-sm-5">
                <input type="password" class="form-control" name="password_pelanggan" autocomplete="off" required>
              </div>
            </div>
          
            <div class="form-group">
              <label class="col-sm-2 control-label">No Telp</label>
              <div class="col-sm-5">
                <div class="input-group">
                  <span class="input-group-addon"></span>
                  <input type="text" class="form-control" id="no_telp" name="no_telp" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Alamat</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="alamat" autocomplete="off" required>
              </div>
            </div>
                        
                        
                        </div><!-- /.box body -->
                        <div class="box-footer">
                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                              <a href="?module=pelanggan" class="btn btn-default btn-reset">Batal</a>
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