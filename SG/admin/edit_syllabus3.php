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

            <h3 class="page-title"> Update Syllabus Details</h3>
            
            <form enctype="multipart/form-data" action="" method="POST">
             <input type="hidden" name="eval" value="<?php echo $Evaluate_id; ?>">
             <input name="back" type="submit" class="btn-btn-primary" style="align: right;border-top: black;border-left: black; " value="Back">
           </form>
         </div>
           <form enctype="multipart/form-data" action="" method="POST" >

            <input type="hidden" name="Syllabus_id" value="<?php echo $Syllabus_id; ?>">
            <input type="hidden" name="eval" value="<?php echo $Evaluate_id; ?>">
            <!-- <input name="back" type="submit" class="btn-btn-primary" style="align: right " value="Back"> -->
            <div class="section-title"><h2><br> </div>

            </div>
            <div class="row">

              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">

                    <div class="form-group">
                     <?php 

                     $query = "SELECT * FROM syllabus_copy WHERE syllabus_id ='$Syllabus_id'";
                     $query_run = mysqli_query($conn, $query);
                     while($row = mysqli_fetch_assoc($query_run))
                     {
                      ?>

                    </div>
                    <input type="hidden" name="oldfilename" value="<?php echo $row['sfile_name']?>">


                    <div class="form-group">
                      <label for="description">Description : </label>
                      <input type="text" class="form-control" name="desc" id="desc" value='<?php echo $row['description']?>' required>
                    </div><br>
                    <div class="form-group">
                      <label for="Book_Name">Upload File: </label>
                      <input type="file" name="filename" accept="application/pdf,image/jpg" required>
                      <label>( Only pdf,jpg,jpeg files supported )</label>
                    </div>


                    <div class="text-center">

                      <input name="submit" type="submit" style="align: right " value="Update"><br> 
                    </div> 


                  </form>
                  <?php
                }
                ?>
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
$desc = $_POST['desc'];
$Syllabus_id = $_POST['Syllabus_id'];
$evaluate_id = $_POST['eval'];
$filename = $_POST['filename'];

$dir=$evaluate_id;


$uploaddir = 'uploads/syllabus/'.$dir.'/';
$uploadfile = $uploaddir . basename($_FILES['filename']['name']);
$newfilename= date('dmY_His_').str_replace(" ", "", basename($_FILES["filename"]["name"]));
$doctype=$_FILES['filename']['type'];

$update = "update syllabus_copy set sfile_name = '$newfilename',description = '$desc' where syllabus_id='$Syllabus_id'";

if (move_uploaded_file($_FILES['filename']['tmp_name'],$uploaddir . $newfilename) && unlink($uploaddir.$oldfilename)) {

$result = mysqli_query($conn,$update);
if($result){
echo "<script> alert('Syllabus Updated Successfully')</script>";
echo "<script type='text/javascript'>window.location='edit_syllabus2.php?Evaluate_ID=$evaluate_id';</script>";
}
else{
echo "Error : ".mysqli_error();
}
} 
else {
echo "Possible file upload attack!\n";
}

}

?>