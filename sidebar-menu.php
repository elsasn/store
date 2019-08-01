<?php
// fungsi pengecekan level untuk menampilkan menu sesuai dengan hak akses
// jika hak akses = Super Admin, tampilkan menu
if ($_SESSION['hak_akses']=='Super Admin') { ?>
<!-- sidebar menu start -->
<ul class="sidebar-menu">
  <li class="header">MAIN MENU</li>
  <?php
  // fungsi untuk pengecekan menu aktif
  // jika menu beranda dipilih, menu beranda aktif
  if ($_GET["module"]=="beranda") { ?>
  <li class="active">
    <a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
  </li>
  <?php
  }
  // jika tidak, menu home tidak aktif
  else { ?>
  <li>
    <a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
  </li>
  <?php
  }
  // jika menu data obat dipilih, menu data obat aktif
  if ($_GET["module"]=="master_data") { ?>
  <li class="active treeview">
    <a href="javascript:void(0);">
      <i class="fa fa-file-text"></i> <span>Master Data</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="?module=karyawan"><i class="fa fa-circle-o"></i> Karyawan </a></li>
      <li><a href="?module=pelanggan"><i class="fa fa-circle-o"></i> Pelanggan </a></li>
      <li><a href="?module=produk"><i class="fa fa-circle-o"></i> Produk </a></li>
      <li><a href="?module=kategori"><i class="fa fa-circle-o"></i> Kategori </a></li>
      <li><a href="?module=ongkir"><i class="fa fa-circle-o"></i> Ongkir </a></li>
      <li><a href="?module=provinsi"><i class="fa fa-circle-o"></i> Provinsi </a></li>
      <li><a href="?module=kabupaten"><i class="fa fa-circle-o"></i> Kabupaten/Kota </a></li>
      <li><a href="?module=kecamatan"><i class="fa fa-circle-o"></i> Kecamatan </a></li>
      <li><a href="?module=desa"><i class="fa fa-circle-o"></i> Desa </a></li>
    </ul>
  </li>
  <?php
  }
  // jika menu Laporan  Masuk dipilih, menu Laporan  Masuk aktif
  elseif ($_GET["module"]=="lap") { ?>
  <li class="active treeview">
    <a href="javascript:void(0);">
      <i class="fa fa-file-text"></i> <span>Master Data</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="?module=karyawan"><i class="fa fa-circle-o"></i> Karyawan </a></li>
       <li><a href="?module=pelanggan"><i class="fa fa-circle-o"></i> Pelanggan </a></li>
      <li><a href="?module=produk"><i class="fa fa-circle-o"></i> Produk </a></li>
      <li><a href="?module=kategori"><i class="fa fa-circle-o"></i> Kategori </a></li>
      <li><a href="?module=ongkir"><i class="fa fa-circle-o"></i> Ongkir </a></li>
      <li><a href="?module=provinsi"><i class="fa fa-circle-o"></i> Provinsi </a></li>
      <li><a href="?module=kabupaten"><i class="fa fa-circle-o"></i> Kabupaten/Kota </a></li>
      <li><a href="?module=kecamatan"><i class="fa fa-circle-o"></i> Kecamatan </a></li>
      <li><a href="?module=desa"><i class="fa fa-circle-o"></i> Desa </a></li>
    </ul>
  </li>
  <?php
  }
  // jika menu Laporan tidak dipilih, menu Laporan tidak aktif
  else { ?>
  <li class="treeview">
    <a href="javascript:void(0);">
      <i class="fa fa-file-text"></i> <span>Master Data</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="?module=karyawan"><i class="fa fa-circle-o"></i> Karyawan </a></li>
       <li><a href="?module=pelanggan"><i class="fa fa-circle-o"></i> Pelanggan </a></li>
      <li><a href="?module=produk"><i class="fa fa-circle-o"></i> Produk </a></li>
      <li><a href="?module=kategori"><i class="fa fa-circle-o"></i> Kategori </a></li>
      <li><a href="?module=ongkir"><i class="fa fa-circle-o"></i> Ongkir </a></li>
      <li><a href="?module=provinsi"><i class="fa fa-circle-o"></i> Provinsi </a></li>
      <li><a href="?module=kabupaten"><i class="fa fa-circle-o"></i> Kabupaten/Kota </a></li>
      <li><a href="?module=kecamatan"><i class="fa fa-circle-o"></i> Kecamatan </a></li>
      <li><a href="?module=desa"><i class="fa fa-circle-o"></i> Desa </a></li>
    </ul>
  </li>
  <?php
  }
  // jika menu Laporan Stok obat dipilih, menu Laporan Stok obat aktif
  if ($_GET["module"]=="lap_stok") { ?>
  <li class="active treeview">
    <a href="javascript:void(0);">
      <i class="fa fa-file-text"></i> <span>Transaksi</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="?module=pembelian"><i class="fa fa-circle-o"></i> Pembelian </a></li>
      <li class="active"><a href="?module=pembayaran"><i class="fa fa-circle-o"></i> Pembayaran </a></li>
      <li class="active"><a href="?module=pengiriman"><i class="fa fa-circle-o"></i> Pengiriman </a></li>
    </ul>
  </li>
  <?php
  }
  // jika menu Laporan obat Masuk dipilih, menu Laporan obat Masuk aktif
  elseif ($_GET["module"]=="lap_obat_masuk") { ?>
  <li class="active treeview">
    <a href="javascript:void(0);">
      <i class="fa fa-file-text"></i> <span>Transaksi</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="?module=pembelian"><i class="fa fa-circle-o"></i> Pembelian </a></li>
      <li class="active"><a href="?module=pembayaran"><i class="fa fa-circle-o"></i> Pembayaran </a></li>
      <li class="active"><a href="?module=pengiriman"><i class="fa fa-circle-o"></i> Pengiriman </a></li>
    </ul>
  </li>
  <?php
  }
  // jika menu Laporan tidak dipilih, menu Laporan tidak aktif
  else { ?>
  <li class="treeview">
    <a href="javascript:void(0);">
      <i class="fa fa-file-text"></i> <span>Transaksi</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="?module=pembelian"><i class="fa fa-circle-o"></i> Pembelian </a></li>
      <li class="active"><a href="?module=pembayaran"><i class="fa fa-circle-o"></i> Pembayaran </a></li>
      <li class="active"><a href="?module=pengiriman"><i class="fa fa-circle-o"></i> Pengiriman </a></li>
    </ul>
  </li>
  <?php
  }
if ($_GET["module"]=="grafik") { ?>
  <li class="active treeview">
    <a href="javascript:void(0);">
      <i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="?module=lap-pembelian"><i class="fa fa-circle-o"></i> Laporan pembelian </a></li>
      <li><a href="?module=lap-pembayaran"><i class="fa fa-circle-o"></i> Laporan Pembayaran </a></li>
      <li><a href="?module=lap-pengiriman"><i class="fa fa-circle-o"></i> Laporan pengiriman </a></li>
      
    </ul>
  </li>
  <?php
    }
    // jika menu Laporan obat Masuk dipilih, menu Laporan obat Masuk aktif
  elseif ($_GET["module"]=="grafik") { ?>
  <li class="active treeview">
    <a href="javascript:void(0);">
      <i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="?module=lap-pembelian"><i class="fa fa-circle-o"></i> Laporan pembelian </a></li>
      <li><a href="?module=lap-pembayaran"><i class="fa fa-circle-o"></i> Laporan Pembayaran </a></li>
      <li><a href="?module=lap-pengiriman"><i class="fa fa-circle-o"></i> Laporan pengiriman </a></li>
    </ul>
  </li>
  <?php
    }

    // jika menu Laporan tidak dipilih, menu Laporan tidak aktif
  else { ?>
  <li class="treeview">
    <a href="javascript:void(0);">
      <i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="?module=lap-pembelian"><i class="fa fa-circle-o"></i> Laporan pembelian </a></li>
      <li><a href="?module=lap-pembayaran"><i class="fa fa-circle-o"></i> Laporan Pembayaran </a></li>
      <li><a href="?module=lap-pengiriman"><i class="fa fa-circle-o"></i> Laporan pengiriman </a></li>
      
    </ul>
  </li>
  <?php
    }

    if ($_GET["module"]=="grafik") { ?>
  <li class="active treeview">
    <a href="javascript:void(0);">
      <i class="fa fa-file-text"></i> <span>Grafik</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="?module=grafik-pembelian"><i class="fa fa-circle-o"></i> Grafik pembelian </a></li>
      <li><a href="?module=grafik-pembayaran"><i class="fa fa-circle-o"></i> Grafik Pembayaran </a></li>
      <li><a href="?module=grafik-pengiriman"><i class="fa fa-circle-o"></i> Grafik pengiriman </a></li>
      
    </ul>
  </li>
  <?php
    }
    // jika menu Laporan obat Masuk dipilih, menu Laporan obat Masuk aktif
  elseif ($_GET["module"]=="grafik") { ?>
  <li class="active treeview">
    <a href="javascript:void(0);">
      <i class="fa fa-file-text"></i> <span>Grafik</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="?module=grafik-pembelian"><i class="fa fa-circle-o"></i> Grafik pembelian </a></li>
      <li><a href="?module=grafik-pembayaran"><i class="fa fa-circle-o"></i> Grafik Pembayaran </a></li>
      <li><a href="?module=grafik-pengiriman"><i class="fa fa-circle-o"></i> Grafik pengiriman </a></li>
    </ul>
  </li>
  <?php
    }

    // jika menu Laporan tidak dipilih, menu Laporan tidak aktif
  else { ?>
  <li class="treeview">
    <a href="javascript:void(0);">
      <i class="fa fa-file-text"></i> <span>Grafik</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="?module=grafik-pembelian"><i class="fa fa-circle-o"></i> Grafik pembelian </a></li>
      <li><a href="?module=grafik-pembayaran"><i class="fa fa-circle-o"></i> Grafik Pembayaran </a></li>
      <li><a href="?module=grafik-pengiriman"><i class="fa fa-circle-o"></i> Grafik pengiriman </a></li>
      
    </ul>
  </li>
  <?php
    }
    // jika menu user dipilih, menu user aktif
  if ($_GET["module"]=="user" || $_GET["module"]=="form_user") { ?>
  <li class="active">
    <a href="?module=user"><i class="fa fa-user"></i> Manajemen User</a>
  </li>
  <?php
  }
  // jika tidak, menu user tidak aktif
  else { ?>
  <li>
    <a href="?module=user"><i class="fa fa-user"></i> Manajemen User</a>
  </li>
  <?php
  }
  // jika menu ubah password dipilih, menu ubah password aktif
  if ($_GET["module"]=="password") { ?>
  <li class="active">
    <a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
  </li>
  <?php
  }
  // jika tidak, menu ubah password tidak aktif
  else { ?>
  <li>
    <a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
  </li>
  <?php
  }
  ?>
</ul>
<!--sidebar menu end-->
<?php
}
// jika hak akses = Manajer, tampilkan menu
elseif ($_SESSION['hak_akses']=='Owner') { ?>
<!-- sidebar menu start -->
<ul class="sidebar-menu">
  <li class="header">MAIN MENU</li>
  <?php
  // fungsi untuk pengecekan menu aktif
  // jika menu beranda dipilih, menu beranda aktif
  if ($_GET["module"]=="beranda") { ?>
  <li class="active">
    <a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
  </li>
  <?php
  }
  // jika tidak, menu beranda tidak aktif
  else { ?>
  <li>
    <a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
  </li>
  <?php
  }
  
  if ($_GET["module"]=="lap") { ?>
  <li class="active treeview">
    <a href="javascript:void(0);">
      <i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="?module=lap-pembelian"><i class="fa fa-circle-o"></i> Laporan Pembelian </a></li>
      <li><a href="?module=lap-pembayaran"><i class="fa fa-circle-o"></i> Laporan Pembayaran </a></li>
      <li><a href="?module=lap-pengiriman"><i class="fa fa-circle-o"></i> Laporan pengiriman </a></li>
    </ul>
  </li>
  <?php
  }
  
  elseif ($_GET["module"]=="lap") { ?>
  <li class="active treeview">
    <a href="javascript:void(0);">
      <i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li><a href="?module=lap-pembelian"><i class="fa fa-circle-o"></i> Laporan Pembelian </a></li>
      <li class="active"><a href="?module=lap-pembayaran"><i class="fa fa-circle-o"></i> Laporan Pembayaran </a></li>
      <li class="active"><a href="?module=lap-pengiriman"><i class="fa fa-circle-o"></i> Laporan pengiriman </a></li>
    </ul>
  </li>
  <?php
  }
  // jika menu Laporan tidak dipilih, menu Laporan tidak aktif
  else { ?>
  <li class="treeview">
    <a href="javascript:void(0);">
      <i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li><a href="?module=lap-pembelian"><i class="fa fa-circle-o"></i> Laporan Pembelian </a></li>
      <li><a href="?module=lap-pembayaran"><i class="fa fa-circle-o"></i> Laporan Pembayaran </a></li>
      <li><a href="?module=lap-pengiriman"><i class="fa fa-circle-o"></i> Laporan pengiriman </a></li>
    </ul>
  </li>
  <?php
  }
    // jika menu ubah password dipilih, menu ubah password aktif
  if ($_GET["module"]=="password") { ?>
  <li class="active">
    <a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
  </li>
  <?php
  }
  // jika tidak, menu ubah password tidak aktif
  else { ?>
  <li>
    <a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
  </li>
  <?php
  }
  ?>
</ul>
<!--sidebar menu end-->
<?php
}
// jika hak akses = Gudang, tampilkan menu
if ($_SESSION['hak_akses']=='Operator') { ?>
<!-- sidebar menu start -->
<ul class="sidebar-menu">
  <li class="header">MAIN MENU</li>
  <?php
  // fungsi untuk pengecekan menu aktif
  // jika menu beranda dipilih, menu beranda aktif
  if ($_GET["module"]=="beranda") { ?>
  <li class="active">
    <a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
  </li>
  <?php
  }
  // jika tidak, menu beranda tidak aktif
  else { ?>
  <li>
    <a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
  </li>
  <?php
  }
    // fungsi untuk pengecekan menu aktif
    // jika menu beranda dipilih, menu beranda aktif
  if ($_GET["module"]=="lap_stok") { ?>
  <li class="active treeview">
    <a href="javascript:void(0);">
      <i class="fa fa-file-text"></i> <span>Transaksi</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="?module=pembelian"><i class="fa fa-circle-o"></i> Pembelian </a></li>
      <li class="active"><a href="?module=pembayaran"><i class="fa fa-circle-o"></i> Pembayaran </a></li>
      <li class="active"><a href="?module=pengiriman"><i class="fa fa-circle-o"></i> pengiriman </a></li>
      <!--  <li><a href="?module=pembayaran"><i class="fa fa-circle-o"></i> Pembayaran </a></li> -->
      
    </ul>
  </li>
  <?php
  }
  // jika menu Laporan obat Masuk dipilih, menu Laporan obat Masuk aktif
  elseif ($_GET["module"]=="lap_obat_masuk") { ?>
  <li class="active treeview">
    <a href="javascript:void(0);">
      <i class="fa fa-file-text"></i> <span>Transaksi</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="?module=pembelian"><i class="fa fa-circle-o"></i> Pembelian </a></li>
      <li class="active"><a href="?module=pembayaran"><i class="fa fa-circle-o"></i> Pembayaran </a></li>
      <!--  <li><a href="?module=pembayaran"><i class="fa fa-circle-o"></i> Pembayaran </a></li> -->
    </ul>
  </li>
  <?php
  }
  // jika menu Laporan tidak dipilih, menu Laporan tidak aktif
  else { ?>
  <li class="treeview">
    <a href="javascript:void(0);">
      <i class="fa fa-file-text"></i> <span>Transaksi</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="?module=pembelian"><i class="fa fa-circle-o"></i> Pembelian </a></li>
      <li class="active"><a href="?module=pembayaran"><i class="fa fa-circle-o"></i> Pembyaran </a></li>
      <!-- <li><a href="?module=pembayaran"><i class="fa fa-circle-o"></i> Pembayaran </a></li> -->
      
    </ul>
  </li>
  <?php
  }
    // jika menu ubah password dipilih, menu ubah password aktif
  if ($_GET["module"]=="password") { ?>
  <li class="active">
    <a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
  </li>
  <?php
  }
  // jika tidak, menu ubah password tidak aktif
  else { ?>
  <li>
    <a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
  </li>
  <?php
  }
  ?>
</ul>
<!--sidebar menu end-->
<?php
}
if ($_SESSION['hak_akses']=='Pelanggan') { ?>
<!-- sidebar menu start -->
<ul class="sidebar-menu">
  <li class="header">MAIN MENU</li>
  <?php
  // fungsi untuk pengecekan menu aktif
  // jika menu beranda dipilih, menu beranda aktif
  if ($_GET["module"]=="beranda") { ?>
  <li class="active">
    <a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
  </li>
  <?php
  }
  // jika tidak, menu beranda tidak aktif
  else { ?>
  <li>
    <a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
  </li>
  <?php
  }
  // fungsi untuk pengecekan menu aktif
  // jika menu beranda dipilih, menu beranda aktif
  if ($_GET["module"]=="lap_stok") { ?>
  <li class="active treeview">
    <a href="javascript:void(0);">
      <i class="fa fa-file-text"></i> <span>Transaksi</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="?module=pembelian"><i class="fa fa-circle-o"></i> Pembelian </a></li>
      <!-- <li class="active"><a href="?module=pembayaran"><i class="fa fa-circle-o"></i> Pembayaran </a></li> -->
      <!--  <li><a href="?module=pembayaran"><i class="fa fa-circle-o"></i> Pembayaran </a></li> -->
      
    </ul>
  </li>
  <?php
  }
  // jika menu Laporan obat Masuk dipilih, menu Laporan obat Masuk aktif
  elseif ($_GET["module"]=="lap_obat_masuk") { ?>
  <li class="active treeview">
    <a href="javascript:void(0);">
      <i class="fa fa-file-text"></i> <span>Transaksi</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="?module=pembelian"><i class="fa fa-circle-o"></i> Pembelian </a></li>
      <!-- <li class="active"><a href="?module=pembayaran"><i class="fa fa-circle-o"></i> Pembayaran </a></li> -->
      <!--  <li><a href="?module=pembayaran"><i class="fa fa-circle-o"></i> Pembayaran </a></li> -->
    </ul>
  </li>
  <?php
  }
  // jika menu Laporan tidak dipilih, menu Laporan tidak aktif
  else { ?>
  <li class="treeview">
    <a href="javascript:void(0);">
      <i class="fa fa-file-text"></i> <span>Transaksi</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="?module=pembelian"><i class="fa fa-circle-o"></i> Pembelian </a></li>
      <!--  <li class="active"><a href="?module=pembayaran"><i class="fa fa-circle-o"></i> Pembyaran </a></li> -->
      <!-- <li><a href="?module=pembayaran"><i class="fa fa-circle-o"></i> Pembayaran </a></li> -->
      
    </ul>
  </li>
  <?php
  }
  // jika menu ubah password dipilih, menu ubah password aktif
  if ($_GET["module"]=="password") { ?>
  <li class="active">
    <a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
  </li>
  <?php
  }
  // jika tidak, menu ubah password tidak aktif
  else { ?>
  <li>
    <a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
  </li>
  <?php
  }
  ?>
</ul>
<!--sidebar menu end-->
<?php
}
?>
?>