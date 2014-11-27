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
});