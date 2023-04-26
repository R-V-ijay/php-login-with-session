<?php


try {
    $connect = mysqli_connect('localhost', 'root', '', 'userreg');
} catch (Exception $ex) {
    echo 'DB connection Error' . mysqli_connect_error();
}


?>