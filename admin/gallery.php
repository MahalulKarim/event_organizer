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
            <h1 class="m-0">Galleri</h1>
            
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
                <?php
                          $no=1;
                          $query="SELECT * FROM produk";
                          $result=mysqli_query($db,$query);
                          while ($data=mysqli_fetch_array($result))                      
                {?>
                    <div class="col-lg-4">
                        <div class="card" style="width: 16rem;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                    <div id="carouselExampleControls<?=$data['id']?>" class="carousel slide" data-ride="carousel" data-touch="false" data-interval="false">
                                        <div class="carousel-inner">
                                            
                                                <div class="carousel-item active">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <img class="d-block w-100 img-thumbnail" src="../asset/img/product/<?=$data['gambar']?>" alt="First slide" style="height:190px">
                                                        </div>
                                                        <div class="col-12 pt-2">
                                                        <a href="" class="btn btn-sm btn-info btn-sm"  data-toggle="modal" data-target="#add<?=$data['id']?>">Tambah Foto</a>

<!-- Modal -->
<div class="modal fade" id="add<?=$data['id']?>" tabindex="-1" role="dialog" aria-labelledby="addLabel" aria-hidden="true" data-bs-backdrop='static'>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addLabel">Tambah Foto </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="gallerySave.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?=$data['id']?>">
                <div class="mb-3 d-flex justify-content-center">
                    <img id="prod" src="../asset/img/banner2.png" alt="your image" width="300px;height:300px" class="text-center prod"/>
                </div>
                <div class="mb-2 px-4">
                    <input name="gambar" type='file' onchange="readURL(this);" class="form-control form-control-sm" required/>
                </div>
                <div class="mb-2 d-flex justify-content-between px-4 pt-2">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
      
        </div>
    </div>
</div>
<!-- /Modal -->
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                            <?php
                                                        $id_product=$data['id'];
                                                       
                                                        $query1="SELECT * FROM galleri WHERE id_produk=$id_product";
                                                        $result1=mysqli_query($db,$query1);
                                                        while ($data1=mysqli_fetch_array($result1))                      
                                                {?>

                                                <div class="carousel-item">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            
                                                            <img class="d-block w-100 img-thumbnail" src="../asset/img/product/<?=$data1['gambar']?>" alt="Second slide" style="height:190px">
                                                        </div>
                                                        <div class="col-12 pt-2">
                                                            <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit<?=$data1['id']?>"><i class="fas fa-pencil-alt"></i></a>
                                                             <!-- Modal -->
                                                             <div class="modal fade" id="edit<?=$data1['id']?>" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true" data-bs-backdrop='static'>
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="editLabel">Edit Foto </h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="gallerySave.php" method="POST" enctype="multipart/form-data">
                                                                            <input type="hidden" name="id_product" value="<?=$data['id']?>">
                                                                            <input type="hidden" name="id" value="<?=$data1['id']?>">
                                                                            <div class="mb-3 d-flex justify-content-center">
                                                                                <img id="prod" src="../asset/img/product/<?=$data1['gambar']?>" alt="your image" width="300px;height:300px" class="text-center prod"/>
                                                                            </div>
                                                                            <div class="mb-2 px-4">
                                                                                <input name="gambar" type='file' onchange="readURL(this);" class="form-control form-control-sm" required/>
                                                                            </div>
                                                                            <div class="mb-2 d-flex justify-content-between px-4 pt-2">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                                <button type="submit" name="simpanEditGallery" class="btn btn-primary">Simpan</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- /Modal -->
                                                            <a href="galleryDelete.php?id=<?=$data1['id']?>" onclick="return confirm('Yakin Hapus Gambar?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                         
                                            <?php
                                            }

                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-12 pt-5">
                                        <a class="carousel-control-prev" href="#carouselExampleControls<?=$data['id']?>" role="button" data-slide="prev">
                                            <span class="btn btn-sm btn-primary" aria-hidden="true" ><</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleControls<?=$data['id']?>" role="button" data-slide="next">
                                            <span class="btn btn-sm btn-primary" aria-hidden="true" >></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                       
                                    </div>
                                    <div class="col-12">
                                      
                                    </div>
                                    <div class="col-12 pt-3">
                                        <h5 class="card-title"><?=$data['nama']?></h5>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                <?php
                  }

                ?>
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