<?php 
include 'koneksi.php';


    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $tugas = $_POST['tugas'];
    $status = $_POST['status'];

    $query = "UPDATE tabel_tugas SET nama = '$nama', tugas= '$tugas, status= '$status' WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header("location: index.php");
        exit();
    } else {
        echo "<script>alert('Data Gagal di Update!')</script>";
    } 
?>
