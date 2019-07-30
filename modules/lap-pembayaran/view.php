<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
  <i class="fa fa-file-text-o icon-title"></i> Laporan Pembayaran Toko Sepatu Eko
  <a class="btn btn-primary btn-social pull-right" href="modules/lap-pembayaran/cetak.php" target="_blank">
    <i class="fa fa-print"></i> Cetak
  </a>
  </h1>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-body">
          <!-- tampilan tabel obat -->
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
            <!-- tampilan tabel header -->
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">ID Pembayaran</th>
                <th class="center">ID Pembelian</th>
                <th class="center">Tgl Transaksi</th>
                <th class="center">Subtotal</th>
                <th class="center">Jenis Pembayaran</th>
                <th class="center">Status Bayar</th>
              </tr>
            </thead>
            <!-- tampilan tabel body -->
            <tbody>
              <?php
              $no = 1;
              // fungsi query untuk menampilkan data dari tabel pembayaran
              $query = mysqli_query($mysqli, "SELECT * FROM pembayaran ORDER BY id_pembayaran ASC")
              or die('Ada kesalahan pada query tampil Data Pembayaran: '.mysqli_error($mysqli));
              // tampilkan data
              while ($data = mysqli_fetch_assoc($query)) {
              //$harga_beli = format_rupiah($data['harga_beli']);
              //$harga_jual = format_rupiah($data['harga_jual']);
              // menampilkan isi tabel dari database ke tabel di aplikasi
              echo "<tr>
                <td width='30' class='center'>$no</td>
                <td width='80' class='center'>$data[id_pembayaran]</td>
                <td width='80' class='center'>$data[id_pembelian]</td>
                <td width='180'>$data[tgl_transaksi]</td>
                <td width='180'>$data[subtotal]</td>
                <td width='180'>$data[jenis_bayar]</td>
                <td width='180'>$data[status]</td>
              </tr>";
              $no++;
              }
              ?>
            </tbody>
          </table>
          </div><!-- /.box-body -->
          </div><!-- /.box -->
          </div><!--/.col -->
          </div>   <!-- /.row -->
        </section><!-- /.content