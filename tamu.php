<?php
include "koneksi.php";
session_start();
if($_SESSION['user_type'] !='tamu'){
  header('location:index.php');
}
// if(isset($_POST['psn'])){
//   header("location:pemesanan.php");
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTEL HEBAT</title>
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
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    </div>
  </div>
</nav>



<!-- <div class="container">
<table class="table table-striped table-hover table-bordered">
        <thead class="table-dark">
        <tr>
            <th>Tipe Kamar</th>
            <th>No Kamar</th>
            <th>Fasilitas Kamar</th>
            <th>Fasilitas Hotel</th>
            <th>Fasilitas Umum</th>
            <th>Fasilitas Terdekat</th>
            <th>Action</th>
        </thead>
        </tr> -->
      <?php
        // $query = "SELECT * FROM kamar JOIN tipe_kamar JOIN fasilitas_hotel 
        //                     on kamar.id_tipe_kamar = tipe_kamar.id_tipe_kamar = fasilitas_hotel.id_fasilitas_hotel";
        // $ambil_data =mysqli_query($koneksi, $query);

        $ambil_data = mysqli_query ($koneksi, "SELECT * FROM kamar JOIN tipe_kamar JOIN fasilitas_hotel 
                             on kamar.id_tipe_kamar = tipe_kamar.id_tipe_kamar and fasilitas_hotel.id_fasilitas_hotel
                               WHERE NOT EXISTS( SELECT * FROM pemesanan WHERE pemesanan.no_kamar = kamar.no_kamar and status_pemesanan = 'PROSES')")
                               or die (mysqli_error($koneksi));

        $no =1;
        while($tampil = mysqli_fetch_assoc($ambil_data)){
            ?>
        <div class="container">
        <div class="row d-flex justify-content-">
        <div class="col-xl-6 col-md-6 col-sm-12">
                <div class="card mt-4">
                    <img src="#" alt="">
                    <div class="card-body">
                        <h5 class="card-title">
              <tr>
                  <td>
                     <h8>No. <?= $no+=0 ?></h8>
                     <hr>
                     <h8>Tipe Kamar :
                     <?= $tampil['id_tipe_kamar']?></h8>
                     <hr>
                     <h8>No Kamar :</h8>
                     <?= $tampil['no_kamar']?></h8>
                     <hr>
                     <h8>Fasilitas Kamar :</h8>
                     <?= $tampil['fasilitas']?></h8>
                     <hr>
                     <h8>Fasilitas Hotel :</h8>
                     <?= $tampil['fasilitas_hotel']?></h8>
                     <hr>
                     <h8>Fasilitas Umum :</h8>
                     <?= $tampil['fasilitas_umum']?></h8>
                     <hr>
                     <h8>Fasilitas Terdekat :</h8>
                     <?= $tampil['fasilitas_terdekat']?></h8>
                      <hr>
                    <form action="pemesanan.php" method="post">
                       <div class="col d-flex justify-content-center">
                       <input type="hidden" name="no_kamar" value="<?= $tampil['no_kamar']; ?>">
                       <input type="submit" name="psn" value="Booking" class='w-100 mb-2 btn btn-sm btn-primary'>
                       </div>
                    </form>
                  </td>
              </tr>
                        </h5>
                    </div>
                </div>
            </div>            
            <!-- <div class="col-xl-4 col-md-6 col-sm-12">
                <div class="card mt-4">
                  <img src="#" alt="">
                    <div class="card-body">
                        <h5 class="card-title">
              <tr>
                  <td>
                     <h8>Tipe Kamar</h8>
                     <p><?= $tampil['id_tipe_kamar']?></p>
                     <h8>No Kamar</h8>
                     <p><?= $tampil['no_kamar']?></p>
                     <h8>Fasilitas Kamar</h8>
                     <p><?= $tampil['fasilitas']?></p>
                     <h8>Fasilitas Hotel</h8>
                     <p><?= $tampil['fasilitas_hotel']?></p>
                     <h8>Fasilitas Umum</h8>
                     <p><?= $tampil['fasilitas_umum']?></p>
                     <h8>Fasilitas Terdekat</h8>
                     <p><?= $tampil['fasilitas_terdekat']?><p>
                    <form action="pemesanan.php" method="post">
                       <div class="col d-flex justify-content-center">
                       <input type="hidden" name="no_kamar" value="<?= $tampil['no_kamar']; ?>">
                       <input type="submit" name="psn" value="Booking" class='w-100 mb-2 btn btn-sm btn-warning'>
                       </div>
                    </form>
                  </td>
              </tr>
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 col-sm-12">
                <div class="card mt-4">
                  <img src="#" alt="">
                    <div class="card-body">
                        <h5 class="card-title">
              <tr>
                  <td>
                     <h8>Tipe Kamar</h8>
                     <p><?= $tampil['id_tipe_kamar']?></p>
                     <hr>
                     <h8>No Kamar</h8>
                     <p><?= $tampil['no_kamar']?></p>
                     <hr>
                     <h8>Fasilitas Kamar</h8>
                     <p><?= $tampil['fasilitas']?></p>
                     <hr>
                     <h8>Fasilitas Hotel</h8>
                     <p><?= $tampil['fasilitas_hotel']?></p>
                     <hr>
                     <h8>Fasilitas Umum</h8>
                     <p><?= $tampil['fasilitas_umum']?></p>
                     <hr>
                     <h8>Fasilitas Terdekat</h8>
                     <p><?= $tampil['fasilitas_terdekat']?><p>
                      <hr>
                    <form action="pemesanan.php" method="post">
                       <div class="col d-flex justify-content-center">
                       <input type="hidden" name="no_kamar" value="<?= $tampil['no_kamar']; ?>">
                       <input type="submit" name="psn" value="Booking" class='w-100 mb-2 btn btn-sm btn-info'>
                       </div>
                    </form>
                  </td>
              </tr>
                        </h5>
                    </div>
                </div>
            </div> -->

<!-- coba-coba -->
    <!-- <div class="container" style="padding-top:600pcx;" style="padding-left:50pcx;">
      <div class="col d-flex">
        <div class="col-xl-4 col-md-6 col-sm-12">
          <div class="card card-body mt-4">
            <table border="1">
              <tr>
                  <td>
                     <h8>Tipe Kamar</h8>
                     <p><?= $tampil['id_tipe_kamar']?></p>
                     <h8>No Kamar</h8>
                     <p><?= $tampil['no_kamar']?></p>
                     <h8>Fasilitas Kamar</h8>
                     <p><?= $tampil['fasilitas']?></p>
                     <h8>Fasilitas Hotel</h8>
                     <p><?= $tampil['fasilitas_hotel']?></p>
                     <h8>Fasilitas Umum</h8>
                     <p><?= $tampil['fasilitas_umum']?></p>
                     <h8>Fasilitas Terdekat</h8>
                     <p><?= $tampil['fasilitas_terdekat']?><p>
                    <form action="pemesanan.php" method="post">
                       <div class="col d-flex justify-content-center">
                       <input type="hidden" name="no_kamar" value="<?= $tampil['no_kamar']; ?>">
                       <input type="submit" name="psn" value="Booking" class='w-100 mb-2 btn btn-sm btn-warning'>
                       </div>
                    </form>
                  </td>
              </tr>
            </table>
          </div>    
        </div>
      </div>
    </div> -->
            <!-- <tr>
                <td><?= $no++ ?></td>
                <td><?= $tampil['id_tipe_kamar']?></td>
                <td><?= $tampil['no_kamar']?></td>
                <td><?= $tampil['fasilitas']?></td>
                <td><?= $tampil['fasilitas_hotel']?></td>
                <td><?= $tampil['fasilitas_umum']?></td>
                <td><?= $tampil['fasilitas_terdekat']?></td>
                <td>
                  <form action="pemesanan.php" method="post">
                  <div class="col d-flex justify-content-center">
                  <input type="hidden" name="no_kamar" value="<?= $tampil['no_kamar']; ?>">
                  <input type="submit" name="psn" value="Booking" class='btn btn-sm btn-warning'>
                  </div>
                  </form>
                </td>
            </tr> -->
            <?php
        }
        ?>
        </div>
</body>
</html>




<!-- <div class='row'>
                      <div class=''>
                       <a href= 'pemesanan.php?no_kamar' 
                      class='btn btn-sm btn-warning'><i >Booking</i></a>
                     </div> -->