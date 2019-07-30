<?php
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?>
<!-- tampilan form add data -->
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
  <i class="fa fa-edit icon-title"></i> Input Data Ongkir
  </h1>
  <ol class="breadcrumb">
    <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
    <li><a href="?module=ongkir"> Data Ongkir </a></li>
    <li class="active"> Tambah </li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <!-- form start -->
        <form role="form" class="form-horizontal" action="modules/ongkir/proses.php?act=insert" method="POST">
          <div class="box-body">
            <?php
            // fungsi untuk membuat id transaksi
            $query_id = mysqli_query($mysqli, "SELECT RIGHT(id_ongkir,6) as kode FROM ongkir
            ORDER BY id_ongkir DESC LIMIT 1")
            or die('Ada kesalahan pada query tampil id_ongkir : '.mysqli_error($mysqli));
            $count = mysqli_num_rows($query_id);
            
            if ($count <> 0) {
            // mengambil data kode_ongkir
            $data_id = mysqli_fetch_assoc($query_id);
            $kode    = $data_id['kode']+1;
            } else {
            $kode = 1;
            }
            // buat kode_karyawan
            $buat_id   = str_pad($kode, 4, "0", STR_PAD_LEFT);
            $id_ongkir = "OKR-$buat_id";
            ?>
            <div class="form-group">
              <label class="col-sm-2 control-label">Kode ongkir</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="id_ongkir" value="<?php echo $id_ongkir; ?>" readonly required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Nama Ongkir</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="nama" required>
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">Nama Provinsi</label>
              <div class="col-sm-5">
                <select class="chosen-select" name="id_provinsi" data-placeholder="-- Pilih Provinsi --" onchange="tampil_provinsi(this)" autocomplete="off" required>
                  <option value=""></option>
                  <?php
                  $query_provinsi = mysqli_query($mysqli, "SELECT * FROM provinsi ORDER BY provinsi ASC")
                  or die('Ada kesalahan pada query tampil provinsi: '.mysqli_error($mysqli));
                  while ($data_provinsi = mysqli_fetch_assoc($query_provinsi)) {
                  echo"<option value=\"$data_provinsi[id_provinsi]\"> $data_provinsi[id_provinsi] | $data_provinsi[provinsi] </option>";
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Nama Kabupaten/Kota</label>
              <div class="col-sm-5">
                <select class="chosen-select" name="id_kabupaten" data-placeholder="-- Pilih Kabupaten/Kota --" onchange="tampil_kabupaten(this)" autocomplete="off" required>
                  <option value=""></option>
                  <?php
                  $query_kabupaten = mysqli_query($mysqli, "SELECT * FROM kabupaten ORDER BY kabupaten ASC")
                  or die('Ada kesalahan pada query tampil kabupaten: '.mysqli_error($mysqli));
                  while ($data_kabupaten = mysqli_fetch_assoc($query_kabupaten)) {
                  echo"<option value=\"$data_kabupaten[id_kabupaten]\"> $data_kabupaten[id_kabupaten] | $data_kabupaten[kabupaten] </option>";
                  }
                  ?>
                </select>
              </div>
            </div>

             <div class="form-group">
              <label class="col-sm-2 control-label">Nama Desa</label>
              <div class="col-sm-5">
                <select class="chosen-select" name="id_desa" data-placeholder="-- Pilih Desa --" onchange="tampil_desa(this)" autocomplete="off" required>
                  <option value=""></option>
                  <?php
                  $query_desa = mysqli_query($mysqli, "SELECT * FROM desa ORDER BY desa ASC")
                  or die('Ada kesalahan pada query tampil desa: '.mysqli_error($mysqli));
                  while ($data_desa = mysqli_fetch_assoc($query_desa)) {
                  echo"<option value=\"$data_desa[id_desa]\"> $data_desa[id_desa] | $data_desa[desa] </option>";
                  }
                  ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Harga Ongkir</label>
              <div class="col-sm-5">
                <div class="input-group">
                  <span class="input-group-addon"></span>
                  <input type="text" class="form-control" id="harga" name="harga" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" required>
                </div>
              </div>
            </div>
            
            </div><!-- /.box body -->
            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=ongkir" class="btn btn-default btn-reset">Batal</a>
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
            // fungsi query untuk menampilkan data dari tabel ongkir
            $query = mysqli_query($mysqli, "SELECT * FROM ongkir WHERE id_ongkir='$_GET[id]'")
            or die('Ada kesalahan pada query tampil Data ongkir : '.mysqli_error($mysqli));
            $data  = mysqli_fetch_assoc($query);
            }
            ?>
            <!-- tampilan form edit data -->
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <h1>
              <i class="fa fa-edit icon-title"></i> Ubah ongkir
              </h1>
              <ol class="breadcrumb">
                <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
                <li><a href="?module=ongkir"> ongkir </a></li>
                <li class="active"> Ubah </li>
              </ol>
            </section>
            <!-- Main content -->
            <section class="content">
              <div class="row">
                <div class="col-md-12">
                  <div class="box box-primary">
                    <!-- form start -->
                    <form role="form" class="form-horizontal" action="modules/ongkir/proses.php?act=update" method="POST">
                      <div class="box-body">
                        
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Kode ongkir</label>
                          <div class="col-sm-5">
                            <input type="text" class="form-control" name="id_ongkir" value="<?php echo $data['id_ongkir']; ?>" readonly required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Nama ongkir</label>
                          <div class="col-sm-5">
                            <input type="text" class="form-control" name="nama" value="<?php echo $data['nama']; ?>"required>
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Potongan ongkir</label>
                          <div class="col-sm-5">
                            <div class="input-group">
                              <span class="input-group-addon"></span>
                              <input type="text" class="form-control" id="potongan" name="potongan" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data['potongan']; ?>" required>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Status ongkir</label>
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
                              <a href="?module=ongkir" class="btn btn-default btn-reset">Batal</a>
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