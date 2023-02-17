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
      .h1{
        margin: ;
        display: flex;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
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
      
<!-- tombol logout -->
      <!-- <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link btn btn-outline-danger me-2" href=".php">Logout</a>
        </li>
      </ul> -->

<!-- untuk menambahkan tombol pencarian -->
      <!-- <form class="d-flex" role="search">
        <input class="form-control me-2" name="cari" type="search" placeholder="Search" value="<?php if (isset($_GET['cari'])) {
        echo $_GET['cari'];
        } ?>" arialabel="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
    </div>
  </div>
</nav>
<div class="text-# mt-4 d-flex justify-content-center">
<h2>SELAMAT DATANG ADMIN APA YANG INGIN ANDA LAKUKAN</h2>
</div>
<div class="container" style="padding-top:600pcx;" style="padding-left:50pcx;">
        <div class="row">
        <div class="col-xl-4 col-md-6 col-sm-12">
                <div class="card mt-4">
                    <img src="#" alt="">
                    <div class="card-body">
                        <h5 class="card-title">
                            conten 1
                        </h5>
                        <p class="card-text">
                            isi konten 1
                        </p>
                        <a href="tambahkamar.php" class="w-100 btn btn-primary">Tambah Kamar</a>
                    </div>
                </div>
            </div>            
            <div class="col-xl-4 col-md-6 col-sm-12">
                <div class="card mt-4">
                  <img src="#" alt="">
                    <div class="card-body">
                        <h5 class="card-title">
                            conten 1
                        </h5>
                        <p class="card-text">
                            isi konten 1
                        </p>
                        <a href="kamar.php" class="w-100 btn btn-info">Lihat Kamar</a>
                    </div>
                </div>
            </div>            
            <div class="col-xl-4 col-md-6 col-sm-12">
                <div class="card mt-4">
                    <img src="#" alt="">
                    <div class="card-body">
                        <h5 class="card-title">
                            conten 1
                        </h5>
                        <p class="card-text">
                            isi konten 1
                        </p>
                        <a href="fasilitashotel.php" class="w-100 btn btn-warning">Fasilitas Hotel</a>
                    </div>
                </div>
            </div>
</body>
</html>