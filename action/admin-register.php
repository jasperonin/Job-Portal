<?php
session_start();

require_once "../class/database.php";
require_once "../class/employee.php";
$employee = new Employee;

$email = $_POST['email'];
$password1 = password_hash($_POST['password1'],PASSWORD_DEFAULT);
$password2 = password_hash($_POST['password2'],PASSWORD_DEFAULT);
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$phone_number = $_POST['phone_number'];

$employee -> createEmployer($email,$password1,$password2,$first_name,$last_name,$phone_number);
header("location: http://localhost/ig-clone/views/admin-login.php");
?>