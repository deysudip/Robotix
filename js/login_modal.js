
jQuery(document).ready(function() {


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

    /* auto population of coordinator name based on instituition name */
    $('select.insti-drop').on('change', function(){

        var insti_code = $(this).val();
        var data="req_type=coord&insti_code=" + insti_code;
        $.ajax({
            type: "POST",
            url: "php/function.php",
            data: data,
            success: function (html) {
                $(".coord-drop").html(html);
            }
        })

    });

    /* auto population of Relationship manger name */
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


	/*
	 Form validation
	 */
	$('.login-form input[type="text"], .login-form input[type="password"], .login-form input[type="email"], .login-form textarea, .login-form select').on('focus', function () {
		$(this).removeClass('input-error');
        $(".err-msg").css('display', 'none');
	});
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

	$(".btn-next-mem").on('click', function (e) {

		var member = $('.member-nav header h2').attr('member');
		switch (member) {
			case 'First':
				var next_mem = 'Second';
				break;
			case 'Second':
				var next_mem = 'Third';
				break;
			case 'Third':
				var next_mem = 'Fourth';
				break;
			case 'Fourth':
				var next_mem = 'First';
				break;
			default:
				break;
		}
		$(".member-nav header h2").attr("member", next_mem);
		$(".member-nav header h2").text(next_mem + " Member");
		$(".form-group-sub").removeClass('select-mem');
		$("#" + next_mem).addClass('select-mem');

	});
	$(".btn-prev-mem").on('click', function (e) {

		var member = $('.member-nav header h2').attr('member');
		switch (member) {
			case 'First':
				var next_mem = 'Fourth';
				break;
			case 'Second':
				var next_mem = 'First';
				break;
			case 'Third':
				var next_mem = 'Second';
				break;
			case 'Fourth':
				var next_mem = 'Third';
				break;
			default:
				break;
		}
		$(".member-nav header h2").attr("member", next_mem);
		$(".member-nav header h2").text(next_mem + " Member");
		$(".form-group-sub").removeClass('select-mem');
		$("#" + next_mem).addClass('select-mem');

	});

	function checkForm(parent) {

		$(parent).find('input[type="text"], input[type="password"], input[type="email"], textarea, select').each(function () {
			if ($(this).val() == ""||$(this).val() == null) {
				$(this).addClass('input-error');
				$check=false;
            }
			else {
                $check=true;
			}
		})
		return $check;
	}

	// single user login
	$("button:submit[name=user-login-btn]").on('click', function (e) {

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
	$("button:submit[name=group-login-btn]").on('click', function (e) {
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
	$("button:submit[name=coord-login-btn]").on('click', function (e) {
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
	$("button:submit[name=user-sign-btn]").on('click', function (e) {

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
						window.location.href = "index.php";
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

    // Coordinator sign-up
    $("button:submit[name=coord-sign-btn]").on('click', function (e) {

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
                        window.location.href = "index.php";
                    }
                    else {
                        $err_msg = html;
                        $(".coord-sign .err-msg").css('display', 'inline', 'important');
                        $(".coord-sign .err-msg").html('<span><strong>' + $err_msg + '</strong></span>');
                        e.preventDefault();
                    }
                },
                error: function(xhr, status, error) {
                    $(".coord-sign .err-msg").css('display', 'inline', 'important');
                    $(".coord-sign .err-msg").html('<span><strong> An error occured!! Please try again.</strong></span>');
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
});
