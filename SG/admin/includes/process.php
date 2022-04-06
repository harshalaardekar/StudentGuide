<?php
include("../../includes/connect.php");
session_start();

if(isset($_POST['delete']))
{
  $id=$_POST['delete'];
  $query = "DELETE FROM books WHERE Book_ID = '$id'";
  echo '<script type="text/javascript"> ';  

  echo 'var txt;
  if (confirm("Press a button!")) {
    $query_run = mysqli_query($conn, $query);
      if($query_run){
         alert(DELETED!!!);
         window.location=edit_books.php;
      }
      else{
          echo mysqli_error($conn);
      }
    } else {
      txt = 2;
    }';
    echo '</script>';    


    $query_run = mysqli_query($conn, $query);
      if($query_run){
          echo "<script type='text/javascript'>alert('DELETED!!!');window.location='../your_books.php';</script>";
      }
      else{
          echo mysqli_error($conn);
      }

    // $status = "<script>document.write(txt)</script>";
    // echo $status;

    // echo gettype($status);

    // if(!strcmp("<script>document.write(txt)</script>","1")){
    //   echo " delete";
    // }
    // else if(!strcmp("<script>document.write(txt)</script>","2")){
    //   echo " not";
    // }
    // else{
    //   echo "not";
    // }
    // echo 'alert(txt);';



    // echo 'var inputname = prompt("Please enter your name", "");';  
    // echo 'alert(inputname);';  
    


    // echo $status;

   
  }
// if(isset($_POST['submit']))
// {
//   $username = $_POST['username'];
//   $password = $_POST['password']; 

//   $query1="SELECT * FROM user WHERE User_Email='$username' && User_Password='$password'";
//   $data1=mysqli_query($conn, $query1);
//   if($data1->num_rows==1)
//   {
//     $object1 = $data1->fetch_object();
//     $_SESSION['email'] = $username;
//     echo "<script> alert('Login Successful')</script>";
//     header("refresh:0; url=../viewbooks.php?dept=All&sem=All");
//   }
//   else
//   {
//     $query2="SELECT * FROM admin WHERE Admin_Username='$username' && Admin_Password='$password'";
//     $data2=mysqli_query($conn, $query2);
//     if($data2->num_rows==1)
//     {
//       $object2 = $data2->fetch_object();
//       $_SESSION['email'] = $username;
//       echo "<script> alert('Login Successful')</script>";
//       header("refresh:0; url=../../admin/bookstore/available_books.php?dept=All&sem=All");
//     }
//     else
//     {
//       echo "<script> alert('Something went wrong..Incorrect email or password')</script>";
//       header("refresh:0; url=login.php");
//     }
//   }
// }

// else if(isset($_POST['register'])){
//     $fn = $_POST['fn'];
//     $ln = $_POST['ln'];
//     $email = $_POST['email'];
//     $contact = $_POST['contact'];
//     $pass = $_POST['password'];
//     $c_pass = $_POST['c_password'];
//     $status = "Active";
//     if($pass == $c_pass){
//         $query = "SELECT * FROM user WHERE User_Email='$email'";
//         $data = mysqli_query($conn, $query);
//         $total = mysqli_num_rows($data);
//         if(!$total){
//             $query1 = "INSERT INTO user (User_FN, User_LN, User_Email, User_ContactNo, User_Password, User_Status) values ('$fn', '$ln', '$email', '$contact', '$pass', '$status')";
//             $data1 = mysqli_query($conn, $query1);
//             if($data1){
//                 echo "<script>alert( 'Registration Successful' )</script>";
//                 $_SESSION['email'] = $email;
//                 header("refresh:0; url=login.php");
//             }
//             else{
//                 echo "<script>alert('Something went wrong, please register again!')</script>";
//             }
//         }
//         else{
//             echo "<script>alert('Already have an account!')</script>";
//         }
//     }
//     else{
//         echo "<script>alert('Password and confirm password are not matching!')</script>";
//     }
// }

// else if($_SESSION['email']==true)
// {
  

//   $email= $_SESSION['email'];


//   if(isset($_POST['delete']))
//   {
//     $id=$_POST['delete'];
//     $query = "DELETE FROM bookstore WHERE BookStore_Book_ID = '$id'";
//     $query_run = mysqli_query($conn, $query);
//       if($query_run){
//           echo "<script type='text/javascript'>alert('DELETED!!!');window.location='../your_books.php';</script>";
//       }
//       else{
//           echo mysqli_error($conn);
//       }
//   }

//   else if(isset($_POST['request']))
//   {
//     $id=$_POST['request'];
//     $query_run_Book = mysqli_query($conn,"SELECT * FROM bookstore WHERE BookStore_Book_Id = '$id'");
//     $row_Book = mysqli_fetch_assoc($query_run_Book);
//     $query_run_Buyer = mysqli_query($conn,"SELECT * FROM user WHERE User_Email = '$email'");
//     $row_Buyer = mysqli_fetch_assoc($query_run_Buyer);
//     $Seller_ID = $row_Book['BookStore_Seller_ID'];
//     $query_run_Seller = mysqli_query($conn,"SELECT * FROM user WHERE User_ID = '$Seller_ID'");
//     $row_Seller = mysqli_fetch_assoc($query_run_Seller);

