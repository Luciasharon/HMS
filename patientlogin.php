<?php
  session_start();
  include ("include/connection.php");

  if(isset($_POST['login'])) {
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    

    if (empty($uname)) {
        echo "<script>alert('Enter Username')</script>";
    }elseif (empty($pass)) {
        echo "<script>alert('Enter Password')</script>";
    }else {
        $query = "SELECT * FROM patient WHERE username='$uname' AND password='$pass'";
        $res = mysqli_query($connect, $query);

        if (mysqli_num_rows($res) == 1) {
            echo "<script>alert('Login Successful')</script>";
            $_SESSION['patient'] = $uname;
            header("Location: patient/index.php");
            exit();
        }else {
            echo "<script>alert('Invalid Account')</script>";
        }
    }
  }
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Login Page </title>
</head>
<body style="background-image: url(img/back.jpeg);background-repeat:no-repeat;background-size:cover;">
    <?php
      include("include/header.php");
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">
                    <div class="col-md-6 jumbotron my-5">
                        <h5 class="text-center my-3">Patient Login</h5>
                        <form method="post">
                            <div class="form-group">
                                <label>Username:</label>
                                <input type="text" class="form-control" name="uname" name="username">
                            </div>
                            <div class="form-group">
                                <label>Password:</label>
                                <input type="password" class="form-control" name="pass" name="password">
                            </div>
                            <button type="submit" class="btn btn-primary my-3">Login</button>
                            <p>Don't have an account? <a href="account.php">Create an account.</a></p>
                        </form>
                    </div>
                <div class="col-md-3"></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>