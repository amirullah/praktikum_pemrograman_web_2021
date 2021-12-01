<?php
require "koneksi.php";
$kd_brg = $_POST['kd_brg'];
$nm_brg = $_POST['nm_brg'];
$ket    = $_POST['ket'];
$stok   = $_POST['stok'];

$input  = mysqli_query($conn, "INSERT INTO tb_barang(kode_barang,nama_barang,keterangan,stok)VALUES('$kd_brg','$nm_brg','$ket','$stok')");
if ($input) {
    echo "<script>window.location = '../databrg'</script>";
} else {
    echo "<script>alert('Maaf data gagal disimpan, silahkan ulangi kembali');
    window.location = '../databrg'</script>";
}
