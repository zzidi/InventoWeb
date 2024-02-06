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
        <button onclick="window.location.href = 'repaired.php';">Back</button>
    </div><br><br>
<?php
include "dbconnects.php";

$xid = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $xstatus = $_POST['Status'];
    $xscreen = $_POST['Screen'];
    $xssd = $_POST['SSD'];
    $xram = $_POST['RAM'];
    $xpowercord = $_POST['Powercord'];
    $xbattery = $_POST['Battery'];

    // Check if the record already exists in the 'status' table
    $check_existing_record = "SELECT * FROM status WHERE id = '$xid'";
    $result_existing_record = mysqli_query($dbcs, $check_existing_record);

    if (mysqli_num_rows($result_existing_record) > 0) {
        // Update the existing record
        $sql_update_status = "UPDATE status SET
            Status = '$xstatus',
            Screen = '$xscreen',
            SSD = '$xssd',
            RAM = '$xram',
            Powercord = '$xpowercord',
            Battery = '$xbattery'
            WHERE id = '$xid';";

        $chkerr_status = mysqli_query($dbcs, $sql_update_status);

        if ($chkerr_status) {
            echo "<script>alert('Status and accessories have been updated successfully.');</script>";
            print '<script>window.location.assign("repaired.php");</script>';
        } else {
            echo "<script>alert('Update failed.');</script>";
            
            // Log the database error for debugging
            error_log(mysqli_error($dbcs));

            // Handle the error as needed
        }
    } else {
        // Insert a new record
        $sql_insert_status = "INSERT INTO status (id, Status, Screen, SSD, RAM, Powercord, Battery)
            VALUES ('$xid', '$xstatus', '$xscreen', '$xssd', '$xram', '$xpowercord', '$xbattery');";

        $chkerr_insert_status = mysqli_query($dbcs, $sql_insert_status);

        if ($chkerr_insert_status) {
            echo "<script>alert('New record has been inserted successfully.');</script>";
            print '<script>window.location.assign("repaired.php");</script>';
        } else {
            echo "<script>alert('Insert failed.');</script>";
            
            // Log the database error for debugging
            error_log(mysqli_error($dbcs));

            // Handle the error as needed
        }
    }
}

// Fetch user data for displaying the current status and accessory fields
$listuser = "SELECT userreport.username, status.Status, status.Screen, status.SSD, status.RAM, status.Powercord, status.Battery
    FROM userreport
    LEFT JOIN status ON userreport.id = status.Id
    WHERE userreport.id = '$xid';";

$chkerr = mysqli_query($dbcs, $listuser);

if ($chkerr && $row = mysqli_fetch_assoc($chkerr)) 
{
    $currentStatus = $row['Status'];
    $currentScreen = $row['Screen'];
    $currentSSD = $row['SSD'];
    $currentRAM = $row['RAM'];
    $currentPowercord = $row['Powercord'];
    $currentBattery = $row['Battery'];
    $username = $row['username'];
}

?>
<h1 class="header">Update Status and Accessories for User: <?php echo $username; ?></h1>
    <form action="accsupd.php?id=<?php echo $xid; ?>" method="post">
        <table align="center" border="1">
            <tr>
                <td>Screen</td>
                <td><input type="number" name="Screen" value="<?= $currentScreen ?>"></td>
            </tr>
            <tr>
                <td>SSD</td>
                <td><input type="number" name="SSD" value="<?= $currentSSD ?>"></td>
            </tr>
            <tr>
                <td>RAM</td>
                <td><input type="number" name="RAM" value="<?= $currentRAM ?>"></td>
            </tr>
            <tr>
                <td>Powercord</td>
                <td><input type="number" name="Powercord" value="<?= $currentPowercord ?>"></td>
            </tr>
            <tr>
                <td>Battery</td>
                <td><input type="number" name="Battery" value="<?= $currentBattery ?>"></td>
            </tr>
            <tr>
                <td>New Status:</td>
                <td>
                    <input type="radio" name="Status" value="Done" <?php if ($currentStatus == 'Done') echo 'checked'; ?>> Done
                    <input type="radio" name="Status" value="In Progress" <?php if ($currentStatus == 'In Progress') echo 'checked'; ?>> In Progress
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Submit" onclick="return confirm('Are you sure?')"></td>
            </tr>
        </table>

    </form>
</body>
</html>