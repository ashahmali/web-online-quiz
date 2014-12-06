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
					<h4>Question Statement </h4>
				</div>
				<div class="col-sm-offset-1 col-sm-10 text-left">
					<p><?php echo $questionData['question']['sQuestion'];?></p>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 text-center">
					<h4 class="">Answers</h4>
				</div>
				<ul class="col-sm-offset-1 col-xs-11 text-left answers_container">
					<?php foreach ($questionData['options'] as $option) { ?>
						<li <?php if($option['bCorrectAnswer']) { echo 'class="correct"'; } ?> >
							<?php echo $option['sDescription']; ?>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
</div>