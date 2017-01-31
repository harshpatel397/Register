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
.current{
	color:red;
}
</style>
<body>
<center>
<center>
	<h1> Register Page </h1>
	<form action ="demo.php" method="post">
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
<html>
<head>
<style >
#content
{
	width: 650px;
	margin: 0 auto;
	font-family:Arial, Helvetica, sans-serif;
}
.page
{
float: right;
margin: 0;
padding: 0;
}
.page li
{
	list-style: none;
	display:inline-block;
}
.page li a, .current
{
display: block;
padding: 3px;
}
.button
{
padding: 5px 15px;
text-decoration: none;
background: #333;
color: #F3F3F3;
float: left;
}
</style>
</head>
<body>
<div id="content">
<?php
include('config.php');
$start=0;
$limit=3;
if(isset($_GET['page']))
{	
	$page=$_GET['page'];                              
    $start = ($page - 1) * $limit; 
}
else 
	{
		$page=1;
	}
$query=mysql_query("select * from user LIMIT $start, $limit");
echo "<table border = '1'><tr><td>Firstname</td><td>Lastname</td><td>Email</td><td>Password</td><td>Contact</td><td>Gender</td><td> </td><td> </td>";
while($query2=mysql_fetch_array($query))
{
	echo "<tr><td>".$query2['Firstname']."</td>";
	echo "<td>".$query2['Lastname']."</td>";
	echo "<td>".$query2['Email']."</td>";
	echo "<td>".$query2['Password']."</td>";
	echo "<td>".$query2['Contact']."</td>";
	echo "<td>".$query2['Gender']."</td>";
	echo "<td><a href='demo.php?id=".$query2['ID']."'>Edit</a></td>";
	echo "<td><a href='demo.php?delete_id=".$query2['ID']."'>Delete</a></td><tr>";
}
echo "</table>";	
$rows=mysql_query("select * from user");
$total=ceil($rows/$limit);
if($page>1)
{
	echo "<a href='?page=".($page-1)."' class='button'>PREV</a>";
}
if($page!=$total)
{
	echo "<a href='?page=".($page+1)."' class='button'>NEXT</a>";
}
echo "<ul class='page'>";
		for($i=1;$i<=$total;$i++)

		{
			if($i==$page) { echo "<li class='current'>".$i."</li>"; }
			
			else { echo "<li><a href='?page=".$i."'>".$i."</a></li>"; }

		}
echo "</ul>";
?>
</div>
</body>
</html>
</table>
</center>
