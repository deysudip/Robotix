
jQuery(document).ready(function() {
	

    /*
        Form validation
    */
    $('.login-form input[type="text"], .login-form input[type="password"], .login-form input[type="email"], .login-form textarea').on('focus', function() {
    	$(this).removeClass('input-error');
    });
    
    $('.login-form').on('submit', function(e) {
    	
    	$(this).find('input[type="text"], input[type="password"], input[type="email"], textarea').each(function(){
    		if( $(this).val() == "" ) {
    			e.preventDefault();
    			$(this).addClass('input-error');
    		}
    		else {
    			$(this).removeClass('input-error');
    		}
    	});
    	
    });

	$(".login-option ul li").on('click',function(e){
		$(this).siblings().removeClass('selected');
		$(this).addClass('selected');
		var login_type= $(this).children('a').attr('id');
		$('#login-modal .form-bottom').css('display','none');
		$('#login-modal .'+ login_type).css('display','block');
	});

	$(".sign-option ul li").on('click',function(e){
		$(this).siblings().removeClass('selected');
		$(this).addClass('selected');
		var sign_type= $(this).children('a').attr('id');
		$('#sign-modal .form-bottom').css('display','none');
		$('#sign-modal .'+ sign_type).css('display','block');
	});

	$(".btn-next-mem").on('click',function(e){

		var member= $('.member-nav header h2').attr('member');
		switch(member) {
			case 'First':
				var next_mem='Second';
				break;
			case 'Second':
				var next_mem='Third';
				break;
			case 'Third':
				var next_mem='Fourth';
				break;
			case 'Fourth':
				var next_mem='First';
				break;
			default:
			break;
		}
		$(".member-nav header h2").attr("member",next_mem);
		$(".member-nav header h2").text(next_mem + " Member");
		$(".form-group-sub").removeClass('select-mem');
		$("#" + next_mem).addClass('select-mem');

	});
	$(".btn-prev-mem").on('click',function(e){

		var member= $('.member-nav header h2').attr('member');
		switch(member) {
			case 'First':
				var next_mem='Fourth';
				break;
			case 'Second':
				var next_mem='First';
				break;
			case 'Third':
				var next_mem='Second';
				break;
			case 'Fourth':
				var next_mem='Third';
				break;
			default:
				break;
		}
		$(".member-nav header h2").attr("member",next_mem);
		$(".member-nav header h2").text(next_mem + " Member");
		$(".form-group-sub").removeClass('select-mem');
		$("#" + next_mem).addClass('select-mem');

	});

});
