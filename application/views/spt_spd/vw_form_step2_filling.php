<div class="box box-info">
        <div class="box-header">
            <h3 class="box-title">Form Surat Perintah Tugas</h3>
            <div class="box-tools">
                <div class="btn-group">
                    <a href="<?php echo $ctlUrlTable; ?>"
                        class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-list-alt"></span> Semua Data
                    </a>
                </div>
            </div>
        </div>
        <div class="box-body">


        <div>
        
        
        <form class="form-horizontal " method="post"
        data-toggle="validator" role="form"
        action="<?php echo $ctlSubmitUrl; ?>">
            <fieldset>
                <input type="hidden" name="tspt_id" value="<?php echo isset($ctlId) ? $ctlId : ""; ?>"/>

                <?php for($i = 1; $i <= $ctlJumlahPetugas; $i += 2) { ?> 
                    <div class="row">

                    <?php
                        if ($i + 1 > $ctlJumlahPetugas) {
                            $limit = 1;
                        } else {
                            $limit = 2;
                        }
                    ?>
                    <?php for($j = 0; $j < $limit; $j++) { ?> 
                    <div class ="col-md-6 border-petugas">
                        <div class="form-group">
                            <label class="control-label col-md-4" for="tspd_ta_id">
                                Pegawai Pelaksana Tugas ke-<?php echo $i+$j; ?> :
                            </label>
                            <div class="col-md-8">
                                <?php
                                    $adds = 'class="form-control petugas"';
                                    echo form_dropdown(
                                        'tspd_ta_id[]',
                                        $ctlArrPetugas,
                                        misc_helper::get_form_value(
                                            $ctlArrDetail[$i+$j-1], "ta_id"
                                        ), $adds
                                    );

                                    
                                ?>
                                <div class="petugas-detail" style="display:none;">
                                    <p class="form-control-static data-nip"> </p>
                                    <p class="form-control-static data-pangkat"> </p>
                                    <p class="form-control-static data-jabatan"> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    </div>
                <?php } ?>

                <hr />
                <div class="form-group">
                    <label class="control-label col-md-4" for="tspt_nomor">Nomor SPT : </label>
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

                <div class="form-group">
                    <label class="control-label col-md-4" for="tspt_tanggal">Tanggal SPT : </label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="text" name="tspt_tanggal"
                                class="form-control" id="tspt_tanggal"
                                placeholder="Tanggal SPT"
                                value="<?php
                                    echo misc_helper::get_form_value(
                                        $ctlArrData, "tspt_tanggal");
                                ?>" required/>
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-4" for="tspt_tgl_spd">Tanggal SPD : </label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="text" name="tspt_tgl_spd"
                                class="form-control" id="tspt_tgl_spd"
                                placeholder="Tanggal SPD"
                                value="<?php
                                    echo misc_helper::get_form_value(
                                        $ctlArrData, "tspt_tgl_spd");
                                ?>" required/>
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-md-4" for="tspt_tgl_berangkat">Tanggal Berangkat : </label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="text" name="tspt_tgl_berangkat"
                                class="form-control" id="tspt_tgl_berangkat"
                                placeholder="Tanggal Berangkat"
                                value="<?php
                                    echo misc_helper::get_form_value(
                                        $ctlArrData, "tspt_tgl_berangkat");
                                ?>" required/>
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-4" for="tspt_jmlh_hari"> Lama Perjalanan Dinas: </label>
                    <div class="col-md-2">
                        <div class="input-group">
                            <input type="text" name="tspt_jmlh_hari"
                                class="form-control" id="tspt_jmlh_hari"
                                placeholder="Jumlah Hari"
                                value="<?php
                                    echo misc_helper::get_form_value(
                                        $ctlArrData, "tspt_jmlh_hari");
                                ?>" required/>
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default">
                                    Hari
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-4" for="tspt_tgl_kembali">Tanggal Kembali : </label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="text" name="tspt_tgl_kembali"
                                class="form-control" id="tspt_tgl_kembali"
                                placeholder="Tanggal Kembali"
                                value="<?php
                                    echo misc_helper::get_form_value(
                                        $ctlArrData, "tspt_tgl_kembali");
                                ?>" required/>
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-4" for="tspt_maksud">Maksud : </label>
                    <div class="col-md-4">
                        <textarea type="text" name="tspt_maksud"
                            class="form-control" id="tspt_maksud"
                            placeholder="Maksud" required><?php
                                echo misc_helper::get_form_value(
                                    $ctlArrData, "tspt_maksud");
                            ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-4" for="tspt_tujuan">Tujuan : </label>
                    <div class="col-md-4">
                        <textarea type="text" name="tspt_tujuan"
                            class="form-control" id="tspt_tujuan"
                            placeholder="Tujuan" required><?php
                                echo misc_helper::get_form_value(
                                    $ctlArrData, "tspt_tujuan");
                            ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-4" for="tspt_transport">Moda Transportasi : </label>
                    <div class="col-md-4">
                        <input type="text" name="tspt_transport"
                            class="form-control" id="tspt_transport"
                            placeholder="Transportasi: Darat / Udara / Laut"
                            value="<?php
                                echo misc_helper::get_form_value(
                                    $ctlArrData, "tspt_transport");
                            ?>" required/>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-md-4" for="tspt_tpt_berangkat">Tempat berangkat : </label>
                    <div class="col-md-4">
                        <input type="text" name="tspt_tpt_berangkat"
                            class="form-control" id="tspt_tpt_berangkat"
                            placeholder="Contoh: Amurang"
                            value="<?php
                                echo misc_helper::get_form_value(
                                    $ctlArrData, "tspt_tpt_berangkat");
                            ?>" required/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-4" for="tspt_pengesahan_spt">Pengesahan SPT : </label>
                    <div class="col-md-4">
                            <?php
                                $adds = 'class="form-control"';
                                echo form_dropdown(
                                    'tspt_pengesahan_spt',
                                    $ctlArrPengesahan,
                                    misc_helper::get_form_value(
                                        $ctlArrData, "tspt_pengesahan_spt"
                                    ), $adds
                                );
                            ?>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-md-4" for="tspt_pengesahan_spd">Pengesahan SPD : </label>
                    <div class="col-md-4">
                        <?php
                            $adds = 'class="form-control"';
                            echo form_dropdown(
                                'tspt_pengesahan_spd',
                                $ctlArrPengesahan,
                                misc_helper::get_form_value(
                                    $ctlArrData, "tspt_pengesahan_spd"
                                ), $adds
                            );
                        ?>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-md-4" for="tspt_pengesahan_lbr3">Pengesahan Lembar 3 : </label>
                    <div class="col-md-4">
                        <?php
                            $adds = 'class="form-control"';
                            echo form_dropdown(
                                'tspt_pengesahan_lbr3',
                                $ctlArrPengesahan,
                                misc_helper::get_form_value(
                                    $ctlArrData, "tspt_pengesahan_lbr3"
                                ), $adds
                            );
                        ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-4" for="tspt_pptk">PPTK : </label>
                    <div class="col-md-4">
                        <?php
                            $adds = 'class="form-control"';
                            echo form_dropdown(
                                'tspt_pptk',
                                $ctlArrPPTK,
                                misc_helper::get_form_value(
                                    $ctlArrData, "tspt_pptk"
                                ), $adds
                            );
                        ?>
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
        </form>

        </div>
    </div>

</div>


<script>
    var config = {
        urlData: "<?php echo $ctlUrlData; ?>"
    };
</script>
