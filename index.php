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
                    <a  href="customer/index.php"  class="btn btn-register" style="">Hubungi Kami</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-5">
            <div class="col-lg-4 d-flex justify-content-center">
                <img src="asset/img/eo1.png" alt="asset/img/eo1.png" style="max-width:90%">
            </div>
            <div class="col-lg-4 d-flex justify-content-center">
                <img src="asset/img/eo2.png" alt="asset/img/eo2.png" style="max-width:90%;border-radius:190px 190px 10px 10px">
            </div>
            <div class="col-lg-4 d-flex justify-content-center">
                <img src="asset/img/eo3.png" alt="asset/img/eo3.png" style="max-width:90%">
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
            <img src="asset/img/eoGroup1.png" alt="asset/img/eoGroup1.png" style="max-width:100%">
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
                    <a href="customer/index.php"  class="btn btn-register text-white f-1" style="">Booking Sekarang</a>
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
                    <a href="customer/index.php"  class="btn btn-register text-white f-1" style="">Booking Sekarang</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
            <img src="asset/img/eoGroup2.png" alt="asset/img/eoGroup2.png" style="max-width:100%">
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
            include "koneksi.php";
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
                            <p class="text-white  f-1"><?=$data['nama']?></p>
                            <h6 class="fc1 fs-36 f-1 text-center">Rp. <?=number_format($data['harga']) ?></h6>
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
                            </div>
                            <div class="col-12 pt-5 d-flex justify-content-center">
                                <a href="customer/index.php" class="btn btn-booking f-1 px-5">Booking Paket</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }?>
           
        </div>
    </div>
</section>
    
</div>
<?php include "footer.php"?>