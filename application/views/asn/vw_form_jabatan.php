
        <div class="row">
            <div class="col-xs-12">
            	<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Jabatan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="<?php echo $ctlActionPost; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama ASN</label>

                  <div class="col-sm-10">
                    <?php
                    	$adds = 'class="form-control asn select2" style="width:100%"';
                    	echo form_dropdown(
	                    	"ta_id",
	                    	$ctlArrAsn,
	                    	misc_helper::get_form_value(
	                            $ctlArrAsn, "ta_id"
	                        ), $adds
                    	);
                    ?>
                    <div class="asn-detail" style="display:none;">
                        <p class="form-control-static data-nip"> </p>
                        <p class="form-control-static data-pangkat"> </p>
                        <p class="form-control-static data-jabatan"> </p>
                    </div>
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
                  		Tanggal SK
              		</label>

        					<div class="col-sm-10">
        						<div class="input-group">
        							<input name="tajt_date_start" class="form-control datepicker" id="tglLahir" data-date-format="yyyy-mm-dd" placeholder="Tanggal SK">
        							<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        						</div>
        					</div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer" style="text-align:center;">
                <button type="submit" class="btn btn-default">Cancel</button>
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