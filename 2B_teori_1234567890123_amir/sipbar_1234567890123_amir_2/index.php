<?php
if (empty($_GET['x'])) {
    echo "<script>window.location ='home'</script>";
} elseif ($_GET['x'] == 'home') {
    require "home.php";
} elseif ($_GET['x'] == 'databarang') {
    require "data_barang.php";
} elseif ($_GET['x'] == 'peminjaman') {
    require "peminjaman.php";
} elseif ($_GET['x'] == 'mahasiswa') {
    require "mahasiswa.php";
} elseif ($_GET['x'] == 'profile') {
    require "profile.php";
} else {
    echo "<script>window.location ='home'</script>";
}
