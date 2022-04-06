<?php 
include("includes/connect.php"); 
?>

<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Student Guide</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Arsha - v4.6.0
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <?php include "header.php"; ?>
<!-- End Header -->
  <main id="main">

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">
        <section id="portfolio" class="portfolio">
          <div class="container" data-aos="fade-up">
			</div>
        </section><!-- End Portfolio Section -->
        <div class="row">
<?php
$eval = $_GET['ID'];
$query = "SELECT * FROM books WHERE Evaluate_ID = '$eval'";
$query_run = mysqli_query($conn, $query);
while($row = mysqli_fetch_assoc($query_run))
{
  $temp = $row['Book_ID'];
?>
          <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100" style="margin-bottom: 20px">
            <div class="icon-box">
              <img src="<?php echo $row['Book_Image'];  ?>" width="240px" height="280px">
              <b>Book Name: </b><?php echo substr($row['Book_Name'],0, 14)?><?php echo '...'?><br>
              <b>Author Name: </b><?php echo substr($row['Author_Name'], 0, 18) ?><?php echo '...'?><br>
              <b>Price: </b><?php echo ' '; echo $row['Book_Price']; echo ' '; ?><br>
              <form class="form" method="post" action="">
                <button type="view_details" name="view_details" value=<?php echo $temp; ?> style='border:none; background:#008CBA; color:white; align:center; height:40px; width:120px' > View Details </button>
              </form>
            </div>
          </div>
<?php
}
?>
        </div>
      </div>
    </section><!-- End Services Section -->
  </main><!-- End #main -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
<?php
if(isset($_POST['view_details']))
{
  $bookID = $_POST['view_details'];
  
  echo "<script type='text/javascript'>window.location='view_details.php?ID=$bookID';</script>";
}
?>
