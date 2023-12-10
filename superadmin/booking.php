<?php include "header.php"?>
<div class="container">
    <div class="row">
       <div class="col-12 mb-4 pt-3">
            <?php
            $n=1;

            $batas = 6;
            $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
            $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	

            $previous = $halaman - 1;
            $next = $halaman + 1;

            $data_booking = mysqli_query($db,"SELECT b.*,u.nama as unama,u.alamat as ualamat,u.no_hp,p.nama as pnama FROM booking b,user u, produk p WHERE u.id=b.user_id AND p.id=b.produk_id ORDER BY b.mulai ASC");
			$jumlah_data = mysqli_num_rows($data_booking);
			$total_halaman = ceil($jumlah_data / $batas);
 
			$data_booking = mysqli_query($db,"SELECT b.*,u.nama as unama,u.alamat as ualamat,u.no_hp,p.nama as pnama FROM booking b,user u, produk p WHERE u.id=b.user_id AND p.id=b.produk_id ORDER BY b.mulai ASC LIMIT $halaman_awal, $batas ");

            $data_pertama = mysqli_query($db, "SELECT * FROM booking ORDER BY mulai ASC LIMIT $halaman_awal, 1");
            $row_pertama = mysqli_fetch_array($data_pertama);
			$nomor = $halaman_awal+1;
            ?>
           

        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <h3 class="my-auto me-2"><?php 
                if($row_pertama==null){

                }else{
                   echo bulanIndonesia(date('m', strtotime($row_pertama['mulai'])));

                }
                ?></h3>
          
                <a <?php if($halaman > 1){ echo "href='?halaman=$previous'"; }else{} ?> class="btn me-2" style="border:1px solid black;border-radius:50%;padding:6px 13px"><i class="fa-solid fa-chevron-left"></i></a>
                <a <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?> class="btn" style="border:1px solid black;border-radius:50%;padding:6px 13px"><i class="fa-solid fa-chevron-right"></i></a>
            </div>
            <div class="col-12 pt-4">
                <div class="row px-3">
                <?php
                while($d = mysqli_fetch_array($data_booking)){
                    $n++
                        ?>
                            <div class="col-2 px-0">
                                <a href="bookingDetail.php?id=<?=$d['id']?>" class="text-dark text-decoration-none">
                                <div class="card">
                                    <div class="card-header bg-white">
                                        <p class="text-center opacity-75"><?=hariIndonesia(date('l', strtotime($d['mulai'])))?></p>
                                        <h4 class="text-center" style="margin-top:-13px"><?php echo $nomor++; ?><h4>
                                    </div>
                                    <div class="card-body bg-light px-1 py-5">
                                        <div class="card " <?php if($n%2 == 0){ echo "style=' border-left:5px solid rgba(24, 58, 29, 1)!important;'"; }else{ echo "style=' border-left:5px solid rgba(240, 160, 75, 1)!important;'";} ?>>
                                            <div class="card-body">
                                                <div class="row fs-12 px-0">
                                                    <div class="col-12 bg-white fs-12">
                                                        <p class="opacity-75">Nama:</p>
                                                        <p style="margin-top:-20px"><?=$d['unama']?></p>
                                                    </div>
                                                    <div class="col-12 bg-white fs-12">
                                                        <p class="opacity-75">Alamat:</p>
                                                        <p style="margin-top:-20px"><?=$d['ualamat']?></p>
                                                    </div>
                                                    <div class="col-12 bg-white fs-12">
                                                        <p class="opacity-75">Alamat Acara:</p>
                                                        <p style="margin-top:-20px"><?=$d['alamat']?></p>
                                                    </div>
                                                    <div class="col-12 bg-white fs-12">
                                                        <p class="opacity-75">Nomor Telepon/WA:</p>
                                                        <p style="margin-top:-20px"><?=$d['no_hp']?></p>
                                                    </div>
                                                    <div class="col-12 bg-white fs-12">
                                                        <p class="opacity-75">Nama Paket Produk:</p>
                                                        <p style="margin-top:-20px"><?=$d['pnama']?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            </div>
                            <?php
                    }
                    
                    
                    ?>
                </div>
            </div>
        </div>


				<?php 

                function bulanIndonesia($bulan)
                {
                    $bulanIndo = [
                        '01' => 'Januari',
                        '02' => 'Februari',
                        '03' => 'Maret',
                        '04' => 'April',
                        '05' => 'Mei',
                        '06' => 'Juni',
                        '07' => 'Juli',
                        '08' => 'Agustus',
                        '09' => 'September',
                        '10' => 'Oktober',
                        '11' => 'November',
                        '12' => 'Desember'
                    ];

                    return $bulanIndo[$bulan];
                }
                // Fungsi untuk mengonversi nama hari bahasa Inggris ke bahasa Indonesia
                function hariIndonesia($hari)
                {
                    $hariIndo = [
                        'Sunday'    => 'Minggu',
                        'Monday'    => 'Senin',
                        'Tuesday'   => 'Selasa',
                        'Wednesday' => 'Rabu',
                        'Thursday'  => 'Kamis',
                        'Friday'    => 'Jumat',
                        'Saturday'  => 'Sabtu'
                    ];

                    return $hariIndo[$hari];
                }






				?>
		
       
       </div>
    </div>
    <div class="row">
       <div class="col-12 mb-4 pt-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                    <table id="example" class="table fs-14" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Id Booking</th>
                    <th>Produk Booking</th>
                    <th>Tanggal Booking</th>
                    <th>Bukti Bayar</th>
                    <th>Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no=1;
                $userId=$user['id'];
                    $query="SELECT b.*,p.nama AS pnama,p.harga,p.id AS idProduk FROM booking b, produk p WHERE p.id=b.produk_id ORDER BY b.mulai ASC";
                    $result=mysqli_query($db,$query);
                    while ($data=mysqli_fetch_array($result))                      
                    {
                ?>
                <tr>
                    <td><?=$no++?></td>
                    <td>
                        <?=$data['id']?>
                    </td>
                    <td><?=$data['pnama']?></td>
                    <td>
                        <?=date('d-M-Y', strtotime($data['mulai']))?> s/d <?=date('d-M-Y', strtotime($data['selesai']))?>
                    </td>
                    <td class="text-center">
                    <?php
                        if ($data['status']==0) {?>
                                                                              
                    <?php
                        } elseif($data['status']==1) {?>
                                                                          
                    <?php
                        }elseif($data['status']==2){ ?>
                                                                          
                    <?php
                        }elseif($data['status']==3){ ?>
                        
                        <!--  -->
                        <a href="#" data-bs-toggle="modal" data-bs-target="#bayar<?=$data['id']?>">Lihat</a>
                        <!--  -->
                         <!-- Modal Bayar -->
                         <div class="modal fade" id="bayar<?=$data['id']?>" tabindex="-1" aria-labelledby="bayarLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="bayarLabel">Bukti Bayar</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-12 d-flex justify-content-center">
                                                    <img src="../asset/img/bayar/<?=$data['bukti_bayar']?>" alt="" style="width:100%;">
                                                </div>
                                                <div class="col-12">
                                                    <hr>
                                                </div>
                                                <div class="col-12 py-2 d-flex justify-content-between">
                                                    <!-- <a  class="btn btn-secondary">Tidak Valid</a> -->
                                                    <a href="validasiPembayaran.php?id=<?=$data['id']?>" class="btn btn-primary">Validasi Pembayaran</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                                                                            <!-- /Modal Bayar -->


                    <?php
                        }elseif($data['status']==4 || $data['status']==7){?>
                        <!--  -->
                        <a href="#" data-bs-toggle="modal" data-bs-target="#bayarKonfirmasi<?=$data['id']?>">Lihat</a>
                        <!--  -->      
                         <!-- Modal Bayar -->
                         <div class="modal fade" id="bayarKonfirmasi<?=$data['id']?>" tabindex="-1" aria-labelledby="bayarLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="bayarLabel">Bukti Bayar</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-12 d-flex justify-content-center">
                                                    <img src="../asset/img/bayar/<?=$data['bukti_bayar']?>" alt="" style="width:100%;">
                                                </div>
                                                <div class="col-12">
                                                    <hr>
                                                </div>
                                                <!-- <div class="col-12 py-2 d-flex justify-content-between">
                                                    <a href="validasiPembayaran.php?id=<?=$data['id']?>" class="btn btn-primary">Validasi Pembayaran</a>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                                                                            <!-- /Modal Bayar -->                                             
                    <?php
                        }elseif($data['status']==5){?>
                                                                           
                    <?php
                        }else{?>                                                  
                    <?php
                        }                                       
                    ?>
                    </td>
                    <td class="text-center">
                    <?php
                        if ($data['status']==0) {?>
                            <p class="badge bg-secondary">Menunggu Konfirmasi</p>                                                    
                    <?php
                        } elseif($data['status']==1) {?>
                        <p class="badge bg-warning">Booking Penuh</p>                                                    
                    <?php
                        }elseif($data['status']==2){ ?>
                        <p class="badge bg-warning">Menunggu Pembayaran</p>                                                    
                    <?php
                        }elseif($data['status']==3){ ?>
                        <p class="badge bg-info">Menunggu Konfirmasi Pembayaran</p>                                                    
                    <?php
                        }elseif($data['status']==4){?>
                        <p class="badge bg-info">Booking Dan Pembayaran Dikonfirmasi<p>                                                    
                    <?php
                        }elseif($data['status']==5){?>
                        <p class="badge bg-danger">Booking Ditolak</p>                                                    
                 
                    <?php
                        }elseif($data['status']==7){?>
                        <p class="badge bg-success">Booking Selesai</p>                                                    
                    <?php
                        }else{?>
                        <p class="badge bg-danger">Booking Dibatalkan</p>                                                    
                    <?php
                        }                                       
                    ?>
                    </td>
                    
                    <td class="text-center">
                    
                        <a href="bookingDetail.php?id=<?=$data['id']?>" class="text-primary text-decoration-none"><i class="fa-solid fa-eye"></i></a>
                    </td>
                </tr>
                <?php } ?>              
            </tbody>
           
        </table>
                    </div>
                </div>
            </div>
        </div>
       
       </div>
    </div>
</div>
<?php include "footer.php"?>