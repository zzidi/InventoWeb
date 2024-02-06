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
        <button onclick="window.location.href = 'supaccs.php';">Back</button>
    </div>
    <h1 class="header">Update Supplier Record</h1>
    <?php 
    
    $xids = $_GET['stckid'];
    include "dbconnects.php";
    $listsupps = "Select * from `supplier` WHERE `idsupp`='$xids';";
    $chkerr = mysqli_query($dbcs, $listsupps);
    $row = mysqli_fetch_assoc($chkerr);
    ?>
<form action="updsupstck.php?idsupp=<?php echo $xids;?>" method="post">
        <table align="center" border="1">
            <tr>
                <td>Supplier</td>
                <td><input type="text" name="suppstck" size="30" value="<?= $row['suppstck'] ?>"></td>
            </tr>
            <tr>
                <td>Warranty</td>
                <td><input type="number" name="warranty" size="30" value="<?= $row['warranty'] ?>"></td>
            </tr>
            <tr>
            <td><label for="MonthYear">Month/Year:</label></td>
            <td><select id="MonthYear" name="MonthYear">
            <option value="Month" <?php echo ($row['MonthYear'] == 'Month') ? 'selected' : ''; ?>>Month</option>
            <option value="Months" <?php echo ($row['MonthYear'] == 'Months') ? 'selected' : ''; ?>>Months</option>
            <option value="Year" <?php echo ($row['MonthYear'] == 'Year') ? 'selected' : ''; ?>>Year</option>
            <option value="Years" <?php echo ($row['MonthYear'] == 'Years') ? 'selected' : ''; ?>>Years</option>
            </select></td>

            </tr>
            <tr>
                <td>Brand</td>
                <td><input type="text" name="brand" size="30" value="<?= $row['brand'] ?>"></td>
            </tr>
            <tr>
            <td><label for="accs">Accessories:</label></td>
            <td>
            <select id="accs" name="accs">
            <option value="Screen" <?php echo ($row['accs'] == 'Screen') ? 'selected' : ''; ?>>Screen</option>
            <option value="SSD" <?php echo ($row['accs'] == 'SSD') ? 'selected' : ''; ?>>SSD</option>
            <option value="RAM" <?php echo ($row['accs'] == 'RAM') ? 'selected' : ''; ?>>RAM</option>
            <option value="Powercord" <?php echo ($row['accs'] == 'Powercord') ? 'selected' : ''; ?>>Powercord</option>
            <option value="Battery" <?php echo ($row['accs'] == 'Battery') ? 'selected' : ''; ?>>Battery</option>
            </select>

            </tr>
            <tr>
                <td>Total</td>
                <td><input type="number" name="total" size="15" value="<?= $row['total'] ?>"></td>
            </tr>
            <tr>
            <td><label for="ict">ICT:</label></td>
            <td><select id="ict" name="ict">
            <option value="En.Azri">En.Azri</option>
            <option value="En.Amir">En.Amir</option>
            <option value="En.Masri">En.Masri</option>
            <option value="Cik.Farah">Cik.Farah</option>
            <option value="En.Omar">En.Omar</option>
            </select></td>

            </tr>

            <tr>
                <td>Date</td>
                <td><input type="date" name="Date" required></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Update" onclick="return confirm('Are you sure?')"></td>
            </tr>
        </table>
    </form>
</body>
</html>
