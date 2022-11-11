<?php

require_once "../class/employee.php";

$employee = new Employee;

$email = $_POST['email'];
$password = $_POST['password'];

$employee->loginAdmin($email,$password);
header("location: ../views/employer-profile.php");
?>