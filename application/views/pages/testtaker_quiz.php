<?php
/**
 * Test taker - Quiz
 *
 * @author 		Ashiru Ali & Eduardo Hernandez
 * @package 	Web Development/Cousework
 * @version     1.0.0
 */
?>


<div class="testtaker_quiz row">

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

	<form id="test_form" data-start="<?php echo $timer;?>" data-current="" action="evaluate" method="post">
		<div class="col-xs-12 text-center">
			<p>General Intructions</p>
		</div>
		<?php $counterQuestion = 1; ?>
		<?php foreach ($questions as $q) { ?>
			<!-- question start-->
			<div id="question_<?php echo $counterQuestion; ?>" class="col-xs-12 question">
				<div class="row statement">
					<div class="col-sm-12">
						<p><span><?php echo $counterQuestion; ?> - </span><?php echo $q['statement'];?></p> 
					</div>
				</div>
				<div class="row answers">
					<?php $counterAnswers = 1; ?>
					
					<?php foreach ($q['options'] as $option) { ?>
						<div class=" col-sm-12 answer">
							<div class="radio">
								<?php $selected = ""; ?>
								<?php 
								if(isset($answers) && isset($answers[$q['id']]) && $answers[$q['id']] == $option['id']) {
									//var_dump($answers[$q['id']]);
									//var_dump($option['id']);
									$selected = 'checked';
								}?>
								<input id="answer_<?php echo $counterQuestion.'_'.$counterAnswers; ?>" type="radio" name="answers_<?php echo $counterQuestion; ?>" value="<?php echo $q['id'].'_'.$option['id'] ;?>" <?php echo $selected;?> style="display:none;">  
							    <label for="answer_<?php echo $counterQuestion.'_'.$counterAnswers; ?>" class="radio_label"><?php echo $option['description'];?></label> 
							</div>
						</div>
						<?php $counterAnswers++; ?>
					<?php } ?>
				</div>
			</div>
			<!-- question finish-->
		<?php $counterQuestion++; ?>
		<?php } ?>
		<input type="hidden" name="question_counter" value="<?php echo $counterQuestion -1; ?>"/>

		<div class="col-xs-12 text-center">
			<button>Submit</button>
		</div>
	</form>

</div>