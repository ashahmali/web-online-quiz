<?php
/**
 * Admin - Quiz Detail
 *
 * @author 		Ashiru Ali & Eduardo Hernandez
 * @package 	Web Development/Cousework
 * @version     1.0.0
 */
?>
<div class="question_detail row ">
	<div class="col-sm-12 col-xs-12">
		<div class="question_detail_container">
			<div class="row" >
				<div class="col-xs-12 text-center">
					<h4>Name</h4>  
				</div>
				<div class="col-sm-offset-1 col-sm-10 text-center">	
					<p><?php echo $quizData['sTestName'];?></p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-offset-1 col-xs-5 text-right">
					<h4 class="">Subject</h4>
				</div>
				<div class="col-xs-6 text-left ">
					<p><?php echo $quizData['sTestName'];?></p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-offset-1 col-xs-5 text-right">
					<h4 class="">Time</h4>
				</div>
				<div class="col-xs-6 text-left ">
					<p><?php echo $quizData['iTime'];?> minutes</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-offset-1 col-xs-5 text-right">
					<h4 class="">Questions</h4>
				</div>
				<div class="col-xs-6 text-left ">
					<p><?php echo $quizData['iQuestions'];?></p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-offset-1 col-xs-5 text-right">
					<h4 class="">Passmark</h4>
				</div>
				<div class="col-xs-6 text-left ">
					<p><?php echo $quizData['iPassmark'];?></p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-offset-1 col-xs-5 text-right">
					<h4 class="">Retake</h4>
				</div>
				<div class="col-xs-6 text-left ">
					<p><?php echo $quizData['iRetake'];?></p>
				</div>
			</div>
		</div>
	</div>
</div>