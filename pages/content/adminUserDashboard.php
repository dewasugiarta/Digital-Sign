<?php
  include("config/dbConfig.php");

  $db = new Database;
  $db->connect();
  $db->select('user',
                'user.idUser, user.nama, user.nik, user.pangkat_golongan,'
                .'user.jabatan, user.instansi, opd.nama_opd, user.email, '
                .'user.telepon, user.username',
                'opd ON user.id_opd=opd.id_opd',null,'idUser DESC');
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
                  <button class="btn btn-md btn-success add-opd" data-toggle="modal" data-target="#add-opd">
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
                          <th>NIK</th>
                          <th>Pangkat/Golongan</th>
                          <th>Jabatan</th>
                          <th>Instansi</th>
                          <th>OPD</th>
                          <th>Email</th>
                          <th>Telepon</th>
                          <th>Username</th>
                          <th>Berkas</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>


                      <tbody>
                      <?php
                        foreach($res as $user){
                          echo '
                            <tr>
                            <td>'.$user['nama'].'</td>
                            <td>'.$user['idUser'].'</td>
                            <td>'.$user['nik'].'</td>
                            <td>'.$user['pangkat_golongan'].'</td>
                            <td>'.$user['jabatan'].'</td>
                            <td>'.$user['instansi'].'</td>
                            <td>'.$user['nama_opd'].'</td>
                            <td>'.$user['email'].'</td>
                            <td>'.$user['telepon'].'</td>
                            <td>'.$user['username'].'</td>
                            <td>kosong</td>

                            <td>
                              <button class="btn btn-sm" onclick="getDetail('.$user['idUser'].')">
                                <i class="fa fa-edit"></i>
                              </button>
                              <button class="btn btn-sm" onclick="delete('.$user['idUser'].')">
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
