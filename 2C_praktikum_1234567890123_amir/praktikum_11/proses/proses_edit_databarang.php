<?php
require "koneksi.php";
$kd_brg = $_POST['kd_brg'];
$nm_brg = $_POST['nm_brg'];
$ket    = $_POST['ket'];
$stok   = $_POST['stok'];

$update = mysqli_query($conn, "UPDATE tb_barang SET nama_barang='$nm_brg', keterangan='$ket', stok='$stok' WHERE kode_barang='$kd_brg'");

if ($update) {
    echo "<script>window.location='../databrg';</script>";
} else {
    echo "<script>alert('Mohon maaf data gagal diperbarui');
    window.location='../databrg';
    </script>";
}
