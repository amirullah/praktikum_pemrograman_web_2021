<?php
require "proses/session.php";
require "proses/koneksi.php";
$sql    = mysqli_query($conn, "SELECT * FROM tb_barang");
$select = mysqli_query($conn, "SELECT * FROM tb_peminjaman pem
LEFT JOIN tb_barang brg ON pem.barang=brg.kode_barang
LEFT JOIN tb_mahasiswa mhs ON pem.user=mhs.id_user
");
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
            <div class="col-3">
                <?php
                require "componen/sidebar.php";
                ?>
            </div>
            <div class="col">
                <h1>Peminjaman Barang</h1>
                <div class="card">
                    <h5 class="card-header">Peminjaman Barang</h5>
                    <div class="card-body">
                        <button class="btn btn-success">Tambah Peminjaman</button>

                        <!-- Tombol List Peminjaman -->
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#listpeminjaman">List Peminjaman</button>
                        <!-- Akhir Tombol List Peminjaman -->

                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kode Barang</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                while ($data   = mysqli_fetch_array($sql)) {
                                    $no++;
                                ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $data['kode_barang']; ?></td>
                                        <td><?php echo $data['nama_barang']; ?></td>
                                        <td><?php echo $data['keterangan']; ?></td>
                                        <td><?php echo $data['stok']; ?></td>
                                        <td>
                                            <button data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $no ?>" type="button" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg></button>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ModalHapus<?php echo $no ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                </svg></button>
                                        </td>
                                    </tr>
                                    <!-- Modal Edit Data Barang -->
                                    <div class="modal fade" id="exampleModal<?php echo $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data Barang</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form method="POST" action="proses/proses_ubah_data_barang.php">
                                                    <input type="hidden" name="kd_brg" value="<?php echo $data['kode_barang'] ?>">
                                                    <div class="modal-body">
                                                        <div class=" mb-3">
                                                            <label class="col-form-label">Kode Barang:</label>
                                                            <input type="number" class="form-control" value="<?php echo $data['kode_barang'] ?>" disabled>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Nama Barang:</label>
                                                            <input name="nm_brg" type="text" class="form-control" value="<?php echo $data['nama_barang'] ?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Keterangan:</label>
                                                            <input name="ket" type="text" class="form-control" value="<?php echo $data['keterangan'] ?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Stok Barang:</label>
                                                            <input name="stok" type="text" class="form-control" value="<?php echo $data['stok'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Akhir Modal Edit Data Barang -->

                                    <!-- Modal Hapus Data Barang -->
                                    <div class="modal fade" id="ModalHapus<?php echo $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Barang</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form method="POST" action="proses/proses_hapus_data_barang.php">
                                                    <input type="hidden" name="kd_brg" value="<?php echo $data['kode_barang'] ?>">
                                                    <div class="modal-body">
                                                        Apakah anda yakin akan menghapus data "<?php echo $data['nama_barang']; ?>"?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Akhir Modal Hapus Data Barang -->
                                <?php
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal List Peminjaman -->
        <div class="modal fade" id="listpeminjaman" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">List Peminjaman Barang</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kode Barang</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Peminjam</th>
                                    <th scope="col">Waktu Peminjaman</th>
                                    <th scope="col">Waktu Pengembalian</th>
                                    <th scope="col">Matakuliah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                while ($data   = mysqli_fetch_array($select)) {
                                    $no++;
                                ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $data['barang']; ?></td>
                                        <td><?php echo $data['nama_barang']; ?></td>
                                        <td><?php echo $data['keterangan']; ?></td>
                                        <td><?php echo $data['stok']; ?></td>
                                        <td>
                                            <?php
                                            if ($data['status'] == 1) {
                                                $status = "Pending";
                                            } elseif ($data['status'] == 2) {
                                                $status = "Disetujui";
                                            } elseif ($data['status'] == 3) {
                                                $status = "Ditolak";
                                            }
                                            echo $status;
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $data['nim'] . "<br>"; ?>
                                            <?php echo $data['nama'] . "<br>"; ?>
                                            <?php echo $data['kelas'] . "<br>"; ?>
                                            <?php echo $data['prodi'] . "<br>"; ?>
                                        </td>
                                        <td><?php echo $data['waktu_peminjaman'] . "<br>"; ?></td>
                                        <td><?php echo $data['waktu_pengembalian'] . "<br>"; ?></td>
                                        <td><?php echo $data['matakuliah'] . "<br>"; ?></td>
                                    </tr>
                                <?php
                                } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Akhir Modal List Peminjaman -->

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