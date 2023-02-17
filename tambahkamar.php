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

    <label for="no_kamar">NO KAMAR</label>
    <input type="number" id="no_kamar" name="no_kamar"  class="form-control" required>

    <label for="id_tipe_kamar">ID KAMAR</label>  
    <input type="number" id="id_tipe_kamar"name="id_tipe_kamar" class="form-control" required>

    <input class="btn btn-success mt-3" type="submit" name="tambah" value="Tambah Data">
    </form>
    </div>
   
<?php
     if(isset($_POST['tambah'])){
       $no_kamar = $_POST['no_kamar'];
       $id_tipe_kamar = $_POST['id_tipe_kamar'];
       $queryInsert = "INSERT INTO kamar (no_kamar, id_tipe_kamar)
       VALUES ('$no_kamar', '$id_tipe_kamar')";

       $execQuery = mysqli_query($koneksi, $queryInsert);
       if($execQuery){
           header("location:addadmin.php?id_tipe_kamar=$id_tipe_kamar");

    }
}

?>
</body>
</html>