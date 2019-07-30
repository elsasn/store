
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Pembatalan Tiket

    <a class="btn btn-primary btn-social pull-right" href="?module=form_pembatalan&form=add" title="Tambah Data" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Tambah
    </a>
  </h1>

</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">

    <?php  
    // fungsi untuk menampilkan pesan
    // jika alert = "" (kosong)
    // tampilkan pesan "" (kosong)
    if (empty($_GET['alert'])) {
      echo "";
    } 
    // jika alert = 1
    // tampilkan pesan Sukses "Data pembelian baru berhasil disimpan"
    elseif ($_GET['alert'] == 1) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data pembatalan baru berhasil disimpan.
            </div>";
    }
    // jika alert = 2
    // tampilkan pesan Sukses "Data pembelian berhasil diubah"
    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data pembatalan berhasil diubah.
            </div>";
    }
    // jika alert = 3
    // tampilkan pesan Sukses "Data pembelian berhasil dihapus"
    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data pembatalan berhasil dihapus.
            </div>";
    }
    ?>

      <div class="box box-primary">
        <div class="box-body">
          <!-- tampilan tabel pembelian -->
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
            <!-- tampilan tabel header -->
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">ID Pembatalan</th>
                <th class="center">ID Pembelian</th>
                <th class="center">Tgl Transaksi</th>
                <th class="center">Tgl Berangkat</th>
                <th class="center">Tgl Pembatalan</th>
                <th class="center">Jumlah Tiket</th>
                <th class="center">Subtotal</th>
                <th class="center">Jumlah Tiket Kembali</th>
                <th class="center">Jumlah Tiket Tersisa</th>
                <th class="center">Jumlah Uang Kembali</th>
                
              </tr>
            </thead>
            <!-- tampilan tabel body -->
            <tbody>
            <?php  
            $no = 1;
            // fungsi query untuk menampilkan data dari tabel pembelian
            $query = mysqli_query($mysqli, "SELECT * FROM pembatalan")
                                            or die('Ada kesalahan pada query tampil Data pembatalan: '.mysqli_error($mysqli));
              
            // tampilkan data
            while ($data = mysqli_fetch_assoc($query)) {
              // print_r($query);
              // die;
            $kode = $data['id_pembatalan']; // ambil nis siswa (unik) 
            //   $harga_beli = format_rupiah($data['harga_beli']);
            //   $harga_jual = format_rupiah($data['harga_jual']);
              // menampilkan isi tabel dari database ke tabel di aplikasi
              echo "<tr>
                      <td width='50' class='center'>$no</td>
                      <td width='150' class='center'>$data[id_pembatalan]</td>
                      <td width='150' class='center'>$data[id_pembelian]</td>
                      <td width='150' class='center'>$data[tgl_transaksi]</td>
                      <td width='150' class='center'>$data[tgl_berangkat]</td>
                      <td width='150' class='center'>$data[tgl_pembatalan]</td>
                      <td width='180' class='center'>$data[jumlah_tiket]</td>
                      <td width='150' class='center'>$data[subtotal]</td>
                      <td width='150' class='center'>$data[jumlah_tiket_kembali]</td>
                      <td width='150' class='center'>$data[jumlah_tiket_tersisa]</td>
                      <td width='150' class='center'>$data[jumlah_uang_kembali]</td>
                      <td class='center' width='100'>
                        <div>
                         
                          <a data-toggle='tooltip' data-placement='top' title='Ubah' style='margin-right:5px' class='btn btn-primary btn-sm' href='?module=form_pembatalan2&form2=edit&id=$data[id_pembelian]'>
                          <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a>";
                          ?>
                          
                          <a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-sm" href="modules/pembatalan/proses.php?act=delete&id=<?php echo $data['id_pembatalan'];?>" onclick="return confirm('Anda yakin ingin menghapus pembatalan <?php echo $data['nama_pembatalan']; ?> ?');">
                              <i style="color:#fff" class="glyphicon glyphicon-trash"></i>
                          </a>

                          <!-- <a href="javascript:void(0);"
                          onclick="window.open('cetak.php?kode=<?php echo $kode; ?>','nama_window_pop_up','size=800,height=800,scrollbars=yes,resizeable=no')">Cetak</a>
 -->
                          <a class="btn btn-primary btn-social pull-right" href="modules/pembatalan/cetak.php?kode=<?php echo $kode; ?>" target="_blank">
                            <i class="fa fa-print"></i> Cetak
                          </a>

            <?php
              echo "    </div>
                      </td>
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