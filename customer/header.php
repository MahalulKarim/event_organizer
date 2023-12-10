<?php 
date_default_timezone_set("Asia/Jakarta");


session_start();

include "../koneksi.php"; 
if ($_SESSION['status']!="login") {
    header("location:../loginCustomer.php?pesan=belumlogin");
} elseif($_SESSION['type']!='user'){

header("location:../loginCustomer.php?pesan=bukanlogin");
}else{

$id = $_SESSION['id'];
 $cariuser="SELECT * FROM user WHERE id='$id'";
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
    <link rel="stylesheet" href="../asset/css/style.css">
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css2?family=Italiana&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Ihda Puryana EO | Customer</title>
  </head>
  <body>
  <?php
            
            $activePage = basename($_SERVER['PHP_SELF'], ".php");
            ?>
  <nav class="navbar navbar-expand-lg navbar-light f-1 bg-1 fixed-top">
  <div class="container">
    <a class="navbar-brand text-white" href="index.php">Ihda Puryana EO</a>
    <a class="navbar-toggler"  data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fa-solid fa-bars text-white"></i>
    </a>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ms-auto menu " id="menu">
        <?php
          if ($activePage=="profil") {?>
            <a class="nav-link my-nav-link" aria-current="page" href="index.php">Home</a>
            <a class="nav-link my-nav-link" href="index.php">Produk  Kami</a>
            
         <?php } else {?>
              <a class="nav-link my-nav-link my-nav-link-active" aria-current="page" href="#hero">Home</a>
              <a class="nav-link my-nav-link" href="#produk">Produk  Kami</a>
          <?php }
          
        ?>
       
        <a class="nav-link my-nav-link ms-5" href="#12"></a>
        <a class="nav-link my-nav-link ms-5" href="#133"></a>
        <a class="nav-link my-nav-link ms-5" href="#3243"></a>
        <a class="nav-link my-nav-link ms-5" href="#3243"></a>
        <a class="nav-link my-nav-link ms-5" href="#3243"></a>
        <div class="dropdown">
          <button class="btn dropdown-toggle text-white" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          <?php
                                    if($user['avatar']==null){?>
                                    <!-- <a href="https://www.flaticon.com/free-icons/user" title="user icons">User icons created by Freepik - Flaticon</a> -->
                                    <img src="../asset/img/avatar/user.png" alt="" style="width:30px;height:30px;border-radius:50%">
                                        <?php
                                    }else{?> 
                                        <img src="../asset/img/avatar/<?=$user['avatar']?>" alt="" style="width:30px;height:30px;border-radius:50%">
                                    
                                    <?php

                                    }
                                ?>  
          </button>
          <ul class="dropdown-menu  " aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="profil.php"><i class="fa-solid fa-user"></i> Profil</a></li>
            <li><a class="dropdown-item" href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</nav>

    