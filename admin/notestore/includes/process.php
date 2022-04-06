<?php
include("../../../includes/connect.php");
// session_start();
// if($_SESSION['email']==true)
// {
  // $email= $_SESSION['email'];
  if(isset($_POST['delete']))
  {
    $id=$_POST['delete'];
    $query = "DELETE FROM notesstore WHERE Notes_ID = '$id'";
    $query_run = mysqli_query($conn, $query);
      if($query_run){
          echo "<script type='text/javascript'>alert('Notes has benn deleted!!!');window.location='../view_notes.php?dept=All&sem=All';</script>";
      }
      else{
          echo mysqli_error($conn);
      }
  }

  if(isset($_POST['mark_as_read']))
  {
    $id=$_POST['mark_as_read'];
    // $query = "DELETE FROM report_notesstore WHERE Report_ID = '$id'";
    // $query_run = mysqli_query($conn, $query);
      // if($query_run){
        $query1 = "UPDATE report_notesstore SET Report_Status = 'CLOSE' WHERE Report_ID = '$id'";
        $query_run1 = mysqli_query($conn, $query1);
        if($query_run1)
        {
          echo "<script type='text/javascript'>alert('Report is marked as Read!!!');window.location='../view_notes.php?dept=All&sem=All';</script>";
        }
        else
        {
          echo mysqli_error($conn);
        }
      // }
  }

  else
  {
    echo "POST is not set!";
  }
// }
// else
// {

// }
?>