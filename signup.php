<?php
session_start();

include("db.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $ConfirmPassword = $_POST['Confirmpassword'];
    $Role = $_POST['Role'];
    $Gender = $_POST['Gender'];

    // Check if the password and confirm password match
    if ($Password !== $ConfirmPassword) {
        echo "<script type='text/javascript'>alert('Password and Confirm Password do not match')</script>";
    } else {
        // Check if the email already exists in the database
        $check_query = "SELECT * FROM fyp_coding WHERE Email = '$Email'";
        $result = mysqli_query($con, $check_query);
        if (mysqli_num_rows($result) > 0) {
            echo "<script type='text/javascript'>alert('Email is already registered')</script>";
        } else {
            // Insert the new user record if the email is not already registered
            if (!empty($Email) && !empty($Password) && !is_numeric($Email)) {
                $query = "INSERT INTO fyp_coding (Name, Email, Password, Confirmpassword, Role, Gender) VALUES ('$Name','$Email','$Password','$ConfirmPassword','$Role','$Gender')";
                if (mysqli_query($con, $query)) {
                    echo "<script type='text/javascript'>alert('Successfully Registered')</script>";
                } else {
                    echo "<script type='text/javascript'>alert('Error: " . mysqli_error($con) . "')</script>";
                }
            } else {
                echo "<script type='text/javascript'>alert('Please enter valid information')</script>";
            }
        }
    }
}
?>




<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registration or Sign Up form in HTML CSS | CodingLab </title> 
    <link rel="stylesheet" href="style.css">
   </head>
<body>
  <div class="wrapper">
    <h2>HarmonyCare Registration</h2>
    <form METHOD="POST">
      <div class="input-box">
        <input type="text" placeholder="Name" name = "Name" required>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Email" name = "Email" required>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Password" name = "Password"required>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Confirm password" name = "Confirmpassword" required>
      </div>

      <div class="form-group"> 
                    <label class="col-md-4 control-label">Role</label>
                    <div class="col-md-4 selectContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                            <select name="Role" class="form-control selectpicker">
                                <option value="">Role</option>
                                <option value = "Caregiver">Caregiver</option>
                                <option value = "Care Recipient">Care Recipient</option>
                            </select>
                        </div>
                    </div>
                </div>

      <div class="form-group">
                  <label class="col-md-4 control-label">Gender</label>
                  <div class="col-md-4 selectContainer">
                      <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                          <select name="Gender" class="form-control selectpicker" >
                              <option value="">Gender</option>
                              <option value = "Male">Male</option>
                              <option value = "Female">Female</option>
                              <option value = "Others">Other</option>
                          </select>
                      </div>
                  </div>
              </div>  

      
      <div class="input-box button">
        <input type="Submit" value="Register Now">
      </div>
      <div class="text">
        <h3>Already have an account? <a href="login.php">Login now</a></h3>
      </div>
    </form>
  </div>
</body>
</html>

<style>
  @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
body{
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #4070f4;
}
.wrapper{
  position: relative;
  max-width: 430px;
  width: 100%;
  background: #fff;
  padding: 34px;
  border-radius: 6px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.2);
}
.wrapper h2{
  position: relative;
  font-size: 22px;
  font-weight: 600;
  color: #333;
}
.wrapper h2::before{
  content: '';
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 28px;
  border-radius: 12px;
  background: #4070f4;
}
.wrapper form{
  margin-top: 30px;
}
.wrapper form .input-box{
  height: 52px;
  margin: 18px 0;
}
form .input-box input{
  height: 100%;
  width: 100%;
  outline: none;
  padding: 0 15px;
  font-size: 17px;
  font-weight: 400;
  color: #333;
  border: 1.5px solid #C7BEBE;
  border-bottom-width: 2.5px;
  border-radius: 6px;
  transition: all 0.3s ease;
}
.input-box input:focus,
.input-box input:valid{
  border-color: #4070f4;
}
form .policy{
  display: flex;
  align-items: center;
}
form h3{
  color: #707070;
  font-size: 14px;
  font-weight: 500;
  margin-left: 10px;
}
.input-box.button input{
  color: #fff;
  letter-spacing: 1px;
  border: none;
  background: #4070f4;
  cursor: pointer;
}
.input-box.button input:hover{
  background: #0e4bf1;
}
form .text h3{
 color: #333;
 width: 100%;
 text-align: center;
}
form .text h3 a{
  color: #4070f4;
  text-decoration: none;
}
form .text h3 a:hover{
  text-decoration: underline;
}
</style>
