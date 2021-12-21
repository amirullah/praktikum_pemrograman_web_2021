<?php
require "proses/session.php";
// Query untuk tabel hasil tambah peminjaman 
$select = mysqli_query($conn, "SELECT * FROM tb_peminjaman pem
LEFT JOIN tb_barang brg ON pem.barang=brg.kode_barang
LEFT JOIN tb_matakuliah mk ON pem.matakuliah=mk.kode_matakuliah
LEFT JOIN tb_dosen dos ON mk.dosen=dos.nip
LEFT JOIN tb_user usr ON pem.user=usr.id
WHERE status=3 || status=4");
// Akhir query untuk tabel hasil tambah peminjaman 
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
                    <h5 class="card-header">
                        Data Peminjaman Barang
                    </h5>
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kode Barang</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Waktu Peminjaman</th>
                                    <th scope="col">Waktu Pengembalian</th>
                                    <th scope="col">Matakuliah</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                while ($hasil = mysqli_fetch_array($select)) {
                                    $no++;
                                ?>
                                    <tr>
                                        <td scope="row"><?php echo $no ?></td>
                                        <td><?php echo $hasil['kode_barang']; ?></td>
                                        <td></td>
                                        <td><?php echo $hasil['nama_barang']; ?></td>
                                        <td><?php echo $hasil['keterangan']; ?></td>
                                        <td><?php echo date("d-m-Y H:i:s", strtotime($hasil['waktu_peminjaman'])); ?></td>
                                        <td><?php echo date("d-m-Y H:i:s", strtotime($hasil['waktu_pengembalian'])); ?></td>
                                        <td><?php echo $hasil['nm_matakuliah'] . " - " . $hasil['nm_dosen']; ?></td>
                                        <td>
                                            <?php
                                            if ($hasil['status'] == 1) echo "<span class='badge bg-secondary'>Pending</span>";
                                            elseif ($hasil['status'] == 2) echo "<span class='badge bg-success'>Disetujui</span>";
                                            elseif ($hasil['status'] == 3) echo "<span class='badge bg-danger'>Ditolak</span>";
                                            elseif ($hasil['status'] == 4) echo "<span class='badge bg-primary'>Telah Dikembalikan</span>";
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($hasil['status'] != 1) $s = "disabled";
                                            else $s = "";
                                            ?>
                                            <button <?php echo $s ?> data-bs-toggle="modal" data-bs-target="#setujui<?php echo $no ?>" type="button" class="btn btn-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square" viewBox="0 0 16 16">
                                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                                    <path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z" />
                                                </svg>
                                            </button>
                                            <button <?php echo $s ?> data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $no ?>" type="button" class="btn btn-warning">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg>
                                            </button>
                                            <button <?php echo $s ?> data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $no ?>" type="button" class="btn btn-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-x" viewBox="0 0 16 16">
                                                    <path d="M6.854 7.146a.5.5 0 1 0-.708.708L7.293 9l-1.147 1.146a.5.5 0 0 0 .708.708L8 9.707l1.146 1.147a.5.5 0 0 0 .708-.708L8.707 9l1.147-1.146a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146z" />
                                                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                    <!-- Modal Setujui-->
                                    <div class="modal fade" id="setujui<?php echo $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Persetujuan Pinjaman Barang</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form method="POST" action="proses/proses_setujui_peminjaman.php">
                                                    <div class="modal-body">
                                                        <input name="id_peminjaman" type="hidden" value="<?php echo $hasil['id_peminjaman'] ?>">
                                                        <div class="mb-3">
                                                            <label class="form-label">Nama Barang</label>
                                                            <input type="text" class="form-control" value="<?php echo $hasil['kode_barang'] . " - " . $hasil['nama_barang'] . " " . $hasil['keterangan'] ?>" disabled>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Matakuliah</label>
                                                            <input type="text" class="form-control" value="<?php echo $hasil['nm_matakuliah'] . " - " . $hasil['nm_dosen'] ?>" disabled>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Waktu Peminjaman s/d Waktu Pengembalian</label>
                                                            <input type="text" class="form-control" value="<?php echo date("d-m-Y H:i:s", strtotime($hasil['waktu_peminjaman'])) . " s/d " . date("d-m-Y H:i:s", strtotime($hasil['waktu_pengembalian'])) ?>" disabled>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Aksi</label>
                                                            <select name="aksi" class="form-select">
                                                                <option value="2">Disetujui</option>
                                                                <option value="3">Ditolak</option>
                                                            </select>
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
                                    <!-- Akhir Modal Setujui-->
                                    <!-- Modal Edit-->
                                    <div class="modal fade" id="exampleModal<?php echo $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form method="POST" action="proses/proses_tambah_peminjaman.php">
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label class="form-label">Nama Barang</label>
                                                            <select name="brg" class="form-select" aria-label="Default select example">
                                                                <?php
                                                                $query = mysqli_query($conn, "SELECT * FROM tb_barang");
                                                                while ($hasil1 = mysqli_fetch_array($query)) {
                                                                    echo "<option value='$hasil1[kode_barang]'>" . $hasil1['kode_barang'] . " " . $hasil1['nama_barang'] . "</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Matakuliah</label>
                                                            <select name="mk" class="form-select" aria-label="Default select example">
                                                                <?php
                                                                $query = mysqli_query($conn, "SELECT * FROM tb_matakuliah mk
                                        LEFT JOIN tb_dosen dos ON mk.dosen=dos.nip");
                                                                while ($hasil1 = mysqli_fetch_array($query)) {
                                                                    echo "<option value='$hasil1[kode_matakuliah]'>" . $hasil1['kode_matakuliah'] . " " . $hasil1['nm_matakuliah'] . " - " . $hasil1['nm_dosen'] . "</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Waktu Pengembalian</label>
                                                            <input name="wkt_kembali" type="datetime-local" class="form-control" value="<?php echo date("d/m/Y H.i", strtotime($hasil['waktu_pengembalian'])) ?>">
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
                                    <!-- Akhir Modal Edit-->

                                    <!-- Modal Delete-->
                                    <div class="modal fade" id="ModalDelete<?php echo $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah anda yakin ingin menghapus data "<?php echo $hasil['nama_barang'] ?>"
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="button" class="btn btn-danger">Hapus</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Akhir Modal Delete-->

                                <?php } ?>
                            </tbody>
                        </table>
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