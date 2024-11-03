<?php
include '../database/crud1.php';

if (isset($_GET['id_sekolah'])){
    $id = $_GET['id_sekolah'];
    mysqli_query($konek, "DELETE FROM osn_sekolah WHERE id_sekolah = $id");

    header("Location: ../idx.php");
    exit();
}

?>