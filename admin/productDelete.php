<?php
include "../koneksi.php";
if(isset($_GET['id'])){
    $id=$_GET['id'];
    
    $query1="SELECT gambar FROM produk WHERE id='$id'";
    $result1=mysqli_query($db,$query1);
    $data1=mysqli_fetch_array($result1);
    if(is_file("../asset/img/product/".$data1['gambar']))
      unlink("../asset/img/product/".$data1['gambar']);
      $query="DELETE FROM produk WHERE id=$id";
      $result=mysqli_query($db,$query);
      if($result){
        ?>
            <script type="text/javascript">
            alert('Berhasil Hapus Data!');
            window.location='product.php';
            </script>

            <?php
    }
}