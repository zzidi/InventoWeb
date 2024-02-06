<?php
include "dbconnects.php";

if (isset($_GET['id'])) {
    $xid = $_GET['id'];

    // Check if the user confirmed the deletion
    if (isset($_GET['confirm']) && $_GET['confirm'] === 'yes') {
        // Construct the SQL queries to delete records from both tables
        $delete_userreport_query = "DELETE FROM userreport WHERE id = '$xid';";
        $delete_status_query = "DELETE FROM status WHERE Id = '$xid';";

        // Execute the delete queries
        $delete_userreport_result = mysqli_query($dbcs, $delete_userreport_query);
        $delete_status_result = mysqli_query($dbcs, $delete_status_query);

        if ($delete_userreport_result && $delete_status_result) {
            // Deletion was successful
            echo "<script>alert('Records deleted successfully.');</script>";
        } else {
            // Deletion failed
            echo "<script>alert('Failed to delete records.');</script>";
            
            // Log the database error for debugging
            error_log(mysqli_error($dbcs));

            // Handle the error as needed
        }

        // Redirect back to the repaired.php page after deletion
        header("Location: repaired.php");
        exit;
    } else {
        // Display a confirmation dialog before proceeding with deletion
        echo "<script>
            if (confirm('Are you sure you want to delete this record?')) {
                window.location.href = 'accdel.php?id=$xid&confirm=yes';
            } else {
                window.location.href = 'repaired.php';
            }
        </script>";
    }
} else {
    // Handle the case where 'id' is not provided in the URL
    echo "<script>alert('Invalid request.');</script>";
    header("Location: repaired.php");
    exit;
}
?>
