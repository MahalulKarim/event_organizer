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
            <h1 class="m-0">Event Detail</h1>
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
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                    <?php
                          if($data['gambar']==''){?>
                            <img id="blah" src="../asset/img/banner2.png" alt="your image" width="400px" class="text-center"/>
                          <?php
                          }else{?>
                            <img id="blah" src="../asset/img/product/<?=$data['gambar']?>" alt="your image" width="400px" class="text-center"/>
                          <?php
                          }
                          ?>
                    </div>
                    <div class="col-12 pt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <td class="bg-light"><?=$data['nama']?></td>                                   
                                </tr>
                                <tr>
                                    <th>Harga</th>
                                    <td class="bg-light">Rp. <?=number_format($data['harga']) ?></td>                                   
                                </tr>
                                <tr>
                                    <th style="vertical-align: top;">Deskripsi</th>
                                    <td class="bg-light">
                                        <p>
                                        <?=nl2br(str_replace('', '', htmlspecialchars($data['deskripsi'])));?>
                                        </p>
                                    </td>                                   
                                </tr>
                            </thead>
                            
                        </table>
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