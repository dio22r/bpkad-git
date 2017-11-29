<!DOCTYPE html>

<html lang="en">


	<head>


	<?php 
	$title = isset($ctlTitle) ? "BPKAD | " . $ctlTitle
	    : "BPKAD";

	?>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Expires" content="0" />
	<meta http-equiv="Cache-Control" content="no-cache" />

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title><?php echo $title ?></title>

	<link type="text/css" rel="stylesheet" href="<?php echo base_url
	("assets/css/bootstrap.css") ?>" />
	<link type="text/css" rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap-responsive.css") ?>" />


	<?php
	if (isset($ctlArrCss)) {
	    foreach($ctlArrCss as $key => $val) {
	        echo '<link type="text/css" rel="stylesheet" href="'.$val.'" />';
	    }
	}
	?>

	<script type="text/javascript">
		const BASEURL = "<?php echo base_url("index.php"); ?>/";
	</script>

	<script src="<?php echo base_url("assets/js/jquery.js") ?>" ></script>
	<script src="<?php echo base_url("assets/js/bootstrap.js") ?>" ></script>
	<script src="<?php echo base_url("assets/js/_form_helper.js") ?>" ></script>
	<script src="<?php echo base_url("assets/js/_library_table.js") ?>" ></script>
	<?php
	if (isset($ctlArrJs)) {
	    foreach($ctlArrJs as $key => $val) {
	        echo '<script src="'. $val .'" ></script>';
	    }
	}
	?>


	</head>

	<body >

		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	        <div class="container">
	            <!-- Brand and toggle get grouped for better mobile display -->
	            <div class="navbar-header">
	                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	                    <span class="sr-only">Toggle navigation</span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                </button>
	                <a class="navbar-brand" href="#">BPKAD - Sekretariat</a>
	            </div>
	            <!-- Collect the nav links, forms, and other content for toggling -->
	            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	                <ul class="nav navbar-nav">
	                    <li>
	                        <a href="<?php echo base_url(); ?>">Arsip Surat</a>
	                    </li>
	                    <li>
	                        <a href="<?php echo base_url("index.php/spt_spd"); ?>">SPT-SPD</a>
	                    </li>
	                    <!--
	                    <li>
	                        <a href="#"><span class="glyphicon glyphicon-info-sign"></span> Petunjuk</a>
	                    </li>
	                    -->
	                </ul>
					<ul class="nav navbar-nav pull-right">
	                    <li class="">
	                        <a href="<?php echo base_url("index.php/login/logout/"); ?>">
	                        <span class="glyphicon glyphicon-log-out"></span> Logout
	                        </a>
	                    </li>

	                </ul>

	            </div>
	            <!-- /.navbar-collapse -->
	        </div>
	        <!-- /.container -->
	    </nav>

        <div class="container">