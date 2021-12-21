<?php
if (empty($_GET['x'])) {
    echo "<script>window.location='home';</script>";
} elseif ($_GET['x'] == 'home') {
    require "home.php";
} elseif ($_GET['x'] == 'pinjam') {
    require "pinjam.php";
} elseif ($_GET['x'] == 'mhs') {
    require "mahasiswa.php";
} elseif ($_GET['x'] == 'barang') {
    require "barang.php";
} elseif ($_GET['x'] == 'dosen') {
    require "dosen.php";
} elseif ($_GET['x'] == 'profile') {
    require "profile.php";
} else {
    echo "<script>window.location='home';</script>";
}
