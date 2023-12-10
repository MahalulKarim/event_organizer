<?php
include "../koneksi.php";
if(isset($_FILES['avatar'])){
    $user_id=$_POST['user_id'];
    $foto=$_FILES['avatar']['name'];
	$tmp=$_FILES['avatar']['tmp_name'];
    
    if(empty($foto)){
        
                ?>
        
				<script type="text/javascript">
				alert('Tidak ada foto dipilih!');
				window.location='profil.php';
				</script>

				<?php
       
    }else{

        $kode=rand(100,300);
		    $fotobaru='user'.$kode.$foto;
            $path = "../asset/img/avatar/".$fotobaru;
                if (move_uploaded_file($tmp, $path)) {

                    $query1="SELECT avatar FROM user WHERE id='$user_id'";
                    $result1=mysqli_query($db,$query1);
                    $data1=mysqli_fetch_array($result1);
                    if(is_file("../asset/img/avatar/".$data1['avatar']))
                      unlink("../asset/img/avatar/".$data1['avatar']);

                    $query="UPDATE user SET avatar='$fotobaru' WHERE id='$user_id'";
                    $result=mysqli_query($db,$query);
                    if($result){
                        ?>
                            <script type="text/javascript">
                            alert('Berhasil update foto profil');
                            window.location='profil.php';
                            </script>
            
                            <?php
                    }else{
                        echo "324234";
                    }
                }else{
                    echo "upload gagal";
                }

    }

   echo "yes";
  


}elseif(isset($_POST['simpan'])){
    // edit
    $user_id=$_POST['user_id'];
    $nama=$_POST['nama'];
    $jk=$_POST['jk'];
    $email=$_POST['email'];
    $no_hp=$_POST['no_hp'];
    $alamat=$_POST['alamat'];

    $query2="SELECT * FROM user WHERE id='$user_id' || email='$email'";
		 $result2=mysqli_query($db,$query2);
		 if (mysqli_num_rows($result2)>1) {
            ?>
                <script type="text/javascript">
				alert('Gagal Update Profil!, Email sudah dipakai di akun lain');
				window.location='profil.php';
				</script>

         <?php

          

         }else{

            $query="UPDATE user SET nama='$nama', jenis_kelamin='$jk', email='$email', no_hp='$no_hp', alamat='$alamat' WHERE id='$user_id'";
            $result=mysqli_query($db,$query);
            if($result){
                ?>
                    <script type="text/javascript">
                    alert('Berhasil Update Profil!');
                    window.location='profil.php';
                    </script>
    
                    <?php
                }else{
        
                }

          }


       

    
}else{
    echo "Not";

}
