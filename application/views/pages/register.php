		<header id="header">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-sm-12">
					<a href="" class="page-name">Testing System</a>
					<span class="shifter-handle"><i class="fa fa-bars"></i></span>
				</div>
			</div>
		</header>
		<div class="shifter-page">
			<div class="conatiner">
				<article class="row page">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<header class="header">
							<h1>Registration Form</h1>
						</header>
						<div class="row" style="margin-bottom:10px;">
							<div 
							<label for="text1">Fisrt Name</label><input type="text" name="first_name" placeholder="Type some text"/>
						</div>
						<div class="row" style="margin-bottom:10px;">
							<label for="text1">Family Name</label><input type="text" name="family_name" placeholder="Type some text"/>
						</div>
						<div class="row" style="margin-bottom:10px;">
							<label for="text1">Fisrt Name</label><input type="text" name="text1" placeholder="Type some text"/>
						</div>
						<div class="row" style="">
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
						</div>
						<button>Button</button>
					</div>
				</article>

				<footer id="footer" class="row">
					<div class="all-full copyright">
						<!-- Made with &hearts; in Hampden -->
					</div>
				</footer>
			</div>
		</div>
		<nav class="shifter-navigation">
			<a href="#1">1</a>
			<a href="#2">2</a>
			<a href="#3">3</a>
			<a href="#4">4</a>
			<a href="#5">5</a>
		</nav>
		<script type="text/javascript">

			// function DropDown(el) {
			// 	this.dd = el;
			// 	this.initEvents();
			// }
			// DropDown.prototype = {
			// 	initEvents : function() {
			// 		var obj = this;

			// 		obj.dd.on('click', function(event){
			// 			$(this).toggleClass('active');
			// 			event.stopPropagation();
			// 		});	
			// 	}
			// }

			function DropDown(el) {
				this.dd = el;
				this.placeholder = this.dd.children('span');
				this.opts = this.dd.find('ul.dropdown > li');
				this.val = '';
				this.index = -1;
				this.initEvents();
			}
			DropDown.prototype = {
				initEvents : function() {
					var obj = this;

					obj.dd.on('click', function(event){
						$(this).toggleClass('active');
						return false;
					});

					obj.opts.on('click',function(){
						var opt = $(this);
						obj.val = opt.text();
						obj.index = opt.index();
						obj.placeholder.text(obj.val);
					});
				},
				getValue : function() {
					return this.val;
				},
				getIndex : function() {
					return this.index;
				}
			}

			$(function() {

				var dd = new DropDown( $('#dd') );

				$(document).click(function() {
					// all dropdowns
					$('.wrapper-dropdown-5').removeClass('active');
				});

			});

		</script>