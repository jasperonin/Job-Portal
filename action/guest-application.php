<?php
session_start();
include_once "../class/jobs.php";

$job = new Jobs;

$id = $_POST['id'];
$full_name = $_POST['full_name'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone_number = $_POST['phone'];
$region = $_POST['regions'];
$province = $_POST['province'];
$city = $_POST['city'];
$letter = $_POST['letter'];




$job->guestApplication($id,$email,$gender,$phone_number,$region,$province,$city,$letter);




?>