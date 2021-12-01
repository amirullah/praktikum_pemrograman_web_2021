<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "db_saya")
        or die("koneksi gagal");
    $hasil = mysqli_query($conn, "select * from liga");
    // $row = mysqli_fetch_array($hasil);
    // echo $row["negara"];

    while ($row = mysqli_fetch_assoc($hasil)) {
        echo "Liga " . $row["negara"] . "<br>"; //array asosiatif
        // echo " mempunyai " . $row[1] . '<br>';  //array numeris
        // echo " wakil di liga champion <br>";
    }
    ?>

</body>

</html>