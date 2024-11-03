<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Daftar Sekolah OSN</title>
</head>

<body>
    <div class="container">
        <h1 class="text-center mt-3">Daftar Sekolah OSN</h1>

        <div class="data d-flex justify-content-end mb-4 mt-4">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDataModal">
                Tambah Data
            </button>
        </div>

        <div class="modal fade" id="addDataModal" tabindex="-1" aria-labelledby="addDataLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addDataLabel">Tambah Sekolah</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="crud/crud2.php" method="POST">
                            <div class="mb-3">
                                <label for="nama_sekolah" class="form-label">Nama Sekolah</label>
                                <input type="text" class="form-control" name="nama_sekolah" id="nama_sekolah">
                            </div>
                            <div class="mb-3">
                                <label for="npsn" class="form-label">NPSN</label>
                                <input type="text" class="form-control" name="npsn" id="npsn">
                            </div>
                            <div class="mb-3">
                                <label for="alamat_sekolah" class="form-label">Alamat Sekolah</label>
                                <input type="text" class="form-control" name="alamat_sekolah" id="alamat_sekolah">
                            </div>
                            <div class="mb-3">
                                <label for="jumlah_siswa" class="form-label">Jumlah Siswa</label>
                                <input type="text" class="form-control" name="jumlah_siswa" id="jumlah_siswa">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="data">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nomor</th>
                        <th scope="col">Nama Sekolah</th>
                        <th scope="col">NPSN</th>
                        <th scope="col">Alamat Sekolah</th>
                        <th scope="col">Jumlah Siswa</th>
                        <th scope="col">Alat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'database/crud1.php';
                    $data = mysqli_query($konek, "SELECT * FROM osn_sekolah");
                    $number = 1;
                    while ($school = mysqli_fetch_array($data)) {
                    ?>
                        <tr>
                            <td scope="row"><?php echo $number++ ?></td>
                            <td><?= $school['nama_sekolah'] ?></td>
                            <td><?= $school['npsn'] ?></td>
                            <td><?= $school['alamat_sekolah'] ?></td>
                            <td><?= $school['jumlah_siswa'] ?></td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal<?= $school['id_sekolah'] ?>">
                                    Edit
                                </button>

                                <div class="modal fade" id="editModal<?= $school['id_sekolah'] ?>" tabindex="-1" aria-labelledby="editLabel<?= $school['id_sekolah'] ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editLabel<?= $school['id_sekolah'] ?>">Data Sekolah</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="crud/crud4.php" method="POST">
                                                    <input type="hidden" name="id_sekolah" value="<?= $school['id_sekolah'] ?>">
                                                    <div class="mb-3">
                                                        <label for="nama_sekolah" class="form-label">Nama Sekolah</label>
                                                        <input type="text" class="form-control" name="nama_sekolah" value="<?= $school['nama_sekolah'] ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="npsn" class="form-label">NPSN</label>
                                                        <input type="text" class="form-control" name="npsn" value="<?= $school['npsn'] ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="alamat_sekolah" class="form-label">Alamat Sekolah</label>
                                                        <input type="text" class="form-control" name="alamat_sekolah" value="<?= $school['alamat_sekolah'] ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="jumlah_siswa" class="form-label">Jumlah Siswa</label>
                                                        <input type="text" class="form-control" name="jumlah_siswa" value="<?= $school['jumlah_siswa'] ?>">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary" name="update">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <form action="crud/crud3.php" method="GET" style="display: inline;">
                                    <input type="hidden" name="id_sekolah" value="<?= $school['id_sekolah'] ?>">
                                    <button class="btn btn-danger" type="submit" name="delete">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>