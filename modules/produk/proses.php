<?php
session_start();
// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";
// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika user sudah login, maka jalankan perintah untuk insert, update, dan delete
else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['simpan'])) {
            // ambil data hasil submit dari form
            $id_produk  = mysqli_real_escape_string($mysqli, trim($_POST['id_produk']));
            $nama  = mysqli_real_escape_string($mysqli, trim($_POST['nama']));
            $id_kategori  = mysqli_real_escape_string($mysqli, trim($_POST['id_kategori']));
            $harga     = mysqli_real_escape_string($mysqli, trim($_POST['harga']));
            $stok  = mysqli_real_escape_string($mysqli, trim($_POST['stok']));
            $ket  = mysqli_real_escape_string($mysqli, trim($_POST['ket']));
            $gambar = $_FILES['gambar']['name'];
            $tmp = $_FILES['gambar']['tmp_name'];
  
            // Rename nama filenya dengan menambahkan tanggal dan jam upload
            $gambarbaru = date('dmYHis').$gambar;
            // Set path folder tempat menyimpan filenya
            $path = "../../images/".$gambarbaru;
            
            //$created_user = $_SESSION['id_user'];
            if(move_uploaded_file($tmp, $path)){
            //$created_user = $_SESSION['id_user'];
            // perintah query untuk menyimpan data ke tabel obat
            //print_r($query);
            $query = mysqli_query($mysqli, "INSERT INTO produk(id_produk,nama,id_kategori,harga,stok,ket,gambar)
                VALUES ('$id_produk','$nama','$id_kategori','$harga','$stok','$ket','$gambarbaru')")
                or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    
            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=produk&alert=1");
                }
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id_produk'])) {
                // ambil data hasil submit dari form
           $id_produk  = mysqli_real_escape_string($mysqli, trim($_POST['id_produk']));
            $nama  = mysqli_real_escape_string($mysqli, trim($_POST['nama']));
            $id_kategori  = mysqli_real_escape_string($mysqli, trim($_POST['id_kategori']));
            $harga     = mysqli_real_escape_string($mysqli, trim($_POST['harga']));
            $stok  = mysqli_real_escape_string($mysqli, trim($_POST['stok']));
            $ket  = mysqli_real_escape_string($mysqli, trim($_POST['ket']));
            $gambar = $_FILES['gambar']['name'];
            $tmp = $_FILES['gambar']['tmp_name'];
  
            // Rename nama filenya dengan menambahkan tanggal dan jam upload
            $gambarbaru = date('dmYHis').$gambar;
            // Set path folder tempat menyimpan filenya
            $path = "../../images/".$gambarbaru;
            
            //$created_user = $_SESSION['id_user'];
            if(move_uploaded_file($tmp, $path)){
                //$updated_user = $_SESSION['id_user'];
                // perintah query untuk mengubah data pada tabel 
                $query = mysqli_query($mysqli, "UPDATE produk SET  id_produk   = '$id_produk',
                                                                    nama       = '$nama',
                                                                    id_kategori             = '$id_kategori',
                                                                    harga      = '$harga',
                                                                    stok      = '$stok',
                                                                    ket      = '$ket',
                                                                    gambar          = '$gambarbaru'
                                                              WHERE id_produk       = '$id_produk'")
                                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));
                // cek query
               //print_r($query);die();
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil update data
                    header("location: ../../main.php?module=produk&alert=2");
                    }
                }         
            }
        }
    }
    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id_produk = $_GET['id'];
    
            // perintah query untuk menghapus data pada tabel 
            $query = mysqli_query($mysqli, "DELETE FROM produk WHERE id_produk='$id_produk'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));
            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=produk&alert=3");
            }
        }
    }       
}       
?>