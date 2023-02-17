<?php
  session_start();
  include 'koneksi.php';
  if($_SESSION['user_type'] !='administrator'){
    header('location:index.php');
  }

$no_kamar = $_GET['no_kamar'];
$sqlGet = "SELECT * FROM kamar
            WHERE no_kamar='$no_kamar'";
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
        
    <label for="id_tipe_kamar">ID KAMAR</label>
    <input type="hidden" value="<?= $data['id_tipe_kamar']?>" name="id_tipe_kamar">
    <input type="text" id="id_tipe_kamar" name="id_tipe_kamar" value="<?= $data['id_tipe_kamar'];?>" class="form-control" required>

    <label for="no_kamar">NO KAMAR</label>
    <input type="text" id="no_kamar" name="no_kamar" value="<?= $_GET['no_kamar'];?>" class="form-control" required>
 

    <input class="btn btn-success mt-3" type="submit" name="tambah" value="Update Data">
    </form>
    </div>
   
   <?php
    if(isset($_POST['tambah'])){
        $no_kamar = $_POST['no_kamar'];
        $id_tipe_kamar = $_POST['id_tipe_kamar'];       

    $sqlUpdate = "UPDATE kamar SET no_kamar='$no_kamar'
                  WHERE id_tipe_kamar='$id_tipe_kamar'";

    $queryUpdate = mysqli_query($koneksi, $sqlUpdate);

    header('location:kamar.php');

    }
   ?> 
</body>
</html>
<!-- <?php
// koneksi database
// include 'koneksi.php';

// $query = "SELECT * FROM kamar WHERE no_kamar = '$_GET[no_kamar]'";
// $result = mysqli_query($koneksi, $query);
// $data = mysqli_fetch_assoc($result); 

// if(isset($_POST['masuk'])){
//     $noKamar = $_POST['no_kamar'];
//     $idTipe = $_POST['id_tipe_kamar'];
//     $queryUpdate = "UPDATE `kamar` SET `no_kamar`='$noKamar',`id_tipe_kamar`='$idTipe'";
//     $execquery = mysqli_query($koneksi, $queryUpdate);
//     if($execquery){
//         header('location:kamar.php');
//     }
// }
// ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kamar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
    <form action="" method="post">
      
        <input type="number" value="<?= $data['no_kamar']?>" name="no_kamar" placeholder="kamar">
        <input type="number" value="<?= $data['id_tipe_kamar']?>" name="id_tipe_kamar" placeholder="id kamar">
        <input type="submit" value="edit" name="masuk">
    </form>
</body>
</html> -->