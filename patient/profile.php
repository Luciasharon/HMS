<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
</head>

<body>
    <?php
    include("../include/header.php");
    include("../include/connection.php");
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php
                    include("sidenav.php");

                    $patient = $_SESSION['patient'];
                    $query = "SELECT * FROM patient WHERE username='$patient'";
                    $res = mysqli_query($connect, $query);

                    $row = mysqli_fetch_array($res);
                    ?>
                </div>
                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">

                                <?php
                                    
                                    if (isset($_POST['upload'])) {
                                        $img = $_FILES['img']['name'];

                                        if (empty($img)) {

                                        }else{
                                            $query = "UPDATE patient SET profile='$img' WHERE username='$patient'";
                                            $result = mysqli_query($connect, $query);

                                            if ($result) {
                                                move_uploaded_file($_FILES['img']['tmp_name'], 'img/'.$img);
                                                echo "<script>alert('Profile updated successfully')</script>";
                                            }
                                        }
                                    }
                                ?>
                                <h4>My Profile</h4>
                                <hr>
                                <form method="post" enctype="multipart/form-data">
                                    <?php
                                         echo "<img src='img/".$row['profile']."' class='col-md-12' style='height: 250px;'>";
                                    ?>
                                    <input type="file" name="img" class="form-control my-2">
                                    <input type="submit" name="upload">
                                    <label>Name:</label>
                                    <input type="text" id="name" name="name" value="<?php echo $_SESSION['patient'];?>" required>

                                    <label>Email:</label>
                                    <input type="email" id="email" name="email" value="<?php echo $_SESSION['email'];?>" required>

                                    <label>Password:</label>
                                    <input type="password" id="password" name="password" required>

                                    <input type="submit" value="Update" class="btn btn-success my-2">
                                </form>

                            </div>
                            </div>
                            <div class="col-md-6"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>