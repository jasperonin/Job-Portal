
<?php
include_once "../views/nav.php";
include_once "../class/jobs.php";
include_once "../views/bootstrap.php";
include_once "carousel.php";

$jobs = new Jobs;

$job_name = $_POST['job_title'];

$job_result = $jobs->searchJob($job_name, $job_name);



?>
