<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TO DO LIST</title>

    <!--Bosstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>
<body>
    
    <section class="row">
        <div class="col-md-6 offset-md-3 align-self-center" >
            <h1 class="text-center">Tabel Tugas</h1>
            <a href="tambah.php" class="btn btn-primary mb-2">Tambah</a>
            <table class="table table-striped table-border">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Prioritas</th>
                        <th scope="col">tanggal</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <?php
                    $no =1;
                    $query = "SELECT * FROM tabel_tugas";
                    $result = mysqli_query($koneksi,  $query);
                ?>
                <tbody>
                    <?php
                        foreach ($result as $data) {
                            echo "
                            <tr>
                                <th scope='row'> ". $no++ ."</th>
                                <td>". $data["nama"] . "</td>
                                <td>". $data["prioritas"] . "</td>
                                <td>". $data["tanggal"] . "</td>
                                <td>". $data["status"] . "</td>
                                <td>
                                <a href='update.php?id=".$data["id"]."' type='button' class='btn btn-success'>Update</a>
                                <a href='delete.php?id=".$data["id"]."' class='btn btn-danger' onclick='return confirm(\"Yakin Hapus?\")'>Hapus</a>
                                </td>
                            </tr>
                            ";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </section>

</body>
</html>