<?php

include_once "nav.php";
include_once "bootstrap.php";
include_once "../class/jobs.php";

session_start();

$job = new Jobs;
$job_id = $_GET['id'];
$job_result = $job->getAllJobs($job_id);
$region_result = $job->getRegion();
$province_result = $job->getProvince();
$cities_result = $job->getCities();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Results</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" /></head>
<body>
    <?php
        while($jobs = $job_result->fetch_assoc()){ ?>

        <div class="container-fluid my-4">
            <span class="btn btn-xl"><a href="#"><i class="fa-brands fa-square-facebook fa-2x"></i></a></span>
            <span class="btn btn-xl"><a href="#"><i class="fa-solid fa-envelope fa-2x"></i></a></span>
            <span class="btn btn-xl"><a href="#"><i class="fa-brands fa-linkedin fa-2x"></i></a></span>
            
            <div class="row">
                <div class="col-7">
                    <div class="h3 mt-3 mx-2 fw-bold">
                        <?php echo $jobs['job_name']; ?>
                    </div>

                    <div class="h4 mt-3 mx-2 fw-bold">
                        <a href="#" class="text-decoration-none"><?php echo $jobs['company_name']; ?></a>
                    </div>

                    <div class="mx-2 px-2 py-2 mt-2 d-inline-block text-small border-rounded" style="background-color: #AFDBF5; border-radius: 5px;">
                        Established in <?php echo $jobs['established']; ?> 
                    </div>

                    <div class="mx-2 px-2 py-2 mt-2 d-inline-block text-small" style="background-color: #AFDBF5; border-radius: 5px;">
                        51 - 100 Employees
                    </div>

                    <div class="mt-3 mx-2 fs-5">
                        <i class="fa-sharp fa-solid fa-location-dot"></i>
                        <?php echo $jobs['location']; ?>
                    </div>

                    <div class="mt-3 mx-2 fs-6">
                        <i class="fa-regular fa-octagon-check"></i>
                        <?php echo "Posted on: <strong>".$jobs['availability']."</strong>"; ?>
                    </div>
                    <div class="mx-2 fs-6">
                        <i class="fa-regular fa-octagon-check"></i>
                        <?php echo "Job ID: <strong>".$jobs['id']."</strong>"; ?>
                    </div>

                    <div class="mt-5 h3 mx-2">Job Details <hr class="w-25"></div>
                    <div class="mx-2 fs-5">
                        <?php echo "Position: <strong>".$jobs['job_name']."</strong>"; ?>
                    </div>

                    <div class="mt-3 mx-2 w-75" style="line-height: 50px; text-align: justify;">
                        <?php echo $jobs['company_overview']; ?>
                    </div>
                </div>

                <div class="col-5">
                    <div class="card w-100">
                        <div class="card-header bg-white border-0">
                            <h3 class="h4 card-title">Quick Apply</h3>
                            <div class="card-body">
                                <form action="../action/guest-application.php" method="post" class="form-group">

                                    <input type="hidden" name="id" id="id" value="<?= $jobs['id']?>" required>

                                    <!--FULL NAME-->
                                    <label for="full_name" class="form-label text-small h6">Full Name *</label>
                                    <input type="text" name="full_name" id="full_name" class="form-control">

                                    <!--GENDER-->
                                    <label for="gender" class="form-label text-small h6 mt-3">Gender *</label>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="gender" id="male" value="male" required>
                                            <label for="gender" class="form-check-label mx-2">Male</label>
                                        <input type="radio" name="gender" id="male" value="female" required>
                                            <label for="gender" class="mx-2 form-check-label">Female</label>
                                    </div>

                                    <!--EMAIL ADDRESS-->
                                    <label for="email" class="form-label text-small mt-3 h6 d-block">E-mail Address *</label>
                                    <input type="email" name="email" id="email" class="form-control">
                                    
                                    <!--PHONE NUMBER-->
                                    <label for="phone" class="form-label text-small mt-3 h6 d-block">Phone Number *</label>
                                    <input type="number" name="phone" id="phone" placeholder="09XXXXXXX" class="form-control" required>
                                    
                                    <label for="phone" class="form-label text-small mt-3 h6 d-block">Regions *</label>
                                    <select name="regions" id="regions" class="form-select mt-3">
                                    <?php
                                        while($regions = $region_result->fetch_assoc()){
                                            echo "<option>". $regions['name']."</option>";
                            
                                        }
                                    ?>
                                    </select>
                                    
                                    <label for="province" class="form-label text-small mt-3 h6 d-block">Provinces *</label>
                                    <select name="province" id="province" class="form-select mt-3">
                                    <?php
                                        while($provinces = $province_result->fetch_assoc()){
                                            echo "<option>". $provinces['name']."</option>";
                            
                                        }
                                    ?>
                                    </select>

                                    <label for="city" class="form-label text-small mt-3 h6 d-block">City *</label>
                                    <select name="city" id="city" class="form-select mt-3">
                                    <?php
                                        while($cities = $cities_result->fetch_assoc()){
                                            echo "<option>". $cities['name']."</option>";
                            
                                        }
                                    ?>
                                    </select>
                    
                                    <label for="letter" class="form-label text-small mt-3 h6 d-block">Application Letter *</label>
                                    <textarea name="letter" id="" cols="30" rows="15" class="form-control">Dear <?php echo $jobs['company_name'];?>, 

Hello and good day! 

This letter is in response to your <?php echo $jobs['job_name']; ?> advertisement in Job-portal.com on <?php echo $jobs['availability']; ?>.

[Short description of your achievements and contact information here]

Thank you very much.

Regards,

[Your Name]
</textarea>
                                    
                                <button type="submit" value="Send Application" class="btn btn-outline-primary mt-3 mx-auto w-100 p-3" name="btn_submit">Submit <i class="fa-solid fa-paper-plane"></i></button>                                 
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

       <?php }
    ?>
</body>
</html>