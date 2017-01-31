<?php
include('config.php');
session_start(); 
if(isset($_POST['submit'])){
$Email = $_POST['Email'];
$Password = $_POST['Password'];
if(!empty($_POST['Email']))
	$query = mysql_query("SELECT *  FROM user where Email = '$_POST[Email]' AND Password = '$_POST[Password]'");
	$row = mysql_fetch_array($query);
	if(!empty($row['Email']) AND !empty($row['Password']))
	{
		$_SESSION['Email'] = $row['Password'];
		echo "SUCCESSFULLY LOGIN TO PAGE...";
		redirect_to("index.php");
	}
	else
	{
		echo "SORRY YOU ENTERD WRONG  AND PASSWORD";
	}
}

if(isset($_POST['sub'])){
	redirect_to('add.php');
}

function redirect_to($location = NULL ) 
{
  if($location != NULL) {
    header("Location: {$location}");
    exit;
}
}
?>
<html>
<head>
	<title></title>
</head>
<style>
.abc{
	 background-color: #4CAF50; 
    border: none;
    color: white;
    padding: 10px 10px;
    text-align: center;	
    font-size: 10px;
}
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
<center>
	<a href="index.php">
    <button style="text-align:right;">Home</button>
   	</a>
   	</center>
<center>
<h1> Login Page </h1>
<form action="login.php" method="post">
<table>
	<tr>
		<td width="100">Email</td>
		<td><input type="text" name="Email" value="" ></td>
	</tr>
	<tr>
		<td width="100"> Password </td>
		<td><input type="Password" name="Password" value="" ></td>
	</tr>
	<tr>
		<td width="100"></td>
		<td><input type="submit" name="submit" value="Login" class="abc">
		<input type="submit"  name="sub" value="Sign up" class="abc"></td>
	</tr>
</table>
</form>
</center>
</body>
</html>