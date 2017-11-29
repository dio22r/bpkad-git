	<div class="row">
		<div class="col-xs-12">
            <div class="box box-warning">
            	<div class="box-header">
                	<h3 class="box-title"> ~ Form Nomor Surat </h3>
                	<div class="box-tools">
	                	<a href="<?php echo $ctlUrlNew; ?>"
			                class="btn btn-warning btn-sm" target="_blank">
			        	   	<span class="glyphicon glyphicon-plus"></span> &nbsp;Buat SPT-SPD
		        		</a>
	        		</div>
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
                	</table>

                    
        		</div>
            </div>

            <div class="box box-default">
                <div class="box-header">


                    <form class="form-horizontal " method="post"
                        data-toggle="validator" role="form"
                        action="<?php echo $ctlUrlSubmit; ?>">
                        <fieldset>
                            <?php
                                $tempData = array(
                                    'tspt_id'  => misc_helper::get_form_value(
                                        $ctlArrData, "tspt_id"
                                    )
                                );
                                echo form_hidden($tempData);
                            ?>

                             <div class="form-group">
                                <label class="control-label col-md-2" for="tspt_nomor">Nomor SPT : </label>
                                <div class="col-md-4">
                                    <input type="text" name="tspt_nomor"
                                        class="form-control" id="tspt_nomor"
                                        placeholder="Nomor SPT"
                                        value="<?php
                                            echo misc_helper::get_form_value(
                                                $ctlArrData, "tspt_nomor");
                                        ?>"/>
                                </div>
                            </div>

                            <hr />
                            <div class="form-group">
                                <label class="control-label col-md-2" for="tspt_nomor">
                                    
                                </label>

                                <div class="col-md-4">
                                    <strong>Nomor SPD</strong>
                                </div>
                            </div>
                            <?php foreach($ctlArrDataDetail as $key => $arrVal) { ?>
                                
                                <div class="form-group">
                                    <label class="control-label col-md-2"
                                        for="tspd_nomor<?php echo $key; ?>">
                                        <?php echo $arrVal["ta_nama"]; ?> :
                                    </label>
                                    <div class="col-md-4">
                                    <?php
                                        $tempData = array(
                                            'name'  => 'tspd_nomor[]',
                                            'id' => 'tspd_nomor'.$key,
                                            'value' =>  misc_helper::get_form_value(
                                                    $arrVal, "tspd_nomor"
                                            ),
                                            'class' => 'form-control',
                                            'placeholder' => "Nomor SPD"
                                        );
                                        echo form_input($tempData);

                                        $tempData = array(
                                            'tspd_id[]'  => misc_helper::get_form_value(
                                                $arrVal, "tspd_id"
                                            )
                                        );
                                        echo form_hidden($tempData);
                                    ?>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="form-group">
                                <label class="control-label col-md-2" for="tspt_nomor">
                                    
                                </label>

                                <div class="col-md-4">
                                    <?php
                                        $arrBtn = array(
                                            "class" => "btn btn-default",
                                            "value" => "Simpan",
                                            "title" => "Kembali"
                                        );
                                        
                                        echo anchor($ctlUrlTable, 'Kembali', $arrBtn) . " ";

                                        $arrBtn = array(
                                            "class" => "btn btn-primary",
                                            "type" => "submit",
                                            "value" => "Simpan",
                                            "content" => "Simpan"
                                        );
                                        echo form_button($arrBtn);
                                    ?>
                                </div>
                            </div>
                        </fieldset>
                    </form>

                </div>
            </div>
        </div>
    </div>