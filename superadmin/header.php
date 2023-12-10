<?php 
date_default_timezone_set("Asia/Jakarta");


session_start();

include "../koneksi.php"; 
if ($_SESSION['status']!="login") {
    header("location:../loginCustomer.php?pesan=belumlogin");
} elseif($_SESSION['type']!='admin'){

header("location:../loginCustomer.php?pesan=bukanlogin");
}else{

$email = $_SESSION['email'];
 $cariuser="SELECT * FROM user WHERE email='$email'";
$cari=mysqli_query($db, $cariuser);
if(mysqli_num_rows($cari)<1){
  echo "NOt found";
}else{
  $user=mysqli_fetch_array($cari);
}

}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Mystyle -->
    <link rel="stylesheet" href="../asset/css/admin.css">
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css2?family=Italiana&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- datatable -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <title>Ihda Puryana EO | </title>
  </head>
  <body>
  <?php
            
            $activePage = basename($_SERVER['PHP_SELF'], ".php");
  ?>
<div class="d-none d-lg-block">
  <div class="container-fluid">
    <div class="row">
      <div class="col-2 bg-1 bg-nav-left">
        <div class="row">
          <div class="col-12 pt-5 f-1">
            <a href="index.php" class="text-center text-white text-decoration-none ms-4 pt-4 fs-16">Ihda Puryana EO</a>
          </div>
          <div class="col-12 pt-5 f-1">
            <a href="index.php" class="my-nav-link text-decoration-none ms-4 pt-4 <?= ($activePage == 'index') ? 'my-nav-link-active':''; ?>"><i class="me-2 fa-solid fa-gauge"></i> Dashboard</a>
          </div>
          <div class="col-12 pt-3 f-1">
            <a href="user.php" class="my-nav-link text-decoration-none ms-4 pt-4 <?= ($activePage == 'user') ? 'my-nav-link-active':''; ?> <?= ($activePage == 'userDetail') ? 'my-nav-link-active':''; ?>"><i class="me-2 fa-solid fa-user"></i> User</a>
          </div>
          <div class="col-12 pt-3 f-1">
            <a href="booking.php" class="my-nav-link text-decoration-none ms-4 pt-4 <?= ($activePage == 'booking') ? 'my-nav-link-active':''; ?> <?= ($activePage == 'bookingDetail') ? 'my-nav-link-active':''; ?> "><i class="me-2 fa-solid fa-bookmark"></i> Booking</a>
          </div>
          <div class="col-12 pt-3 f-1">
            <a href="produk.php" class="my-nav-link text-decoration-none ms-4 pt-4 <?= ($activePage == 'produk') ? 'my-nav-link-active':''; ?> <?= ($activePage == 'produkCreate') ? 'my-nav-link-active':''; ?> <?= ($activePage == 'produkEdit') ? 'my-nav-link-active':''; ?>"><i class="me-2 fa-solid fa-circle-info"></i> Produk</a>
          </div>
          <div class="col-12 pt-5 f-1">
            <a href="../logout.php" class="my-nav-link my-nav-link-active text-decoration-none ms-4 pt-4"><i class="me-2 fa-solid fa-right-from-bracket"></i> Logout</a>
          </div>

        </div>
        <div class="">
        </div>
      </div>
      <div class="col-10 contents f-1">
        <div class="container">
          <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center py-2">
              <div class=""></div>
              <div class="">
                <h6 class="fs-20 my-auto">
                  <?= ($activePage == 'index') ? 'Dashboard':''; ?>
                  <?= ($activePage == 'user') ? 'User':''; ?>
                  <?= ($activePage == 'userDetail') ? 'User':''; ?>
                  <?= ($activePage == 'booking') ? 'Booking':''; ?>
                  <?= ($activePage == 'bookingDetail') ? 'Booking Detail':''; ?>
                  <?= ($activePage == 'produk') ? 'Daftar Produk Booking':''; ?>
                  <?= ($activePage == 'produkCreate') ? 'Tambah Produk Booking':''; ?>
                  <?= ($activePage == 'produkEdit') ? 'Edit Produk Booking':''; ?>
                </h6>
              </div>
              <div class="">
                <div class="dropdown">
                  <button class="btn text-white" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="../asset/img/avatar/<?=$user['avatar']?>" alt="" style="width:30px;height:30px;border-radius:50%">
                  </button>
                  <ul class="dropdown-menu  " aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="profil.php"><i class="fa-solid fa-user"></i> Profil</a></li>
                    <li><a class="dropdown-item" href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      

    