<?php
/**
 * Login Form View 
 *
 * @author 		Ashiru Ali & Eduardo Hernandez
 * @package 	Web Development/Cousework
 * @version     1.0.0
 */
?>	
<article class="row page login">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<header class="header">
			<h1>Wellcome</h1>
		</header>
		<form >
			<div class="row" >
				<div class="col-1 col-lg-5 col-md-5 col-sm-5 col-xs-12">
					<label for="email">Email</label>
				</div>
				<div class="col-2 col-lg-7 col-md-7 col-sm-7 col-xs-12">
					<input type="text" name="email" placeholder="Email"/>
				</div>
			</div>
			<div class="row">
				<div class="col-1 col-lg-5 col-md-5 col-sm-5 col-xs-12">
					<label for="password">Password</label>
				</div>
				<div class="col-2 col-lg-7 col-md-7 col-sm-7 col-xs-12">
					<input type="password" name="password" placeholder=""/>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
					<button>Log In</button>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
					<p>
						I don't have an account 
						<!-- <a href="" alt="" title="Signup">Sign Up</a>  -->
						<?php echo anchor('register', 'Sign Up', 'alt="Sign Up" title="Sign Up"'); ?>

					</p>
				</div>

			</div>
			
		</form>
	</div>
</article>
			
			