<!DOCTYPE html>
<?php 
include "includes/connect.php";
?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Student Guide | Admin Dashboard</title>
  <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
  <!-- Include Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  
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

  <!-- Style -->
  <style type="text/css">

    /*select {
      width: 100%;
      padding: 12px;
      border: 1px solid black;
      border-radius: 4px;
      resize: vertical;
    }
*/
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

    /*body {
      font-family: "Roboto Condensed", Helvetica, sans-serif;
      background-color: #f7f7f7;
    }*/
    .container { margin: 30px auto; max-width: 960px; }
    a {

      text-decoration: none;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      margin-bottom: 20px;
    }
    table, th, td {
       border: 1px solid black;
       text-align: left;
       color: black;
    }
    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
    th {
      background-color: #ddd;
      text-align: center;
      border: black;
      padding: 5px;
    }
    td {
      padding: 5px;
      border : none;
    }
    button {
      cursor: pointer;
    }
    button:hover {
  background-color: white;
}
    /*Initial style sort*/
    .tablemanager th.sorterHeader {
      cursor: pointer;
    }
    .tablemanager th.sorterHeader:after {
      content: " \f0dc";
      font-family: "FontAwesome";
    }
    /*Style sort desc*/
    .tablemanager th.sortingDesc:after {
      content: " \f0dd";
      font-family: "FontAwesome";
    }
    /*Style sort asc*/
    .tablemanager th.sortingAsc:after {
      content: " \f0de";
      font-family: "FontAwesome";
    }
    /*Style disabled*/
    .tablemanager th.disableSort {

    }
    #for_numrows {
      padding: 10px;
      float: left;
    }
    #for_filter_by {
      padding: 10px;
      float: right;
    }
    #pagesControllers {
      display: block;
      text-align: right;
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

<div class="main-panel">

          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> View Notice</h3>
              <h1>3/3<a href="selectsemdept.php?Page=ViewPapers">Back</a></h1></div>

              <!-- ======= Contact Section ======= -->
              <section id="contact" class="contact">
  <div class="container fl" data-aos="fade-up">

  <!-- Table start -->
    <table class="tablemanager">
      <thead>
        <tr>
                        <!-- <th>Notice ID</th> -->
                        <!-- <th>File Name</th> -->
                        <th>Notice Title</th>
                        <!-- <th>View</th> -->
                      </tr>
        
      </thead>
    <tbody>
                      <?php  
                      $query = "SELECT * FROM notice";
                      $query_Paper = mysqli_query($conn, $query);
                      

                      if ($query_Paper) {
                      while ($object = $query_Paper->fetch_object())
                      {
                        
                       
                       
                      ?> 
                      <tr> 
                        <!-- <td><center><?php echo $object->nid?></center></td> -->
                        <!-- <td><?php echo $object->  notice_file?></td> -->
                        <!-- <td><?php echo $object->ndesc?></td> -->
                         
                       <td>
                        <form class="form" action="" method="POST"  >
                          <input type="hidden" name="eval" value="<?php echo $Evaluate_ID; ?>">
                          <center><button class="button" name="view" style="border: none; font-size: 14px;" value=<?php echo $object->nid;?> class="btn btn-outline-danger"><u style="color: blue;"><?php echo $object->ndesc?></u></button></center>
                          </form>

                      </td>

                       

                      </tr>
                      <?php } } ?>
                    </tbody>
  </table>

</div>
    <!-- External jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- <script type="text/javascript" src="./js/jquery-1.12.3.min.js"></script> -->
  <script type="text/javascript" src="./tableManager.js"></script>
  <script type="text/javascript">
    // basic usage
    $('.tablemanager').tablemanager({
      firstSort: [[3,0],[2,0],[1,'asc']],
      disable: ["last"],
      appendFilterby: true,
      dateFormat: [[4,"mm-dd-yyyy"]],
      debug: true,
      vocabulary: {
    voc_filter_by: 'Filter By',
    voc_type_here_filter: 'search...',
    voc_show_rows: 'Rows Per Page'
  },
      pagination: true,
      showrows: [5,10,20,50,100],
      disableFilterBy: [1]
    });
    // $('.tablemanager').tablemanager();
  </script>
  <script>
try {
  fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", { method: 'HEAD', mode: 'no-cors' })).then(function(response) {
    return true;
  }).catch(function(e) {
    var carbonScript = document.createElement("script");
    carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
    carbonScript.id = "_carbonads_js";
    document.getElementById("carbon-block").appendChild(carbonScript);
  });
} catch (error) {
  console.log(error);
}
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

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
if(isset($_POST['view'])){
  $notice_id = $_POST['view'];
  echo "<script type='text/javascript'>window.location='view_notice1.php?notice_id=$notice_id';</script>";

}

?>