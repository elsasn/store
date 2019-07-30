<?php
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?>
<!-- tampilan form add data -->
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
  <i class="fa fa-edit icon-title"></i> Input Data Kategori
  </h1>
  <ol class="breadcrumb">
    <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
    <li><a href="?module=kategori"> Data Kategori </a></li>
    <li class="active"> Tambah </li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <!-- form start -->
        <form role="form" class="form-horizontal" action="modules/kategori/proses.php?act=insert" method="POST">
          <div class="box-body">
            <?php
            // fungsi untuk membuat id transaksi
            $query_id = mysqli_query($mysqli, "SELECT RIGHT(id_kategori,6) as kode FROM kategori
            ORDER BY id_kategori DESC LIMIT 1")
            or die('Ada kesalahan pada query tampil id_kategori : '.mysqli_error($mysqli));
            $count = mysqli_num_rows($query_id);
            
            if ($count <> 0) {
            // mengambil data kode_kategori
            $data_id = mysqli_fetch_assoc($query_id);
            $kode    = $data_id['kode']+1;
            } else {
            $kode = 1;
            }
            // buat kode_karyawan
            $buat_id   = str_pad($kode, 4, "0", STR_PAD_LEFT);
            $id_kategori = "KTG-$buat_id";
            ?>
            <div class="form-group">
              <label class="col-sm-2 control-label">ID Kategori</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="id_kategori" value="<?php echo $id_kategori; ?>" readonly required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Nama kategori</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="nama" required>
              </div>
            </div>
            
            
            </div><!-- /.box body -->
            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=kategori" class="btn btn-default btn-reset">Batal</a>
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
            // fungsi query untuk menampilkan data dari tabel kategori
            $query = mysqli_query($mysqli, "SELECT * FROM kategori WHERE id_kategori='$_GET[id]'")
            or die('Ada kesalahan pada query tampil Data kategori : '.mysqli_error($mysqli));
            $data  = mysqli_fetch_assoc($query);
            }
            ?>
            <!-- tampilan form edit data -->
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <h1>
              <i class="fa fa-edit icon-title"></i> Ubah kategori
              </h1>
              <ol class="breadcrumb">
                <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
                <li><a href="?module=kategori"> kategori </a></li>
                <li class="active"> Ubah </li>
              </ol>
            </section>
            <!-- Main content -->
            <section class="content">
              <div class="row">
                <div class="col-md-12">
                  <div class="box box-primary">
                    <!-- form start -->
                    <form role="form" class="form-horizontal" action="modules/kategori/proses.php?act=update" method="POST">
                      <div class="box-body">
                        
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Id kategori</label>
                          <div class="col-sm-5">
                            <input type="text" class="form-control" name="id_kategori" value="<?php echo $data['id_kategori']; ?>" readonly required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Nama Jurusan</label>
                          <div class="col-sm-5">
                            <select class="form-control" name="nama_jurusan" required>
                              <option value=""></option>
                              <option value="JOGJA-PURWOREJO ">JOGJA-PURWOREJO </option>
                              <option value="JOGJA-KEBUMEN">JOGJA-KEBUMEN</option>
                              <option value="JOGJA-WANGON">JOGJA-WANGON</option>
                              <option value="JOGJA-KR.PCUNG">JOGJA-KR.PCUNG</option>
                              <option value="JOGJA-MAJENANG ">JOGJA-MAJENANG </option>
                              <option value="JOGJA-WANAREJA">JOGJA-WANAREJA</option>
                              <option value="JOGJA-SIDAREJA/KW.ANTEN">JOGJA-SIDAREJA/KW.ANTEN</option>
                              <option value="JOGJA- RAWAAPU/PATIMUAN/MINGGUAN">JOGJA- RAWAAPU/PATIMUAN/MINGGUAN</option>
                              <option value="JOGJA-XPCANG">JOGJA-XPCANG </option>
                              <option value="JOGJA-PANGANDARAN">JOGJA-PANGANDARAN</option>
                              <option value="WANGON-KR.PCUNG">WANGON-KR.PCUNG</option>
                              <option value="WANGON-MAJENANG">WANGON-MAJENANG</option>
                              <option value="WANGON-WANAREJA ">WANGON-WANAREJA </option>
                              <option value="WANGON- SIDAREJA/KW.ANTEN">WANGON- SIDAREJA/KW.ANTEN</option>
                              <option value="WANGON- RAWAAPU/PATIMUAN/MINGGUAN">WANGON- RAWAAPU/PATIMUAN/MINGGUAN</option>
                              <option value="WANGON-XPCANG">WANGON-XPCANG</option>
                              <option value="WANGON-PANGANDARAN ">WANGON-PANGANDARAN </option>
                              <option value="MAJENANG-WANAREJA">MAJENANG-WANAREJA</option>
                              <option value="MAJENANG- KR.PCUNG">MAJENANG- KR.PCUNG</option>
                              <option value="MAJENANG -WANGON">MAJENANG -WANGON</option>
                              <option value="MAJENANG - KEBUMEN">MAJENANG - KEBUMEN </option>
                              <option value="MAJENANG - PURWOREJO">MAJENANG - PURWOREJO</option>
                              <option value="MAJENANG -JOGJA">MAJENANG -JOGJA</option>
                              <option value="WANAREJA- MAJENANG ">WANAREJA- MAJENANG </option>
                              <option value="WANAREJA-KR.PCUNG ">WANAREJA-KR.PCUNG </option>
                              <option value="WANAREJA -WANGON">WANAREJA -WANGON</option>
                              <option value="WANAREJA - KEBUMEN">WANAREJA - KEBUMEN</option>
                              <option value="WANAREJA - PURWOREJO">WANAREJA - PURWOREJO</option>
                              <option value="WANAREJA–JOGJA ">WANAREJA–JOGJA </option>
                              <option value="SIDAREJA/KW.ANTEN-RAWAAPU/PATIMUAN/MINGGUAN">SIDAREJA/KW.ANTEN-RAWAAPU/PATIMUAN/MINGGUAN</option>
                              <option value="SIDAREJA/KW.ANTEN-XPCANG">SIDAREJA/KW.ANTEN-XPCANG</option>
                              <option value="SIDAREJA/KW.ANTEN-PANGANDARAN">SIDAREJA/KW.ANTEN-PANGANDARAN</option>
                              <option value="SIDAREJA/KW.ANTEN-WANGON">SIDAREJA/KW.ANTEN-WANGON </option>
                              <option value="SIDAREJA/KW.ANTEN-KEBUMEN">SIDAREJA/KW.ANTEN-KEBUMEN</option>
                              <option value="SIDAREJA/KW.ANTEN-PURWOREJO ">SIDAREJA/KW.ANTEN-PURWOREJO </option>
                              <option value="SIDAREJA/KW.ANTEN-JOGJA">SIDAREJA/KW.ANTEN-JOGJA</option>
                              <option value="PANGANDARAN- XPCANG">PANGANDARAN- XPCANG</option>
                              <option value="PANGANDARAN - RAWAAPU/PATIMUAN/MINGGUAN">PANGANDARAN - RAWAAPU/PATIMUAN/MINGGUAN</option>
                              <option value="PANGANDARAN - SIDAREJA/KW.ANTEN ">PANGANDARAN - SIDAREJA/KW.ANTEN </option>
                              <option value="PANGANDARAN - WANGON">PANGANDARAN - WANGON</option>
                              <option value="PANGANDARAN - KEBUMEN">PANGANDARAN - KEBUMEN</option>
                              <option value="PANGANDARAN - JOGJA">PANGANDARAN - JOGJA</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Harga</label>
                          <div class="col-sm-5">
                            <input type="text" class="form-control" name="harga" autocomplete="off" value="<?php echo $data['harga']; ?>" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Jam Berangkat</label>
                          <div class="col-sm-5">
                            <select class="form-control" name="jam_berangkat" required>
                              <option value=""></option>
                              <option value="09:00">09:00</option>
                              <option value="20:00">20:00</option>
                              <option value="10:00">10:00</option>
                              <option value="22:00">22:00</option>
                              <option value="08:30">08:30</option>
                              <option value="20:30">20:30</option>
                              <option value="07:30">07:30</option>
                              <option value="19:30">19:30</option>
                              <option value="20:00">20:00</option>
                              <option value="07:00">07:00</option>
                              <option value="18:30">18:30</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Kapasitas</label>
                          <div class="col-sm-5">
                            <input type="text" class="form-control" name="kapasitas" autocomplete="off" value="<?php echo $data['kapasitas']; ?>"required>
                          </div>
                        </div>
                        
                        </div> <!-- /.box body -->
                        <div class="box-footer">
                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                              <a href="?module=kategori" class="btn btn-default btn-reset">Batal</a>
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