<?php 
include("../includes/connect.php"); 
session_start();
if($_SESSION['email']==true)
{
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
  <title>Your Orders</title>
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
  <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#example').DataTable();
    } );
  </script>
  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
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
          <li><a class="nav-link scrollto active" href="#">Your Orders</a></li>
          <li><a class="getstarted scrollto" href="../includes/logout.php">Log Out</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->
  <main id="main">
   <!-- ======= Breadcrumbs ======= -->
   <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
      </div>
    </section><!-- End Breadcrumbs -->
<?php
  $query_run_id = mysqli_query($conn, "SELECT * FROM user WHERE User_Email = '$email'");
  $row_id = mysqli_fetch_assoc($query_run_id);
  $user_id=$row_id['User_ID'];
  $query_Notes_Requests = mysqli_query($conn,"SELECT * FROM notes_requests WHERE Buyer_User_ID = '$user_id'");
  if(mysqli_num_rows($query_Notes_Requests)>0)
  {
?>
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" style="width:100%;" data-aos="fade-up">
        <div class="row">
                <table id="example" class="display" style="width:100%; border: 1px solid black; border-collapse: collapse;">
                  <thead>
                    <tr>
                      <th><center>Sr. No.</center></th>
                      <th><center>Notes Name</center></th>
                      <th><center>Price</center></th>
                      <th><center>Delete</center></th>
                      <th><center>Show Details</center></th>
                    </tr>
                  </thead>
                  <tbody>
<?php  
    $no='1';
    while($row_Notes_Requests = mysqli_fetch_array($query_Notes_Requests)) 
    {
      $Notes_id = $row_Notes_Requests['Notes_ID'];
      $query_Notes = mysqli_query($conn,"SELECT * FROM notesstore WHERE Notes_ID = '$Notes_id'");
      $row_NoteStore = mysqli_fetch_assoc($query_Notes);
?> 
                    <tr>
                      <td><center><?php echo $no ?></center></td>
                      <td><center><?php echo $row_NoteStore['Notes_Name']?></center></td>
                      <td><?php echo $row_NoteStore['Notes_Price']?></td>
                      <td>
                        <form class="form" method="post" action="includes/process.php">
                          <button style="width: 100px;" name="delete" type="delete" value=<?php echo $row_NoteStore['Notes_ID'];?> class="btn btn-outline-danger">Delete</button>
                        </form>
                      </td>
                      <td><center>
                      <form class="form" method="post" action="view_details.php">
                        <button type="view_details" name="view_details" value=<?php echo $row_NoteStore['Notes_ID'];?> style="margin-top: 10px; width:150px" class="btn btn-outline-warning">View Details</button>
                      </form></center>
                      </td>
                    </tr>
<?php
      $no=$no+1; 
    } 
?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th><center>Sr. No.</center></th>
                      <th><center>Book Name</center></th>
                      <th><center>Price</center></th>
                      <th><center>Delete</center></th>
                      <th><center>Show Details</center></th>
                    </tr>
                  </tfoot>
                </table>
        </div>
      </div>
    </section><!-- End Contact Section -->
    </main><!-- End #main -->
<?php
  }
  else
  {
?>
</main><!-- End #main -->
<footer id="footer">
    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <h4>No Record Found</h4>
          </div>
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->
<?php
  }
?>
  
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

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>

<?php
}
else{
  header('location: includes/login.php');
}


if(isset($_POST['filter'])){
  $dept = $_POST['department'];
  $sem = $_POST['sem'];
  echo "<script type='text/javascript'>window.location='viewbooks.php?dept=$dept&sem=$sem';</script>";
}
?>