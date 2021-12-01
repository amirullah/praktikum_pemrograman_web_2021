<?php
require "koneksi.php";
$username   = $_POST['username'];
$password   = $_POST['password'];

$hasil  = mysqli_query($conn, "select * from tb_user WHERE username='$username'");
$row    = mysqli_fetch_array($hasil);

if (isset($row['username'])) {
    echo "id adalah: " . $row['id'] . "<br>";
    echo "Username adalah: " . $row['username'] . "<br>";
    echo "Password adalah: " . $row['password'] . "<br>";
    echo "Level adalah: " . $row['level'] . "<br>";
    // echo "Password adalah: " . $password . "<br>";
} else {
    echo "<script>
    alert('Mohon maaf username yang anda masukkan salah');
    </script>";
}
