<?php
require "koneksi.php";
$kd_brg     = $_POST['kd_brg'];
$nm_brg     = $_POST['nm_brg'];
$ket_brg    = $_POST['ket'];
$stok_brg   = $_POST['stok'];

if (empty($kd_brg) || $kd_brg == "") {
    echo "<script>alert('Data tidak boleh kosong')</script>";
    echo "<script>window.location='../barang';</script>";
} else {
    $select = mysqli_query($conn, "SELECT kode_barang FROM tb_barang WHERE kode_barang='$kd_brg'");
    $hasil  = mysqli_fetch_array($select);
    if (isset($hasil['kode_barang'])) {
        echo "<script>alert('Data kode barang telah ada')</script>";
        echo "<script>window.location='../barang';</script>";
    } else {
        $sql    = mysqli_query($conn, "INSERT INTO tb_barang (kode_barang,nama_barang,keterangan,stok) VALUES('$kd_brg','$nm_brg','$ket_brg','$stok_brg')");
        if ($sql) {
            echo "<script>alert('Data berhasil ditambah')</script>";
            echo "<script>window.location='../barang';</script>";
        } else {
            echo "<script>alert('Mohon maaf data gagal ditambah')</script>";
            exit();
            echo "<script>window.location='../barang';</script>";
        }
    }
}
