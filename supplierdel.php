<!DOCTYPE html>
<html>
<head>
    <title>Delete Supplier Record</title>
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
        <button onclick="window.location.href = 'supaccs.php';">Back</button>
    </div>
    <h1 class="header">Delete Supplier Record</h1>
    <?php
    error_reporting(0);
    $xids = $_GET['stckid'];
    include "dbconnects.php";
    $listsupps = "Select * from `supplier` WHERE `idsupp`='$xids';";
    $chkerr = mysqli_query($dbcs, $listsupps);
    $row = mysqli_fetch_assoc($chkerr);
    ?>
    <form action="suppdelete.php?idsupp=<?php echo $xids;?>" method="post">
        <table align="center" border="1">
            <tr>
                <td>Supplier</td>
                <td><input type="text" name="suppstck" size="30" value="<?= $row['suppstck'] ?>" disabled></td>
            </tr>
            <tr>
                <td>Warranty</td>
                <td><input type="number" name="warranty" size="30" value="<?= $row['warranty'] ?>" disabled></td>
            </tr>
            <tr>
            <td><label for="MonthYear">Month/Year:</label></td>
            <td><select id="MonthYear" name="MonthYear">
            <option value="Month" <?php echo ($row['MonthYear'] == 'Month') ? 'selected' : ''; ?>disabled>Month</option>
            <option value="Months" <?php echo ($row['MonthYear'] == 'Months') ? 'selected' : ''; ?>disabled>Months</option>
            <option value="Year" <?php echo ($row['MonthYear'] == 'Year') ? 'selected' : ''; ?>disabled>Year</option>
            <option value="Years" <?php echo ($row['MonthYear'] == 'Years') ? 'selected' : ''; ?>disabled>Years</option>
            </select></td>

            </tr>
            <tr>
                <td>Brand</td>
                <td><input type="text" name="brand" size="30" value="<?= $row['brand'] ?>" disabled></td>
            </tr>
            <tr>
            <td><label for="accs">Accessories:</label></td>
            <td>
            <select id="accs" name="accs">
            <option value="Screen" <?php echo ($row['accs'] == 'Screen') ? 'selected' : ''; ?>disabled>Screen</option>
            <option value="SSD" <?php echo ($row['accs'] == 'SSD') ? 'selected' : ''; ?>disabled>SSD</option>
            <option value="RAM" <?php echo ($row['accs'] == 'RAM') ? 'selected' : ''; ?>disabled>RAM</option>
            <option value="Powercord" <?php echo ($row['accs'] == 'Powercord') ? 'selected' : ''; ?>disabled>Powercord</option>
            <option value="Battery" <?php echo ($row['accs'] == 'Battery') ? 'selected' : ''; ?>disabled>Battery</option>
            </select>

            </tr>
            <tr>
                <td>Total</td>
                <td><input type="number" name="total" size="15" value="<?= $row['total'] ?>"disabled></td>
            </tr>
            <tr>
            <td><label for="ict">ICT:</label></td>
            <td><select id="ict" name="ict">
            <option value="En.Azri" <?php echo ($row['ict'] == 'En.Azri') ? 'selected' : ''; ?>disabled>En.Azri</option>
            <option value="En.Amir" <?php echo ($row['ict'] == 'En.Amir') ? 'selected' : ''; ?>disabled>En.Amir</option>
            <option value="En.Masri" <?php echo ($row['ict'] == 'En.Masri') ? 'selected' : ''; ?>disabled>En.Masri</option>
            <option value="Cik.Farah" <?php echo ($row['ict'] == 'En.Farah') ? 'selected' : ''; ?>disabled>Cik.Farah</option>
            <option value="En.Omar" <?php echo ($row['ict'] == 'En.Omar') ? 'selected' : ''; ?>disabled>En.Omar</option>
            </select></td>

            </tr>

            <tr>
                <td>Date</td>
                <td><input type="date" name="Date" value="<?= $row['date'] ?>" disabled></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Delete" onclick="return confirm('Are you sure?')"></td>
            </tr>
        </table>
    </form>
</body>
</html>
