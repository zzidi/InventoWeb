<?php

// Transfer data from form into variables
$xids = $_POST['idsupp'];
$xsupp = $_POST['suppstck'];
$xwarr = $_POST['warranty'];
$xmonyea = $_POST['MonthYear'];
$xbrand = $_POST['brand'];
$xaccs = $_POST['accs'];
$xtotal  = $_POST['total'];
$xict = $_POST['ict'];
$xdate = $_POST['Date'];

// Link the system to the database
$dbcs = mysqli_connect("localhost", "root", "", "accsrsrpt");

// Check the connection
if (!$dbcs) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if a user with the same email already exists
$sql_check_supp = "SELECT * FROM `supplier` WHERE idsupp = '$xids';";
$result_check_supp = mysqli_query($dbcs, $sql_check_supp);

if (!$result_check_supp) {
    die("Query failed: " . mysqli_error($dbcs));
}

if (mysqli_num_rows($result_check_supp) > 0) {
    // If a supp with the same name exists, show an alert and redirect to registration page
    print '<script>alert("supplier with this name already exists! Please choose a different name.");</script>';
    print '<script>window.location.assign("supaccs.php");</script>';
} else {
    // If the user with the same email doesn't exist, insert the new record
    $sql_supp = "INSERT INTO `supplier` (`idsupp`, `suppstck`, `warranty`, `MonthYear`, `brand`, `accs`, `total`, `ICT`, `Date`) VALUES ('$xids', '$xsupp', '$xwarr', '$xmonyea', '$xbrand', '$xaccs', '$xtotal', '$xict', '$xdate');";
    $sql_check = mysqli_query($dbcs, $sql_supp);

    if ($sql_check) {
        print '<script>alert("New supplier Successfully!");</script>';
        print '<script>window.location.assign("supaccs.php");</script>';
    } else {
        print '<script>alert("Warning: supplier registration Failed");</script>';
        print '<script>window.location.assign("addsupstck.php");</script>';
    }
}

// Close the database connection
mysqli_close($dbcs);
?>
