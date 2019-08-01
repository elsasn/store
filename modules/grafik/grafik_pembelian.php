<script type="text/javascript" src="assets/chartjs/Chart.js"></script>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
  <i class="fa fa-pie"></i> Grafik Pembelian
  </h1>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-body">
          <!-- tampilan tabel user -->
          <script>
          var ctx = document.getElementById("myChart").getContext('2d');
          var myChart = new Chart(ctx, {
          type: 'bar',
          data: {
          labels: ["Teknik", "Fisip", "Ekonomi", "Pertanian"],
          datasets: [{
          label: '',
          data: [
          <?php
          $tgl_transaksi = mysqli_query($koneksi,"select * from pembelian where fakultas='teknik'");
          echo mysqli_num_rows($jumlah_teknik);
          ?>,
          <?php
          $jumlah_ekonomi = mysqli_query($koneksi,"select * from mahasiswa where fakultas='ekonomi'");
          echo mysqli_num_rows($jumlah_ekonomi);
          ?>,
          <?php
          $jumlah_fisip = mysqli_query($koneksi,"select * from mahasiswa where fakultas='fisip'");
          echo mysqli_num_rows($jumlah_fisip);
          ?>,
          <?php
          $jumlah_pertanian = mysqli_query($koneksi,"select * from mahasiswa where fakultas='pertanian'");
          echo mysqli_num_rows($jumlah_pertanian);
          ?>
          ],
          backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)'
          ],
          borderColor: [
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)'
          ],
          borderWidth: 1
          }]
          },
          options: {
          scales: {
          yAxes: [{
          ticks: {
          beginAtZero:true
          }
          }]
          }
          }
          });
          </script>
          </div><!-- /.box-body -->
          </div><!-- /.box -->
          </div><!--/.col -->
          </div>   <!-- /.row -->
        </section><!-- /.content