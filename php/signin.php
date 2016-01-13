<?php
require_once('conn.php');

// single user sign up
if($_POST['signin_type']=="user_signin"){

    if(isset($_SESSION['logged_user'])){
        $_SESSION['logged_user']='';
        $_SESSION['login_type']='';
        session_destroy();
    }

    $user_full_name=mysqli_real_escape_string($conn,$_POST['user_full_name']);
    $user_name=mysqli_real_escape_string($conn,$_POST['username']);
    $user_pass=mysqli_real_escape_string($conn,$_POST['password']);
    $user_email=mysqli_real_escape_string($conn,$_POST['user_email']);
    $user_contact=mysqli_real_escape_string($conn,$_POST['user_contact']);
    $user_insti=mysqli_real_escape_string($conn,$_POST['user_insti']);
    $user_insti_code=mysqli_real_escape_string($conn,$_POST['user_insti_code']);
    $user_coord=mysqli_real_escape_string($conn,$_POST['user_coord']);
    $type=mysqli_real_escape_string($conn,'user');

    $check=true;

    if($check){
        $query_username="select * from user_details where user_name='$user_name'";
        $res=mysqli_query($conn,$query_username);
        $num_rows= mysqli_num_rows($res);
        if ($num_rows!=0){
            $check=false;
            $err_msg="User name is already existed!! Please choose another";
        }
    }
    if($check){
        $query_email="select * from user_details where user_email='$user_email'";
        $res=mysqli_query($conn,$query_email);
        $num_rows= mysqli_num_rows($res);
        if ($num_rows!=0){
            $check=false;
            $err_msg="Email id is already registered!!";
        }
    }
    if($check){
        $query_contact="select * from user_details where user_contact='$user_contact'";
        $res=mysqli_query($conn,$query_contact);
        $num_rows= mysqli_num_rows($res);
        if ($num_rows!=0){
            $check=false;
            $err_msg="Contact No is already registered!!";
        }
    }

    if($check){
        $query_user="insert into user_details (user_fullname,user_name,password,user_email,user_contact,user_instituition,user_instituition_code,user_coord) values('$user_full_name','$user_name',
              '$user_pass','$user_email','$user_contact','$user_insti','$user_insti_code','$user_coord')";
        $row=0;
        if(mysqli_query($conn,$query_user)){
            $row=mysqli_affected_rows($conn);
        }

        if($row!=1){
            $check=false;
            $err_msg="Some problem occurred!! Please try again";
        }
    }

    if($check) {
        $query_login = "insert into user_login_info (type,user_name,user_password) values('$type','$user_name','$user_pass')";
        $row=0;
        if (mysqli_query($conn, $query_login)) {
            $row = mysqli_affected_rows($conn);
        }

        if ($row!=1) {
            $check=false;
            $err_msg="Some problem occurred!! Please try again";
        }
    }

    if($check){
        mysqli_commit($conn);
        mysqli_close($conn);
        session_start();
        $_SESSION['logged_user']=$user_name;
        $_SESSION['login_type']=$type;
    }
    else{
        mysqli_rollback($conn);
        mysqli_close($conn);
        echo $err_msg;
    }
}

//coordinator sign up
if($_POST['signin_type']=="coord_signin"){

    if(isset($_SESSION['logged_user'])){
        $_SESSION['logged_user']='';
        $_SESSION['login_type']='';
        session_destroy();
    }

    $coord_full_name=mysqli_real_escape_string($conn,$_POST['coord_full_name']);
    $coord_user_name=mysqli_real_escape_string($conn,$_POST['coord_username']);
    $coord_pass=mysqli_real_escape_string($conn,$_POST['coord_password']);
    $coord_email=mysqli_real_escape_string($conn,$_POST['coord_email']);
    $coord_contact=mysqli_real_escape_string($conn,$_POST['coord_contact']);
    $coord_insti=mysqli_real_escape_string($conn,$_POST['coord_insti']);
    $coord_insti_code=mysqli_real_escape_string($conn,$_POST['coord_insti_code']);
    $coord_mng=mysqli_real_escape_string($conn,$_POST['coord_mng']);
    $type=mysqli_real_escape_string($conn,'coord');

    $check=true;

    if($check){
        $query_username="select * from coord_details where coord_user_name='$coord_user_name'";
        $res=mysqli_query($conn,$query_username);
        $num_rows= mysqli_num_rows($res);
        if ($num_rows!=0){
            $check=false;
            $err_msg="User name is already existed!! Please choose another";
        }
    }
    if($check){
        $query_email="select * from coord_details where coord_email='$coord_email'";
        $res=mysqli_query($conn,$query_email);
        $num_rows= mysqli_num_rows($res);
        if ($num_rows!=0){
            $check=false;
            $err_msg="Email id is already registered!!";
        }
    }
    if($check){
        $query_contact="select * from coord_details where coord_contact='$coord_contact'";
        $res=mysqli_query($conn,$query_contact);
        $num_rows= mysqli_num_rows($res);
        if ($num_rows!=0){
            $check=false;
            $err_msg="Contact No is already registered!!";
        }
    }

    if($check){
        $query_coord="insert into coord_details (coord_fullname,coord_user_name,coord_password,coord_email,coord_contact,coord_instituition,coord_instituition_code,coord_manager)
                    values('$coord_full_name','$coord_user_name','$coord_pass','$coord_email','$coord_contact','$coord_insti','$coord_insti_code','$coord_mng')";

        $row=0;
        if(mysqli_query($conn,$query_coord)){
            $row=mysqli_affected_rows($conn);
        }

        if($row!=1){
            $check=false;
            $err_msg="Some problem occurred!! Please try again";
        }
    }

    if($check) {
        $query_login = "insert into user_login_info (type,user_name,user_password) values('$type','$coord_user_name','$coord_pass')";
        $row=0;
        if (mysqli_query($conn, $query_login)) {
            $row = mysqli_affected_rows($conn);
        }

        if ($row!=1) {
            $check=false;
            $err_msg="Some problem occurred!! Please try again";
        }
    }

    if($check){
        mysqli_commit($conn);
        mysqli_close($conn);
        session_start();
        $_SESSION['logged_user']=$coord_user_name;
        $_SESSION['login_type']=$type;
    }
    else{
        mysqli_rollback($conn);
        mysqli_close($conn);
        echo $err_msg;
    }
}

