<?php
include "koneksi.php";
if (isset($_POST['daftar'])) {
    $nama   = $_POST['nama'];
    $email   = $_POST['email'];
    $password   = md5($_POST['password']);

        $query2="SELECT email FROM user WHERE email='$email'";
        $result2=mysqli_query($db,$query2);
        if (mysqli_num_rows($result2)<1) {
             
                $query3="INSERT INTO `user` SET email='$email', password='$password', type='user', nama='$nama'";
                $result3=mysqli_query($db,$query3);
                if($result3){
                    $query = "SELECT * FROM `user` WHERE BINARY email='$email' AND password='$password'";
                    $result = mysqli_query($db, $query);
                    // $data=mysqli_fetch_array($result);  
                    if (mysqli_num_rows($result)<1) {
                        # code...
                        header("location:loginCustomer.php?pesan=gagal");
                    }else{
                         $data=mysqli_fetch_array($result);
                         
                         if ($data['type']=='admin') {
                             
                            session_start();
                            $_SESSION['email']=$data['email'];
                            $_SESSION['status']="login";
                            $_SESSION['type']="admin";
                            header("location:superadmin/profil.php");
                         }else{
                           
                            session_start();
                            $_SESSION['id']=$data['id'];
                            $_SESSION['status']="login";
                            $_SESSION['type']="user";
                            header("location:customer/profil.php?id=1");
                         }
                        
                    }
                }else{
                    echo "no1". mysqli_error($db);
                }
        }else{?>
            <script type="text/javascript">
            alert('Gagal Mendaftar Akun, Email sudah dipakai di akun lain');
            window.location='loginCustomer.php?id=2';
            </script>
        <?php }


  
   


}else{
    echo "No";
}