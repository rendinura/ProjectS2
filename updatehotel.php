<?php
  session_start();
  include 'koneksi.php';
  if($_SESSION['user_type'] !='administrator'){
    header('location:index.php');
  }

$id_fasilitas_hotel = $_GET['id_fasilitas_hotel'];
$sqlGet = "SELECT * FROM fasilitas_hotel WHERE id_fasilitas_hotel='$id_fasilitas_hotel'";
$queryGet = mysqli_query($koneksi, $sqlGet);
$data = mysqli_fetch_array($queryGet);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE FASILITAS HOTEL</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="w-50  mx-auto border p-3 mt-5">
    <a class="btn btn-primary" href="administrator.php">Back to Home</a>
    <form action="" method="post">

    <label for="id_fasilitas_hotel">ID</label>
    <input type="text" id="id_fasilitas_hotel" name="id_fasilitas_hotel" value="<?php echo "$data[id_fasilitas_hotel]";?>" class="form-control" readonly>
    
    <label for="fasilitas_hotel">FASILITAS HOTEL</label>
    <input type="text" id="fasilitas_hotel" name="fasilitas_hotel" value="<?php echo "$data[fasilitas_hotel]";?>" class="form-control" required>
 
    <label for="fasilitas_umum">FASILITAS UMUM</label>
    <input type="text" id="fasilitas_umum" name="fasilitas_umum" value="<?php echo "$data[fasilitas_umum]";?>" class="form-control" required>

    <label for="fasilitas_terdekat">FASILITAS TERDEKAT</label>
    <input type="text" id="fasilitas_terdekat" name="fasilitas_terdekat" value="<?php echo "$data[fasilitas_terdekat]";?>" class="form-control" required>

    <input class="btn btn-success mt-3" type="submit" name="tambah" value="Update Data">
    </form>
    </div>
   
   <?php
    if(isset($_POST['tambah'])){
        $id_fasilitas_hotel = $_POST['id_fasilitas_hotel'];
        $fasilitas_hotel = $_POST['fasilitas_hotel'];
        $fasilitas_umum = $_POST['fasilitas_umum'];
        $fasilitas_terdekat = $_POST['fasilitas_terdekat'];
    
    $sqlUpdate = "UPDATE fasilitas_hotel
                  SET fasilitas_hotel='$fasilitas_hotel', fasilitas_umum='$fasilitas_umum', fasilitas_terdekat='$fasilitas_terdekat'
                  WHERE id_fasilitas_hotel='$id_fasilitas_hotel'";
    $queryUpdate = mysqli_query($koneksi, $sqlUpdate);

    header('location:fasilitashotel.php');

    }
   ?> 
</body>
</html>