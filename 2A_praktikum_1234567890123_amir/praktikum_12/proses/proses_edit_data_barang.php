<?php
require "koneksi.php";
$id     = $_POST['id'];
$nm_brg = $_POST['nm_brg'];
$ket    = $_POST['ket'];
$gambar_brg = $_POST['gambar_brg'];

echo $gambar_brg;
exit();
$update = mysqli_query($conn, "UPDATE tb_barang SET nama_barang='$nm_brg', keterangan='$ket' WHERE id='$id'");
if ($update) {
    echo "<script>window.location='../barang';</script>";
} else {
    echo "<script>alert('Mohon maaf data gagal diperbarui')</script>";
}
