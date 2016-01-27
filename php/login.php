<?php
require_once('conn.php');

if ($_POST['login_type']=="user_login"){

    $user_name=$_POST['username'];
    $password=$_POST['password'];
    $type="user";

    $query="select * from user_login_info where user_name='$user_name' and user_password='$password' and type='$type'";

    $res=mysqli_query($conn,$query);
    $num_rows= mysqli_num_rows($res);
    if ($num_rows==1){
        $status=mysqli_fetch_assoc($res)['user_status'];

        if ($status==1){
            $query="select * from user_details where user_name='$user_name'";
            $res=mysqli_query($conn,$query);
            $insti_code=mysqli_fetch_assoc($res)['user_instituition_code'];

            session_start();
            $_SESSION['logged_user']=$user_name;
            $_SESSION['login_type']=$type;
            $_SESSION['logged_user_insti']=$insti_code;

        }
        elseif($status==0){
            echo "Your profile is not activated yet!!";
        }
        elseif($status==2){
            echo "Sorry, your profile is deactivated. Please contact Coordinator.";
        }
    }
    else{
        echo "login failed!! Please provide valid details.";
    }
}

if ($_POST['login_type']=="group_login"){
    $group_name=$_POST['group_name'];
    $group_password=$_POST['group_password'];
    $type="group";

    $query="select * from user_login_info where user_name='$group_name' and user_password='$group_password' and type='$type'";

    $res=mysqli_query($conn,$query);
    $num_rows= mysqli_num_rows($res);
    if ($num_rows==1){
        $row=mysqli_fetch_assoc($res);
        $status=$row['user_status'];

        if ($status==1){
            $query="select * from group_details WHERE group_user_name='$group_name'";
            $res=mysqli_query($conn,$query);
            $insti_code=mysqli_fetch_assoc($res)['group_instituition_code'];
            $group_strength=mysqli_fetch_assoc($res)['group_instituition_code'];

            session_start();
            $_SESSION['logged_user']=$group_name;
            $_SESSION['login_type']=$type;
            $_SESSION['logged_user_insti']=$insti_code;
            $_SESSION['group_strength']=$group_strength;
        }
        elseif($status==0){
            echo "Your profile is not activated yet!!";
        }
        elseif($status==2){
            echo "Sorry, your profile is deactivated. Please contact Coordinator.";
        }

    }
    else{
        echo "login failed!! Please provide valid details.";
    }

}

if ($_POST['login_type']=="coord_login"){

    $coord_name=$_POST['coord_name'];
    $coord_password=$_POST['coord_password'];
    $type="coord";

    $query="select * from user_login_info where user_name='$coord_name' and user_password='$coord_password' and type='$type'";

    $res=mysqli_query($conn,$query);
    $num_rows= mysqli_num_rows($res);
    if ($num_rows==1){
        $row=mysqli_fetch_assoc($res);
        $status=$row['user_status'];

        if ($status==1){
            $query="select * from coord_details WHERE coord_user_name='$coord_name'";
            $res=mysqli_query($conn,$query);
            $insti_code=mysqli_fetch_assoc($res)['coord_instituition_code'];
            session_start();
            $_SESSION['logged_user']=$coord_name;
            $_SESSION['login_type']=$type;
            $_SESSION['logged_user_insti']=$insti_code;
        }
        elseif($status==0){
            echo "Your profile is not activated yet!!";
        }
        elseif($status==2){
            echo "Sorry, your profile is deactivated. Please contact Coordinator.";
        }
    }
    else{
        echo "login failed!! Please provide valid details.";
    }
}


?>