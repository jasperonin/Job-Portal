<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Portal</title>

    <!--bootstrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!--JQuery-->

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js" integrity="sha256-xLD7nhI62fcsEZK2/v8LsBcb4lG7dgULkuXoXB/j91c=" crossorigin="anonymous"></script>

</head>
<body>

<?php
    include_once "../ig-clone/views/nav.php";
?>

<?php
    include_once "./views/carousel.php";
?>

<?php
    session_start();
    include_once "./class/employee.php";

    ini_set('display_errors',0);
    ini_set('display_startup_error','1');
    error_reporting(E_ALL);
    $employee = new Employee;
    // if($_SESSION['role'] == 'user'){
    //     header("location: ./views/job_result.php");
    // }


?>

<header class="container-fluid my-3">
    <div class="mx-2 bg-primary" style="height: 18vh;">
        <h1 class="h2 text-center fw-bold text-white">Search For Jobs!</h1>

        <div class="container bg-secondary my-3 p-3">
            <form action="./action/search_result.php" method="post" class="form-group d-flex">
                <input type="text" name="job_title" id="job_title" class="form-control w-75 mx-3" placeholder="Enter Job Title/Company Name">
                
                <input type="submit" value="Search" name="search_btn" class="btn btn-success w-25">
            </form>
        </div>
    </div>
</header>



<?php
    include_once "./views/main.php";
?>

    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>