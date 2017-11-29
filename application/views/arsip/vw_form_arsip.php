
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"> ~ Form Arsip Surat ~ </h3>
                    <div class="box-tools">
                        <a href="<?php echo $ctlUrlTable; ?>"
                            class="btn btn-default btn-sm">
                            <span class="glyphicon glyphicon-list-alt"></span> Semua Data
                        </a>
                    </div>
                </div>
                
                <form class="form-horizontal bv-form" method="post"
                data-toggle="validator" role="form"
                enctype="multipart/form-data"
                action="<?php echo $ctlSubmitUrl; ?>">
                    <div class="box-body">
                    <fieldset>
                        <input type="hidden" name="as_id" value="<?php echo isset($ctlId) ? $ctlId : ""; ?>"/>
                        
                        <div class="form-group">
                            <label class="control-label col-md-4" for="as_dari">Surat dari : </label>
                            <div class="col-md-4">
                                <input type="text" name="as_dari"
                                    class="form-control" id="as_dari"
                                    placeholder="Surat Dari"
                                    value="<?php
                                        echo misc_helper::get_form_value(
                                            $ctlArrData, "as_dari");
                                    ?>" required/>
                            </div>
                        </div>
                        
                        <?php
                            $defaultDate = date("Y-m-d");
                        ?>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="as_no_surat">No. Surat : </label>
                            <div class="col-md-4">
                                <input type="text" name="as_no_surat"
                                    class="form-control" id="input01"
                                    placeholder="Nomor Surat"
                                    value="<?php
                                        echo misc_helper::get_form_value(
                                            $ctlArrData, "as_no_surat");
                                    ?>" required/>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-4" for="as_dari">Tgl. Surat : </label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type="text" name="as_tgl_surat"
                                    class="form-control" id="tgl-surat"
                                    placeholder="Tanggal Surat"
                                    value="<?php
                                        echo misc_helper::get_form_value(
                                            $ctlArrData, "as_tgl_surat", $defaultDate);
                                    ?>" required/>
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-default btn-calendar">
                                            <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                        </button>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-4" for="as_tgl_diterima">Diterima Tgl. : </label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type="text" name="as_tgl_diterima"
                                        class="form-control" id="tgl-terima"
                                        placeholder="Tanggal Diterima"
                                        value="<?php
                                            echo misc_helper::get_form_value(
                                                $ctlArrData, "as_tgl_diterima", $defaultDate);
                                        ?>" required/>

                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-default btn-calendar">
                                            <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-4" for="as_no_agenda">No. Agenda : </label>
                            <div class="col-md-4">
                                <input type="text" name="as_no_agenda"
                                    class="form-control" id="input01"
                                    placeholder="Nomor Agenda"
                                    value="<?php
                                        echo misc_helper::get_form_value(
                                            $ctlArrData, "as_no_agenda");
                                    ?>" required/>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-4" for="as_sifat">Sifat : </label>
                            <div class="col-md-4">
                                <?php
                                    $arrOption = array(
                                        "Sangat Segera" => "Sangat Segera",
                                        "Segera" => "Segera",
                                        "Rahasia" => "Rahasia"
                                    );
                                    $adds = 'class="form-control"';
                                    echo form_dropdown(
                                        'as_sifat',
                                        $arrOption,
                                        misc_helper::get_form_value(
                                            $ctlArrData, "as_sifat"
                                        ), $adds
                                    );
                                ?>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-4" for="as_perihal">Perihal :</label>
                            <div class="col-md-4">
                                <textarea name="as_perihal"
                                    placeholder="Perihal ..."
                                    class="form-control" id="input01" required><?php
                                        echo misc_helper::get_form_value(
                                            $ctlArrData, "as_perihal");
                                    ?></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-4" for="as_diteruskan"> Diteruskan Kepada : </label>
                            <div class="col-md-4">
                                <?php
                                    
                                    $arrOption = array(
                                        "Sekretaris" => "Sekretaris",
                                        "Kabid Anggaran" => "Kabid Anggaran",
                                        "Kabid Perbendaharan" => "Kabid Perbendaharan",
                                        "Kabid Akuntansi" => "Kabid Akuntansi",
                                        "Kabid Aset" => "Kabid Aset",
                                        "Lain-lain ..." => "Lain-lain ..."
                                    );
                                    $adds = 'class="form-control"';
                                    $arrDiteruskan = misc_helper::get_form_value(
                                            $ctlArrData, "as_diteruskan", array());
                                    
                                    $arrDif = array_diff($arrDiteruskan, $arrOption);
                                    $style = $dataDiteruskan = "";
                                    if (count($arrDif) > 0) {
                                        $arrDiteruskan[] = "Lain-lain ...";
                                        $arrDif = array_values($arrDif);
                                        $dataDiteruskan = $arrDif[0];
                                        $style = "";
                                    } else {
                                        $style = "display:none";
                                    }

                                    foreach($arrOption as $key => $val) {
                                        $checked = FALSE;

                                        if (in_array($val, $arrDiteruskan)) {
                                            $checked = TRUE;
                                        }

                                        $class = "";
                                        if($val == "Lain-lain ...") {
                                            $class = "dit-others";
                                        }
                                        $arrAttr = array(
                                            "name" => "as_diteruskan[]",
                                            "value" => $key,
                                            "checked" => $checked,
                                            "class" => $class,
                                        );


                                        echo '<div class="checkbox">
                                          <label>
                                            '.form_checkbox($arrAttr).' '.$val.'
                                          </label>
                                        </div>';

                                        
                                    }
                                ?>
                                <div class="hidden-warper" style="<?php echo $style; ?>">
                                    <br />
                                    <input type="text" name="as_diteruskan_lain" class="form-control" placeholder="diteruskan kepada ..."
                                    value="<?php echo $dataDiteruskan; ?>"/>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-4" for="as_ket"> Dengan Hormat Harap : </label>
                            <div class="col-md-4">
                                <?php
                                    $arrOption = array(
                                        "Tanggapan dan Saran" => "Tanggapan dan Saran",
                                        "Proses lebih lanjut" => "Proses lebih lanjut",
                                        "Koordinasi/konfirmasikan" => "Koordinasi/konfirmasikan",
                                        "Lain-lain ..." => "Lain-lain ..."
                                    );
                                    $adds = 'class="form-control"';
                                    $arrKet = misc_helper::get_form_value(
                                            $ctlArrData, "as_ket", array());

                                    $arrDif = array_diff($arrKet, $arrOption);
                                    $dataKet = "";
                                    if (count($arrDif) > 0) {
                                        $arrKet[] = "Lain-lain ...";
                                        $arrDif = array_values($arrDif);
                                        $dataKet = $arrDif[0];
                                        $style = "";
                                    } else {
                                        $style = "display:none";
                                    }

                                    foreach($arrOption as $key => $val) {
                                        $checked = FALSE;
                                        if (in_array($val, $arrKet)) {
                                            $checked = TRUE;
                                        }

                                        $class = "";
                                        if($val == "Lain-lain ...") {
                                            $class = "ket-others";
                                        }
                                        $arrAttr = array(
                                            "name" => "as_ket[]",
                                            "value" => $key,
                                            "checked" => $checked,
                                            "class" => $class,
                                        );

                                        echo '<div class="checkbox">
                                          <label>
                                            '.form_checkbox($arrAttr).' '.$val.'
                                          </label>
                                        </div>';

                                        
                                    }
                                ?>
                                <div class="hidden-warper" style="<?php echo $style; ?>">
                                    <br />
                                    <input type="text" name="as_ket_lain" class="form-control" placeholder="Keterangan Lain ..."
                                    value="<?php echo $dataKet; ?>"/>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-4" for="as_catatan"> Catatan :</label>
                            <div class="col-md-4">
                                <textarea name="as_catatan"
                                    placeholder="Catatan ..."
                                    class="form-control" id="input01" ><?php
                                        echo misc_helper::get_form_value(
                                            $ctlArrData, "as_catatan");
                                    ?></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-4" for="as_catatan"> Upload File : </label>
                            <div class="col-md-4">
                                <input type="file" name="surat[]" class="form-control" multiple
                                <?php if (isset($ctlArrData["as_file"])
                                    && $ctlArrData["as_file"]) { ?>
                                    />
                                <br />
                                
                                    
                                <?php foreach($ctlArrData["as_file"] as $key => $val) { ?>
                                    <a href="#" class="thumbnail col-md-6" >
                                        <img src="<?php echo base_url($val); ?>" alt="" />

                                    </a>
                                <?php } ?>
                                    
                                <?php } else { ?>
                                    />
                                <?php } ?>
                            </div>
                        </div>
                        
                        <div class="form-actions">
                            <label class="col-md-4 control-label"></label>
                            <button type="submit" class="btn btn-warning"> Save
                                <span class="glyphicon glyphicon-send"></span></button>
                            <a type="reset" href="<?php echo $ctlCancelUrl; ?>"
                                class="btn btn-default"> Cancel </a>
                            <a href="<?php echo $ctlThisUrl; ?>" class="btn">
                                Lihat Data
                            </a>
                        </div>
                    
                    </fieldset>
                    </div>
                </form>
            </div>

