<?php
/**
 * Admin - Add Question
 *
 * @author 		Ashiru Ali & Eduardo Hernandez
 * @package 	Web Development/Cousework
 * @version     1.0.0
 */
?>
<div class="question_new row ">
	<div class="col-lg-2 col-md-2 col-sm-1 col-xs-1">
	</div>
	<div class="col-lg-8 col-md-8 col-sm-10 col-xs-10 ">
		<div class="row">
			<div class="col-xs-12 text-center">
				<button id="add_question" data-alter="Cancel Action">Add Question</button>
			</div>
		</div>
		<div class="new_question_container" style="display:none;">
			<div class="row" >
				<div class="col-xs-12 text-center">
					<h2>Add Question</h2>
				</div>
				<div class="col-sm-4 col-xs-12 text-left">
					<h3>Question Statement</h3>
				</div>
				<div class="col-sm-8 col-xs-12">
					<textarea></textarea>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 col-xs-12 text-left">
					<h3 class="">Possible Answers</h3>
				</div>
				<div class="col-sm-8 col-xs-12 text-left">
					<button class="add_answer btn_online">Add Answer</button>
				</div>
				<div class="answers_container" data-answertext="This is the correct answer" data-count="0">
					<!-- <div class="col-xs-12 text-left answer">
						<div class="radio">
							<input id="male" type="radio" name="gender" value="male">  
						    <label for="male" class="radio_label">Male</label> 
						    <button class="btn_online delete">X</button>
						</div>
					</div>
					<div class="col-xs-12 text-left answer">
						<div class="radio">
							<input id="female" type="radio" name="gender" value="female">  
						    <label for="female" class="radio_label">Male</label>  
						    <button class="btn_online delete">X</button>
						</div>
					</div> -->
					
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 text-center">
					<button>Save Question</button>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-2 col-md-2 col-sm-1 col-xs-1">
	</div>
</div>