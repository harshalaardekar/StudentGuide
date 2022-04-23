<?php
// include("../../includes/connect.php");
session_start();
if(isset($_POST['register']))
{
  $fn = $_POST['fn'];
  $ln = $_POST['ln'];
  $email = $_POST['email'];
  $contact = $_POST['contact'];
  $pass = $_POST['password'];
  $c_pass = $_POST['c_password'];
  $status = "Active";
  if($pass == $c_pass)
  {
    $otp = rand(1000,9999);   //generating 4-digit otp
    $to = $email;
    $sub = "Your OTP for Books4u";
    $msg =  "Hi " . $fn . ", " . $ln . "\n
    Your One Time PIN is: " . $otp . "
    
    *********************************************

    This is an auto generated mail. Do not reply. \n
    Regard,
    Books4U";
    $headers = "From: sender email";
    if(mail($to, $sub, $msg, $headers)) 
    {
      $_SESSION['superhero'] = $otp;
      $_SESSION['fn'] = $fn;
      $_SESSION['ln'] = $ln;
      $_SESSION['mail'] = $email;
      $_SESSION['contact'] = $contact;
      $_SESSION['pass'] = $pass;
      echo "<script>alert('OTP sent successfully on registered contact number and email ID.')</script>";   
      echo "<script>window.location.href='../otp.php';</script>";   
    }
    else
    {
      echo "<script>alert('OTP not sent!, Please try again')</script>";
    }
  }
  else
  {
    echo "<script>alert('Password and confirm password are not matching!')</script>";
    echo "<script>window.location.href='../register.php';</script>";
  }
}
else
{
  echo "<script>window.location.href='../index.php';</script>";
}
?>