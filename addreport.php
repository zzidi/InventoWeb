<?php
// Transfer data from form into variables
$xid = $_POST['uid'];
$xname = $_POST['uname'];
$xsec = $_POST['usec'];
$xpic = $_POST['upic'];

// Link the system to the database
$dbcs = mysqli_connect("localhost", "root", "", "accsrsrpt");

if (mysqli_connect_errno()) {
    echo "Failed to open the database" . mysqli_connect_error();
}

// Check if a user with the same name already exists
$sql_check_user = "SELECT * FROM userreport WHERE id = '$xid';";
$result_check_user = mysqli_query($dbcs, $sql_check_user);

if (mysqli_num_rows($result_check_user) > 0) {
    // If a user with the same name exists, show an alert and redirect to registration page
    print '<script>alert("User with this name already exists! Please choose a different name.");</script>';
    print '<script>window.location.assign("userreport.php");</script>';
} else {
    // If the user with the same name doesn't exist, insert the new record
    // Convert the selected accessories (array) into a comma-separated string
    $xaccs = implode(", ", $_POST['uaccs']);
    
    $sql_user = "INSERT INTO `userreport` (`id`, `username`, `accessories`, `Section`, `PICICT`) VALUES ('$xid', '$xname', '$xaccs', '$xsec', '$xpic');";
    $sql_check = mysqli_query($dbcs, $sql_user);

    if ($sql_check) {
        print '<script>alert("User Report Successfully!");</script>';
        print '<script>window.location.assign("userpage.php");</script>';
    } else {
        print '<script>alert("Warning: User Report Failed");</script>';
        print '<script>window.location.assign("userreport.php");</script>';
    }
}

// Close the database connection
mysqli_close($dbcs);
?>
