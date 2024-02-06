<?php
    include "dbconnects.php";
    $xcustid = $_GET['custid'];
    $listuser = "SELECT * FROM `userreport` WHERE `username`='$xusername';";
    $chkerr = mysqli_query($dbcs, $listuser);
    $row = mysqli_fetch_assoc($chkerr);

    if (isset($_POST['username']) && isset($_POST['accssrs']) && isset($_POST['section']) && isset($_POST['PICICT'])) {
        $xcustname = $_POST['username'];
        $xcustpass = $_POST['accssrs'];
        $xcustadd = $_POST['section'];
        $xcustpnum = $_POST['PICICT'];

        $sqlupd = "UPDATE `userreport` SET `username`='$xusername', `accssrs`='$xaccssrs', `section`='$xsection', `PICICT`='$xPICICT' WHERE `username`='$xusername';";
        $chkerr = mysqli_query($dbcs, $sqlupd);

        if ($chkerr) {
            echo "<script>alert('One Record Has Been Updated');</script>";
            echo '<script>window.location.assign("staffpage.php");</script>';
            exit;
        } else {
            echo "<script>alert('Warning: No Record Has Been Updated');</script>";
            echo '<script>window.location.assign("staffpage.php");</script>';
            exit;
        }
    }
    ?>