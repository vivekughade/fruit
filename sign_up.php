<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>sign_up</title>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
	<div>
	<h1>Register Your details here</h1>
	<form action="sign_up.php" method="post">
		<hr class="mb-3">
		<label for="Name">Enter the Name</label>
		<input class="form-control" type="text" name="Name" required>

		<label for="Address">Enter the Address</label>
		<input class="form-control" type="text" name="Address" required>

		<label for="mobile">Enter the Mobile number</label>
		<input class="form-control" type="text" name="mobile" required>

		<label for="email">Enter the email address</label>
		<input class="form-control" type="email" name="email" required>

		<label for="password">Enter create your password</label>
		<input class="form-control" type="password" name="password" required>

		<input type="submit" class="btn btn-primary" name="submit" value="sign_up">
	</form>
</div>
<?php
if(isset($_POST['submit']))
{
	echo "User submitted Successfully";
	$Name = $_POST['Name'];
	$Address=$_POST['Address'];
	$mobile=$_POST['mobile'];
	$email=$_POST['email'];
	$password=$_POST['password'];

	$sql= "Insert Into fila (Name,Address,mobile,email,password) Values(?,?,?,?,?)";
	$stmtinsert=$db->prepare($sql);
		$result = $stmtinsert->execute([$Name,$Address,$mobile,$email,$password]);
		
		if($result) {
			$message = "Successfully Saved";
			echo "<script type='text/javascript'>alert('$message');</script>";
			header("Location:/myphpproject2/login.php");

			}
}
?>

</body>
</html>