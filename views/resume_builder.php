<?php
include_once 'bootstrap.php';
include_once '../class/employee.php';

$employee = new Employee;

?>


<div class="container mt-5">
<h3 class="h4 mx-auto fw-bold">Resume Builder</h4>
  <div class="d-flex align-items-start py-5">
    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Personal Information <i class="bi bi-person"></i></button>
      <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Work Experience <i class="bi bi-briefcase"></i></button>
      <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">View Resume <i class="bi bi-gear"></i></button>
    </div>
    <div class="tab-content mx-auto" id="v-pills-tabContent">

        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
          <div class="container">
            <div class="card border-0 ">
              <div class="card-header bg-transparent">
                <h3 class="card-title h4">Personal Information</h3>
              </div>
              <div class="card-body">
                
                <form action="../action/resume-builder.php" id="form_info" method="post" class="form-group">

                  <div class="row">
                    <div class="col-4">
                      <label for="first_name" class="form-label small">First Name</label>
                      <input type="text" name="first_name" id="first_name" class="form-control">
                    </div>
                    
                    <div class="col-4">          
                      <label for="last_name" class="form-label small">Last Name</label>
                      <input type="text" name="last_name" id="last_name" class="form-control">
                    </div>

                    <div class="col-4">          
                      <label for="email" class="form-label small">Email</label>
                      <input type="text" name="email" id="middle_name" class="form-control">
                    </div>
                  </div>

                  
                  <div class="row mt-2">
                    <div class="col-4">
                      <label for="dob" class="form-label small">Date of Birth</label>
                      <input type="date" name="dob" id="dob" class="form-control">
                    </div>
                    
                    <div class="col-4">          
                      <label for="gender" class="form-label small">Gender</label>
                      <select name="gender" id="gender" class="form-select">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                      </select>
                    </div>

                    <div class="col-4">          
                      <label for="civil_status" class="form-label small">Civil Status</label>
                      <input type="text" name="civil_status" id="civil_status" class="form-control">
                    </div>
                  </div>

                  <div class="row mt-2">
                    <div class="col-4">
                      <label for="height" class="form-label small">Height (cm)</label>
                      <input type="number" name="height" id="height" class="form-control" min="0" max="300">
                    </div>
                    
                    <div class="col-4">          
                      <label for="weight" class="form-label small">Weight (kg)</label>
                      <input type="number" name="weight" id="weight" class="form-control" min="0" max="300">
                    </div>

                    <div class="col-4">          
                      <label for="nationality" class="form-label small">Nationality</label>
                      <input type="text" name="nationality" id="nationality" class="form-control">
                    </div>
                  </div>
                  
                  <div class="row mt-4">
                  <h3 class="h4">Contact Details</h3>
                    <div class="col">   
                      <label for="phone" class="form-label small">Phone number</label>
                      <input type="text" name="phone" id="phone" class="form-control" min="0" max="300">
                    </div>
                  </div>

                  <div class="row mt-4">
                  <h3 class="h4">Address Details</h3>
                  <div class="col-6">   
                      <label for="country" class="form-label small">Country</label>
                      <input type="text" name="country" id="country" class="form-control">
                    </div>

                    <div class="col-6">   
                      <label for="province" class="form-label small">Province / State</label>
                      <input type="text" name="province" id="province" class="form-control">
                    </div>

                    <div class="col">
                      <label for="street" class="form-label small">Street Address</label>
                      <input type="text" name="street" id="street" class="form-control">
                    </div>
                  </div>
                  <input type="submit" data-bs-toggle="modal" data-bs-target="btn_save" id="btn_save" value="Submit" class="btn btn-outline-primary w-100 mt-3" name="btn_save">
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
          <div class="container">
     
                <a href="#" id="btn_save" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="text-decoration-none btn btn-outline-success px-5 mb-3">Add <i class="bi bi-plus fa-lg"></i></a>
              <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="staticBackdropLabel">Add Work Experience</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="../action/work-experience.php" method="post" class="form-group" id="form_info">
                      <div class="modal-body">
                        <label for="position" class="form-label small">Position</label>
                        <input type="text" name="position" id="position" class="form-control" required>

                        <label for="company" class="form-label small mt-3">Company Name</label>
                        <input type="text" name="company" id="company" class="form-control" required>

                        <label for="industry" class="form-label small mt-3">Company Industry</label>
                        <input type="text" name="industry" id="industry" class="form-control" required>

                        <label for="location" class="form-label small mt-3">Location</label>
                        <input type="text" name="location" id="location" class="form-control" required>

                        <label for="start_date" class="form-label small mt-3">Start Date</label>
                        <input type="date" name="start_date" id="start_date" class="form-control" required>

                        <label for="end_date" class="form-label small mt-3">End Date</label>
                        <input type="date" name="end_date" id="end_date" class="form-control" required>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-primary" name="btn_submit">Save</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
          </div>
          
          <?php $employee -> displayWorkExperience()?>
          
        </div>

        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
          
          <?php 
          echo $employee -> displayResume(); 
          ?>
        </div>
    </div>

  </div>
</div>



