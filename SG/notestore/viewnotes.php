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

  <title>View Notes</title>
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
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="../home.php">Student Guide</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#">View Notes</a></li>
          <li><a class="nav-link scrollto" href="sell_notes1.php">Sell Notes</a></li>
          <li><a class="nav-link scrollto" href="your_notes.php">Your Notes</a></li>
          <li><a class="nav-link   scrollto" href="your_orders.php">Your Orders</a></li>
          <li><a class="getstarted scrollto" href="../includes/logout.php">Log Out</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">
    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">
      <form enctype="multipart/form-data" action="" style="padding:1rem" method="POST">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-start">
            <h3>Filter the notes</h3>
              <div class="btn-group">
                <h4 style="color: white; margin-right: 10px; margin-top: 15px;">Department: </h4>
                <div class="col-75">
                  <select id="department" name="department" class="InputBox">
                    <option>All</option>
                    <option>Information Technology</option>
                    <option>CMPN</option>
                    <option>EXTC</option>
                    <option>ETRX</option>
                  </select>
                </div>
              </div> 
              <div class="btn-group">
                <h4 style="color: white;  margin-right:10px; margin-top: 15px; ; margin-left: 50px">Semester: </h4>
                <div class="col-75">
                  <select id="sem" name="sem" class="InputBox">
                    <option>All</option>
                    <option>SEM-I</option>
                    <option>SEM-II</option>
                    <option>SEM-III</option>
                    <option>SEM-IV</option>
                    <option>SEM-V</option>
                    <option>SEM-VI</option>
                    <option>SEM-VII</option>
                    <option>SEM-VIII</option>
                  </select>
                </div>
              </div>     
            </form>     
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <input style= "color: black" class="cta-btn align-middle" type= "submit" name= "filter"/>
            <!-- <a class="cta-btn align-middle" href="viewbooks.php?dept=<?php //echo '$_POST['department']'?>&sem=<?php //echo '$_POST['sem']'?>">Apply filter</a> -->
          </div>
        </div>
  </form>
      </div>
    </section><!-- End Cta Section -->
    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">
        <div class="row">
<?php 
  $dept = $_GET['dept'];
  $sem = $_GET['sem'];
  $query_run_id = mysqli_query($conn, "SELECT * FROM user WHERE User_Email = '$email'");
  $row_id = mysqli_fetch_assoc($query_run_id);
  $user_id=$row_id['User_ID'];
  if($dept == 'All' || $sem == 'All')
  {
    $query_NoteStore = mysqli_query($conn,"SELECT * FROM notesstore");
  }
  else
  {
    $query_NoteStore = mysqli_query($conn,"SELECT * FROM notesstore WHERE Notes_Evaluate_ID in (SELECT Evaluate_ID FROM evaluate WHERE Semester = '$sem' AND Branch = '$dept')");
  }
  if(mysqli_num_rows($query_NoteStore)>0)
  {
    while($row_NoteStore = mysqli_fetch_array($query_NoteStore)) 
    {
?>
    
          <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100" style="margin-bottom: 20px">
            <div class="icon-box">
              
              <img src="includes/pdf.png" alt="image for book" width="240px" height="240px" Style="padding: 10px">
              <h4 style="margin-top:10px"><?php echo substr($row_NoteStore['Notes_Name'],0, 18)?><?php echo '...'?></a></h4>
              <h5>Price:<span style="color:red;"><?php echo ' '; echo $row_NoteStore['Notes_Price']; echo ' '; ?></span></h5>
              <form class="form" method="post" action="view_details.php">
                <button type="view_details" name="view_details" value=<?php echo $row_NoteStore['Notes_ID'];?> style="margin-top: 10px; width:100%" class="btn btn-outline-warning">View Details</button>
              </form>
<?php 
      if($row_NoteStore['Notes_Seller_ID'] == $user_id)
      {
?>
              <form class="form" method="post" action="includes/process.php">
                <button type="delete" name="delete" value=<?php echo $row_NoteStore['Notes_ID'];?> style="margin-top: 10px; width:100%" class="btn btn-outline-danger">Delete</button>
              </form>

<?php
      }
      else
      {
?>
              <form class="form" method="post" action="includes/process.php">
                <button type="request" name="request" value=<?php echo $row_NoteStore['Notes_ID'];?> style="margin-top: 10px; width:100%" class="btn btn-outline-danger">Send Request</button>
              </form>
<?php
      }
?>
            </div>
          </div>
<?php
    }
?>
        </div>
      </div>
    </section><!-- End Services Section -->
  </main><!-- End #main -->
<?php
  }
  else
  {
?>
  </main><!-- End #main -->
  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <h4>No Record Found</h4>
          </div>
        </div>
      </div>
    </div>

  </footer><!-- End Footer -->
<?php
  }
?>

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
else
{
  header('location: includes/login.php');
}

if(isset($_POST['filter']))
{
  $dept = $_POST['department'];
  $sem = $_POST['sem'];
  echo "<script type='text/javascript'>window.location='viewnotes.php?dept=$dept&sem=$sem';</script>";
}
?>