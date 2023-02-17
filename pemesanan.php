<?php
session_start();
include 'koneksi.php';

//mendapatkan data dari form
if(isset($_POST['submit'])){
  $no_kamar    = $_POST['no_kamar'];
  $checkin     = $_POST['checkin'];
  $checkout    = $_POST['checkout'];
//masukkan data kedalam database
$query         = "SELECT * FROM kamar
                       JOIN tipe_kamar on kamar.id_tipe_kamar = tipe_kamar.id_tipe_kamar
                       WHERE kamar.no_kamar = $no_kamar";
$eksekusi      = mysqli_query($koneksi, $query);
$data          = mysqli_fetch_assoc($eksekusi);

$insert = "INSERT INTO pemesanan
                       (no_kamar, user_id, checkin, checkout, harga, status_pemesanan)
                VALUES ('$no_kamar','$_SESSION[user_id]','$checkin','$checkout',
                        DATEDIFF(DATE('$checkout'), DATE('$checkin'))*$data[harga],'proses')";
//lempar ke halaman...jika berhasil
$eksek  = mysqli_query($koneksi, $insert);
   if($eksek){
    echo"<script>alert('data anda berhasil di simpan')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Hotel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<!-- <div class="collapse" id="navbarToggleExternalContent">
  <div class="bg-dark p-4">
    <h5 class="text-white h4">Collapsed content</h5>
    <span class="text-muted">Toggleable via the navbar brand.</span>
  </div>
</div> -->
<!-- <nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>
<div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Offcanvas with body scrolling</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <p>Try scrolling the rest of the page to see this option in action.</p>
  </div>
</div> -->
<div class="w-50  mx-auto border p-3 mt-5">
    <!-- <a class="btn btn-primary" href="index.php">Back to Home</a> -->
    <form action="" method="post">
      <input type="hidden" name="no_kamar" value="<?= $_POST['no_kamar'] ?>">

    <label for="checkin">Checkin</label>
    <input type="date" name="checkin"  class="form-control" required>

    <label for="checkout">Checkout</label>  
    <input type="date" name="checkout" class="form-control" required>

    <button class="btn btn-success mt-3" name="submit" type="submit">Booking</button>
    <a class="btn btn-primary mt-3" href="tamu.php">Lihat Kamar</a>
    </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</html>