<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Student Guide | Admin Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
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
          <div class="content-wrapper">
            <form enctype="multipart/form-data" action="" style="padding:1rem" method="POST">
              <div class="row" id="proBanner">
                <div class="col-12">
                  <span class="d-flex align-items-center purchase-popup">
                    <p style="margin-right:20px">Select Department</p>
                    <select id="department" name="department" class="btn purchase-button" style="margin-right:150px">
                      <option>All</option>
                      <option>Information Technology</option>
                      <option>CMPN</option>
                      <option>EXTC</option>
                      <option>ETRX</option>
                    </select>
                    <p style="margin-right:20px">Select Semester</p>
                    <select id="sem" name="sem" class="btn purchase-button">
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
                    <input class="btn ml-auto download-button" type= "submit" name= "filter"></a>
                  </span>
                </div>
              </div>
            </form>     
            <div class="row">
              <div class="col-md-12">
                <div class="d-sm-flex justify-content-between align-items-center transaparent-tab-border {">
                  <ul class="nav nav-tabs tab-transparent" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" href="#">View Notes</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="reported_notes.php?dept=All&sem=All">Reported Notes</a>
                    </li>
                  </ul>
                </div>
                <div class="tab-content tab-transparent-content">
                  <div class="tab-pane fade show active" id="business-1" role="tabpanel" aria-labelledby="business-tab">
                    <div class="row">
<?php 
include("../includes/connect.php");
  $dept = $_GET['dept'];
  $sem = $_GET['sem'];
  $status = 'OPEN';
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
                      <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body text-center">
                            <?php echo'<img src="includes/pdf.png" alt="image for book" width="100%" height="50%" Style="padding: 10px">'?>
                            <h2 class="mb-0 font-weight-bold mt-2 text-dark"><?php echo substr($row_NoteStore['Notes_Name'],0, 18)?><?php echo '...'?></h2>
                            <h3 class="mb-0 font-weight-bold mt-2 text-dark">Price:<span style="color:red;"><?php echo ' '; echo $row_NoteStore['Notes_Price']; echo ' '; ?></span></h3>
                            <form class="form" method="post" action="view_details.php">
                              <button type="details" name="details" value=<?php echo $row_NoteStore['Notes_ID'];?> style="margin-top: 10px; width:100%" class="btn btn-outline-warning">View Details</button>
                            </form>
                            <form class="form" method="post" action="includes/process.php">
                              <button type="delete" name="delete" value=<?php echo $row_NoteStore['Notes_ID'];?> style="margin-top: 10px; width:100%" class="btn btn-outline-danger">Delete</button>
                            </form>
                          </div>
                        </div>
                      </div>
                      <?php
    }
?>
                    </div>
                  </div>
                </div>          
              </div>
            </div>
<?php
  }
  else
  {
?>
                    </div>
                  </div>
                </div>          
              </div>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                        </div>
                        <div class="col-12 grid-margin  grid-margin-lg-0">
                        <div class="wrapper pb-3 border-bottom">
                            <h3 class="mb-0 text-dark font-weight-bold">No Record Found</h3>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
<?php
  }
?>
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
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../assets/vendors/jquery-circle-progress/js/circle-progress.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>


<?php
if(isset($_POST['filter'])){
  $dept = $_POST['department'];
  $sem = $_POST['sem'];
  echo "<script type='text/javascript'>window.location='view_notes.php?dept=$dept&sem=$sem';</script>";
}
?>