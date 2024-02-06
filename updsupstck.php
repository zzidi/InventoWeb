<?php
include "dbconnects.php";
$xids = $_GET['idsupp'];
$xdate = $_POST['Date'];
$xsupp = $_POST['suppstck'];
$xwarr = $_POST['warranty'];
$xmonyea = $_POST['MonthYear'];
$xbrand = $_POST['brand'];
$xaccs = $_POST['accs'];
$xtotal  = $_POST['total'];
$xict = $_POST['ict'];
$sqlupdstck = "Update `supplier` set `suppstck` = '$xsupp', `warranty` = '$xwarr', `MonthYear` = '$xmonyea', `brand` = '$xbrand', `accs` = '$xaccs', `total` = '$xtotal', `ict` = '$xict', `Date` = '$xdate' where `idsupp` = '$xids';";
$chkerr = mysqli_query($dbcs,$sqlupdstck);
if($chkerr)
{
	echo "<script>alert('One Record Had Been Updated');</script>";
	Print '<script>window.location.assign("supaccs.php");</script>';
}
?>