<!DOCTYPE html>
<?php 
include "includes/connect.php";
?>

<!DOCTYPE html>
<html lang="en">
  <body>

    <?php
      
            $notice_id = $_GET['notice_id']; 
            $query="SELECT * from notice where nid='$notice_id'";
            $data=mysqli_query($conn,$query);
              
              while($info=mysqli_fetch_array($data))
               {
                  // $eval = $info['evaluate_ID'];
                  ?>
                  <embed type="application/pdf" src="../admin/uploads/Notices/<?php echo $info['notice_file']; ?>" style="width: 100%;height:650px;" >


                  <!-- <iframe type="application/pdf" target="_blank" src="../admin/uploads/Notices/<?php echo $info['notice_file']; ?>"></iframe> -->
         
            <?php
            
            }
            ?>
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
echo "<script type='text/javascript'>window.location='view_notice.php';</script>";
}

if(isset($_POST['submit'])){
  $paper_id = $_POST['paper_id']; 
  $Evaluate_id = $_POST['eval'];
  

}
?>