<?php
  session_start();
  include 'koneksi.php';
  if($_SESSION['user_type'] !='administrator'){
    header('location:index.php');
  }

  $id_tipe_kamar = $_GET['id_tipe_kamar'];
  $sqlGet = "SELECT * FROM kamar WHERE id_tipe_kamar='$id_tipe_kamar'";
  $queryGet = mysqli_query($koneksi, $sqlGet);
  $data = mysqli_fetch_array($queryGet);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAMBAH KAMAR</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto d-flex">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="administrator.php">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="w-50  mx-auto border p-3 mt-5">
    <!-- <a class="btn btn-primary" href="index.php">Back to Home</a> -->
    <form action="" method="post">

    <label for="id_tipe_kamar">ID</label>
    <input type="text" id="id_tipe_kamar" value="<?= $id_tipe_kamar?>" name="id_tipe_kamar"  class="form-control" readonly>

    <label for="fasilitas">FASILITAS</label>  
    <input type="text" id="fasilitas"name="fasilitas" class="form-control" required>
    
    <label for="harga">HARGA</label>
    <input type="text" id="harga" name="harga" class="form-control" required>

    <input class="btn btn-success mt-3" type="submit" name="tambah" value="Tambah Data">
    </form>
    </div>
   
   <?php
    if(isset($_POST['tambah'])){
    $id_tipe_kamar = $_POST['id_tipe_kamar'];
    $fasilitas = $_POST['fasilitas'];
    $harga = $_POST['harga'];


    // $sqlGet = "SELECT * FROM tipe_kamar";
    // $queryGet = mysqli_query($koneksi, $sqlGet);
    // $cek = mysqli_num_rows($queryGet);

    $sqlInsert = "INSERT INTO tipe_kamar (id_tipe_kamar,fasilitas,harga)
                                 VALUES ('$id_tipe_kamar','$fasilitas','$harga')";
    
    $eksek  = mysqli_query($koneksi, $sqlInsert);
   if($eksek){
    echo"<script>alert('data anda berhasil di simpan')</script>";
    }
//mengecek program
    // var_dump($sqlInsert);
    // die();

    $queryInsert = mysqli_query($koneksi, $sqlInsert);


    header('location:kamar.php');
    }
   ?> 
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</html>