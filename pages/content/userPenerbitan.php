<?php
  include("config/dbConfig.php");

  $db = new Database;
  $db->connect();
  $db->select('pengajuan',
                'pengajuan.id, pengajuan.nama, pengajuan.nip, opd.nama_opd, pengajuan.tanggal, pengajuan.status',
                'opd ON pengajuan.id_opd=opd.id_opd',null,'tanggal DESC');
  $res = $db->getResult();
?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Pengajuan Penerbitan</h3>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>List Pengajuan Penerbitan</h2>

                            <div class="clearfix">
                                <a href="index.php?pageid=formPenerbitan">
                                    <button class="btn btn-md btn-success add-opd">
                                        <i class="fa fa-plus"></i>
                                        Pengajuan Penerbitan
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="x_content">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped table-bordered" style="white-space: nowrap;">
                                    <thead>
                                        <tr>
                                            <th>Nama Pengaju</th>
                                            <th>NIP</th>
                                            <th>Unit Kerja</th>
                                            <th>Tangal Pengajuan</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $row = $db->numRows($res);

                                            if($row > 0 ){
                                                foreach($res as $data){
                                                    echo '
                                                    <tr>
                                                        <td>'.$data['nama'].'</td>
                                                        <td>'.$data['nip'].'</td>
                                                        <td>'.$data['nama_opd'].'</td>
                                                        <td>'.$data['tanggal'].'</td>
                                                        <td>'.$data['status'].'</td>
                                                        <td>
                                                            <button class="btn btn-sm" onclick="getDetailUser(\''.$data['id'].'\')">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <button class="btn btn-sm" onclick="deleteUser(\''.$data['id'].'\',\''.$data['nama'].'\')">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    ';
                                                }
                                            }else {
                                                echo '
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>

                                                    </td>
                                                </tr>
                                                ';
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
</div>
