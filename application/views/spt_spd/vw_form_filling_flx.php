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
        action="<?php echo $ctlSubmitUrl; ?>">
            <fieldset>
                <input type="hidden" name="tspt_id" value="<?php echo isset($ctlId) ? $ctlId : ""; ?>"/>

                

                <div class="panel panel-warning">
                    <div class="panel-heading">Daftar Petugas</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4"> </div>
                            <div class="col-md-4">
                                <input class="form-control bs-autocomplete" id="search" value="" placeholder="Ketik Nama Petugas ..." type="text" data-source="demo_source.php" data-hidden_field_id="city-code" data-item_id="ta_id" data-item_label="ta_nama" autocomplete="off">
                            </div>
                            <div class="col-md-4"> </div>
                        </div>

                        <table class="table" id="table-petugas">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="30%">Nama (NIP)</th>
                                    <th width="15%">Pangkat</th>
                                    <th width="35%">Jabatan</th>
                                    <th width="15%">No. SPD</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>

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

                
                <!--
                <div class="form-group">
                    <label class="control-label col-md-4" for="tspt_jenis">Jenis SPT/SPD : </label>
                    <div class="col-md-4">
                        <input type="text" name="tspt_jenis"
                            class="form-control" id="tspt_jenis"
                            placeholder="Jenis SPT/SPD"
                            value="<?php
                                echo misc_helper::get_form_value(
                                    $ctlArrData, "tspt_jenis");
                            ?>" required/>
                    </div>
                </div>
                -->

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
                                $adds = 'class="form-control petugas"';
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
                            $adds = 'class="form-control petugas"';
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
                            $adds = 'class="form-control petugas"';
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
                            $adds = 'class="form-control petugas"';
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


<script>
    var config = {
        urlData: "<?php echo $ctlUrlData; ?>"
    };
    var petugas = <?php echo $ctlArrAutoComplete; ?>;
    var count = 1;

    $(document).ready(function() {
        var sptclass = new spt_spd(config);

        $('#search').autocomplete({
            source: petugas,
            minLength: 0,
            scroll: true,
            select: function( event, ui ) {
                console.log( ui.item );

                $("#table-petugas").append("<tr>"
                    + "<td>" 
                        + '<button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
                    + "</td>"
                    + "<td>" + ui.item.value + "<br />NIP. : " + ui.item.nip + "</td>"
                    + "<td>" + ui.item.pangkat + "</td>"
                    + "<td>" + ui.item.jabatan + "</td>"
                    + "<td>"
                        + "<input type='text' class='form-control' placeholder='Nomor SPD' name='tspd_nomor[]' />"
                        + "<input type='hidden' class='form-control' name='ta_id[]' value='"+ ui.item.id +"'/>"
                    + "</td>"
                    + "</tr>"
                    );
                count ++;
                /*
                $.ajax({
                    type: "POST",
                    url: this.urlData,
                    data: {'id':id},
                    dataType: "json",
                    cache: false,
                    success: function(data) {
                        console.log(data);
                        that.populate_data(data, curentEl);
                    },
                    error: function() {
                        console.log("error");
                    }
                });*/
            }
        }).focus(function() {
            $(this).autocomplete("search", "");
        });

        $( document ).on( "click", ".close", function() {
            $(this).parent().parent().remove();
        });
    });
</script>
