<?php
include "../koneksi.php";
if(isset($_GET['id'])){
    $id=$_GET['id'];
   

    $query1="SELECT avatar FROM user WHERE id='$id'";
                    $result1=mysqli_query($db,$query1);
                    $data1=mysqli_fetch_array($result1);
                    if(is_file("../asset/img/avatar/".$data1['avatar']))
                      unlink("../asset/img/avatar/".$data1['avatar']);

                    $query="DELETE FROM user WHERE id='$id'";
                    $result=mysqli_query($db,$query);
                    if($result){
                        ?>
                            <script type="text/javascript">
                            alert('User Berhasil Dihapus!');
                            window.location='user.php';
                            </script>
            
                            <?php
                    }else{
                        ?>
                            <script type="text/javascript">
                            alert('User Tidak Dapat Dihapus!');
                            window.location='user.php';
                            </script>
            
                            <?php
                    }


}