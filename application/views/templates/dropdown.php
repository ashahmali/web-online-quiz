<?php
/**
 * Drop Down Template
 *
 * Build a drop down with the provided data, 
 * @param       $default Text for the default option, $id id assigned to the control, $options items that the control will display
 * @author 		Ashiru Ali & Eduardo Hernandez
 * @package 	Web Development/Cousework
 * @version     1.0.0
 */
?>

<div id="<?php echo $id; ?>" class="dropdown_ui wrapper-dropdown-5" tabindex="1">
	<span><?php echo $default; ?></span>
	<ul class="dropdown">
		<?php foreach ($options as $text => $value) {
			echo '<li><a href="#" data-value="'.$value.'">'.$text.'</a></li>';
		} ?>
	</ul>
	<input type="hidden" name="<?php echo $id; ?>">
</div>
<script type="text/javascript">
		$(function() {

			var dd = new DropDown( $('#<?php echo $id; ?>.dropdown_ui') );

			$(document).click(function() {
				// all dropdowns
				$('.wrapper-dropdown-5').removeClass('active');
			});

		});

</script>