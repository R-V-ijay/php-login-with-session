<?php


session_start();
require_once('dbconnection.php');
extract($_REQUEST);


if (isset($login_check)) {

    $query = "SELECT id,email,password,user_name from user_details WHERE email='$email' AND password = '$password'";

    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_email'] = $row['email'];
        $_SESSION['user_name'] = $row['user_name'];

        echo json_encode(array('status' => 'success', 'message' => 'successfully logged in'));
    } else {
        echo json_encode(array('status' => 'faild', 'message' => 'Username And password is incorrect'));
    }
}

else if(isset($check_in)){
$cdate = date('Y-m-d');
$ctime =  date('H:i:s');
$insert_query  = "INSERT INTO report(check_in_date ,check_in_time , emp_id) VALUES('$cdate','$ctime', '$userid')";
$insert_result = mysqli_query($connect,$insert_query);

if($insert_result){
    echo json_encode(array('status' => 'success', 'CheckInTime' => $cdate . " " . $ctime));
} else {
    echo json_encode(array('status' => 'faild', 'message' => 'Check in faild'.mysqli_error($insert_query)));
}
    
}


else if(isset($check_out)){
    $cdate = date('Y-m-d');
    $ctime = date('H:i:s');
    $update_query  = "UPDATE report SET check_out_time = '$ctime' WHERE emp_id = $userid AND check_in_date = '$cdate'";
    $update_result = mysqli_query($connect,$update_query);
   
   if($update_result){
       echo json_encode(array('status' => 'success', 'CheckOutTime' => $cdate . " " . $ctime));
   } else {
       echo json_encode(array('status' => 'faild', 'message' => 'Check Out faild'.mysqli_error($update_query)));
   }
       
   }
?>
