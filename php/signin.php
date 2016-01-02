<?php
if(isset($_POST[user_sign])){

    if(isset($_SESSION[logged_user])){

        $_SESSION[logged_user]='';
        session_destroy();
    }

    $user_name=$_POST[username-sign];
    $user_pass=$_POST[password-sign];
    $user_pass_conf=$_POST[password-sign-conf];
    $user_email=$_POST[email-sign];
    $user_contact=$_POST[contact-sign];
    $user_insti=$_POST[insti-sign];

    if($user_pass!=$user_pass_conf){
        $err_message="both password doesnot match!!";
    }



}


?>