<?php
require "koneksi.php";
$kd_brg     = $_POST['kd_brg'];

$sql    = mysqli_query($conn, "DELETE FROM tb_barang WHERE kode_barang='$kd_brg'");
if ($sql) {
    echo "<script>
        alert('Data berhasil dihapus');
        window.location = '../databarang'
    </script>";
} else {
    echo "<script>
        alert('Data gagal dihapus');
        window.location = '../databarang'
    </script>";
}
