<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="proses.php" method="POST">
        <label for="">Nama Depan:</label>
        <input type="number" name="nama_depan"> <br>
        <label for="">Nama Belakang:</label>
        <input type="number" name="nama_belakang"><br>
        <input type="submit" value="KIRIM">
    </form>
    <?php
    if (!empty($_GET['nama_depan'])) {
        echo $_GET['nama_depan'] . "<br>";
    }
    if (!empty($_GET['nama_belakang'])) {
        echo $_GET['nama_belakang'];
    }
    ?>
</body>

</html>