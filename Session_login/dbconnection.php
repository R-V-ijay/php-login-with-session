<?php
date_default_timezone_set("Asia/Kolkata");

try {
    $connect = mysqli_connect('localhost', 'root', '', 'userreg');
} catch (Exception $ex) {
    echo 'DB connection Error' . mysqli_connect_error();
}


?>
