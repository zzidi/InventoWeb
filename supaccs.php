<!DOCTYPE html>
<html>
<head>
    <title>Supplier Page</title>
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
            width: 1200px;
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
        <h2>Supplier List</h2>
 <table>
    <tr>
        <th>Supplier</th>
        <th>Warranty</th>
        <th>Month/Year</th>
        <th>Brand</th>
        <th>Accessories</th>
        <th>Total</th>
        <th>ICT</th>
        <th>Date</th>
        <th><a class="btn" href="frmaddsupp.php">Add Supplier</a></th>
    </tr>
<?php
include "dbconnects.php";
$listsupp = "SELECT * FROM `supplier` ";


$chkerr = mysqli_query($dbcs, $listsupp);
if ($chkerr) {
    while ($supp = mysqli_fetch_assoc($chkerr)) {
        echo '<tr>
                <td>' . $supp['suppstck'] . '</td>
                <td>' . $supp['warranty'] . '</td>
                <td>' . $supp['MonthYear'] . '</td>
                <td>' . $supp['brand'] . '</td>
                <td>' . $supp['accs'] . '</td>
                <td>' . $supp['total'] . '</td>
                <td>' . $supp['ICT'] . '</td>
                <td>' . $supp['Date'] . '</td>
                <td>
                    <a class="btn btn-update" href="updsupplier.php?stckid=' . $supp['idsupp'] . '">Update</a>
                    <a class="btn btn-delete" href="supplierdel.php?stckid=' . $supp['idsupp'] . '">Delete</a>
                </td>
            </tr>';
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
            window.location.href = 'suppaccs.php';
        }
    }
</script>
</html>