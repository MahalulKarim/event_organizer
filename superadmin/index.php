<?php include "header.php"?>
<div class="container">
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-between align-items-center">
                            <div class="">
                                <p class="fs-18 fc2 my-auto">Booking Masuk</p>
                            </div>
                            <div class="">
                                <i class="fa-solid fa-bookmark fs-36 fc1"></i>
                            </div>
                        </div>
                        <div class="col-12 pt-2">
                            <p class="fc2 fs-32"> 
                                <?php $query="SELECT * FROM booking";
                                        $result=mysqli_query($db,$query);
                                        echo $jumlah=mysqli_num_rows($result);
                                ?>    
                            Booking</p>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <a href="booking.php" class="fc2 text-decoration-none">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-between align-items-center">
                            <div class="">
                                <p class="fs-18 fc2 my-auto">Booking Selesai</p>
                            </div>
                            <div class="">
                                <i class="fa-solid fa-bookmark fs-36 fc1"></i>
                            </div>
                        </div>
                        <div class="col-12 pt-2">
                            <p class="fc2 fs-32"> 
                                <?php $query="SELECT * FROM booking WHERE status=7";
                                        $result=mysqli_query($db,$query);
                                        echo $jumlah=mysqli_num_rows($result);
                                ?>   Booking</p>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <a href="booking.php" class="fc2 text-decoration-none">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-between align-items-center">
                            <div class="">
                                <p class="fs-18 fc2 my-auto">Total Nominal</p>
                            </div>
                            <div class="">
                                <i class="fa-solid fa-bookmark fs-36 fc1"></i>
                            </div>
                        </div>
                        <div class="col-12 pt-2 mb-4">
                            
                            <p class="fc2 fs-32">Rp.  
                                <?php 
                                    $total = 0;
                                    $query = "SELECT bayar_awal FROM booking WHERE tgl_bayar IS NOT NULL";
                                    $result = mysqli_query($db, $query);
                                    
                                    while ($data = mysqli_fetch_array($result)) {
                                        $total += $data['bayar_awal'];
                                    }
                                    
                                    echo number_format($total);
                                ?></p>
                        </div>
                        <!-- <div class="col-12 d-flex justify-content-end">
                            <a href="" class="fc2 text-decoration-none">Detail</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"?>