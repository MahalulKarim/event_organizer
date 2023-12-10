<?php 
include "header.php";
?>


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Profil</h1>
            
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="row">
                      <div class="col-lg-6">
                        <h4>Profil</h4>
                        <hr>
                        <form action="updateProfile.php" method="POST" enctype="multipart/form-data">                      
                              <input type="hidden" name="id" value="<?=$user['id']?>">
                              <div class="mb-2">
                                <label for=""><b>Foto Profil</b></label>
                              </div>
                              <div class="mb-2 d-flex justify-content-center">
                                <?php
                                    if($user['avatar']==''){
                                ?>
                                    <img id="blah" src="../asset/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image" width="160px" height="160px" > 
                                <?php
                                    }else{
                                ?>
                                    <img id="blah" src="../asset/img/avatar/<?=$user['avatar']?>" class="img-circle elevation-2" alt="User Image" width="160px" height="160px" > 
                                <?php
                                    }
                                ?>
                              </div>
                              <div class="mb-2">
                                  <input name="avatar" type='file' onchange="readURL(this);" class="form-control form-control-sm" />
                              </div>
                              <div class="mb-2">
                                <label for=""><b>Nama</b></label>
                                <input type="text" name="nama" class="form-control form-control-sm" placeholder="Tulis Disini" value="<?=$user['nama']?>" required>
                              </div>
                              <div class="mb-2">
                                <label for=""><b>No Hp</b></label>
                                <input type="number" name="no_hp" class="form-control form-control-sm" placeholder="ex:087xxxx" value="<?=$user['no_hp']?>" required>
                              </div>                            
                              <div class="mb-2">
                                <label for=""><b>Jenis Kelamin</b></label>
                                <select name="jenis_kelamin" id="" class="form-control form-control-sm" required>
                                <?php
                                    if($user['jenis_kelamin']==''){
                                ?>
                                    <option value="" selected disabled>--Pilih--</option> 
                                    <option value="Laki-laki">Laki-laki</option> 
                                    <option value="Perempuan">Perempuan</option>  
                                <?php
                                }elseif($user['jenis_kelamin']=='Laki-laki'){
                                      ?>
                                    <option value="Laki-laki" selected>Laki-laki</option>  
                                    <option value="Perempuan">Perempuan</option>  
                                <?php
                                    }else{
                                ?>
                                    <option value="Laki-laki">Laki-laki</option>  
                                    <option value="Perempuan" selected>Perempuan</option>
                                <?php
                                    }
                                ?>
   
                                </select>
                              </div>
                              <div class="mb-2">
                                <label for=""><b>Alamat</b></label>
                                <textarea name="alamat" id="" cols="30" rows="5" class="form-control" placeholder="Alamat Lengkap.."><?=$user['alamat']?></textarea>
                              </div>
                              <div class="mb-2 d-flex justify-content-end">
                                    <button class="btn btn-primary" name="updateProfile">Update</button>
                              </div>
                        </form>
                      </div>
                      <div class="col-lg-6 px-3">
                        <form action="updateProfile.php" method="POST">
                          <input type="hidden" name="id" value="<?=$user['id']?>">
                          <h4>Email dan Password</h4>
                          <hr>
                          <div class="mb-2">
                              <label for=""><b>Email</b></label>
                              <input type="email" name="email" class="form-control form-control-sm" placeholder="ex:admin@mail.com" value="<?=$user['email']?>" required>
                          </div>
                          <div class="mb-2">
                              <label for=""><b>Password</b></label>
                              <input type="password" name="password" class="form-control form-control-sm" placeholder="Password" required>
                          </div>
                          <div class="mb-2 d-flex justify-content-end">
                              <button class="btn btn-primary" name="updatePassword">Update</button>
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
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


<?php 
include "footer.php";
?>