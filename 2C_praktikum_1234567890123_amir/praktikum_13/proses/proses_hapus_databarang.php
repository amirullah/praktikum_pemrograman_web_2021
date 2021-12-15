<?php
require "koneksi.php";
$kd_brg = $_GET['id'];

$delete = mysqli_query($conn, "DELETE FROM tb_barang WHERE kode_barang='$kd_brg'");
if ($delete) {
    echo "<script>window.location = '../databrg'</script>";
} else {
    echo "<script>alert('Maaf data gagal dihapus, silahkan ulangi kembali');
    window.location = '../databrg'</script>";
}