// group sign up
if($_POST['signin_type']=="group_signin") {

    if (isset($_SESSION['logged_user'])) {
        $_SESSION['logged_user'] = '';
        $_SESSION['login_type'] = '';
        session_destroy();
    }

    $group_user_name=mysqli_real_escape_string($conn,$_POST['group_username']);
    $group_pass=mysqli_real_escape_string($conn,$_POST['group_password']);
    $group_insti=mysqli_real_escape_string($conn,$_POST['group_insti']);
    $group_insti_code=mysqli_real_escape_string($conn,$_POST['group_insti_code']);
    $group_coord_name=mysqli_real_escape_string($conn,$_POST['group_coord_name']);
    $group_mem_count=mysqli_real_escape_string($conn,$_POST['group_mem_count']);
    $type=mysqli_real_escape_string($conn,'group');
    
    $column_name = "(group_user_name,group_password,group_instituition,group_instituition_code,group_coordinator,group_mem_count";
    $values = "('$group_user_name','$group_pass','$group_insti','$group_insti_code','$group_coord_name','$group_mem_count'";
    
    $first_mem_full_name=mysqli_real_escape_string($conn,$_POST['first_mem_fullname']);
    $first_mem_email=mysqli_real_escape_string($conn,$_POST['first_mem_email']);
    $first_mem_contact=mysqli_real_escape_string($conn,$_POST['first_mem_contact']);

    $column_name .= ",first_mem_fullname,first_mem_email,first_mem_contact";
    $values .= ",'$first_mem_full_name','$first_mem_email','$first_mem_contact'";

    $second_mem_full_name=mysqli_real_escape_string($conn,$_POST['second_mem_fullname']);
    $second_mem_email=mysqli_real_escape_string($conn,$_POST['second_mem_email']);
    $second_mem_contact=mysqli_real_escape_string($conn,$_POST['second_mem_contact']);

    $column_name .= ",second_mem_fullname,second_mem_email,second_mem_contact";
    $values .= ",'$second_mem_full_name','$second_mem_email','$second_mem_contact'";
    
    if ($group_mem_count > 2){
        $third_mem_full_name=mysqli_real_escape_string($conn,$_POST['third_mem_fullname']);
        $third_mem_email=mysqli_real_escape_string($conn,$_POST['third_mem_email']);
        $third_mem_contact=mysqli_real_escape_string($conn,$_POST['third_mem_contact']);

        $column_name .= ",third_mem_fullname,third_mem_email,third_mem_contact";
        $values .= ",'$third_mem_full_name','$third_mem_email','$third_mem_contact'";
    }

    if ($group_mem_count > 3){
        $fourth_mem_full_name=mysqli_real_escape_string($conn,$_POST['fourth_mem_fullname']);
        $fourth_mem_email=mysqli_real_escape_string($conn,$_POST['fourth_mem_email']);
        $fourth_mem_contact=mysqli_real_escape_string($conn,$_POST['fourth_mem_contact']);

        $column_name .= ",fourth_mem_fullname,fourth_mem_email,fourth_mem_contact";
        $values .= ",'$fourth_mem_full_name','$fourth_mem_email','$fourth_mem_contact'";
    }

    $check=true;

    if($check){
        $query_username="select group_user_name from group_details where group_user_name='$group_user_name'";
        $res=mysqli_query($conn,$query_username);
        $num_rows= mysqli_num_rows($res);
        if ($num_rows!=0){
            $check=false;
            $err_msg="Group name is already existed!! Please choose another";
        }
    }

    if($check) {
        $column_name .= ")";
        $values .=")";

        $query_group = "insert into group_details " .$column_name. " values" .$values;
        $row = 0;
        if (mysqli_query($conn, $query_group)) {
            $row = mysqli_affected_rows($conn);
        }

        if ($row != 1) {
            $check = false;
            $err_msg = "Some problem occurred!! Please try again";
        }
    }

    if($check) {
        $query_login = "insert into user_login_info (type,user_name,user_password) values('$type','$group_user_name','$group_pass')";
        $row = 0;
        if (mysqli_query($conn, $query_login)) {
            $row = mysqli_affected_rows($conn);
        }

        if ($row != 1) {
            $check = false;
            $err_msg = "Some problem occurred!! Please try again";
        }
    }
    if($check){
        mysqli_commit($conn);
        mysqli_close($conn);
        session_start();
        $_SESSION['logged_user']=$group_user_name;
        $_SESSION['login_type']=$type;
    }
    else{
        mysqli_rollback($conn);
        mysqli_close($conn);
        echo $err_msg;
    }
    
}
?>