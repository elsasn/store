<?php





session_start();


// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
} else { // jika user sudah login, maka jalankan perintah untuk insert, update, dan delete
    $act = isset($_GET['act']) ? $_GET['act'] : '';

    if ($act == 'insert') {
        if (isset($_POST['simpan'])) {
            // ambil data hasil submit dari form
            $id_pembelian  = mysqli_real_escape_string($mysqli, trim($_POST['id_pembelian']));
            $id_pelanggan  = mysqli_real_escape_string($mysqli, trim($_POST['id_pelanggan']));
            $id_jadwal  = mysqli_real_escape_string($mysqli, trim($_POST['id_jadwal']));
            $harga  = mysqli_real_escape_string($mysqli, trim($_POST['harga']));
            $jumlah_tiket = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['jumlah_tiket'])));
            $subtotal = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['subtotal'])));
            $tgl_berangkat = mysqli_real_escape_string($mysqli, trim($_POST['tgl_berangkat']));
           
          
            //$created_user = $_SESSION['id_user'];
            // perintah query untuk menyimpan data ke tabel pembelian
            //print_r($query);

            $query = mysqli_query($mysqli, "INSERT INTO pembelian(id_pembelian,id_pelanggan,id_jadwal,tgl_berangkat,jumlah_tiket,subtotal)
                VALUES ('$id_pembelian','$id_pelanggan','$id_jadwal','$jumlah_tiket','$subtotal','$tgl_berangkat')")
                or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));


            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?modules=pembelian&alert=1");
            }   
        }   
    } else if ($act == 'update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id_pembelian'])) {
                // ambil data hasil submit dari form
             $id_pembelian  = mysqli_real_escape_string($mysqli, trim($_POST['id_pembelian']));
            $id_pelanggan  = mysqli_real_escape_string($mysqli, trim($_POST['id_pelanggan']));
            $id_jadwal  = mysqli_real_escape_string($mysqli, trim($_POST['id_jadwal']));
            $harga  = mysqli_real_escape_string($mysqli, trim($_POST['harga']));
            $tgl_berangkat  = mysqli_real_escape_string($mysqli, trim($_POST['tgl_berangkat']));
            $jumlah_tiket = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['jumlah_tiket']))
            $subtotal = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['subtotal'])));
           


                //$updated_user = $_SESSION['id_user'];

                // perintah query untuk mengubah data pada tabel pembelian
                $query = mysqli_query($mysqli, "UPDATE pembelian_tiket SET  id_pembelian        = '$id_pembelian',
                                                                    id_pelanggan                = '$id_pelanggan',
                                                                    id_jadwal                    = '$id_jadwal',
                                                                    harga                       = '$harga',
                                                                    tgl_berangkat                = '$tgl_berangkat',
                                                                     jumlah_tiket                = '$jumlah_tiket',
                                                                      subtotal                = '$tgl_berangkat'
                                                              WHERE id_pembelian                = '$id_pembelian'")
                                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                // cek query
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil update data
                    header("location: ../../main.php?module=pembelian&alert=2");
                }         
            }
        }
    } else if ($act == 'delete') {
        if (isset($_GET['id'])) {
            $id_pembelian = $_GET['id'];
    
            // perintah query untuk menghapus data pada tabel obat
            $query = mysqli_query($mysqli, "DELETE FROM pembelian_tiket WHERE id_pembelian='$id_pembelian'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=pembelian&alert=3");
            }
        }
    }       
}       
?>