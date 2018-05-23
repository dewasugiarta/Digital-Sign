<?php
  include("config/dbConfig.php");

  $db = new Database;
  $db->connect();

  $column = 'pengajuan.id,user.nama as nama_user,pengajuan.nama,pengajuan.nip,'.
            'pengajuan.instansi,'.
            'pengajuan.kegunaan,pengajuan.sistem, pengajuan.status, opd.nama_opd';
  
  $db->select('pengajuan',$column,'user on pengajuan.iduser=user.iduser JOIN opd ON pengajuan.id_opd=opd.id_opd');
  $res = $db->getResult();
 
?>

<script type="text/javascript" src="src/js/penerbitan-admin.js"></script>
          <!-- page content -->
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

                  <div class="clearfix"></div>

                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="x_panel">
                        <div class="x_title">
                          <h2>Daftar Rekomendasi dan Pengajuan</h2>
                          <?php
                           print("<pre>".print_r($res,true)."</pre>");
                          ?>
                          <div class="clearfix">
                            <!-- <button class="btn btn-md btn-success add-opd" data-toggle="modal" data-target="#add-opd">
                              <i class="fa fa-plus"></i>
                              Tambah OPD
                            </button> -->
                          </div>
                        </div>
                        <div class="x_content">

                          <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>Nama User</th>
                                <th>Nama Pengaju</th>
                                <th>NIP</th>
                                <th>Unit Kerja</th>
                                <th>Sistem</th>
                                <th>Kegunaan</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>


                            <tbody>
                            <?php
                              foreach($res as $pengajuan){
                                echo '
                                <tr>
                                  <td>'.$pengajuan['nama_user'].'</td>
                                  <td>'.$pengajuan['nama'].'</td>
                                  <td>'.$pengajuan['nip'].'</td>
                                  <td>'.$pengajuan['nama_opd'].'</td>
                                  <td>'.$pengajuan['sistem'].'</td>
                                  <td>'.$pengajuan['kegunaan'].'</td>
                                  <td>
                                    <button class="btn btn-sm" data-toggle="modal" data-target="#detail-pengajuan" onclick="getDetailPengajuan('.$pengajuan['id'].')">
                                        <i class="fa fa-info" data-toggle="tooltip" data-placement="top" title="detail"></i>
                                    </button>
                                    <button class="btn btn-sm" data-toggle="tooltip" data-placement="top" title="Validasi">
                                        <i class="fa fa-check"></i>
                                    </button>
                                    <button class="btn btn-sm" data-toggle="tooltip" data-placement="top" title="Beri Pesan">
                                        <i class="fa fa-comment"></i>
                                    </button>
                                    <button class="btn btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus">
                                        <i class="fa fa-trash"></i>
                                    </button>
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
          <!-- /page content -->

          <!-- Add OPD Modal -->
          <div class="modal" id="detail-pengajuan">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Detail Pengajuan</h4>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <ul class="list-group">
                        <li class="list-group-item" ><label class="lgi-label">Nama User</label><span id="nama-user"></span></li>
                        <li class="list-group-item" ><label class="lgi-label">Nama Pengaju</label><span id="nama-pengaju"></span></li>
                        <li class="list-group-item" ><label class="lgi-label">NIP</label><span id="nip"></span></li>
                        <li class="list-group-item" ><label class="lgi-label">NIK</label><span id="nik"></span></li>
                        <li class="list-group-item" ><label class="lgi-label">Pangkat/Golongan</label><span id="pangkat-golongan"></span></li>
                        <li class="list-group-item" ><label class="lgi-label">Jabatan</label><span id="jabatan"></span></li>
                        <li class="list-group-item" ><label class="lgi-label">Instansi</label><span id="instansi"></span></li>
                        <li class="list-group-item" ><label class="lgi-label">Kota</label><span id="kota"></span></li>
                        <li class="list-group-item" ><label class="lgi-label">Provinsi</label><span id="provinsi"></span></li>
                        <li class="list-group-item" ><label class="lgi-label">Unit Kerja</label><span id="opd"></span></li>
                        <li class="list-group-item" ><label class="lgi-label">Email</label><span id="email"></span></li>
                        <li class="list-group-item" ><label class="lgi-label">Kegunaan</label><span id="kegunaan"></span></li>
                        <li class="list-group-item" ><label class="lgi-label">Sistem</label><span id="sistem"></span></li>
                        <li class="list-group-item" ><label class="lgi-label">Scan KTP</label><button id="ktp" onclick="open_ktp(this.value)" class="btn btn-success"><i class="fa fa-search"></i> Preview </button></li>
                        <li class="list-group-item" ><label class="lgi-label">Surat rekomendasi</label><button id="surat" onclick="open_surat(this.value)" class="btn btn-success"><i class="fa fa-search"></i> Preview</button></li>
                    </ul>
                  
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                  </form>
                </div>

              </div>
            </div>
          </div>