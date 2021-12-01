<?php
if ($_GET['url'] = 'home') {
    // echo "bvdjfvdsbjf";
    require "home.php";
} elseif ($_GET['url'] = 'peminjaman') {
    require "peminjaman.php";
} elseif ($_GET['url'] = 'mhs') {
    require "mahasiswa.php";
} elseif ($_GET['url'] = 'peminjaman') {
    require "peminjaman.php";
} elseif ($_GET['url'] = 'barang') {
    require "barang.php";
} elseif ($_GET['url'] = 'dosen') {
    require "dosen.php";
}
