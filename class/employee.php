<?php

require_once "database.php";

class Employee extends Database{

    function createUser($email, $password1, $password2, $first_name, $last_name, $phone_number){
        $user_id = substr(md5(uniqid(rand(),true)),16,16);

        $sql = "INSERT INTO user_account (`id`, `email`, `password1`, `password2`, `first_name`, `last_name`, `phone_number`, `role`)
                VALUES ('$user_id','$email', '$password1', '$password2', '$first_name', '$last_name', '$phone_number', 'user')";

         if($this->conn->query($sql)){
            echo "<script> alert('User created succcesfully') </script>";
            
         }
         else {
            echo "<div class='bg-danger fw-bold w-50'> Unable to create user </div>".$this -> conn -> error;
         }
    }

    function createEmployer($email, $password1, $password2, $first_name, $last_name, $phone_number){
        $user_id = substr(md5(uniqid(rand(),true)),16,16);

        $sql = "INSERT INTO user_account (`id`, `email`, `password1`, `password2`, `first_name`, `last_name`, `phone_number`, `role`)
                VALUES ('$user_id','$email', '$password1', '$password2', '$first_name', '$last_name', '$phone_number', 'admin')";

         if($this->conn->query($sql)){
            echo "<script> alert('User created succcesfully') </script>";
            
         }
         else {
            echo "<div class='bg-danger fw-bold w-50'> Unable to create user </div>".$this -> conn -> error;
         }
    }

    function loginAdmin($email,$password) {
      $sql = "SELECT * FROM user_account WHERE email = '$email'";

      if($result = $this->conn->query($sql)) {
         if($result -> num_rows == 1){
            $row = $result->fetch_assoc();
            if(password_verify($password, $row['password1'])){
               session_start();
               $_SESSION['id'] = $row['id'];
               $_SESSION['first_name'] = $row['first_name'];
               $_SESSION['last_name'] = $row['last_name'];
               $_SESSION['role'] = $row['role'] == 'admin';

               if($_SESSION['role'] == 'admin') {
                  header("location: ../views/employer-profile.php");
                  exit;
               }
            }
            else {
               echo "<div class='h4 text-center bg-warning fw-bold text-danger'> Incorrect Password. </div>".$this->conn->error;
            }
         }
         else {
            echo "<div class='h4 text-center bg-warning fw-bold text-danger'> Email not found. </div>".$this->conn->error;
         }
      }
    }

    function loginApplicant($email,$password) {
      $sql = "SELECT * FROM user_account WHERE email = '$email'";

      if($result = $this->conn->query($sql)) {
         if($result -> num_rows == 1){
            $row = $result->fetch_assoc();
            if(password_verify($password, $row['password1'])){
               session_start();
               $_SESSION['id'] = $row['id'];
               $_SESSION['first_name'] = $row['first_name'];
               $_SESSION['last_name'] = $row['last_name'];
               $_SESSION['role'] = $row['role'];

               if($_SESSION['role'] == 'user') {
                  header("location: ../views/applicant-profile.php");
                  exit;
               }

               if($_SESSION['role'] == 'admin') {
                  header("location: ../views/employer-profile.php");
                  exit;
               }
            }
            else {
               echo "<div class='h4 text-center bg-warning fw-bold text-danger'> Incorrect Password. </div>".$this->conn->error;
            }
         }
         else {
            echo "<div class='h4 text-center bg-warning fw-bold text-danger'> Email not found. </div>".$this->conn->error;
         }
      }
    }

    function getEmployee($id) {
      
      $sql = "SELECT id, email,`first_name`, `last_name` FROM user_account WHERE id = $id";

      $result = $this -> conn -> query($sql);
      return $result;
    }

