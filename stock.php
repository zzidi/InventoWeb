<!DOCTYPE html>
<html>
<head>
    <title>Stock Page</title>
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
        .box {
			position: absolute;
			top:100px;
            background-color: #333;
            padding: 10px;
            float: left;
            width: 1250px;
            margin-right: 20px;
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
       
        h1, h2 {
            text-align: center;
        }

        .btn {
            display: inline-block;
            background-color: #f63e4e;
            color: #fff;
            padding: 6px 12px;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #e4313f;
        }

        .btn-delete {
            background-color: #f63e4e;
        }

        .btn-update {
            background-color: #00ff00;
        }

        .btn-history {
            background-color: #007bff;
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
		.navbar {
			position: absolute;
			top: 30px;
			right: 20px;
			display: flex;
			align-items: center;
			justify-content: space-between;
			margin: auto;
		}
		.navbar ul {
		  list-style-type: none;
		  margin: 0;
		  padding: 0;
		  display: flex;
		  text-decoration: none;
		}

		.navbar li {
		  margin-bottom: 7px;
		  margin-right: 20px;
		  color: #ffffff;
		  position: relative;
		}

		.navbar li a {
		  display: flex;
		  text-decoration: none;
		  color: #ffffff;
		  text-transform: uppercase;
		}

		.navbar li::after {
		  content: '';
		  height: 3px;
		  width: 0;
		  background: #fff;
		  position: absolute;
		  left: 0;
		  bottom: -10px;
		  transition: 0.5s;
		}

		.navbar li:hover::after {
		  width: 100%;
		}
		.banner {
		  width: 100%;
		  min-height: 100vh;
		  position: absolute;
		}
		.h2{
			margin-right:200px;
		}
    </style>
	</head>
	<body>
    <div class="banner">
    <div class="back">
        <button onclick="confirmLogout()">Log Out</button>
    </div>
	<div class="navbar">
     <ul>
       <li><a href="userreport.php">User Report</a></li>
       <li><a href="userpage.php">List Reported</a></li>
       <li><a href="repaired.php">List Repaired</a></li>
       <li><a href="stock.php">Stock</a></li>
       <li><a href="supaccs.php">Supplier</a></li>
     </ul>
   </div>
   </div>
    <div class="box">
        <h2>List Stocks</h2>
 <table>
    <tr>
        <th>Accessories</th>
        <th>Total current</th>
        <th>Stock Taken</th>
        <th>Stock In</th>
    </tr>
<?php
include "dbconnects.php";
$liststock = "SELECT * FROM stocks
LEFT JOIN status ON stocks.stckid = status.Id
UNION
SELECT * FROM stocks
RIGHT JOIN status ON stocks.stckid = status.Id;";

// Initialize an associative array to store the accessories and their corresponding columns
$accessoryColumns = [
    'Screen' => 'Screen',
    'SSD' => 'SSD',
    'RAM' => 'RAM',
    'Battery' => 'Battery',
    'Powercord' => 'Powercord'
];

// Initialize an associative array to store the totals for each accessory
$accessoryTotals = array_fill_keys(array_values($accessoryColumns), 0);

$chkerr = mysqli_query($dbcs, $liststock);
if ($chkerr) {
    while ($stck = mysqli_fetch_assoc($chkerr)) {
        echo '<tr>
                <td>' . $stck['Accessories'] . '</td>
                <td>' . $stck['Totalcurrent'] . '</td>
                <td>' . $stck['stcktaken'] . '</td>
                <td>' . $stck['stckin'] . '</td>
                <td>
                    <a class="btn btn-update" href="updstck.php?stckid=' . $stck['stckid'] . '">Update</a>
                    <a class="btn btn-delete" href="stckdel.php?stckid=' . $stck['stckid'] . '">Delete</a>
                </td>
            </tr>';
        foreach ($accessoryColumns as $accessory => $column) {
            $accessoryTotals[$column] += $stck[$column];
        }
    }

    // Update the Totalcurrent column in the stocks table for each accessory
    foreach ($accessoryColumns as $accessory => $column) {
        $updateQuery = "UPDATE stocks SET Totalcurrent = '{$accessoryTotals[$column]}' WHERE Accessories ='$accessory';";
        $updateResult = mysqli_query($dbcs, $updateQuery);
    }

    // Update the stckin column in the stocks table for each accessory
    foreach ($accessoryColumns as $accessory => $column) {
        $updateQuery = "UPDATE stocks SET stckin = (stcktaken - {$accessoryTotals[$column]}) WHERE Accessories = '$accessory';";
        $updateResult = mysqli_query($dbcs, $updateQuery);
    }
}
?>
</table>
    </div>
</body>
<script>
    function confirmLogout() {
        // Display a confirmation dialog
        var confirmed = confirm("Are you sure you want to Log Out?");
        if (confirmed) {
            // If the user clicks "OK", redirect to index.php
            window.location.href = 'user login.php';
        } else {
            // If the user clicks "Cancel", stay on mainpage.php
            // You can remove the else block if you want to do nothing on "Cancel"
            window.location.href = 'stock.php';
        }
    }
</script>
</html>