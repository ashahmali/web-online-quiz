<?php
/**
 * List Users
 *
 * @author 		Ashiru Ali & Eduardo Hernandez
 * @package 	Web Development/Cousework
 * @version     1.0.0
 */
?>

<div class="users_list row ">
	<div class="col-lg-2 col-md-2 col-sm-1 col-xs-1">
	</div>
	<div class="col-lg-8 col-md-8 col-sm-10 col-xs-10 ">
		<!-- list starts -->
		<div class="table">
			<div class="row header">
				<!-- if the field is sortable use a tag for the column title otherwise use p tag, order_asc class when the field is sorted -->
				<div class=" col-sm-5 col-xs-6">
					<p class="name">Name</p>
				</div>
				<div class=" col-sm-3 hidden-xs">
					<a class="name">Subject</a>
				</div>
				<div class=" col-sm-2 col-xs-3">
					<a class="name order_asc">Status</a>
				</div>
				<div class="col-sm-2 col-xs-3">
					<a href="#" data-value="1" class="edit_subject" alt="edit subject" title="edit subject"><i class="fa fa-pencil-square-o"></i></a>
				</div>
			</div>
			<div class="row table_row">
				<div class=" col-sm-5 col-xs-6">
					<p class="name">This is a really big name</p>
				</div>
				<div class=" col-sm-3 hidden-xs">
					<p class="name">This is a really big subject's name</p>
				</div>
				<div class=" col-sm-2 col-xs-3">
					<p class="name">Status in a big format</p>
				</div>
				<div class="col-sm-2 col-xs-3">
					<a href="#" data-value="1" class="edit_subject" alt="edit subject" title="edit subject">Activate</i></a>
				</div>
			</div>
			<div class="row table_row">
				<div class=" col-sm-5 col-xs-6">
					<p class="name">Name</p>
				</div>
				<div class=" col-sm-3 hidden-xs">
					<p class="name">Subject</p>
				</div>
				<div class=" col-sm-2 col-xs-3">
					<p class="name">Status</p>
				</div>
				<div class="col-sm-2 col-xs-3">
					<a href="#" data-value="1" class="edit_subject" alt="edit subject" title="edit subject">Activate</i></a>
				</div>
				
			</div>
		</div>
		<!-- list finishes-->

		<!-- pagination -->
		<div class="row pagination">
			<a class="col-xs-2 text-center">
				<i class="fa fa-chevron-left"></i>
			</a>
			<div class="col-xs-1 text-center">
				<p class="splitter">|</p>
			</div>
			<a class="col-xs-2 text-center">
				<i class="fa fa-chevron-right"></i>
			</a>
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