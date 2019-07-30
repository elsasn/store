<?php
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?>
<!-- tampilan form add data -->
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
  <i class="fa fa-edit icon-title"></i> Input Data Diskon
  </h1>
  <ol class="breadcrumb">
    <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
    <li><a href="?module=diskon"> Data Diskon </a></li>
    <li class="active"> Tambah </li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <!-- form start -->
        <form role="form" class="form-horizontal" action="modules/diskon/proses.php?act=insert" method="POST">
          <div class="box-body">
            <?php
            // fungsi untuk membuat id transaksi
            $query_id = mysqli_query($mysqli, "SELECT RIGHT(id_diskon,6) as kode FROM diskon
            ORDER BY id_diskon DESC LIMIT 1")
            or die('Ada kesalahan pada query tampil id_diskon : '.mysqli_error($mysqli));
            $count = mysqli_num_rows($query_id);
            
            if ($count <> 0) {
            // mengambil data kode_diskon
            $data_id = mysqli_fetch_assoc($query_id);
            $kode    = $data_id['kode']+1;
            } else {
            $kode = 1;
            }
            // buat kode_karyawan
            $buat_id   = str_pad($kode, 4, "0", STR_PAD_LEFT);
            $id_diskon = "DISC-$buat_id";
            ?>
            <div class="form-group">
              <label class="col-sm-2 control-label">Kode Diskon</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="id_diskon" value="<?php echo $id_diskon; ?>" readonly required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Nama Diskon</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="nama" required>
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">Potongan Diskon</label>
              <div class="col-sm-5">
                <div class="input-group">
                  <span class="input-group-addon"></span>
                  <input type="text" class="form-control" id="potongan" name="potongan" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Status diskon</label>
              <div class="col-sm-5">
                <div class="input-group">
                  <select class="form-control" name="status" required>
                    
                    <option value="Aktif">Aktif</option>
                    <option value="Tidak Aktif">Tidak Aktif</option>
                    
                  </select>
                </div>
              </div>
            </div>
            
            </div><!-- /.box body -->
            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=diskon" class="btn btn-default btn-reset">Batal</a>
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
            // fungsi query untuk menampilkan data dari tabel diskon
            $query = mysqli_query($mysqli, "SELECT * FROM diskon WHERE id_diskon='$_GET[id]'")
            or die('Ada kesalahan pada query tampil Data diskon : '.mysqli_error($mysqli));
            $data  = mysqli_fetch_assoc($query);
            }
            ?>
            <!-- tampilan form edit data -->
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <h1>
              <i class="fa fa-edit icon-title"></i> Ubah diskon
              </h1>
              <ol class="breadcrumb">
                <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
                <li><a href="?module=diskon"> diskon </a></li>
                <li class="active"> Ubah </li>
              </ol>
            </section>
            <!-- Main content -->
            <section class="content">
              <div class="row">
                <div class="col-md-12">
                  <div class="box box-primary">
                    <!-- form start -->
                    <form role="form" class="form-horizontal" action="modules/diskon/proses.php?act=update" method="POST">
                      <div class="box-body">
                        
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Kode Diskon</label>
                          <div class="col-sm-5">
                            <input type="text" class="form-control" name="id_diskon" value="<?php echo $data['id_diskon']; ?>" readonly required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Nama Diskon</label>
                          <div class="col-sm-5">
                            <input type="text" class="form-control" name="nama" value="<?php echo $data['nama']; ?>"required>
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Potongan Diskon</label>
                          <div class="col-sm-5">
                            <div class="input-group">
                              <span class="input-group-addon"></span>
                              <input type="text" class="form-control" id="potongan" name="potongan" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data['potongan']; ?>" required>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Status diskon</label>
                          <div class="col-sm-5">
                            <div class="input-group">
                              <select class="form-control" name="status" required>
                                
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                                
                              </select>
                            </div>
                          </div>
                        </div>
                        
                        </div> <!-- /.box body -->
                        <div class="box-footer">
                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                              <a href="?module=diskon" class="btn btn-default btn-reset">Batal</a>
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