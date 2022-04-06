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
              <h3 class="page-title"> Upload Book </h3>
        <form en<form enctype="multipart/form-data" action="" method="POST" >
        <div class="section-title"><h2>2/2 <a href="selectsemdept.php?Page=UploadBooks">Back</a></h2></div>
              
            </div>
            <div class="row">
              
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  
          <div class="form-group">
                    <label for="Evaluate_ID">Subject : </label>
                    <div class="">
                      <select id="Subject" name="Subject" class="InputBox">
                        <?php 
                          $Branch = $_GET['Branch'];
                          $Semester = $_GET['Semester'];
                          $query = "SELECT * FROM evaluate WHERE Semester = '$Semester' AND Branch = '$Branch'";
                          $query_run = mysqli_query($conn, $query);
                          while($row = mysqli_fetch_assoc($query_run))
                          {
                        ?>
                        
                        <option><?php echo $row['Subject']?></option>
                        <?php
                          }
                        ?>
                      
            </select>
            <input type="hidden" name="Branch" value="<?php echo $Branch; ?>">

            <input type="hidden" name="Semester" value="<?php echo $Semester; ?>">
                    </div>
                  </div>
                    
          <div class="form-group">
                    <label for="Book_Name">Book Name: </label>
                    <input type="text" class="form-control" name="Book_Name" id="Book_Name" required>
                  </div>
          
          <div class="form-group">
                    <label for="Author_Name">Author Name: </label>
                    <input type="text" class="form-control" name="Author_Name" id="Author_Name" required>
                  </div>
          
          <div class="form-group">
                    <label for="Book_Price">Price: </label>
                    <input type="text" class="form-control" name="Book_Price" id="Book_Price" required>
                  </div>
          
          <div class="form-group">
                    <label for="Initial_Rating">Initial Rating: </label>
                    <input type="text" class="form-control" name="Initial_Rating" id="Initial_Rating" required>
                  </div>
          
          <div class="form-group">
                    <label for="Book_Publication">Publication: </label>
                    <input type="text" class="form-control" name="Book_Publication" id="Book_Publication" required>
                  </div>
          
          <div class="form-group">
                    <label for="Book_Image">Book Image Link: </label>
                    <input type="text" class="form-control" name="Book_Image" id="Book_Image" required>
                  </div>
          
          <div class="form-group">
                    <label for="Book_Link">Book Link: </label>
                    <input type="text" class="form-control" name="Book_Link" id="Book_Link" required>
                  </div>
          
          <div class="form-group">
                    <label for="ISBN">ISBN: </label>
                    <input type="text" class="form-control" name="ISBN" id="ISBN" required>
                  </div>

        <div class="form-group">
                    <label for="Book_GNRE">GNRE: </label>
                    <input type="text" class="form-control" name="Book_GNRE" id="Book_GNRE" required>
                  </div>
          
          <div class="form-group">
                    <label for="Book_Edition">Edition: </label>
                    <input type="text" class="form-control" name="Book_Edition" id="Book_Edition" required>
                  </div>
          
          <div class="form-group">
                    <label for="Book_Type">Type: </label>
                    <select id="Book_Type" name="Book_Type" class="InputBox">
                      <option>Reference</option>
                      <option>Related</option>
                    </select>
                  </div>          
          <div class="text-center">
                    
                    <input name="submit" type="submit" style="align: right " value="Upload"><br> 
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
  $Semester = $_POST['Semester'];
  $Branch = $_POST['Branch'];
  $Subject = $_POST['Subject']; 
  $eval = mysqli_query($conn,"SELECT Evaluate_ID from evaluate where Branch = '$Branch' AND Semester = '$Semester' AND Subject = '$Subject'");
  $row_id = mysqli_fetch_assoc($eval);
  $evaluate_id=$row_id['Evaluate_ID'];

   // echo "<script type='text/javascript'>alert('.$evaluate_id.');  </script>";

  $Book_Name = $_POST['Book_Name'];
  $Author_Name = $_POST['Author_Name'];
  $Book_Price = $_POST['Book_Price'];
  $Initial_Rating = $_POST['Initial_Rating'];
  $Book_Publication = $_POST['Book_Publication'];
  $Book_Image = $_POST['Book_Image'];
  $Book_Link = $_POST['Book_Link'];
  $ISBN = $_POST['ISBN'];
  $Book_GNRE = $_POST['Book_GNRE'];
  $Book_Edition = $_POST['Book_Edition'];
  $Book_Type = $_POST['Book_Type'];

  $query="INSERT INTO books(Book_Name,Author_Name,Book_Price,Initial_Rating,Book_Publication,Book_Image,Book_Link,Evaluate_ID ,ISBN,Book_Genre,Book_Edition,Book_Type)values('$Book_Name','$Author_Name','$Book_Price','$Initial_Rating','$Book_Publication','$Book_Image','$Book_Link','$evaluate_id','$ISBN','$Book_GNRE','$Book_Edition','$Book_Type')";
  $data=mysqli_query($conn, $query);
    if($data)
    {
    echo "<script> alert('Book is uploaded')</script>";
    header("refresh:0; url=selectsemdept.php?Page=UploadBooks");
    // $query2="select uid from login_details where username ='$username' && password='$password'";
    // header("refresh:0; url=user.php");
    }
    else 
    {
     echo "<script> alert('Something Went Wrong... ')</script>";
    }


}
?>