<?php

include_once "../class/jobs.php";
include_once "nav.php";
include_once "bootstrap.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicant Login | Job-Portal</title>


</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap');
body{
       font-family: 'Poppins', sans-serif;

}
</style>
<body>
<?php
    session_start();
    include_once "../class/employee.php";

    ini_set('display_errors',0);
    ini_set('display_startup_error','1');
    error_reporting(E_ALL);
    $employee = new Employee;
    if($_SESSION['role'] == 'user'){
        header("location: applicant-profile.php");
    }
    if($_SESSION['role'] == 'admin'){
        header("location: employer-profile.php");
    }


?>
    
    <div class="container mt-5">
        <div class="card w-50 mx-auto border-1">
            <div class="card-header bg-white border-0">
                <h2 class="card-title h3 fw-bold text-center">Applicant Login</h2>
            </div>
            <div class="card-body" >
                <form action="../action/applicant-login.php" method="post">
                    <label for="email" class="form-label fw-bold fs-5">Email *</label>
                    <input type="email" name="email" id="email" class="form-control mb-2" placeholder="email@email.com" required> 

                    <label for="password" class="form-label fw-bold fs-5">Password *</label>
                    <input type="password" name="password" id="password" class="form-control mb-2" placeholder="Password" required>

                    <div class="row">
                        <div class="col mx-5">
                            <input type="checkbox" name="check-login" id="check-login" class="form-check-input">
                            <label for="check-login" class="form-label">Keep Me Logged In</label>
                        </div>
                        <div class="col-4 ms-auto me-auto">
                            <a href="#" class="text-decoration-none" name="forgot_pw" style="color:orangered">Forgot Password?</a>
                        </div>
                    </div>

                    <button class="btn btn-outline-primary w-100 mt-3 text-center fw-bold" type="submit" name="btn_login">Login <i class="fa-solid fa-arrow-right"></i></button>

                    <div class="text-center mt-3">
                        <p class="h6">Create Your Resume Instead?</p>
                        Click To <a href="./applicant-register.php" class="text-decoration-none">Sign Up</a>
                    </div>
                
    
                    <div class="text-center mt-3">
                        <p class="h6">Are you an Employer?</p>
                        Click To <a href="http://localhost/ig-clone/views/admin-login.php" class="text-decoration-none">Sign In</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>