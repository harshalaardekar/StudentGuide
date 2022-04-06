<!DOCTYPE html>
<?php 
include "includes/connect.php";
$Syllabus_id = $_GET['Syllabus_id'];
$Evaluate_id = $_GET['Evaluate_id'];

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

            <h3 class="page-title">  </h3>
            <form enctype="multipart/form-data" action="" method="POST" >
             <input type="hidden" name="eval" value="<?php echo $Evaluate_id; ?>">
             <input name="back" type="submit" class="btn-btn-primary" style="align: right;border-top: black;border-left: black; " value="Back">
           </form>
           </div>

            <form enctype="multipart/form-data" action="" method="POST" >
              <input type="hidden" name="Syllabus_id" value="<?php echo $Syllabus_id; ?>">
              <input type="hidden" name="eval" value="<?php echo $Evaluate_id; ?>">

              <?php 
                     $query = "SELECT * FROM syllabus_copy WHERE syllabus_id ='$Syllabus_id'";
                     $query_run = mysqli_query($conn, $query);
                     while($row = mysqli_fetch_assoc($query_run))
                     {
                      ?>
              <input type="hidden" name="oldfilename" value="<?php echo $row['sfile_name']?>">
            <?php } ?>

              <!-- <input name="back" type="submit" class="btn-btn-primary" style="align: right " value="Back"> -->
          <!-- <div class="section-title"><h2><input name="back" type="submit" class="btn-btn-primary" style="align: right " value="Back">
          </h2></div> -->

        
        <div class="row">

          <div class="col-8 offset-2 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">

                <div class="form-group">
                  <center><label><h3 style="color:black;">Confirm Action By Entering Admin Password : </h3></label><br>
                  <input type="password" name="password" id="password" placeholder="Enter Password " required><br><br></center>
                  
                  
                </div>
                <!-- <input type="hidden" name="page" value="<?php echo $page; ?>"> -->
               
                <div class="text-center">
                  <input name="submit" type="submit" style="align: right " value="Confirm">
                </div>  
</div></div></div></div>

              </form>
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
echo "<script type='text/javascript'>window.location='edit_syllabus2.php?Evaluate_ID=$Evaluate_id';</script>";
}

if(isset($_POST['submit'])){
$oldfilename = $_POST['oldfilename'];
  $Syllabus_id = $_POST['Syllabus_id']; 
  $Evaluate_id = $_POST['eval'];
  $password = $_POST['password'];

  $dir=$Evaluate_id;
$uploaddir = 'uploads/syllabus/'.$dir.'/';

$password_query = "select * from admin where Admin_Password = '$password'";
$result = mysqli_query($conn,$password_query);


if($result->num_rows > 0){
  $query="DELETE FROM syllabus_copy WHERE syllabus_id = '$Syllabus_id'";
  $data=mysqli_query($conn, $query);
    if($data && unlink($uploaddir.$oldfilename))
    {
    echo "<script> alert('Syllabus Deleted Successfully!!!')</script>";
    echo "<script type='text/javascript'>window.location='edit_syllabus2.php?Evaluate_ID=$Evaluate_id';</script>";
   
    }
    else 
    {
     echo "<script> alert('Something Went Wrong...')</script>";
     
    }
}
else {
   echo "<script> alert('Enter Correct Password...')</script>";
   echo "<script type='text/javascript'>window.location='delete_books.php?Syllabus_id=$Syllabus_id'&Evaluate_ID=$Evaluate_id';</script>";
}
 
}
?>