<?php
require "proses/session.php";
require "proses/koneksi.php";
$query = mysqli_query($conn, "select * from tb_user u
LEFT JOIN tb_mahasiswa mhs ON u.id=mhs.id_user
WHERE username='$_SESSION[username]'");
$data = mysqli_fetch_array($query);
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Sistem Informasi Peminjaman Barang Jurusan TIK</title>
</head>

<body>
    <div class="container-fluid">
        <?php
        require "componen/header.php";
        ?>
    </div>

    <!-- sidebar -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <?php
                require "componen/sidebar.php";
                ?>
            </div>
            <!-- Konten -->
            <div class="col-lg-9">
                <h1>Profile</h1>
                <div class="card">
                    <h5 class="card-header">Featured</h5>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label class="form-label">Email address</label>
                                <input type="email" class="form-control" value="<?php echo $data['username']; ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Level</label>
                                <input type="text" class="form-control" value="<?php echo $data['level']; ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">NIM</label>
                                <input type="text" class="form-control" value="<?php echo $data['nim']; ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" value="<?php echo $data['nama']; ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Prodi</label>
                                <input type="text" class="form-control" value="<?php echo $data['prodi']; ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <input type="text" class="form-control" value="<?php echo $data['alamat']; ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tgl Lahir</label>
                                <input type="text" class="form-control" value="<?php echo $data['tgl_lahir']; ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" value="<?php echo $data['tempat_lahir']; ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">No HP</label>
                                <input type="text" class="form-control" value="<?php echo $data['no_hp']; ?>" disabled>
                            </div>
                            <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                        </form>
                    </div>
                </div>
            </div>
            <!-- Akhir Konten -->
        </div>
        <!-- Footer -->
        <?php
        require "componen/footer.php"
        ?>
        <!-- Akhir footer -->
    </div>
    <!-- akhir sidebar -->
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>