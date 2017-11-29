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

	                <dl class="dl-horizontal">
		                <dt>Nama</dt>
		                <dd>: <?php echo $ctlArrData["ta_nama"]; ?></dd>

		                <dt>Nip.</dt>
		                <dd>: <?php echo $ctlArrData["ta_nip"]; ?></dd>

		                <dt>Pangkat</dt>
		                <dd>: <?php echo $ctlArrData["ta_pangkat"]; ?></dd>

		                <dt>Jabatan</dt>
		                <dd>: <?php echo $ctlArrData["ta_jabatan"]; ?></dd>

		                <dt>Jabatan yang baru</dt>
		                <dd>: <?php echo $ctlArrData["jabatan_baru"]; ?></dd>
		                
		            </dl>
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
			</div>
		</div>
	</div>
</div>
