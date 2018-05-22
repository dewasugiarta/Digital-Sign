<?php
    include("config/dbConfig.php");
?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Daftar Pengajuan</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
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
                                <input type="text" id="" name="nama" class="form-control">

                                <br>


                                <label class="grey-text">NIP</label>
                                <input type="text" id="" name="nip" class="form-control">

                                <br>

                                <label class="grey-text">NIK</label>
                                <input type="text" id="" name="nik" class="form-control">

                                <br>

                                <table style="width:100%;">
                                    <tr>
                                        <td><label  class="grey-text">Pangkat/Golongan</label></td>
                                        <td><label  class="grey-text">Email</label></td>
                                    </tr>
                                    <tr>
                                        <td style="padding-right: 10px; "><input type="text" id="" name="pangkat" class="form-control"></input></td>
                                        <td style="padding-right: 10px; "><input type="email" id="" name="email" class="form-control"></input></td>
                                    </tr>
                                </table>

                                <br>

                                <label class="grey-text">Jabatan</label>
                                <input type="text" id="" name="jabatan" class="form-control"></input>

                                <br>

                                <label  class="grey-text">Instansi</label>
                                <input type="text" id="" name="instansi" class="form-control"></input>

                                <br>

                                <table>
                                    <tr>
                                        <td><label  class="grey-text">Kota</label></td>
                                        <td><label  class="grey-text">Provinsi</label></td>
                                    </tr>
                                    <tr>
                                        <td style="padding-right: 27px;"><input type="text" id="" name="kota" class="form-control"></input></td>
                                        <td><input type="text" id="" name="provinsi" class="form-control"></input></td>
                                    </tr>
                                </table>

                                <br>

                                <label>Unit Kerja</label>
                                <select class="form-control" name="opd">
                                    <option value="" selected>Pilih Unit Kerja</option>
                                    <?php
                                        $dbOpd = new Database;
                                        $dbOpd->connect();
                                        $dbOpd->select('opd','id_opd,nama_opd',NULL,NULL,'id_opd DESC');
                                        $resOpd = $dbOpd->getResult();
                                        foreach ($resOpd as $dataOpd){
                                            echo '<option value="'.$dataOpd['id_opd'].'">'.$dataOpd['nama_opd'].'</option>';
                                        }
                                    ?>
                                </select>

                                <br>
                                <h4>Penggunaan</h4>
                                <br>

                                <label class="grey-text">Sistem</label>
                                <input type="text" id="" name="sistem" class="form-control"></input>
                                <br>

                                <label class="grey-text">Kegunaan</label>
                                <input type="text" id="" name="kegunaan" class="form-control"></input>

                                <br>
                                <h4>Berkas</h4>
                                <table>
                                    <tr>
                                        <td><label  class="grey-text">Scan KTP (JPEG, JPG, IMG)</label></td>
                                        <td><label  class="grey-text">Scan Surat Rekomendasi (PDF)</label></td>
                                    </tr>
                                    <tr>
                                        <td style="padding-right: 27px;"><input type="file" id="ktp" name="ktp" onchange="checkSizeKtp()" class="form-control" accept="image/jpeg , image/jpg" ></input></td>
                                        <td><input type="file" id="surat" name="surat" onchange="checkPdf()" class="form-control" accept="application/pdf"></input></td>
                                        <script type="text/javascript" src="src/js/checkFile.js"></script>
                                    </tr>
                                </table>
                                <br>
                                <br>
                                <div class="text-center mt-4">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Submit">
                                    <button class="btn btn-danger" type="batal">Batal</button>
                                </div>

                            </form>
                            <!-- Default form contact -->
                        </div>
                    </div>
                </div>
                <!-- form merekomendasikan -->
            </div>
        </div>

    </div>
</div>
