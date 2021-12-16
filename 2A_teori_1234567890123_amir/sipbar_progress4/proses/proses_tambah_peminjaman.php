<?php
session_start();
require "koneksi.php";
$brg    = $_POST['brg'];
$mk     = $_POST['mk'];

$select     = mysqli_query($conn, "SELECT id FROM tb_user WHERE username='$_SESSION[username]'");
$hasilnya   = mysqli_fetch_array($select);
if ($hasilnya) {
    $select1     = mysqli_query($conn, "SELECT barang FROM tb_peminjaman WHERE barang=$brg");
    $hasilnya1   = mysqli_fetch_array($select1);
    if ($hasilnya1) {
        echo "<script>alert('Peminjaman Gagal ditambahkan, barang telah dipinjam')</script>";
        echo "<script>window.location = '../pinjam'</script>";
    } else {
        $input  = mysqli_query($conn, "INSERT INTO tb_peminjaman (barang,user,status,matakuliah) VALUES($brg,$hasilnya[id],1,'$mk')");
        if ($input) {
            echo "<script>alert('Peminjaman berhasil ditambahkan')</script>";
            echo "<script>window.location = '../pinjam'</script>";
        } else {
            echo "<script>alert('Peminjaman gagal ditambahkan')</script>";
            echo "<script>window.location = '../pinjam'</script>";
        }
    }
} else {
    echo "<script>alert('Peminjaman gagal ditambahkan')</script>";
    echo "<script>window.location = '../pinjam'</script>";
}
