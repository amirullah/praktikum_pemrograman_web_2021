<?php
require "koneksi.php";
$id     = $_POST['id_peminjaman'];
$aksi   = $_POST['aksi'];

$sql   = mysqli_query($conn, "UPDATE tb_peminjaman SET status='$aksi' WHERE id_peminjaman='$id'");
if ($sql) {
    echo "<script>alert('Data berhasil diubah')</script>";
    echo "<script>window.location='../peminjaman';</script>";
} else {
    echo "<script>alert('Data gagal diubah')</script>";
    echo "<script>window.location='../peminjaman';</script>";
}
