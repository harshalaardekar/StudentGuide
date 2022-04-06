<?php 
include("../includes/connect.php"); 
session_start();
if($_SESSION['email']==true)
{
  if(isset($_POST['view_details'])){
    $id=$_POST['view_details'];
  }
  else{
    header('location: viewbooks.php');
  }
    $email= $_SESSION['email'];
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
        <li><a class="nav-link scrollto" href="viewbooks.php?dept=All&sem=All">View Books</a></li>
          <li><a class="nav-link scrollto" href="sell_book1.php">Sell Book</a></li>
          <li><a class="nav-link scrollto" href="your_books.php">Your Books</a></li>
          <li><a class="nav-link   scrollto" href="your_orders.php">Your Orders</a></li>
          <li><a class="getstarted scrollto" href="../includes/logout.php">Log Out</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">
     
    <?php
    $query_run_id=mysqli_query($conn, "SELECT * FROM bookstore WHERE BookStore_Book_ID='$id'");
    $row_BookStore = mysqli_fetch_assoc($query_run_id);
    $temp = $row_BookStore['BookStore_ISBN_ID'];
    $query_Book = mysqli_query($conn, "SELECT * FROM books WHERE ISBN = '$temp'");
    $row_Book =  mysqli_fetch_assoc($query_Book);
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

          <div class="col-lg-8">
                <div class="swiper-slide">
                  <?php echo'<img src="uploads/'.$row_BookStore['BookStore_Image'].'" alt="image for book" width="600px" height="600px" Style="margin-left: 100px; margin-top:50px">'?>
                </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3><?php echo $row_Book['Book_Name'] ?></h3>
              <table>
                <tr>
                  <td>
                    <strong>Author </strong>
                  </td>
                  <td>
                    <?php echo $row_Book['Author_Name'] ?>
                  </td>
                </tr>
                <tr>
                  <td>
                    <strong>Price</strong>
                  </td>
                  <td>
                    <?php echo $row_BookStore['BookStore_Price']; ?>
                  </td>
                </tr>
                <tr>
                  <td>
                    <strong>Condition </strong>
                  </td>
                  <td>
                    <?php echo $row_BookStore['BookStore_Condition'] ?>
                  </td>
                </tr>
                <tr>
                  <td>
                    <strong>Publisher </strong>
                  </td>
                  <td>
                    <?php echo $row_Book['Book_Publication'] ?>
                  </td>
                </tr>
                <tr>
                  <td>
                    <strong>ISBN ID </strong>
                  </td>
                  <td>
                    <?php echo $row_BookStore['BookStore_ISBN_ID'] ?>
                  </td>
                </tr>
                <tr>
                  <td>
                    <strong>QR CODE </strong>
                  </td>
                  <td>
                    <?php echo'<img src="uploads/'.$row_BookStore['QR'].'" alt="image for book" width="250px" height="250px">'?>
                  </td>
                </tr>
              </table>
            </div>
            <div style="margin-top: 15px" class="portfolio-info" style="margin-top:">
<?php
     $query_run_id = mysqli_query($conn, "SELECT * FROM user WHERE User_Email = '$email'");
     $row_id = mysqli_fetch_assoc($query_run_id);
     $user_id=$row_id['User_ID'];
    if($row_BookStore['BookStore_Seller_ID'] == $user_id)
    {
?>
              <form class="form" method="post" action="includes/process.php">
                <button style="width: 100%;" name="delete" type="delete" value=<?php echo $row_BookStore['BookStore_Book_ID'];?> class="btn btn-outline-danger">Delete</button>
              </form>
<?php
    }
    else
    {
?>    
              <form class="form" method="post" action="includes/process.php">
                <button type="request" name="request" value=<?php echo $id;?> style="width: 100%; margin-top: 20px" type="button" class="btn btn-outline-info">Send Request</button>
                <button onclick="myFunction('<?php echo $row_Book['Book_Link']; ?>')" style="width: 100%; margin-top: 20px" type="button" class="btn btn-outline-warning">Buy New Book</button><br>
<?php
      $query_report = "SELECT * FROM report_bookstore WHERE Book_ID = '$id' AND Reported_By  = '$user_id'";
      $query_run_report = mysqli_query($conn, $query_report);
      if(mysqli_num_rows($query_run_report)>0)
      {
?>
                <button style="width: 100%; margin-top: 20px" type="button" class="btn btn-danger">Reported to Admin</button>
<?php
      }
      else
      {
?>
                <button type="report" name="report" value=<?php echo $id;?> style="width: 100%; margin-top: 20px" type="button" class="btn btn-outline-danger">Report</button>
<?php
      }
?>
              </form>
<?php
    }
?>
            </div>
            <!-- <div class="portfolio-description">
              <h2>This is an example of portfolio detail</h2>
              <p>
                Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius.
              </p>
            </div>
          </div> -->

        </div>
      </div>
    </section><!-- End Portfolio Details Section -->

    </main><!-- End #main -->

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
    function myFunction(url) 
    {
      window.open(url,'_blank');
    }
  </script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>

<?php
}
else{
  header('location: includes/login.php');
}
?>