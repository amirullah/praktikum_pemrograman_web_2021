<?php
require "koneksi.php";
$kd_brg = $_POST['kd_brg'];
$aksi   = $_POST['aksi'];

$update = mysqli_query($conn, "UPDATE tb_peminjaman SET status='$aksi' WHERE barang='$kd_brg'");

if ($update) {
    echo "<script>alert('Data berhasil diperbarui');
    window.location='../datapeminjaman';</script>";
} else {
    echo "<script>alert('Mohon maaf data gagal diperbarui');
    window.location='../datapeminjaman';
    </script>";
}
