<?php
/**
 * Quiz System Header
 *
 * @param       $showMenu If the menu will be displayed
 * @author 		Ashiru Ali & Eduardo Hernandez
 * @package 	Web Development/Cousework
 * @version     1.0.0
 */
?>
<html class="no-js" lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<!-- Modernizer -->
		<script src="<?php echo base_url('assets');?>/js/modernizr.js"></script>

		<!--[if IE 8]>
        	<script>var IE8 = true;</script>
        	<script src="http://formstone.it/js/site.ie8.js"></script>
			<link rel="stylesheet" href="http://formstone.it/css/demo.ie8.css">
		<![endif]-->
		<!--[if IE 9]>
        	<script>var IE9 = true;</script>
        	<script src="http://formstone.it/js/site.ie9.js"></script>
		<![endif]-->

		<link href="<?php echo base_url();?>assets/css/jquery.fs.shifter.css" rel="stylesheet" type="text/css" media="all">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style_dropdown.css">
		<script src="<?php echo base_url();?>assets/js/jquery-2.1.1.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.fs.shifter.js"></script>
		<script src="<?php echo base_url();?>assets/js/controls.js"></script>
		<script src="<?php echo base_url();?>assets/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/owl.carousel.min.js" type="text/javascript"></script>

		<style>
			/*.shifter .shifter-handle { float: right; margin: -5px 0 0; }*/
			.shifter .shifter-navigation { background: #f9f9f9; padding: 100px 30px 30px; }
			.shifter .shifter-navigation a { color: #666; display: block; font-size: 18px; margin: 0 0 15px; }
		</style>

		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/owl.carousel.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/owl.theme.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/owl.transitions.css" />

		<script>
			$(document).ready(function() {
				$.shifter({
					maxWidth: Infinity
				});
			});
		</script>
		<!--[if lt IE 9]>
		  <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<title><?php //echo $title; ?>Quiz System</title>
		
	</head>
	<body class="gridlock demo shifter">
		<header id="header">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-sm-12">
					<a href="" class="page-name">Quiz System</a>
					<?php if(!isset($showMenu)){
							$showMenu = true;
					}?>
					<?php if($showMenu){ ?>
						<span class="shifter-handle"><i class="fa fa-bars"></i></span>
					<?php } ?>	
				</div>
			</div>

		</header>
		<div class="modal fade" id="modal_global">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		        <h4 class="modal-title"></h4>
		      </div>
		      <div class="modal-body">
		        <p></p>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		<?php if(isset($showQuizNav) && $showQuizNav){ ?>
		<div class="container fixed-quiz-elements">
			<div class="row">
				<div class="col-sm-3 col-xs-4 text-right timer_container">
					<p><span class="timer hidden-xs">TIMER</span> <span class="timer">15:00 m</span></p>
				</div>
				<div class="col-sm-9 col-xs-8 text-right quick_nav">
					<nav class ='quick_nav_inner'>
						<div class="handler prev"><a href="javascript:void(0);"><i class="fa fa-chevron-left"></i></a></div>
						<div class = 'owl-carousel'>
							<?php for ($i=1; $i <= $questionsCount; $i++) { ?>
								<div class = 'slide' style="width:20px"><a href="#question_<?php echo $i;?>" class="question_<?php echo $i;?>_link"><?php echo $i;?></a></div>
							<?php } ?>
						</div>
						<div class="handler next"><a href="javascript:void(0);"><i class="fa fa-chevron-right"></i></a></div>
						<!-- <div class="owl-carousel">
						  <div> Your Content </div>
						  <div> Your Content </div>
						  <div> Your Content </div>
						  <div> Your Content </div>
						  <div> Your Content </div>
						  <div> Your Content </div>
						  <div> Your Content </div>
						</div> -->
					</nav>
				</div>
			</div>
		</div>
		<?php } ?>
		<div class="shifter-page">
			<div class="container">

	