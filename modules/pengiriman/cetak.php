<?php
session_start();
ob_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";
// panggil fungsi untuk format tanggal
include "../../config/fungsi_tanggal.php";
// panggil fungsi untuk format rupiah
include "../../config/fungsi_rupiah.php";

$hari_ini = date("d-m-Y");

$no = 1;
// fungsi query untuk menampilkan data dari tabel obat
$kode   = $_GET['kode']; //kode berita yang akan dikonvert
//$query  = mysql_query("SELECT * FROM pembelian WHERE id_pembelian='".$kode."'");
$query = mysqli_query($mysqli, "SELECT pembelian.id_pembelian, pembelian.tgl_transaksi, data_pelanggan.nama_pelanggan,jadwal.nama_jurusan,
    pembelian.harga, pembelian.jumlah_tiket, pembelian.subtotal, pembelian.tgl_berangkat FROM pembelian JOIN data_pelanggan ON pembelian.id_pelanggan=data_pelanggan.id_pelanggan
JOIN jadwal ON jadwal.id_jadwal=pembelian.id_jadwal WHERE id_pembelian='".$kode."'")
                                or die('Ada kesalahan pada query tampil Data Pembelian: '.mysqli_error($mysqli));
$count  = mysqli_num_rows($query);
?>
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>TIKET PEMBELIAN</title>
        <link rel="stylesheet" type="text/css" href="../../assets/css/laporan.css" />
    </head>
    <body>
        <div id="title" align="center">
            TIKET PEMBELIAN
        </div>
         <div id="title" align="center">
            Estu Trans
        </div>
         <div id="title" align="center">
            Jl. Wates Km.4.5, Ruko Gamping No.5, Ambarketawang, Gamping, 
            Ambarketawang, Gamping, Kabupaten Sleman, Daerah Istimewa Yogyakarta
        </div>

        <div id="title" align="center">
            081 226 792 456 | 0899 455 1967
        </div>

        <hr><br>

        <div id="isi">
            <table width="50%" border="0.3" cellpadding="0" align="center" cellspacing="0">
                <thead style="background:#e8ecee">
                    <tr class="tr-title">

                        <th height="20" align="center" valign="middle">NO.</th>
                        <th height="25" align="center" valign="middle">ID Pembelian</th>
                        <th height="25" align="center" valign="middle">Tgl Transaksi</th>
                        <th height="25" align="center" valign="middle">ID Pelanggan</th>
                        <th height="25" align="center" valign="middle">ID Jadwal</th>
                        <th height="25" align="center" valign="middle">Harga</th>
                        <th height="25" align="center" valign="middle">Jumlah Tiket</th>
                        <th height="25" align="center" valign="middle">Subtotal</th>
                        
                
                    </tr>
                </thead>
                <tbody>
        <?php
        // tampilkan data
        while ($data = mysqli_fetch_assoc($query)) {
           // $harga_beli = format_rupiah($data['harga_beli']);
           // $harga_jual = format_rupiah($data['harga_jual']);
            // menampilkan isi tabel dari database ke tabel di aplikasi
            echo "  <tr>
                        <td width='80' height='13' align='center' valign='middle'>$no</td>
                        <td width='80' height='13' align='center' valign='middle'>$data[id_pembelian]</td>
                        <td style='padding-left:5px;' width='80' height='13' valign='middle'>$data[tgl_transaksi]</td>
                        <td width='80' height='13' align='center' valign='middle'>$data[nama_pelanggan]</td>
                        <td width='150' height='13' align='center' valign='middle'>$data[nama_jurusan]</td>
                        <td width='80' height='13' align='center' valign='middle'>$data[harga]</td>
                        <td width='50' height='13' align='center' valign='middle'>$data[jumlah_tiket]</td>
                        <td width='80' height='13' align='center' valign='middle'>$data[subtotal]</td>
                    </tr>";
            $no++;
        }
        ?>  
                </tbody>
            </table>

            <div id="footer-tanggal">
                Yogyakarta, <?php echo tgl_eng_to_ind("$hari_ini"); ?>
            </div>
            <div id="footer-jabatan">
                Operator
            </div>
            
            <div id="footer-nama">
                Rudi Hermawan, S.T.
            </div>
        </div>
    </body>
</html><!-- Akhir halaman HTML yang akan di konvert -->
<?php
$filename="LAPORAN PEMBAYARAN.pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.($content).'</page>';
// panggil library html2pdf
require_once('../../assets/plugins/html2pdf_v4.03/html2pdf.class.php');
try
{
    $html2pdf = new HTML2PDF('P','F4','en', false, 'ISO-8859-15',array(10, 10, 10, 10));
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->Output($filename);
}
catch(HTML2PDF_exception $e) { echo $e; }
?>