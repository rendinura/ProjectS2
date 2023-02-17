<?php
    session_start();
    include 'koneksi.php';
    if($_SESSION['user_type'] !='administrator'){
      header('location:index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="#" alt="#">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>
    <title>LAMAN ADMIN</title>
    <style>
      body{
        background-image: url(jpg);
      }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="fasilitashotel.php">
    <img class="mb-4" src="hebat-removebg-preview(1).png" alt="" width="80" height=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
<!-- button home -->
        <!-- <li class="nav-item">
          <a class="nav-link btn btn-outline-danger me-2" href="logout.php">Logout</a>
        </li> -->
      </ul>
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link btn btn-outline-warning me-2" href="administrator.php">Home</a>
        </li>
      </ul>
<!-- untuk button search -->
      <!-- <form class="d-flex" role="search">
        <input class="form-control me-2" name="cari" type="search" placeholder="Search" value="<?php if (isset($_GET['cari'])) {
        echo $_GET['cari'];
        } ?>" arialabel="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
    </div>
  </div>
</nav>
<div class="container">
<table class="table table-striped table-hover table-bordered">
        <thead class="table-dark">
        <tr>
            <th>No Kamar</th>
            <th>id Tipe Kamar</th>
            <th>fasilitas</th>
            <th>harga</th>
            <th>aksi</th>
        </thead>
        </tr>
        <?php
        include 'koneksi.php';
// search
        // if (isset($_GET['cari'])) {
        //     global $koneksi;
        //     $pencarian = mysqli_real_escape_string($koneksi, $_GET['cari']);
        //     $query = "SELECT * FROM tipe_kamar
        //                      WHERE id_tipe_kamar like '%" . $pencarian . "%' 
        //                         or fasilitas like '%" . $pencarian . "%' 
        //                         or harga like '%" . $pencarian ."%'";
        // } else {
        //   $query = "SELECT * FROM tipe_kamar JOIN kamar on kamar.id_tipe_kamar = tipe_kamar.id_tipe_kamar ";
        // }
//join
        $query ="SELECT * FROM kamar JOIN tipe_kamar on kamar.id_tipe_kamar = tipe_kamar.id_tipe_kamar";
        $ambil_data =mysqli_query($koneksi, $query);

        $no =1;
        while($tampil = mysqli_fetch_assoc($ambil_data)){
            ?>
            <tr>
                <!-- <td><?= $no++ ?></td> -->
                <td><?= $tampil['no_kamar']?></td>
                <td><?= $tampil['id_tipe_kamar']?></td>
                <td><?= $tampil['fasilitas']?></td>
                <td>Rp. <?= number_format($tampil['harga'],2)?></td>
                <td>
                <div class='row'>
                      <div class='col d-flex justify-content-center'>
                           <a href= "updateadmin.php?id_tipe_kamar=<?= $tampil['id_tipe_kamar']?>" class='btn btn-sm btn-warning'><i class='fa fa-edit'>Update</i></a>
                      </div>
                      <div class='col d-flex justify-content-center'>
                           <a href="updatekamar.php?no_kamar=<?= $tampil['no_kamar']?>" class='btn btn-sm btn-warning'><i class='fa fa-edit'>Edit</i></a>
                      </div>
                </td>
            </tr>
            <?php
        }
        ?>
        </div>  
</body>
</html>