<?php

require_once "../class/employee.php";

$employee = new Employee;

$email = $_POST['email'];
$password = $_POST['password'];

$employee->loginApplicant($email,$password);

?>