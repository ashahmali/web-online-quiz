<?php
/**
 * Registration Form View 
 *
 * @author 		Ashiru Ali & Eduardo Hernandez
 * @package 	Web Development/Cousework
 * @version     1.0.0
 */
?>
<article class="row page register">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<header class="header">
			<h1>Registration Form</h1>
		</header>
		<form >
			<div class="row" style="margin-bottom:10px;">
				<div class="col-1 col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<label for="first_name">First Name</label>
				</div>
				<div class="col-2 col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<input type="text" name="first_name" placeholder="Name"/>
				</div>
			</div>
			<div class="row" style="margin-bottom:10px;">
				<div class="col-1 col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<label for="family_name">Family Name</label>
				</div>
				<div class="col-2 col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<input type="text" name="family_name" placeholder="Family Name"/>
				</div>
			</div>
			<div class="row" >
				<div class="col-1 col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<label for="email">Email</label>
				</div>
				<div class="col-2 col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<input type="text" name="email" placeholder="Email"/>
				</div>
			</div>
			<div class="row" style="margin-bottom:10px;">
				<div class="col-1 col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<label for="password">Password</label>
				</div>
				<div class="col-2 col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<input type="password" name="password" placeholder=""/>
				</div>
			</div>
			<div class="row" style="margin-bottom:10px;">
				<div class="col-1 col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<label for="password_confirm">Confirm Password</label>
				</div>
				<div class="col-2 col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<input type="password" name="password_confirm" placeholder=""/>
				</div>
			</div>
			<div class="row" style="margin-bottom:10px;">
				<div class="col-1 col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<label for="subject">Subject</label>
				</div>
				<div class="col-2 col-lg-6 col-md-6 col-sm-6 col-xs-12">
					
					<?php 
						if(isset($dd_subject))
							echo $dd_subject; 
					?>

				</div>
			</div>
		</form>
		<!-- <div class="row" style="">
		<label for="text1">This is a label</label><textarea name="text1" placeholder="Type some text"></textarea>
		</div>

		<div class="row radio">  
		     <input id="male" type="radio" name="gender" value="male">  
		    <label for="male" class="radio_label">Male</label>  
		    <input id="female" type="radio" name="gender" value="female">  
		    <label for="female" class="radio_label">Female</label>  
		</div>  
		<div id="dd" class="wrapper-dropdown-5" tabindex="1">
			<span>Transport</span>
			<ul class="dropdown">
				<li><a href="#"><i class="icon-envelope icon-large"></i>Classic mail</a></li>
				<li><a href="#"><i class="icon-truck icon-large"></i>UPS Delivery</a></li>
				<li><a href="#"><i class="icon-plane icon-large"></i>Private jet</a></li>
			</ul>
		</div> -->
		<button>Send my data</button>
	</div>
</article>


			