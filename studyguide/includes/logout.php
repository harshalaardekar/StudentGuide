<?php 
    session_start();
    unset($_SESSION['email']);
    if(session_destroy()){
        echo "<script type='text/javascript'>alert('Logged Out!!!');window.location='../index.php';</script>";
    }
?>