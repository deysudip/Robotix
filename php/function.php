<?php
require_once('conn.php');

$req_type = $_POST['req_type'];

if($req_type=='insti'){

    $option="<option disabled selected value=''>Select Your Instituition..</option>";

    $query="select * from institution_details order by instituition_name ASC ";
    $res=mysqli_query($conn,$query);

    while($row=mysqli_fetch_assoc($res)){
        $option.="<option value='".$row['instituition_code']."'>".$row['instituition_name']."</option>";
    }
    echo $option;
}

if($req_type=='coord'){

    $insti_code = $_POST['insti_code'];

    $option="<option disabled selected value=''>Select Your Coordinator..</option>";

    $query="select * from coord_details where coord_instituition_code='$insti_code' order by coord_user_name ASC ";
    $res=mysqli_query($conn,$query);

    while($row=mysqli_fetch_assoc($res)){
        $option.="<option value='".$row['coord_user_name']."'>".$row['coord_fullname']."  (".$row['coord_user_name'].")</option>";
    }
    echo $option;
}

if($req_type=='mng'){

    $insti_code = $_POST['insti_code'];

    $option="<option disabled selected value=''>Select Your Relationship Manager..</option>";

    $query="select * from manager_details where mngr_instituition_code='$insti_code' order by mngr_user_name ASC ";
    $res=mysqli_query($conn,$query);

    while($row=mysqli_fetch_assoc($res)){
        $option.="<option value='".$row['mngr_user_name']."'>".$row['mngr_fullname']."  (".$row['mngr_user_name'].")</option>";
    }
    echo $option;
}

if($req_type=='event_details'){

    $current_year = $_POST['current_year'];
    $current_month = $_POST['current_month'];
    $current_day = $_POST['current_day'];
    $current_date = $current_year.'-'.$current_month.'-'.$current_day;

    $event_query = "select * from event_details where event_date='$current_date'";
    $res=mysqli_query($conn,$event_query);
    $row=mysqli_fetch_assoc($res);

    $event_insti_code = $row['event_insti'];
    $query = "select * from institution_details where instituition_code='$event_insti_code'";
    $res_insti=mysqli_query($conn,$query);
    $event_insti_name = mysqli_fetch_assoc($res_insti)['instituition_name'];
    $event_code = mysqli_fetch_assoc($res)['event_code'];

    $event_array = array();
    $event_array[]=array("event_code" => $row['event_code'],"event_title" => $row['event_title'],"event_date" => $row['event_date'],
        "event_desc" => $row['event_desc'],"event_min" => $row['event_min'],"event_max" => $row['event_max'],
        "event_insti_code" => $row['event_insti'],"event_insti_name" => $event_insti_name,"event_insti_flag" => $row['event_uni_flag']);



    echo json_encode($event_array);

}

if($req_type=='event_date'){

    $current_year = $_POST['current_year'];
    $current_month = $_POST['current_month'];

    $event_query = "select DAY(event_date) as event_day from event_details where year(event_date)='$current_year' and  month(event_date)='$current_month'";
    $res=mysqli_query($conn,$event_query);

    $event_array = array();
    while($row=mysqli_fetch_assoc($res)){
        $event_array[]=array("event_day" => $row['event_day']);
    }

    echo json_encode($event_array);

}

if($req_type=='register'){

    $signed_user = $_POST['username'];
    $login_type = $_POST['login_type'];
    $event_code = $_POST['event_code'];
    $check = true;

    $query_check = "select * from registration_details where user_name='$signed_user' and user_type='$login_type' and event_code='$event_code'";
    $res= mysqli_query($conn,$query_check);
    if(mysqli_num_rows($res)>0){
        $check=false;
        echo ("Sorry! You are already registered!");
    }

    $query = "insert into registration_details (user_name,user_type,event_code) values ('$signed_user','$login_type','$event_code')";

    $row=0;
    if ($check && mysqli_query($conn,$query)) {
        $row = mysqli_affected_rows($conn);
        if ($row!=1) {
            $check=false;
            $err_msg="Some problem occurred!! Please try again";
            echo ($err_msg);
        }
    }

    if($check){
        mysqli_commit($conn);
        mysqli_close($conn);
    }
    else{
        mysqli_rollback($conn);
        mysqli_close($conn);
    }
}
?>