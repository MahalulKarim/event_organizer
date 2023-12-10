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
            <h1 class="m-0">Event</h1>
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
                  <div class="col-12">
                    <a href="productAdd.php" class="btn btn-primary">Tambah</a>
                    <table id="example2" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Gambar</th>
                          <th>Nama</th>
                          <th>Kisaran Harga</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $no=1;
                          $query="SELECT * FROM produk";
                          $result=mysqli_query($db,$query);
                          while ($data=mysqli_fetch_array($result))                      
                          {?>
                          <tr>
                          <td><?=$no++?></td>
                          <td>
                            <img src="../asset/img/product/<?=$data['gambar']?>" alt="product" width="200px">
                          </td>
                          <td><?=$data['nama']?></td>
                          <td>Rp. <?=number_format($data['harga']) ?></td>
                          <td>
                            <a href="productDetail.php?id=<?=$data['id']?>" class="btn btn-sm btn-success">Detail</a>
                            <a href="productEdit.php?id=<?=$data['id']?>" class="btn btn-sm btn-info">Edit</a>
                            <a href="productDelete.php?id=<?=$data['id']?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Hapus Event?')">Hapus</a>
                          </td>
                        </tr>
                          
                          <?php
                          }

                        ?>
                   
                      </tbody>
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