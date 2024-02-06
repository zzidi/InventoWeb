<!DOCTYPE html>
<html>
<head>
    <title>Update Customer Record</title>
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
        <button onclick="window.location.href = 'staffpage.php';">Back</button>
    </div>
    <h1 class="header">Update User Record</h1>
    <?php
    include "dbconnects.php";
    $xcustid = $_GET['username'];
    $listuser = "SELECT * FROM `userreport` WHERE `username`='$xusername';";
    $chkerr = mysqli_query($dbcs, $listuser);
    $row = mysqli_fetch_assoc($chkerr);
    ?>
    <form action="updcust.php?username=<?php echo $xusername; ?>" method="post">
        <table align="center" border="1">
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" value="<?= $row['username'] ?>"></td>
            </tr>
            <tr>
                <td>Accessories</td>
                <td><input type="text" name="accssrs" value="<?= $row['accssrs'] ?>"></td>
            </tr>
            <tr>
                <td>Section</td>
                <td><input type="text" name="section" value="<?= $row['section'] ?>"></td>
            </tr>
            <tr>
                <td>PICICT</td>
                <td><input type="text" name="PICICT" value="<?= $row['PICICT'] ?>"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Update" onclick="return confirm('Are you sure?')"></td>
            </tr>
        </table>
    </form>
</body>
</html>