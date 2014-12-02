<?php
/**
 * Test taker - Quiz
 *
 * @author 		Ashiru Ali & Eduardo Hernandez
 * @package 	Web Development/Cousework
 * @version     1.0.0
 */
?>


<div class="testtaker_quiz row ">

	<div class="col-1 col-sm-6 col-xs-12 text-right subject_container">
		<p>Subject:</p>
	</div>
	<div class="col-2 col-sm-6 col-xs-12 text-left subject_container detail">
		<p class="name"> Web Development</p>
	</div>
	<div class="col-1 col-sm-6 col-xs-12 text-right subject_container">
		<p>Test Name:</p>
	</div>
	<div class="col-2 col-sm-6 col-xs-12 text-left subject_container detail">
		<p class="name">Web Performance and Optimization</p>
	</div>

	<div class="col-xs-12 text-center">
		<p>General Intructions</p>
	</div>
	<?php $counterQuestion = 1; ?>
	<?php foreach ($questions as $statement => $answers) { ?>
		<!-- question start-->
		<div id="question_<?php echo $counterQuestion; ?>" class="col-xs-12 question">
			<div class="row statement">
				<div class="col-sm-12">
					<p><span><?php echo $counterQuestion; ?> - </span><?php echo $statement;?></p>
				</div>
			</div>
			<div class="row answers">
				<?php $counterAnswers = 1; ?>
				<?php foreach ($answers as $value) { ?>
					<div class=" col-sm-12 answer">
						<div class="radio">
							<input id="answer_<?php echo $counterQuestion.'_'.$counterAnswers; ?>" type="radio" name="answers_<?php echo $counterQuestion; ?>" value="<?php echo $value;?>" style="display:none;">  
						    <label for="answer_<?php echo $counterQuestion.'_'.$counterAnswers; ?>" class="radio_label"><?php echo $value;?></label> 
						</div>
					</div>
					<?php $counterAnswers++; ?>
				<?php } ?>
			</div>
		</div>
		<!-- question finish-->
	<?php $counterQuestion++; ?>
	<?php } ?>
	

	<div class="col-xs-12 text-center">
		<button>Submit</button>
	</div>

</div>