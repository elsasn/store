<?php
include "../../config/database.php";
$op=isset($_GET['op'])?$_GET['op']:null;
if($op=='ambilbarang'){
    $data=mysqli_query("SELECT * FROM produk");
    echo"<option>id_produk Barang</option>";
    while($r=mysqli_fetch_array($data)){
        echo "<option value='$r[id_produk]'>$r[id_produk]</option>";
    }
}elseif($op=='ambildata'){
    $id_produk=$_GET['id_produk'];
    $dt=mysqli_query("SELECT * FROM produk WHERE id_produk='$id_produk'");
    $d=mysqli_fetch_array($dt);
    echo $d['nama']."|".$d['hrg_jual']."|".$d['stok'];
}elseif($op=='barang'){
    $brg=mysqli_query("SELECT * FROM cart");
    echo "<thead>
            <tr>
                <td>id_produk Barang</td>
                <td>Nama</td>
                <td>Harga</td>
                <td>Jumlah Beli</td>
                <td>Subtotal</td>
                <td>Tools</td>
            </tr>
        </thead>";
    $total=mysqli_fetch_array(mysqli_query("select sum(subtotal) as total from cart"));
    while($r=mysqli_fetch_array($brg)){
        echo "<tr>
                <td>$r[id_produk]</td>
                <td>$r[nama]</td>
                <td>$r[harga]</td>
                <td><input type='text' name='jum' value='$r[jumlah]' class='span2'></td>
                <td>$r[subtotal]</td>
                <td><a href='pk.php?op=hapus&id_produk=$r[id_produk]' id='hapus'>Hapus</a></td>
            </tr>";
    }
    echo "<tr>
        <td colspan='3'>Total</td>
        <td colspan='4'>$total[total]</td>
    </tr>";
}elseif($op=='tambah'){
    $id_produk=$_GET['id_produk'];
    $nama=$_GET['nama'];
    $harga=$_GET['harga'];
    $jumlah=$_GET['jumlah'];
    $subtotal=$harga*$jumlah;
    
    $tambah=mysqli_query("INSERT into cart (id_produk,nama,harga,jumlah,subtotal)
                        values ('$id_produk','$nama','$harga','$jumlah','$subtotal')");
    
    if($tambah){
        echo "sukses";
    }else{
        echo "ERROR";
    }
}elseif($op=='hapus'){
    $id_produk=$_GET['id_produk'];
    $del=mysqli_query("delete from cart where id_produk='$id_produk'");
    if($del){
        echo "<script>window.location='index.php?page=penjualan&act=tambah';</script>";
    }else{
        echo "<script>alert('Hapus Data Berhasil');
            window.location='index.php?page=penjualan&act=tambah';</script>";
    }
}elseif($op=='proses'){
    $nota=$_GET['nota'];
    $tanggal=$_GET['tanggal'];
    $to=mysqli_fetch_array(mysqli_query("select sum(subtotal) as total from cart"));
    $tot=$to['total'];
    $simpan=mysqli_query("insert into penjualan(nonota,tanggal,total)
                        values ('$nota','$tanggal','$tot')");
    if($simpan){
        $query=mysqli_query("select * from cart");
        while($r=mysqli_fetch_row($query)){
            mysqli_query("insert into detailpenjualan(nonota,id_produk,harga,jumlah,subtotal)
                        values('$nota','$r[0]','$r[2]','$r[3]','$r[4]')");
            mysqli_query("update produk set stok=stok-'$r[3]'
                        where id_produk='$r[0]'");
        }
        //hapus seluruh isi tabel sementara
        mysqli_query("truncate table cart");
        echo "sukses";
    }else{
        echo "ERROR";
    }
}
?>