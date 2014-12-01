<?php
/**
 * Admin - Question Detail
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
					<h4>Question Statement <?php echo $question_id;?></h4>
				</div>
				<div class="col-sm-offset-1 col-sm-10 text-left">
					<p>This is a queston test, bla bla bla bla This is a queston test, bla bla bla bla</p>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 text-center">
					<h4 class="">Answers</h4>
				</div>
				<ul class="col-sm-offset-1 col-xs-11 text-left answers_container">
					<li class="correct">Answer 1</li>
					<li>Answer 2</li>
					<li>Answer 3 Answer 2 Answer 2 Answer 2 Answer 2 Answer 2 Answer 2</li>
				</ul>
			</div>
		</div>
	</div>
</div>