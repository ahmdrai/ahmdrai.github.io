<?php
    $nama = $_POST['nama_sekolah'];
    $npsn = $_POST['npsn'];
    $alamat = $_POST['alamat_sekolah'];
    $jumlah = $_POST['jumlah_siswa'];

    include '../database/crud1.php';
    mysqli_query($konek, "INSERT INTO osn_sekolah(nama_sekolah, npsn, alamat_sekolah, jumlah_siswa)
        VALUES ('$nama', '$jumlah', '$alamat', '$jumlah')
    ");

    header("Location: ../idx.php");
    exit();
?>