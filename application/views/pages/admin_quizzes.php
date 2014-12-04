<?php
/**
 * Admin - List questions
 *
 * @author 		Ashiru Ali & Eduardo Hernandez
 * @package 	Web Development/Cousework
 * @version     1.0.0
 */
?>
<?php 
echo validation_errors(); 
echo (isset($add_test_feedback))?$add_test_feedback:"";
?>
<article class="row page admin">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<header class="header">
			<h1><?php echo $heading;?></h1>
		</header>
<div class="row">
	<div class="col-xs-12 text-center">
		<select name="dd_subject_questions" class="dd_subject_questions">
			<?php foreach($subjects as $sub){
			echo "<option value='".$sub['idSUBJECT']."'>".$sub['sName']."</option>";
		}?>
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
			<?php foreach ($tests as $test): ?>
			<div class="row table_row">
				<div class=" col-sm-5 col-xs-6">
					<p><?php echo $test['sTestName']; ?></p>
				</div>
				<div class=" col-sm-3 col-xs-3">
					<p ><?php echo $test['sName']; ?></p>
				</div>
				<div class=" col-sm-2 hidden-xs">
					<p ><?php echo $test['iQuestions']; ?></p>
				</div>
				<div class="col-sm-2 col-xs-3">
					<a href="#" class="quiz_details" data-quizid="<?php echo $test['idTEST']; ?>" data-modaltitle="Quiz Detail">Details</a>
				</div>
			</div>
			<?php endforeach; ?>
			
			</div>
		</div>
		<!-- list finishes-->

		<!-- pagination -->
		<div class="row pagination">
			<?php echo "$links"; ?>;
		</div>
		<!-- end pagination -->
	</div>
	<div class="col-lg-2 col-md-2 col-sm-1 col-xs-1">
	</div>
</div>
</div>
</article>