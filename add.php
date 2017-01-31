<center>
<?php
include('config.php');
if(isset($_POST['submit'])){ // insert data  
	$Firstname=trim($_POST['Firstname']);
	$Lastname=trim($_POST['Lastname']);
	$Email=trim($_POST['Email']);
	$Password=trim($_POST['Password']);
	$Contact=trim($_POST['Contact']);
	$Gender=trim($_POST['Gender']);
	if(isset($_POST['hidden_id'])) // update data and  id throw 
	{
		$sql="update user set Firstname='$Firstname', Lastname='$Lastname', Email='$Email',Password='$Password',Contact='$Contact',Gender='$Gender' where ID = '$_POST[hidden_id]'";
	}
	else
	{
		$sql="insert into user(Firstname,Lastname,Email,Password,Contact,Gender)values('$Firstname','$Lastname','$Email','$Password','$Contact','$Gender')";	
	}
	
	$result=mysql_query($sql,$link);
	if(!$result){
		die('could not to data:'.mysql_error());	
	}
	mysql_close($link);
}
if(isset($_GET['id']))// update data 
{ 
	$Id=$_GET['id'];
	$result=mysql_query("select * from user where ID ='$Id'");
	$resultEdit=mysql_fetch_array($result);	
}
if(isset($_GET['delete_id'])) // delete data 
{
	$id=$_GET['delete_id'];
	$result=mysql_query("delete from user where ID ='$id'");
	if(!$result)
	{

	}
}
?>
</center>
<html>
<head>
<title>Register demo</title>
</head>
<style>
button{
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 10px 10px;
  -  text-align: center;
    font-size: 10px;
}
</style>
<body>
<center>
	<a href="login.php">
    <button style="text-align:right;">login</button>
   	</a>
   	</center>
<center>
	<h1> Add User Page </h1>
	<form action ="add.php" method="post">
	<?php if(isset($_GET['id']) && $_GET['id'] != ""){?>
	<input type="hidden" name="hidden_id" value="<?php echo $_GET['id'];?>">
	<?php }?>
	<table>
		<tr>
			<td width="100"> Firstname </td>
			<td><input type="text" name="Firstname" value="<?php echo (isset($resultEdit['Firstname'])) ? $resultEdit['Firstname'] : "" ?>" required></td>
		</tr>
		<tr>
			<td width="100"> Lastname </td>
			<td><input type="text" name="Lastname" value="<?php echo (isset($resultEdit['Lastname'])) ? $resultEdit['Lastname'] : "" ?>" required></td>
		</tr>
		<tr>
			<td width="100"> Email </td>
			<td><input type="text" name="Email" value="<?php echo (isset($resultEdit['Email'])) ? $resultEdit['Email'] : "" ?>" required></td>
		</tr>
			<td width="100"> Password </td>
			<td><input type="Password" name="Password" value="<?php echo (isset($resultEdit['Password'])) ? $resultEdit['Password'] : "" ?>" required></td>
		</tr>
		<tr>
			<td width="100"> Contact </td>
			<td><input type="text" name="Contact" maxlength="10" value="<?php echo (isset($resultEdit['Contact'])) ? $resultEdit['Contact'] : "" ?>" required></td>
		</tr>
		<tr>
			<td width="100">Gender</td>
			<td>
				Male <input type="radio" name="Gender" value="m"<?php echo(isset($resultEdit['Gender']) && $resultEdit['Gender']=="m") ? "checked" : "";?>  required>
				Female<input type="radio" name="Gender" value="f"<?php echo(isset($resultEdit['Gender'])&& $resultEdit['Gender']=="f") ? "checked" :" ";?> required>
			</td>
		</tr>
		<tr>
			<td width="100"></td>
			<td><input type="submit" name="submit" value="add to data">
			<input type="submit"  name="reset" value="clear"></td>
		</tr>
	</table>
	</form>
	</center>
</body>
</html>
<center>
<?php    // all data in list
include('config.php');
$result=mysql_query("select * from user");
echo "<table border = '1'><tr><td>Firstname</td><td>Lastname</td><td>Email</td><td>Password</td><td>Contact</td><td>Gender</td><td> </td><td> </td>";
while($result1=mysql_fetch_array($result))
{	
echo "<tr><td>".$result1['Firstname']."</td>";
echo "<td>".$result1['Lastname']."</td>";
echo "<td>".$result1['Email']."</td>";
echo "<td>".$result1['Password']."</td>";
echo "<td>".$result1['Contact']."</td>";
echo "<td>".$result1['Gender']."</td>";
echo "<td><a href='add.php?id=".$result1['ID']."'>Edit</a></td>";
echo "<td><a onclick='return confirm(\"Are you sure to delete it?\");' href='add.php?delete_id=".$result1['ID']."'>Delete</a></td><tr>";
}	
?>
</table>
</center>
