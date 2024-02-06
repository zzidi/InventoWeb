<?php
include "dbconnects.php";

if (isset($_GET['stckid'])) {
    $xid = $_GET['stckid'];

    // Check if the user confirmed the deletion
    if (isset($_GET['confirm']) && $_GET['confirm'] === 'yes') {
        // Construct the SQL queries to delete records from both tables
        $delete_stocks_query = "DELETE FROM stocks WHERE stckid = '$xid';";

        // Execute the delete queries
        $delete_stocks_result = mysqli_query($dbcs, $delete_stocks_query);

        if ($delete_stocks_result) {
            // Deletion was successful
            echo "<script>alert('Records deleted successfully.');</script>";
        } else {
            // Deletion failed
            echo "<script>alert('Failed to delete records.');</script>";
            
            // Log the database error for debugging
            error_log(mysqli_error($dbcs));

            // Handle the error as needed
        }

        // Redirect back to the stock.php page after deletion
        header("Location: stock.php");
        exit;
    } else {
        // Display a confirmation dialog before proceeding with deletion
        echo "<script>
            if (confirm('Are you sure you want to delete this record?')) {
                window.location.href = 'stckdel.php?stckid=$xid&confirm=yes'; // Use 'stckid' here
            } else {
                window.location.href = 'stock.php';
            }
        </script>";
    }
} else {
    // Handle the case where 'stckid' is not provided in the URL
    echo "<script>alert('Invalid request.');</script>";
    header("Location: stock.php");
    exit;
}
?>
