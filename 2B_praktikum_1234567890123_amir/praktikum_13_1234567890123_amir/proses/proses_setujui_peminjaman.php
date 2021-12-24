<?php
require "koneksi.php";
$kd_brg     = $_POST['kd_brg'];
$aksi       = $_POST['aksi'];

$sql = mysqli_query($conn, "UPDATE tb_peminjaman SET status='$aksi' WHERE barang='$kd_brg'");
if ($sql) {
    echo "<script>
            alert('Data berhasil diubah');
            window.location = '../datapeminjaman'
        </script>";
} else {
    echo "<script>
            alert('Data gagal diubah');
            window.location = '../datapeminjaman'
        </script>";
}
