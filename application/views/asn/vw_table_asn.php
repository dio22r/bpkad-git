    
        <!-- Page Header -->

        <div class="row">
            <div class="col-xs-12">

                <div class="box box-warning">
                    <form method="post" action="<?php echo $ctlUrlTarget; ?>">
                        <div class="box-header">
                            <h3 class="box-title">Tabel Data ASN</h3>
                            <div class="box-tools">
                                <div class="input-group input-group-sm" style="width: 250px;">
                                    <input class="form-control" name="search"
                                        value="<?php echo $ctlSearch; ?>"
                                        placeholder="Tuliskan tanggal contoh : 2017-08-17">
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-default" aria-label="Help">
                                            <span class="glyphicon glyphicon-search"></span>
                                        </button>
                                        <a href="<?php echo $urlAdd; ?>" class="btn btn-warning">
                                            <span class="glyphicon glyphicon-plus"></span> Tambah Data
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="20%">Nama</th>
                                    <th width="15%">NIP.</th>
                                    <th width="15%">Pangkat</th>
                                    <th width="40%">Jabatan</th>
                                    <th width="5%">Action</th>
                                </tr>
                            </thead>
                            <?php foreach($ctlArrRow as $key => $arrVal) { ?>
                                <tr>
                                    <td><?php echo $ctlStartItem + $key + 1; ?></td>
                                    <td><?php echo $arrVal["ta_nama"]; ?></td>
                                    <td><?php echo $arrVal["ta_nip"]; ?></td>
                                    <td><?php echo $arrVal["ta_pangkat"]; ?></td>
                                    <td><?php echo $arrVal["ta_jabatan"]; ?></td>
                                    <td>
                                        <div class="input-group-btn">
                                            <a href="<?php echo $arrVal["url_edit"]; ?>"
                                                class="btn btn-default btn-xs">
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </a>
                                            <a href="<?php echo $arrVal["url_view"]; ?>"
                                                class="btn btn-default btn-xs">
                                                <span class="glyphicon glyphicon-eye-open"></span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">
                            <?php echo $ctlPagination ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>