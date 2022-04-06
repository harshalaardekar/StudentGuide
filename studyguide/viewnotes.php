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
<style type="text/css">
  .center {
  margin-left: auto;
  margin-right: auto;
}
a.ex1:hover, a.ex1:active {color: red;}

</style>

</head>

<body>

  <!-- ======= Header ======= -->
  <?php include "header.php"; ?>
  <!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
        <?php 
          $eval = $_GET['ID'];
        
      ?>
          
       
      </div>
    </div><!-- End Breadcrumbs -->

     <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">
    

    <ul id="portfolio-flters" class="d-flex justify-content-center"  data-aos-delay="100">
              <li data-filter=".filter-app"><a href="viewsyllabus.php?ID=<?php echo $eval; ?>"><h3>Syllabus</h3></a></li>
              <li data-filter=".filter-app" ><a href="reference.php?ID=<?php echo $eval; ?>"><h3>Reference Book</h3></a></li>
              <li data-filter=".filter-app" ><a href="recommendation.php?Evaluate_ID=<?php echo $eval; ?>"><h3>Recommended Book</h3></li>
              <li data-filter=".filter-card"><a href="viewpapers.php?ID=<?php echo $eval; ?>"><h3>Papers</h3></li>
              <li data-filter=".filter-web"><a href="viewnotes.php?ID=<?php echo $eval; ?>"><h3>Study Material</h3></li>
               <h1><a href=" "></a></h1>
            </ul>
           
           <div style="border-width: thin;border-style: solid;border-color: black;width: 85%;"> <br>

            <h4 style="color: black;margin-left: 20px;">Extra Notes</h4>
           <table class="center" style="margin-left: 50px;margin-top: 10px;">
      <thead>
        <tr>
                        <!-- <th>Notice ID</th> -->
                        <!-- <th>File Name</th> -->
                        <!-- <th>Notice Title</th> -->
                        <!-- <th>View</th> -->
                      </tr>
        
      </thead>
    <tbody>
<?php
include("includes/connect.php");
$evaluate_id = $_GET['ID'];
$sql = "select * from notes where Evaluate_ID='$evaluate_id'";
$records = mysqli_query($conn,$sql);
if ($records) {
  
while ($object = $records->fetch_object())
{

                       
                       
                      ?> 
                      <tr> 
                         
                       <td>
                        <form class="form" action="" method="POST"  >
                          <input type="hidden" name="eval" value="<?php echo $evaluate_ID; ?>">

                          <a class="ex1" href="notes.php?ID=<?php echo $object->nid; ?>" target="_blank"><?php echo $object->nFileName?></a>


                          </form>

                      </td>

                       

                      </tr>
                      <?php } } ?> 
                    </tbody>
                    
  </table><br>
   </div>


         </div>
      </div>


    </section><!-- End Portfolio Section -->



        
    <!-- ======= Our Clients Section ======= -->
    <!-- End Our Clients Section -->

  </main><!-- End #main -->

  
  <!-- ======= Footer ======= -->
   <?php include "includes/footer.php"; ?>
  
  <!-- End Footer -->

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

