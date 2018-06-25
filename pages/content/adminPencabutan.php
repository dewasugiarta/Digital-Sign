<?php
    include("config/dbConfig.php");
    $db = new Database;
    $db->connect();
    // $iduser = $_SESSION['iduser'];
?>

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Pengajuan Pembaharuan & Pencabutan</h3>
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
                                        'pencabutan.id_pencabutan, pencabutan.id, pencabutan.pengajuan, pengajuan.nama, pengajuan.nip, opd.nama_opd, pengajuan.kegunaan, pengajuan.sistem, pencabutan.iduser','pengajuan ON pencabutan.id=pengajuan.id INNER JOIN opd ON pengajuan.id_opd=opd.id_opd', "pencabutan.status=0" ,'tanggal_pengajuan DESC');
                                    $res = $db->getResult();
                                    if(count($res)>0){
                                        foreach($res as $pencabutan){
                                            if($pencabutan['pengajuan']=="pencabutan"){
                                                $info = '
                                                    <button class="btn btn-sm" data-toggle="modal" data-target="#modal-alasan" onclick="getAlasan('.$pencabutan['id_pencabutan'].')">
                                                        <i class="fa fa-info" data-toggle="tooltip" data-placement="top" title="Alasan Pencabutan"></i>
                                                    </button>
                                                ';
                                            }else{
                                                $info = '';
                                            }
                                            echo '
                                                <tr>
                                                    <td>'.$pencabutan['nama'].'</td>
                                                    <td>'.$pencabutan['nip'].'</td>
                                                    <td>'.$pencabutan['nama_opd'].'</td>
                                                    <td>'.$pencabutan['kegunaan'].'</td>
                                                    <td>'.$pencabutan['sistem'].'</td>
                                                    <td>'.$pencabutan['pengajuan'].$info.'</td>
                                                    <td>
                                                        <button class="btn btn-sm" data-toggle="tooltip" data-placement="top" title="Terima" onclick="terima('."'".$pencabutan['pengajuan']."'".' ,'.$pencabutan['id_pencabutan'].','.$pencabutan['nip'].')">
                                                            <i class="fa fa-check"></i>
                                                        </button>
                                                        <button class="btn btn-sm" data-toggle="tooltip" data-placement="top" title="Batalkan" onclick="tolak('.$pencabutan['id_pencabutan'].','.$pencabutan['id'].')">
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


<!-- Modal Alasan -->
<div class="modal" id="modal-alasan">
    <div class="modal-dialog">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Alasan Pencabutan</h4>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <p id="alasan-pencabutan"></p>
        </div>

        <!-- Modal footer
        <div class="modal-footer">
      
        </div> -->

        </div>
    </div>
</div>

<script type="text/javascript" src="src/js/adminPencabutan.js"></script>
