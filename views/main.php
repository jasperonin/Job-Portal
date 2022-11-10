<?php

include_once "./class/jobs.php";

$jobs = new Jobs;

$job_details = $jobs->getCurrentPosting();

?>

<main>
    

<div class="container-fluid ">
    <div class="mx-2  p-5" style="height: 75vh; row-gap: 100px;">
        <h2 class="h4 fw-bold">Recent Posting</h2>
        <div class="row">
            <div class="col-3">
                <h4 class="h5">Position</h3>
            </div>
            <div class="col-3">
                <h4 class="h5">Company</h3>
            </div>
            <div class="col-3">
                <h4 class="h5">Location</h3>
            </div>
            <div class="col-3">
                <h4 class="h5">Date</h3>
            </div>
        </div>

        <?php
        while ($job = $job_details -> fetch_assoc()) { ?>
            <a href="/ig-clone/views/job_result.php?id=<?=$job['id']?>" class="text-decoration-none"> <?php
      ?>  
            <div class="row gy-3 mt-4 py-3" style="background-color: #e9ffdb;" id="recent_post">

                <div class="col-3 fw-bold text-primary">
                    <?php echo $job['job_name']; ?>
                </div>

                <div class="col-3 fw-bold text-dark">
                    <?php echo $job['company_name']; ?>
                </div>

                <div class="col-3 fw-bold text-dark">
                    <?php echo $job['location']; ?>
                </div>

                <div class="col-3 fw-bold text-dark">
                    <?php echo $job['availability']; ?>
                </div>

            </div>
        </a>
        <?php } ?>
            
    </div>
</div>
</main>

