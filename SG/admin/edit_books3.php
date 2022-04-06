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
              <h3 class="page-title"> Update Book Details</h3>
        <form enctype="multipart/form-data" action="" method="POST" >

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
                          
                          $query = "SELECT * FROM books WHERE Book_ID ='$Book_id'";
                          $query_run = mysqli_query($conn, $query);
                          while($row = mysqli_fetch_assoc($query_run))
                          {
                        ?>
                    
                  </div>
                    


          <div class="form-group">
                    <label for="Book_Name">Book Name: </label>
                    <input type="text" class="form-control" name="Book_Name" id="Book_Name" value='<?php echo $row['Book_Name']?>' required>
                  </div>
          
          <div class="form-group">
                    <label for="Author_Name">Author Name: </label>
                    <input type="text" class="form-control" name="Author_Name" id="Author_Name" value='<?php echo $row['Author_Name']?>' required>
                  </div>
          
          <div class="form-group">
                    <label for="Book_Price">Price: </label>
                    <input type="text" class="form-control" name="Book_Price" id="Book_Price" value='<?php echo $row['Book_Price']?>' required>
                  </div>
          
          <div class="form-group">
                    <label for="Initial_Rating">Initial Rating: </label>
                    <input type="text" class="form-control" name="Initial_Rating" id="Initial_Rating" value='<?php echo $row['Initial_Rating']?>' required>
                  </div>
          
          <div class="form-group">
                    <label for="Book_Publication">Publication: </label>
                    <input type="text" class="form-control" name="Book_Publication" id="Book_Publication" value='<?php echo $row['Book_Publication']?>' required>
                  </div>
          
          <div class="form-group">
                    <label for="Book_Image">Book Image Link: </label>
                    <input type="text" class="form-control" name="Book_Image" id="Book_Image" value='<?php echo $row['Book_Image']?>' required>
                  </div>
          
          <div class="form-group">
                    <label for="Book_Link">Book Link: </label>
                    <input type="text" class="form-control" name="Book_Link" id="Book_Link" value='<?php echo $row['Book_Link']?>' required>
                  </div>
          
          <div class="form-group">
                    <label for="ISBN">ISBN: </label>
                    <input type="text" class="form-control" name="ISBN" id="ISBN" value='<?php echo $row['ISBN']?>' required>
                  </div>

        <div class="form-group">
                    <label for="Book_GNRE">GNRE: </label>
                    <input type="text" class="form-control" name="Book_GNRE" id="Book_GNRE" value='<?php echo $row['Book_Genre']?>' required>
                  </div>
          
          <div class="form-group">
                    <label for="Book_Edition">Edition: </label>
                    <input type="text" class="form-control" name="Book_Edition" id="Book_Edition" value='<?php echo $row['Book_Edition']?>' required>
                  </div>
          
          <div class="form-group">
                    <label for="Book_Type">Type: </label>
                    <select id="Book_Type" name="Book_Type" class="InputBox">
                      <option>Reference</option>
                      <option>Related</option>
                    </select>
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
echo "<script type='text/javascript'>window.location='edit_books2.php?Evaluate_ID=$Evaluate_id';</script>";
}

if(isset($_POST['submit'])){
  $Book_id = $_POST['Book_id']; 
  $Evaluate_id = $_POST['eval'];

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

  $query="update books set Book_Name = '$Book_Name',Author_Name = '$Author_Name',Book_Price = '$Book_Price',Initial_Rating = '$Initial_Rating',Book_Publication = '$Book_Publication',Book_Image = '$Book_Image',Book_Link = '$Book_Link',ISBN = '$ISBN' ,Book_Genre = '$Book_GNRE',Book_Edition = '$Book_Edition',Book_Type = '$Book_Type' where Book_id = '$Book_id'";
  $data=mysqli_query($conn, $query);
    if($data)
    {
    echo "<script> alert('Book Details Updated Successfully!!!')</script>";
    echo "<script type='text/javascript'>window.location='edit_books2.php?Evaluate_ID=$Evaluate_id';</script>";
   
    }
    else 
    {
     echo "<script> alert('Something Went Wrong... ')</script>";
    }


}
?>