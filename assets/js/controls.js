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
			$("html, body").animate({ scrollTop: $('#add_question_title').offset().top - 80 }, 1000);
		}
		$(this).text(alterText);
		$(this).data('alter',newalter);
	});

	//Add answer button
	$(".add_answer").click(function(e) {
		e.preventDefault();
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
			$(clone).find('input[type="hidden"]').val(value);

			//insert clone
			var count = $(".answers_container").data("count");
			var countInt = parseInt(count) + 1;
			$(".answers_container").append(clone);
			$(".answers_container").data("count",countInt);
			$(".question_new #answers_counter").val(countInt);

			//remove original
			$(parent).remove();

			//show add answer button
			$(".add_answer").show();
		}
	});

	//Possible answer selected
	$(document).on("change",".question_new .answer .radio input[type='radio']",function(){
		var container = $(this).parents(".radio");
		var message = $(".answers_container").first().data("answertext");
		if($(container).length > 0 ){
			clenRadioOptions();
			$(container).append("<span class='message'>"+message+"</span>")
		}
	});

	$(document).on("click",".question_detail",function(){
		var questionid = $(this).data('questionid');
		var modaltitle = $(this).data('modaltitle');
		$.ajax({
			url: "question_detail", 
                async: false,
                type: "POST", 
                dataType: "html",
                data: {
                	id:questionid
            	},
            success: function(data) {
                //data is the html of the page where the request is made.
                $('#modal_global .modal-body').html(data);
                $('#modal_global .modal-title').text(modaltitle);
                $('#modal_global').modal('show'); 
            }
		});
		
	});

	//Remove message for radios wich are not selected
	function clenRadioOptions(){
		$(".answer .radio span.message").remove();
	}

	/////////////////////////////////////////////
	//				QUIZ UI
	/////////////////////////////////////////////

	//add question button
	$("#add_quiz").click(function(){
		var alterText = $(this).data("alter");
		var newalter = $(this).text();
		if($('.new_quiz_container').is(':visible')){
			//show interface
			$('.new_quiz_container').slideUp('fast');
			$(this).removeClass('cancel');
		}else{
			$('.new_quiz_container').slideDown('fast');	
			$(this).addClass('cancel');
			$("html, body").animate({ scrollTop: $('#add_quiz_title').offset().top - 80 }, 1000);
		}
		$(this).text(alterText);
		$(this).data('alter',newalter);
	});

	$('.quiz_details').click(function(){
		var questionid = $(this).data('quizid');
		var modaltitle = $(this).data('modaltitle');
		$.ajax({
			url: "quiz_detail", 
                async: false,
                type: "POST", 
                dataType: "html",
                data: {
                	id:questionid
            	},
            success: function(data) {
                //data is the html of the page where the request is made.
                $('#modal_global .modal-body').html(data);
                $('#modal_global .modal-title').text(modaltitle);
                $('#modal_global').modal('show'); 
            }
		});
	});

	var owl = $('.owl-carousel').owlCarousel({
	    loop:false,
	    margin:10,
	    dots:false,
	    autoWidth:true,
		onTranslate: callback
	});
	function callback(event) {
	 //    if(event.page.index == 1){
		// 	//disable handler
		// 	jQuery('.quick_nav_inner .handler.prev').css('opacity','0.2');
		// 	jQuery('.quick_nav_inner .handler.prev').css('cursor','normal');

		// }else{
		// 	//enable handler
		// 	jQuery('.quick_nav_inner .handler.prev').css('opacity','1');
		// 	jQuery('.quick_nav_inner .handler.prev').css('cursor','pointer');
		// }

		// if(event.page.count == event.page.index){
		// 	//disable handler
		// 	jQuery('.quick_nav_inner .handler.next').css('opacity','0.2');
		// 	jQuery('.quick_nav_inner .handler.next').css('cursor','normal');
		// }else{
		// 	//enable handler
		// 	jQuery('.quick_nav_inner .handler.next').css('opacity','1');
		// 	jQuery('.quick_nav_inner .handler.next').css('cursor','pointer');

		// }
	}

	$('.quick_nav_inner .handler.prev').click(function(){
		owl.trigger('prev.owl.carousel', [300]);
	});
	$('.quick_nav_inner .handler.next').click(function(){
		owl.trigger('next.owl.carousel');
	});

	
	function updateCategorySliderHeight(args) {
		var t = 0; // height of the highest element
		var t_elem; // the highest element (after the function runs)

		jQuery('#category_carrousel').each(function(){
			$this = jQuery(this);
			if ( $this.outerHeight() > t ) {
				t_elem = this;
				t = $this.outerHeight();
			}
		});

		setTimeout(function() {
			jQuery('#category_carrousel').css({
				height: t+30,
				visibility: "visible"
			});
		},300);
	}

	function categoryChange(args){
		//if it is the first
		if(args.currentSlideNumber == 1){
			//disable handler
			jQuery('.carrousel_control .before.handler').css('opacity','0.2');
			jQuery('.carrousel_control .before.handler').css('cursor','normal');

		}else{
			//enable handler
			jQuery('.carrousel_control .before.handler').css('opacity','1');
			jQuery('.carrousel_control .before.handler').css('cursor','pointer');
		}

		//if it is the last
		var offsetsCount = args.data.childrenOffsets.length;
		if(args.currentSliderOffset >= (args.data.childrenOffsets[offsetsCount-2]) * -1 ){
			//disable handler
			jQuery('.carrousel_control .after.handler').css('opacity','0.2');
			jQuery('.carrousel_control .after.handler').css('cursor','normal');
		}else{
			//enable handler
			jQuery('.carrousel_control .after.handler').css('opacity','1');
			jQuery('.carrousel_control .after.handler').css('cursor','pointer');

		}
	}
	$(document).on("click",'.slide a',function(){
		var link =  $(this).attr('href');
		$("html, body").animate({ scrollTop: $(link).offset().top - 80 }, 1000);
	});

	$(document).on("change",".testtaker_quiz .question .answers .answer .radio input[type='radio']",function(){
		var id = this.id;
		var pieces = id.split('_');
		if(pieces && pieces.length > 0){
			var selector = '.question_'+pieces[1]+'_link'; //pregunta
			$(selector).addClass('answered');
		}
	});
	var eventTime= 1366549200; // Timestamp - Sun, 21 Apr 2013 13:00:00 GMT
	var currentTime = 1366547400; // Timestamp - Sun, 21 Apr 2013 12:30:00 GMT
	var diffTime = eventTime - currentTime;
	var duration = moment.duration(diffTime*1000, 'milliseconds');
	var interval = 1000;

	setInterval(function(){
	  duration = moment.duration(duration - interval, 'milliseconds');
	    $('.timer_container .timer').text(duration.hours() + ":" + duration.minutes() + ":" + duration.seconds())
	}, interval); 
	
	
});