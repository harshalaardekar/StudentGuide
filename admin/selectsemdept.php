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
      
              <h3 class="page-title"> Select Semister & Department </h3>
        <form enctype="multipart/form-data" action="" method="POST" >
          <div class="section-title"><h2>1/2</h2></div>
              
            </div>
      
            <div class="row">
              
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    
                    <div class="form-group">
                    <label for="Branch">Select Department: </Select>: </label>
                    <div class="">
                      <select id="Branch" name="Branch" class="InputBox">
                        <?php
                        $page=$_GET['Page'];

                        $query="SELECT Branch from evaluate group by Branch";
                        $data=mysqli_query($conn,$query);
                        
                        while($info=mysqli_fetch_array($data))
                         {
                        ?>
                        <option><?php echo $info['Branch']; ?></option>
                      <?php } ?>
                      </select>
                    </div>
                  </div>
                      <input type="hidden" name="page" value="<?php echo $page; ?>">
                    <div class="form-group">
                    <label for="Semester">Select Semester: </label>
                    <div class="">
                      <select id="Semester" name="Semester" class="InputBox">
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
          <div class="text-center">
                    <input name="submit" type="submit" style="align: right " value="Next">
                  </div>  
                      
                  
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


if(isset($_POST['submit'])){
  $Page = $_POST['page'];
  $Branch = $_POST['Branch'];
  $Semester = $_POST['Semester'];
  if($Page=='UploadSyllabus')
  {
    echo "<script type='text/javascript'>window.location='upload_syllabus.php?Branch=$Branch&Semester=$Semester';</script>";
  }
  else if($Page=='UploadBooks')
  {
    echo "<script type='text/javascript'>window.location='upload_books.php?Branch=$Branch&Semester=$Semester';</script>";
  }
  else if($Page=="UploadNotes"){
    echo "<script type='text/javascript'>window.location='upload_notes.php?Branch=$Branch&Semester=$Semester';</script>";
  }
  else if($Page=="UploadPaperSolutions"){
    echo "<script type='text/javascript'>window.location='upload_papersolutions.php?Branch=$Branch&Semester=$Semester';</script>";
  }
  else if($Page=="UploadNotice"){
    echo "<script type='text/javascript'>window.location='upload_notice.php?Branch=$Branch&Semester=$Semester';</script>";
  }

  else if($Page=="EditSyllabus"){
    echo "<script type='text/javascript'>window.location='edit_syllabus1.php?Branch=$Branch&Semester=$Semester';</script>";
  }
  else if($Page=="EditBooks"){
    echo "<script type='text/javascript'>window.location='edit_books1.php?Branch=$Branch&Semester=$Semester';</script>";
  }
  else if($Page=="EditNotes"){
    echo "<script type='text/javascript'>window.location='edit_notes1.php?Branch=$Branch&Semester=$Semester';</script>";
  }
  else if($Page=="EditPaperSolutions"){
    echo "<script type='text/javascript'>window.location='edit_papersolutions1.php?Branch=$Branch&Semester=$Semester';</script>";
  }
  else if($Page=="EditNotice"){
    echo "<script type='text/javascript'>window.location='edit_notice1.php?Branch=$Branch&Semester=$Semester';</script>";
  }

  else if($Page=="ViewBooks"){
    echo "<script type='text/javascript'>window.location='view_books1.php?Branch=$Branch&Semester=$Semester';</script>";
  }
  else if($Page=="ViewSyllabus"){
    echo "<script type='text/javascript'>window.location='view_syllabus1.php?Branch=$Branch&Semester=$Semester';</script>";
  }
  else if($Page=="ViewPapers"){
    echo "<script type='text/javascript'>window.location='view_papers1.php?Branch=$Branch&Semester=$Semester';</script>";
  }
  else if($Page=="ViewNotes"){
    echo "<script type='text/javascript'>window.location='view_notes1.php?Branch=$Branch&Semester=$Semester';</script>";
  }
  else{
    echo "<script type='text/javascript'>window.location='selectsemdept.php';alert('Something Went Wrong'));</script>"; 
  }
}
?>