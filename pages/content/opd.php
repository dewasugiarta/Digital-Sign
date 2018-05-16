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
                      <h3>Organisasi Perangkat Daerah</h3>
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
                          <h2>Daftar OPD</h2>

                          <div class="clearfix">
                            <button class="btn btn-md btn-success add-opd" data-toggle="modal" data-target="#add-opd">
                              <i class="fa fa-plus"></i>
                              Tambah OPD
                            </button>
                          </div>
                        </div>
                        <div class="x_content">

                          <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>Nama OPD</th>
                                <th>Alamat</th>
                                <th>No. Telp</th>
                                <th>Kepala</th>
                                <th>Email</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>


                            <tbody>
                            <?php
                              foreach($res as $opd){
                                echo '
                                  <tr>
                                  <td>'.$opd['nama_opd'].'</td>
                                  <td>'.$opd['alamat_opd'].'</td>
                                  <td>'.$opd['telepon_opd'].'</td>
                                  <td>'.$opd['kepala_opd'].'</td>
                                  <td>'.$opd['email_opd'].'</td>
                                  <td>
                                    <button class="btn btn-sm" onclick="getDetailOPD('.$opd['id_opd'].')">
                                      <i class="fa fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm" onclick="deleteOPD('.$opd['id_opd'].')">
                                      <i class="fa fa-times"></i>
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
          <div class="modal" id="add-opd">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Tambahkan OPD</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                  <form action="process/admin/create-opd.php" method="POST">
                    <div class="form-group">
                      <label >Nama OPD</label>
                      <input type="text" class="form-control" name="nama-opd" placeholder="Nama OPD" required>
                    </div>
                    <div class="form-group">
                      <label> Alamat OPD</label>
                      <input type="text" class="form-control" name="alamat-opd" placeholder="Alamat OPD" required>
                    </div>
                    <div class="form-group">
                      <label> Kepala OPD</label>
                      <input type="text" class="form-control" name="kepala-opd" placeholder="Kepala OPD" required>
                    </div>
                    <div class="form-group">
                      <label> Telepon OPD</label>
                      <input type="text" class="form-control" name="telepon-opd" placeholder="Telepon OPD" required>
                    </div>
                    <div class="form-group">
                      <label> Email OPD</label>
                      <input type="text" class="form-control" name="email-opd" placeholder="Email OPD" required>
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

          <!-- Edit OPD Modal -->
          <div class="modal" id="edit-opd">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Edit OPD</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                  <form action="process/admin/update-opd.php" method="POST">
                    <input type="hidden" name="edit-id-opd">
                    <div class="form-group">
                      <label >Nama OPD</label>
                      <input type="text" class="form-control" name="edit-nama-opd" placeholder="Nama OPD">
                    </div>
                    <div class="form-group">
                      <label> Alamat OPD</label>
                      <input type="text" class="form-control" name="edit-alamat-opd" placeholder="Alamat OPD">
                    </div>
                    <div class="form-group">
                      <label> Kepala OPD</label>
                      <input type="text" class="form-control" name="edit-kepala-opd" placeholder="Kepala OPD">
                    </div>
                    <div class="form-group">
                      <label> Telepon OPD</label>
                      <input type="text" class="form-control" name="edit-telepon-opd" placeholder="Telepon OPD">
                    </div>
                    <div class="form-group">
                      <label> Email OPD</label>
                      <input type="text" class="form-control" name="edit-email-opd" placeholder="Email OPD">
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