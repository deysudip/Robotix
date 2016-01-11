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
?>