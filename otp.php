<?php
//include('connection/db.php');
  session_start();
  if($_SESSION['superhero']==true){
    $mail = $_SESSION['mail'];
    $otp = $_SESSION['superhero'];
    $fn = $_SESSION['fn'];
    $ln = $_SESSION['ln'];
    $contact = $_SESSION['contact'];
    $pass = $_SESSION['pass'];
  }else{
    header('location:index.php');
  }
   
?>

<!DOCTYPE html>
<html lang="en">

<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Student Guide</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Mentor - v4.2.0
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>

h1{
    margin: 0;
    padding: 0 0 20px;
    text-align: center;
    font-size: 22px;
}

input{
            width: 150px;
        }

 input[type="email"], input[type="password"], input[type="text"]{
        border: none;
        border-bottom: 1px solid #ffffff;
        background: transparent;
        margin-right: 20px;
        outline: none;
        height: 40px;
        color: #ffffff;
        font-size: 16px;
        }

 input[type="submit"]{
        border: none;
        border-radius: 20px;
        color: #ffffff;
        background-color: red;
        outline: none;
        height: 40px;
        font-size: 18px;
        }

 input[type="submit"]:hover{
        cursor: pointer;
        background-color: #ffc107;
        color: #000;
        }
/*.zoom {
  position: relative;
  animation-name: example;
  animation-duration: 4s;
  animation-iteration-count: 1;
}

@keyframes example {
   0%   {right:300px; top:0px;}
  0%   {left:500px; top:0px;}
  100%  {left:150px; top:100px;}
}*/

</style>
</head>

<body style="background-image:url(back.jpg);">
  
       <div class="container position-relative" style="margin-top:150px;margin-left: 150px;">
        <form action="" method="post">
            <input type="text" name="otp" placeholder="Enter OTP" required>
            <P></P><br><br>
            <input type="submit" id="submit" name="submit" value="Submit">
        </form>
    </div>
    </div>

<script src="js/jquery.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/swiper.min.js"></script>
<script src="js/lottie.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>


<?php

include('includes/connect.php');
if(isset($_POST['submit'])) {
  $otp_entered = $_POST['otp'];
  if($otp_entered == $otp)
  {

    $query = "SELECT * FROM user WHERE User_Email='$mail'";
    $data = mysqli_query($conn, $query);
    $total = mysqli_num_rows($data);
    if(!$total){
        $query1 = "INSERT INTO user (User_FN, User_LN, User_Email, User_ContactNo, User_Password, User_Status) values ('$fn', '$ln', '$mail', '$contact', '$pass', 'Active')";
        $data1 = mysqli_query($conn, $query1);
        if($data1){
            $_SESSION['email'] = $mail;
            unset($_SESSION['email']);
            unset($_SESSION['otp']);
   
            if(session_destroy()){
        echo "<script type='text/javascript'>alert('Registration Successful');window.location='index.php';</script>";
    }
        }
        else{
            echo "<script>alert('Something went wrong, please register again!')</script>";
            echo "<script>window.location = 'register.php'</script>";
        }
    }
    else{
        echo "<script>alert('Already have an account!')</script>";
        echo "<script>window.location = 'index.php'</script>";
    }
      //$_SESSION['start'] = time();
      // Ending a session in 5 minutes from the starting time.
      //$_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
      //header("location:index.php");
  }else{
     
      echo "<script>alert('Invalid OTP Code!, Please try again.')</script>";
      echo "<script>window.location = 'register.php'</script>";
  }

}


?>