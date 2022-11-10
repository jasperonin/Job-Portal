<?php

include_once '../class/employee.php';
include_once '../class/database.php';

$employee = new Employee;


$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$civil_status = $_POST['civil_status'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$nationality = $_POST['nationality'];
$phone = $_POST['phone'];
$country = $_POST['country'];
$province = $_POST['province'];
$street = $_POST['street'];

$employee -> createApplicant($first_name,$last_name,$email,$dob,$gender,$civil_status,$height,$weight,$nationality, $phone,$country,$province,$street);
header("location: http://localhost/ig-clone/views/applicant-login.php");

?>