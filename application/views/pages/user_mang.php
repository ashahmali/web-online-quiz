<?php
/**
 * Admin - Header Template
 *
 * @param       $heading, text for heading 
 * @author 		Ashiru Ali & Eduardo Hernandez
 * @package 	Web Development/Cousework
 * @version     1.0.0
 */
 
 //print_r($users);
?>


<article class="row page admin">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<header class="header">
			<h1><?php echo $heading;?></h1>
		</header>
		
<div class="users_list row ">
	<div class="col-lg-2 col-md-2 col-sm-1 col-xs-1">
	</div>
	<div class="col-lg-8 col-md-8 col-sm-10 col-xs-10 ">
		<!-- list starts -->
		<div class="table">
			<?php foreach ($users as $key):?>
			<div class="row header">
				<!-- if the field is sortable use a tag for the column title otherwise use p tag, order_asc class when the field is sorted -->
				<div class=" col-sm-5 col-xs-6">
					<p class="name"><?php echo $key['sFirstName']." ".$key['sSurname'] ?></p>
				</div>
				<div class=" col-sm-3 hidden-xs">
					<a class="name"><?php echo $key['sName'];?></a>
				</div>
				<div class=" col-sm-2 col-xs-3">
					<a class="name order_asc"><?php echo ($key['bEnabled'])?"Enabled":"Disabled";?></a>
				</div>
				<div class="col-sm-2 col-xs-3">
					<a href="#" data-value="1" class="edit_subject" alt="edit subject" title="edit subject"><i class="fa fa-pencil-square-o"></i></a>
				</div>
			</div>
			<?php endforeach ?>
			
			
		</div>
		<!-- list finishes-->

		<!-- pagination -->
		<div class="row pagination">
			<?php echo $links; ?>
		</div>
		<!-- <div class="row pagination">
			<div class="col-xs-2 text-center">
				<a><i class="fa fa-chevron-left"></i></a>
			</div>
			<div class="col-xs-1 text-center">
				<p class="splitter">|</p>
			</div>
			<div class="col-xs-2 text-center">
				<a><i class="fa fa-chevron-right"></i></a>
			</div>
		</div> -->
		<!-- end pagination -->
	</div>
	<div class="col-lg-2 col-md-2 col-sm-1 col-xs-1">
	</div>
</div>

	</div>
</article>