    function createApplicant($first_name, $last_name, $email, $dob, $gender, $civil_status, $height, $weight, $nationality, $phone, $country, $province, $street) {
      $sql = "UPDATE user_credentials SET `first_name` ='$first_name', `last_name` ='$last_name', `email`='$email', `dob`= '$dob', `gender`='$gender', `civil_status`='$civil_status', `height`='$height', `weight`='$weight', `nationality`='$nationality', `phone`='$phone', `country`='$country', `province`='$province', `street`=''$street'' WHERE email = ?";

    if($result = $this->conn->query($sql)) {
      return $result;
   }
   else {
      echo "<p class='text-danger fw-bold'> Something went wrong </p>".$this->conn->error;
   }
}
   function displayResume(){
      $sql = "SELECT u.*, w.* FROM user_credentials u INNER JOIN work_experience w ON u.user_id = w.user_id";

      if($result = $this->conn->query($sql)) {
         if($result -> num_rows > 0) {
            while($row = $result->fetch_assoc()){
               $_SESSION['first_name'] = $row['first_name'];
               $_SESSION['last_name'] = $row['last_name'];
               $_SESSION['dob'] = $row['dob'];
               $_SESSION['email'] = $row['email'];
               $_SESSION['gender'] = $row['gender'];
               $_SESSION['civil_status'] = $row['civil_status'];
               $_SESSION['height'] = $row['height'];
               $_SESSION['weight'] = $row['weight'];
               $_SESSION['nationality'] = $row['nationality'];
               $_SESSION['phone'] = $row['phone'];
               $_SESSION['country'] = $row['country'];
               $_SESSION['province'] = $row['province'];
               $_SESSION['street'] = $row['street'];
               $_SESSION['position'] = $row['position'];
               $_SESSION['company_name'] = $row['company_name'];
               $_SESSION['industry'] = $row['industry'];
               $_SESSION['location'] = $row['location'];
               $_SESSION['start_date'] = $row['start_date'];
               $_SESSION['end_date'] = $row['end_date'];

               echo "
               <div class='container mx-auto px-5'>
                     <div class='card'>
                        <div class='card-header'>
                           <h3 class='h4 fw-bold text-center'>Resume</h3>
                        </div>
                        <div class='card-body'>
                        <h2 class='h3'>Personal Information</h2>
                        <hr>
                           <div class ='row'>
                              <div class='col-4'>
                                 <label for='name' class='form-label small'>First Name</label>
                                 <input type='text' class='form-control text-capitalize' disabled value='".$_SESSION['first_name']."'>
                              </div>

                              <div class='col-4'>
                                 <label for='name' class='form-label small'>Last Name</label>
                                 <input type='text' class='form-control text-capitalize' disabled value='".$_SESSION['last_name']."'>
                              </div>
                              
                              <div class='col-4'>
                                 <label for='name' class='form-label small'>Active Email</label>
                                 <input type='text' class='form-control text-capitalize' disabled value='".$_SESSION['email']."'>
                              </div>
                           </div>

                           <div class ='row mt-3'>
                              <div class='col-4'>
                                 <label for='name' class='form-label small'>Date of Birth</label>
                                 <input type='text' class='form-control text-capitalize' disabled value='".$_SESSION['dob']."'>
                              </div>

                              <div class='col-4'>
                                 <label for='name' class='form-label small'>Gender</label>
                                 <input type='text' class='form-control text-capitalize' disabled value='".$_SESSION['gender']."'>
                              </div>
                              
                              <div class='col-4'>
                                 <label for='name' class='form-label small'>Active Email</label>
                                 <input type='text' class='form-control text-capitalize' disabled value='".$_SESSION['civil_status']."'>
                              </div>
                           </div>

                           <div class ='row mt-3'>
                              <div class='col-4'>
                                 <label for='name' class='form-label small'>Height</label>
                                 <input type='text' class='form-control text-capitalize' disabled value='".$_SESSION['height']."'>
                              </div>

                              <div class='col-4'>
                                 <label for='name' class='form-label small'>Weight</label>
                                 <input type='text' class='form-control text-capitalize' disabled value='".$_SESSION['weight']."'>
                              </div>
                              
                              <div class='col-4'>
                                 <label for='name' class='form-label small'>Nationality</label>
                                 <input type='text' class='form-control text-capitalize' disabled value='".$_SESSION['nationality']."'>
                              </div>
                           </div>
                           <h2 class='h3 mt-3'>Contact Details</h2>
                           <hr>
                           <div class ='row mt-3'>
                              <div class='col-12'>
                                 <label for='name' class='form-label small'>Phone</label>
                                 <input type='text' class='form-control text-capitalize' disabled value='".$_SESSION['phone']."'>
                              </div>
                           </div>

                           
                           <h2 class='h3 mt-3'>Address Details</h2>
                           <hr>
                           <div class ='row mt-3'>
                              <div class='col-6'>
                                 <label for='name' class='form-label small'>Country</label>
                                 <input type='text' class='form-control text-capitalize' disabled value='".$_SESSION['country']."'>
                              </div>
                              <div class='col-6'>
                                 <label for='name' class='form-label small'>Province/State</label>
                                 <input type='text' class='form-control text-capitalize' disabled value='".$_SESSION['province']."'>
                              </div>
                           </div>

                           <div class ='row mt-3'>
                              <div class='col-12'>
                                 <label for='name' class='form-label small'>Street Address</label>
                                 <input type='text' class='form-control text-capitalize' disabled value='".$_SESSION['street']."'>
                              </div>
                           </div>

                           <h2 class='h3 mt-3'>Work Experince</h2>
                           <hr>
                            <div class ='row mt-3'>
                              <div class='col-6'>
                                 <label for='name' class='form-label small'>Title</label>
                                 <input type='text' class='form-control text-capitalize' disabled value='".$_SESSION['position']."'>
                              </div>
                              <div class='col-6'>
                                 <label for='name' class='form-label small'>Company Name</label>
                                 <input type='text' class='form-control text-capitalize' disabled value='".$_SESSION['company_name']."'>
                              </div>
                           </div>
                           
                           <div class ='row mt-3'>
                              <div class='col-6'>
                                 <label for='name' class='form-label small'>Industry</label>
                                 <input type='text' class='form-control text-capitalize' disabled value='".$_SESSION['industry']."'>
                              </div>
                              <div class='col-6'>
                                 <label for='name' class='form-label small'>Location</label>
                                 <input type='text' class='form-control text-capitalize' disabled value='".$_SESSION['location']."'>
                              </div>
                           </div>

                           <div class ='row mt-3'>
                              <div class='col-6'>
                                 <label for='name' class='form-label small'>Start Date</label>
                                 <input type='text' class='form-control text-capitalize' disabled value='".$_SESSION['start_date']."'>
                              </div>
                              <div class='col-6'>
                                 <label for='name' class='form-label small'>End Date</label>
                                 <input type='text' class='form-control text-capitalize' disabled value='".$_SESSION['end_date']."'>
                              </div>
                           </div>
                        </div>
                     </div>
               
               </div>
               ";

            }
         }
         else {
            echo "<p class='text-danger text-center fw-bold'>Something went wrong</p>";
         }
      } else {
         echo "<p class='text-danger text-center fw-bold'>Error in SQL</p>";
      }
   }