//     $Book_ID = $row_Book['BookStore_ISBN_ID'];
//     $query_run_BookName = mysqli_query($conn,"SELECT * FROM books WHERE ISBN = '$Book_ID'");
//     $row_BookName = mysqli_fetch_assoc($query_run_BookName);

//     $subject_Buyer = "Request has been sent to " . $row_Seller["User_FN"]. "  " . $row_Seller["User_LN"]. " on Books4u";
//     $body_Buyer =  "Hi " . $row_Buyer["User_FN"]. ",\n
//     Your request for book on Books4u named as " . $row_BookName["Book_Name"]. " has been sent to " . $row_Seller["User_FN"]. " " . $row_Seller["User_LN"]. " on Books4U.\n
//     You can contact with " . $row_Seller["User_FN"]. " using following details.
//     Name: " . $row_Seller["User_FN"]. "  " . $row_Seller["User_LN"]. "
//     Email: " . $row_Seller["User_Email"]. "
//     Contact: " . $row_Seller["User_ContactNo"]. " \n
//     Regard,
//     Books4U";;
  
//     $subject_Seller = " ". $row_Buyer["User_FN"]. "  " . $row_Buyer["User_LN"]. " has send a request on Books4U.";
//     $body_Seller = "Hi " . $row_Seller["User_FN"]. ",\n
//     " . $row_Buyer["User_FN"]. "  " . $row_Buyer["User_LN"]. " has send a request to buy a book named as " . $row_BookName["Book_Name"]. " on Books4U.\n
//     You can contact with " . $row_Buyer["User_FN"]. " using following details and update respective status on Books4U.
//     Name: " . $row_Buyer["User_FN"]. "  " . $row_Buyer["User_LN"]. "
//     Email: " . $row_Buyer["User_Email"]. "
//     Contact: " . $row_Buyer["User_ContactNo"]. " \n
//     Regard,
//     Books4U";

//     $mail_Seller = $row_Seller['User_Email'];
//     $mail_Buyer = $row_Buyer['User_Email'];
//     $headers = "From: sender email";

//     if(mail($mail_Seller, $subject_Seller, $body_Seller, $headers)) {
//       if(mail($mail_Buyer, $subject_Buyer, $body_Buyer, $headers)){
//         $query_run_Update = mysqli_query($conn,"UPDATE bookstore  SET BookStore_BuyStatus = 'REQUESTED' WHERE BookStore_Book_Id = '$id'");
//         if(query_run_Update){
//           echo "<script type='text/javascript'>alert('Request has been sent!!!');window.location='../your_orders.php';</script>";
//         }
//         else{
//           echo "<script type='text/javascript'>alert('Request sending failed...');window.location='../your_orders.php';</script>";
//         }
//       }
//     }
//   }

//   else if(isset($_POST['resell']))
//   {
//     $id=$_POST['resell'];
//     $query = "UPDATE bookstore SET BookStore_BuyStatus = 'OPEN' WHERE BookStore_Book_ID = '$id'";
//     $query_run = mysqli_query($conn, $query);
//     if($query_run){
//         echo "<script type='text/javascript'>alert('Book is uploaded for selling!!!');window.location='../your_books.php';</script>";
//     }
//     else{
//         echo mysqli_error($conn);
//     }
//   }

//   else if(isset($_POST['sold']))
//   {
//     $id=$_POST['sold'];
//     $query = "UPDATE bookstore SET BookStore_BuyStatus = 'CLOSE' WHERE BookStore_Book_ID = '$id'";
//     $query_run = mysqli_query($conn, $query);
//     if($query_run){
//         echo "<script type='text/javascript'>alert('Book status is updated to sold!!!');window.location='../your_books.php';</script>";
//     }
//     else{
//         echo mysqli_error($conn);
//     }
//   }

//   else if(isset($_POST['report']))
//   {
//     $id=$_POST['report'];
//     $query_run_id = mysqli_query($conn, "SELECT * FROM user WHERE User_Email = '$email'");
//     $row_id = mysqli_fetch_assoc($query_run_id);
//     $user_id=$row_id['User_ID'];
//     $query = "INSERT INTO report_bookstore (Book_ID, Reported_By) values ('$id', '$user_id')";
//     $query_run = mysqli_query($conn, $query);
//     if($query_run)
//     {
//       $query1 = "UPDATE bookstore SET BookStore_BuyStatus = 'REPORTED' WHERE BookStore_Book_ID = '$id'";
//       $query_run1 = mysqli_query($conn, $query1);
//       if($query_run1)
//       {
//         echo "<script type='text/javascript'>alert('Book is reported to admin!!!');window.location='../viewbooks.php?dept=All&sem=All';</script>";
//       }
//       else
//       {
//         echo mysqli_error($conn);
//       }
//     }
//   }

//   else
//   {
//     echo "POST is not set!";
//   }
// }
// else
// {

// }
  ?>