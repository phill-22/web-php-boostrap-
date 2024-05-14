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
        include "pages/bagian.php";
        break;
    case "bagian_tambah":
        include "pages/bagian_tambah.php";
        break;
    case "bagian_hapus":
        include "pages/bagian_hapus.php";
        break;
    case "bagian_ubah":
        include "pages/bagian_ubah.php";
    default:
        include "pages/404.php";
}
