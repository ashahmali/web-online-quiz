<?php
/**
 * Admin - List questions
 *
 * @author 		Ashiru Ali & Eduardo Hernandez
 * @package 	Web Development/Cousework
 * @version     1.0.0
 */
 
?>
<article class="row page admin">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<header class="header">
			<h1><?php echo $heading; ?></h1>
			<?php echo validation_errors(); ?>
			<?php echo (!empty($q_added)) ? $q_added : "" ?>
		</header>
<div class="row">
	<div class="col-xs-12 text-center">
		<select name="dd_subject_questions" class="dd_subject_questions">
		<?php foreach($subjects as $sub){
			echo "<option value='".$sub['idSUBJECT']."'>".$sub['sName']."</option>";
		}
		?>
		</select>
	</div>
</div>

<div class="questions_list row ">
	<div class="col-lg-2 col-md-2 col-sm-1 col-xs-1">
	</div>
	<div class="col-lg-8 col-md-8 col-sm-10 col-xs-10 ">
		<!-- list starts -->
		<div class="table">
			<div class="row header">
				<!-- if the field is sortable use a tag for the column title otherwise use p tag, order_asc class when the field is sorted -->
				<div class=" col-sm-10 col-xs-9">
					<p class="name">Question</p>
				</div>
				<div class="col-sm-2 col-xs-3">
					<a href="#" data-value="1" class="edit_subject" alt="edit subject" title="edit subject"><i class="fa fa-pencil-square-o"></i></a>
				</div>
			</div>
			<div class="row table_row">
				<?php foreach($questions as $que): ?>
				<div class=" col-sm-10 col-xs-9">
					<p class="name"><?php echo $que['sQuestion']; ?></p>
				</div>
				<div class="col-sm-2 col-xs-3">
					<a href="#" data-questionid="<?php echo $que['idQUESTION']; ?>" data-modaltitle="Question Detail" alt="View Details" title="View Details" class="question_detail">Details</a>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
		<!-- list finishes-->

		<!-- pagination -->
		<div class="row pagination" style="display:none;">
			<?php echo $links; ?>
		</div>
		<!-- end pagination -->
	</div>
	<div class="col-lg-2 col-md-2 col-sm-1 col-xs-1">
	</div>
</div>