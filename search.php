<?php
session_start();
if(isset($_SESSION['Email']))
{ ?>
	<html>
<head>
	<title> Search Data</title>
</head>
<style>
	button{
		 	background-color: #4CAF50; 
    		border: none;
    		color: white;
    		padding: 10px 10px;
    		text-align: center;	
    		font-size: 10px;
	}
</style>
<body>
<a href="logout.php">
    <button style="text-align: right;">logout</button>
   </a>
<center>
<form action="search.php" method="POST">
<table>
	<tr>
		<td width="100"> Firstname</td>
		<td><input type="text" name="Firstname" value="<?php echo isset($_POST['Firstname'])?$_POST['Firstname']:''?>"></td>
	</tr>
	<tr>
		<td width="100"></td>
		<td><center><input type="submit" name="submit" value="search"></center></td>
	</tr>
</table>
</form>
</center>
</body>
</html>
<center>
<?php
include ('config.php');
if(isset($_POST['submit']))
{	
	if(isset($_POST['Firstname']))
	{
		$Firstname=$_POST['Firstname'];
		$query=mysql_query("select * from user where Firstname LIKE '%" .$Firstname . "%'");
		echo "<table border = '1'><tr><td>Firstname</td><td>Lastname</td><td>Email</td><td>Password</td><td>Contact</td><td>Gender</td>";
		while($result=mysql_fetch_array($query))
		{	
					echo "<tr><td>".$result['Firstname']."</td>";
					echo "<td>".$result['Lastname']."</td>";
					echo "<td>".$result['Email']."</td>";
					echo "<td>".$result['Password']."</td>";
					echo "<td>".$result['Contact']."</td>";
					echo "<td>".$result['Gender']."</td></tr>";
		}
	}
}
?>
</center>
<?php
}else
{
	header('location:login.php');
}
?>
