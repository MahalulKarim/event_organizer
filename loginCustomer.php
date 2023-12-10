<!doctype html>
<html lang="en">
  <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!-- Mystyle -->
        <link rel="stylesheet" href="asset/css/style.css">
        <!-- Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
        
        <link href="https://fonts.googleapis.com/css2?family=Italiana&display=swap" rel="stylesheet">
        <!-- fontawesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Ihda Puryana EO | </title>
    </head>
    <body>
        <?php
        if(isset($_GET['id'])){
            $idPage=$_GET['id'];
        }else{
            $idPage=1;
        }
        ?>
        <section id="login">
            <div class="container-fluid">
                <div class="row pt-3">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <a href="index.php" class="text-center text-white f-1 fs-10 text-decoration-none">Ihda Puryana EO</a>
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-lg-4 d-flex justify-content-center">
                        <img src="asset/img/eo3.png" alt="asset/img/eo3.png" style="max-width:90%;height:400px">
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-12">
                                <p class="fs-20 fc1 f-1 ms-5">Selamat datang di</p>
                                <h4 class="fs-64 f-2 text-white text-center">Ihda Puryana Event Organizer</h4>
                            </div>
                            <div class="col-12">
                                <style>
                                    .nav{
                                        width:100%;
                                    }
                                    .nav-link{
                                        width:50%;
                                        color:white;
                                        text-align:left;
                                    }
                                    .nav-link:hover{
                                        width:50%;
                                        color: rgba(240, 160, 75, 1)!important;
                                    }
                                    .active{
                                        background-color:transparent!important;
                                        border:none!important;
                                        color: rgba(240, 160, 75, 1)!important;
                                        border-bottom:1px solid rgba(240, 160, 75, 1)!important
                                    }
                                </style>
                               

                                <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link f-1 <?= ($idPage == '1') ? 'active':''; ?>" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Login</button>
                                    <button class="nav-link f-1 <?= ($idPage == '2') ? 'active':''; ?>" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Daftar</button>
                                </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade <?= ($idPage == '1') ? 'show active':''; ?>" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" style="border-bottom:none!important;">
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-lg-6 pt-4">
                                                <div class="card" style="width: 100%;">                                                    
                                                    <div class="card-body">
                                                       <div class="row">
                                                        <div class="col-12">
                                                            <p  class="text-center">
                                                                <?php
                                                                    if (isset($_GET['pesan'])) {                                       
                                                                        if ($_GET['pesan'] == "gagal") {
                                                                        echo "Login Gagal!, Username atau Password salah!";
                                                                        } else if ($_GET['pesan'] == "logout") {
                                                                        echo "Anda telah Logout";
                                                                        } else if ($_GET['pesan'] == "belumlogin") {
                                                                        echo "Silahkan Login terlebih dahulu!";                                                                       
                                                                        } else if ($_GET['pesan'] == "bukanlogin") {
                                                                        echo "Silahkan Login terlebih dahulu!";
                                                                        }
                                                                    }
                                                                ?>
                                                            </p>                                    
                                                        </div>
                                                        <form action="cekLogin.php" method="POST">
                                                            <div class="col-12 text-dark f-1">
                                                                <div class="mb-2 text-center">
                                                                    <label for="" class="text-center">Email</label>
                                                                    <input type="text" name="email" required class="form-control text-center" placeholder="Ex:jannata@mail.com">
                                                                </div>
                                                                <div class="mb-2 text-center">
                                                                    <label for="" class="text-center">Password</label>
                                                                    <input type="password" name="password" required class="form-control text-center" placeholder="Masukkan Password Anda">
                                                                </div>
                                                                <div class="mb-2 text-center pt-3">
                                                                   <button type="submit" class="btn bg-3 px-5" name="login">Masuk</button>
                                                                   <!-- <a href="customer/index.php" class="btn bg-3 px-5">Masuk</a> -->
                                                                </div>
                                                            </div>
                                                        </form>
                                                       </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade <?= ($idPage == '2') ? 'show active':''; ?>" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" style="border-bottom:none!important;">
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-lg-6 pt-4">
                                                <div class="card" style="width: 100%;">                                                    
                                                    <div class="card-body">
                                                       <div class="row">
                                                        <form action="daftarSave.php" method="POST">
                                                            <div class="col-12 text-dark f-1">
                                                                <div class="mb-2 text-center">
                                                                    <label for="" class="text-center">Nama Lengkap</label>
                                                                    <input type="text" name="nama" required class="form-control text-center" placeholder="Masukkan Nama Lengkap">
                                                                </div>
                                                                <div class="mb-2 text-center">
                                                                    <label for="" class="text-center">Email</label>
                                                                    <input type="text" name="email" required class="form-control text-center" placeholder="Ex:jannata@mail.com">
                                                                </div>
                                                                <div class="mb-2 text-center">
                                                                    <label for="" class="text-center">Password</label>
                                                                    <input type="password" name="password" required class="form-control text-center" placeholder="Masukkan Password Anda">
                                                                </div>
                                                                <div class="mb-2 text-center pt-3">
                                                                   <button type="submit" name="daftar" class="btn bg-3 px-5">Daftar</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                       </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>