<?php
  include("config/dbConfig.php");

  $db = new Database;
  $db->connect();

  $activeUser = $_SESSION['user'];
  $db->select('user', 
  'user.iduser'.
  ',user.username'.
  ',user.nik'.
  ',user.nama'.
  ',user.pangkat_golongan'.
  ',user.jabatan'.
  ',user.instansi'.
  ',opd.nama_opd'.
  ',user.email'.
  ',user.telepon',
  'opd ON user.id_opd=opd.id_opd',"username='$activeUser'");

  $res = $db->getResult();

  

    
?>

<script type="text/javascript" src="src/js/user-profile.js"></script>
          <!-- page content -->
              <div class="right_col" role="main">
                <div class="">
                  <div class="page-title">
                    <div class="title_left">
                      <h3>Profile User</h3>
                    </div>
                    <div class="title_right">
                    </div>
                  </div>

                  <div class="clearfix"></div>

                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="x_panel">
                        <div class="x_title">
                          <h2><?php echo $_SESSION['user'];?></h2>

                          <div class="clearfix">
                            <button class="btn btn-primary add-opd" onclick="getUserDetail('<?php echo $res[0]['username']?>')">
                                <i class="fa fa-pencil"></i>
                                Update Profile
                            </button>
                          </div>
                        </div>
                        <div class="x_content">
                            <div class="col-md-7">
                            <?php
                                foreach($res as $user){
                                    echo '
                                    <ul class="list-group">
                                        <li class="list-group-item"><label class="lgi-label">Username</label>'.$user['username'].'</li>
                                        <li class="list-group-item"><label class="lgi-label">NIP</label>'.$user['iduser'].'</li>
                                        <li class="list-group-item"><label class="lgi-label">NIK</label>'.$user['nik'].'</li>
                                        <li class="list-group-item"><label class="lgi-label">Nama</label>'.$user['nama'].'</li>
                                        <li class="list-group-item"><label class="lgi-label">Pangkat/Golongan</label>'.$user['pangkat_golongan'].'</li>
                                        <li class="list-group-item"><label class="lgi-label">Jabatan</label>'.$user['jabatan'].'</li>
                                        <li class="list-group-item"><label class="lgi-label">Instansi</label>'.$user['instansi'].'</li>
                                        <li class="list-group-item"><label class="lgi-label">Unit Kerja</label>'.$user['nama_opd'].'</li>
                                        <li class="list-group-item"><label class="lgi-label">Email</label>'.$user['email'].'</li>
                                        <li class="list-group-item"><label class="lgi-label">Telepon</label>'.$user['telepon'].'</li>
                                        
                                    </ul>';
                                }
                            
                            
                            ?>
                            </div>
                        </div>
                      </div>
                    </div>

                </div>
              </div>
          <!-- /page content -->

          <!-- Add OPD Modal -->
          <div class="modal" id="update-profile">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Perbarui Profile User</h4>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                  <form action="process/user/update-user.php" method="POST" onsubmit="return handleUpdateProfile()">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" id="update-nama" name="nama" required>
                        
                    </div>
                    <div class="form-group">
                        <label>NIK</label>
                        <input type="text" class="form-control" id="update-nik" name="nik" required>
                        
                    </div>
                    <div class="form-group">
                        <label>Pangkat/Golongan</label>
                        <input type="text" class="form-control" id="update-pangkat-golongan" name="pangkat_golongan" required>
                        
                    </div>
                    <div class="form-group">
                        <label>Jabatan</label>
                        <input type="text" class="form-control" id="update-jabatan" name="jabatan" required>
                        
                    </div>
                    <div class="form-group">
                        <label>Instansi</label>
                        <input type="text" class="form-control" id="update-instansi" name="instansi" required> 
                        
                    </div>
                    <div class="form-group">
                        <label>Unit Kerja</label>
                        <select name="opd" id="update-opd" class="form-control">
                            <!-- <option value="">1</option> -->
                        </select>
                        
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" id="update-email" name="email" required>
                        
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input type="text" class="form-control" id="update-telepon" name="telepon" required>
                        
                    </div>
                      
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                  <input type="hidden" name="uname" value="<?php echo $res[0]['username']?>">
                  <button type="submit" name="submit" id="submit-new-template" class="btn btn-success">Simpan</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                  </form>
                </div>

              </div>
            </div>
          </div>

        