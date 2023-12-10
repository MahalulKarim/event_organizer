<?php include "header.php"?>
<div class="container">
<?php 
        if(isset($_GET['id'])){
            $idUser=$_GET['id'];
            $query="SELECT * FROM user WHERE id='$idUser'";
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
                                    <a href="" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deletModal<?=$data['id']?>">Hapus User</a>
                                        <!-- Modal Delete-->
                                        <div class="modal fade" id="deletModal<?=$data['id']?>" tabindex="-1" aria-labelledby="deletModal<?=$data['id']?>Label" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-12 py-2">
                                                                <h6 class="text-center">Yakin Hapus User <?=$data['nama']?> ?</h6>
                                                            </div>
                                                            <div class="col-12 d-flex justify-content-between">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                <a href="userDelete.php?id=<?=$data['id']?>" class="btn btn-danger">Ya</a>
                                                            
                                                            </div>
                                                        </div>
                                                    </div>                                           
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Modal Delete-->
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
                                                <input type="text" id="" placeholder="Nama" name="name" value="<?=$data['nama']?>" required readonly/>
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
                                                <textarea  class="input-field-border-bottom" name="message" id="" cols="10" rows="1" placeholder="Alamat" required readonly><?=$data['alamat']?></textarea>
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
            <!-- <div class="col-12">
                <h6 class="fs-24 f-1"><b>Booking</b></h6>
            </div>
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <table  class="table f-1">
                                    <tbody>
                                        <tr>
                                            <td>Id Booking</td>
                                            <td width="50%">124314</td>
                                            <td>Status Booking</td>
                                            <td>
                                                <p class="badge bg-secondary">Menunggu Konfirmasi</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No Booking</td>
                                            <td colspan="3">1</td>
                                        </tr>
                                        <tr>
                                            <td>Produk</td>
                                            <td colspan="3">Silver</td>
                                        </tr>
                                        <tr>
                                            <td>Deskripsi</td>
                                            <td colspan="3">
                                                <ol>
                                                    <li>
                                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla incidunt eius impedit ipsum distinctio commodi, accusantium nemo atque alias amet quos nisi eveniet tempore cupiditate est debitis molestiae omnis facilis.
                                                    </li>
                                                    <li>lorem</li>
                                                    <li>lorem</li>
                                                    <li>lorem</li>
                                                    <li>lorem</li>
                                                    <li>lorem</li>
                                                    <li>lorem</li>
                                                    <li>lorem</li>
                                                    <li>lorem</li>
                                                    <li>lorem</li>
                                                    <li>lorem</li>
                                                </ol>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>
                            <div class="col-lg-12 d-flex justify-content-end f-1 align-items-center">
                                <a href="" class="btn btn-outline-danger me-4">Tolak Booking</a> <a href="" class="btn bg-1 text-white" style=" background-color: rgba(24, 58, 29, 1);">Terima Booking</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
    </div>
</div>
<?php include "footer.php"?>