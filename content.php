
<?php
/* panggil file database.php untuk koneksi ke database */
require_once "config/database.php";
/* panggil file fungsi tambahan */
require_once "config/fungsi_tanggal.php";
require_once "config/fungsi_rupiah.php";
// fungsi untuk pengecekan status login user
// jika user belum login, alihkan ke halaman login dan tampilkan message = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika user sudah login, maka jalankan perintah untuk pemanggilan file halaman konten
else {
	// jika halaman konten yang dipilih beranda, panggil file view beranda
	if ($_GET['module'] == 'beranda') {
		include "modules/beranda/view.php";
	}
	// Master Data
	elseif ($_GET['module'] == 'karyawan') {
		include "modules/karyawan/view.php";
	}
	// jika halaman konten yang dipilih form user, panggil file form user
	elseif ($_GET['module'] == 'form_karyawan') {
		include "modules/karyawan/form.php";
	}
	//
	elseif ($_GET['module'] == 'pelanggan') {
		include "modules/pelanggan/view.php";
	}
	// jika halaman konten yang dipilih form user, panggil file form user
	elseif ($_GET['module'] == 'form_pelanggan') {
		include "modules/pelanggan/form.php";
	}
	elseif ($_GET['module'] == 'kategori') {
		include "modules/kategori/view.php";
	}
	// jika halaman konten yang dipilih form user, panggil file form user
	elseif ($_GET['module'] == 'form_kategori') {
		include "modules/kategori/form.php";
	}
	elseif ($_GET['module'] == 'produk') {
		include "modules/produk/view.php";
	}
	// jika halaman konten yang dipilih form user, panggil file form user
	elseif ($_GET['module'] == 'form_produk') {
		include "modules/produk/form.php";
	}
	elseif ($_GET['module'] == 'ongkir') {
		include "modules/ongkir/view.php";
	}
	// jika halaman konten yang dipilih form user, panggil file form user
	elseif ($_GET['module'] == 'form_ongkir') {
		include "modules/ongkir/form.php";
	}

	elseif ($_GET['module'] == 'diskon') {
		include "modules/diskon/view.php";
	}
	// jika halaman konten yang dipilih form user, panggil file form user
	elseif ($_GET['module'] == 'form_diskon') {
		include "modules/diskon/form.php";
	}

	elseif ($_GET['module'] == 'provinsi') {
		include "modules/provinsi/view.php";
	}
	// jika halaman konten yang dipilih form user, panggil file form user
	elseif ($_GET['module'] == 'form_provinsi') {
		include "modules/provinsi/form.php";
	}

	elseif ($_GET['module'] == 'kabupaten') {
		include "modules/kabupaten/view.php";
	}
	// jika halaman konten yang dipilih form user, panggil file form user
	elseif ($_GET['module'] == 'form_kabupaten') {
		include "modules/kabupaten/form.php";
	}

	elseif ($_GET['module'] == 'kecamatan') {
		include "modules/kecamatan/view.php";
	}
	// jika halaman konten yang dipilih form user, panggil file form user
	elseif ($_GET['module'] == 'form_kecamatan') {
		include "modules/kecamatan/form.php";
	}

	elseif ($_GET['module'] == 'desa') {
		include "modules/desa/view.php";
	}
	// jika halaman konten yang dipilih form user, panggil file form user
	elseif ($_GET['module'] == 'form_desa') {
		include "modules/desa/form.php";
	}
	
	// -----------------------------------------------------------------------------
	// Transaksi
	// jika halaman konten yang dipilih laporan stok, panggil file view laporan stok
	elseif ($_GET['module'] == 'pembelian') {
		include "modules/pembelian/view.php";
	}
	// -----------------------------------------------------------------------------
	// jika halaman konten yang dipilih laporan obat masuk, panggil file view laporan obat masuk
	elseif ($_GET['module'] == 'form_pembelian') {
		include "modules/pembelian/form.php";
	}
	// -----------------------------------------------------------------------------
	// jika halaman konten yang dipilih laporan stok, panggil file view laporan stok
	
	// -----------------------------------------------------------------------------
	// jika halaman konten yang dipilih laporan stok, panggil file view laporan stok
	elseif ($_GET['module'] == 'pembayaran') {
		include "modules/pembayaran/view.php";
	}
	// -----------------------------------------------------------------------------
	// jika halaman konten yang dipilih laporan obat masuk, panggil file view laporan obat masuk
	elseif ($_GET['module'] == 'form_pembayaran') {
		include "modules/pembayaran/form.php";
	}

	elseif ($_GET['module'] == 'pengiriman') {
		include "modules/pengiriman/view.php";
	}
	// -----------------------------------------------------------------------------
	// jika halaman konten yang dipilih laporan obat masuk, panggil file view laporan obat masuk
	elseif ($_GET['module'] == 'form_pengiriman') {
		include "modules/pengiriman/form.php";
	}
	elseif ($_GET['module'] == 'form_pengiriman2') {
		include "modules/pengiriman/form2.php";
	}

	//-----------------------------------------------------------------

	elseif ($_GET['module'] == 'lap-pembelian') {
		include "modules/lap-pembelian/view.php";
	}
	// -----------------------------------------------------------------------------
	// jika halaman konten yang dipilih laporan obat masuk, panggil file view laporan obat masuk
	elseif ($_GET['module'] == 'form_lap-pembelian') {
		include "modules/lap-pembelian/form.php";
	}

	elseif ($_GET['module'] == 'lap-pembayaran') {
		include "modules/lap-pembayaran/view.php";
	}
	// -----------------------------------------------------------------------------
	// jika halaman konten yang dipilih laporan obat masuk, panggil file view laporan obat masuk
	elseif ($_GET['module'] == 'form_lap-pembayaran') {
		include "modules/pembayaran/form.php";
	}
	elseif ($_GET['module'] == 'lap-pengiriman') {
		include "modules/lap-pengiriman/view.php";
	}
	// -----------------------------------------------------------------------------
	// jika halaman konten yang dipilih laporan obat masuk, panggil file view laporan obat masuk
	elseif ($_GET['module'] == 'form_lap-pengiriman') {
		include "modules/lap-pengiriman/form.php";
	}


	// -----------------------------------------------------------------------------
	// jika halaman konten yang dipilih user, panggil file view user
	elseif ($_GET['module'] == 'user') {
		include "modules/user/view.php";
	}
	// jika halaman konten yang dipilih form user, panggil file form user
	elseif ($_GET['module'] == 'form_user') {
		include "modules/user/form.php";
	}
	// -----------------------------------------------------------------------------
	// jika halaman konten yang dipilih profil, panggil file view profil
	elseif ($_GET['module'] == 'profil') {
		include "modules/profil/view.php";
	}
	// jika halaman konten yang dipilih form profil, panggil file form profil
	elseif ($_GET['module'] == 'form_profil') {
		include "modules/profil/form.php";
	}
	// -----------------------------------------------------------------------------
	
	// jika halaman konten yang dipilih password, panggil file view password
	elseif ($_GET['module'] == 'password') {
		include "modules/password/view.php";
	}
}
?>