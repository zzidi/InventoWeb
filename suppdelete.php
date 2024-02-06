<?php
include "dbconnects.php";
$xids = $_GET['idsupp'];
$sqldelete = "Delete from `supplier` where `idsupp` = '$xids';";
$chkerr = mysqli_query($dbcs,$sqldelete);
if($chkerr)
{
    echo "<script>alert('One Record Been Deleted');</script>";
    Print '<script>window.location.assign("supaccs.php");</script>';
}
?>