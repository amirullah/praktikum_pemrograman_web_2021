<html>

<head>
    <title> Form method GET </title>
</head>

<body>
    <h1>Input</h1>
    <form action="tes.php" method="POST">
        Masukkan nama : <input type="text" name="nama" size="30">
        <input type="submit" value="Simpan">
    </form>

    <?php
    if (!empty($_POST["nama"])) {
        echo $_POST["nama"];
    }
    ?>
</body>

</html>