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
  <link href="../assets/css/style.css" rel="stylesheet">

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
        <form action="process.php" method="post">
            <input type="text" name="fn" placeholder="Enter First Name" required>
            <input type="text" name="ln" placeholder="Enter Last Name" required>   
            <br><br> 
            <!-- <p>Username</p> -->
            <input type="email" name="email" placeholder="Enter E-mail" required>
            <!-- <p>Password</p> -->
            <input type="text" name="contact" placeholder="Enter Contact Number" required>
            <p></p><br>
            <input type="password" name="password" placeholder="Enter Password" required>
            <input type="password" name="c_password" placeholder="Confirm Password" required>
            <P></P><br><br>
            <input type="submit" name="register" value="register">
            <p style="color: yellow">Already have an account?</p>
            <p style="color: yellow"><a href="login.php">Login Here</a></p>
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
 <script>
                function myFun() {
                  var x = document.getElementById("password");
                  if (x.type === "password") {
                    x.type = "text";
                  } else {
                    x.type = "password";
                  }
                }
  </script>
</body>
</html>