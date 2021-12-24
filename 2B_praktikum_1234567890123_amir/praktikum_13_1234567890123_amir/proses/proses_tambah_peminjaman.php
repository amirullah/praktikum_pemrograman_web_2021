<?php
session_start();
require "koneksi.php";
$barang      = $_POST['barang'];
$matakuliah  = $_POST['matakuliah'];

if (empty($_POST['wkt_kembali'])) {
    echo "<script>alert('Waktu pengembalian harus diisi');</script>";
    echo "<script>window.location ='../peminjaman'</script>";
} else {
    $wkt_kembali = $_POST['wkt_kembali'];
    $select = mysqli_query($conn, "SELECT * FROM tb_user WHERE username='$_SESSION[username]'");
    $hasil  = mysqli_fetch_array($select);
    if ($hasil) {
        $select1 = mysqli_query($conn, "SELECT * FROM tb_peminjaman WHERE barang='$barang'");
        $hasil1  = mysqli_fetch_array($select1);
        if (!$hasil1) {
            $input = mysqli_query($conn, "INSERT INTO tb_peminjaman (barang,user,status,matakuliah,waktu_pengembalian) VALUES('$barang','$hasil[id]',1,'$matakuliah','$wkt_kembali')");
            if ($input) {
                echo "<script>alert('Data berhasil ditambahkan');</script>";
                echo "<script>window.location ='../peminjaman'</script>";
            }
        } else {
            echo "<script>alert('Mohon maaf barang yang dimasukkan telah dipinjam');</script>";
            echo "<script>window.location ='../peminjaman'</script>";
        }
    }
}
