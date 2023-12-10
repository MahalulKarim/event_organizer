<?php include "header.php"?>
<section style="min-height: 100vh;">
<style>
    .image_upload > input{
    display:none;
  }
  input[type=text]{
    
  
  }
  </style>
    <div class="container">
        <div class="pt-2"></div>
       <div class="row">
            <div class="col-12">
                <h6 class="fs-24 f-1  text-center"><b>Profil</b></h6>
            </div>
            <div class="col-lg-2">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center">
                                <?php
                                    if($user['avatar']==null){?>
                                        <img src="../asset/img/avatar/user.png" alt="" style="max-width:143px;max-height:143px;border-radius:50%">
                                        <?php
                                    }else{?> 
                                        <img src="../asset/img/avatar/<?=$user['avatar']?>" alt="" style="width:150px;height:150px;border-radius:50%">
                                    
                                    <?php

                                    }
                                ?>
                            </div>
                            <div class="col-12  d-flex justify-content-center">
                            
                                <form action="profilSave.php" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="user_id" value="<?=$user['id']?>">
                                    <div class="image_upload">
                                    <label for="userImage">
                                    <a style="cursor: pointer;font-size:10px;" class="text-success text-decoration-none" >Ubah</a>
                                    </label>
                                    <input type="file" name="avatar" id="userImage" onchange="this.form.submit()" accept=".jpg, .jpeg, .png">
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-10">
                <div class="row">
                   
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    
                                    <form action="profilSave.php" method="POST">
                                    <input type="hidden" name="user_id" value="<?=$user['id']?>">
                                        <div class="col-12">
                                            <div class="input-field-border-bottom f-1">
                                                <div class="mb-1">
                                                    <input type="text" id="" placeholder="Nama" name="nama" value="<?=$user['nama']?>" required/>
                                                </div>
                                                <div class="mb-1">
                                                    <select name="jk" id="" class="input-field-border-bottom pt-1"  required>
                                                        <?php
                                                            if ($user['jenis_kelamin']==null) {?>
                                                                <option value="" selected disabled>--Pilih--</option>
                                                                <option value="Laki-laki">Laki-laki</option>
                                                                <option value="Perempuan">Perempuan</option>
                                                            <?php
                                                            }elseif($user['jenis_kelamin']=='Laki-laki'){?>
                                                                <option value="Laki-laki" selected>Laki-laki</option>
                                                                <option value="Perempuan">Perempuan</option>
                                                                <?php
                                                            } else {?>
                                                                <option value="Laki-laki">Laki-laki</option>
                                                                <option value="Perempuan" selected>Perempuan</option>
                                                                <?php                                                        
                                                            }                                                   
                                                        
                                                        ?>
                                                    
                                                    </select>
                                                </div>
                                                <div class="mb-1">
                                                    <input type="email" id="" placeholder="Email" name="email" value="<?=$user['email']?>"  required/>
                                                </div>
                                                <div class="mb-1">
                                                    <input type="number" id="" placeholder="Nomor Hp" name="no_hp" value="<?=$user['no_hp']?>"  required/>
                                                </div>
                                                <div class="mb-2">
                                                    <textarea  class="input-field-border-bottom" name="alamat" id="" cols="10" rows="1" placeholder="Alamat"><?=$user['alamat']?></textarea>
                                                </div>
                                                <div class="mb-1">
                                                    <button class="btn btn-register text-white" type="submit" name="simpan">Ubah Profil</button>
                                                </div>
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
</section>

</div>
<?php include "footer.php"?>