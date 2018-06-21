<?php
  include("config/dbConfig.php");

  $db = new Database;
  $db->connect();

  $column = 'pengajuan.id,user.nama as nama_user,pengajuan.nama,pengajuan.nip,'.
            'pengajuan.instansi,'.
            'pengajuan.kegunaan,pengajuan.sistem, pengajuan.status, opd.nama_opd';
  
  $db->select('pengajuan',$column,'user on pengajuan.iduser=user.iduser JOIN opd ON pengajuan.id_opd=opd.id_opd','status=0');
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
                          <div class="clearfix">
                          </div>
                        </div>
                        <div class="x_content">

                          <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#m0">Pengajuan Masuk</a></li>
                            
                            <li><a data-toggle="tab" href="#m1" onclick="show_pengajuan(1)">Revisi Pengajuan</a></li>
                            <li><a data-toggle="tab" href="#m2" onclick="show_pengajuan(2)">Revisi Masuk</a></li>
                            <li><a data-toggle="tab" href="#m3" onclick="show_pengajuan(3)">Pengajuan Terverifikasi</a></li>
                            <li><a data-toggle="tab" href="#m4" onclick="show_pengajuan(4)">Pengajuan Terbit</a></li>
                          </ul>
                          <div class="tab-content">
                            <div id="m0" class="tab-pane fade in active">
                              <br>
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
                                  if(count($res)>0){
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
                                          <button class="btn btn-sm" data-toggle="tooltip" data-placement="top" title="Validasi" onclick="validasi('.$pengajuan['id'].')">
                                              <i class="fa fa-check"></i>
                                          </button>
                                          <button class="btn btn-sm"  data-toggle="tooltip" data-placement="top" title="Beri Pesan" onclick="getIdKomentar('.$pengajuan['id'].')">
                                              <i class="fa fa-comment"></i>
                                          </button>
                                          <button class="btn btn-sm" data-toggle="tooltip" data-placement="top" onclick="deletePengajuan('.$pengajuan['id'].')" title="Hapus">
                                              <i class="fa fa-trash"></i>
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
                                  <h1>hello</h1>
                            </div>
                           
                          </div>
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

          <div class="modal" id="add-comment">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Tambah Pesan</h4>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="process/admin/update-penerbitan.php" id="comment-form" method="POST" onsubmit="return add_comment()">
                      <div class="form-group">
                        <input type="hidden" name="id" id="id-hidden">
                        <input type="hidden" name="status" value="1">
                        <label for="">Tambahkan Pesan untuk User</label>
                        <textarea name="keterangan" cols="30" rows="4" class="form-control" required></textarea>
                      </div>
                  
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

          <div class="modal" id="terbitkan-pengajuan">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Terbitkan Pengajuan</h4>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="process/admin/terbitkan-pengajuan.php" id="terbit" method="POST" onsubmit="return terbitkan()">
                      <div class="form-group">
                        <input type="hidden" name="id" id="id-terbit">
                        <label for="tanggal-terbit">Masukkan tanggal terbit</label>
                        <input type="date" name="tanggal-terbit" required>
                      </div>
                  
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