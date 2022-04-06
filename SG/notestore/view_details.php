<?php 
include("../includes/connect.php"); 
session_start();
if($_SESSION['email']==true)
{
  if(isset($_POST['view_details'])){
    $id=$_POST['view_details'];
  }
  else{
    header('location: viewnotes.php');
  }
  $email= $_SESSION['email'];
  if($email == 'admin@gmail.com')
  {
    header('location: ../admin/notestore/viewnotes.php');
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>View Details</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Arsha - v4.6.0
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center">

    <h1 class="logo me-auto"><a href="../home.php">Student Guide</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
      <ul>
        <li><a class="nav-link scrollto" href="viewnotes.php?dept=All&sem=All">View Notes</a></li>
          <li><a class="nav-link scrollto" href="sell_notes1.php">Sell Notes</a></li>
          <li><a class="nav-link scrollto" href="your_notes.php">Your Notes</a></li>
          <li><a class="nav-link scrollto" href="your_orders.php">Your Orders</a></li>
          <li><a class="getstarted scrollto" href="../includes/logout.php">Log Out</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">
     
<?php
$query_NoteStore = mysqli_query($conn,"SELECT * FROM notesstore WHERE Notes_ID = '$id'");
$row_NoteStore = mysqli_fetch_assoc($query_NoteStore);
$Seller_ID = $row_NoteStore['Notes_Seller_ID'];
$evaluate_ID = $row_NoteStore['Notes_Evaluate_ID'];
$query_Evaluate = mysqli_query($conn,"SELECT * FROM evaluate WHERE Evaluate_ID = '$evaluate_ID'");
$row_Evaluate = mysqli_fetch_assoc($query_Evaluate);
$query_run_Buyer = mysqli_query($conn, "SELECT * FROM user WHERE User_Email = '$email'");
$row_Buyer = mysqli_fetch_assoc($query_run_Buyer);
$Buyer_id=$row_Buyer['User_ID'];
?>
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
      </div>
    </section><!-- End Breadcrumbs -->
    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-3">
            <div class="swiper-slide">
              <img src="includes/pdf.png" alt="image for book" width="210px" height="210px" Style="margin-left: 50px; margin-top:50px">
<?php
    if($Seller_ID == $Buyer_id)
    {
      $file = 'uploads/' . $row_NoteStore['Notes_Sample'];
?>
              <!-- <input class="btn btn-outline-info" type="submit" name="insert" value="insert" onclick="insert()" /> -->

              <center><a name="sample" target="_blank" href= "<?php echo $file; ?>" style="width: 250px; margin-top: 40px" class="btn btn-outline-info">View Sample</a></center>
              <form class="form" method="post" action="includes/process.php">
              <center><button style="width: 250px; margin-top: 20px" name="delete" type="delete" value=<?php echo $row_NoteStore['Notes_ID'];?> class="btn btn-outline-danger">Delete</button></center>
              </form>
<?php
    }
    else
    {
      $file = 'uploads/' . $row_NoteStore['Notes_Sample'];
?>  
              <center><a name="sample" target="_blank" href= "<?php echo $file; ?>" style="width: 250px; margin-top: 40px" class="btn btn-outline-info">View Sample</a></center>
              <form class="form" method="post" action="includes/process.php">
                <center><button type="request" name="request" value=<?php echo $id;?> style="width: 250px; margin-top: 20px" type="button" class="btn btn-outline-warning">Send Request</button></center>
              </form>
              <?php
  if($Buyer_id != $Seller_ID)
  {
?>
<?php
    $query_report = "SELECT * FROM report_notesstore WHERE Notes_ID = '$id' AND Reported_By  = '$Buyer_id'";
    $query_run_report = mysqli_query($conn, $query_report);
    if(mysqli_num_rows($query_run_report)>0)
    {
?>            
                <center><button style="width: 250px; margin-top: 20px" type="button" class="btn btn-danger">Reported to Admin</button></center>
<?php
    }
    else
    {
?>
                <form class="form" method="post" action="includes/process.php">
                  <div class="form-group">
                  <center><textarea class="form-control" name="reason" rows="3" required style="width: 250px; margin-top: 20px" ></textarea></center>
                  </div>
                  <center><button type="report" name="report" value=<?php echo $id;?> style="width: 250px; margin-top: 20px" type="button" class="btn btn-outline-danger">Report</button></center>
                </form>
<?php
    }
?>
<?php
  }
?>
              
<?php
    }
?>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="portfolio-info">
              <h3><?php echo $row_NoteStore['Notes_Name'] ?></h3>
              <table>
                <tr>
                  <td>
                    <strong>Branch: </strong>
                  </td>
                  <td>
                    <?php echo $row_Evaluate['Branch'] ?>
                  </td>      
                </tr>
                <tr>
                  <td>
                    <strong>Semester: </strong>
                  </td>
                  <td>
                    <?php echo $row_Evaluate['Semester']; ?>
                  </td>
                </tr>
                <tr>
                  <td>
                    <strong>Subject: </strong>
                  </td>
                  <td>
                    <?php echo $row_Evaluate['Subject'] ?>    
                  </td>
                </tr>
                <tr>
                  <td>
                    <strong>Price: </strong>
                  </td>
                  <td>
                    <?php echo $row_NoteStore['Notes_Price'] ?>
                  </td>
                </tr>
                <tr>
                  <td>
                    <strong>Description: </strong>
                  </td>
                  <td>
                    <?php echo $row_NoteStore['Notes_Description'] ?>  
                  </td>
                </tr>
                <tr>
                  <td>
                    <strong>QR Code</strong>
                  </td>
                  <td>
                    <?php echo'<img src="uploads/'.$row_NoteStore['QR'].'" alt="image for book"  width="210px" height="210px" Style= margin-top:30px">'?>
                  </td>
                </tr>
              </table>
            </div>
            <div class="portfolio-info">
              <h3>Reviews</h3>
<?php
  if($Buyer_id != $Seller_ID)
  {
?>
<?php
    $query_Review = mysqli_query($conn,"SELECT * FROM review_notes WHERE Notes_ID = '$id' AND User_ID = '$Buyer_id'");
    if(mysqli_num_rows($query_Review)==0)
    {
?>            
              <form class="form" method="post" action="includes/process.php">
                <div class="form-group">
                  <textarea class="form-control" name="review" id="review" rows="3" required></textarea>
                </div>
                <center><button type="uploadreview" name="uploadreview" value=<?php echo $id;?> style="width: 250px; margin-top: 20px " type="button" class="btn btn-outline-danger">Upload Review</button></center>
              </form>         
<?php
    }
    else
    {
      $placeholder = mysqli_fetch_assoc($query_Review);
?>
              <form class="form" method="post" action="includes/process.php">
                <textarea class="form-control" name="review" id="review" rows="3" placeholder="<?php echo $placeholder['Review']  ?>"></textarea>
                <center><button type="updatereview" name="updatereview" value=<?php echo $placeholder['Review_ID'];?> style="width: 250px; margin-top: 20px" type="button" class="btn btn-outline-warning">Update Review</button>
                <button type="deletereview" name="deletereview" value=<?php echo $placeholder['Review_ID'];?> style="width: 250px; margin-top: 20px;" type="button" class="btn btn-outline-warning">Delete Review</button></center>
              </form>
<?php
    }
?>
              
<?php
  }
  $query_Review1 = mysqli_query($conn,"SELECT * FROM review_notes WHERE Notes_ID");
  if(mysqli_num_rows($query_Review1)>0)
  {
    while($row_Review1 = mysqli_fetch_array($query_Review1)) 
    {
      $id = $row_Review1['User_ID'];
      $query_run_id = mysqli_query($conn, "SELECT * FROM user WHERE User_ID = '$id'");
      $row_id = mysqli_fetch_assoc($query_run_id);
?>
              <strong style="margin-top:20px"><?php echo $row_id['User_FN']; echo ' '; echo $row_id['User_LN']?></strong>
              <p><?php echo $row_Review1['Review']?></p>
<?php
    }
  }
?>
            </div>
          </div>  
        </div>
      </div>
    </section><!-- End Portfolio Details Section -->

    </main><!-- End #main -->

    <?php include "../includes/footer.php"; ?>

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script>
    function myfunction() 
    {

    }
  </script>

  <!-- Template../in JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>

<?php
}
else{
  header('location: includes/login.php');
}
?>