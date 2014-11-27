<?php
/**
 * Drop Down Template
 *
 * Build a drop down with the provided data, 
 *
 * @author 		WooThemes
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
		
		<!-- <li><a href="#" data-value="">Artificial Intelligence</a></li>
		<li><a href="#" data-value="">Web Development</a></li> -->
	</ul>
	<input type="hidden" name="<?php echo $id; ?>">
</div>