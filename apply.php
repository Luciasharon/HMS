<?php
include("include/connection.php");

if(isset($_POST['apply'])) {
    $fname = $_POST['fname'];
    $sname = $_POST['sname'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $pass = $_POST['pass'];
    $confirm_password = $_POST['con_pass'];

    $error = array();

    if(empty($fname)) {
        $error['fname'] = "Firstname is required";
    }else if(empty($sname)) {
        $error['sname'] = "Surname is required";
    }else if(empty($uname)) {
        $error['uname'] = "Username is required";
    }else if(empty($email)) {
        $error['email'] = "Email Address is required";
    }else if(empty($gender)) {
        $error['gender'] = "Gender is required";
    }else if(empty($phone)) {
        $error['phone'] = "Phone Number is required";
    }else if(empty($pass)) {
        $error['pass'] = "Password is required";
    }else if(empty($confirm_password)) {
            $error['con_pass'] = "Confirm Password is required";
    }else if($pass!= $confirm_password) {
            $error['con_pass'] = "Password Mismatch";
    }

    if(count($error) == 0) {
        $query = "INSERT INTO doctors(firstname,surname,username,email,gender,phone,password,salary,data_reg,status,profile) VALUES('$firstname','$surname','$username','$email','$gender','$phone','$password','0',NOW(),'Pending','doctor.jpeg'";
        $result = mysqli_query($connect,$query);

        if ($result) {
            echo "<script>alert('Registration Successful')</script>";
            header("Location:index.php");
            exit();
        }else{
            echo "<script>alert('Username already exist')</script>";
        }
    }
}

if (isset($error['apply'])){
    $s = $error['apply'];
    $show = "<h5 class='text-center alert alert-danger'>$s</h5>";
}else{
    $show = "";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create an account</title>
</head>
<body style="background-image: url(img/back.jpeg);background-size:cover; background-repeat:no-repeat;">
    <?php
    include("include/header.php");
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 my-3 jumbotron">
                    <h5 class="text-center my-2">Create an account</h5>
                        <div>
                            <?php echo $show;?>
                        </div>
                    <form method="post">
                        <div class="form-group">
                            <label>Firstname</label>
                            <input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter Firstname" value="<?php if (isset($_POST['fname'])) echo $_POST['fname'];?>">
                        </div>
                        <div class="form-group">
                            <label>Surname</label>
                            <input type="text" name="sname" class="form-control" autocomplete="off" placeholder="Enter Surname" value="<?php if (isset($_POST['sname'])) echo $_POST['sname'];?>">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username" value="<?php if (isset($_POST['uname'])) echo $_POST['uname'];?>">
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="email" class="form-control" autocomplete="off" placeholder="Enter Email Address" value="<?php if (isset($_POST['email'])) echo $_POST['email'];?>">
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" class="form-control">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="number" name="phone" class="form-control" autocomplete="off" placeholder="Enter Phone Number" value="<?php if (isset($_POST['phone'])) echo $_POST['phone'];?>">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Confirm Password">
                        </div>
                        <input type="submit" name="apply" class="btn btn-success" value="Apply">
                        <p>I already have an account <a href="doctorslogin.php">Login Now!!</a></p>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</body>
</html>