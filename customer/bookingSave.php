<?php
include "../koneksi.php";
if(isset($_POST['simpan'])){
    
    $user_id=$_POST['user_id'];
    $produk_id=$_POST['produk_id'];
    $harga=$_POST['harga'];
    $mulai=$_POST['mulai'];
    $selesai=$_POST['selesai'];
    $alamat=$_POST['alamat'];
    $deskripsi=$_POST['deskripsi'];
    $number = count($_POST["deskripsi"]);  

    // $nilai=($diskon/100)*$harga;
   
    $bayar_awal=(50/100)*$harga;
    
    $tgl_sekarang = date('Y-m-d');
    $tgl_mulai = date('Y-m-d', strtotime($tgl_sekarang. ' + 7 days'));
    if ($mulai < $tgl_mulai) { ?>
                      <script type="text/javascript">
                           alert('Booking Gagal, Silahkan lakukan booking minimal 7 hari sebelum acara!');
                           window.location='index.php';
                      </script>
                     <?php
    }elseif($selesai < $tgl_mulai){ ?>
        <script type="text/javascript">
             alert('Booking Gagal, Rentang hari (selesai booking) tidak boleh kurang dari Tanggal Mulai Booking!');
             window.location='index.php';
        </script>
       <?php
    } else {
        if($number > 0)  
            {  
                $query = "INSERT INTO booking SET produk_id='$produk_id', user_id='$user_id', tgl_booking='$tgl_sekarang', mulai='$mulai', selesai='$selesai', total_bayar='$harga',bayar_awal='$bayar_awal',bukti_bayar='', alamat='$alamat',keterangan='',status=0";
                $result=mysqli_query($db,$query);
                if($result){
                    $query2="SELECT id FROM booking WHERE id IN (SELECT MAX(id) FROM booking)";
                    $result2=mysqli_query($db,$query2);
                    $data2=mysqli_fetch_array($result2);
                    $idBooking=$data2['id'];
                    if ($result2) {
                        // $no=1;
                        for($i=0;$i<$number;$i++)  
                        {  
                            if(trim($_POST["deskripsi"][$i] != ''))  
                            {  
                                // echo $deskripsi[$i];
                                $query3 = "INSERT INTO deskripsi_booking SET booking_id='$idBooking', deskripsi='$deskripsi[$i]'";
                                $result3=mysqli_query($db,$query3);
                            }  
                        
                        
                        }  ?>
                            <script type="text/javascript">
                                alert('Booking Berhasil, Silahkan Tunggu Konfirmasi Dari Admin!');
                                window.location='profil.php';
                            </script>
                            <?php
                    } else {
                        # code...
                    }
                    
                    
                }
                
            
                //jika berhasil input
                    echo "Data Inserted";  
            }  
            else 
            {  
                //jika tidak berhasil
                echo "Please Enter Name";  
            }  
        
    }

   
  


}elseif(isset($_POST['simpanEdit'])){

    $booking_id=$_POST['booking_id'];
    $harga=$_POST['harga'];
    $mulai=$_POST['mulai'];
    $selesai=$_POST['selesai'];
    $alamat=$_POST['alamat'];
    $deskripsi=$_POST['deskripsi'];
    $number = count($_POST["deskripsi"]);  

    // $nilai=($diskon/100)*$harga;
   
    $bayar_awal=(50/100)*$harga;
    

    $tgl_sekarang = date('Y-m-d');
    $tgl_mulai = date('Y-m-d', strtotime($tgl_sekarang. ' + 7 days'));
    if ($mulai < $tgl_mulai) { ?>
                      <script type="text/javascript">
                           alert('Booking Gagal, Silahkan lakukan booking minimal 7 hari sebelum acara!');
                           window.location='profil.php';
                      </script>
                     <?php
    }elseif($selesai < $tgl_mulai){ ?>
        <script type="text/javascript">
             alert('Booking Gagal, Rentang hari (selesai booking) tidak boleh kurang dari Tanggal Mulai Booking!');
             window.location='profil.php';
        </script>
       <?php
    } else {

        if($number > 0)  
        {  
            $query = "UPDATE booking SET mulai='$mulai', selesai='$selesai',keterangan='', alamat='$alamat',status=0 WHERE id='$booking_id'";
            $result=mysqli_query($db,$query);
            if($result){
                $query3 = "DELETE FROM deskripsi_booking WHERE booking_id='$booking_id'";
                $result3=mysqli_query($db,$query3);
                if ($result3) {
                    for($i=0;$i<$number;$i++)  
                    {  
                        if(trim($_POST["deskripsi"][$i] != ''))  
                        {  
                            // echo $deskripsi[$i];
                            $query4 = "INSERT INTO deskripsi_booking SET booking_id='$booking_id', deskripsi='$deskripsi[$i]'";
                            $result4=mysqli_query($db,$query4);
                         
                            
                        }  
                    
                    
                    } 
    
    
                   
                    ?>
                    <script type="text/javascript">
                        alert('Booking Berhasil, Silahkan Tunggu Konfirmasi Dari Admin!');
                        window.location='profil.php';
                    </script>
                    <?php
                } else {
                    # code...
                }
    
    
    
                 
              
                
                
            }
            
           
             //jika berhasil input
                echo "Data Inserted";  
        }  
        else 
        {  
             //jika tidak berhasil
             echo "Please Enter Name";  
        }  

    }


   
  
    // /edit
}elseif(isset($_POST['bayar'])){
    $booking_id=$_POST['booking_id'];
    $tglBayar=$_POST['tgl_bayar'];
    $foto=$_FILES['bukti_bayar']['name'];
	$tmp=$_FILES['bukti_bayar']['tmp_name'];

    $query2="SELECT tgl_booking FROM booking WHERE id='$booking_id'";
    $result2=mysqli_query($db,$query2);
    $data2=mysqli_fetch_array($result2);
    if($tglBayar < $data2['tgl_booking']){
        ?>
        
        <script type="text/javascript">
        alert('Pembayaran Gagal!, tanggal bayar tidak boleh kurang dari tanggal booking');
        window.location='profil.php';
        </script>

        <?php
    }else{

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

                        $query="UPDATE booking SET bukti_bayar='$fotobaru',tgl_bayar='$tglBayar',status=3 WHERE id='$booking_id'";
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





}elseif(isset($_GET['selesai'])){
    $idBooking=$_GET['selesai'];
    $query="UPDATE booking SET status='7' WHERE id='$idBooking'";
                    $result=mysqli_query($db,$query);
                    if($result){
                        ?>
                            <script type="text/javascript">
                            alert('Booking Selesai');
                            window.location='profil.php';
                            </script>
            
                            <?php
                    }else{
                        echo "324234";
                    }

}else{
    echo "Tidak";
}
