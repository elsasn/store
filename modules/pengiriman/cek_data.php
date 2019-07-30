 <?php
include "../../config/database.php";
$data_jadwal = mysqli_fetch_array(mysqli_query($mysqli, "select * from jadwal where id_jadwal='$_GET[id_jadwal]'"));
//$data_jadwal = array('harga'   	=>  $data_jadwal['harga'],);
echo json_encode($data_jadwal);
//print $data_jadwal['harga'];
?>