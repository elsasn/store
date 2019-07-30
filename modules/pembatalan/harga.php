include('config/database.php');
$tampil=mysql_query("SELECT * FROM data_jadwal WHERE harga'$_POST[harga]'");
$jml=mysql_num_rows($tampil);
if($jml > 0){
echo"
<option selected>- Pilih Kota -</option>";
while($r=mysql_fetch_array($tampil)){
echo "<option value=$r[harga]>$r[harga]</option>";
}else{
    echo "<option selected>- Data Wilayah Tidak Ada, Pilih Yang Lain -</option>";
}