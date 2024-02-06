<!DOCTYPE html>
<html>
<head>
    <title>List Reported Page</title>
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
    </style>
</head>
<script>
    function confirmLogout() {
        // Display a confirmation dialog
        var confirmed = confirm("Are you sure you want to Log Out?");
        if (confirmed) {
            // If the user clicks "OK", redirect to index.php
            window.location.href = 'user login.php';
        } else {

            window.location.href = 'userpage.php';
        }
    }
</script>
<body>
    <div class="banner">
    <div class="back">
        <button onclick="confirmLogout()">Log Out</button>
    </div>
	<div class="navbar">
     <ul>
       <li><a href="userreport.php">User Report</a></li>
       <li><a href="userpage.php">List Reported</a></li>
       <li><a href="Repaired.php">List Repaired</a></li>
       <li><a href="stock.php">Stock</a></li>
       <li><a href="supaccs.php">Supplier</a></li>
     </ul>
   </div>
   </div>
    <div class="box">
        <form name="updatedata" method="post" action="updateuser.php">
            <h2>List Report</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Accessories</th>
                    <th>Section</th>
                    <th>PICICT</th>
                    
                </tr>
                <?php
                include "dbconnects.php";
                $listuser = "SELECT * FROM `userreport`;";
                $chkerr = mysqli_query($dbcs, $listuser);
                if ($chkerr) {
                    while ($user = mysqli_fetch_assoc($chkerr)) {
                        echo '<tr>
                            <td>' . $user['id'] . '</td>
                            <td>' . $user['username'] . '</td>
                            <td>' . $user['Accessories'] . '</td>
                            <td>' . $user['Section'] . '</td>
                            <td>' . $user['PICICT'] . '</td>
                        </tr>';
                    }
                }
                ?>
            </table>
        </form>
    </div>
</body>
</html>
