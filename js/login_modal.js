jQuery(document).ready(function() {

	/* select and show different user sign-up and login tab */

	$(".login-option ul li").on('click', function (e) {
		$(this).siblings().removeClass('selected');
		$(this).addClass('selected');
		var login_type = $(this).children('a').attr('id');
		$('#login-modal .form-bottom').css('display', 'none');
		$('#login-modal .' + login_type).css('display', 'block');
	});

	$(".sign-option ul li").on('click', function (e) {
		$(this).siblings().removeClass('selected');
		$(this).addClass('selected');
		var sign_type = $(this).children('a').attr('id');
		$('#sign-modal .form-bottom').css('display', 'none');
		$('#sign-modal .' + sign_type).css('display', 'block');
	});

	/* auto population of instituition name */
    $('a[href=#sign]').on('click', function(){

        var data="req_type=insti";
        $.ajax({
            type: "POST",
            url: "php/function.php",
            data: data,
            success: function (html) {
                $(".insti-drop").html(html);
            }
        })
    });

    /* auto population of coordinator name based on instituition name for user sign up */
    $('select#insti-sign').on('change', function(){

        var insti_code = $(this).val();
        var data="req_type=coord&insti_code=" + insti_code;
        $.ajax({
            type: "POST",
            url: "php/function.php",
            data: data,
            success: function (html) {
                $("#insti-coord-sign").html(html);
            }
        })

    });

	/* auto population of coordinator name based on instituition name for group sign up */
	$('select#group-insti-sign').on('change', function(){

		var insti_code = $(this).val();
		var data="req_type=coord&insti_code=" + insti_code;
		$.ajax({
			type: "POST",
			url: "php/function.php",
			data: data,
			success: function (html) {
				$("#group-insti-coord-sign").html(html);
			}
		})

	});

    /* auto population of Relationship manager name */
    $('select#coord-insti-sign').on('change', function(){

        var insti_code = $(this).val();
        var data="req_type=mng&insti_code=" + insti_code;
        $.ajax({
            type: "POST",
            url: "php/function.php",
            data: data,
            success: function (html) {
                $(".mng-drop").html(html);
            }
        })
    });

	/* add one member */
	$('.btn-plus-mem').on('click', function (e){

		var count = $("#group-mem-count").val();
		count = parseInt(count,10);
		if (count<=3){
			count=count + 1;
		}
		var mem = convertNumber(count);
		$("#group-mem-count").val(count);

		var mem_form='';
		mem_form += '<div class="form-group-sub" id="' +mem+ '" member="' + count + '">';
		mem_form += '<div class="form-group">';
		mem_form += '<label class="sr-only" for="' +mem+ '-mem-name">' +mem+ 'member name</label>';
		mem_form += '<input type="text" name="' +mem+ '-mem-name" placeholder="' +mem+ ' Member name..." class="form-username form-control" id="' +mem+ '-mem-name">';
		mem_form += '</div>';
		mem_form += '<div class="form-group">';
		mem_form += '<label class="sr-only" for="' +mem+ '-mem-email">' +mem+ ' member Email Id</label>';
		mem_form += '<input type="email" name="' +mem+ '-mem-email" placeholder="' +mem+ ' Member Email Id..." class="form-email form-control" id="' +mem+ '-mem-email">';
		mem_form += '</div>';
		mem_form += '<div class="form-group">';
		mem_form += '<label class="sr-only" for="' +mem+ '-mem-contact">' +mem+ ' Member Contact</label>';
		mem_form += '<input type="text" name="' +mem+ '-mem-contact" placeholder="' +mem+ ' Member Contact..." class="form-number form-control" id="' +mem+ '-mem-contact"';
		mem_form += 'onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="10">';
		mem_form += '</div>';
		mem_form += '</div>';

		$('.member-details').append(mem_form);
		$(".member-nav header h2").attr("member", count).text(mem + " Member");
		$(".form-group-sub").removeClass('select-mem');
		$("#" + mem).addClass('select-mem');
	});

	/*delete last member */
	$('.btn-minus-mem').on('click', function (e){

		var count = $("#group-mem-count").val();
		count = parseInt(count,10);

		if (count>=3){
			var last_mem = convertNumber(count);
			$(".form-group-sub#" +last_mem).remove();
			count=count - 1;
		}
		var mem = convertNumber(count);
		$("#group-mem-count").val(count);
		$(".member-nav header h2").attr("member", count).text(mem + " Member");
		$(".form-group-sub").removeClass('select-mem');
		$("#" + mem).addClass('select-mem');

	});

	/* convert cardinal to ordinal*/
	function convertNumber (cardinal){

		var cardinal=parseInt(cardinal,10);
		var ordinal_array=['Zeroth','First','Second','Third','Fourth'];
		var ordinal=ordinal_array[cardinal];
		return ordinal;
	};

	/* show the particular group member tab on next member click*/
	$(".btn-next-mem").on('click', function (e) {

		var member = $('.member-nav header h2').attr('member');
		var count = $("#group-mem-count").val();
		member = parseInt(member,10);
		count = parseInt(count,10);
		var next_mem = '';
		if ((member < count)){
			member+=1;
			next_mem = convertNumber(member);
		}
		else if(member == count){
			member = 1;
			next_mem =  convertNumber(member);
		}

		$(".member-nav header h2").attr("member", member).text(next_mem + " Member");
		$(".form-group-sub").removeClass('select-mem');
		$("#" + next_mem).addClass('select-mem');

	});

	/* show the particular group member tab on prev member click*/
	$(".btn-prev-mem").on('click', function (e) {

		var member = $('.member-nav header h2').attr('member');
		var count = $("#group-mem-count").val();
		member = parseInt(member,10);
		count = parseInt(count,10);
		var prev_mem='';

		if ((member > 1) && (member <= count)){
			member-=1;
			prev_mem = convertNumber(member);
		}
		else if(member == 1){
			member = count;
			prev_mem =  convertNumber(member);
		}

		$(".member-nav header h2").attr("member", member).text(prev_mem + " Member");
		$(".form-group-sub").removeClass('select-mem');
		$("#" + prev_mem).addClass('select-mem');

	});

	//Form validation
	$('.login-form input[type="text"], .login-form input[type="password"], .login-form input[type="email"], .login-form textarea, .login-form select').on('focus', function () {
		$(this).removeClass('input-error');
		$(".err-msg").css('display', 'none');
	});

	function checkForm(parent) {

		$(parent).find('input[type="text"], input[type="password"], input[type="email"], textarea, select').each(function () {
			if ($(this).val() == ""||$(this).val() == null) {
				$(this).addClass('input-error');
				$check=false;

				// only to show error for group sign up in member section
				var err_field=this;
				if($(err_field).parent().parent().hasClass('form-group-sub')){
					var member = $(err_field).closest(".form-group-sub").attr('id');
					var mem_num = $(err_field).closest(".form-group-sub").attr('member');
					$(".member-nav header h2").attr("member", mem_num).text(member + " Member");
					$(err_field).closest(".form-group-sub").siblings().removeClass('select-mem');
					$(err_field).closest(".form-group-sub").addClass('select-mem')
				}
				return false;
            }
			else {
                $check=true;
			}
		})
		return $check;
	}

	// single user login
	$("button[name=user-login-btn]").on('click', function (e) {

        $parent = $(this).parent();
        var check = checkForm($parent);

		if(check) {
			var username = $("#username").val();
			var password = $("#password").val();
			var login_type = 'user_login';
			var data = "username=" + username + "&password=" + password + "&login_type=" + login_type;

			$.ajax({
				type: "POST",
				url: "php/login.php",
				data: data,
				async: false,
				success: function (html) {
					if (html == '') {
                        e.preventDefault();
                        window.location.href = "index.php";
                    }
					else {
						$err_msg = html;
						$(".user-login .err-msg").css('display', 'inline', 'important');
						$(".user-login .err-msg").html('<span><strong>' + $err_msg + '</strong></span>');
						e.preventDefault();
					}
				},
				error: function(xhr, status, error) {
					$(".user-login .err-msg").css('display', 'inline', 'important');
					$(".user-login .err-msg").html('<span><strong> An error occured!! Please try again.</strong></span>');
					e.preventDefault();
				}

			});
		}
		else{
			$(".user-login .err-msg").css('display', 'inline', 'important');
			$(".user-login .err-msg").html('<span><strong> All fields are mandatory!!</strong></span>');
			e.preventDefault();
		}
	});

	//group login
	$("button[name=group-login-btn]").on('click', function (e) {
		$parent = $(this).parent();

		var check = checkForm($parent);

		if(check) {
			var groupname = $("#group-name").val();
			var password = $("#group-password").val();
			var login_type = 'group_login';
			var data = "group_name=" + groupname + "&group_password=" + password + "&login_type=" + login_type;

			$.ajax({
				type: "POST",
				url: "php/login.php",
				data: data,
				async: false,
				success: function (html) {
					if (html == '') {
						window.location.href = "index.php";
					}
					else {
						$err_msg = html;
						$(".group-login .err-msg").css('display', 'inline', 'important');
						$(".group-login .err-msg").html('<span><strong>' + $err_msg + '</strong></span>');
						e.preventDefault();
					}
				},
				error: function(xhr, status, error) {
					$(".group-login .err-msg").css('display', 'inline', 'important');
					$(".group-login .err-msg").html('<span><strong> An error occured!! Please try again.</strong></span>');
					e.preventDefault();
				}

			});
		}
		else{
			$(".group-login .err-msg").css('display', 'inline', 'important');
			$(".group-login .err-msg").html('<span><strong> All fields are mandatory!!</strong></span>');
			e.preventDefault();
		}
	});

	//coordinator login
	$("button[name=coord-login-btn]").on('click', function (e) {
		$parent = $(this).parent();

		var check = checkForm($parent);

		if(check) {
			var coordname = $("#coord-name").val();
			var password = $("#coord-password").val();
			var login_type = 'coord_login';
			var data = "coord_name=" + coordname + "&coord_password=" + password + "&login_type=" + login_type;

			$.ajax({
				type: "POST",
				url: "php/login.php",
				data: data,
				async: false,
				success: function (html) {
					if (html == '') {
						window.location.href = "index.php";
					}
					else {
						$err_msg = html;
						$(".coord-login .err-msg").css('display', 'inline', 'important');
						$(".coord-login .err-msg").html('<span><strong>' + $err_msg + '</strong></span>');
						e.preventDefault();
					}
				},
				error: function(xhr, status, error) {
					$(".coord-login .err-msg").css('display', 'inline', 'important');
					$(".coord-login .err-msg").html('<span><strong> An error occured!! Please try again.</strong></span>');
					e.preventDefault();
				}

			});
		}
		else{
			$(".coord-login .err-msg").css('display', 'inline', 'important');
			$(".coord-login .err-msg").html('<span><strong> All fields are mandatory!!</strong></span>');
			e.preventDefault();
		}
	});

	// single user sign-up
	$("button[name=user-sign-btn]").on('click', function (e) {

        $(".user-sign .err-msg").css('display', 'none');
		$parent = $(this).parent();
		var check = checkForm($parent);

		if(check) {
			var user_full_name = $("#userfullname-sign").val();
			var username = $("#username-sign").val();
			var password = $("#password-sign").val();
			var user_insti_code = $("#insti-sign").val();
            var user_insti = $("#insti-sign option:selected").text();
			var user_email = $("#email-sign").val();
			var user_contact = $("#contact-sign").val();
            var user_coord = $("#insti-coord-sign").val();
			var signin_type = 'user_signin';
			var data = "user_full_name=" + user_full_name + "&username=" + username + "&password=" + password + "&user_email=" + user_email +
					"&user_insti=" + user_insti + "&user_insti_code=" + user_insti_code + "&user_contact=" + user_contact + "&user_coord=" + user_coord + "&signin_type=" + signin_type;

			$.ajax({
				type: "POST",
				url: "php/signin.php",
				data: data,
				async: false,
				success: function (html) {
					if (html == '') {
						$('.modal').modal('hide').delay(1000);
                        $('#sign-conf').modal('show').delay(100);
                        e.preventDefault();
					}
					else {
						$err_msg = html;
						$(".user-sign .err-msg").css('display', 'inline', 'important');
						$(".user-sign .err-msg").html('<span><strong>' + $err_msg + '</strong></span>');
						e.preventDefault();
					}
				},
				error: function(xhr, status, error) {
					$(".user-sign .err-msg").css('display', 'inline', 'important');
					$(".user-sign .err-msg").html('<span><strong> An error occured!! Please try again.</strong></span>');
					e.preventDefault();
				}

			});
		}
		else{
			$(".user-sign .err-msg").css('display', 'inline', 'important');
			$(".user-sign .err-msg").html('<span><strong> All fields are mandatory!!</strong></span>');
			e.preventDefault();
		}
	});

    // coordinator sign-up
    $("button[name=coord-sign-btn]").on('click', function (e) {
		$(".coord-sign .err-msg").css('display', 'none');
        $parent = $(this).parent();
        var check = checkForm($parent);

        if(check) {
            var coord_full_name = $("#coord-fullname-sign").val();
            var coord_username = $("#coord-username-sign").val();
            var coord_password = $("#coord-password-sign").val();
            var coord_insti_code = $("#coord-insti-sign").val();
            var coord_insti = $("#coord-insti-sign option:selected").text();
            var coord_email = $("#coord-email-sign").val();
            var coord_contact = $("#coord-contact-sign").val();
            var coord_mng = $("#coord-mng-sign").val();
            var signin_type = 'coord_signin';
            var data = "coord_full_name=" + coord_full_name + "&coord_username=" + coord_username + "&coord_password=" + coord_password + "&coord_email=" + coord_email +
                "&coord_insti=" + coord_insti + "&coord_insti_code=" + coord_insti_code + "&coord_contact=" + coord_contact + "&coord_mng=" + coord_mng + "&signin_type=" + signin_type;

            $.ajax({
                type: "POST",
                url: "php/signin.php",
                data: data,
                async: false,
                success: function (html) {
                    if (html == '') {
                        $('.modal').modal('hide');
                        $('#sign-conf').modal('show');
                        e.preventDefault();
                    }
                    else {
                        $err_msg = html;
                        $(".coord-sign .err-msg").css('display', 'inline', 'important').html('<span><strong>' + $err_msg + '</strong></span>');
                        //$(".coord-sign .err-msg").html('<span><strong>' + $err_msg + '</strong></span>');
                        e.preventDefault();
                    }
                },
                error: function(xhr, status, error) {
                    $(".coord-sign .err-msg").css('display', 'inline', 'important').html('<span><strong> An error occured!! Please try again.</strong></span>');
                    //$(".coord-sign .err-msg").html('<span><strong> An error occured!! Please try again.</strong></span>');
                    e.preventDefault();
                }

            });
        }
        else{
            $(".coord-sign .err-msg").css('display', 'inline', 'important').html('<span><strong> All fields are mandatory!!</strong></span>');
            //$(".coord-sign .err-msg").html('<span><strong> All fields are mandatory!!</strong></span>');
            e.preventDefault();
        }
    });

	// group sign-up
	$("button[name=group-sign-btn]").on('click', function (e){
		$(".group-sign .err-msg").css('display', 'none');
		$parent = $(this).parent();
		var check = checkForm($parent);

		if(check) {
			var group_username = $("#group-username-sign").val();
			var group_password = $("#group-password-sign").val();
			var group_insti_code = $("#group-insti-sign").val();
			var group_insti = $("#group-insti-sign option:selected").text();
			var group_coord_name = $("#group-insti-coord-sign").val();
			var group_mem_count = $("#group-mem-count").val();
			var signin_type = 'group_signin';
			var data= "group_username=" + group_username + "&group_password=" + group_password + "&group_insti_code=" + group_insti_code
					+ "&group_insti=" + group_insti + "&group_coord_name=" + group_coord_name + "&group_mem_count=" + group_mem_count
					+ "&signin_type=" + signin_type;

			var first_mem_fullname = $("#First-mem-name").val();
			var first_mem_email = $("#First-mem-email").val();
			var first_mem_contact = $("#First-mem-contact").val();

			data += "&first_mem_fullname=" + first_mem_fullname + "&first_mem_email=" + first_mem_email + "&first_mem_contact=" + first_mem_contact;

			var second_mem_fullname = $("#Second-mem-name").val();
			var second_mem_email = $("#Second-mem-email").val();
			var second_mem_contact = $("#Second-mem-contact").val();

			data += "&second_mem_fullname=" + second_mem_fullname + "&second_mem_email=" + second_mem_email + "&second_mem_contact=" + second_mem_contact;

			if (group_mem_count > 2){
				var third_mem_fullname = $("#Third-mem-name").val();
				var third_mem_email = $("#Third-mem-email").val();
				var third_mem_contact = $("#Third-mem-contact").val();

				data += "&third_mem_fullname=" + third_mem_fullname + "&third_mem_email=" + third_mem_email + "&third_mem_contact=" + third_mem_contact;
			}

			if (group_mem_count > 3){
				var fourth_mem_fullname = $("#Fourth-mem-name").val();
				var fourth_mem_email = $("#Fourth-mem-email").val();
				var fourth_mem_contact = $("#Fourth-mem-contact").val();

				data += "&fourth_mem_fullname=" + fourth_mem_fullname + "&fourth_mem_email=" + fourth_mem_email + "&fourth_mem_contact=" + fourth_mem_contact;
			}

			$.ajax({
				type: "POST",
				url: "php/signin.php",
				data: data,
				async: false,
				success: function (html) {
					if (html == '') {
                        $('.modal').modal('hide');
                        $('#sign-conf').modal('show');
                        e.preventDefault();
					}
					else {
						$err_msg = html;
						$(".group-sign .err-msg").css('display', 'inline', 'important').html('<span><strong>' + $err_msg + '</strong></span>');
						//$(".group-sign .err-msg").html('<span><strong>' + $err_msg + '</strong></span>');
						e.preventDefault();
					}
				},
				error: function(xhr, status, error) {
					$(".group-sign .err-msg").css('display', 'inline', 'important').html('<span><strong> An error occured!! Please try again.</strong></span>');
					//$(".group-sign .err-msg").html('<span><strong> An error occured!! Please try again.</strong></span>');
					e.preventDefault();
				}

			});

		}
		else{
			$(".group-sign .err-msg").css('display', 'inline', 'important').html('<span><strong> All fields are mandatory!!</strong></span>');
			//$(".group-sign .err-msg").html('<span><strong> All fields are mandatory!!</strong></span>');
			e.preventDefault();
		}


	});
});
