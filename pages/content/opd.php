
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
                              <tr>
                                <td>Dinas Komunikasi, Informatika dan Statistik</td>
                                <td>Jl. Majapahit No.1 Lantai 3</td>
                                <td>0361 431229</td>
                                <td>I Dewa Made Agung, SE, M.Si</td>
                                <td>kominfo@denpasarkota.go.id</td>
                                <td>
                                  <button class="btn btn-sm" data-toggle="modal" data-target="#edit-opd">
                                    <i class="fa fa-edit"></i>
                                  </button>
                                  <button class="btn btn-sm">
                                    <i class="fa fa-times"></i>
                                  </button>
                                </td>
                              </tr>
                              <tr>
                                <td>Dinas Perindustrian dan Perdagangan</td>
                                <td>Jl. Majapahit No.1 Lantai 3</td>
                                <td>0361 8495711</td>
                                <td>Drs. I Wayan Gatra, M.Si</td>
                                <td>perindag@denpasarkota.go.id</td>
                                <td>
                                  <button class="btn btn-sm" data-toggle="modal" data-target="#edit-opd">
                                    <i class="fa fa-edit"></i>
                                  </button>
                                  <button class="btn btn-sm">
                                    <i class="fa fa-times"></i>
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
                  <form action="">
                    <div class="form-group">
                      <label >Nama OPD</label>
                      <input type="text" class="form-control" name="nama-opd" placeholder="Nama OPD">
                    </div>
                    <div class="form-group">
                      <label> Alamat OPD</label>
                      <input type="text" class="form-control" name="alamat-opd" placeholder="Alamat OPD">
                    </div>
                    <div class="form-group">
                      <label> Kepala OPD</label>
                      <input type="text" class="form-control" name="kepala-opd" placeholder="Kepala OPD">
                    </div>
                    <div class="form-group">
                      <label> Telepon OPD</label>
                      <input type="text" class="form-control" name="telepon-opd" placeholder="Telepon OPD">
                    </div>
                    <div class="form-group">
                      <label> Email OPD</label>
                      <input type="text" class="form-control" name="email-opd" placeholder="Email OPD">
                    </div>
                    
                  </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="submit" class="btn btn-success">Simpan</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
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
                  <form action="">
                    <div class="form-group">
                      <label >Nama OPD</label>
                      <input type="text" class="form-control" name="nama-opd" placeholder="Nama OPD">
                    </div>
                    <div class="form-group">
                      <label> Alamat OPD</label>
                      <input type="text" class="form-control" name="alamat-opd" placeholder="Alamat OPD">
                    </div>
                    <div class="form-group">
                      <label> Kepala OPD</label>
                      <input type="text" class="form-control" name="kepala-opd" placeholder="Kepala OPD">
                    </div>
                    <div class="form-group">
                      <label> Telepon OPD</label>
                      <input type="text" class="form-control" name="telepon-opd" placeholder="Telepon OPD">
                    </div>
                    <div class="form-group">
                      <label> Email OPD</label>
                      <input type="text" class="form-control" name="email-opd" placeholder="Email OPD">
                    </div>
                    
                  </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="submit" class="btn btn-success">Simpan</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                </div>

              </div>
            </div>
          </div>