<?php
/**
 * Admin - List questions
 *
 * @author 		Ashiru Ali & Eduardo Hernandez
 * @package 	Web Development/Cousework
 * @version     1.0.0
 */
?>
<div class="row">
	<div class="col-xs-12 text-center">
		<select name="dd_subject_questions" class="dd_subject_questions">
			<option>Web DEvelopment</option>
			<option>Web DEvelopment</option>
			<option>Web DEvelopment</option>
		</select>
	</div>
</div>

<div class="quizzes_list row ">
	<div class="col-lg-2 col-md-2 col-sm-1 col-xs-1">
	</div>
	<div class="col-lg-8 col-md-8 col-sm-10 col-xs-10 ">
		<!-- list starts -->
		<div class="table">
			<div class="row header">
				<!-- if the field is sortable use a tag for the column title otherwise use p tag, order_asc class when the field is sorted -->
				<div class=" col-sm-5 col-xs-6">
					<a >Name</a>
				</div>
				<div class=" col-sm-3 col-xs-3">
					<a >Subject</a>
				</div>
				<div class=" col-sm-2 hidden-xs">
					<p ># Ques</p>
				</div>
				<div class="col-sm-2 col-xs-3">
					<a href="#"><i class="fa fa-pencil-square-o"></i></a>
				</div>
			</div>
			<div class="row table_row">
				<div class=" col-sm-5 col-xs-6">
					<p>Name</p>
				</div>
				<div class=" col-sm-3 col-xs-3">
					<p >Subject</p>
				</div>
				<div class=" col-sm-2 hidden-xs">
					<p >20</p>
				</div>
				<div class="col-sm-2 col-xs-3">
					<a href="#" class="quiz_details" data-quizid="1" data-modaltitle="Quiz Detail">Details</a>
				</div>
			</div>
			<div class="row table_row">
				<div class=" col-sm-5 col-xs-6">
					<p >Name</p>
				</div>
				<div class=" col-sm-3 col-xs-3">
					<p >Subject</p>
				</div>
				<div class=" col-sm-2 hidden-xs">
					<p >20</p>
				</div>
				<div class="col-sm-2 col-xs-3">
					<a href="#" class="quiz_details" data-quizid="2" data-modaltitle="Quiz Detail">Details</a>
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
		<!-- end pagination -->
	</div>
	<div class="col-lg-2 col-md-2 col-sm-1 col-xs-1">
	</div>
</div>