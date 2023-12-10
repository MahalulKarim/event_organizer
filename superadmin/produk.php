<?php include "header.php"?>
<div class="container">
    <div class="row">
    <div class="col-12 mb-4 pt-3 d-flex justify-content-end">
        <a href="produkCreate.php" class="btn text-white" style="background-color:rgba(7, 200, 49, 1)">Tambah Produk</a>
    </div>
       <div class="col-12 mb-4 pt-3">
            <div class="row">
                
            </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <table id="example" class="table fs-14" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Deskripsi</th>                                    
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $no=1;
                                $query="SELECT * FROM produk ";
                                $result=mysqli_query($db,$query);
                                while ($data=mysqli_fetch_array($result))                      
                                {?>
                                <tr>
                                    <td><?=$no++?></td>
                                    <td><?=$data['nama']?></td>
                                    <td>
                                        <ul>
                                        <?php 
                                                $idProduk=$data['id'];
                                                $query2="SELECT deskripsi FROM deskripsi_produk WHERE produk_id='$idProduk'";
                                                $result2=mysqli_query($db,$query2);
                                                while ($data2=mysqli_fetch_array($result2))                      
                                                {?>
                                                    <li><?=$data2['deskripsi']?></li>
                                            <?php 
                                            }?>
                                        </ul>
                                    </td>
                                    
                                    <td class="text-center">
                                        <a  href="produkEdit.php?id=<?=$data['id']?>" class="text-primary text-decoration-none"><i class="fa-solid fa-eye"></i></a>
                                        <a href="" class="text-danger text-decoration-none" data-bs-toggle="modal" data-bs-target="#deletModal<?=$data['id']?>"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                   

                                    <!-- Modal Delete-->
                                    <div class="modal fade" id="deletModal<?=$data['id']?>" tabindex="-1" aria-labelledby="deletModal<?=$data['id']?>Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-12 py-2">
                                                            <h6 class="text-center">Yakin Hapus Produk <?=$data['nama']?> ?</h6>
                                                        </div>
                                                        <div class="col-12 d-flex justify-content-between">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                            <a href="produkDelete.php?id=<?=$data['id']?>" class="btn btn-danger">Ya</a>
                                                           
                                                        </div>
                                                    </div>
                                                </div>                                           
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Modal Delete-->
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
</div>
<?php include "footer.php"?>