<?php
  include("config/dbConfig.php");

  $db = new Database;
  $db->connect();
  $db->select('user',
                'user.iduser, user.nama, user.nik, user.pangkat_golongan,'
                .'user.jabatan, user.instansi, opd.nama_opd, user.email, '
                .'user.telepon, user.username',
                'opd ON user.id_opd=opd.id_opd',null,'timestamp DESC');
  $res = $db->getResult();
?>



<!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3>Manage User</h3>
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
                <h2>List User</h2>

                <div class="clearfix">
                  <button class="btn btn-md btn-success add-opd" data-toggle="modal" data-target="#add-user">
                    <i class="fa fa-plus"></i>
                    Tambah User
                  </button>
                </div>
              </div>
              <div class="x_content">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" style="white-space: nowrap;">
                      <thead>
                        <tr>
                          <th>Nama Lengkap</th>
                          <th>NIP</th>
                          <th>Unit Kerja</th>
                          <th>Telepon</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        foreach($res as $user){
                          echo '
                            <tr>
                            <td>'.$user['nama'].'</td>
                            <td>'.$user['iduser'].'</td>
                            <td>'.$user['nama_opd'].'</td>
                            <td>'.$user['telepon'].'</td>
                            <td>
                                <button class="btn btn-sm" onclick="getDetailUser(\''.$user['iduser'].'\')">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button class="btn btn-sm" onclick="deleteUser(\''.$user['iduser'].'\',\''.$user['nama'].'\')">
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
    </div>
<!-- /page content -->

<!-- Add User Modal -->
<div class="modal" id="add-user">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambahkan User</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="process/admin/create-user.php" method="POST">
                    <div class="form-group">
                        <label >Nama Lengkap</label>
                        <input id="addNama" type="text" class="form-control" name="addNama" onkeyup="getUsername()" placeholder="Nama Lengkap" required>
                    </div>
                    <div class="form-group">
                        <label >NIP</label>
                        <input type="text" class="form-control" name="addNIP" onkeyup="validateData('iduser',this.value)" placeholder="NIP" required>
                        <p id="messageNIP"></p>
                    </div>
                    <div class="form-group">
                        <label>NIK</label>
                        <input type="text" class="form-control" name="addNIK" placeholder="NIK" required>
                    </div>
                    <div class="form-group">
                        <label >Pangkat/Golongan</label>
                        <input type="text" class="form-control" name="addPangkat" placeholder="Pangkat/Golongan" required>
                    </div>
                    <div class="form-group">
                        <label>Jabatan</label>
                        <input type="text" class="form-control" name="addJabatan" placeholder="Jabatan" required>
                    </div>
                    <div class="form-group">
                        <label>Instansi</label>
                        <input type="text" class="form-control" name="addInstansi" placeholder="instansi" required>
                    </div>
                    <div class="form-group">
                        <label>Unit Kerja</label>
                        <select class="form-control" name="addOPD">
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
                        <label> Telepon</label>
                        <input type="text" class="form-control" name="addTelepon" placeholder="Telepon" required>
                    </div>
                    <div class="form-group">
                        <label> Email</label>
                        <input type="email" class="form-control" name="addEmail" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label> Username</label>
                        <input id="addUsername" type="text" class="form-control" name="addUsername" placeholder="Username" readonly required>
                    </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal add -->

<!-- Update User Modal -->
<div class="modal" id="update-user">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Detail User</h4>
                <div>
                    <input class="pull-right" style="padding:5px;margin-top: 9px;" type="checkbox" name="updateToggle" id="updateToggle"  onchange="onUpdate(this)">
                    <span style="padding: 6px" class="pull-right"><strong>EDIT</strong></span>
                </div>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="process/admin/update-user.php" method="POST">
                    <div class="form-group">
                        <label >Nama Lengkap</label>
                        <input id="updateNama" type="text" class="form-control" name="updateNama" placeholder="Nama Lengkap" readonly required>
                    </div>
                    <div class="form-group">
                        <label >NIP</label>
                        <input type="text" class="form-control" name="updateNIP" placeholder="NIP"  readonly required>
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
                        <label>Unit Kerja</label>
                        <select id="updateOPD" class="form-control" name="updateOPD" readonly>
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
                        <label> Telepon</label>
                        <input id="updateTelepon" type="text" class="form-control" name="updateTelepon" readonly placeholder="Telepon" required>
                    </div>
                    <div class="form-group">
                        <label> Email</label>
                        <input id="updateEmail" type="email" class="form-control" name="updateEmail" readonly  placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label> Username</label>
                        <input id="updateUsername" type="text" class="form-control" name="updateUsername" placeholder="Username" readonly required>
                    </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <a id="btnUpdatePass" href="" name="btnUpdatePass" class="btn btn-primary" >Ganti Password</a>
                <button id="btnUpdate" type="submit" name="submit" class="btn btn-success">Update</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal update -->

<!-- admin user js -->
<script type="text/javascript" src="src/js/admin-user.js"></script>
