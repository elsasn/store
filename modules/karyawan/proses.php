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
            $id_karyawan  = mysqli_real_escape_string($mysqli, trim($_POST['id_karyawan']));
            $nama_karyawan  = mysqli_real_escape_string($mysqli, trim($_POST['nama_karyawan']));
            $jabatan  = mysqli_real_escape_string($mysqli, trim($_POST['jabatan']));
            $jenis_kelamin  = mysqli_real_escape_string($mysqli, trim($_POST['jenis_kelamin']));
            $alamat  = mysqli_real_escape_string($mysqli, trim($_POST['alamat']));
            $no_telp = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['no_telp'])));
           

            //$created_user = $_SESSION['id_user'];

            // perintah query untuk menyimpan data ke tabel obat
            //print_r($query);
            $query = mysqli_query($mysqli, "INSERT INTO data_karyawan(id_karyawan,nama_karyawan,jabatan,jenis_kelamin,alamat,no_telp)
                VALUES ('$id_karyawan','$nama_karyawan','$jabatan','$jenis_kelamin','$alamat','$no_telp')")
                or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

            // cek query

            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=karyawan&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id_karyawan'])) {
                // ambil data hasil submit dari form
            $id_karyawan  = mysqli_real_escape_string($mysqli, trim($_POST['id_karyawan']));
            $nama_karyawan  = mysqli_real_escape_string($mysqli, trim($_POST['nama_karyawan']));
            $jabatan  = mysqli_real_escape_string($mysqli, trim($_POST['jabatan']));
            $jenis_kelamin  = mysqli_real_escape_string($mysqli, trim($_POST['jenis_kelamin']));
            $alamat  = mysqli_real_escape_string($mysqli, trim($_POST['alamat']));
            $no_telp = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['no_telp'])));
           


                //$updated_user = $_SESSION['id_user'];

                // perintah query untuk mengubah data pada tabel 
                $query = mysqli_query($mysqli, "UPDATE data_karyawan SET  id_karyawan   = '$id_karyawan',
                                                                    nama_karyawan       = '$nama_karyawan',
                                                                    jabatan             = '$jabatan',
                                                                    jenis_kelamin       = '$jenis_kelamin',
                                                                    alamat              = '$alamat',
                                                                    no_telp             = '$no_telp'
                                                              WHERE id_karyawan       = '$id_karyawan'")
                                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                // cek query
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil update data
                    header("location: ../../main.php?module=karyawan&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id_karyawan = $_GET['id'];
    
            // perintah query untuk menghapus data pada tabel obat
            $query = mysqli_query($mysqli, "DELETE FROM data_karyawan WHERE id_karyawan='$id_karyawan'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=karyawan&alert=3");
            }
        }
    }       
}       
?>