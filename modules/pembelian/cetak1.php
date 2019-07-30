<?php
session_start();
ob_start();require_once "../../config/database.php";
// panggil fungsi untuk format tanggal
include "../../config/fungsi_tanggal.php";
// panggil fungsi untuk format rupiah
include "../../config/fungsi_rupiah.php";

$kode   = $_GET['kode']; //kode berita yang akan dikonvert
$query  = mysql_query("SELECT * FROM pembelian WHERE id_pembelian='".$kode."'");
$data   = mysql_fetch_array($query);

?>
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $data['id_pembelian']; ?></title>
</head>
<body>
<?php
echo "<h1>".$data['id_pembelian']."</h1>"; 
echo '<table border="0">
  <tr>
    <td width="100">ID Pembelian</td>
    <td width="10">:</td>
    <td width="250">'.$data['id_pembelian'].'</td>
  </tr>
  <tr>
    <td>Tgl Trasanski</td>
    <td>:</td>
    <td>'.$data['tgl_transaksi'].'</td>
  </tr>
  <tr>
    <td>ID Pelanggan</td>
    <td>:</td>
    <td>'.$data['id_pelanggan'].'</td>
  </tr>
   <tr>
    <td>ID Jadwal</td>
    <td>:</td>
    <td>'.$data['id_jadwal'].'</td>
  </tr>
  <tr>
    <td>Harga</td>
    <td>:</td>
    <td>'.$data['harga'].'</td>
  </tr>
  <tr>
    <td>Jumlah Tiket</td>
    <td>:</td>
    <td>'.$data['jumlah_tiket'].'</td>
  </tr>
  <tr>
    <td>Subtotal</td>
    <td>:</td>
    <td>'.$data['subtotal'].'</td>
  </tr>
</table>';

echo "<p align='right'>JAKARTA, ".date('d-m-Y')."
<img src='ttd.png' width='120'>
( Anggun Patriana )</p>";
?>
</body>
</html><!-- Akhir halaman HTML yang akan di konvert -->
<?php
$filename="mhs-".$kode.".pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
//Copy dan paste langsung script dibawah ini,untuk mengetahui lebih jelas tentang fungsinya silahkan baca-baca tutorial tentang HTML2PDF
//==========================================================================================================
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.nl2br($content).'</page>';
 require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');
 try
 {
  $html2pdf = new HTML2PDF('P','A4','en', false, 'ISO-8859-15',array(30, 0, 20, 0));
  $html2pdf->setDefaultFont('Arial');
  $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
  $html2pdf->Output($filename);
 }
 catch(HTML2PDF_exception $e) { echo $e; }
?>