<?php
include "../koneksi.php";
if(isset($_GET['id'])){
    $id=$_GET['id'];
   
      $query="DELETE FROM produk WHERE id=$id";
      $result=mysqli_query($db,$query);
      if($result){
        $query2="DELETE FROM deskripsi_produk WHERE produk_id=$id";
        $result2=mysqli_query($db,$query2);
        if($result2){
        ?>
            <script type="text/javascript">
            alert('Berhasil Hapus Data!');
            window.location='produk.php';
            </script>

            <?php
            
        }

    }
}