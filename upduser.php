<?php
include "dbconnects.php";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $xid = $_GET['id'];
    $xname = $_POST['name'];
    $xaccs = implode(', ', $_POST['accessories']); // Convert the array to a comma-separated string
    $xsec = $_POST['section'];
    $xpic = $_POST['picict'];

    // Prepare and execute the SQL query
    $sqlupd = "UPDATE `userreport` SET `name`='$xname', `accessories`='$xaccs', `section`='$xsec', `picict`='$xpic' WHERE `id`='$xid';";
    $chkerr = mysqli_query($dbcs, $sqlupd);

    if ($chkerr) {
        echo "<script>alert('One Record Has Been Updated');</script>";
        print '<script>window.location.assign("userpage.php");</script>';
    } else {
        echo "Error updating data: " . mysqli_error($dbcs);
    }
} else {
    echo "Form not submitted.";
}
?>