<?php include "header.php"?>
<div class="container">
    <div class="row">
   
       <div class="col-12 mb-4 pt-3">
         
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <form action="produkSave.php" method="POST">
                            <div class="col-12">
                                <div class="mb-2">
                                    <label for="">Nama Paket</label>
                                    <input type="text"  name="nama" class="form-control text-center" required placeholder="Masukkan Nama Paket">
                                </div>
                                <div class="mb-2">
                                    <label for="">Harga Paket</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                                        <input type="number" name="harga" required class="form-control" placeholder="Masukkan Harga" aria-label="Masukkan Harga" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                            <label for="">Deskripsi Paket</label>                               
                                <table class="table border-0" id="dynamic_field" >  
                                    <tr style="border-bottom:none!important">  
                                        <td  class="border-0" width="90%">
                                            <input type="text" name="deskripsi[]" required class="form-control text-center" placeholder="Input Deskripsi"/>
                                        </td>  
                                        <td class="border-0">
                                            <a name="add" id="add" class="btn text-success"><i class="fa-solid fa-circle-plus fa-xl"></i></a>
                                        </td>  
                                    </tr>                                    
                                </table> 
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit"class="btn text-white" style="background-color:rgba(7, 200, 49, 1)" name="simpan">Tambah Produk</button>
                            
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
       
       </div>
    </div>
</div>
<?php include "footer.php"?>