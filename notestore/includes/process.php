<?php
include("../../includes/connect.php");
session_start();
if(isset($_POST['submit']))
{
  $username = $_POST['username'];
  $password = $_POST['password']; 

  $query1="SELECT * FROM user WHERE User_Email='$username' && User_Password='$password'";
  $data1=mysqli_query($conn, $query1);
  if($data1->num_rows==1)
  {
    $object1 = $data1->fetch_object();
    $_SESSION['email'] = $username;
    echo "<script> alert('Login Successful')</script>";
    header("refresh:0; url=../viewnotes.php?dept=All&sem=All");
  }
  else
  {
    $query2="SELECT * FROM admin WHERE Admin_Username='$username' && Admin_Password='$password'";
    $data2=mysqli_query($conn, $query2);
    if($data2->num_rows==1)
    {
      $object2 = $data2->fetch_object();
      $_SESSION['email'] = $username;
      echo "<script> alert('Login Successful')</script>";
      header("refresh:0; url=../../admin/notestore/viewnotes.php?dept=All&sem=All");
    }
    else
    {
      echo "<script> alert('Something went wrong..Incorrect email or password')</script>";
      header("refresh:0; url=login.php");
    }
  }
}

else if(isset($_POST['register'])){
    $fn = $_POST['fn'];
    $ln = $_POST['ln'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $pass = $_POST['password'];
    $c_pass = $_POST['c_password'];
    $status = "Active";
    if($pass == $c_pass){
        $query = "SELECT * FROM user WHERE User_Email='$email'";
        $data = mysqli_query($conn, $query);
        $total = mysqli_num_rows($data);
        if(!$total){
            $query1 = "INSERT INTO user (User_FN, User_LN, User_Email, User_ContactNo, User_Password, User_Status) values ('$fn', '$ln', '$email', '$contact', '$pass', '$status')";
            $data1 = mysqli_query($conn, $query1);
            if($data1){
                echo "<script>alert( 'Registration Successful' )</script>";
                $_SESSION['email'] = $email;
                header("refresh:0; url=login.php");
            }
            else{
                echo "<script>alert('Something went wrong, please register again!')</script>";
            }
        }
        else{
            echo "<script>alert('Already have an account!')</script>";
        }
    }
    else{
        echo "<script>alert('Password and confirm password are not matching!')</script>";
    }
}

  
else if($_SESSION['email']==true)
{
  $email= $_SESSION['email'];
  if(isset($_POST['request']))
  {
    $id=$_POST['request'];
    $query_run_Notes = mysqli_query($conn,"SELECT * FROM notesstore WHERE Notes_ID = '$id'");
    $row_Notes = mysqli_fetch_assoc($query_run_Notes);
    $query_run_Buyer = mysqli_query($conn,"SELECT * FROM user WHERE User_Email = '$email'");
    $row_Buyer = mysqli_fetch_assoc($query_run_Buyer);
    $Buyer_ID = $row_Buyer['User_ID'];
    $Seller_ID = $row_Notes['Notes_Seller_ID'];
    $query_run_Seller = mysqli_query($conn,"SELECT * FROM user WHERE User_ID = '$Seller_ID'");
    $row_Seller = mysqli_fetch_assoc($query_run_Seller);

    $subject_Buyer = "Request has been sent to " . $row_Seller["User_FN"]. "  " . $row_Seller["User_LN"]. " on Books4u";
    $body_Buyer =  "Hi " . $row_Buyer["User_FN"]. ",\n
    Your request for notes on Books4u named as " . $row_Notes["Notes_Name"]. " has been sent to " . $row_Seller["User_FN"]. " " . $row_Seller["User_LN"]. " \n
    You can contact with " . $row_Seller["User_FN"]. " using following details.
    Name: " . $row_Seller["User_FN"]. "  " . $row_Seller["User_LN"]. "
    Email: " . $row_Seller["User_Email"]. "
    Contact: " . $row_Seller["User_ContactNo"]. " \n
    Regard,
    Books4U";;
  
    $subject_Seller = " ". $row_Buyer["User_FN"]. "  " . $row_Buyer["User_LN"]. " has send a request on Books4U.";
    $body_Seller = "Hi " . $row_Seller["User_FN"]. ",\n
    " . $row_Buyer["User_FN"]. "  " . $row_Buyer["User_LN"]. " has send a request to buy a notes named as " . $row_Notes["Notes_Name"]. " on Books4U.\n
    You can contact with " . $row_Buyer["User_FN"]. " using following details and update respective status on Books4U.
    Name: " . $row_Buyer["User_FN"]. "  " . $row_Buyer["User_LN"]. "
    Email: " . $row_Buyer["User_Email"]. "
    Contact: " . $row_Buyer["User_ContactNo"]. " \n
    Regard,
    Books4U";

    $mail_Seller = $row_Seller['User_Email'];
    $mail_Buyer = $row_Buyer['User_Email'];
    $headers = "From: sender email";

    if(mail($mail_Seller, $subject_Seller, $body_Seller, $headers)) {
      if(mail($mail_Buyer, $subject_Buyer, $body_Buyer, $headers)){
        $query_run_Insert = mysqli_query($conn,"INSERT INTO notes_requests (Seller_User_ID, Buyer_User_ID, Notes_ID) values ('$Seller_ID', '$Buyer_ID', '$id')");
        if($query_run_Insert){
          echo "<script type='text/javascript'>alert('Request has been sent!!!');window.location='../your_orders.php';</script>";
        }
        else{
          echo "<script type='text/javascript'>alert('Request sending failed...');window.location='../your_orders.php';</script>";
        }
      }
    }
  }

  else if(isset($_POST['delete']))
  {
    $id=$_POST['delete'];
    $query = "DELETE FROM notesstore WHERE Notes_ID = '$id'";
    $query_run = mysqli_query($conn, $query);
    if($query_run){
      $query1 = "DELETE FROM report_notesstore WHERE Notes_ID = '$id'";
      $query1_run = mysqli_query($conn, $query1);
      if($query1_run){
        $query2 = "DELETE FROM notes_requests WHERE Notes_ID = '$id'";
        $query2_run = mysqli_query($conn, $query2);
        if($query2_run){
          echo "<script type='text/javascript'>alert('DELETED!!!');window.location='../your_notes.php';</script>";
        }  
        else{
            echo mysqli_error($conn);
        }
      }
    }
  }

    else if(isset($_POST['delete1']))
  {
    $id=$_POST['delete1'];
    $query = "DELETE FROM notesstore WHERE Notes_ID = '$id'";
    $query_run = mysqli_query($conn, $query);
    if($query_run){
      $query1 = "DELETE FROM report_notesstore WHERE Notes_ID = '$id'";
      $query1_run = mysqli_query($conn, $query1);
      if($query1_run){
        $query2 = "DELETE FROM notes_requests WHERE Notes_ID = '$id'";
        $query2_run = mysqli_query($conn, $query2);
        if($query2_run){
          echo "<script type='text/javascript'>alert('DELETED!!!');window.location='../viewnotes.php?dept=All&sem=All';</script>";
        }  
        else{
            echo mysqli_error($conn);
        }
      }
    }
  }

  else if(isset($_POST['uploadreview']))
  {
    $id=$_POST['uploadreview'];
    $review = $_POST['review'];
    $query_run_id = mysqli_query($conn, "SELECT * FROM user WHERE User_Email = '$email'");
    $row_id = mysqli_fetch_assoc($query_run_id);
    $user_id=$row_id['User_ID'];
    $query = "INSERT INTO review_notes (Review, Notes_ID, User_ID) VALUES ('$review', '$id', '$user_id')";
    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
      echo "<script type='text/javascript'>alert('Review has been added!!!');window.location='../your_notes.php';</script>";
    }
  }

  else if(isset($_POST['updatereview']))
  {
    $id=$_POST['updatereview'];
    $review = $_POST['review'];
    $query = "UPDATE review_notes SET Review = '$review' WHERE Review_ID = '$id'";
    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
      echo "<script type='text/javascript'>alert('Review has been added!!!');window.location='../your_notes.php';</script>";
    }
  }

  else if(isset($_POST['deletereview']))
  {
    $id=$_POST['deletereview'];
    $query = "DELETE FROM review_notes WHERE Review_ID = '$id'";
    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
      echo "<script type='text/javascript'>alert('Review has been added!!!');window.location='../your_notes.php';</script>";
    }
  }

  else if(isset($_POST['report']))
  {
    $query_run_id = mysqli_query($conn, "SELECT * FROM user WHERE User_Email = '$email'");
    $row_id = mysqli_fetch_assoc($query_run_id);
    $user_id=$row_id['User_ID'];
    $Notes_ID = $_POST['report'];
    $reason = $_POST['reason'];
    $sql = "INSERT INTO report_notesstore (Notes_ID, Reported_By, Report, Report_Status) VALUES 
                                    ('$Notes_ID', '$user_id', '$reason', 'OPEN')";
    if (mysqli_query($conn, $sql)) 
    {
      echo "<script type='text/javascript'>alert('Reported to Admin!!!');window.location='../your_notes.php';</script>";
    }
    else
    {
        echo mysqli_error($conn);    
    }
    }

  else
  {
    echo "POST is not set!";
  }
}
else
{

}
?>