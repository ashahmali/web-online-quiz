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
		<li><a href="users/logout" alt="Manage Users" title="Manage Users">Log Out</a></li>
		<li><a href="home" alt="Manage Users" title="Manage Users">Home</a></li>
		
	<?php 
		if (isset($showAdminMenu) && $showAdminMenu){
			?>
				<li><a href="admin/manage_users" alt="Manage Users" title="Manage Users">Manage Users</a></li>
				<li><a href="admin/add_subject" alt="Create Subject" title="Create Subject">Create Subject</a></li>
				<li><a href="admin/quizzes" alt="Create Test" title="Create Test">Create Test</a></li>
				<li><a href="admin/questions" alt="Add Questions" title="Add Questions">Add Questions</a></li>
			<?php
		}
	?>

	</ul>

</nav>