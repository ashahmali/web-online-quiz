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
			obj.val = opt.children('a').attr('data-value');
			obj.index = opt.index();
			obj.placeholder.text(opt.text());
			obj.dd.find('input[type="hidden"]').val(obj.val);
		});
	},
	getValue : function() {
		return this.val;
	},
	getIndex : function() {
		return this.index;
	}
}

$(document).ready(function(){
	$('form.subject_new button').click(function(e){
		e.preventDefault();
		var newSubject = $('input[name="subject_name"]');
		var value = $(newSubject).val();
		if( value !== ''){
			var element =  $('.subjects_list_content .subject').first().clone();
			$(element).find('.name').text(value);
			$(element).find('a.edit_subject').data('value',0);
			$(element).css('display','none');
			$('.subjects_list_content').append(element);
			$(element).slideDown('slow');
		}else{
			alert("Name is required");
		}
	});

	

	/////////////////////////////////////////////
	//				QUESTIONS UI
	/////////////////////////////////////////////

	//add question button
	$("#add_question").click(function(){
		var alterText = $(this).data("alter");
		var newalter = $(this).text();
		if($('.new_question_container').is(':visible')){
			//show interface
			$('.new_question_container').slideUp('fast');
			$(this).removeClass('cancel');
		}else{
			$('.new_question_container').slideDown('fast');	
			$(this).addClass('cancel');
		}
		$(this).text(alterText);
		$(this).data('alter',newalter);
	});

	//Add answer button
	$(".add_answer").click(function() {
		var btn = this;
		if($(".answers_container .new_answer").length > 0){
			$(this).hide();
		}else{
			//insert new answer UI
			var count = $(".answers_container").data("count");
			$.ajax({   
                url: "new_aswer", 
                async: false,
                type: "POST", 
                dataType: "html",
                data: {
                	counter:count
                },
                success: function(data) {
                    //data is the html of the page where the request is made.
                    $('.answers_container').append(data);
                    
                    $(btn).hide();
                }
            });
            
		}
	});

	//delete answer button
	$(document).on("click",".answer .delete",function(){
		$(this).parents(".answer").remove();
		var count = $(".answers_container").data("count");
		var countInt = parseInt(count) - 1 ;
		$(".answers_container").data("count",countInt);
	});

	//delete new answer button
	$(document).on("click",".new_answer .delete",function(){
		$(this).parents(".new_answer").remove();
		$(".add_answer").show();
	});

	//ok new answer button
	$(document).on("click",".new_answer .btn_online.ok",function(){
		var parent = $(this).parents(".new_answer");
		var obj = this;
		if($(parent).length > 0){
			var clone = $(parent).clone();
			var input = $(parent).find('textarea')
			var value = $(input).val();
			
			//modify clone
			$(clone).removeClass('new_answer');
			$(clone).addClass('answer');
			$(clone).find('label').text(value).show();
			$(clone).find('button.ok').remove();
			$(clone).find('textarea').remove();
			$(clone).find('input[type="radio"]').val(value);

			//insert clone
			var count = $(".answers_container").data("count");
			var countInt = parseInt(count) + 1;
			$(".answers_container").append(clone);
			$(".answers_container").data("count",countInt);

			//remove original
			$(parent).remove();

			//show add answer button
			$(".add_answer").show();
		}
	});

	//Possible answer selected
	$(document).on("change",".answer .radio input[type='radio']",function(){
		var container = $(this).parents(".radio");
		var message = $(".answers_container").first().data("answertext");
		if($(container).length > 0 ){
			clenRadioOptions();
			$(container).append("<span class='message'>"+message+"</span>")
		}
	});

	//Remove message for radios wich are not selected
	function clenRadioOptions(){
		$(".answer .radio span.message").remove();
	}

});