<?php
session_start();
include_once '../class/employee.php';

$employee = new Employee;

$position =$_POST['position'];
$company_name =$_POST['company'];
$industry =$_POST['industry'];
$location =$_POST['location'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];


$employee -> updateWorkExperience($position,$company_name,$industry,$location,$start_date,$end_date);
header("location: ../views/resume_builder.php");
?>