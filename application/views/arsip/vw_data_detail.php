
    <div class="box box-info">
    	<div class="box-header">
            <h3 class="box-title">Detail Arsip Surat</h3>
            <div class="box-tools">
		    	<div class="btn-group">
		            <a href="<?php echo $ctlUrlTable; ?>"
		            	class="btn btn-default btn-sm">
		                <span class="glyphicon glyphicon-list-alt"></span> Semua Data
		            </a>
		            <a href="<?php echo $ctlUrlEdit; ?>"
		            	class="btn btn-warning btn-sm">
		                <span class="glyphicon glyphicon-edit"></span> Edit Surat
		            </a>
	            </div>
            </div>
    	</div>
    	<div class="box-body">
    		<div class="row">
		    	<div class="col-md-6">
		    		<div class="table-responsive">
		    			<table class="table">
							<tbody>
								<tr>
									<th width="50%">No. Agenda:</th>
									<td><? echo $ctlArrData["as_no_agenda"]; ?></td>
								</tr>
								<tr>
									<th>Surat dari:</th>
									<td><? echo $ctlArrData["as_dari"]; ?></td>
								</tr>
								<tr>
									<th>Tanggal Terima:</th>
									<td><? echo $ctlArrData["as_tgl_diterima"]; ?></td>
								</tr>
								<tr>
									<th>Perihal:</th>
									<td><? echo $ctlArrData["as_perihal"]; ?></td>
								</tr>
								<tr>
									<th>Diteruskan:</th>
									<td><? echo ul($ctlArrData["as_diteruskan"]); ?></td>
								</tr>
							</tbody>
		    			</table>
		    		</div>
				</div>
				<div class="col-md-6">
		    		<div class="table-responsive">
		    			<table class="table">
							<tbody>
								<tr>
									<th width="30%">No. Surat:</th>
									<td><? echo $ctlArrData["as_no_surat"]; ?></td>
								</tr>
								<tr>
									<th>Tanggal Surat:</th>
									<td><? echo $ctlArrData["as_tgl_surat"]; ?></td>
								</tr>

								<tr>
									<th>Sifat:</th>
									<td><? echo $ctlArrData["as_sifat"]; ?></td>
								</tr>
								<tr>
									<th>Harapan:</th>
									<td><? echo ul($ctlArrData["as_ket"]); ?></td>
								</tr>
								
							</tbody>
		    			</table>
		    		</div>
				</div>
			</div>
			<?php if(trim($ctlArrData["as_catatan"])) { ?>
			<div class="col-md-12">
				<div class="callout callout-info">
					<h4>Catatan:</h4>
					<p><?php echo $ctlArrData["as_catatan"]; ?></p>
				</div>
			</div>
			<?php } ?>

			
			<?php foreach($ctlArrData["as_file"] as $key => $val) { ?>
				<div class="col-md-3">
					<a target="_blank" href="<?php echo base_url($val); ?>">
						<img class="img-responsive img-thumbnail"
							src="<?php echo base_url($val); ?>" />
					</a>
				</div>
			<?php } ?>
		
		</div>