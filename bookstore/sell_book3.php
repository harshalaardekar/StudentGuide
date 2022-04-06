<?php 
include("../includes/connect.php"); 
session_start();
if($_SESSION['email']==true)
{
    $email= $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Arsha Bootstrap Template - Index</title>
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
        <li><a class="nav-link scrollto" href="viewbooks.php?dept=All&sem=All">View Books</a></li>
          <li><a class="nav-link scrollto active" href="sell_book.php">Sell Book</a></li>
          <li><a class="nav-link scrollto" href="your_books.php">Your Books</a></li>
          <li><a class="nav-link   scrollto" href="your_orders.php">Your Orders</a></li>
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

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">
        <form enctype="multipart/form-data" action="" method="POST" >
          <div class="section-title"><h2>3/3</h2></div>
          <div class="row">
            <div class="col-lg-3 d-flex align-items-stretch"></div>
            <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
              <div class="php-email-form">
                <div class="row">
                  <div class="form-group">
                    <label for="isbn">ISBN 13: </label>
                    <div class="">
                      <select id="isbn" name="isbn" class="InputBox">
<?php 
  $evaluate_id = $_GET['ID'];
  $query = "SELECT * FROM books WHERE Evaluate_ID = '$evaluate_id'";
  $query_run = mysqli_query($conn, $query);
  while($row = mysqli_fetch_assoc($query_run))
  {
?>
                        <option><?php echo $row['ISBN']?></option>
<?php
  }
?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="price">Price: </label>
                    <input type="text" class="form-control" name="price" id="price" required>
                  </div>
                  <div class="form-group">
                    <label for="condition">Condition: </label>
                    <div class="">
                      <select id="condition" name="condition" class="InputBox">
                        <option>New</option>
                        <option>Used-New Like</option>
                        <option>Used-Good</option>
                        <option>Readable</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="image">Upload Book Image:  </label>
                    <input type="file" id="image" name="image" accept=".jpg, .jpeg, .png"/><br>
                    <label for="qr">Upload QR Code:  </label>
                    <input type="file" id="qr" name="qr" accept=".jpg, .jpeg, .png"/>
                    <div class="text-center">
                      <input name="submit" type="submit" value="Submit"><br>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </section><!-- End Contact Section -->

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

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>

<?php
}
else{
  header('location: includes/login.php');
}

if(isset($_POST['submit'])){
  $query_run_id = mysqli_query($conn, "SELECT * FROM user WHERE User_Email = '$email'");
  $row_id = mysqli_fetch_assoc($query_run_id);
  $user_id=$row_id['User_ID'];
  $isbn = $_POST['isbn'];
  $bookcondition = $_POST['condition'];
  $price = $_POST['price'];
  $buystatus = "OPEN";
  $image = $_FILES['image'];
  $upload_image = $_FILES['image']['name'];
  move_uploaded_file($_FILES['image']['tmp_name'],"uploads/".$_FILES['image']['name']);
  $qr = $_FILES['qr'];
  $upload_image1 = $_FILES['qr']['name'];
  move_uploaded_file($_FILES['qr']['tmp_name'],"uploads/".$_FILES['qr']['name']);
  $query = mysqli_query($conn,"INSERT INTO bookstore(BookStore_ISBN_ID, BookStore_Condition , BookStore_Price, BookStore_Image, BookStore_Seller_ID, BookStore_BuyStatus, BookStore_Evaluate_ID, QR)values
                                                    ('$isbn', '$bookcondition', '$price', '".$upload_image."' , '$user_id', '$buystatus', '$evaluate_id', '".$upload_image1."')");
  if($query){
      echo "<script type='text/javascript'>alert('Book is uploaded for selling!!!');window.location='your_books.php';</script>";
  }
  else{
    echo mysqli_error($conn);
  }
}
?>