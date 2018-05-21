<?php
  include("config/dbConfig.php");

  $db = new Database;
  $db->connect();
  $db->select('opd', 'id_opd,nama_opd,alamat_opd,kepala_opd,telepon_opd,email_opd');
  $res = $db->getResult();
?>

<script type="text/javascript" src="src/js/opd.js"></script>
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
                                <tr>
                                    <td>Sukma</td>
                                    <td>Made</td>
                                    <td>12312312312</td>
                                    <td>Dinas xxx</td>
                                    <td>Tata Naskah Dinas</td>
                                    <td>Proteksi Email & Tanda tangan elektronik</td>
                                    <td>
                                        <button class="btn btn-sm" data-toggle="modal" data-target="#detail-pengajuan">
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
                                <tr>
                                    <td>Sukma</td>
                                    <td>Made</td>
                                    <td>12312312312</td>
                                    <td>Dinas xxx</td>
                                    <td>Tata Naskah Dinas</td>
                                    <td>Proteksi Email & Tanda tangan elektronik</td>
                                    <td>
                                        <button class="btn btn-sm" data-toggle="modal" data-target="#detail-pengajuan">
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
                                <tr>
                                    <td>Sukma</td>
                                    <td>Made</td>
                                    <td>12312312312</td>
                                    <td>Dinas xxx</td>
                                    <td>Tata Naskah Dinas</td>
                                    <td>Proteksi Email & Tanda tangan elektronik</td>
                                    <td>
                                        <button class="btn btn-sm" data-toggle="modal" data-target="#detail-pengajuan">
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
                  <h4 class="modal-title">Detail Pengajuan</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <ul class="list-group">
                        <li class="list-group-item"><label class="lgi-label">Nama User</label>I.B GDE AGUNG SUTHA WIJAYA. SE.,MM</li>
                        <li class="list-group-item"><label class="lgi-label">Nama Pengaju</label>I KETUT AGUS INDRA DIATMIKA, S.Kom</li>
                        <li class="list-group-item"><label class="lgi-label">NIP</label>198401072009031005</li>
                        <li class="list-group-item"><label class="lgi-label">NIK</label>517020701840001</li>
                        <li class="list-group-item"><label class="lgi-label">Pangkat/Golongan</label>Penata/IIIc</li>
                        <li class="list-group-item"><label class="lgi-label">Jabatan</label>Kepala Seksi Keamanan Informasi dan Persandian</li>
                        <li class="list-group-item"><label class="lgi-label">Instansi</label>Pemerintah Kota Denpasar</li>
                        <li class="list-group-item"><label class="lgi-label">Kota</label>Denpasar</li>
                        <li class="list-group-item"><label class="lgi-label">Provinsi</label>Bali</li>
                        <li class="list-group-item"><label class="lgi-label">Unit Kerja</label>Dinas Komunikasi, Informatika dan Statistik</li>
                        <li class="list-group-item"><label class="lgi-label">Email</label>test@test.com</li>
                        <li class="list-group-item"><label class="lgi-label">Kegunaan</label>Proteksi Email & Tanda Tangan Elektronik</li>
                        <li class="list-group-item"><label class="lgi-label">Sistem</label>Tata Naskah Dinas</li>
                        <li class="list-group-item"><label class="lgi-label">Scan KTP</label><button class="btn btn-success"><i class="fa fa-search"></i> Preview </button></li>
                        <li class="list-group-item"><label class="lgi-label">Surat rekomendasi</label><button class="btn btn-success"><i class="fa fa-search"></i> Preview</button></li>

                    
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