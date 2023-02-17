<?php
include "koneksi.php";
session_start();
if($_SESSION['user_type'] !='resepsionis'){
  header('location:index.php');
}
// if(isset($_POST['psn'])){
//   header("location:pemesanan.php");
// }
if(isset($_POST['kirim'])){
    $id_pemesanan = $_POST['id_pemesanan'];
    $status       = $_POST['status'];

    $update       = "UPDATE pemesanan SET status_pemesanan = 'SELESAI' WHERE id_pemesanan= '$id_pemesanan'";
    // var_dump($update);

    $query        = mysqli_query($koneksi, $update);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESEPSIONIS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="fasilitashotel.php">
    <img class="mb-4" src="hebat-removebg-preview(1).png" alt="" width="80" height=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse ms-auto" id="navbarSupportedContent">
<!-- untuk button search -->
    <div class="ms-auto">
      <form method="post" action="" class="d-flex">
        <input class="form-control me-2" name="cari" type="search" placeholder="Search" arialabel="Search">
        <button class="btn btn-outline-success" name="search" type="submit">Search</button>
        <!-- <a href="resepsionis.php" class="btn btn-outline-success">Reload</a> -->
    </form>
    </div>
    </div>
  </div>
</nav>
<div class="container">
<table class="table table-striped table table-bordered">
        <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>ID Kamar</th>
            <th>No Kamar</th>
            <th>Username</th>
            <th>Tanggal Checkin</th>
            <th>Tanggal Checkout</th>
            <th>Harga</th>
            <th>Status</th>
            <th>Action</th>
        </thead>
        </tr>
      <?php

// search
if (isset($_POST['search'])) {
    global $koneksi;
    $pencarian = $_POST['cari'];
    $query = "SELECT * FROM pemesanan JOIN user
                                        on pemesanan.user_id = user.user_id
                                        WHERE username like '%$pencarian%' or checkin like '%$pencarian%'";
            // var_dump($query);
        } else {
            $query = "SELECT * FROM pemesanan JOIN user on pemesanan.user_id = user.user_id ";
        }
        
        $no =1;
        $ambil_data   = mysqli_query($koneksi, $query);
        while($tampil = mysqli_fetch_assoc($ambil_data)){
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $tampil['id_pemesanan']?></td>
                <td><?= $tampil['no_kamar']?></td>
                <td><?= $tampil['username']?></td>
                <td><?= $tampil['checkin']?></td>
                <td><?= $tampil['checkout']?></td>
                <td>Rp. <?= number_format($tampil['harga'],2)?></td>
                <td><?= $tampil['status_pemesanan']?></td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="id_pemesanan" value="<?= $tampil['id_pemesanan']?>">
                        <input type="hidden" name="status" value="<?= $tampil['status_pemesanan']?>">
                    <button type="submit" class="btn btn-warning" name="kirim">Konfirmasi</button>
                    </form>
                </td>
            </tr>
            <?php
        }
        ?>
        </div>
</body>
</html>