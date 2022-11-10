<?php

include_once "../class/employee.php";
session_start();

$employee = new Employee;

$employee_list = $employee -> getEmployee($_SESSION['id']);
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <div class="container-fluid">
        <a href="../index.php" class="navbar-brand fw-bold">Job Portal</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle align-items-center h5 text-capitalize" id="profile_menu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Hello, <?= $_SESSION['first_name']." ".$_SESSION['last_name']?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="drop_down_menu_link">
                        <li>
                            <a href="#" class="dropdown-item">Profile</a>
                        </li>
                        <li>
                            <a href="../index.php" class="dropdown-item">Search for Jobs</a>
                        </li>
                        <li>
                            <a href="../action/signout.php" class="dropdown-item">Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

</nav>