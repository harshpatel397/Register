<?php
include('config.php');

$Firstname=$Lastname=$Email=$Password=$Contact=$Gender="";
$FirstnameError=$LastnameError=$EmailError=$PasswordError=$ContactError=$GenderError="";

if(isset($_POST['submit'])){

	if (empty ( $_POST["Firstname"] ) ) {
	$FirstnameError = "Firstname is required";
 	}else{
    $Firstname = test_input($_POST["Firstname"]);
 	}

 	if ( empty ( $_POST["Lastname"] ) ) {
	$LastnameError = "Lastname is required";
	}else{
		$Lastname=test_input($_POST["Lastname"]);
	}

 	if ( empty ( $_POST["Email"] ) ) {
	$EmailError = "Email is required";
 	}else{
		$Email=test_input($_POST["Email"]);
	}


 	if( empty ($_POST['Password'] ) ){
 	$PasswordError="Password is required";
 	}else{
		$Password=test_input($_POST["Password"]);
	}


 	if( empty ($_POST['Contact'] ) ){
 	$ContactError="Contact is required";
 	}else{
		$Contact=test_input($_POST["Contact"]);
	}

 	if( !isset ($_POST['Gender'] ) ){
 	$GenderError=" select one gender";
 	}else{
		$Gender=test_input($_POST["Gender"]);
	}
 }
 function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
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
			<td><input type="text" name="Firstname" ><div class="error"><?php echo $FirstnameError;?></div></td>
			
		</tr>
		<tr>
			<td width="100"> Lastname </td>
			<td><input type="text" name="Lastname"><div class="error"><?php echo $LastnameError;?></div></td>
		</tr>
		<tr>
			<td width="100"> Email </td>
			<td><input type="text" name="Email"><div class="error"><?php echo $EmailError;?></div></td>
		</tr>
			<td width="100"> Password </td>
			<td><input type="Password" name="Password"><div class="error"><?php echo $PasswordError;?></div></td>
		</tr>
		<tr>
			<td width="100"> Contact </td>
			<td><input type="text" name="Contact" maxlength="10"><div class="error"><?php echo $ContactError;?></div></td>
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
<?php
         echo "<h2>Your given values are as:</h2>";
         echo $Firstname;
         echo "<br>";
         
         echo $Lastname;
         echo "<br>";
         
         echo $Email;
         echo "<br>";
         
         echo $Password;
         echo "<br>";
         
         echo $Contact;
         echo "<br>";

         echo $Gender;
         echo "<br>";
?>
