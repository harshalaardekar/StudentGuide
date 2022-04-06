<?php
include("connect.php");
if(isset($_POST['submit']))
{
  $username = $_POST['username'];
  $password = $_POST['password']; 

  $query1="SELECT * FROM user WHERE User_Email='$username' && User_Password='$password'";
  $data1=mysqli_query($conn, $query1);
  if($data1->num_rows==1)
  {
    // session_start();
    $object1 = $data1->fetch_object();
    $_SESSION['email'] = $object1->User_Email;
    echo "<script> alert('Login Successful')</script>";
    header("refresh:0; url=../index.php");
  }
  else
  {
    echo "<script> alert('Something went wrong..Incorrect email or password')</script>";
    header("refresh:0; url=login.php");
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

 else
{
  echo "POST is not set!";
}
?>