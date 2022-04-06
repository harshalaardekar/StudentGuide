<!DOCTYPE html>
<html lang="en">

<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login</title>
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



input[type="email"], input[type="password"], input[type="text"]{
border: none;
border-bottom: 1px solid #ffffff;
background: transparent;
outline: none;
height: 40px;
color: #ffffff;
font-size: 16px;
width: 300px;
margin-bottom: 20px;
}
input[type="checkbox"]{
color: #ffffff;
opacity: 1;
border-radius: 0px;
}
input[type="submit"]{
border: none;
border-radius: 20px;
color: #ffffff;
background-color: red;
outline: none;
height: 40px;
font-size: 18px;
 width: 300px;
    margin-bottom: 20px;
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
        <form class="form" method="post" action="process.php">
                    <div class="form-group has-feedback">
                    <input type="email" name="username" id="username" placeholder="Username">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <input type="password" name="password" id="password" placeholder="Password"><br>
                    <input type="checkbox" onclick="myFun()">&nbsp;<b><font color="black">Show Password</font></b>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span><br>

                  </div><br>
                  
            <input type="submit" name="submit" value="submit">
            <p style="color: yellow">Do not have an account?</p>
            <p><a href="register.php">Register Here</a></p>
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


