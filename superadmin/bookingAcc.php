<?php
include "../koneksi.php";
if(isset($_POST['terima'])){
    
    $booking_id=$_POST['booking_id'];
    $totalBayar=$_POST['total_bayar'];
   
    $bayar_awal=(50/100)*$totalBayar;
    
   
        $query = "UPDATE booking SET total_bayar='$totalBayar', bayar_awal='$bayar_awal',status=2 WHERE id='$booking_id'";
        $result=mysqli_query($db,$query);
        if($result){
           ?>
                    <script type="text/javascript">
                        let id = <?php echo json_encode($booking_id); ?>;
                        alert('Booking Berhasil diterima!');
                        window.location="bookingDetail.php?id="+ id;
                    </script>
                    <?php
           
            
            
        }else{
            die('invalid Query : ' . mysqli_error($db));
        }
        
       
    
  


}elseif(isset($_POST['tolak'])){

    $booking_id=$_POST['booking_id'];
    $ket=$_POST['ket'];
  

    
   
    $query = "UPDATE booking SET keterangan='$ket', status=1 WHERE id='$booking_id'";
        $result=mysqli_query($db,$query);
        if($result){
           ?>
                    <script type="text/javascript">
                        let id = <?php echo json_encode($booking_id); ?>;
                        alert('Booking Penuh!');
                        window.location="bookingDetail.php?id="+ id;
                    </script>
                    <?php
           
            
            
        }else{
            echo "sss";
        } 
    // /edit
}elseif(isset($_POST['bayar'])){
    $booking_id=$_POST['booking_id'];
    $tglBayar=$_POST['tgl_bayar'];
    $foto=$_FILES['bukti_bayar']['name'];
	$tmp=$_FILES['bukti_bayar']['tmp_name'];
    
    if(empty($foto)){
        
                ?>
        
				<script type="text/javascript">
				alert('Tidak ada foto dipilih!');
				window.location='profil.php';
				</script>

				<?php
       
    }else{

        $kode=rand(100,300);
		    $fotobaru='Bayar'.$kode.$foto.$booking_id;
            $path = "../asset/img/bayar/".$fotobaru;
                if (move_uploaded_file($tmp, $path)) {

                    $query1="SELECT bukti_bayar FROM booking WHERE id='$booking_id'";
                    $result1=mysqli_query($db,$query1);
                    $data1=mysqli_fetch_array($result1);
                    if(is_file("../asset/img/bayar/".$data1['bukti_bayar']))
                      unlink("../asset/img/bayar/".$data1['bukti_bayar']);

                    $query="UPDATE booking SET bukti_bayar='$fotobaru',tgl_bayar='$tglBayar',status='3' WHERE id='$booking_id'";
                    $result=mysqli_query($db,$query);
                    if($result){
                        ?>
                            <script type="text/javascript">
                            alert('Berhasil Upload Bukti Bayar, Silahkan tunggu konfirmasi dari admin');
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
  

}elseif(isset($_GET['batal_id'])){
    $idBooking=$_GET['batal_id'];
    $query="UPDATE booking SET status='6' WHERE id='$idBooking'";
                    $result=mysqli_query($db,$query);
                    if($result){
                        ?>
                            <script type="text/javascript">
                            alert('Booking Dibatalkan');
                            window.location='profil.php';
                            </script>
            
                            <?php
                    }else{
                        echo "324234";
                    }

}else{
    echo "Not";

}
