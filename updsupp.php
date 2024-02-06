<?php
include "dbconnect.php";
$xid = $_GET['id'];
$xname = $_POST['suppname'];
$xloc = $_POST['supploc'];
$xnum = $_POST['suppnum'];
$sqlupd = "Update `supplier` set `suppname` = '$xname', `supplocation` = '$xloc', `suppnum` = '$xnum' where `suppid` = '$xid';";
$chkerr = mysqli_query($dbc,$sqlupd);
if($chkerr)
{
	echo "<script>alert('One Record Had Been Updated');</script>";
	Print '<script>window.location.assign("staffpage.php");</script>';
}
?>