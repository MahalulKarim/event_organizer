<?php
include "../koneksi.php";
if(isset($_POST['simpan'])){

    $nama=$_POST['nama'];
    $harga=$_POST['harga'];
    $deskripsi=$_POST['deskripsi'];

    $foto=$_FILES['gambar']['name'];
	$tmp=$_FILES['gambar']['tmp_name'];

    if(empty($foto)){
        $query="INSERT INTO produk SET nama='$nama', harga='$harga', deskripsi='$deskripsi'";
        $result=mysqli_query($db,$query);
        if($result){
            ?>
				<script type="text/javascript">
				alert('Berhasil Simpan Data!');
				window.location='product.php';
				</script>

				<?php
        }
    }else{

        $kode=rand(100,300);
		    $fotobaru='product'.$kode.$foto;
            $path = "../asset/img/product/".$fotobaru;
                if (move_uploaded_file($tmp, $path)) {
                    $query="INSERT INTO produk SET nama='$nama', harga='$harga', deskripsi='$deskripsi', gambar='$fotobaru'";
                    $result=mysqli_query($db,$query);
                    if($result){
                        ?>
                            <script type="text/javascript">
                            alert('Berhasil Simpan Data!');
                            window.location='product.php';
                            </script>
            
                            <?php
                    }else{
                        echo "324234";
                    }
                }else{
                    echo "upload gagal";
                }

    }


}elseif(isset($_POST['simpanEdit'])){
    // edit
    $id=$_POST['id'];
    $nama=$_POST['nama'];
    $harga=$_POST['harga'];
    $deskripsi=$_POST['deskripsi'];

    $foto=$_FILES['gambar']['name'];
	$tmp=$_FILES['gambar']['tmp_name'];

    if(empty($foto)){
        $query="UPDATE produk SET nama='$nama', harga='$harga', deskripsi='$deskripsi' WHERE id=$id";
        $result=mysqli_query($db,$query);
        if($result){
            ?>
				<script type="text/javascript">
				alert('Berhasil Simpan Data!');
				window.location='product.php';
				</script>

				<?php
        }
    }else{

        $kode=rand(100,300);
		    $fotobaru='product'.$kode.$foto;
            $path = "../asset/img/product/".$fotobaru;
                if (move_uploaded_file($tmp, $path)) {

                    $query1="SELECT gambar FROM produk WHERE id='$id'";
                    $result1=mysqli_query($db,$query1);
                    $data1=mysqli_fetch_array($result1);
                    if(is_file("../asset/img/product/".$data1['gambar']))
                      unlink("../asset/img/product/".$data1['gambar']);


                    $query="UPDATE produk SET nama='$nama', harga='$harga', deskripsi='$deskripsi', gambar='$fotobaru' WHERE id=$id";
                    $result=mysqli_query($db,$query);
                    if($result){
                        ?>
                            <script type="text/javascript">
                            alert('Berhasil Simpan Data!');
                            window.location='product.php';
                            </script>
            
                            <?php
                    }
                }else{
                    echo "upload gagal";
                }

    }
    // /edit
}else{
    echo "Not";

}
