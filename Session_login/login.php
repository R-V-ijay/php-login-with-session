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
            <h1 class="m-auto">Login</h1>
            <hr>
            <form action="dashboard.php" onsubmit="return checkUserExist()" method="post">
                <div id="loginStatus" class="text-warning"></div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="userEmail" name="email"
                        placeholder="Enter Your Email Id">
                </div>
                <div class="mb-3">
                    <label for="userPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" id="userPassword" placeholder="Enter Your Password"
                        name="password">
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary" id="sub">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./script.js"></script>
</body>

</html>