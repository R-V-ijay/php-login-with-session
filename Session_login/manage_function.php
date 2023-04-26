<?php


session_start();
require_once 'dbconnection.php';
extract($_REQUEST);


if (isset($login_check)) {

    $query = "SELECT email,password,user_name from user_details WHERE email='$email' AND password = '$password'";

    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_email'] = $row['email'];
        $_SESSION['user_name'] = $row['user_name'];



        echo json_encode(array('status' => 'success', 'message' => 'successfully logged in'));
    } else {
        echo json_encode(array('status' => 'faild', 'message' => 'Username And password is incorrect'));
    }

}
?>