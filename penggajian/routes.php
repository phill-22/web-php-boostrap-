<?php

if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = "";
}

switch ($page) {
    case "":
    case "dashboard":
        include "pages/dashboard.php";
        break;
    case "bagian":
        include "pages/bagian/bagian.php";
        break;
    case "bagian_tambah":
        include "pages/bagian/bagian_tambah.php";
        break;
    case "bagian_hapus":
        include "pages/bagian/bagian_hapus.php";
        break;
    case "bagian_ubah":
        include "pages/bagian/bagian_ubah.php";
        break;
    case "karyawan":
        include "pages/karyawan/karyawan.php";
        break;
    case "karyawan_tambah":
        include "pages/karyawan/karyawan_tambah.php";
        break;
    case "karyawan_hapus":
        include "pages/karyawan/karyawan_hapus.php";
        break;
    case "karyawan_ubah":
        include "pages/karyawan/karyawana_ubah.php";
        break;
    case "pilih_bulan_tahun_penggajian":
        include "pages/gaji/pilih_bulan_tahun_penggajian.php";
        break;
    case "penggajian":
        include "pages/gaji/penggajian.php";
        break;
    case "pilih_karyawan_penggajian":
        include "pages/gaji/pilih_karyawan_penggajian.php";
        break;
    case "penggajian_tambah":
        include "pages/gaji/penggajian_tambah.php";
        break;
    case "penggajian_hapus":
        include "pages/gaji/penggajian_hapus.php";
        break;
    default:
        include "pages/404.php";
}
