<?php
  include("config/dbConfig.php");

  $iduser = $_SESSION['iduser'];
  $db = new Database;
  $db->connect();
  $db->select('pengajuan',
                'pengajuan.id, pengajuan.nama, pengajuan.nip, opd.nama_opd, pengajuan.tanggal, pengajuan.status',
                'opd ON pengajuan.id_opd=opd.id_opd','iduser="'.$iduser.'" AND status=0','tanggal DESC');
  $res = $db->getResult();

  $status = ['Baru','Revisi','Proses Revisi','Diterima'];
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
                            <ul class="nav nav-tabs">
                              <li class="active"><a data-toggle="tab" href="#m0">Pengajuan Baru</a></li>

                              <li><a data-toggle="tab" href="#m1" onclick="show_pengajuan(1)">Pengajuan Direvisi</a></li>
                              <li><a data-toggle="tab" href="#m2" onclick="show_pengajuan(2)">Proses Revisi</a></li>
                              <li><a data-toggle="tab" href="#m3" onclick="show_pengajuan(3)">Pengajuan Terverifikasi</a></li>
                              <li><a data-toggle="tab" href="#m4" >Sudah Diterbitkan</a></li>
                            </ul>
                            <div class="tab-content">
                              <div id="m0" class="tab-pane fade in active">
                                <br>
                                <table id="datatable" class="table table-striped table-bordered">
                                  <thead>
                                    <tr>
                                        <th>Nama Direkomendasikan</th>
                                        <th>NIP</th>
                                        <th>Unit Kerja</th>
                                        <th>Tangal Pengajuan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                  </thead>


                                  <tbody>
                                  <?php
                                    if(count($res)>0){
                                      foreach($res as $pengajuan){
                                           $editStatus = $pengajuan['status']==3?'disabled':'';
                                           $keterangan = $pengajuan['status']!=1?'none':'';
                                        echo '
                                        <tr>
                                          <td>'.$pengajuan['nama'].'</td>
                                          <td>'.$pengajuan['nip'].'</td>
                                          <td>'.$pengajuan['nama_opd'].'</td>
                                          <td>'.$pengajuan['tanggal'].'</td>
                                          <td>'.$status[$pengajuan['status']].'
                                              <button class="btn btn-sm" data-toggle="tooltip" data-placement="top" title="Keterangan Revisi" style="display:'.$keterangan.'" onclick="getKeterangan('.$pengajuan['id'].')">
                                                <i class="fa fa-info"></i>
                                              </button>
                                          </td>
                                          <td>
                                          <button class="btn btn-sm" data-toggle="tooltip" data-placement="top" title="Edit data" onclick="getDetailUser('.$pengajuan['id'].')" '.$editStatus.'>
                                            <i class="fa fa-edit"></i>
                                          </button>
                                          <button class="btn btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus Data" onclick="deletePenerbitan(\''.$pengajuan['id'].'\',\''.$pengajuan['nama'].'\')" '.$editStatus.'>
                                            <i class="fa fa-times"></i>
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

                              <div id="m1" class="tab-pane fade in"></div>
                              <div id="m2" class="tab-pane fade in"></div>
                              <div id="m3" class="tab-pane fade in"></div>

                              <div id="m4" class="tab-pane fade in">
                                <br>
                                <table id="datatable" class="table table-striped table-bordered">
                                  <thead>
                                    <tr>
                                        <th>Nama Direkomendasikan</th>
                                        <th>NIP</th>
                                        <th>Unit Kerja</th>
                                        <th>Kegunaan</th>
                                        <th>Sistem</th>
                                        <th>Aksi</th>
                                    </tr>
                                  </thead>


                                  <tbody>
                                  <?php
                                    $db->select('pengajuan',
                                                'pengajuan.id, pengajuan.nama, pengajuan.nip, opd.nama_opd, pengajuan.tanggal, pengajuan.status, pengajuan.kegunaan, pengajuan.sistem',
                                                'opd ON pengajuan.id_opd=opd.id_opd','iduser="'.$iduser.'" AND status=4','tanggal DESC');
                                    $res2 = $db->getResult();
                                    if(count($res2)>0){
                                      foreach($res2 as $pengajuan2){
                                        echo '
                                        <tr>
                                          <td>'.$pengajuan2['nama'].'</td>
                                          <td>'.$pengajuan2['nip'].'</td>
                                          <td>'.$pengajuan2['nama_opd'].'</td>
                                          <td>'.$pengajuan2['kegunaan'].'</td>
                                          <td>'.$pengajuan2['sistem'].'</td>
                                          <td>
                                          <button class="btn btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus Data" onclick="deletePenerbitan(\''.$pengajuan2['id'].'\',\''.$pengajuan2['nama'].'\')">
                                            <i class="fa fa-times"></i>
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

                            <!-- <div class="table-responsive">
                                <table id="datatable" class="table table-striped table-bordered" style="white-space: nowrap;">
                                    <thead>
                                        <tr>
                                            <th>Nama Direkomendasikan</th>
                                            <th>NIP</th>
                                            <th>Unit Kerja</th>
                                            <th>Tangal Pengajuan</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            // $row = $db->numRows($res);
                                            //
                                            // if($row > 0 ){
                                            //     foreach($res as $data){
                                            //         $editStatus = $data['status']==3?'disabled':'';
                                            //         echo '
                                            //         <tr>
                                            //             <td>'.$data['nama'].'</td>
                                            //             <td>'.$data['nip'].'</td>
                                            //             <td>'.$data['nama_opd'].'</td>
                                            //             <td>'.$data['tanggal'].'</td>
                                            //             <td>'.$status[$data['status']].'</td>
                                            //             <td>
                                            //                 <button class="btn btn-sm" onclick="getDetailUser('.$data['id'].')" '.$editStatus.'>
                                            //                     <i class="fa fa-edit"></i>
                                            //                 </button>
                                            //                 <button class="btn btn-sm" onclick="deletePenerbitan(\''.$data['id'].'\',\''.$data['nama'].'\')">
                                            //                     <i class="fa fa-times"></i>
                                            //                 </button>
                                            //             </td>
                                            //         </tr>
                                            //         ';
                                            //     }
                                            // }else {
                                            //     echo '
                                            //     <tr>
                                            //         <td></td>
                                            //         <td></td>
                                            //         <td></td>
                                            //         <td></td>
                                            //         <td></td>
                                            //         <td>
                                            //
                                            //         </td>
                                            //     </tr>
                                            //     ';
                                            // }

                                        ?>
                                    </tbody>
                                </table>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- Update User Modal -->
<div class="modal" id="update-penerbitan">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Detail  Pengajuan Penerbitan</h4>
                <div>
                    <input class="pull-right" style="padding:5px;margin-top: 9px;" type="checkbox" name="updateToggle" id="updateToggle"  onchange="onUpdate(this)">
                    <span style="padding: 6px" class="pull-right"><strong>EDIT</strong></span>
                </div>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="process/user/userUpdatePenerbitan.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="updateId" name="updateId" readonly>
                    <div class="form-group">
                        <label >Nama Lengkap</label>
                        <input id="updateNama" type="text" class="form-control" name="updateNama" placeholder="Nama Lengkap" readonly required>
                    </div>
                    <div class="form-group">
                        <label >NIP</label>
                        <input type="text" id="updateNIP" class="form-control" name="updateNIP" placeholder="NIP"  readonly required>
                        <p id="messageNIP"></p>
                    </div>
                    <div class="form-group">
                        <label>NIK</label>
                        <input id="updateNIK" type="text" class="form-control" name="updateNIK" placeholder="NIK" readonly required>
                    </div>
                    <div class="form-group">
                        <label >Pangkat/Golongan</label>
                        <input id="updatePangkat" type="text" class="form-control" name="updatePangkat" readonly placeholder="Pangkat/Golongan" required>
                    </div>
                    <div class="form-group">
                        <label>Jabatan</label>
                        <input id="updateJabatan" type="text" class="form-control" name="updateJabatan" readonly placeholder="Jabatan" required>
                    </div>
                    <div class="form-group">
                        <label>Instansi</label>
                        <input id="updateInstansi" type="text" class="form-control" name="updateInstansi" readonly placeholder="instansi" required>
                    </div>
                    <div class="form-group">
                        <label>Kota</label>
                        <input id="updateKota" type="text" class="form-control" name="updateKota" readonly placeholder="Kota" required>
                    </div>
                    <div class="form-group">
                        <label>Provinsi</label>
                        <input id="updateProvinsi" type="text" class="form-control" name="updateProvinsi" readonly placeholder="Provinsi" required>
                    </div>
                    <div class="form-group">
                        <label>Unit Kerja</label>
                        <select id="updateOPD" class="form-control" name="updateOPD" disabled>
                            <option value="" readonly selected>Pilih Unit Kerja</option>
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
                    </div>

                    <div class="form-group">
                        <label> Email</label>
                        <input id="updateEmail" type="email" class="form-control" name="updateEmail" readonly  placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label> Sistem</label>
                        <input id="updateSistem" type="text" class="form-control" name="updateSistem" readonly  placeholder="Sistem" required>
                    </div>
                    <div class="form-group">
                        <label> Kegunaan</label>
                        <!-- <input id="updateKegunaan" type="text" class="form-control" name="updateKegunaan" readonly  placeholder="Kegunaan" required> -->
                        <select class="form-control" id="updateKegunaan" name="updateKegunaan" disabled required>
                            <option value="" selected>Pilih Kegunaan</option>
                            <option value="Proteksi Email">Proteksi Email</option>
                            <option value="Tanda Tangan Digital">Tanda Tangan Digital</option>
                            <option value="Secure Socket Layer(SSL)">Secure Socket Layer(SSL)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Berkas KTP</label>
                        <br>
                        <button id="previewKTP" type="button" class="btn btn-success" onclick="berkasView(this.dataset.id,this.dataset.nip,this.dataset.get)" style="margin-bottom:10px"><i class="fa fa-search"></i>Preview</button>
                        <input type="file" id="updateKTP" name="updateKTP" onchange="checkSizeKtp()" class="form-control" accept="image/jpeg, image/jpg" required></input>
                    </div>
                    <div class="form-group">
                        <label>Berkas Surat Rekomendasi</label>
                        <br>
                        <button id="previewSurat" type="button" class="btn btn-success" onclick="berkasView(this.dataset.id,this.dataset.nip,this.dataset.get)" style="margin-bottom:10px"><i class="fa fa-search"></i>Preview</button>
                        <input type="file" id="updateSurat" name="updateSurat" onchange="checkPdf()" class="form-control" accept="application/pdf" required></input>
                    </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button id="btnUpdate" type="submit" name="submit" class="btn btn-success">Update</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal update -->


<div class="modal" id="display-keterangan">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">keterangan Revisi</h4>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div>
                    <p id="keterangan"></p>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<!-- end modal keterangan -->


<script type="text/javascript" src="src/js/penerbitan.js"></script>
