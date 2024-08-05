<?php
  include("include/connection.php");

  if (isset($_POST['create'])) {
    $fname = $_POST['fname'];
    $sname = $_POST['sname'];
    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];
    $cpwd = $_POST['cpwd'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];

    $error = array();

    if (empty($fname)) {
        $error['fname'] = "Firstname is required";
    } elseif (empty($sname)) {
        $error['sname'] = "Surname is required";
    } elseif (empty($uname)) {
        $error['uname'] = "Username is required";
    } elseif (empty($pwd)) {
        $error['pwd'] = "Password is required";
    } elseif (empty($cpwd)) {
        $error['cpwd'] = "Confirm your password";
    } elseif ($pwd!= $cpwd) {
        $error['pwd'] = "Passwords do not match";
    } elseif (empty($email)) {
        $error['email'] = "Email Address is required";
    } elseif (empty($phone)) {
        $error['phone'] = "Phone Number is required";
    } elseif (empty($gender)) {
        $error['gender'] = "Select your gender";
    }

    if (count($error)==0) {
        $password = password_hash($pwd, PASSWORD_DEFAULT);

        $q = "INSERT INTO patient(firstname,surname,username,password,email,gender,phone,date_reg,profile) VALUES('$fname','$sname','$uname','$password','$email','$gender','$phone',NOW(),'patient.jpg')";
        $result = mysqli_query($connect, $q);

        if ($result) {
            header("Location:patientlogin");
            echo "<script>alert('Registration Successful. Please wait for admin approval')</script>";
        } else {
            echo "<script>alert('Failed to register')</script>";
        }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create an Account</title>
</head>
<body style="background-image: url(img/back.jpeg); background-repeat:no-repeat; background-size:cover;">

    <?php
        include ("include/header.php");
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">
                    <div class="6" jumbotron my-5>
                        <h5 class="text-center">Sign Up</h5>
                        <form method="post">
                            <div class="form-group">
                                <label>Firstname</label>
                                <input type="text" name="fname" class="form-control" placeholder="Enter Firstname">
                            </div>
                            <div class="form-group">
                                <label>Surname</label>
                                <input type="text" name="sname" class="form-control" placeholder="Enter Surname">
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="uname" class="form-control" placeholder="Enter Username">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="pwd" class="form-control" placeholder="Enter Identification Number">
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" name="pwd2" class="form-control" placeholder="Confirm Password">
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number">
                            </div>
                            <div class="form-group">
                                <label for="uname">Gender</label>
                                <select type="text" name="gender" class="form-control" placeholder="Enter Username"</select>
                                <option value="">Select Your Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Prefer not to say</option>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter Email">
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Create Account
                            </button>
                            <p class="mt-3 text-center">Already have an account? <a href="patientlogin.php">Login</a></p>
                        </form>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>