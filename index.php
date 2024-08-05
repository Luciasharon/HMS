<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Patient Record Management System</title>
</head>
<body>
    <?php
include("include/header.php");
?>

<div style="margin-top: 50px"></div>

<div class="container">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3 mx-1 shadow">
                <img src="img/info.jpeg" style="width: 100%;">
                <h5 class="text-center">Read Our Latest Issue</h5>
                <a href="#">
                    <button class="btn btn-success my-3" style="margin-left: auto; margin-right: auto;">Articles</button>
                </a>

            </div>
            <div class="col-md-3 mx-1 shadow">
                <img src="img/patient.jpeg" style="width: 100%;">
                <h5 class="text-center">Check out our services!</h5>
                <a href="account.php">
                    <button class="btn btn-success my-3" style="margin-left: auto; margin-right: auto;">Book an Appointment</button>
                </a>

            </div>
            <div class="col-md-3 mx-1 shadow" style="width: 100%;">
                <img src="img/doctor.jpeg">
                <h5 class="text-center">We are looking for doctors!</h5>
                <a href="#">
                    <button class="btn btn-success my-3" style="margin-left: auto; margin-right: auto;">Apply Now!!</button>
                </a>

            </div>
        </div>
    </div>
</div>
    
</body>
</html>