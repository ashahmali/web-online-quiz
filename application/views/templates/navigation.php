<?php
/**
 * NAvigation Template
 *
 * @author    Ashiru Ali & Eduardo Hernandez
 * @package   Web Development/Cousework
 * @version   1.0.0
 */
?>

<nav class="shifter-navigation">
	<!-- <a href="#1">1</a>
	<a href="#2">2</a>
	<a href="#3">3</a>
	<a href="#4">4</a>
	<a href="#5">5</a> -->
	<ul class="menu_options">
		<li><a>Log Out</a></li>
		<li><a>Home</a></li>
		
	<?php 
		if ($this->session->userdata('ROLE_idROLE') == 1){
			?>
				<li>Manage Users</li>
				<li>Create Subject</li>
				<li>Create Test</li>
				<li>Add Questions</li>
			<?php
		}
	?>

	</ul>

</nav>