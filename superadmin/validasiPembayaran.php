<?php 
include "../koneksi.php";
if(isset($_GET['id'])){
    $idBooking=$_GET['id'];
    $query="UPDATE booking SET status='4' WHERE id='$idBooking'";
                    $result=mysqli_query($db,$query);
                    if($result){
                        ?>
                            <script type="text/javascript">
                            alert('Pembayaran Berhasil Divalidasi');
                            window.location='booking.php';
                            </script>
            
                            <?php
                    }else{
                        echo "324234";
                    }

}else{
    echo "Not";

}