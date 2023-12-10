<?php include "header.php"?>
<div class="container">
    <?php 
        if(isset($_GET['id'])){
            $idBooking=$_GET['id'];
            $query="SELECT b.*,p.nama as pnama,p.harga,u.nama as unama,u.id as uid, u.avatar,u.jenis_kelamin,u.email,u.no_hp,u.alamat as ualamat FROM booking b, produk p,user u WHERE p.id=b.produk_id AND u.id=b.user_id AND b.id='$idBooking'";
            $result=mysqli_query($db,$query);
            $data=mysqli_fetch_array($result);
        }
    ?>
    <div class="row">
        <div class="col-12 mb-4 pt-3">
            <div class="row">
                <div class="col-lg-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 d-flex justify-content-center">
                                    <img src="../asset/img/avatar/<?=$data['avatar']?>" alt="" style="width:100px;height:100px;border-radius:50%">
                                </div>
                                <div class="col-12  pt-2">
                                <div class="d-grid gap-2">
                                    <!-- <a href="" class="btn btn-danger btn-sm">Hapus User</a> -->
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <form action="">
                                    <div class="col-12">
                                        <div class="input-field-border-bottom f-1">
                                            <div class="mb-1">
                                                <input type="text" id="" placeholder="Nama" name="name" value="<?=$data['unama']?>" required readonly/>
                                            </div>
                                            <div class="mb-1">
                                                <input type="text" id="" placeholder="Nama" name="name" value="<?=$data['jenis_kelamin']?>" required readonly/>
                                            </div>
                                           
                                            <div class="mb-1">
                                                <input type="email" id="" placeholder="Email" name="email" value="<?=$data['email']?>"  required readonly/>
                                            </div>
                                            <div class="mb-1">
                                                <input type="number" id="" placeholder="Nomor Hp" name="phone" value="<?=$data['no_hp']?>"  required readonly/>
                                            </div>
                                            <div class="mb-2">
                                                <textarea  class="input-field-border-bottom" name="message" id="" cols="10" rows="1" placeholder="Alamat" required readonly><?=$data['ualamat']?></textarea>
                                            </div>
                                            <div class="mb-1">
                                               
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
                <h6 class="fs-24 f-1"><b>Booking</b></h6>
            </div>
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <form action="bookingAcc.php" method="POST">
                        <input type="hidden" name="booking_id" value="<?=$data['id']?>">
                        <div class="row">
                            <div class="col-lg-12">
                                <table  class="table f-1">
                                    <tbody>
                                        <tr>
                                            <td width="15%">Id Booking</td>
                                            <td width="40%"><?=$data['id']?></td>
                                            <td>Status Booking</td>
                                            <td>
                                            <?php
                                                    if ($data['status']==0) {?>
                                                        <p class="badge bg-secondary">Menunggu Konfirmasi</p>                                                    
                                                    <?php
                                                    } elseif($data['status']==1) {?>
                                                        <p class="badge bg-warning">Booking Penuh</p>                                                    
                                                        <?php
                                                    }elseif($data['status']==2){ ?>
                                                        <p class="badge bg-info">Booking Dikonfirmasi / Menunggu Pembayaran</p>                                                    
                                                        <?php

                                                    }elseif($data['status']==3){ ?>
                                                        <p class="badge bg-danger">Menunggu Konfirmasi Pembayaran</p>                                                    
                                                        <?php

                                                    }elseif($data['status']==4){?>
                                                        <p class="badge bg-info">Booking Dan Pembayaran Dikonfirmasi</p>                                                    
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
                                        </tr>
                                        <tr>
                                            <td>Produk</td>
                                            <td colspan="3"><?=$data['pnama']?></td>
                                        </tr>
                                        <tr>
                                            <td>Harga Awal Produk</td>
                                            <td colspan="3">Rp. <?=number_format($data['harga']) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tgl Booking</td>
                                            <td colspan="3"><?=date('d-M-Y', strtotime($data['mulai']))?> s/d <?=date('d-M-Y', strtotime($data['selesai']))?></td>
                                        </tr>
                                       
                                        <tr>
                                            <td>Total DP</td>
                                            <td colspan="3"> <span id="dp">Rp. <?=number_format($data['bayar_awal']) ?></span><small class="text-danger"> (50% dari Total Bayar)</small></td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Total Bayar</td>
                                            <td colspan="3">
                                                <?php
                                            if ($data['status']==0) {?>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-addon1">Rp. </span>
                                                            <input type="number" name="total_bayar"  id="t_bayar" class="form-control form-control-sm" placeholder="Masukkan Total Bayar" aria-label="" aria-describedby="basic-addon1" required  value="<?=$data['total_bayar']?>">
                                                        </div>                                                
                                                    <?php }else{?>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-addon1">Rp. </span>
                                                            <input type="number" name="total_bayar"  id="t_bayar" class="form-control form-control-sm" placeholder="Masukkan Total Bayar" aria-label="" aria-describedby="basic-addon1" required  value="<?=$data['total_bayar']?>" readonly disabled>
                                                        </div>                                                    

                                                    <?php } ?>
                                        </td>
                                        </tr>
                                         
                                        <tr>
                                            <td>Deskripsi/Request</td>
                                            <td colspan="3">
                                                <ol>
                                                    <?php
                                                        $idBooking=$data['id'];
                                                        $query2="SELECT deskripsi FROM deskripsi_booking WHERE booking_id='$idBooking'";
                                                        $result2=mysqli_query($db,$query2);
                                                        while ($data2=mysqli_fetch_array($result2))                      
                                                            {
                                                    ?>
                                                    <li>
                                                        <?=$data2['deskripsi']?>
                                                    </li>
                                                    
                                                    <?php }?>
                                                </ol>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Alamat Booking</td>
                                            <td colspan="3"><?=$data['alamat']?></td>
                                        </tr>
                                        <tr>
                                            <td>Keterangan</td>
                                            <td colspan="3">
                                                <p>
                                                    <?=nl2br(str_replace('', '', htmlspecialchars($data['keterangan'])))?>
                                                </p>
                                            </td>
                                        </tr>
                                        <?php
                                            if($data['status']==3 ||$data['status']==4 ||$data['status']==7){?>
                                        <tr>
                                            <td>Bukti Bayar</td>
                                            <td>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#bayar<?=$data['id']?>">
                                                    <img src="../asset/img/bayar/<?=$data['bukti_bayar']?>" alt="" style="width:140px;">
                                                </a>
                                            </td>
                                        </tr>
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
                                                                    <?php
                                                                        if($data['status']==3){?>
                                                                        
                                                                        <a href="validasiPembayaran.php?id=<?=$data['id']?>" class="btn btn-primary">Validasi Pembayaran</a>
                                                                        <?php

                                                                        }else{?>
                                                                         <p class="badge bg-info">Booking Dan Pembayaran Dikonfirmasi</p>  
                                                                        <?php }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>      
                                            
                                            <?php

                                            }else{

                                            }
                                        ?>
                                    </tbody>

                                </table>
                            </div>
                            <div class="col-lg-12 d-flex justify-content-end f-1 align-items-center">
                            <?php
                                        if ($data['status']==0) {?>



                                        <a href="" class="btn btn-outline-danger me-4" data-bs-toggle="modal" data-bs-target="#tolak">Booking Penuh</a>
                                        <button type="submit" name="terima" class="btn bg-1 text-white" style=" background-color: rgba(24, 58, 29, 1);">Terima Booking</button>
                                        
                                        <?php }else{


                                        }?>
                            </div>
                        </div>
                        
                        </form>
                    </div>

         

                            <!-- Modal -->
                            <div class="modal fade" id="tolak" tabindex="-1" aria-labelledby="tolakLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="tolakLabel">Booking Penuh</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="bookingAcc.php" method="POST">
                                    <input type="hidden" name="booking_id" value="<?=$data['id']?>">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-2">
                                                    <label for="">Keterangan</label>
                                                    <textarea name="ket" cols="30" rows="5" class="form-control" placeholder="Tulis Disini"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <hr>
                                            </div>
                                            <div class="col-12 d-flex justify-content-between">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" name="tolak" class="btn btn-primary">Kirim</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                </div>
                            </div>
                            </div>
                            <!-- /Modal -->

                </div>
            </div>
    </div>
</div>
<?php include "footer.php"?>