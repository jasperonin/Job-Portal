<?php

require_once "database.php";

class Jobs extends Database {

    function getCurrentPosting(){

        $sql = "SELECT j.id, j.job_name, c.company_name, c.location, j.availability 
                FROM job_tbl j LEFT JOIN company c
                ON j.id = c.job_id";

        $result = $this->conn->query($sql);
        return $result;
    }

    
    function getCompanyName(){

      $sql = "SELECT j.id, j.job_name, c.company_name, c.location, j.availability 
              FROM job_tbl j LEFT JOIN company c
              ON j.id = c.job_id";

     if( $result = $this->conn->query($sql)){
      if($result->num_rows>0){
        while($row = $result->fetch_assoc()){
          $_SESSION['company_name'] = $row['company_name'];
          $_SESSION['job_name'] = $row['job_name'];
        }
      }
    }
  }

    function getRegion() {
      $sql ="SELECT * FROM regions ";

      $result = $this->conn->query($sql);
      return $result;
    }

    function getProvince() {
      $sql ="SELECT id, `name`,region_code FROM province";

      $result = $this->conn->query($sql);
      return $result;
    }

    function getCities() {
      $sql ="SELECT * FROM cities";

      $result = $this->conn->query($sql);
      return $result;
    }
    
    function getAllJobs($job_id) {
      $sql = "SELECT j.*, c.*, EXTRACT(YEAR FROM c.established) as established
      FROM job_tbl j LEFT JOIN company c
      ON j.id = c.job_id
      WHERE j.id = $job_id";

      $result = $this->conn->query($sql);
      return $result;
    }

    function guestApplication($job_id, $email,$gender,$phone_number, $region, $province, $city, $letter) {
      
      $sql = "INSERT INTO `guest_application` (job_id, email,gender, phone_number, region, province, city, letter) 
              VALUES ('$job_id', '$email','$gender',$phone_number, '$region', '$province', '$city', '$letter')";
      
      $sql_company = "SELECT j.id, j.job_name, c.company_name, c.location, j.availability 
      FROM job_tbl j LEFT JOIN company c
      ON j.id = c.job_id";

      if($result = $this->conn->query($sql)) {

        if($result_company = $this->conn->query($sql_company)){
          if($result_company->num_rows>0){
            while($row = $result_company->fetch_assoc()){
              $_SESSION['company_name'] = $row['company_name'];
              $_SESSION['job_name'] = $row['job_name'];
            }
          }
        }
        $receiver = "snzleo@gmail.com";
        $subject = "Application:".$_SESSION['company_name']."";
        $message = "Greetings,

        Thank you for your interest in Applying as ".$_SESSION['job_name']." at ".$_SESSION['company_name'].".

        Our team will be reviewing your application and will get back to you soon. 

        Please reach out to us. Should you have any questions.

        Regards,
        ".$_SESSION['company_name']."";
        $sender = "From:".$_SESSION['company_name']."@gmail.com";

        mail($receiver, $subject, $message, $sender);
        echo 
        "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>

        
        <div class='container mt-5 '> 
          <div class='card border-1 w-50 mx-auto'>
            <div class='card-body text-center'>
              <h4 class='h5'>Application Successfully Sent! Please check your E-mail Address for confirmation.</h4>
              <a href='http://localhost/ig-clone' class='btn btn-outline-secondary mx-auto text-decoration-none'>Return to Previous Page</a>
            </div>
          </div>
        </div>";
        header("refresh: 1; URL= 'http://localhost/ig-clone/'");
        exit;
      } else {
        die($this->conn->error);
      }
      return $result;
    }

    function searchJob($job_name,$comp_name) {
        $sql =  " SELECT j.id,j.job_name, c.company_name, c.location, j.availability
                  FROM job_tbl j
                  INNER JOIN company c
                  ON j.id = c.job_id
                  WHERE j.job_name like '%".$job_name."%'  or c.company_name like '%".$comp_name."%' ";


        if($result = $this->conn->query($sql)){
            if($result -> num_rows > 0) {
              
              echo "
              <header class='container-fluid my-3'>
                  <div class='mx-2 bg-primary' style='height: 18vh;'>
                      <h1 class='h2 text-center fw-bold text-whit'>Search For Jobs!</h1>
              
                      <div class='container bg-secondary my-3 p-3'>
                          <form action='./search_result.php' method='post' class='form-group d-flex'>
                              <input type='text' name='job_title' id='job_title' class=form-control w-75 mx-3' placeholder='Enter Job Title/Company Name'>
                              
                              <input type='submit' value='Search' name='search_btn' class='btn btn-success w-25'>
                          </form>
                      </div>
                  </div>
              </header>
              ";
                echo "
                <div class ='container-fluid'>
                    <div class='mx-2  p-5 mt-3' style='height: 75vh; row-gap: 100px;'>    
                        <h2 class='h4 fw-bold'>You've searched for <strong> $job_name <strong></h2> 
                           <div class ='row'>
                                <div class='col'>
                                  <h4 class='h5'> Position </h4>
                                </div>
                                <div class='col'>
                                  <h4 class='h5'> Company </h4>
                                </div>
                                <div class='col'>
                                  <h4 class='h5'> Location </h4>
                                </div>
                                <div class='col'>
                                  <h4 class='h5'> Date </h4>
                           </div>
                    ";
                
                    while($job = $result ->fetch_assoc()) {
                 
       
                       echo "
                       <a href ='http://localhost/ig-clone/views/job_result.php?id=".$job['id']."' class='text-decoration-none'>
                       <div class='row gy-3 mt-4 py-3' style='background-color: #e9ffdb;' >
                         <div class='col-3 h6 text-primary fw-bold'>".htmlspecialchars($job['job_name'])."</div>
                         <div class='col-3 h6 fw-bold text-dark'>".$job['company_name']."</div>
                         <div class='col-3 h6 fw-bold text-dark'>".$job['location']."</div>
                         <div class='col-3 h6 fw-bold text-dark'>".$job['availability']."</div>
                       </div>
                       </a>
                       ";
                    
                    }
                   
                   echo "</div>";
                echo "</div> ";
          
                } else {
                  echo "
                      <header class='container-fluid my-3'>
                          <div class='mx-2 bg-primary' style='height: 18vh;'>
                              <h1 class='h2 text-center fw-bold text-whit'>Search For Jobs!</h1>

                              <div class='container bg-secondary my-3 p-3'>
                                  <form action='./search_result.php' method='post' class='form-group d-flex'>
                                      <input type='text' name='job_title' id='job_title' class=form-control w-75 mx-3' placeholder='Enter Job Title/Company Name'>
                                      
                                      <input type='submit' value='Search' name='search_btn' class='btn btn-success w-25'>
                                  </form>
                              </div>
                          </div>
                      </header>
                      ";
                  echo "
                <div class ='container-fluid'>
                    <div class='mx-2  p-5 mt-3' style='height: 75vh; background-color: #d3d3d3; row-gap: 100px;'>    
                        <h2 class='h4 fw-bold'>You've searched for <strong> $job_name <strong></h2> 
                        
                    ";
                
                       echo "
                         <div class='text-center display-5 mt-5'> No result found on <strong>$job_name</strong>. </div>
                       ";
                    
                   echo "</div>";
                echo "</div> ";
                }
            } 
        
        
    }

}

?>