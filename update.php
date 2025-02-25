<?php 
include "koneksi.php";

$id = $_GET['id'];

$query = "SELECT * FROM tabel_tugas WHERE id = $id";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update TO DO LIST</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    <section class="row">
        <div class="col-md-6 offset-md-3 align-self-center">
            <h1 class="text-center mt-4">Form Update TO DO LIST</h1>

            <form method="POST" action="">
                <input type="hidden" name="id" value="<?=$data['id']?>">

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?=$data['nama']?>" placeholder="Nama" required>
                </div>

                <div class="mb-3">
                    <label for="prioritas" class="form-label">Prioritas</label>
                    <select name="prioritas" class="form-control" id="prioritas" required>
                        <option value="">Pilih Prioritas</option>
                        <option value="rendah" <?= $data['prioritas'] == 'rendah' ? 'selected' : '' ?>>Rendah</option>
                        <option value="sedang" <?= $data['prioritas'] == 'sedang' ? 'selected' : '' ?>>Sedang</option>
                        <option value="tinggi" <?= $data['prioritas'] == 'tinggi' ? 'selected' : '' ?>>Tinggi</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tanggal" class="form-label">tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?=$data['tanggal']?>" required>

                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" class="form-control" id="status" required>
                        <option value="">Pilih Status</option>
                        <option value="selesai" <?= $data['status'] == 'selesai' ? 'selected' : '' ?>>Selesai</option>
                        <option value="belum-selesai" <?= $data['status'] == 'belum-selesai' ? 'selected' : '' ?>>Belum-Selesai</option>
                    </select>
                </div>

                <button type="submit" name="update" class="btn btn-primary">Update</button>
                <a href="index.php" class="btn btn-info text-white">Kembali</a>
            </form>
        </div>
    </section>

    <?php 
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $prioritas = $_POST['prioritas'];
        $tanggal = $_POST['tanggal'];
        $status = $_POST['status'];
    
        // Tambahkan tanggal ke dalam query UPDATE
        $query = "UPDATE tabel_tugas SET nama = '$nama', prioritas = '$prioritas', tanggal = '$tanggal', status = '$status' WHERE id = '$id'";
        $result = mysqli_query($koneksi, $query);
    
        if ($result) {
            header("location: index.php");
            exit();
        } else {
            echo "<script>alert('Data Gagal di Update!')</script>";
        }
    }    
    ?>
</body>
</html>
