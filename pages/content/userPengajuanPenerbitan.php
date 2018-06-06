<?php
    include("config/dbConfig.php");
?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Daftar Pengajuan</h3>
            </div>

        </div>
        <div class="container">
            <div class="row">
                <!-- form merekomendasikan -->
                <div class="col-md-1">

                </div>
                <div class="col-md-10">
                    <div class="x_panel">
                        <h2>Direkomendasikan Kepada</h2>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="">
                            <!-- Default form contact -->
                            <form action="process/user/pengajuanPenerbitanProses.php" enctype="multipart/form-data" method="post">
                                <label class="grey-text">Nama</label>
                                <input type="text" id="" name="nama" class="form-control" required>

                                <br>


                                <label class="grey-text">NIP</label>
                                <input type="text" onchange="validateNIP(this.value)" id="nip" name="nip" class="form-control" required>
                                <p id="messageNIP" style="font-color:red;"></p>
                                <br>

                                <label class="grey-text">NIK</label>
                                <input type="text" id="" name="nik" class="form-control" required>

                                <br>

                                <table style="width:100%;">
                                    <tr>
                                        <td><label  class="grey-text">Pangkat/Golongan</label></td>
                                        <td><label  class="grey-text">Email</label></td>
                                    </tr>
                                    <tr>
                                        <td style="padding-right: 10px; "><input type="text" id="" name="pangkat" class="form-control" required></input></td>
                                        <td style="padding-right: 10px; "><input type="email" id="" name="email" class="form-control" required></input></td>
                                    </tr>
                                </table>

                                <br>

                                <label class="grey-text">Jabatan</label>
                                <input type="text" id="" name="jabatan" class="form-control" required></input>

                                <br>

                                <label  class="grey-text">Instansi</label>
                                <input type="text" id="" name="instansi" class="form-control" required></input>

                                <br>

                                <table>
                                    <tr>
                                        <td><label  class="grey-text">Kota</label></td>
                                        <td><label  class="grey-text">Provinsi</label></td>
                                    </tr>
                                    <tr>
                                        <td style="padding-right: 27px;"><input type="text" id="" name="kota" class="form-control" required></input></td>
                                        <td><input type="text" id="" name="provinsi" class="form-control" required></input></td>
                                    </tr>
                                </table>

                                <br>

                                <label>Unit Kerja</label>
                                <select class="form-control" name="opd" readonly>
                                    <?php
                                        $iduser = $_SESSION['iduser'];
                                        $dbOpd = new Database;
                                        $dbOpd->connect();
                                        $dbOpd->select('user','user.id_opd,opd.nama_opd','opd ON user.id_opd=opd.id_opd','iduser="'.$iduser.'"');
                                        $resOpd = $dbOpd->getResult();
                                        foreach ($resOpd as $dataOpd){
                                            echo '<option value="'.$dataOpd['id_opd'].'" selected readonly>'.$dataOpd['nama_opd'].'</option>';
                                        }
                                    ?>
                                </select>

                                <br>
                                <h4>Penggunaan</h4>
                                <br>

                                <label class="grey-text">Sistem</label>
                                <input type="text" id="" name="sistem" class="form-control" required></input>
                                <br>

                                <label class="grey-text">Kegunaan</label>
                                <select class="form-control" name="kegunaan">
                                    <option value="" selected>Pilih Kegunaan</option>
                                    <option value="Proteksi Email">Proteksi Email</option>
                                    <option value="Tanda Tangan Digital">Tanda Tangan Digital</option>
                                    <option value="Proteksi Email & Tanda Tangan Digital">Proteksi Email & Tanda Tangan Digital</option>
                                    <option value="Secure Socket Layer(SSL)">Secure Socket Layer(SSL)</option>
                                </select>
                                <!-- <input type="text" id="" name="kegunaan" class="form-control" required></input> -->

                                <br>
                                <h4>Berkas</h4>
                                <table>
                                    <tr>
                                        <td><label  class="grey-text">Scan KTP (JPEG, JPG, IMG)</label></td>
                                        <td><label  class="grey-text">Scan Surat Rekomendasi (PDF)</label></td>
                                    </tr>
                                    <tr>
                                        <td style="padding-right: 27px;"><input type="file" id="ktp" name="ktp" onchange="checkSizeKtp()" class="form-control" accept="image/jpeg , image/jpg" required></input></td>
                                        <td><input type="file" id="surat" name="surat" onchange="checkPdf()" class="form-control" accept="application/pdf" required></input></td>
                                        <script type="text/javascript" src="src/js/checkFile.js"></script>
                                    </tr>
                                </table>
                                <br>
                                <br>
                                <div class="text-center mt-4">
                                    <input id="btnSubmit" class="btn btn-primary" type="submit" name="submit" value="Submit">
                                    <a href="index.php?pageid=userPenerbitan" class="btn btn-danger">Batal</a>
                                </div>

                            </form>
                            <!-- Default form contact -->
                        </div>
                    </div>
                </div>
                <!-- form merekomendasikan -->
            </div>
        </div>
        <script type="text/javascript">
        //validate userId
        function validateNIP(nip){
            $.post('process/user/validatePenerbitanNIP.php',{
                nip : nip
            }, function(data){
                console.log(data);
                if(data > 0){
                    $('#messageNIP').html('data sudah ada!');
                    $('#btnSubmit').prop('disabled',true);
                }else {
                    $('#messageNIP').html('');
                    $('#btnSubmit').prop('disabled',false);
                }
            })
        }
        </script>
    </div>
</div>
