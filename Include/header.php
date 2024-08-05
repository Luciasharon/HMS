<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <script src="<script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"></script>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>

   <nav class="navbar navbar-expand-lg navbar-info bg-info">
       <h5 class="text-white">Patient Record Management System</h5>
       <div class="mr-auto ml-auto"></div>
       <ul class="">
       <?php
       
          if (isset($_SESSION['admin'])) {

            $user = $_SESSION['admin'];
            echo ' 
              <li class="nav-item"><a href="#" class="nav-link">'.$user.'</a></li>
              <li class="nav-item"><a href="logout" class="nav-link">logout.php</a></li>
            ';
          }else if(isset($_SESSION['doctors'])){
                  $user = $_SESSION['doctors'];
            echo ' 
              <li class="nav-item"><a href="#" class="nav-link">'.$user.'</a></li>
              <li class="nav-item"><a href="logout" class="nav-link">logout.php</a></li>
            ';
          }elseif(isset($_SESSION['patient'])){
                $user = $_SESSION['patient'];
            echo ' 
              <li class="nav-item"><a href="#" class="nav-link">'.$user.'</a></li>
              <li class="nav-item"><a href="logout" class="nav-link">logout.php</a></li>
            ';

          }else {
            echo '
              <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
              <li class="nav-item"><a href="adminlogin.php" class="nav-link">Login</a></li>
              <li class="nav-item"><a href="doctorslogin.php" class="nav-link">Doctor</a></li>
              <li class="nav-item"><a href="patientlogin.php" class="nav-link">Patient</a></li>
            ';
          }
       ?>
       </ul>
            
   </nav>
 
</body>
</html>