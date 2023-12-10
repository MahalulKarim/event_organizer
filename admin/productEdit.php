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
            <h1 class="m-0">Event Edit</h1>
          </div><!-- /.col -->
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  <?php
    if(isset($_GET['id'])){
      $id=$_GET['id'];
      $query="SELECT * FROM produk WHERE id=$id";
      $result=mysqli_query($db,$query);
      if(mysqli_num_rows($result)<1){
        echo "NO DATA!";
        }else{
        $data=mysqli_fetch_array($result);
        }
    }
  ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <form action="productSave.php" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="id" value="<?=$id?>">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-2">
                            <label for=""><b>Gambar</b></label>
                        </div>
                        <div class="mb-3 d-flex justify-content-center">
                          <?php
                          if($data['gambar']==''){?>
                            <img id="blah" src="../asset/img/banner2.png" alt="your image" width="300px" class="text-center"/>
                          <?php
                          }else{?>
                            <img id="blah" src="../asset/img/product/<?=$data['gambar']?>" alt="your image" width="300px" class="text-center"/>
                          <?php
                          }
                          ?>
                        </div>
                        <div class="mb-2">
                          <input name="gambar" type='file' onchange="readURL(this);" class="form-control form-control-sm" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-2">
                          <label for=""><b>Nama Event</b></label>
                          <input name="nama" type="text" class="form-control form-control-sm" placeholder="Tulis Disini" required value="<?=$data['nama']?>">
                        </div>
                        <div class="mb-2">
                          <label for=""><b>Harga</b></label>
                          <input name="harga" type="number" class="form-control form-control-sm" placeholder="Tulis Disini" required value="<?=$data['harga']?>">
                        </div>
                        <div class="mb-2">
                          <label for=""><b>Deskripsi</b></label>
                          <textarea name="deskripsi" id="" cols="30" rows="7" class="form-control" placeholder="Deskripsi.." required><?=$data['deskripsi']?></textarea>
                        </div>
                        <div class="mb-2 d-flex justify-content-end">
                          <button name="simpanEdit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                  </div>
                </form>
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