
        <div class="row">
            <div class="col-xs-12">
            	<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form ASN</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="<?php echo $ctlSubmitUrl; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama ASN</label>

                  <div class="col-sm-10">
                    <input name="ta_nama" class="form-control" id="ta_nama"  placeholder="Nama ASN">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">NIP.</label>

                  <div class="col-sm-10">
                    <input name="ta_nip" class="form-control" id="ta_nama"  placeholder="NIP">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Jabatan</label>

                  <div class="col-sm-10">
                    <?php
                    	$adds = 'class="form-control pangkat select2" style="width:100%"';
                    	echo form_dropdown(
	                    	"taj_id",
	                    	$ctlArrJabatan,
	                    	misc_helper::get_form_value(
	                            $ctlArrJabatan, "taj_id"
	                        ), $adds
                    	);
                    ?>
                  </div>
                </div>

                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">
                      Tanggal SK Jabatan
                  </label>

                  <div class="col-sm-10">
                    <div class="input-group">
                      <input name="tajt_date_start" class="form-control datepicker" id="tglLahir" data-date-format="yyyy-mm-dd" placeholder="Tanggal SK Jabatan">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Pangkat</label>

                  <div class="col-sm-10">
                    <?php
                      $adds = 'class="form-control pangkat select2" style="width:100%"';
                      echo form_dropdown(
                        "tap_id",
                        $ctlArrPangkat,
                        misc_helper::get_form_value(
                              $ctlArrJabatan, "taj_id"
                          ), $adds
                      );
                    ?>
                  </div>
                </div>

                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">
                      Tanggal SK Pangkat
                  </label>

                  <div class="col-sm-10">
                    <div class="input-group">
                      <input name="tapt_date_start" class="form-control datepicker" id="tglLahir" data-date-format="yyyy-mm-dd" placeholder="Tanggal SK Pangkat">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>
                  </div>
                </div>

              </div>

              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Status</label>

                <div class="col-sm-10">
                  <?php
                    $adds = 'class="form-control"';
                    $arrStatus = array(
                      1 => "Aktif",
                      0 => "Non-Aktif"
                    );

                    echo form_dropdown(
                      "ta_status",
                      $arrStatus,
                      misc_helper::get_form_value(
                            $arrStatus, "ta_status"
                        ), $adds
                    );
                  ?>
                </div>
              </div>

              <!-- /.box-body -->
              <div class="box-footer" style="text-align:center;">
                <a href="<?php echo $ctlCancelUrl; ?>" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-info">Simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
            </div>
        </div>

        <script>
        	var config = <?php echo json_encode($ctlArrConfig); ?>;
        </script>