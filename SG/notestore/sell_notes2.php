<?php 
include("../includes/connect.php"); 
session_start();
if($_SESSION['email']==true)
{
  $email= $_SESSION['email'];
  if($email == 'admin@gmail.com')
  {
    header('location: ../admin/notestore/viewnotes.php');
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sell Book</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
  <style>
    select {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      resize: vertical;
    }

    .col-75 {
      float: left;
      width: 75%;
      margin-top: 6px;
    }

    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {
      .col-25, .col-75, input[type=submit] {
        width: 100%;
        margin-top: 0;
      }
    }
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center">
    <h1 class="logo me-auto"><a href="../home.php">Student Guide</a></h1>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="viewbooks.php?dept=All&sem=All">View Notes</a></li>
          <li><a class="nav-link scrollto active" href="#">Sell Notes</a></li>
          <li><a class="nav-link scrollto" href="your_notes.php">Your Notes</a></li>
          <li><a class="nav-link scrollto" href="your_notes.php">Your Orders</a></li>
          <li><a class="getstarted scrollto" href="../includes/logout.php">Log Out</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->
  <main id="main">
   <!-- ======= Breadcrumbs ======= -->
   <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
      </div>
    </section><!-- End Breadcrumbs -->
    <!-- ======= Selector Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">
        <form enctype="multipart/form-data" action="" method="POST" >
          <div class="section-title"><h2>2/3</h2></div>
          <div class="row">
            <div class="col-lg-3 d-flex align-items-stretch"></div>
            <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
              <div class="php-email-form">
                <div class="row">
                  <div class="form-group">
                    <label for="sub">Select Subject: </label>
                    <div class="">
                      <select id="sub" name="sub" class="InputBox">
<?php 
  $dept = $_GET['dept'];
  $sem = $_GET['sem'];
  $query = "SELECT * FROM evaluate WHERE Semester = '$sem' AND Branch = '$dept'";
  $query_run = mysqli_query($conn, $query);
  while($row = mysqli_fetch_assoc($query_run))
  {
?>
                        <option><?php echo $row['Subject']?></option>
<?php
  }
?>
                      </select>
                    </div>
                  </div>
                  <div class="text-center">
                    <input name="submit" type="submit" style="align: right " value="Next"><br> 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </section><!-- End Selector Section -->
  </main><!-- End #main -->

  <?php include "../includes/footer.php"; ?>
  
  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Vendor JS Files -->
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/waypoints/noframework.waypoints.js"></script>
  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
</body>

</html>

<?php
}
else{
  header('location: includes/login.php');
}

if(isset($_POST['submit'])){
  $sub = $_POST['sub'];
  $query_run_id = mysqli_query($conn, "SELECT * FROM evaluate WHERE Branch = '$dept' AND Semester = '$sem' AND Subject = '$sub'");
  $row_id = mysqli_fetch_assoc($query_run_id);
  $evaluate_id=$row_id['Evaluate_ID'];
  echo "<script type='text/javascript'>window.location='sell_notes3.php?ID=$evaluate_id';</script>";
}
?>