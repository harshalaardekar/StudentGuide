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
<?php
include("../includes/connect.php"); 
if(isset($_POST['details'])){
    $id=$_POST['details'];
  }
  else{
    header('location: view_notes.php?dept=All&sem=All');
  }
?>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <?php include "topnav.php"; ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php include "sidenav.php"; ?>
  <?php
    $query_NoteStore = mysqli_query($conn,"SELECT * FROM notesstore WHERE Notes_ID = '$id'");
    $row_NoteStore = mysqli_fetch_assoc($query_NoteStore);
    $Seller_ID = $row_NoteStore['Notes_Seller_ID'];
    $evaluate_ID = $row_NoteStore['Notes_Evaluate_ID'];
    $query_Evaluate = mysqli_query($conn,"SELECT * FROM evaluate WHERE Evaluate_ID = '$evaluate_ID'");
    $row_Evaluate = mysqli_fetch_assoc($query_Evaluate);
  ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-md-12">
                <div class="d-sm-flex justify-content-between align-items-center transaparent-tab-border {">
                </div>
                <div class="tab-content tab-transparent-content">
                  <div class="tab-pane fade show active" id="business-1" role="tabpanel" aria-labelledby="business-tab">
                    <div class="row">
                      <div class="col-sm-4 grid-margin stretch-card">
                        <div class="card card-danger-gradient">
                          <div class="card-body mb-4">
                            <!-- <h4 class="card-title text-white"><?php //echo $row_Book['Book_Name'] ?></h4> -->
                            <?php echo'<img src="includes/pdf.png" alt="image for book"  width="100%" height="50%" Style="padding: 10px;margin-top:40%;">'?>
                          </div>
                          <div class="card-body bg-white pt-4">
                          <div class="row pt-4">
                              <div class="col-sm-6">
                                <div class="text-center border-right border-md-0">
                                  <h4>Name</h4>
                                  <h1 class="text-dark font-weight-bold mb-md-3"><?php echo $row_NoteStore['Notes_Name'] ?></h1>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="text-center">
                                  <h4>Price</h4>
                                  <h1 class="text-dark font-weight-bold"><?php echo $row_NoteStore['Notes_Price'] ?></h1>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-8  grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <div class="d-xl-flex justify-content-between mb-2">
                                <ul style="list-style: none;">
                                  <li><h2 class="card-title"><strong>Notes Details: </strong></h2></li>
                                  <li><h4 class="card-title"><strong>Branch: </strong><?php echo $row_Evaluate['Branch'] ?></h4></li>
                                  <li><h4 class="card-title"><strong>Semester: </strong><?php echo $row_Evaluate['Semester']; ?></h4></li>
                                  <li><h4 class="card-title"><strong>Subject: </strong> <?php echo $row_Evaluate['Subject'] ?></h4></li>
                                  <li><h4 class="card-title"><strong>Description: </strong><?php echo $row_NoteStore['Notes_Description'] ?></h4></li>
                                  <li><h2 class="card-title" style="margin-top:60px"><strong>QR CODE: </strong></h2></li>
                                  <li><?php echo'<img src="../../notestore/uploads/'.$row_NoteStore['QR'].'" alt="image for book" width="250px" height="250px">'?></li>
                                  <!-- <li class="card-title"><strong>Uploaded By: </strong><?php //echo $row_Seller['User_FN']; echo ' '; echo $row_Seller['User_LN']; ?></li> -->
                                </ul>
                                  
                                <form class="form" method="post" action="includes/process.php">
<?php
  $file = '../../notestore/uploads/' . $row_NoteStore['Notes_Sample'];
?>
                                <a name="sample" target="_blank" href= "<?php echo $file; ?>" style="width: 250px; margin-top: 40px" class="btn btn-outline-info">View Sample</a>
                <form class="form" method="post" action="includes/process.php">
                  <button style="width: 250px; margin-top: 20px" name="delete" type="delete" value=<?php echo $row_NoteStore['Notes_ID'];?> class="btn btn-outline-danger">Delete</button>
                </form>
              </form>
                              <div class="graph-custom-legend primary-dot" id="pageViewAnalyticLengend"></div>
                            </div>
                            <canvas id="page-view-analytic"></canvas>
                          </div>
                        </div>
                      </div>
                    </div>
<?php
$query_Report_Active = mysqli_query($conn,"SELECT * FROM report_notesstore WHERE Notes_ID = '$id' AND Report_Status = 'OPEN'");
if(mysqli_num_rows($query_Report_Active)>0)
{
?>                   
                    <div class="row">
                      <div class="col-12 grid-margin">
                        <div class="card">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-sm-12">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                  <h4 class="card-title mb-0">Reports:</h4>
                                </div>
                              </div>
<?php
  while($row_Report_Active = mysqli_fetch_array($query_Report_Active))
  {           
    $user_id = $row_Report_Active['Reported_By'];
    $query_run_id = mysqli_query($conn, "SELECT * FROM user WHERE User_ID = '$user_id'");
    $row_id = mysqli_fetch_assoc($query_run_id);       
?> 
                              <div class="col-lg-9 col-sm-8 grid-margin  grid-margin-lg-0" >
                                <div class="pl-0 pl-lg-4 ">
                                  <div class="d-xl-flex justify-content-between align-items-center mb-2">
                                    <div class="d-lg-flex align-items-center mb-lg-2 mb-xl-0">
                                      <h3 class="text-dark font-weight-bold mr-2 mb-0"><?php echo $row_id['User_FN']; echo ' '; echo $row_id['User_LN'];?></h3>
                                    </div>
                                  </div>
                                  <p class="text-dark font-weight-bold mb-0"><?php echo $row_Report_Active['Report'];?></p>
                                  <div class="graph-custom-legend clearfix" id="device-sales-legend"></div>
                                  <form class="form" method="post" action="includes/process.php">
                                    <button style="width: 250px; margin-top: 20px" name="mark_as_read" type="mark_as_read" value=<?php echo $row_Report_Active['Report_ID'];?> class="btn btn-outline-warning">Mark as Read</button>
                                  </form><br><br>
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
?> 
<?php
$query_Report_Close = mysqli_query($conn,"SELECT * FROM report_notesstore WHERE Notes_ID = '$id' AND Report_Status = 'CLOSE'");
if(mysqli_num_rows($query_Report_Close)>0)
{
?>                   
                    <div class="row">
                      <div class="col-12 grid-margin">
                        <div class="card">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-sm-12">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                  <h4 class="card-title mb-0">Seen Reports:</h4>
                                </div>
                              </div>
<?php
  while($row_Report_Close = mysqli_fetch_array($query_Report_Close))
  {
    $user_id = $row_Report_Close['Reported_By'];
    $query_run_id = mysqli_query($conn, "SELECT * FROM user WHERE User_ID = '$user_id'");
    $row_id = mysqli_fetch_assoc($query_run_id);    
?> 
                            <div class="col-lg-9 col-sm-8 grid-margin  grid-margin-lg-0" >
                                <div class="pl-0 pl-lg-4 ">
                                  <div class="d-xl-flex justify-content-between align-items-center mb-2">
                                    <div class="d-lg-flex align-items-center mb-lg-2 mb-xl-0">
                                      <h3 class="text-dark font-weight-bold mr-2 mb-0"><?php echo $row_id['User_FN']; echo ' '; echo $row_id['User_LN'];?></h3>
                                    </div>
                                  </div>
                                  <p class="text-dark font-weight-bold mb-0"><?php echo $row_Report_Close['Report'];?></p><br><br>
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
      <script>
    function myFunction(url) {
      window.open(url,'_blank');
    }
  </script>
  </body>
</html>