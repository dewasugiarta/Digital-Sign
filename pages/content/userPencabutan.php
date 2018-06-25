<?php
    include("config/dbConfig.php");
    $db = new Database;
    $db->connect();
    $iduser = $_SESSION['iduser'];
?>

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Data Pencabutan Berkas</h3>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>List Data Pencabutan/Pembaharuan</h2>

                            <div class="clearfix">
                                    <button class="btn btn-md btn-success add-opd" data-toggle="modal" data-target="#list_data">
                                        <i class="fa fa-plus"></i>
                                        List Data
                                    </button>
                            </div>
                        </div>
                        <div class="x_content">
                            <table id="tableData" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama Direkomendasikan</th>
                                        <th>NIP</th>
                                        <th>Unit Kerja</th>
                                        <th>Kegunaan</th>
                                        <th>Sistem</th>
                                        <th>Status Pengajuan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $db->select('pencabutan',
                                        'pencabutan.id_pencabutan, pencabutan.id, pencabutan.pengajuan, pengajuan.nama, pengajuan.nip, opd.nama_opd, pengajuan.kegunaan, pengajuan.sistem, pencabutan.iduser','pengajuan ON pencabutan.id=pengajuan.id INNER JOIN opd ON pengajuan.id_opd=opd.id_opd','pencabutan.iduser="'.$iduser.'" AND pencabutan.status=\'0\'','tanggal_pengajuan DESC');
                                    $res = $db->getResult();
                                    if(count($res)>0){
                                        foreach($res as $pencabutan){
                                            echo '
                                                <tr>
                                                    <td>'.$pencabutan['nama'].'</td>
                                                    <td>'.$pencabutan['nip'].'</td>
                                                    <td>'.$pencabutan['nama_opd'].'</td>
                                                    <td>'.$pencabutan['kegunaan'].'</td>
                                                    <td>'.$pencabutan['sistem'].'</td>
                                                    <td>'.$pencabutan['pengajuan'].'</td>
                                                    <td>
                                                        <button class="btn btn-sm" data-toggle="tooltip" data-placement="top" title="Batalkan" onclick="batalPencabutan('.$pencabutan['id_pencabutan'].','.$pencabutan['id'].')">
                                                            <i class="fa fa-close"></i>
                                                        </button>

                                                    </td>
                                                </tr>
                                            ';
                                        }
                                    }else{
                                    echo '<h2>KOSONG</h2>';
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal pencabutan-->
<div class="modal" id="list_data">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">List Data</h4>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <table id="tableData" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Direkomendasikan</th>
                                    <th>NIP</th>
                                    <th>Unit Kerja</th>
                                    <th>Kegunaan</th>
                                    <th>Sistem</th>
                                    <th>Tanggal Terbit</th>
                                    <th>Berlaku Sampai</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $db->select('pengajuan',
                                    'pengajuan.id, pengajuan.nama, pengajuan.nip, opd.nama_opd, pengajuan.status, pengajuan.kegunaan, pengajuan.tanggal_terbit, pengajuan.sistem',
                                    'opd ON pengajuan.id_opd=opd.id_opd','iduser="'.$iduser.'" AND status=4 and status_pencabutan=0 ','tanggal_terbit ASC');
                                $res2 = $db->getResult();
                                if(count($res2)>0){
                                    foreach($res2 as $pengajuan2){
                                        $tglTerbit = (string)$pengajuan2['tanggal_terbit'];
                                        $tglExp = explode('-',$tglTerbit,2);
                                        $tglExp[0] += 2;
                                        $tglExpe = implode("-",$tglExp);
                                        echo '
                                            <tr '.getExp($tglExpe).'>
                                                <td>'.$pengajuan2['nama'].'</td>
                                                <td>'.$pengajuan2['nip'].'</td>
                                                <td>'.$pengajuan2['nama_opd'].'</td>
                                                <td>'.$pengajuan2['kegunaan'].'</td>
                                                <td>'.$pengajuan2['sistem'].'</td>
                                                <td>'.$tglTerbit.'</td>
                                                <td id="$tglExp">'.$tglExpe.'</td>
                                                <td>
                                                    <button class="btn btn-sm" data-toggle="tooltip" id="btnPencabutan" data-placement="top" title="Pencabutan dan Pembaharuan" onclick="getDetailUser('.$pengajuan2['id'].')">
                                                        <i class="fa fa-minus-square"></i> |
                                                        <i class="fa fa-undo"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        ';
                                    }
                                }else{
                                echo '<h2>KOSONG</h2>';
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>


<!-- Modal pencabutan-->
<div class="modal" id="pencabutan_data">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Form Pengajuan Pencabutan/Perbaharuan</h4>
                <div>
                </div>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                    <ul class="list-group">
                        <li class="list-group-item" ><label class="lgi-label">Nama</label><span id="nama"></span></li>
                        <li class="list-group-item" ><label class="lgi-label">NIP</label><span id="nip"></span></li>
                        <li class="list-group-item" ><label class="lgi-label">Pangkat/Golongan</label><span id="pangkat-golongan"></span></li>
                        <li class="list-group-item" ><label class="lgi-label">Jabatan</label><span id="jabatan"></span></li>
                        <li class="list-group-item" ><label class="lgi-label">Instansi</label><span id="instansi"></span></li>
                        <li class="list-group-item" ><label class="lgi-label">Unit Kerja</label><span id="opd"></span></li>
                        <li class="list-group-item" ><label class="lgi-label">Kegunaan</label><span id="kegunaan"></span></li>
                        <li class="list-group-item" ><label class="lgi-label">Sistem</label><span id="sistem"></span></li>
                    </ul>
                <form action="process/user/userPencabutanProcess.php" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <input class="pull-left" style="padding:5px;margin-top: 9px;" type="radio" name="pengajuan" value="pembaharuan" required>
                        <span style="padding: 6px" class="pull-left"><strong>Perbaharuan</strong></span>
                        <input class="pull-left" style="padding:5px;margin-top: 9px;" type="radio" name="pengajuan" value="pencabutan" required>
                        <span style="padding: 6px" class="pull-left"><strong>Pencabutan</strong></span>
                        <br>
                        <div class="form-group">
                            <br>
                            <label>Alasan Pencabutan/Pembaharuan</label>
                            <select id="alasanPencabutan" class="form-control" name="alasan" required>
                                <option value="" selected>Pilih Alasan Pencabutan / Pembaharuan</option>
                                <option value="Tidak Digunakan Lagi">Tidak Digunakan Lagi</option>
                                <option value="Ingin Mengajukan Baru">Ingin Mengajukan Baru</option>

                            </select>
                        </div>
                            <label>Upload Surat Pembaharuan/Pencabutan</label>
                        <br>
                            <input type="hidden" name="idPengajuan" value="">
                            <input type="hidden" name="idUser" value="">
                            <input type="file" id="suratPencabutan" name="suratPencabutan" onchange="checkPdf()" class="form-control" accept="application/pdf" required></input>
                        <br>
                        <button id="btnSubmit" type="submit" name="submit" class="btn btn-success">Submit</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end modal update -->
<script type="text/javascript" src="src/js/userPencabutan.js"></script>

<?php
    function getExp($tglExpe){
        $dateTime = date('Y-m-d');
        $tglTmp = explode('-',$dateTime,2);
        $tglExpeTmp = explode('-',$tglExpe,2);

        if($tglExpeTmp[0] <= $tglTmp[0]){
            if (($tglExpeTmp[1]-$tglTmp[1]) < 3) {
                return $alert = 'class="danger"';
            }else {
                return $alert = 'class=""';
            }
        }else {
            return $alert = 'class=""';
        }
    }

    function getStatus(){

    }
?>
