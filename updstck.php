<!DOCTYPE html>
<html>
<head>
    <title>Update Supplier Record</title>
    <style>
        body {
            background-color: #4a4a4a;
            color: #fff;
            font-family: Arial, sans-serif;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: grey;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #222;
        }
        td img {
            max-width: 100px;
            max-height: 100px;
        }
        h2 {
            text-align: center;
        }
        button 
        {
            border-radius: 20px;
            border: 1px solid #101010;
            background: #101010;
            color: #ffffff;
            font-size: 12px;
            font-weight: bold;
            padding: 12px 45px;
            letter-spacing: 1px;
            text-transform: uppercase;
            outline: none;
            cursor: pointer;
            transition: transform 0.3s ease-in-out;
            }
        button:hover 
        {
            transform: scale(1.1);
        }
        .back 
        {
            position: absolute;
            top: 10px;
            left: 10px;
        }
    </style>
</head>
<body>
    <div class="back">
        <button onclick="window.location.href = 'stock.php';">Back</button>
    </div>

<?php
include "dbconnects.php";

$xid = $_GET['stckid'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $xaccs=$_POST['Accessories'];
    $xtaken=$_POST['stcktaken'];
    $current = $_POST['current'];


    // Check if the record already exists in the 'stocks' table
    $check_existing_record = "SELECT * FROM stocks WHERE stckid = '$xid'";
    $result_existing_record = mysqli_query($dbcs, $check_existing_record);

    if (mysqli_num_rows($result_existing_record) > 0) {
        // Update the existing record
        $sql_update_stock = "UPDATE stocks SET
            Accessories = '$xaccs',
            stcktaken = stcktaken + $current
            WHERE stckid = '$xid'";

        $chkerr_stock = mysqli_query($dbcs, $sql_update_stock);

        if ($chkerr_stock) {
            echo "<script>alert('Stock has been updated successfully.');</script>";
            print '<script>window.location.assign("stock.php");</script>';
        } else {
            echo "<script>alert('Update failed.');</script>";
            
            // Log the database error for debugging
            error_log(mysqli_error($dbcs));

            // Handle the error as needed
        }
    } else {
        echo "<script>alert('Record not found.');</script>";
        // Handle the case where the record with the given ID doesn't exist
    }
}

// Fetch the current stock data
$liststock = "SELECT * FROM stocks WHERE stckid = $xid;";

$chkerr = mysqli_query($dbcs, $liststock);

if ($chkerr && $row = mysqli_fetch_assoc($chkerr)) {
    $currentaccs = $row['Accessories'];
    $currenttaken = $row['stcktaken'];
}

?>

<h1 class="header">Update Stock: <?php echo $currentaccs; ?></h1>

<form action="updstck.php?stckid=<?php echo $xid; ?>" method="post">
    <table align="center" border="1">
        <!-- Add a hidden input field for Accessories -->
        <input type="hidden" name="Accessories" value="<?php echo $currentaccs; ?>">

        <tr>
            <td>Accessories</td>
            <td><?php echo $currentaccs; ?></td>
        </tr>
        <tr>
            <td>Stock Taken</td>
            <td><?php echo $currenttaken; ?></td>
        </tr>
        <tr>
            <td>Current</td>
            <td><input type="number" name="current" size="30" value="current"></td>
        </tr>

        <tr>
            <td colspan="2"><input type="submit" value="Submit" onclick="return confirm('Are you sure?')"></td>
        </tr>
    </table> 
</form>
</body>
</html>