<?php
include "../koneksi.php";

if(isset($_POST['updateProfile'])){

    $id=$_POST['id'];
    $nama=$_POST['nama'];
    $no_hp=$_POST['no_hp'];
    $jenis_kelamin=$_POST['jenis_kelamin'];
    $alamat=$_POST['alamat'];

    $foto=$_FILES['avatar']['name'];
	$tmp=$_FILES['avatar']['tmp_name'];

    if(empty($foto)){
        $query="UPDATE user SET nama='$nama', jenis_kelamin='$jenis_kelamin', no_hp='$no_hp', alamat='$alamat' WHERE id=$id";
        $result=mysqli_query($db,$query);
        if($result){
            ?>
				<script type="text/javascript">
				alert('Berhasil Update Profile!');
				window.location='profil.php';
				</script>

				<?php
        }
    }else{

        $kode=rand(100,300);
		    $fotobaru='avatar'.$kode.$foto;
            $path = "../asset/img/avatar/".$fotobaru;

            if (move_uploaded_file($tmp, $path)) {

                $query1="SELECT avatar FROM user WHERE id='$id'";
                $result1=mysqli_query($db,$query1);
                $data1=mysqli_fetch_array($result1);
                if(is_file("../asset/img/avatar/".$data1['avatar']))
                  unlink("../asset/img/avatar/".$data1['avatar']);


                $query="UPDATE user SET nama='$nama', jenis_kelamin='$jenis_kelamin', no_hp='$no_hp', alamat='$alamat', avatar='$fotobaru' WHERE id=$id";
                $result=mysqli_query($db,$query);
                if($result){
                    ?>
                        <script type="text/javascript">
                        alert('Berhasil Update Profile!');
                        window.location='profil.php';
                        </script>
        
                        <?php
                }else{
                    echo "sakjd";
                }
            }else{
                echo "upload gagal";
            }


               

    }
}elseif(isset($_POST['updatePassword'])){
    $id=$_POST['id'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    
    $query1="SELECT * FROM user WHERE id='$id' || email='$email'";
    $result1=mysqli_query($db,$query1);
	if (mysqli_num_rows($result1)>1) {
      
        ?>
        <script type="text/javascript">
        alert('Gagal Email Sudah Digunakan!');
        window.location='profil.php';
        </script>

        <?php

    }else{
       
          $query="UPDATE user SET email='$email', password='$password' WHERE id=$id";
          $result=mysqli_query($db,$query);
          if($result){
              ?>
                  <script type="text/javascript">
                  alert('Berhasil Update Email dan Password, Silahkan Login Kembali!');
                  window.location='../logout.php';
                  </script>
      
                  <?php
          }
    }


}