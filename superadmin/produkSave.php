<?php
include "../koneksi.php";
if(isset($_POST['simpan'])){
    $nama=$_POST['nama'];
    $harga=$_POST['harga'];
    $deskripsi=$_POST['deskripsi'];
    $number = count($_POST["deskripsi"]);  
    
   
    if($number > 0)  
    {  
        $query = "INSERT INTO produk SET nama='$nama', harga='$harga'";
        $result=mysqli_query($db,$query);
        
        if($result){
            $query2="SELECT id FROM produk WHERE id IN (SELECT MAX(id) FROM produk)";
            $result2=mysqli_query($db,$query2);
            $data2=mysqli_fetch_array($result2);
            $idProduk=$data2['id'];
            
        }
        
        // $no=1;
         for($i=0; $i<$number; $i++)  
         {  
            // echo $deskripsi[$i];
              if(trim($_POST["deskripsi"][$i] != ''))  
              {  
                $query3 = "INSERT INTO deskripsi_produk SET produk_id='$idProduk', deskripsi='$deskripsi[$i]'";
                $result3=mysqli_query($db,$query3);
              }  
          
           
        }  ?>
            <script type="text/javascript">
                alert('Berhasil Input Data!');
                window.location='produk.php';
            </script>
            <?php
         //jika berhasil input
            echo "Data Inserted";  
    }  
    else 
    {  
         //jika tidak berhasil
         echo "Please Enter Name";  
    }  

    // $nama=$_POST['nama'];
    // $harga=$_POST['harga'];
    // $deskripsi=$_POST['deskripsi'];

    // $foto=$_FILES['gambar']['name'];
	// $tmp=$_FILES['gambar']['tmp_name'];

  


}elseif(isset($_POST['simpanEdit'])){
    $produkId=$_POST['produk_id'];
    $nama=$_POST['nama'];
    $harga=$_POST['harga'];
     
    
    if(isset($_POST['deskripsi'])){
        $deskripsi=$_POST['deskripsi'];
        $number = count($_POST["deskripsi"]); 
        if($number > 0)  
        {  
    
    
            $query = "UPDATE produk SET nama='$nama', harga='$harga' WHERE id='$produkId'";
            $result=mysqli_query($db,$query);
            
            if($result){
                $query2 = "DELETE FROM deskripsi_produk WHERE produk_id='$produkId'";
                $result2=mysqli_query($db,$query2);
                if($result2){
    
                     // $no=1;
                            for($i=0; $i<$number; $i++)  
                            {  
                                if(trim($_POST["deskripsi"][$i] != ''))  
                                {  
                                    $query3 = "INSERT INTO deskripsi_produk SET produk_id='$produkId', deskripsi='$deskripsi[$i]'";
                                    $result3=mysqli_query($db,$query3);
                                }  
                            
                            
                            }  ?>
                                <script type="text/javascript">
                                    alert('Berhasil Input Data!');
                                    window.location='produk.php';
                                </script>
                                <?php
                            //jika berhasil input
                                echo "Data Inserted";  
                        }  
                        else 
                        {  
                            //jika tidak berhasil
                            echo "Please Enter Name";  
                        }  
    
                }else{
    
                }
                
            }else{?>
                <script type="text/javascript">
                    let id = <?php echo json_encode($produkId); ?>;
                    alert('Gagal Edit Produk, Deskripsi Tidak Boleh Kosong!');
                    window.location='produkEdit.php?id='+id;
                </script>
                <?php
    
            }
        
       
    }else{
        ?>
        <script type="text/javascript">
            let id = <?php echo json_encode($produkId); ?>;
            alert('Gagal Edit Produk, Deskripsi Tidak Boleh Kosong!');
            window.location='produkEdit.php?id='+id;
        </script>
        <?php
       

    }
   
   
        
       

    // /edit
}else{
    echo "Not";

}
