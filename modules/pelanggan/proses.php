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
            $id_pelanggan  = mysqli_real_escape_string($mysqli, trim($_POST['id_pelanggan']));
            $nama_pelanggan  = mysqli_real_escape_string($mysqli, trim($_POST['nama_pelanggan']));
            $email_pelanggan  = mysqli_real_escape_string($mysqli, trim($_POST['email_pelanggan']));
            $password_pelanggan  = mysqli_real_escape_string($mysqli, trim($_POST['password_pelanggan']));
            $no_telp = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['no_telp'])));
            $alamat  = mysqli_real_escape_string($mysqli, trim($_POST['alamat']));
           

            //$created_user = $_SESSION['id_user'];

            // perintah query untuk menyimpan data ke tabel obat
            //print_r($query);
            $query = mysqli_query($mysqli, "INSERT INTO data_pelanggan(id_pelanggan,nama_pelanggan,email_pelanggan,password_pelanggan,no_telp,alamat)
                VALUES ('$id_pelanggan','$nama_pelanggan','$email_pelanggan','$password_pelanggan','$alamat','$no_telp','$alamat')")
                or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

            // cek query

            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=pelanggan&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id_pelanggan'])) {
                // ambil data hasil submit dari form
            $id_pelanggan  = mysqli_real_escape_string($mysqli, trim($_POST['id_pelanggan']));
            $nama_pelanggan  = mysqli_real_escape_string($mysqli, trim($_POST['nama_pelanggan']));
            $email_pelanggan  = mysqli_real_escape_string($mysqli, trim($_POST['email_pelanggan']));
            $password_pelanggan  = mysqli_real_escape_string($mysqli, trim($_POST['password_pelanggan']));
            $no_telp = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['no_telp'])));
            $alamat  = mysqli_real_escape_string($mysqli, trim($_POST['alamat']));
           

                //$updated_user = $_SESSION['id_user'];

                // perintah query untuk mengubah data pada tabel obat
                $query = mysqli_query($mysqli, "UPDATE data_pelanggan SET  id_pelanggan   = '$id_pelanggan',
                                                                    nama_pelanggan       = '$nama_pelanggan',
                                                                    email_pelanggan       = '$email_pelanggan',
                                                                    password_pelanggan              = '$password_pelanggan',
                                                                    no_telp             = '$no_telp',
                                                                    alamat             = '$alamat'

                                                              WHERE id_pelanggan       = '$id_pelanggan'")
                                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                // cek query
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil update data
                    header("location: ../../main.php?module=pelanggan&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id_pelanggan = $_GET['id'];
    
            // perintah query untuk menghapus data pada tabel obat
            $query = mysqli_query($mysqli, "DELETE FROM data_pelanggan WHERE id_pelanggan='$id_pelanggan'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=pelanggan&alert=3");
            }
        }
    }       
}       
?>