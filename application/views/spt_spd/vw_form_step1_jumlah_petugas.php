<div class="container">

	    <div class="btn-group  pull-right">
	        <a href="<?php echo $ctlUrlTable; ?>" class="btn btn-default">
	            <span class="glyphicon glyphicon-list-alt"></span> Semua Data
	        </a>
        </div>
    <div>
        <h2 style="text-align:center;font-weight:bold"> ~ Form Surat Perintah Tugas ~ </h2>

        <hr />
        
        <form class="well form-horizontal bv-form" method="post"
        data-toggle="validator" role="form"
        action="<?php echo $ctlUrlSubmit; ?>">
            <fieldset>
                <input type="hidden" name="as_id" value="<?php echo isset($ctlId) ? $ctlId : ""; ?>"/>
                
                <div class="form-group">
                    <label class="control-label col-md-4" for="as_dari">Jumlah Orang : </label>
                    <div class="col-md-4">
                    	<div class="input-group">
	                        <input type="text" name="as_jumlah_orang"
	                            class="form-control" id="as_jumlah_orang"
	                            placeholder="Jumlah Orang"
	                            value="<?php
	                                echo misc_helper::get_form_value(
	                                    $ctlArrData, "as_jumlah_orang");
	                            ?>" required/>
                            <div class="input-group-btn">
                            	<button type="submit" value="submit" name="submit"
                					class="btn btn-warning">
                					<span class="glyphicon glyphicon-send"></span>
                					&nbsp;Submit
            					</button>
        					</div>
                        </div>
                	</div>
            	</div>
            </fieldset>
        </form>
    </div>

</div>