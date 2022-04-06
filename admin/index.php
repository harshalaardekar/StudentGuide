<?php
    include("includes/connect.php");
    session_start();
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
  </head>
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


          <div class="content-wrapper"><i class="mdi mdi-close" id="bannerClose" hidden="true"></i>
         
          	<h1 class="text-dark font-weight-bold mb-2"> Overview Of Data </h1>


            <div class="row">
              <div class="col-md-12">
                <div class="d-sm-flex justify-content-between align-items-center transaparent-tab-border {">

                  <ul class="nav nav-tabs tab-transparent" role="tablist">
                    <li class="nav-item active"><a class="nav-link active" data-toggle="tab" href="#users">Overview</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#books">Books</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#notes">Study Material</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#review">Reviews</a></li>
                  </ul>

                </div>
               
               <div class="tab-content" align="center">
                    
                    <div id="review" class="tab-pane fade">
                      <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body text-center">
                            
                            <?php 
                              $sql="select count(*) as total from review_table";
                              $result = $conn->query($sql);
                              if ($result->num_rows > 0) 
                                          {
                                          // output data of each row
                                          while($row = $result->fetch_assoc()) {
                                            $total1=$row["total"];
                                          }
                                          }
                              ?>  
                            
                            <img src="assets/images/review.jpg" height="70%" width="70%" /><br><br>
                            <h1 class="mb-4 text-dark font-weight-bold"><?php echo $total1; ?></h1>
                            <h3 class="mb-2 text-dark font-weight-normal">Reviews for books</h3><br>

                          </div>
                        </div>
                        <div class="card">
                          <div class="card-body text-center">
                            
                            <?php 
                              $sql="select count(*) as total from review_notes";
                              $result = $conn->query($sql);
                              if ($result->num_rows > 0) 
                                          {
                                          // output data of each row
                                          while($row = $result->fetch_assoc()) {
                                            $total=$row["total"];
                                          }
                                          }
                              ?>  
                            
                            <img src="assets/images/review.jpg" height="70%" width="70%" /><br><br>
                            <h1 class="mb-4 text-dark font-weight-bold"><?php echo $total; ?></h1>
                            <h3 class="mb-2 text-dark font-weight-normal">Reviews for Notes</h3><br>

                          </div>
                        </div>
                        <div class="card">
                          <div class="card-body text-center">
                            <img src="assets/images/auser.jpg" height="70%" width="70%" /><br><br>
                            <h1 class="mb-4 text-dark font-weight-bold"><?php echo $total+$total1; ?></h1>
                            <h3 class="mb-2 text-dark font-weight-normal">Active Users</h3><br>

                          </div>
                        </div>
                      </div>
                    </div>

                    <div id="users" class="tab-pane fade show active" align="align-items-centers">
                      <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body text-center">
                            
                            <?php 
                              $sql="select count(*) as total from user";
                              $result = $conn->query($sql);
                              if ($result->num_rows > 0) 
                                          {
                                          // output data of each row
                                          while($row = $result->fetch_assoc()) {
                                            $total=$row["total"];
                                          }
                                          }
                              ?>  
                            
                            <img src="assets/images/users.png" height="65%" width="65%" />
                            <h1 class="mb-4 text-dark font-weight-bold"><?php echo $total; ?></h1>
                            <h3 class="mb-2 text-dark font-weight-normal">Total Users</h3>

                          </div>
                        </div>
                        <div class="card">
                          <div class="card-body text-center">
                            
                            <?php 
                              $sql="select count(*) as total from evaluate";
                              $result = $conn->query($sql);
                              if ($result->num_rows > 0) 
                                          {
                                          // output data of each row
                                          while($row = $result->fetch_assoc()) {
                                            $total=$row["total"];
                                          }
                                          }
                              ?>  
                            
                            <div class="dashboard-progress dashboard-progress-1 d-flex align-items-center justify-content-center item-parent"><i class="mdi mdi-lightbulb icon-md absolute-center text-dark"></i></div><br><br>
                            <h1 class="mb-4 text-dark font-weight-bold"><?php echo $total; ?></h1>
                            <h3 class="mb-2 text-dark font-weight-normal">Total Subjects</h3><br>

                          </div>
                        </div>
                        <div class="card">
                          <div class="card-body text-center">
                            
                            <?php 
                              $sql="select count(*) as total from user Group By 'Branch'";
                              $result = $conn->query($sql);
                              if ($result->num_rows > 0) 
                                          {
                                          // output data of each row
                                          while($row = $result->fetch_assoc()) {
                                            $total=$row["total"];
                                          }
                                          }
                              ?>  
                            
                            <div class="dashboard-progress dashboard-progress-1 d-flex align-items-center justify-content-center item-parent"><i class="mdi mdi-lightbulb icon-md absolute-center text-dark"></i></div><br><br>
                            <h1 class="mb-4 text-dark font-weight-bold"><?php echo $total; ?></h1>
                            <h3 class="mb-2 text-dark font-weight-normal">Total Branch</h3><br>

                          </div>
                        </div>
                         <div class="card">
                          <div class="card-body text-center">
                            
                            <?php 
                              $sql="select count(*) as total from user Group By 'Semester'";
                              $result = $conn->query($sql);
                              if ($result->num_rows > 0) 
                                          {
                                          // output data of each row
                                          while($row = $result->fetch_assoc()) {
                                            $total=$row["total"];
                                          }
                                          }
                              ?>  
                            
                            <div class="dashboard-progress dashboard-progress-1 d-flex align-items-center justify-content-center item-parent"><i class="mdi mdi-lightbulb icon-md absolute-center text-dark"></i></div><br><br>
                            <h1 class="mb-4 text-dark font-weight-bold"><?php echo $total; ?></h1>
                            <h3 class="mb-2 text-dark font-weight-normal">Total Semesters</h3><br>

                          </div>
                        </div>
                      </div>
                    </div>

                    <div id="books" class="tab-pane fade">
                      <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body text-center">
                            
                            <?php 
                              $sql="select count(*) as total from books";
                              $result = $conn->query($sql);
                              if ($result->num_rows > 0) 
                                          {
                                          // output data of each row
                                          while($row = $result->fetch_assoc()) {
                                            $total=$row["total"];
                                          }
                                          }
                              ?>  
                            
                           <img src="assets/images/books.jpg" height="70%" width="70%" /><br><br>
                            <h1 class="mb-4 text-dark font-weight-bold"><?php echo $total; ?></h1>
                            <h3 class="mb-2 text-dark font-weight-normal">Total Books</h3><br>

                          </div>
                        </div>
                        <div class="card">
                          <div class="card-body text-center">
                            
                            <?php 
                              $sql="select count(*) as total from bookstore";
                              $result = $conn->query($sql);
                              if ($result->num_rows > 0) 
                                          {
                                          // output data of each row
                                          while($row = $result->fetch_assoc()) {
                                            $total=$row["total"];
                                          }
                                          }
                              ?>  
                            
                            <img src="assets/images/bookstore.jpg" height="70%" width="70%" /><br><br>
                            <h1 class="mb-4 text-dark font-weight-bold"><?php echo $total; ?></h1>
                            <h3 class="mb-2 text-dark font-weight-normal">Available in Bookstore</h3><br>

                          </div>
                        </div>
                      </div>
                    </div>

                    <div id="notes" class="tab-pane fade">
                      <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body text-center">
                            
                            <?php 
                              $sql="select count(*) as total from notes";
                              $result = $conn->query($sql);
                              if ($result->num_rows > 0) 
                                          {
                                          // output data of each row
                                          while($row = $result->fetch_assoc()) {
                                            $total=$row["total"];
                                          }
                                          }
                              ?>  
                            
                            <img src="assets/images/notes.jpg" height="70%" width="70%" /><br><br>
                            <h1 class="mb-4 text-dark font-weight-bold"><?php echo $total; ?></h1>
                            <h3 class="mb-2 text-dark font-weight-normal">Total Notes</h3><br>

                          </div>
                        </div>
                        <div class="card">
                          <div class="card-body text-center">
                            
                            <?php 
                              $sql="select count(*) as total from notesstore";
                              $result = $conn->query($sql);
                              if ($result->num_rows > 0) 
                                          {
                                          // output data of each row
                                          while($row = $result->fetch_assoc()) {
                                            $total=$row["total"];
                                          }
                                          }
                              ?>  
                            
                            <img src="assets/images/notes.jpg" height="70%" width="70%" /><br><br>
                            <h1 class="mb-4 text-dark font-weight-bold"><?php echo $total; ?></h1>
                            <h3 class="mb-2 text-dark font-weight-normal">Available in Notesstore</h3><br>

                          </div>
                        </div>
                        <div class="card">
                          <div class="card-body text-center">
                            
                            <?php 
                              $sql="select count(*) as total from paper_solutions";
                              $result = $conn->query($sql);
                              if ($result->num_rows > 0) 
                                          {
                                          // output data of each row
                                          while($row = $result->fetch_assoc()) {
                                            $total=$row["total"];
                                          }
                                          }
                              ?>  
                            
                            <img src="assets/images/ps.jpg" height="70%" width="70%"/><br><br>
                            <h1 class="mb-4 text-dark font-weight-bold"><?php echo $total; ?></h1>
                            <h3 class="mb-2 text-dark font-weight-normal">Total papersolutions</h3><br>

                          </div>
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