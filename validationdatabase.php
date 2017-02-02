<?php
include('config.php');

$Firstname=$Lastname=$Email=$Password=$Contact=$Gender="";
$FirstnameError=$LastnameError=$EmailError=$PasswordError=$ContactError=$GenderError="";
$error=array();
if(isset($_POST['submit'])){

	if (empty ( $_POST["Firstname"] ) ) {
	$FirstnameError = "Firstname is required";
	$error[]=$FirstnameError;
 	}else{
    $Firstname = trim($_POST["Firstname"]);
 	}

 	if ( empty ( $_POST["Lastname"] ) ) {
	$LastnameError = "Lastname is required";
	$error[]=$LastnameError;
	}else{
		$Lastname=trim($_POST["Lastname"]);
	}

 	if ( empty ( $_POST["Email"] ) ) {
	$EmailError = "Email is required";
	$error[]=$EmailError;
 	}else{
		$Email=trim($_POST["Email"]);
	}


 	if( empty ($_POST['Password'] ) ){
 	$PasswordError="Password is required";
 	$error[]=$PasswordError;
 	}else{
		$Password=trim($_POST["Password"]);
	}


 	if( empty ($_POST['Contact'] ) ){
 	$ContactError="Contact is required";
 	$error[]=$ContactError;
 	}else{
		$Contact=trim($_POST["Contact"]);
	}

 	if( !isset ($_POST['Gender'] ) ){
 	$GenderError=" select one gender";
 	$error[]=$GenderError;
 	}else{
		$Gender=trim($_POST["Gender"]);
	}
	if(isset($error) && empty($error))
	{
	 $sql="insert into user(Firstname,Lastname,Email,Password,Contact,Gender)values('$Firstname','$Lastname','$Email','$Password','$Contact','$Gender')";
	  $result=mysql_query($sql,$link);
	   if(!$result){
		die('could not to data:'.mysql_error());	
	}
	mysql_close($link);
	}
	else{
			echo "all filed are required";
		}
}
?>
<html>
<head>
	<title>validation demo</title>
</head>
<style>
	.error{
		color: red;
	}
</style>
<body>
<center>
	<h1> Add User Page </h1>
	<form action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data"  method="post">
	<table>
		<tr>
			<td width="100"> Firstname </td>
			<td><input type="text" name="Firstname" value="<?php  echo $Firstname ?>" ><div class="error"><?php echo $FirstnameError;?></div></td>
			
		</tr>
		<tr>
			<td width="100"> Lastname </td>
			<td><input type="text" name="Lastname" value="<?php  echo $Lastname ?>" ><div class="error"><?php echo $LastnameError;?></div></td>
		</tr>
		<tr>
			<td width="100"> Email </td>
			<td><input type="text" name="Email" value="<?php  echo $Email ?>" ><div class="error"><?php echo $EmailError;?></div></td>
		</tr>
			<td width="100"> Password </td>
			<td><input type="Password" name="Password" value="<?php  echo $Password ?>" ><div class="error"><?php echo $PasswordError;?></div></td>
		</tr>
		<tr>
			<td width="100"> Contact </td>
			<td><input type="text" name="Contact" maxlength="10" value="<?php  echo $Contact ?>" ><div class="error"><?php echo $ContactError;?></div></td>
		</tr>
		<tr>
			<td width="100">Gender</td>
			<td>
				<input type="radio" name="Gender" value="m" <?php if (isset($Gender) && $Gender == "m") echo "checked"; ?>>Male
				<input type="radio" name="Gender" value="f" <?php if (isset($Gender) && $Gender == "f") echo "checked"; ?>>Female
				<div class="error"><?php echo $GenderError;?></div>
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
</body>
</html>

