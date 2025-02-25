<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FORM TAMBAH TO DO LIST</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    <section class="row">
        <div class="col-md-6 offset-md-3 align-self-center">
            <h1 class="text-center mt-4">Form Tambah TO DO LIST</h1>
            <form method="POST">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
                </div>
                <div class="mb-3">
                    <label for="prioritas" class="form-label">Prioritas</label>
                    <select name="prioritas" class="form-control" required>
                        <option value="">Pilih Prioritas</option>
                        <option value="rendah">Rendah</option>
                        <option value="sedang">Sedang</option>
                        <option value="tinggi">Tinggi</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" class="form-control" required>
                        <option value="">Pilih Status</option>
                        <option value="selesai">Selesai</option>
                        <option value="belum-selesai">Belum Selesai</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                </div>
                <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                <a href="index.php" class="btn btn-info text-white">Kembali</a>
            </form>
        </div>
    </section>

    <?php
    if (isset($_POST['tambah'])) {
        $nama = $_POST['nama'];
        $prioritas = $_POST['prioritas'];
        $status = $_POST['status'];
        $tanggal = $_POST['tanggal'];

        $sql = "INSERT INTO tabel_tugas (nama, prioritas, status, tanggal) VALUES (?, ?, ?, ?)";
        $stmt = $koneksi->prepare($sql);

        if ($stmt === false) {
            die("Error in SQL query preparation: " . $koneksi->error);
        }

        $stmt->bind_param("ssss", $nama, $prioritas, $status, $tanggal);
        $result = $stmt->execute();
        if ($result) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error executing query: " . $stmt->error;
        }

        $stmt->close();
        $koneksi->close();
    }
    ?>
</body>
</html>
