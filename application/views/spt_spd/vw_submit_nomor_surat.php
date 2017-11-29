<div class="row">
    <div class="col-xs-12">
    	<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Submit</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div class="box-body">
				<?php if ($ctlResult == true) { ?>
				<div class="callout callout-success">
	                <h4>Data Berhasil di Simpan!</h4>

                </div>
            	<div class="box-body table-responsive no-padding">
                	<table class="table table-hover">
	                	
                		<tr>
            				<td width="20%"><strong>Tgl. Berangkat</strong></td>
            				<td width="80%">
            					<?php
            					
            					echo misc_helper::format_idDate($ctlArrData["tspt_tgl_berangkat"]);

            					?>
            				</td>
                		</tr>
                	
                		<tr>
            				<td ><strong>Tgl. Kembali</strong></td>
            				<td >
            					<?php
            					
            					echo misc_helper::format_idDate($ctlArrData["tspt_tgl_kembali"]);

            					?>
        					</td>
                		</tr>

                		<tr>
            				<td ><strong>Maksud</strong></td>
            				<td ><?php echo nl2br($ctlArrData["tspt_maksud"]); ?></td>
                		</tr>

                		<tr>
            				<td ><strong>Tujuan</strong></td>
            				<td ><?php echo nl2br($ctlArrData["tspt_tujuan"]); ?></td>
                		</tr>

                		<tr>
            				<td ><strong>Nomor. SPT</strong></td>
            				<td ><?php echo $ctlArrData["tspt_nomor"]; ?></td>
                		</tr>
                		
                		<tr>
            				<td ><strong>Nomor. SPD</strong></td>
            				<td ></td>
                		</tr>
                		
                		<?php foreach($ctlArrDataDetail as $key => $arrVal) { ?>

                		<tr>
            				<td ><?php echo $arrVal["ta_nama"]; ?></td>
            				<td ><?php echo $arrVal["tspd_nomor"]; ?></td>
                		</tr>

                		<?php } ?>
                	</table>

                    
        		</div>
        		
	            <?php } else { ?>
	            <div class="callout callout-danger">
	            	<h4>Data Gagal Tersimpan!</h4>
	            	<p>
	            		Maaf data tidak berhasil tersimpan, terjadi kesalahan pada sistem, silahkan coba lagi.
	            	</p>
	            </div>
	            <?php } ?>
			</div>

			<div class="box-footer">
				<a class="btn btn-warning" href="<?php echo $ctlBackUrl; ?>">
					<i class="glyphicon glyphicon-chevron-left"></i> Kembali
				</a>
				<a class="btn btn-success" href="<?php echo $ctlHomeUrl; ?>">
					<i class="glyphicon glyphicon-ok"></i> Oke
				</a>
			</div>
		</div>
	</div>
</div>
