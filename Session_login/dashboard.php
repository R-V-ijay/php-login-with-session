<?php 
session_start();
require_once('dbconnection.php');

if(isset($_SESSION['user_email']) && isset($_SESSION['user_name'])){


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="./style.css">
</head>

<body class="d-flex justify-content-center align-items-center">
    <div class="container row d-flex justify-content-center ">
        <div class="col-lg-6 login p-4">
            <h1 class="m-auto">Dashboard</h1>
            <hr>
            <a href="logout.php">Log out</a>
            <h5 class="mt-3">Id :<span id="userid"> <?=$_SESSION['user_id']?></span></h5>
            <h5 class="mt-3">Name : <?=$_SESSION['user_name']?></h5>
            <h5 class="mt-3">Email : <?=$_SESSION['user_email']?></h5>




            <?php 

            $id= $_SESSION['user_id'];
            $cdate = date('Y-m-d');
            $query = "SELECT * FROM report WHERE emp_id = $id AND check_in_date = '$cdate'";
            $result = mysqli_query($connect,$query);

            if(mysqli_num_rows($result) == 0){

            ?>
                <div class="d-flex">
                    <button class="btn btn-success mb-3 w-25 check_in_btn">Check in</button><span id="check_in_time" class="ms-2 mt-1"></span>
                </div>  
                <div>
                    <button class="btn btn-warning check_out_btn w-25" style="display:none;">Check Out</button><span id="check_out_time"  class="ms-2 mt-1"></span>
                </div>
               
            <?php
            }else{

                $row=mysqli_fetch_assoc($result);
                $check_in_time =$row['check_in_time'];
                $check_out_time =$row['check_out_time'];
                $check_in_date =$row['check_in_date'];

                if($check_in_time == '00:00:00'){
                ?>
                <div class="d-flex">
                    <button class="btn btn-success mb-3 w-25 check_in_btn">Check in</button><span id="check_in_time" class="ms-2 mt-1"></span>
                </div>
                <?php
                }else{
                    
                ?><div>
                    <span id="check_in_time" class="ms-2 mt-1">Started At : <?= $check_in_date . " " . $check_in_time ?></span>
                </div>
                <?php
                }
                if($check_out_time == '00:00:00'){

                ?>
                    <div>
                        <button class="btn btn-warning check_out_btn w-25">Check Out</button><span id="check_out_time"  class="ms-2 mt-1"></span>
                    </div>
                <?php

                }else{
                        ?>
                            <div>
                            <span id="check_out_time"  class="ms-2 mt-1"> Ended At : <?= $check_in_date . " " . $check_out_time ?></span>
                            </div>
                            <?php
                }
               }

            ?>    





            
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="./script.js"></script>
</body>

</html>

<?php
}else{
header('location:login.php');
}

?>
