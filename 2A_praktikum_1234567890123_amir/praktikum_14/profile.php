<?php
include "proses/session.php";
$sql = mysqli_query($conn, "SELECT * FROM tb_user u 
        LEFT JOIN tb_mahasiswa mhs ON u.id = mhs.id_user
        WHERE username='$_SESSION[username]'");
$data = mysqli_fetch_array($sql);
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>SIPBAR - Sistem Informasi Peminjaman Barang Jurusan TIK</title>
</head>

<body>
    <div class="container-fluid">
        <!-- Header -->
        <?php
        require "header.php";
        ?>
        <!-- Akhir header -->
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <!-- Sidebar -->
                <?php
                require "sidebar.php";
                ?>
                <!-- Akhir sidebar -->
            </div>
            <!-- Isi Konten -->
            <div class="col-9">
                <div class="card ms-1 mt-4">
                    <h5 class="card-header">Profile</h5>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" aria-describedby="emailHelp" value="<?php echo $data['username']; ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Level</label>
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
                                <label class="form-label">Kelas</label>
                                <input type="text" class="form-control" value="<?php echo $data['kelas']; ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="text" class="form-control" value="<?php echo $data['tgl_lahir']; ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" value="<?php echo $data['tempat_lahir']; ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <input type="text" class="form-control" value="<?php echo $data['alamat']; ?>" disabled>
                            </div>

                            <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                        </form>
                    </div>
                </div>
            </div>
            <!-- Akhir Isi Konten -->
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>