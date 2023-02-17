<?php
  session_start();
  include 'koneksi.php';
  if($_SESSION['user_type'] !='administrator'){
    header('location:index.php');
  }

$id_tipe_kamar = $_GET['id_tipe_kamar'];
$sqlGet = "SELECT * FROM tipe_kamar
            WHERE id_tipe_kamar='$id_tipe_kamar'";
$queryGet = mysqli_query($koneksi, $sqlGet);
$data = mysqli_fetch_array($queryGet);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE HOTEL</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="w-50  mx-auto border p-3 mt-5">
    <a class="btn btn-primary" href="kamar.php">Back to Home</a>
    <form action="" method="post">

    <label for="id_tipe_kamar">ID</label>
    <input type="text" id="id_tipe_kamar" name="id_tipe_kamar" value="<?= $_GET['id_tipe_kamar'];?>" class="form-control" readonly>
    
    <label for="fasilitas">FASILITAS</label>
    <input type="text" id="fasilitas" name="fasilitas" value="<?= $data['fasilitas'];?>" class="form-control" required>
 
    <label for="harga">HARGA</label>
    <input type="text" id="harga" name="harga" value="<?= $data['harga'];?>" class="form-control" required>

    <input class="btn btn-success mt-3" type="submit" name="tambah" value="Update Data">
    </form>
    </div>
   
   <?php
    if(isset($_POST['tambah'])){
        // $no_kamar = $_POST['no_kamar'];
        $id_tipe_kamar = $_POST['id_tipe_kamar'];
        $fasilitas = $_POST['fasilitas'];
        $harga = $_POST['harga'];
    
    $sqlUpdate = "UPDATE tipe_kamar SET fasilitas='$fasilitas', harga='$harga'
                  WHERE id_tipe_kamar='$id_tipe_kamar'";

    // $sqlUpdate = "UPDATE kamar SET no_kamar='$no_kamar'
    //               WHERE id_tipe_kamar='$id_tipe_kamar'";

    $queryUpdate = mysqli_query($koneksi, $sqlUpdate);

    header('location:kamar.php');

    }
   ?> 
</body>
</html>