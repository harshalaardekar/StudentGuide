<?php
include("../../../includes/connect.php");
// session_start();
// if($_SESSION['email']==true)
// {
  $email= $_SESSION['email'];
  if(isset($_POST['delete']))
  {
    $id=$_POST['delete'];
    $query = "DELETE FROM bookstore WHERE BookStore_Book_ID = '$id'";
    $query_run = mysqli_query($conn, $query);
      if($query_run){
          echo "<script type='text/javascript'>alert('Book has benn deleted!!!');window.location='../available_books.php?dept=All&sem=All';</script>";
      }
      else{
          echo mysqli_error($conn);
      }
  }

  if(isset($_POST['query']))
  {
    $id=$_POST['query'];
    $query = "DELETE FROM report_bookstore WHERE Book_ID = '$id'";
    $query_run = mysqli_query($conn, $query);
      if($query_run){
        $query1 = "UPDATE bookstore SET BookStore_BuyStatus = 'OPEN' WHERE BookStore_Book_ID = '$id'";
        $query_run1 = mysqli_query($conn, $query1);
        if($query_run1)
        {
          echo "<script type='text/javascript'>alert('Query has been deleted!!!');window.location='../available_books.php?dept=All&sem=All';</script>";
        }
        else
        {
          echo mysqli_error($conn);
        }
      }
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