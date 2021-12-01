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
    $koneksi = mysqli_connect("localhost", "root", "");
    if ($koneksi) {
        echo "Koneksi berhasil";
    } else {
        echo "Koneksi gagal";
    }
    ?>
</body>

</html>