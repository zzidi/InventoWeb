<?php
session_start();
$xemail = $_POST['femail'];
$xpass = $_POST['fpass'];
include "dbconnects.php";

$chkuser = "SELECT * FROM `userlogin` WHERE `email` = '$xemail'";
$chkerr = mysqli_query($dbcs, $chkuser);
$getrow = mysqli_num_rows($chkerr);

if ($getrow < 1) {
  // If the email doesn't exist in the database, redirect to register and display an error message
  echo "<script>alert('Please Sign Up First');</script>";
  echo "<script>window.location.assign('register.php');</script>";
} else {
  $getdata = mysqli_fetch_array($chkerr);
  $storedPass = $getdata['password'];

  if ($storedPass !== $xpass) {
    // If the entered password doesn't match the stored password, display an error message
    echo "<script>alert('Incorrect Password, Please try again.');</script>";
    echo "<script>window.location.assign('user login.php');</script>";
  } else {
    // Successful login, you can set session variables or redirect to a welcome page here
    // For example: $_SESSION['user_id'] = $getdata['ID'];
    // Redirect to a welcome page
    echo "<script>window.location.assign('userreport.php');</script>";
  }
}
?>
