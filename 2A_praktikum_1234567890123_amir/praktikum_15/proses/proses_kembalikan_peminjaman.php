<?php
require "koneksi.php";
$id     = $_POST['id_peminjaman'];

$sql   = mysqli_query($conn, "UPDATE tb_peminjaman SET status=5 WHERE id_peminjaman='$id'");
if ($sql) {
    echo "<script>alert('Data berhasil diubah')</script>";
    echo "<script>window.location='../pinjam';</script>";
} else {
    echo "<script>alert('Data gagal diubah')</script>";
    echo "<script>window.location='../pinjam';</script>";
}
