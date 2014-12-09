<?php
/**
 * Test taker details
 *
 * @author 		Ashiru Ali & Eduardo Hernandez
 * @package 	Web Development/Cousework
 * @version     1.0.0
 */
?>

<div class="testtaker_detail row ">
	<div class="col-1 col-sm-6 col-xs-12 text-right subject_container">
		<p> Your Subject:</p>
	</div>
	<div class="col-2 col-sm-6 col-xs-12 text-left subject_container">
		<p class="name"> Web Development</p>
	</div>
	<div class="col-2 col-xs-12 text-center">
		<p> You have <span> 1 </span> test(s) available</p>
	</div>

	<div class="col-xs-12 text-center">
		<h3>Tests Details</h3>
	</div>
	<!-- list starts -->
	<div class="col-xs-12 table">
		<div class="row header">
			<!-- if the field is sortable use a tag for the column title otherwise use p tag, order_asc class when the field is sorted -->
			<div class=" col-sm-5 col-xs-3">
				<p>Name</p>
			</div>
			<div class=" col-sm-3 col-xs-3">
				<a alt="sort grade" title="sort grade" >Grade</a>
			</div>
			<div class=" col-sm-2 col-xs-3">
				<a class="order_asc" alt="sort time" title="sort time">Time</a>
			</div>
			<div class="col-sm-2 col-xs-3">
				<a alt="edit subject" title="edit subject"><i class="fa fa-pencil-square-o"></i></a>
			</div>
		</div>
		<div class="row table_row">
			<div class="col-sm-5 col-xs-3">
				<p>IA 1</p>
			</div>
			<div class="col-sm-3 col-xs-3">
				<p>95 (10/12)</p>
			</div>
			<div class=" col-sm-2 col-xs-3">
				<p>1 hour 45 minutes</p>
			</div>
			<div class="col-sm-2 col-xs-3">
				<a href="#" data-value="1" alt="retake quiz" title="retake quiz">Retake It</i></a>
			</div>
		</div>
		<div class="row table_row">
			<div class=" col-sm-5 col-xs-3">
				<p class="name">IA 2</p>
			</div>
			<div class=" col-sm-3 col-xs-3">
				<p class="name">-</p>
			</div>
			<div class=" col-sm-2 col-xs-3">
				<p class="name">-</p>
			</div>
			<div class="col-sm-2 col-xs-3">
				<a href="#" alt="take quiz" title="take quiz">Take It</i></a>
			</div>
			
		</div>
		<div class="row table_row">
			<div class=" col-sm-5 col-xs-3">
				<p class="name">IA 3</p>
			</div>
			<div class=" col-sm-3 col-xs-3">
				<p class="name">100</p>
			</div>
			<div class=" col-sm-2 col-xs-3">
				<p class="name">15:00 mins</p>
			</div>
			<div class="col-sm-2 col-xs-3">
				<p>-</p>
			</div>
			
		</div>
	</div>
	<!-- list finishes-->

	<!-- pagination -->
	<!-- <div class="row pagination">
		<a class="col-xs-2 text-center">
			<i class="fa fa-chevron-left"></i>
		</a>
		<div class="col-xs-1 text-center">
			<p class="splitter">|</p>
		</div>
		<a class="col-xs-2 text-center">
			<i class="fa fa-chevron-right"></i>
		</a>
	</div> -->
	<!-- end pagination -->
</div>