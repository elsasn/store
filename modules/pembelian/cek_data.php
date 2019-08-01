 <?php
include "../../config/database.php";
$data_produk = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM produk where id_produk='$_GET[id_produk]'"));
//$data_jadwal = array('harga'   	=>  $data_jadwal['harga'],);
echo json_encode($data_produk);
//print $data_jadwal['harga'];
?>