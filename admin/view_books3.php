<!DOCTYPE html>
<?php 
include "includes/connect.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Student Guide | Admin Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
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
  <?php
  $Book_id = $_GET['Book_id'];
                          $Evaluate_id = $_GET['Evaluate_id'];
                          ?>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <?php include "topnav.php"; ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php include "sidenav.php"; ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> View Book</h3>
        <form en<form enctype="multipart/form-data" action="" method="POST" >

          <input type="hidden" name="Book_id" value="<?php echo $Book_id; ?>">
                    <input type="hidden" name="eval" value="<?php echo $Evaluate_id; ?>">
<input name="back" type="submit" class="btn-btn-primary" style="align: right " value="Back">
        <div class="section-title"><h2><br> </div>
              
            </div>
            <div class="row">
              
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  
					<div class="form-group">
                       <?php
  
					  $Book_id = $_GET['Book_id'];
					  $query = "SELECT * FROM books WHERE Book_id = '$Book_id'";
					  $query_run = mysqli_query($conn, $query);
					  $row= mysqli_fetch_assoc($query_run)
					  
						?>

					</div>
						

			
		<div class="row gy-4">
		<div class="col-lg-4">
                <div class="swiper-slide">
                  <img src="<?php echo $row['Book_Image']; ?>" width="300px" height="400px"/>

                </div>
            </div>

			<div class="col-lg-8">
            <div class="portfolio-info">
              
              <ul>
			  <li><b>Book Name: </b><?php echo $row['Book_Name'] ?></li>
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
		</div>
              </div>
            </div>
          </div>
		 

          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="footer-inner-wraper">
              <div class="d-sm-flex justify-content-center ">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © StudentGuide.com 2020</span>
                
              </div>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/jquery-circle-progress/js/circle-progress.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>

<?php
if(isset($_POST['back'])){
$Evaluate_id = $_POST['eval'];
echo "<script type='text/javascript'>window.location='view_books2.php?Evaluate_ID=$Evaluate_id';</script>";
}

?>