<?php
require "koneksi.php";
$username   = $_POST['username'];
$password   = md5($_POST['password']);

$hasil = mysqli_query($conn, "select * from tb_user WHERE username='$username' && password='$password'");
$row = mysqli_fetch_array($hasil);
if ($hasil) {
    if ((isset($row['username']) && isset($row['password'])) && $row['username'] == $username && $row['password'] == $password) {
        echo "Username adalah = " . $row['username'] . "<br>";
        echo "Password dalam database adalah = " . $row['password'] . "<br>";
        echo "Password inputan belum enkripsi adalah = " . $_POST['password'] . "<br>";
        echo "Password inputan enkripsi md5 adalah = " . $password . "<br>";

        echo "<script>window.location ='../index.php'</script>";
    } else {
?>
        <script>
            alert("Username atau password yang anda masukkan salah bro...!!");
            window.location = '../sign-in'
        </script>
<?php
    }
}
