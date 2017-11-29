	<div class="row">
		<div class="col-xs-12">
            <div class="box box-warning">
            	<div class="box-header">
                	<h3 class="box-title"> ~ Data SPT & SPD </h3>
                	<div class="box-tools">
	                	<a href="<?php echo $ctlUrlNew; ?>"
			                class="btn btn-warning btn-sm" target="_blank">
			        	   	<span class="glyphicon glyphicon-plus"></span> &nbsp;Buat SPT-SPD
		        		</a>
	        		</div>
                </div>

            	<div class="box-body table-responsive no-padding">
                	<table class="table table-hover">
	                	<thead>
	                		<tr>
	            				<th width="5%">#</th>
	            				<th width="15%">Tgl. Berangkat</th>
	            				<th width="30%">Tujuan</th>
	            				<th width="40%">Maksud</th>
	            				<th width="10%">Action</th>
	                		</tr>
	                	</thead>
	                	<?php foreach($ctlArrData as $key => $arrVal) { ?>
	                		<tr>
	                		<?php foreach($arrVal as $key => $val) { ?>
	                			<td><?php echo nl2br($val); ?></td>
	                		<?php } ?>
	                		</tr>
	                	<?php } ?>
                	</table>

        		</div>

        		<div class="box-footer clearfix">
                  	<ul class="pagination pagination-sm no-margin pull-right">
                		<?php echo $ctlPaging; ?>
            		</ul>
        		</div>
            </div>
        </div>
    </div>