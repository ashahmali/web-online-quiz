<?php
/**
 * Admin - Add Answer
 *
 * @author 		Ashiru Ali & Eduardo Hernandez
 * @package 	Web Development/Cousework
 * @version     1.0.0
 */
?>

<div class="col-xs-12 text-left new_answer">
	<div class="radio">
		<input id="answer_<?php echo $counter + 1;?>" type="radio" name="answers" value="" style="display:none;">  
	    <label for="answer_<?php echo $counter + 1;?>" class="radio_label" style="display:none;"></label> 
	    <textarea type="text" name="new_option"></textarea>
	    <button class="btn_online ok">OK</button>
	    <button id="cancel_new_answer" class="btn_online delete">X</button>
	</div>
</div>