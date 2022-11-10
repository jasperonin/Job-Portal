<?php

include_once "nav.php";
include_once "bootstrap.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Job Portal</title>
</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap');
body{
       font-family: 'Poppins', sans-serif;

}
</style>
<body>
    
    <div class="container w-25 mx-auto">
        <div class="mt-5 text-center">
            <h2 class="h3">Register Here</h2>
            <p>Please fill out all necessary information.</p>
        </div>
        <div class="mt-3">
            <form action="../action/admin-register.php" method="post" class="form-group">
                <label for="email" class="form-label">Email Address *</label>
                <input type="email" name="email" id="email" class="form-control" required>

                <label for="password1" class="form-label">Password *</label>
                <input type="password" name="password1" id="password1" class="form-control" required>

                <label for="password2" class="form-label">Confirm Password *</label>
                <input type="password" name="password2" id="password2" class="form-control" required>

                <label for="first_name" class="form-label mt-3">First Name *</label>
                <input type="text" name="first_name" id="first_name" class="form-control" required>

                <label for="last_name" class="form-label">Last Name *</label>
                <input type="text" name="last_name" id="last_name" class="form-control" required>

                <label for="phone" class="form-label text-small mt-3 h6 d-block">Phone Number *</label>
                <input type="tel" name="phone" id="phone" pattern="[0-9]{4}-[0-9]{3}-[0-9]{4}" placeholder="09XX-XXX-XXXX" class="form-control">

                <div class="mx-auto">
                    <input type="submit" value="Register" class="btn btn-md mt-3 text-white w-100" style="background-color: orangered;">
                </div>
            </form>
        </div>
    </div>

</body>
</html>