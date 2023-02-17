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
    <a class="navbar-brand" href="#"></a>
    <img class="mb-4" src="hebat-removebg-preview(1).png" alt="" width="80" height="">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link btn btn-outline-danger me-2" href="administrator.php">HOME</a>
        </li>
      </ul>
      <!-- <form class="d-flex" role="search">
        <input class="form-control me-2" name="cari" type="search" placeholder="Search" value="
        <?php if (isset($_GET['cari'])) {
        echo $_GET['cari'];
        } ?>
        " arialabel="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
    </div>
  </div>
</nav>

    <div class="container mt-3" style="border-radius-20px">
    <!-- <a href="logout.php" class="btn btn-danger btn-medium mb-3 "></i>Logout</a> -->
    <table class="table table-striped table-hover table-bordered">
        <thead class="table-dark table-border-1">
            <th>ID</th>
            <th>FASILITAS HOTEL</th>
            <th>FASILITAS UMUM</th>
            <th>FASILITAS TERDEKAT</th>
            <th>ACTION</th>
        </thead>

        <?php
          include("koneksi.php");
          // tombol percarian
          if (isset($_GET['cari'])) {
              global $koneksi;
              // $pencarian = mysqli_real_escape_string($koneksi, $_GET['cari']);
              // $query = "SELECT * FROM fasilitas_hotel WHERE id_fasilitas_hotel like '%" . $pencarian . "%' or fasilitas_hotel like '%" . $pencarian . "%' or fasilitas_umum like '%"
              //  . $pencarian . "%' or fasilitas_terdekat like '%" . $pencarian ."%'";
          } else {
            $query = "SELECT * FROM fasilitas_hotel";
          }
          
          $ambildata = mysqli_query($koneksi, $query);

          while($tampil = mysqli_fetch_array($ambildata)) {
            echo "
            <tbody>
                <tr>
                  <td>$tampil[id_fasilitas_hotel]</td>
                  <td>$tampil[fasilitas_hotel]</td>
                  <td>$tampil[fasilitas_umum]</td>
                  <td>$tampil[fasilitas_terdekat]</td>
                  <td>
                  <div class='row'>
                      <div class='col d-flex justify-content-center'>
                      <a href= 'updatehotel.php?id_fasilitas_hotel=$tampil[id_fasilitas_hotel]' class='btn btn-sm btn-warning'><i class='fa fa-edit'>Update</i></a>
                      </div>
                </td>
                </tr>
            </tbody>
            ";
          }
        ?>
        </table>
    </div>
</body>
<!-- <div class='col d-flex justify-content-center'>
                      <a onclick return cofirm ('Kamu Yakin Menghapus Data?') href= 'delete.php?id_tipe_kamar=$tampil[id_tipe_kamar]' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i></a>
                      </div> -->
</html>