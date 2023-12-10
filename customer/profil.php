<?php include "header.php"?>
<section style="min-height: 100vh;">
<style>
    .image_upload > input{
    display:none;
  }
  input[type=text]{
    
  
  }
  </style>
    <div class="container">
        <div class="pt-5"></div>
        <div class="pt-4"></div>
       <div class="row">
            <div class="col-12">
                <h6 class="fs-24 f-1  text-center"><b>Profil</b></h6>
            </div>
            <div class="col-lg-2">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center">
                                <?php
                                    if($user['avatar']==null){?>
                                        <img src="../asset/img/avatar/user.png" alt="" style="max-width:143px;max-height:143px;border-radius:50%">
                                        <?php
                                    }else{?> 
                                        <img src="../asset/img/avatar/<?=$user['avatar']?>" alt="" style="width:150px;height:150px;border-radius:50%">
                                    
                                    <?php

                                    }
                                ?>
                            </div>
                            <div class="col-12  d-flex justify-content-center">
                            
                                <form action="profilSave.php" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="user_id" value="<?=$user['id']?>">
                                    <div class="image_upload">
                                    <label for="userImage">
                                    <a style="cursor: pointer;font-size:10px;" class="text-success text-decoration-none" >Ubah</a>
                                    </label>
                                    <input type="file" name="avatar" id="userImage" onchange="this.form.submit()" accept=".jpg, .jpeg, .png">
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-10">
                <div class="row">
                    <div class="col-lg-12">
                                    <?php
                                        if(isset($_GET['id'])){?>
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            Daftar Berhasil, silahkan lengkapi <strong>profil</strong> anda terlebih dahulu.
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        <?php
                                        
                                        }else{
                                        
                                        }
                                        ?>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    
                                    <form action="profilSave.php" method="POST">
                                    <input type="hidden" name="user_id" value="<?=$user['id']?>">
                                        <div class="col-12">
                                            <div class="input-field-border-bottom f-1">
                                                <div class="mb-1">
                                                    <input type="text" id="" placeholder="Nama" name="nama" value="<?=$user['nama']?>" required/>
                                                </div>
                                                <div class="mb-1">
                                                    <select name="jk" id="" class="input-field-border-bottom pt-1"  required>
                                                        <?php
                                                            if ($user['jenis_kelamin']==null) {?>
                                                                <option value="" selected disabled>--Pilih--</option>
                                                                <option value="Laki-laki">Laki-laki</option>
                                                                <option value="Perempuan">Perempuan</option>
                                                            <?php
                                                            }elseif($user['jenis_kelamin']=='Laki-laki'){?>
                                                                <option value="Laki-laki" selected>Laki-laki</option>
                                                                <option value="Perempuan">Perempuan</option>
                                                                <?php
                                                            } else {?>
                                                                <option value="Laki-laki">Laki-laki</option>
                                                                <option value="Perempuan" selected>Perempuan</option>
                                                                <?php                                                        
                                                            }                                                   
                                                        
                                                        ?>
                                                    
                                                    </select>
                                                </div>
                                                <div class="mb-1">
                                                    <input type="email" id="" placeholder="Email" name="email" value="<?=$user['email']?>"  required/>
                                                </div>
                                                <div class="mb-1">
                                                    <input type="number" id="" placeholder="Nomor Hp" name="no_hp" value="<?=$user['no_hp']?>"  required/>
                                                </div>
                                                <div class="mb-2">
                                                    <textarea  class="input-field-border-bottom" name="alamat" id="" cols="10" rows="1" placeholder="Alamat"><?=$user['alamat']?></textarea>
                                                </div>
                                                <div class="mb-1">
                                                    <button class="btn btn-register text-white" type="submit" name="simpan">Ubah Profil</button>
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
           
       </div>
       <div class="row pt-5">
            <div class="col-12">
                <h6 class="fs-24 f-1"><b>Booking</b></h6>
            </div>
            <?php
            $no=1;
            $userId=$user['id'];
                $query="SELECT b.*,p.nama AS pnama,p.harga,p.id AS idProduk FROM booking b, produk p WHERE p.id=b.produk_id AND b.user_id='$userId' ORDER BY b.id desc";
                $result=mysqli_query($db,$query);
                while ($data=mysqli_fetch_array($result))                      
                {
            ?>
            <div class="col-12 mb-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <table  class="table f-1">
                                    <tbody>
                                        <tr>
                                            <td>Id Booking</td>
                                            <td width="50%"><?=$data['id']?></td>
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
                                                        <p class="badge bg-warning">Booking Dikonfirmasi / Menunggu Pembayaran</p>                                                    
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
                                            <td>No Booking</td>
                                            <td colspan="3"><?=$no++?></td>
                                        </tr>
                                        <tr>
                                            <td>Tgl Booking Dibuat</td>
                                            <td colspan="3"><?=date('d-M-Y', strtotime($data['tgl_booking']))?></td>
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
                                            <td>Tgl Booking Acara</td>
                                            <td colspan="3"><?=date('d-M-Y', strtotime($data['mulai']))?> s/d <?=date('d-M-Y', strtotime($data['selesai']))?></td>
                                        </tr>
                                        <?php
                                        if ($data['status']==2  || $data['status']==3 || $data['status']==4) {?>
                                        <tr>
                                            <td>Total DP</td>
                                            <td colspan="3">Rp. <?=number_format($data['bayar_awal']) ?><small class="text-danger"> (50% dari Total Bayar)</small></td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Total Bayar</td>
                                            <td colspan="3">Rp. <?=number_format($data['total_bayar']) ?></td>
                                        </tr>
                                            <?php
                                        } else {
                                            # code...
                                        }
                                        
                                        ?>
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
                                            <td>Keterangan</td>
                                            <td colspan="3" class="bg-light">
                                                <p>
                                                    <?=nl2br(str_replace('', '', htmlspecialchars($data['keterangan'])))?>
                                                </p>
                                            </td>
                                        </tr>
                                       
                                    </tbody>

                                </table>
                                <?php
                                        if ($data['status']==2)  {?>
                                       
                                       <div class="accordion accordion-flush f-1 mb-3" id="accordionFlushExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-headingOne">
                                            <button class="btn btn-register text-white collapsed bg-info" type="button" data-bs-toggle="collapse" data-bs-target="#fbayar<?=$data['id']?>" aria-expanded="false" aria-controls="fbayar<?=$data['id']?>">
                                                Bayar DP
                                            </button>
                                            </h2>
                                                <div id="fbayar<?=$data['id']?>" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body">
                                                <?php
                                                    if ($data['status']==2)  {?>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <form action="bookingSave.php" enctype="multipart/form-data" method="POST">
                                                                    <input type="hidden" value="<?=$data['id']?>" name="booking_id">
                                                                    <div class="mb-2">
                                                                        <label for="">Tgl Bayar DP</label>
                                                                        <input type="date" name="tgl_bayar" class="form-control form-control-sm" required>
                                                                    </div>
                                                                    <div class="mb-2">
                                                                        <label for="">Bukti Bayar DP</label>
                                                                        <input type="file" name="bukti_bayar" class="form-control form-control-sm" required accept=".jpg, .jpeg, .png">
                                                                    </div>
                                                                    <div class="mb-2">
                                                                        <button type="submit" name="bayar" class="btn btn-outline-success">Bayar</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <h5>Petunjuk Pembayaran</h5>
                                                                        <ol>
                                                                            <li>
                                                                                Lakukan pembayaran (DP) segera setelah booking anda di acc oleh admin
                                                                            </li>
                                                                            <li>
                                                                                Lakukan pembayaran ke no rek <b>432428473238</b>(BRI) A.N  Ihda Puryana EO
                                                                            </li>
                                                                            <li>
                                                                                Upload bukti bayar pada form yang tersedia (disamping kiri)
                                                                            </li>
                                                                            <li>
                                                                                Lakukan pelunasan setelah booking anda selesai
                                                                            </li>
                                                                            <li>
                                                                                Tunggu validasi dari admin
                                                                            </li>
                                                                            <li>
                                                                                Selesai
                                                                            </li>
                                                                        </ol>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                

                                                        <?php
                                                    }else {
                                                        # code...
                                                    }
                                                    
                                                    ?>
                                                </div>
                                            </div>
                                        </div>                               
                                    </div>

                                            <?php
                                        } elseif($data['status']==3 || $data['status']==4 || $data['status']==7) {?>
                                            <div class="accordion accordion-flush f-1 mb-3" id="accordionFlushExample">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="flush-headingOne">
                                                    <button class="btn btn-register text-white collapsed bg-info" type="button" data-bs-toggle="collapse" data-bs-target="#bs<?=$data['id']?>" aria-expanded="false" aria-controls="bs<?=$data['id']?>">
                                                        Lihat Bayar DP
                                                    </button>
                                                    </h2>
                                                        <div id="bs<?=$data['id']?>" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <div class="col-lg-6">
                                                                <table class="table">
                                                                    <tr>
                                                                        <th>Tanggal Bayar</th>
                                                                        <td><?=date('d-m-Y', strtotime($data['tgl_bayar']))?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Bukti Bayar</th>
                                                                        <td>
                                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#bayar<?=$data['id']?>">
                                                                                <img src="../asset/img/bayar/<?=$data['bukti_bayar']?>" alt="" style="width:100px;height:150px;">
                                                                            </a>
                                                                            <!-- Button trigger modal -->


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
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                </div>
                                                                                </div>
                                                                            </div>
                                                                            </div>
                                                                            <!-- /Modal Bayar -->
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                               
                                            </div>
                                            <?php 
                                                if($data['status']==4){?>

                                                    <a href="#" class="btn btn-outline-success f-1" data-bs-toggle="modal" data-bs-target="#selesaiModal<?=$data['id']?>">Booking Selesai</a>
  

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="selesaiModal<?=$data['id']?>" tabindex="-1" aria-labelledby="selesaiModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="selesaiModalLabel"></h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <h6>Booking ini sudah selesai?</h6>
                                                                </div>
                                                                <div class="col-12 pt-3 d-fex justify-content-between">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                    <a href="bookingSave.php?selesai=<?=$data['id']?>" class="btn btn-primary">Ya</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                        </div>
                                                        </div>
                                                    </div>
                                                    </div>


<?php }
                                            ?>
                                            <?php
                                        } else {
                                            # code...
                                        }
                                        
                                        ?>
                                
                            </div>
                            <div class="col-lg-12 d-flex justify-content-end f-1 align-items-center">
                                <?php
                                    if ($data['status']==0 || $data['status']==1 ||$data['status']==5) {?>
                                        <a href="" class="text-dark me-4" data-bs-toggle="modal" data-bs-target="#booking-<?=$data['id']?>">Ajukan Booking Ulang</a> 
                                        

                                           <!-- Booking Modal Paket -->
                                            <div class="modal fade" id="booking-<?=$data['id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="booking-<?=$data['id']?>Label" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">               
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-12 d-flex justify-content-between align-items-center pt-2">
                                                                    <div class=""></div>
                                                                    <div class="">
                                                                        <h6 class="fs-24 f-1"><b>FORMULIR BOOKING</b></h6>
                                                                    </div>
                                                                    <div class="">
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 px-5">
                                                                    <hr>
                                                                </div>
                                                                <div class="col-12 px-4">
                                                                    <form action="bookingSave.php" method="POST">
                                                                        <input type="hidden" value="<?=$data['id']?>" name="booking_id">
                                                                        <div class="row">
                                                                            <div class="col-12 fs-16 f-1 mb-2">
                                                                                <div class="mb-2">
                                                                                    <label for="">Nama</label>
                                                                                    <input type="text" class="form-control form-control-sm text-center bg-white border border-danger" value="<?=$user['nama']?>" readonly>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6 fs-16 f-1 mb-2">
                                                                                    <label for="">Jenis Kelamin</label>
                                                                                    <input type="text" class="form-control form-control-sm text-center bg-white border border-danger" value="<?=$user['jenis_kelamin']?>" readonly>
                                                                            </div>
                                                                            <div class="col-6 fs-16 f-1 mb-2">
                                                                                    <label for="">Nomor Telepon/WA</label>
                                                                                    <input type="text" class="form-control form-control-sm text-center bg-white border border-danger" value="<?=$user['no_hp']?>" readonly>
                                                                            </div>
                                                                            <div class="col-12 fs-16 f-1 mb-2">
                                                                                <div class="mb-2">
                                                                                    <label for="">Alamat</label>
                                                                                    <textarea name="" id="" cols="5" rows="1" class="form-control form-control-sm text-center bg-white border border-danger" readonly><?=$user['alamat']?></textarea>
                                                                                </div>
                                                                                <div class="mb-2">
                                                                                    <label for="">Alamat Acara</label>
                                                                                    <textarea name="alamat" id="" cols="5" rows="1" class="form-control form-control-sm text-center" required><?=$user['alamat']?></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6 fs-16 f-1 mb-2">
                                                                                    <label for="">Tanggal Mulai Booking</label>
                                                                                    <input type="date" name="mulai" value="<?=$data['mulai']?>" class="form-control form-control-sm text-center bg-white" required>
                                                                            </div>
                                                                            <div class="col-6 fs-16 f-1 mb-2">
                                                                                    <label for="">Tanggal Selesai Booking</label>
                                                                                    <input type="date" name="selesai" value="<?=$data['selesai']?>" class="form-control form-control-sm text-center bg-white" required>
                                                                            </div>
                                                                            <div class="col-12 px-5">
                                                                                <hr>
                                                                            </div>
                                                                            <div class="col-12">
                                                                            <h6 class="fs-24 f-1  text-center"><b>DETAIL PAKET</b></h6>
                                                                            </div>
                                                                            <div class="col-12 pt-2 mb-2 fs-16 f-1 mb-2">
                                                                                <div class="mb-2">
                                                                                    <label for="">Nama Paket</label>
                                                                                    <input type="text" class="form-control form-control-sm text-center bg-white border border-danger" value="<?=$data['pnama']?>" readonly>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 fs-16 f-1 mb-2">
                                                                                <div class="mb-2">
                                                                                    <label for="">Harga (Mulai Dari)</label>
                                                                                    <input type="hidden" name="harga" value="<?=$data['harga'] ?>">
                                                                                    <input type="text" class="form-control form-control-sm text-center bg-white border border-danger" value="Rp. <?=number_format($data['harga']) ?>" readonly>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 px-5">
                                                                                <hr>
                                                                            </div>
                                                                            <div class="col-12">
                                                                            <h6 class="fs-24 f-1  text-center"><b>DESKRIPSI PAKET & REQUEST</b></h6>
                                                                            </div>
                                                                            <div class="col-12 px-5">                                        
                                                                                <div class="row">                                                
                                                                                    <?php 
                                                                                    $idProduk=$data['id'];
                                                                                    $query3="SELECT * FROM deskripsi_booking WHERE booking_id='$idProduk'";
                                                                                    $result3=mysqli_query($db,$query3);
                                                                                    while ($data3=mysqli_fetch_array($result3))                      
                                                                                    {?>  
                                                                                        <div class="col-11 mb-2  f-1">                                                   
                                                                                            <input type="text" class="form-control form-control-sm text-center bg-white" value="<?=$data3['deskripsi']?>" readonly>
                                                                                        </div>
                                                                                        <div class="col-1 mb-2 f-1">                                                      
                                                                                            <div class="checkbox-wrapper-12">
                                                                                                <div class="cbx">
                                                                                                    <input id="cbx-12<?=$data3['id']?>" type="checkbox" name="deskripsi[]" value="<?=$data3['deskripsi']?>" checked/>
                                                                                                    <label for="cbx-12<?=$data3['id']?>"></label>
                                                                                                    <svg width="15" height="14" viewbox="0 0 15 14" fill="none">
                                                                                                    <path d="M2 8.36364L6.23077 12L13 2"></path>
                                                                                                    </svg>
                                                                                                </div>
                                                                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1">
                                                                                                    <defs>
                                                                                                    <filter id="goo-12<?=$data3['id']?>">
                                                                                                        <fegaussianblur in="SourceGraphic" stddeviation="4" result="blur"></fegaussianblur>
                                                                                                        <fecolormatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 22 -7" result="goo-12<?=$data3['id']?>"></fecolormatrix>
                                                                                                        <feblend in="SourceGraphic" in2="goo-12<?=$data3['id']?>"></feblend>
                                                                                                    </filter>
                                                                                                    </defs>
                                                                                                </svg>                                                    
                                                                                            </div>
                                                                                        </div>
                                                                                
                                                                                    <?php 
                                                                                }?>  
                                                                                </div>                                       
                                                                            </div>
                                                                            <div class="col-12 px-5">
                                                                                <hr>
                                                                            </div>
                                                                            <div class="col-12 px-5 f-1 d-flex justify-content-between">
                                                                                <label for="" class="text-center">Tambah Request Paket</label>                               
                                                                                <a name="add" id="" class="ms-2 btn text-success add"><i class="fa-solid fa-circle-plus fa-xl"></i></a>
                                                                            </div>
                                                                            <div class="col-12 px-4 f-1">
                                                                            <table class="table border-0 dynamic_field" id="" >  
                                                                                                                
                                                                            </table> 
                                                                        </div>
                                                                            <div class="col-12 fs-16 f-1 mb-5 px-5">
                                                                                <div class="d-grid gap-2">
                                                                                    <button type="submit" name="simpanEdit" class="btn btn-register text-white">Konfirmasi</button>
                                                                                    <a href="" data-bs-dismiss="modal" class="text-center text-danger">Batalkan</a>
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
                                        <!-- /Booking Modal Paket -->


                                        <?php } else {
                                        # code...
                                    }
                                    
                                ?>
                                <?php  
                                    if ($data['status']==0 || $data['status']==1 || $data['status']==2  || $data['status']==5) {?>
                                    
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#batal<?=$data['id']?>" class="btn btn-outline-danger">Batalkan Booking</a>

                                        <!-- Button trigger modal -->


                                    <!-- Modal Batal-->
                                    <div class="modal fade" id="batal<?=$data['id']?>" tabindex="-1" aria-labelledby="batalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">     
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-12 py-4">
                                                    <h6 class="text-center">Yakin Batalkan Booking <?=$data['pnama']?> ?</h6>
                                                </div>
                                                <div class="col-12 d-flex justify-content-between">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <a href="bookingSave.php?batal_id=<?=$data['id']?>" class="btn btn-primary">Ya</a>
                                                </div>
                                            </div>
                                        </div>                                       
                                        </div>
                                    </div>
                                    </div>
                                    <!-- /Modal Batal-->
                                    
                                    <?php
                                        # code...
                                    } elseif($data['status']==4) {?>
                                        <!-- <a href="#" data-bs-toggle="modal" data-bs-target="#batal<?=$data['id']?>" class="btn btn-outline-success">Selesai Booking</a> -->

                                          <!-- Modal Batal-->
                                    <!-- <div class="modal fade" id="batal<?=$data['id']?>" tabindex="-1" aria-labelledby="batalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">     
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-12 py-4">
                                                    <h6 class="text-center">Yakin Selesaikan Booking <?=$data['pnama']?> ?</h6>
                                                </div>
                                                <div class="col-12 d-flex justify-content-between">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <a href="bookingSave.php?batal_id=<?=$data['id']?>" class="btn btn-primary">Ya</a>
                                                </div>
                                            </div>
                                        </div>                                       
                                        </div>
                                    </div>
                                    </div> -->
                                    <!-- /Modal Batal-->
                                        
                                    <?php
                                        # code...
                                    }else {
                                        # code...
                                    }
                                    
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
       </div>
    </div>
</section>

</div>
<?php include "footer.php"?>