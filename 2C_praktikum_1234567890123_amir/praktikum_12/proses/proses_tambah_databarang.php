<?php
require "koneksi.php";
$kd_brg = $_POST['kd_brg'];
$nm_brg = $_POST['nm_brg'];
$ket    = $_POST['ket'];
$kondisi   = $_POST['kondisi'];

$input  = mysqli_query($conn, "INSERT INTO tb_barang(kode_barang,nama_barang,keterangan,kondisi)VALUES('$kd_brg','$nm_brg','$ket','$kondisi')");
if ($input) {
    echo "<script>window.location = '../databrg'</script>";
} else {
    echo "<script>alert('Maaf data gagal disimpan, silahkan ulangi kembali');
    window.location = '../databrg'</script>";
}
