<?php
include '../database/crud1.php';

if (isset($_POST['update'])) {
    $id = $_POST['id_sekolah'];
    $nama = $_POST['nama_sekolah'];
    $npsn = $_POST['npsn'];
    $alamat = $_POST['alamat_sekolah'];
    $jumlah = $_POST['jumlah_siswa'];

    mysqli_query($konek, "UPDATE osn_sekolah SET nama_sekolah = '$nama', npsn = '$npsn', alamat_sekolah = '$alamat', jumlah_siswa = '$jumlah' WHERE id_sekolah = '$id'");

    header("Location: ../idx.php");
    exit();
}
?>