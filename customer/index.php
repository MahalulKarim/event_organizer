<?php include "header.php"?>
<section id="hero">
    <div class="container">
        <div class="pt-5"></div>
        <div class="pt-5"></div>
        <div class="pt-5"></div>
        <div class="row">
            <div class="col-lg-6">
                <h6 class="fs-20 fc1">Percayakan kenangan berhargamu pada kami</h6>
                <h4 class="fs-64 f-2 text-white">Ihda Puryana Event Organizer</h4>
            </div>
            <div class="col-lg-6">
                <div class="row f-1">
                    <div class="col-12">
                        <p  class="text-white">
                        Ihda Puryana Event Organizer memberikan pelayanan / jasa event organizer (EO) terbaik di Wonosobo, sesuai dengan kebutuhan anda. Sebagai perusahaan dengan legalitas dan profesionalitas dalam menyelenggarakan bermacam event indoor atau outdoor, banyak event seperti pernikahan, bazaar produk perusahaan, wisuda kuliah, artis, hingga event outbound dirancang dengan yang istimewa dan menarik.
                        </p>
                    </div>
                    <div class="col-12">
                    <a target="_blank" href="https://api.whatsapp.com/send?phone=6282241912303&text=Halo%20Admin%20Saya%20Mau%20Mau%20Booking"  class="btn btn-register" style="">Hubungi Kami</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-5">
            <div class="col-lg-4 d-flex justify-content-center">
                <img src="../asset/img/eo1.png" alt="../asset/img/eo1.png" style="max-width:90%">
            </div>
            <div class="col-lg-4 d-flex justify-content-center">
                <img src="../asset/img/eo2.png" alt="../asset/img/eo2.png" style="max-width:90%">
            </div>
            <div class="col-lg-4 d-flex justify-content-center">
                <img src="../asset/img/eo3.png" alt="../asset/img/eo3.png" style="max-width:90%">
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="pt-5"></div>
        <div class="pt-5"></div>
        <div class="pt-5"></div>
        <div class="pt-5"></div>
        <div class="row">
            <div class="col-lg-6">
            <img src="../asset/img/eoGroup1.png" alt="../asset/img/eoGroup1.png" style="max-width:100%">
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-12">
                        <p  class="f-1">Profesional</p>
                        <h6 class="fs-48 f-2">
                            Kami Tenaga Profesional Berpengalaman
                        </h6>
                        <p  class="f-1">
                        Seluruh team event organizer (EO) Ihda Puryana siap memberikan konsep kegiatan sesuai dengan kebutuhan klien serta membuka dialog / diskusi untuk bertukar ide dan konsep kegiatan yang akan diselenggarakan nantinya. Cukup banyak perusahaan dan organisasi yang sudah mempercayakan event gathering, launching, virtual event, webinar & seminar mereka, sesuai dengan visi kami sebagai EO yang handal.
                        </p>
                    </div>
                    <div class="col-12">
                    <a href="#produk" class="btn btn-register text-white f-1" >Booking Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-5">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-12">
                        <p  class="f-1">Kenangan</p>
                        <h6 class="fs-48 f-2">
                            Bersama Kami Abadikan Momen Sakral
                        </h6>
                        <p  class="f-1">
                            Setiap momen mempunyai harga dan kenangan yang tidak bisa digantikan atau diulang kembali. Kamu tidak perlu khawatir, kami sangat memahami itu. Kami EO yang amanah dengan kualitas dan tim yang profesional. Jadi, setiap detik dalam momen sakral dan spesialmu akan terabadikan tanpa ada yang terlewat sedikitpun.
                        </p>
                    </div>
                    <div class="col-12">
                    <a href="#produk" class="btn btn-register text-white f-1" >Booking Sekarang</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
            <img src="../asset/img/eoGroup2.png" alt="../asset/img/eoGroup2.png" style="max-width:100%">
            </div>           
        </div>

      

    </div>
