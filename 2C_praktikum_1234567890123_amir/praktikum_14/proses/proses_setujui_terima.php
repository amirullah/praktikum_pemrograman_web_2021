<?php
require "koneksi.php";
$kd_brg = $_POST['kd_brg'];

$update = mysqli_query($conn, "UPDATE tb_peminjaman SET status=5 WHERE barang='$kd_brg'");

if ($update) {
    echo "<script>alert('Data berhasil diterima');
    window.location='../datapeminjaman';</script>";
} else {
    echo "<script>alert('Mohon maaf data gagal diterima');
    window.location='../datapeminjaman';
    </script>";
}
