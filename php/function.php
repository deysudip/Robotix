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

    $event_array = array();
    while($row=mysqli_fetch_assoc($res)){
        $event_array[]=array("event_code" => $row['event_code'],"event_title" => $row['event_title'],"event_date" => $row['event_date'],
                        "event_desc" => $row['event_desc'],"event_min" => $row['event_min'],"event_max" => $row['event_max'],
                        "event_insti" => $row['event_insti'],"event_uni_flag" => $row['event_uni_flag']);
    }

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
?>