</section>
<section id="produk">
    <div class="container">
        <div class="row pt-2">
            <div class="col-12">
                <h6 class="text-center fs-20 fc1 f-2">Produk</h6>
            </div>
            <div class="col-12">
            <h6 class="fs-48 f-2 text-center text-white">
                Pilih Paket Produk Berdasarkan Seleramu
            </h6>
            </div>
        </div>
        <div class="row pt-5 mb-4">
            <?php  
                $no=1;
                $query="SELECT * FROM produk ";
                $result=mysqli_query($db,$query);
                while ($data=mysqli_fetch_array($result))                      
                {
                    $no++
                    ?>
            <div class="col-lg-4 d-flex justify-content-center mb-5">
                <div class="card <?= ($no%2 == 0) ? 'bg-1':'bg-2'; ?>" style="width: 90%;">                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                            <!-- <h6 class="fs-20 ">Percayakan kenangan berhargamu pada kami</h6> -->
                            <p class="text-white  f-1 fs-20"><?=$data['nama']?></p>
                            <p class="fs-10 text-white" style="margin-top:-10px!important"><i>*Mulai Dari</i></p>
                            <p class="fc1 fs-36 f-1 text-center" style="margin-top:-10px!important">Rp. <?=number_format($data['harga']) ?></p>
                            </div>
                            <div class="col-12">
                                <hr style="background-color:white">
                            </div>
                            <div class="col-12 text-white f-1">
                                <ul>
                                    <?php 
                                    $idProduk=$data['id'];
                                    $query2="SELECT deskripsi FROM deskripsi_produk WHERE produk_id='$idProduk'";
                                    $result2=mysqli_query($db,$query2);
                                    while ($data2=mysqli_fetch_array($result2))                      
                                        {?>
                                           <li><?=$data2['deskripsi']?></li>
                                        <?php 
                                        }?>
                                </ul>
                                <small class="fs-10"><i>*Harga bisa berubah menyesuaikan lama booking dan request client</i></small>
                            </div>
                            <div class="col-12 pt-5 d-flex justify-content-center">
                                <a href="" class="btn btn-booking f-1 px-5"  data-bs-toggle="modal" data-bs-target="#booking-<?=$data['id']?>">Booking Paket</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                                    <input type="hidden" value="<?=$user['id']?>" name="user_id">
                                    <input type="hidden" value="<?=$data['id']?>" name="produk_id">
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
                                            <?php
                                            $tgl_sekarang = date('Y-m-d');
                                            $tgl_mulai = date('Y-m-d', strtotime($tgl_sekarang. ' + 7 days'));
                                            ?>
                                                <label for="">Tanggal Mulai Booking</label>
                                                <input type="date" name="mulai" class="form-control form-control-sm text-center bg-white" value="<?=$tgl_mulai?>" required>
                                        </div>
                                        <div class="col-6 fs-16 f-1 mb-2">
                                                <label for="">Tanggal Selesai Booking</label>
                                                <input type="date" name="selesai" class="form-control form-control-sm text-center bg-white" required>
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
                                                <input type="text" class="form-control form-control-sm text-center bg-white border border-danger" value="<?=$data['nama']?>" readonly>
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
                                        <h6 class="fs-24 f-1  text-center"><b>DESKRIPSI PAKET</b></h6>
                                        </div>
                                        <div class="col-12 px-5">                                        
                                            <div class="row">                                                
                                                <?php 
                                                $idProduk=$data['id'];
                                                $query2="SELECT * FROM deskripsi_produk WHERE produk_id='$idProduk'";
                                                $result2=mysqli_query($db,$query2);
                                                while ($data2=mysqli_fetch_array($result2))                      
                                                {?>  
                                                    <div class="col-11 mb-2  f-1">                                                   
                                                        <input type="text" class="form-control form-control-sm text-center bg-white" value="<?=$data2['deskripsi']?>" readonly>
                                                    </div>
                                                    <div class="col-1 mb-2 f-1">                                                      
                                                        <div class="checkbox-wrapper-12">
                                                            <div class="cbx">
                                                                <input id="cbx-12<?=$data2['id']?>" type="checkbox" name="deskripsi[]" value="<?=$data2['deskripsi']?>" checked/>
                                                                <label for="cbx-12<?=$data2['id']?>"></label>
                                                                <svg width="15" height="14" viewbox="0 0 15 14" fill="none">
                                                                <path d="M2 8.36364L6.23077 12L13 2"></path>
                                                                </svg>
                                                            </div>
                                                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1">
                                                                <defs>
                                                                <filter id="goo-12<?=$data2['id']?>">
                                                                    <fegaussianblur in="SourceGraphic" stddeviation="4" result="blur"></fegaussianblur>
                                                                    <fecolormatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 22 -7" result="goo-12<?=$data2['id']?>"></fecolormatrix>
                                                                    <feblend in="SourceGraphic" in2="goo-12<?=$data2['id']?>"></feblend>
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
                                                <button type="submit" name="simpan" class="btn btn-register text-white">Konfirmasi Booking</button>
                                                <a href="" data-bs-dismiss="modal" class="text-center text-danger">Batalkan Booking</a>
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
            <?php }?>
           
        </div>
    </div>
</section>
    
</div>
<?php include "footer.php"?>