    function updateWorkExperience($position,$company_name,$industry,$location,$start_date, $end_date) {
     
      $sql = "INSERT INTO `work_experience` (position, company_name, industry, `location`, `start_date`, `end_date`) VALUES ('$position',  '$company_name', '$industry',  '$location', '$start_date', '$end_date')";

      $result = $this->conn->query($sql);
      return $result;
    }

    function displayWorkExperience(){

      $sql = "SELECT `user_id`,position, company_name, industry, `location`, `start_date`, `end_date` FROM work_experience";

      echo "<div class='table-responsive'>";
      echo "<table class='table table-hover table-xxl' style='border-spacing:30px'>";
      echo "<thead>";
         echo"<th scope='col'>Title</th>";
         echo"<th></th>";
         echo"<th>Company Name</th>";
         echo"<th></th>";
         echo"<th>Industry</th>";
         echo"<th></th>";
         echo"<th>Location</th>";
         echo"<th></th>";
         echo"<th>Start Date</th>";
         echo"<th></th>";
         echo"<th>End Date</th>";
         echo"<th></th>";
         echo"<th>Actions</th>";
      echo "</thead>";
      if($result = $this->conn->query($sql)) {
         if($result ->num_rows >0) {
           while($row = $result->fetch_assoc()){
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['position'] = $row['position'];
            $_SESSION['company_name'] = $row['company_name'];
            $_SESSION['industry'] = $row['industry'];
            $_SESSION['location'] = $row['location'];
            $_SESSION['start_date'] = $row['start_date'];
            $_SESSION['end_date'] = $row['end_date'];

           
                  echo "<tr>";
                     echo "<td>".$_SESSION['position']."</td>";
                     echo "<td>".""."</td>";
                     
                     echo "<td>".$_SESSION['company_name']."</td>";
                     echo "<td>"." "."</td>";
                     echo "<td>".$_SESSION['industry']."</td>";
                     echo "<td>"." "."</td>";
                     echo "<td>".$_SESSION['location']."</td>";
                     echo "<td>"." "."</td>";
                     echo "<td>".$_SESSION['start_date']."</td>";
                     echo "<td>"." "."</td>";
                     echo "<td>".$_SESSION['end_date']."</td>";
                     echo "<td>  </td>";
                     echo "<td> 
                              <a href='#' class='btn btn-outline-warning btn-lg'><i class='fas fa-pencil-alt'></i></a>
                              <a href='#' class='btn btn-outline-danger btn-lg'><i class='fas fa-trash-alt'></i></a>
                           </td>";
                  echo "</tr>";
         
         
           }
         
         }
         else {
            echo "<p class='text-danger text-center fw-bold'> No Records Found. </p>";
         }
      }    
      else {
         die("There's a problem with the query".$this->conn->error);
      }
      echo "</table>";
      echo "</div>";
    }

}

?>