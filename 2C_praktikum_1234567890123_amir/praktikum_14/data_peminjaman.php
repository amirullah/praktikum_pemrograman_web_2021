<?php
require "proses/koneksi.php";
$select = mysqli_query($conn, "SELECT * FROM tb_barang brg
LEFT JOIN tb_peminjaman pem ON brg.kode_barang=pem.barang
LEFT JOIN tb_mahasiswa mhs ON pem.user=mhs.id_user
LEFT JOIN tb_user usr ON pem.user=usr.id
-- WHERE status_akhir=1 || status_akhir=2
");

$select1 = mysqli_query($conn, "SELECT * FROM tb_barang brg
LEFT JOIN tb_peminjaman pem ON brg.kode_barang=pem.barang
LEFT JOIN tb_mahasiswa mhs ON pem.user=mhs.id_user
LEFT JOIN tb_user usr ON pem.user=usr.id");
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>SIPBAR - Sistem Informasi Peminjaman Barang Jurusan TIK</title>
</head>

<body>
    <!-- Header -->
    <?php
    require "header.php";
    ?>
    <!-- Akhir header -->

    <div class="container-fluid">
        <div class="row">
            <!-- sidebar -->
            <div class="col-md-3">
                <?php
                require "sidebar.php";
                ?>
            </div>
            <!-- Akhir sidebar -->
            <!-- Konten -->
            <div class="col-md-9">
                <h2>Data Peminjaman</h2>
                <div class="card">
                    <div class="card-header">
                        Data Peminjaman
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kode Barang</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Kondisi</th>
                                    <th scope="col">Waktu Peminjaman</th>
                                    <th scope="col">Waktu Pengembalian</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                foreach ($select1 as $data) {
                                    $no++;
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $no ?></th>
                                        <td><?php echo $data['kode_barang'] ?></td>
                                        <td><?php echo $data['nama_barang'] ?></td>
                                        <td><?php echo $data['keterangan'] ?></td>
                                        <td><?php echo $data['kondisi'] ?></td>
                                        <td><?php echo date("d-m-Y H:i:s", strtotime($data['waktu_pinjam'])) ?></td>
                                        <td><?php echo date("d-m-Y H:i:s", strtotime($data['waktu_pengembalian'])) ?></td>
                                        <td>
                                            <?php
                                            if ($data['status'] == 1) echo "<span class='badge bg-secondary'>Dipending</span>";
                                            elseif ($data['status'] == 2) echo "<span class='badge bg-success'>Disetujui</span>";
                                            elseif ($data['status'] == 3) echo "<span class='badge bg-danger'>Ditolak</span>";
                                            elseif ($data['status'] == 4) echo "<span class='badge bg-primary'>Dikembalikan</span>";
                                            elseif ($data['status'] == 5) echo "<span class='badge bg-primary'>Diterima</span>";
                                            else echo " ";
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($data['status'] == 1) { ?>
                                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#setujui<?php echo $no ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-check" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                        <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                                                        <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                                                    </svg>
                                                </button>
                                                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $no ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                    </svg>
                                                </button>
                                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ModalHapus<?php echo $no ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                    </svg>
                                                </button>
                                            <?php } elseif ($data['status'] == 4) { ?>
                                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#setujuiterima<?php echo $no ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-check" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                        <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                                                        <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                                                    </svg>
                                                </button>
                                            <?php }
                                            ?>
                                        </td>
                                    </tr>
                                    <!-- Modal Setujui terima kembali-->
                                    <div class="modal fade" id="setujuiterima<?php echo $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Setujui Terima Pengembalian Barang</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="proses/proses_setujui_terima.php" method="POST">
                                                    <input type="hidden" name="kd_brg" value="<?php echo $data['kode_barang'] ?>">
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">Kode Barang:</label>
                                                            <input type="text" class="form-control" id="recipient-name" value="<?php echo $data['kode_barang'] ?>" disabled>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">Nama Barang:</label>
                                                            <input disabled name="nm_brg" type="text" class="form-control" id="recipient-name" value="<?php echo $data['nama_barang'] ?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">Keterangan Barang:</label>
                                                            <input disabled name="ket" type="text" class="form-control" id="recipient-name" value="<?php echo $data['keterangan'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary">Terima</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Akhir Modal Setujui terima kembali-->
                                    <!-- Modal Setujui Peminjaman-->
                                    <div class="modal fade" id="setujui<?php echo $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Setujui Peminjaman</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="proses/proses_setujui_peminjaman.php" method="POST">
                                                    <input type="hidden" name="kd_brg" value="<?php echo $data['kode_barang'] ?>">
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">Kode Barang:</label>
                                                            <input type="text" class="form-control" id="recipient-name" value="<?php echo $data['kode_barang'] ?>" disabled>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">Nama Barang:</label>
                                                            <input disabled name="nm_brg" type="text" class="form-control" id="recipient-name" value="<?php echo $data['nama_barang'] ?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">Keterangan Barang:</label>
                                                            <input disabled name="ket" type="text" class="form-control" id="recipient-name" value="<?php echo $data['keterangan'] ?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">Aksi:</label>
                                                            <select name="aksi" class="form-select">
                                                                <option value="2">Setujui</option>
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
                                    <!-- Akhir Modal Setujui Peminjaman-->
                                    <!-- Modal Ubah Data Barang-->
                                    <div class="modal fade" id="exampleModal<?php echo $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data Barang</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="proses/proses_edit_databarang.php" method="POST">
                                                    <input type="hidden" name="kd_brg" value="<?php echo $data['kode_barang'] ?>">
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">Kode Barang:</label>
                                                            <input type="text" class="form-control" id="recipient-name" value="<?php echo $data['kode_barang'] ?>" disabled>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">Nama Barang:</label>
                                                            <input name="nm_brg" type="text" class="form-control" id="recipient-name" value="<?php echo $data['nama_barang'] ?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">Keterangan Barang:</label>
                                                            <input name="ket" type="text" class="form-control" id="recipient-name" value="<?php echo $data['keterangan'] ?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">Kondisi Barang:</label>
                                                            <input name="kondisi" type="number" class="form-control" id="recipient-name" value="<?php echo $data['kondisi'] ?>">
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
                                    <!-- Akhir Modal Ubah Data Barang-->

                                    <!-- Modal Hapus Data Barang-->
                                    <div class="modal fade" id="ModalHapus<?php echo $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Barang</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah anda yakin ingin menghapus data barang "<?php echo $data['nama_barang'] ?>"?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <a href="proses/proses_hapus_databarang.php?id=<?php echo $data['kode_barang'] ?>" class="btn btn-danger">Hapus</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Akhir Modal Hapus Data Barang-->
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Akhir konten -->
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>