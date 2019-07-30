
 <?php  
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?> 
  <!-- tampilan form add data -->
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Input Karyawan
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=karyawan"> karyawan </a></li>
      <li class="active"> Tambah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/karyawan/proses.php?act=insert" method="POST">
            <div class="box-body">
              <?php  
              // fungsi untuk membuat id transaksi
              $query_id = mysqli_query($mysqli, "SELECT RIGHT(id_karyawan,6) as kode FROM data_karyawan
                                                ORDER BY id_karyawan DESC LIMIT 1")
                                                or die('Ada kesalahan pada query tampil id_karyawan : '.mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {
                  // mengambil data kode_karyawan
                  $data_id = mysqli_fetch_assoc($query_id);
                  $kode    = $data_id['kode']+1;
              } else {
                  $kode = 1;
              }

              // buat kode_karyawan
              $buat_id   = str_pad($kode, 6, "0", STR_PAD_LEFT);
              $id_karyawan = "KRY-$buat_id";
              ?>

              <div class="form-group">
                <label class="col-sm-2 control-label">Id karyawan</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="id_karyawan" value="<?php echo $id_karyawan; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nama karyawan</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nama_karyawan" autocomplete="off" required>
                </div>
              </div>


               <div class="form-group">
                <label class="col-sm-2 control-label">Jabatan</label>
                <div class="col-sm-5">
                  <select class="form-control" name="jabatan" required>
                    <option value=""></option>
                    <option value="Super Admin">Super Admin</option>
                    <option value="Owner">Owner</option>
                    <option value="Operator">Operator</option>
                    <option value="Manajer">Manajer</option>
                   
                  </select>
                </div>
              </div>

               <div class="form-group">
                <label class="col-sm-2 control-label">Jenis Kelamin</label>
                <div class="col-sm-5">
                  <select class="form-control" name="jenis_kelamin" required>
                    <option value=""></option>
                    <option value="Perempuan">Perempuan</option>
                    <option value="Laki - Laki">Laki - Laki</option>
                  </select>
                </div>
              </div>

               <div class="form-group">
                <label class="col-sm-2 control-label">Alamat</label>
                <div class="col-sm-5">
                  <input type="textarea" class="form-control" name="alamat" autocomplete="off" required>
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

              

              

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=karyawan" class="btn btn-default btn-reset">Batal</a>
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
      // fungsi query untuk menampilkan data dari tabel karyawan
      $query = mysqli_query($mysqli, "SELECT * FROM data_karyawan WHERE id_karyawan='$_GET[id]'") 
                                      or die('Ada kesalahan pada query tampil Data karyawan : '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>
  <!-- tampilan form edit data -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Ubah karyawan
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=karyawan"> karyawan </a></li>
      <li class="active"> Ubah </li>
    </ol>
  </section>

  <!-- Main content -->

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/karyawan/proses.php?act=update" method="POST">
            <div class="box-body">
             
              <div class="form-group">
                <label class="col-sm-2 control-label">Id karyawan</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="id_karyawan" value="<?php echo $data['id_karyawan']; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nama karyawan</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nama_karyawan" autocomplete="off" value="<?php echo $data['nama_karyawan']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Jabatan</label>
                <div class="col-sm-5">
                  <select class="form-control" name="jabatan" required>
                    <option value=""></option>
                    <option value="Super Admin">Super Admin</option>
                    <option value="Owner">Owner</option>
                    <option value="Operator">Operator</option>
                    <option value="Manajer">Manajer</option>
                   
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Jenis Kelamin</label>
                <div class="col-sm-5">
                  <select class="form-control" name="jenis_kelamin" required>
                    <option value=""></option>
                    <option value="Perempuan">Perempuan</option>
                    <option value="Laki - Laki">Laki - Laki</option>
                  </select>
                </div>
              </div>

               <div class="form-group">
                <label class="col-sm-2 control-label">Alamat</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="alamat" autocomplete="off" value="<?php echo $data['alamat']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">No Telp</label>
                <div class="col-sm-5">
                  <div class="input-group">
                    <span class="input-group-addon"></span>
                    <input type="text" class="form-control" id="no_telp" name="no_telp" autocomplete="off"  onKeyPress="return goodchars(event,'0123456789',this)"  value="<?php echo $data['no_telp']; ?>" required>
                  </div>
                </div>
              </div>

              

              

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=karyawan" class="btn btn-default btn-reset">Batal</a>
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