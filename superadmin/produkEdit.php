<?php include "header.php"?>
<div class="container">
    <div class="row">
    <?php 
        if(isset($_GET['id'])){
            $idProduk=$_GET['id'];
            $query="SELECT * FROM produk WHERE id='$idProduk'";
            $result=mysqli_query($db,$query);
            $data=mysqli_fetch_array($result);
        }
    ?>
       <div class="col-12 mb-4 pt-3">
         
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <form action="produkSave.php" method="POST">
                            <input type="hidden" name="produk_id" value="<?=$idProduk?>">
                            <div class="col-12">
                                <div class="mb-2">
                                    <label for="">Nama Paket</label>
                                    <input type="text"  name="nama" class="form-control text-center" required placeholder="Masukkan Nama Paket" value="<?=$data['nama']?>">
                                </div>
                                <div class="mb-2">
                                    <label for="">Harga Paket</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                                        <input type="number" name="harga" required class="form-control" placeholder="Masukkan Harga" aria-label="Masukkan Harga" aria-describedby="basic-addon1" value="<?=$data['harga']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 px-2">     
                            <label for="" class="text-center">Deskripsi Paket</label>                                     
                                <div class="row">                                                
                                    <?php 
                                        $idProduk=$data['id'];
                                        $query2="SELECT * FROM deskripsi_produk WHERE produk_id='$idProduk'";
                                        $result2=mysqli_query($db,$query2);
                                            while ($data2=mysqli_fetch_array($result2))                      
                                        {?>  
                                        <div class="col-11 mb-2  f-1">                                                   
                                            <input type="text" class="form-control text-center bg-white" value="<?=$data2['deskripsi']?>" readonly>
                                        </div>
                                        <div class="col-1 mb-2 f-1">                                                      
                                                        <div class="checkbox-wrapper-12">
                                                            <div class="cbx">
                                                                <input id="cbx-12<?=$data2['id']?>" type="checkbox" name="deskripsi[]" value="<?=$data2['deskripsi']?>" checked/>
                                                                <label for="cbx-12<?=$data2['id']?>"></label>
                                                                <svg width="15" height="14" viewbox="0 0 15 14" fill="none">
                                                                <path d="M2 8.36364L6.23077 12L13 2"></path>
                                                                </svg>
                                                            </div>
                                                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1">
                                                                <defs>
                                                                <filter id="goo-12<?=$data2['id']?>">
                                                                    <fegaussianblur in="SourceGraphic" stddeviation="4" result="blur"></fegaussianblur>
                                                                    <fecolormatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 22 -7" result="goo-12<?=$data2['id']?>"></fecolormatrix>
                                                                    <feblend in="SourceGraphic" in2="goo-12<?=$data2['id']?>"></feblend>
                                                                </filter>
                                                                </defs>
                                                            </svg>                                                    
                                                        </div>
                                                    </div>
                                             
                                                <?php 
                                            }?>  
                                            </div>                                       
                                        </div>
                                        <div class="col-12 px-2 f-1 d-flex justify-content-between">
                                            <label for="" class="text-center">Tambah Deskripsi Paket</label>                               
                                            <a name="add" id="" class="me-4 btn text-success add"><i class="fa-solid fa-circle-plus fa-xl"></i></a>
                                        </div>
                                        <div class="col-12 px-2 f-1">
                                        <table class="table border-0 dynamic_field" id="" >  
                                                                             
                                        </table> 
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit"class="btn text-white" style="background-color:rgba(7, 200, 49, 1)" name="simpanEdit">Simpan Produk</button>
                            
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
       
       </div>
    </div>
</div>
<?php include "footer.php"?>