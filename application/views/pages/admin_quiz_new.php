<?php
/**
 * Admin - Add Question
 *
 * @author 		Ashiru Ali & Eduardo Hernandez
 * @package 	Web Development/Cousework
 * @version     1.0.0
 */
?>
<div class="question_new row ">
	<div class="col-lg-2 col-md-2 col-sm-1 col-xs-1">
	</div>
	<div class="col-lg-8 col-md-8 col-sm-10 col-xs-10 ">
		<div class="row">
			<div class="col-xs-12 text-center">
				<button id="add_quiz" data-alter="Cancel Action">Add Quiz</button>
			</div>
		</div>
		<div class="new_quiz_container" style="display:none;">
			<?php echo form_open('admin/quizzes') ?>
			<div class="row" >
				<div class="col-xs-12 text-center">
					<h2>Add Quiz</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 col-xs-12 text-right">
					<p>Name</p>
				</div>
				<div class="col-sm-8 col-xs-12 text-left">
					<input name="qq_name" type="text"></input>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 col-xs-12 text-right">
					<p>Subject</p>
				</div>
				<div class="col-sm-8 col-xs-12 text-left">
					<select name="dd_subject_questions" class="dd_subject_questions">
						<?php foreach($subjects as $sub){
			echo "<option value='".$sub['idSUBJECT']."'>".$sub['sName']."</option>";
		}?>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 col-xs-12 text-right">
					<p>Time(minutes)</p>
				</div>
				<div class="col-sm-8 col-xs-12 text-left">
					<input name="qq_time" type="number"></input>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 col-xs-12 text-right">
					<p>Questions</p>
				</div>
				<div class="col-sm-8 col-xs-12 text-left">
					<input name="qq_no_ques" type="number"></input>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 col-xs-12 text-right">
					<p>Passmark</p>
				</div>
				<div class="col-sm-8 col-xs-12 text-left">
					<input name="qq_passmark" type="number"></input>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 col-xs-12 text-right">
					<p>Retake</p>
				</div>
				<div class="col-sm-8 col-xs-12 text-left">
					<input name="qq_retake" type="number"></input>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 text-center">
					<button>Save Quiz</button>
				</div>
			</div>
		 </form>
		</div>
	</div>
	<div class="col-lg-2 col-md-2 col-sm-1 col-xs-1">
	</div>
</div>