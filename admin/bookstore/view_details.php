<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>View Details</title>
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
    header('location: available_books.php?dept=All&sem=All');
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
    $query_run_id=mysqli_query($conn, "SELECT * FROM bookstore WHERE BookStore_Book_ID='$id'");
    $row_BookStore = mysqli_fetch_assoc($query_run_id);
    $temp = $row_BookStore['BookStore_ISBN_ID'];
    $query_Book = mysqli_query($conn, "SELECT * FROM books WHERE ISBN = '$temp'");
    $row_Book =  mysqli_fetch_assoc($query_Book);
    $seller_ID = $row_BookStore['BookStore_Seller_ID'];
    $query_run_seller=mysqli_query($conn, "SELECT * FROM user WHERE User_ID='$seller_ID'");
    $row_Seller = mysqli_fetch_assoc($query_run_seller);
    $buyer_ID = $row_BookStore['BookStore_Buyer_ID'];
    $query_run_buyer=mysqli_query($conn, "SELECT * FROM user WHERE User_ID='$buyer_ID'");
    $row_Buyer = mysqli_fetch_assoc($query_run_buyer);
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
                            <h4 class="card-title text-white"><?php echo $row_Book['Book_Name'] ?></h4>
                            <?php echo'<img src="../../bookstore/uploads/'.$row_BookStore['BookStore_Image'].'" alt="image for book" width="100%" height="90%" Style="padding: 10px">'?>
                          </div>
                          <div class="card-body bg-white pt-4">
                            <div class="row pt-4">
                              <div class="col-sm-6">
                                <div class="text-center border-right border-md-0">
                                  <h4>Author Name</h4>
                                  <h1 class="text-dark font-weight-bold mb-md-3"><?php echo $row_Book['Author_Name'] ?></h1>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="text-center">
                                  <h4>Price</h4>
                                  <h1 class="text-dark font-weight-bold"><?php echo $row_BookStore['BookStore_Price']; ?></h1>
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
                                <table>
                                  <th><strong>Book Details </strong></th>
                                  <tr><td><strong>Condition </strong></td><td><?php echo $row_BookStore['BookStore_Condition'] ?></td></tr>
                                  <tr><td><strong>Publisher </strong></td><td><?php echo $row_Book['Book_Publication'] ?></td></tr>
                                  <tr><td><strong>ISBN ID </strong></td><td><?php echo $row_BookStore['BookStore_ISBN_ID'] ?></td></tr>
                                  <tr><td><strong>QR CODE </strong></td><td><?php echo'<img src="../../bookstore/uploads/'.$row_BookStore['QR'].'" alt="image for book" width="250px" height="250px">'?></td></tr>
                                  <tr><td style="padding-top:50px"><strong>Other Details </strong></td></tr>
                                  <tr>
                                    <td>
                                      <strong>Uploaded By </strong>
                                    </td>
                                    <td>
                                      <?php echo $row_Seller['User_FN']; echo ' '; echo $row_Seller['User_LN']; ?>
                                    </td>
                                  </tr>
<?php
  if($row_BookStore['BookStore_BuyStatus'] == "REQUESTED")
  {
?>
                                  <tr>
                                    <td>
                                      <strong>Requested By </strong>
                                    </td>
                                    <td>
                                      <?php echo $row_Buyer['User_FN']; echo ' '; echo $row_Buyer['User_LN'];  ?>
                                    </td>
                                  </tr>
<?php
  }
  else if($row_BookStore['BookStore_BuyStatus'] == "REPORTED")
  {
?>
                                  <tr>
                                    <td>
                                      <strong>Reported By </strong>
                                    </td>
                                    <td>
                                      <?php 
                                        $query_r = mysqli_query($conn,"SELECT * FROM report_bookstore WHERE Book_ID = '$id'");
                                        echo mysqli_num_rows($query_r); echo 'Students'; ?>
                                    </td>
                                  </tr>       
<?php
  }
  else if($row_BookStore['BookStore_BuyStatus'] == "CLOSE")
  {
?>
                                  <tr>
                                    <td>
                                      <strong>Sold By </strong>
                                    </td>
                                    <td>
                                      <?php echo $row_Buyer['User_FN']; echo ' '; echo $row_Buyer['User_LN']; ?>
                                    </td>
                                  </tr>    
<?php
  }
?>
                                </table>
                                <form class="form" method="post" action="includes/process.php">
                <button onclick="myFunction('<?php echo $row_Book['Book_Link']; ?>')" style="width: 100%; margin-top: 20px" type="button" class="btn btn-outline-info">Explore More</button>
<?php
  if($row_BookStore['BookStore_BuyStatus'] == "REPORTED")
  {
?>             
                <button type="query" name="query" value=<?php echo $row_BookStore['BookStore_Book_ID'];?> style="width: 100%; margin-top: 20px" type="button" class="btn btn-outline-warning">Delete Query</button>
<?php
  }
?>
                <button style="width: 100%; margin-top: 20px" name="delete" type="delete" value=<?php echo $row_BookStore['BookStore_Book_ID'];?> class="btn btn-outline-danger">Delete Book</button>
              </form>
                              <div class="graph-custom-legend primary-dot" id="pageViewAnalyticLengend"></div>
                            </div>
                            <canvas id="page-view-analytic"></canvas>
                          </div>
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