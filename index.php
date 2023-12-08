<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<title>Data</title>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <span class="navbar-brand mb-0 h1">Form Data Mahasiswa</span>
        </div>
    </nav>
    <div class="container">
        <br>
        <h4>
            <center>DATA MAHASISWA</center>
        </h4>
        <?php

        include "koneksi.php";

        //Cek apakah ada kiriman form dari method post
        if (isset($_GET['id_mhs'])) {
            $id_mhs = htmlspecialchars($_GET["id_mhs"]);

            $sql = "delete from mhs where id_mhs='$id_mhs' ";
            $hasil = mysqli_query($kon, $sql);

            //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:index.php");
            } else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";
            }
        }
        ?>


        <tr class="table-danger">
            <br>
            <thead>
                <tr>
                    <table class="my-3 table table-bordered">
                        <tr class="table-primary">
                            <th>NPM</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Alamat</th>
                            <th colspan='2'>Aksi</th>

                        </tr>
            </thead>

            <?php
            include "koneksi.php";
            $sql = "select * from mhs order by id_mhs desc";

            $hasil = mysqli_query($kon, $sql);
            //$no = 0;
            while ($data = mysqli_fetch_array($hasil)) {
                // $no++;

            ?>
                <tbody>
                    <tr>
                        <td><?php echo $data["npm"]; ?></td>
                        <td><?php echo $data["nama"]; ?></td>
                        <td><?php echo $data["kelas"];   ?></td>
                        <td><?php echo $data["jurusan"];   ?></td>
                        <td><?php echo $data["alamat"];   ?></td>
                        <td>
                            <a href="update.php?id_mhs=<?php echo htmlspecialchars($data['id_mhs']); ?>" class="btn btn-warning" role="button">Update</a>
                            <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id_mhs=<?php echo $data['id_mhs']; ?>" class="btn btn-danger" role="button">Delete</a>
                        </td>
                    </tr>
                </tbody>
            <?php
            }
            ?>
            </table>
            <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>
    </div>
</body>

</html>