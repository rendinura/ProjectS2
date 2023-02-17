<?php

session_start();
$hostname = "localhost";
$username = "root";
$password = "";
$database = "hotel";

$conn = mysqli_connect($hostname, $username, $password, $database);


if (isset($_POST['submit'])) {
  // koneksi
  // include 'cont.php';


  // var_dump($exec);
  // die();
  $username = $_POST['username'];
  $password = $_POST['password'];

  // mencocokan data
  $query_get_data = "SELECT * FROM user WHERE username = '$username' and password = '$password'";
  $exec = mysqli_query($conn, $query_get_data);
  // $get_data = mysqli_fetch_assoc($exec);
  $get_data = mysqli_fetch_array($exec);

  // melempar akun
  $user_type = $get_data['user_type'];
  $_SESSION['user_type'] = $user_type;

  $_SESSION['user_id'] = $get_data['user_id'];
  
  switch ($user_type) {
    case 'tamu':
      header('location:tamu.php');
      break;
    case 'resepsionis':
      header('location:resepsionis.php');
      break;
    case 'administrator':
      header('location:administrator.php');
      break;

    default;
      header('location:index.php');
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.104.2">
  <title>Login</title>
  <link rel="icon" type="image/png" sizes="16x16" href="hebat-removebg-preview(1).png">

  <!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/"> -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">






  <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="signin.css">

  <style>
      body{
        background-image: url(background.jpg);
      }
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .b-example-divider {
      height: 3rem;
      background-color: rgba(0, 0, 0, .1);
      border: solid rgba(0, 0, 0, .15);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }

    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="signin.css" rel="stylesheet">
</head>

<body class="text-center">

  <main class="form-signin w-100 m-auto">
    <form method="POST" action="">
      <!-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
      <img class="mb-4" src="hebat-removebg-preview(1).png" alt="" width="220" height="110">
      <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

      <div class="form-floating">
        <input type="text" class="form-control" name="username" placeholder="Username" autocomplete="off" required>
        <label for="floatingInput">Username</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off" required>
        <label for="floatingPassword">Password</label>
      </div>

      <!-- <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div> -->
      <button class="w-100 btn btn-lg btn-primary" name="submit" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2023</p>
    </form>
  </main>



</body>

</html>