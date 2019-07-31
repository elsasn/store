<!-- favicon -->
<link rel="shortcut icon" href="assets/img/favicon.png">
<!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="assets/plugins/DataTables/css/dataTables.bootstrap4.min.css">
<!-- datepicker CSS -->
<link rel="stylesheet" type="text/css" href="assets/plugins/datepicker/css/datepicker.min.css">
<!-- Font Awesome CSS -->
<link rel="stylesheet" type="text/css" href="assets/plugins/fontawesome-free-5.4.1-web/css/all.min.css">
<!-- Sweetalert CSS -->
<link rel="stylesheet" type="text/css" href="assets/plugins/sweetalert/css/sweetalert.css">
<!-- Custom CSS -->
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<!-- Fungsi untuk membatasi karakter yang diinputkan -->
<script type="text/javascript" src="assets/js/fungsi_validasi_karakter.js"></script>
<?php
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?>
<!-- tampilan form add data -->
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
  <i class="fa fa-edit icon-title"></i> Data Transaksi Pembelian
  </h1>
  <ol class="breadcrumb">
    <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
    <li><a href="?module=pembelian"> Data Transaksi pembelian </a></li>
    <li class="active"> Tambah </li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <!-- form start -->
        <form role="form" class="form-horizontal" action="modules/pembelian/proses1.php?act=insert" method="POST" name="formpembelian">
          <div class="box-body">
            <?php
            // fungsi untuk membuat kode transaksi
            $query_id = mysqli_query($mysqli, "SELECT RIGHT(id_pembelian,4) as kode FROM pembelian
            ORDER BY id_pembelian DESC LIMIT 1")
            or die('Ada kesalahan pada query tampil id_trans_pembelian : '.mysqli_error($mysqli));
            $count = mysqli_num_rows($query_id);
            if ($count <> 0) {
            // mengambil data kode transaksi
            $data_id = mysqli_fetch_assoc($query_id);
            // print_r(ceil($data_id['kode']));die();
            $kode    = ceil($data_id['kode'])+1;
            } else {
            $kode = 1;
            }
            // buat kode_transaksi
            $tahun          = date("Y");
            $buat_id        = str_pad($kode, 4, "0", STR_PAD_LEFT);
            $id_pembelian = "PM-$tahun-$buat_id";
            ?>
            <div class="form-group">
              <label class="col-sm-2 control-label">ID Pembelian</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="id_pembelian" value="<?php echo $id_pembelian; ?>" readonly required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">ID Pelanggan</label>
              <div class="col-sm-5">
                <select class="chosen-select" name="id_pelanggan" data-placeholder="-- Pilih Pelanggan --" onchange="tampil_pelanggan(this)" autocomplete="off" required>
                  <option value=""></option>
                  <?php
                  $query_pelanggan = mysqli_query($mysqli, "SELECT id_pelanggan, nama_pelanggan FROM pelanggan ORDER BY nama_pelanggan ASC")
                  or die('Ada kesalahan pada query tampil pelanggan: '.mysqli_error($mysqli));
                  while ($data_pelanggan = mysqli_fetch_assoc($query_pelanggan)) {
                  echo"<option value=\"$data_pelanggan[id_pelanggan]\"> $data_pelanggan[id_pelanggan] | $data_pelanggan[nama_pelanggan] </option>";
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Tgl Transaksi</label>
              <div class="col-sm-5">
                <input type="date" class="form-control" id="tgl_transaksi"  name="tgl_transaksi" value="<?php echo date('Y-m-d') ?>"  required>
              </div>
            </div>
            <hr>
            <div class="form-group">
              <label class="col-sm-2 control-label">ID produk</label>
              <div class="col-sm-5">
                <select class="chosen-select" id="id_produk" name="id_produk" data-placeholder="-- Pilih produk --"  autocomplete="off" required>
                  <option value=""></option>
                  <?php
                  $query_pelanggan = mysqli_query($mysqli, "SELECT id_produk, nama FROM produk ORDER BY nama ASC")
                  or die('Ada kesalahan pada query tampil produk: '.mysqli_error($mysqli));
                  while ($data_produk = mysqli_fetch_assoc($query_pelanggan)) {
                  echo"<option value=\"$data_produk[id_produk]\"> $data_produk[id_produk] | $data_produk[nama] </option>";
                  }
                  ?>
                </select>
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">Harga</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" id="harga"  name="harga" onchange="subtotal()"  required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Jumlah Tiket</label>
              <div class="col-sm-5" id="jumlah_div">
                <input type="number" class="form-control" id="jumlah"  name="jumlah" required data-max="0">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Subtotal</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" id="subtotal"  name="subtotal" value=""  required>
              </div>
            </div>
           
            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=pelanggan" class="btn btn-default btn-reset">Batal</a>
                </div>
              </div>
              </div><!-- /.box footer -->
              </h1>
              
              <!-- Modal Footer -->
            </div>
          </div>
        </div>
        </div><!-- /.box body -->
      </form>
    </div>
  </div>
</section>

<?php
}
// jika form edit data yang dipilih
// isset : cek data ada / tidak
elseif ($_GET['form']=='edit') { 
  if (isset($_GET['id'])) {
      // fungsi query untuk menampilkan data dari tabel pelanggan
      $query = mysqli_query($mysqli, "SELECT * FROM pembelian WHERE id_pembelian='$_GET[id]'") 
                                      or die('Ada kesalahan pada query tampil Data pelanggan : '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>
  <!-- tampilan form edit data -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Ubah Pembelian
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=pembelian"> Pembelian </a></li>
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
            <?php
            // fungsi untuk membuat kode transaksi
            $query_id = mysqli_query($mysqli, "SELECT RIGHT(id_pembelian,4) as kode FROM pembelian
            ORDER BY id_pembelian DESC LIMIT 1")
            or die('Ada kesalahan pada query tampil id_trans_pembelian : '.mysqli_error($mysqli));
            $count = mysqli_num_rows($query_id);
            if ($count <> 0) {
            // mengambil data kode transaksi
            $data_id = mysqli_fetch_assoc($query_id);
            // print_r(ceil($data_id['kode']));die();
            $kode    = ceil($data_id['kode'])+1;
            } else {
            $kode = 1;
            }
            // buat kode_transaksi
            $tahun          = date("Y");
            $buat_id        = str_pad($kode, 4, "0", STR_PAD_LEFT);
            $id_pembelian = "PM-$tahun-$buat_id";
            ?>
            <div class="form-group">
              <label class="col-sm-2 control-label">ID Pembelian</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="id_pembelian" value="<?php echo $id_pembelian; ?>" readonly required>
              </div>
            </div>
             
             <div class="form-group">
              <label class="col-sm-2 control-label">ID Pelanggan</label>
              <div class="col-sm-5">
                <select class="chosen-select" name="id_pelanggan" data-placeholder="-- Pilih Pelanggan --" onchange="tampil_pelanggan(this)" autocomplete="off" required>
                  <option value=""></option>
                  <?php
                  $query_pelanggan = mysqli_query($mysqli, "SELECT id_pelanggan, nama_pelanggan FROM pelanggan ORDER BY nama_pelanggan ASC")
                  or die('Ada kesalahan pada query tampil pelanggan: '.mysqli_error($mysqli));
                  while ($data_pelanggan = mysqli_fetch_assoc($query_pelanggan)) {
                  echo"<option value=\"$data_pelanggan[id_pelanggan]\"> $data_pelanggan[id_pelanggan] | $data_pelanggan[nama_pelanggan] </option>";
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Tgl Transaksi</label>
              <div class="col-sm-5">
                <input type="date" class="form-control" id="tgl_transaksi"  name="tgl_transaksi" value="<?php echo date('Y-m-d') ?>"  required>
              </div>
            </div>
            <hr>
            <div class="form-group">
              <label class="col-sm-2 control-label">ID produk</label>
              <div class="col-sm-5">
                <select class="chosen-select" id="id_produk" name="id_produk" data-placeholder="-- Pilih produk --"  autocomplete="off" required>
                  <option value=""></option>
                  <?php
                  $query_pelanggan = mysqli_query($mysqli, "SELECT id_produk, nama FROM produk ORDER BY nama ASC")
                  or die('Ada kesalahan pada query tampil produk: '.mysqli_error($mysqli));
                  while ($data_produk = mysqli_fetch_assoc($query_pelanggan)) {
                  echo"<option value=\"$data_produk[id_produk]\"> $data_produk[id_produk] | $data_produk[nama] </option>";
                  }
                  ?>
                </select>
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">Harga</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" id="harga"  name="harga" onchange="subtotal()"  required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Jumlah Tiket</label>
              <div class="col-sm-5" id="jumlah_div">
                <input type="number" class="form-control" id="jumlah"  name="jumlah" required data-max="0">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Subtotal</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" id="subtotal"  name="subtotal" value=""  required>
              </div>
            </div>

             
            </div><!-- /.box body -->
            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=pembelian" class="btn btn-default btn-reset">Batal</a>
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

</div><!-- /.box -->
</div><!--/.col -->
</div>   <!-- /.row -->
</section><!-- /.content --><!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script type="text/javascript" src="assets/js/jquery-3.3.1.js"></script>
<script type="text/javascript" src="assets/js/popper.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<!-- fontawesome Plugin JS -->
<script type="text/javascript" src="assets/plugins/fontawesome-free-5.4.1-web/js/all.min.js"></script>
<!-- DataTables Plugin JS -->
<script type="text/javascript" src="assets/plugins/DataTables/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/plugins/DataTables/js/dataTables.bootstrap4.min.js"></script>
<!-- datepicker Plugin JS -->
<script type="text/javascript" src="assets/plugins/datepicker/js/bootstrap-datepicker.min.js"></script>
<!-- SweetAlert Plugin JS --><!--
<script type="text/javascript" src="assets/plugins/sweetalert/js/sweetalert.min.js"></script> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
<script type="text/javascript" src="assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
<script type="text/javascript">
function subtotal() {
var jumlah=$('#jumlah').val();
var harga=$('#harga').val();
var subtotal=0;
subtotal=parseInt(harga)*(jumlah);
console.log(jumlah);
console.log(harga);
console.log(subtotal);
$('#subtotal').attr('value', subtotal);
}
$(document).ready(function() {
$('#id_produk').on('change', function(){
var id_produk=$('#id_produk').val();
//console.log(id_produk);
var link="http://localhost/store/modules/pembelian/cek_data.php?id_produk="+id_produk;
//console.log(link);
// url for ajax http://localhost/travel/modules/pembelian/cek_data.php?id_produk=JDWL-000001
$.ajax({
url: link,
success:function(dt){
data=JSON.parse(dt);
// data iku isine object json key harga: xxxxk
$('#harga').attr('value', data.harga);
$('#jumlah').attr('data-max', data.stok);
$('#jumlah').attr('max', data.stok);
$('#jumlah').attr('placeholder', 'max-'+data.stok);
}
});
});
$('#jumlah').on('change', function(){
var jumlah=$('#jumlah').val();
var max_jumlah=$('#jumlah').data('max');
var harga=$('#harga').val();
if(parseInt(jumlah)>parseInt(max_jumlah)){
alert('tiket terlalu banyak');
$('#jumlah').val(max_jumlah);
subtotal=parseInt(harga)*(max_jumlah);
$('#subtotal').attr('value', subtotal);
}
if(parseInt(jumlah)<=parseInt(max_jumlah)){
subtotal=parseInt(harga)*(jumlah);
$('#subtotal').attr('value', subtotal);
}
});
});
function hitung() {
harga = parseInt($("#harga").val());
jumlah = parseInt($("#jumlah").val());
if (isNaN(harga)) harga = 0;
if (isNaN(jumlah)) jumlah = 0;
subtotal = harga + jumlah;
$("#subtotal").empty().append("subtotal:");
$("#subtotal").append(subtotal);
// $(".pesan").append("<hr/>kunjungilah <a href='http://adapani.blogspot.com/search/label/ajax'>ADAPANI BLOG untuk ilmu yang lebih mumpuni</a>");
}
$("#harga, #jumlah").keyup(function() {
hitung();
});
// function subtotal() {
// var harga = parseInt(document.getElementById('harga').value);
// var jumlah = parseInt(document.getElementById('jumlah').value);
// var subtotal = harga * jumlah;
// document.getElementById('subtotal').value = subtotal;
// }
</script>
</body>
</html>
<?php

?>