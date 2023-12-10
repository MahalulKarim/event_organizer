<?php
include "koneksi.php";
if (isset($_POST['login'])) {
    $email   = $_POST['email'];
    $password   = md5($_POST['password']);

    $query = "SELECT * FROM `user` WHERE BINARY email='$email' AND password='$password'";
    $result = mysqli_query($db, $query);
    // $data=mysqli_fetch_array($result);  
    if (mysqli_num_rows($result)<1) {
        # code...
        echo "notfound";
        header("location:loginCustomer.php?pesan=gagal");
    }else{
         $data=mysqli_fetch_array($result);
         
         if ($data['type']=='admin') {
             
            session_start();
            $_SESSION['email']=$data['email'];
            $_SESSION['status']="login";
            $_SESSION['type']="admin";
            header("location:superadmin/index.php");
         }else{
           
            session_start();
            $_SESSION['id']=$data['id'];
            $_SESSION['status']="login";
            $_SESSION['type']="user";
            header("location:customer/index.php");
         }
        
    }
   


}
         
               
         