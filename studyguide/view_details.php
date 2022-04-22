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
    select {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      resize: vertical;
    }

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 280px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.price {
  color: grey;
  font-size: 22px;
}

.card button {
  border: none;
  outline: 0;
  padding: 10px;
  color: white;
  background-color: #4db8ff;
  text-align: center;
  cursor: pointer;
  width: 50%;
  font-size: 16px;
}

.card button:hover {
  opacity: 0.7;
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
  <?php include "header.php"; ?>
  <!-- End Header -->

  <main id="main">
<?php
      $eval = $_GET['Evaluate_ID'];
      $bookID = $_GET['ID'];
      $query = "SELECT * FROM books WHERE Book_ID = '$bookID'";
      $query_run = mysqli_query($conn, $query);
      $row= mysqli_fetch_assoc($query_run)
      
    ?>
	
  
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
	   
      </div>
    </section><!-- End Breadcrumbs -->
    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">
       <a href="reference.php?ID=<?php echo $eval;?>" style="margin-left: 90%;font-size: 18px;">Back</a>
        <div class="row gy-4">

          <div class="col-lg-4">
                <div class="swiper-slide">
                  <img src="<?php echo $row['Book_Image']; ?>" width="350px" height="500px"/>

                </div>
          </div>

          <div class="col-lg-8">
            <div class="portfolio-info">
              <h3><?php echo $row['Book_Name'] ?></h3>
              <ul>
                <li><b>Author: </b><?php echo $row['Author_Name'] ?></li>
                <li><b>Price: </b><?php echo $row['Book_Price']; ?></li>
                <li><b>Ratings: </b><?php echo $row['Initial_Rating'] ?></li>
                <li><b>Publisher: </b><?php echo $row['Book_Publication'] ?></li>
                <li><b>ISBN ID: </b><?php echo $row['ISBN'] ?></li>
        				<li><b>GENRE: </b><?php echo $row['Book_Genre'] ?></li>
        				<li><b>Edition: </b><?php echo $row['Book_Edition'] ?></li>
        				<li><b>Type: </b><?php echo $row['Book_Type'] ?></li>
				
				
              </ul>
            </div>
            

        </div>
      </div>
    </section><!-- End Portfolio Details Section -->

    </main><!-- End #main -->
<!-- End #main -->

  <!-- ======= Footer ======= -->
  
  <?php include "footer.php"; ?>
  
  <!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>


