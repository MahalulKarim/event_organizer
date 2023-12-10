<?php
include "../koneksi.php";
if(isset($_POST['simpan'])){

    $id_product=$_POST['id'];
   
    $foto=$_FILES['gambar']['name'];
	$tmp=$_FILES['gambar']['tmp_name'];


        $kode=rand(100,300);
		    $fotobaru='product'.$kode.$id_product.$foto;
            $path = "../asset/img/product/".$fotobaru;
                if (move_uploaded_file($tmp, $path)) {
                    $query="INSERT INTO galleri SET id_produk='$id_product', gambar='$fotobaru'";
                    $result=mysqli_query($db,$query);
                    if($result){
                        ?>
                            <script type="text/javascript">
                            alert('Gambar Berhasil Ditambahkan!');
                            window.location='gallery.php';
                            </script>
            
                            <?php
                    }else{
                        echo "324234";
                    }
                }else{
                    echo "upload gagal";
                }



}elseif(isset($_POST['simpanEditGallery'])){
    // edit
    $id_product=$_POST['id'];
    $id_product_p=$_POST['id_product'];
   
    $foto=$_FILES['gambar']['name'];
	$tmp=$_FILES['gambar']['tmp_name'];

   
        $kode=rand(100,300);
		    $fotobaru='product'.$kode.$id_product_p.$foto;
            $path = "../asset/img/product/".$fotobaru;
                if (move_uploaded_file($tmp, $path)) {

                    $query1="SELECT gambar FROM galleri WHERE id='$id_product'";
                    $result1=mysqli_query($db,$query1);
                    $data1=mysqli_fetch_array($result1);
                    if(is_file("../asset/img/product/".$data1['gambar']))
                      unlink("../asset/img/product/".$data1['gambar']);


                      $query="UPDATE galleri SET gambar='$fotobaru' WHERE id=$id_product";
                      $result=mysqli_query($db,$query);
                       
                        if($result){
                            ?>
                                <script type="text/javascript">
                                alert('Gambar Berhasil Diubah!');
                                window.location='gallery.php';
                                </script>
                
                                <?php
                        }
                }else{
                    echo "upload gagal";
                }

    // /edit
}else{
    echo "Not";

}
