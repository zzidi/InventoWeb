<!DOCTYPE html>
<html>
<head>
	<title>List Reporters</title>
</head>
<body>
 <form name="listUsers" method="" action="">
   <table align="center" border="1" bgcolor="white">
   	 <th>Id</th>
   	 <th>Name</th>   	 
   	 <th>Accessories</th>
   	 <th>Section</th>
   	 <th>PICICT</th>
   	 <th colspan="2">Action</th>
   	 <?php
   	  include "dbconnects.php";
   	  $listusers="Select * from `userreport`;";
   	  $chkerr=mysqli_query($dbcs,$listusers);
   	  if ($chkerr)
   	  {
   	   while ($user=mysqli_fetch_assoc($chkerr))
   	   {
   	  	echo '<tr>
	   	  	    <td>'.$user['id'].'</td>
	   	  		  <td>'.$user['username'].'</td>
	   	  		  <td>'.$user['Accessories'].'</td>
	   	  		  <td>'.$user['Section'].'</td>
	   	  		  <td>'.$user['PICICT'].'</td>
	   	  		  <td><a href="userreport.php?id='.$user['id'].'">Update</a></td>
	   	  		 <td><a href="userdel.php?id='.$user['id'].'">Delete</a></td>
   	  		 </tr>';
   	    }
   	  }
   	 ?>	
   </table>
 </form>
</body>
</html>