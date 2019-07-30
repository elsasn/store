<?php
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form2']=='edit') { ?>
<!-- tampilan form add data -->
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
  <i class="fa fa-edit icon-title"></i> Ubah Pembatalan
  </h1>
  <ol class="breadcrumb">
    <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
    <li><a href="?module=pembatalan"> Pembatalan </a></li>
    <li class="active"> Ubah </li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <!-- form start -->
      <form role="form" class="form-horizontal" action="modules/pembatalan/proses.php?act=update" method="POST">
          <div class="box-body">
            <?php
            // fungsi untuk membuat kode transaksi
            $query_id = mysqli_query($mysqli, "SELECT RIGHT(id_pembatalan,4) as kode FROM pembatalan
            ORDER BY id_pembatalan DESC LIMIT 1")
            or die('Ada kesalahan pada query tampil id_trans_pembatalan : '.mysqli_error($mysqli));
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
            $id_pembatalan = "PM-$tahun-$buat_id";
            ?>
            <div class="form-group">
              <label class="col-sm-2 control-label">ID pembatalan</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="id_pembatalan" value="<?php echo $id_pembatalan; ?>" readonly required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Tgl Pembatalan</label>
              <div class="col-sm-5">
                <input type="date" class="form-control" id="tgl_pembatalan"  name="tgl_pembatalan" value="<?php echo date('Y-m-d') ?>" readonly required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">ID Pembelian</label>
              <div class="col-sm-5">
                <select class="chosen-select" name="id_pembelian" id="id_pembelian" data-placeholder="-- Pilih Transaksi Pembelian --"  autocomplete="off" required>
                  <option value=""></option>
                  <?php
                  $query_pembatalan = mysqli_query($mysqli, "SELECT id_pembelian, id_jadwal FROM pembelian ORDER BY id_pembelian ASC")
                  or die('Ada kesalahan pada query tampil pembatalan: '.mysqli_error($mysqli));
                  while ($data_pembatalan = mysqli_fetch_assoc($query_pembatalan)) {
                  echo"<option value=\"$data_pembatalan[id_pembelian]\"> $data_pembatalan[id_pembelian] | $data_pembatalan[id_jadwal] </option>";
                  }
                  ?>
                </select>
              </div>
            </div>
            <hr>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">Jumlah Tiket Dipesan</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" id="jumlah_tiket"  name="jumlah_tiket" onchange="tiket()"  required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Subtotal</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" id="subtotal"  name="subtotal" value=""  required>
              </div>
            </div>
            <hr>
            <div class="form-group">
              <label class="col-sm-2 control-label">Jumlah Tiket Kembali</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" id="jumlah_tiket_kembali"  name="jumlah_tiket_kembali" onkeyup="tiket()" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Jumlah Uang Kembali</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" id="jumlah_uang_kembali"  name="jumlah_uang_kembali"   required>
              </div>
            </div>
            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=pembatalan" class="btn btn-default btn-reset">Batal</a>
                </div>
              </div>
            </div><!-- /.box footer -->              
              <!-- Modal Footer -->         
            </div>
         <!-- /.box body -->
      </form>
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section>




<!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      
      <!-- datepicker Plugin JS -->
      <!-- <script type="text/javascript" src="assets/plugins/datepicker/js/bootstrap-datepicker.min.js"></script> -->
      <!-- SweetAlert Plugin JS --><!--
      <script type="text/javascript" src="assets/plugins/sweetalert/js/sweetalert.min.js"></script> -->
      <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
      <script type="text/javascript" src="assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
      <script type="text/javascript">

      function tiket() {
      jumlah_tiket = parseInt($("#jumlah_tiket").val());
      jumlah_tiket_kembali = parseInt($("#jumlah_tiket_kembali").val());
      subtotal = parseInt($("#subtotal").val());
      // if (isNaN(harga)) harga = 0;
      // if (isNaN(jumlah_tiket)) jumlah_tiket = 0;
      h1=subtotal/jumlah_tiket;
      jumlah_uang_kembali=(h1*jumlah_tiket_kembali)*50/100;
      
      $("#jumlah_uang_kembali").val(jumlah_uang_kembali);
      // $(".pesan").append("<hr/>kunjungilah <a href='http://adapani.blogspot.com/search/label/ajax'>ADAPANI BLOG untuk ilmu yang lebih mumpuni</a>");
      }
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
      $('#id_pembelian').on('change', function(){
      var id_pembelian=$('#id_pembelian').val();
      //console.log(id_jadwal);
      var link="http://localhost/travel/modules/pembatalan/cek_data.php?id_pembelian="+id_pembelian;
      //console.log(link);
      // url for ajax http://localhost/travel/modules/pembatalan/cek_data.php?id_jadwal=JDWL-000001
      $.ajax({
      url: link,
      success:function(dt){
      data=JSON.parse(dt);
      console.log(data);
      // data iku isine object json key harga: xxxxk
      $('#harga').attr('value', data.harga);
      $('#jumlah_tiket').val(data.jumlah_tiket);
      console.log(data);
      $('#subtotal').val(data.subtotal);
      
      $('#jml_kembali').val(data.jml_kembali);
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
      

      }
      $("#harga, #jumlah_tiket").keyup(function() {
      hitung();
      });
      </script>
    </body>
  </html>
  <?php
  }
  ?>