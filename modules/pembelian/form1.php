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
        <form role="form" class="form-horizontal" action="modules/pembelian/proses.php?act=insert" method="POST" name="formpembelian">
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
                <input type="date" class="form-control" id="tgl_transaksi"  name="tgl_transaksi" value="<?php echo date('Y-m-d') ?>" readonly required>
              </div>
            </div>
            <hr>
            <label>Kode Barang</label>
          <select id="id_produk"></select>
          <input type="text" id="nama" placeholder="Nama Barang" readonly>
          <input type="text" id="harga" placeholder="Harga" class="span2" readonly>
          <input type="text" id="stok" placeholder="stok" class="span1" readonly>
          <input type="text" id="jumlah" placeholder="Jumlah Beli" class="span1">
          <button id="tambah" class="btn">Tambah</button>
          
          <span id="status"></span>
          
          <table class='table table-hover'>
            <thead>
              <tr>
                <td>Kode Barang</td>
                <td>Nama</td>
                <td>Harga</td>
                <td>Jumlah</td>
                <td>Subtotal</td>
              </tr>
            </thead>
          </table>
          
          <div class="box-footer">
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                <a href="?module=pembelian" class="btn btn-default btn-reset">Batal</a>
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
    var jumlah_tiket=$('#jumlah_tiket').val();
    var harga=$('#harga').val();
    var subtotal=0;
    subtotal=parseInt(harga)*(jumlah_tiket);
    console.log(jumlah_tiket);
    console.log(harga);
    console.log(subtotal);
    $('#subtotal').attr('value', subtotal);
    }
    $(document).ready(function() {
    $('#id_jadwal').on('change', function(){
    var id_jadwal=$('#id_jadwal').val();
    //console.log(id_jadwal);
    var link="http://localhost/travel/modules/pembelian/cek_data.php?id_jadwal="+id_jadwal;
    //console.log(link);
    // url for ajax http://localhost/travel/modules/pembelian/cek_data.php?id_jadwal=JDWL-000001
    $.ajax({
    url: link,
    success:function(dt){
    data=JSON.parse(dt);
    // data iku isine object json key harga: xxxxk
    $('#harga').attr('value', data.harga);
    $('#jumlah_tiket').attr('data-max', data.kapasitas);
    $('#jumlah_tiket').attr('max', data.kapasitas);
    $('#jumlah_tiket').attr('placeholder', 'max-'+data.kapasitas);
    }
    });
    });
    $('#jumlah_tiket').on('change', function(){
    var jumlah_tiket=$('#jumlah_tiket').val();
    var max_jumlah_tiket=$('#jumlah_tiket').data('max');
    var harga=$('#harga').val();
    if(parseInt(jumlah_tiket)>parseInt(max_jumlah_tiket)){
    alert('tiket terlalu banyak');
    $('#jumlah_tiket').val(max_jumlah_tiket);
    subtotal=parseInt(harga)*(max_jumlah_tiket);
    $('#subtotal').attr('value', subtotal);
    }
    if(parseInt(jumlah_tiket)<=parseInt(max_jumlah_tiket)){
    subtotal=parseInt(harga)*(jumlah_tiket);
    $('#subtotal').attr('value', subtotal);
    }
    });
    });
    function hitung() {
    harga = parseInt($("#harga").val());
    jumlah_tiket = parseInt($("#jumlah_tiket").val());
    if (isNaN(harga)) harga = 0;
    if (isNaN(jumlah_tiket)) jumlah_tiket = 0;
    subtotal = harga + jumlah_tiket;
    $("#subtotal").empty().append("subtotal:");
    $("#subtotal").append(subtotal);
    // $(".pesan").append("<hr/>kunjungilah <a href='http://adapani.blogspot.com/search/label/ajax'>ADAPANI BLOG untuk ilmu yang lebih mumpuni</a>");
    }
    $("#harga, #jumlah_tiket").keyup(function() {
    hitung();
    });
    // function subtotal() {
    // var harga = parseInt(document.getElementById('harga').value);
    // var jumlah_tiket = parseInt(document.getElementById('jumlah_tiket').value);
    // var subtotal = harga * jumlah_tiket;
    // document.getElementById('subtotal').value = subtotal;
    // }
    </script>
    <script>
                //mendeksripsikan variabel yang akan digunakan
                var nota;
                var tanggal;
                var id_produk;
                var nama;
                var harga;
                var jumlah;
                var stok;
                $(function(){
                    //meload file pk dengan operator ambil barang dimana nantinya
                    //isinya akan masuk di combo box
                    $("#id_produk").load("modules/pembelian/pk.php","op=ambilbarang");
                    
                    //meload isi tabel
                    $("#barang").load("pk.php","op=barang");
                    
                    //mengkosongkan input text dengan masing2 id berikut
                    $("#nama").val("");
                    $("#harga").val("");
                    $("#jumlah").val("");
                    $("#stok").val("");
                                
                    //jika ada perubahan di kode barang
                    $("#id_produk").change(function(){
                        id_produk=$("#id_produk").val();
                        
                        //tampilkan status loading dan animasinya
                        $("#status").html("loading. . .");
                        $("#loading").show();
                        
                        //lakukan pengiriman data
                        $.ajax({
                            url:"proses.php",
                            data:"op=ambildata&kode="+kode,
                            cache:false,
                            success:function(msg){
                                data=msg.split("|");
                                
                                //masukan isi data ke masing - masing field
                                $("#nama").val(data[0]);
                                $("#harga").val(data[1]);
                                $("#stok").val(data[3]);
                                $("#jumlah").focus();
                                //hilangkan status animasi dan loading
                                $("#status").html("");
                                $("#loading").hide();
                            }
                        });
                    });
                    
                    //jika tombol tambah di klik
                    $("#tambah").click(function(){
                        id_produk=$("#id_produk").val();
                        stok=$("#stok").val();
                        jumlah=$("#jumlah").val();
                        if(id_produk=="Kode Barang"){
                            alert("Kode Barang Harus diisi");
                            exit();
                        }else if(jumlah > stok){
                            alert("Stok tidak terpenuhi");
                            $("#jumlah").focus();
                            exit();
                        }else if(jumlah < 1){
                            alert("Jumlah beli tidak boleh 0");
                            $("#jumlah").focus();
                            exit();
                        }
                        nama=$("#nama").val();
                        harga=$("#harga").val();
                        
                                                
                        $("#status").html("sedang diproses. . .");
                        $("#loading").show();
                        
                        $.ajax({
                            url:"pk.php",
                            data:"op=tambah&kode="+kode+"&nama="+nama+"&harga="+harga+"&jumlah="+jumlah,
                            cache:false,
                            success:function(msg){
                                if(msg=="sukses"){
                                    $("#status").html("Berhasil disimpan. . .");
                                }else{
                                    $("#status").html("ERROR. . .");
                                }
                                $("#loading").hide();
                                $("#nama").val("");
                                $("#harga").val("");
                                $("#jumlah").val("");
                                $("#stok").val("");
                                $("#id_produk").load("pk.php","op=ambilbarang");
                                $("#barang").load("pk.php","op=barang");
                            }
                        });
                    });
                    
                    //jika tombol proses diklik
                    $("#proses").click(function(){
                        nota=$("#nota").val();
                        tanggal=$("#tanggal").val();
                        
                        $.ajax({
                            url:"pk.php",
                            data:"op=proses&nota="+nota+"&tanggal="+tanggal,
                            cache:false,
                            success:function(msg){
                                if(msg=='sukses'){
                                    $("#status").html('Transaksi Pembelian berhasil');
                                    alert('Transaksi Berhasil');
                                    exit();
                                }else{
                                    $("#status").html('Transaksi Gagal');
                                    alert('Transaksi Gagal');
                                    exit();
                                }
                                $("#kode").load("pk.php","op=ambilbarang");
                                $("#barang").load("pk.php","op=barang");
                                $("#loading").hide();
                                $("#nama").val("");
                                $("#harga").val("");
                                $("#jumlah").val("");
                                $("#stok").val("");
                            }
                        })
                    })
                });
            </script>
  </body>
</html>
<?php
}
?>