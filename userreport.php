<!DOCTYPE html>
<html>
<head>
    <title>User Report Page</title>
     <style>
        body {
            background-color: #4a4a4a;
            color: #fff;
            font-family: Arial, sans-serif;
        }
        .header {
            text-align: center;
            margin-bottom: 100px;
            position: relative;
            top: 50px;
        }
        .box {
            position: absolute;
            top:150px;
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
<body>
<script>
    function confirmLogout() {
        // Display a confirmation dialog
        var confirmed = confirm("Are you sure you want to Log Out?");
        if (confirmed) {
            // If the user clicks "OK", redirect to login page
            window.location.href = 'user login.php';
        } else {

            window.location.href = 'userreport.php';
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
               <li><a href="repaired.php">List Repaired</a></li>
               <li><a href="stock.php">Stock</a></li>
               <li><a href="supaccs.php">Supplier</a></li>
            </ul>
        </div>
    </div><br>
    <h1 class="header">Update User Report</h1>

    <div class="box">
    <form action="addreport.php" method="post">
        <table align="center" border="1">
            <tr>
                <td>No. :</td>
                <td><input type="text" name="uid" disabled></td>
            </tr>
            <tr>
                <td>User:</td>
                <td><input type="text" name="uname" size= "50"></td>
            </tr>
            <tr>
            <td>Accessories:</td>
            <td><input type="checkbox" name="uaccs[]" value="Screen"> Screen
            <input type="checkbox" name="uaccs[]" value="SSD"> SSD
            <input type="checkbox" name="uaccs[]" value="RAM"> Ram
            <input type="checkbox" name="uaccs[]" value="Powercord"> Powercord
            <input type="checkbox" name="uaccs[]" value="Battery"> Battery
            </td>
            </tr>
            <tr>
            <td><label for="section">Section:</label></td>
            <td><input type="text" id="section" name="usec"></td>
            </tr>
            <tr>
            <td><label for="PICICT">ICT:</label></td>
            <td><select id="picict" name="upic">
            <option value="En.Azri">En.Azri</option>
            <option value="En.Amir">En.Amir</option>
            <option value="En.Masri">En.Masri</option>
            <option value="Cik.Farah">Cik.Farah</option>
            <option value="En.Omar">En.Omar</option>
            </select></td>

            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Submit" onclick="return confirm('Are you sure?')"></td>
            </tr>
        </table>
    </form>
    </div>
</body>
</html>
