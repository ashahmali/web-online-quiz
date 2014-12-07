<article class="row page">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<header class="header">
			<?php echo validation_errors(); ?>
			<?php echo(isset($add_sub_fb)) ? $add_sub_fb : ""; ?>
		</header>
		<div class="quizzes_list row ">
			<header class="header">
			<h1><?php echo $heading;?></h1>
		</header>
	</div>
		<div class="col-lg-2 col-md-2 col-sm-1 col-xs-1">
			
		</div>
		<div class="col-lg-8 col-md-8 col-sm-10 col-xs-10 ">
			<!-- list starts -->
			<div class="table">
				<div class="row header">
					<!-- if the field is sortable use a tag for the column title otherwise use p tag, order_asc class when the field is sorted -->
					<div class=" col-sm-7 col-xs-8">
						<a >Name</a>
					</div>
					<div class="col-sm-5 col-xs-4">
						<a href="#"><i class="fa fa-pencil-square-o"></i></a>
					</div>
				</div>
				<?php foreach ($subjects as $test): ?>
				<div class="row table_row">
					<div class=" col-sm-7 col-xs-8">
						<p><?php echo $test['sName']; ?></p>
					</div>
					<div class="col-sm-5 col-xs-4">
						<a href="#" class="quiz_details" data-quizid="<?php echo $test['idSUBJECT']; ?>" data-modaltitle="Details">Delete</a>
					</div>
				</div>
				<?php endforeach; ?>
				
				</div>
			<!-- list finishes-->
		</div>
		<div class="col-lg-2 col-md-2 col-sm-1 col-xs-1">
			
		</div>

		<?php echo form_open('admin/add_subject') ?>
			<div class="row subject_new" >
				<div class="col-1 col-sm-5 col-xs-12 text-right ">
					<label for="sub">Subject</label>
				</div>
				<div class="col-2 col-sm-7 col-xs-12 text-left">
					<input type="text" name="add_subject" value="<?php echo set_value('add_subject') ?>" placeholder="Add Subject"/>
				</div>
			</div>
			
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
					<button>Add</button>
				</div>
			</div>
			
		</form>
	</div>
</article>