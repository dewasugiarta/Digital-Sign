<?php
  include("config/dbConfig.php");

  $db = new Database;
  $db->connect();

  $db->select('template_surat','id_template,nama_template,source,upload_date,upload_time');
  $res = $db->getResult();
  $res = $res[0];


  //verify if data exist
  if(count($res)){
    $fileSource = $res['source'].$res['nama_template'];
    $fileDate = $res['upload_date'];
    $fileTime = $res['upload_time'];
  }else{
      $fileSource = '#';
  }
  

?>

          <!-- page content -->
              <div class="right_col" role="main">
                <div class="">
                  <div class="page-title">
                    <div class="title_left">
                      <h3>Template Surat Rekomendasi</h3>
                    </div>
                    <div class="title_right">
                    </div>
                  </div>

                  <div class="clearfix"></div>

                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="x_panel">
                        <div class="x_title">
                          <h2>Update terakhir :
                          <?php 
                                echo $fileDate.', pukul '.$fileTime;
                            ?>
                          </h2>

                          <div class="clearfix">
                            
                          </div>
                        </div>
                        <div class="x_content">
                            <a class="btn btn-md btn-primary" href="<?php echo $fileSource;?>">
                                <i class="fa fa-download"></i>
                                Download Template Surat
                            </a>
                            <br>
                            <ul>
                                <li>Download template surat yang sudah tersedia</li>
                                <li>Edit dan unggah/upload dalam format PDF</li>
                            </ul>
                        </div>
                      </div>
                    </div>

                </div>
              </div>
          <!-- /page content -->

          <!-- Add OPD Modal -->
          <div class="modal" id="change-template">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Upload Template Surat Baru</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                  <form action="process/admin/update-template.php" method="POST" enctype="multipart/form-data" onsubmit="return handleTemplateSubmit()">
                    <div class="form-group">
                      <label>Pilih Template Surat Baru</label>
                      <input type="file" id="new-template" class="form-control" name="file" onchange="handleFileChange()" required>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="submit" name="submit" id="submit-new-template" class="btn btn-success">Simpan</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                  </form>
                </div>

              </div>
            </div>
          </div>

        