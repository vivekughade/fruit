
<html>
<head>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	</head>
	<body>

<?php
require_once('config.php');
if(isset($_POST['submit'])){

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["productimage"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"]))
 {
    $check = getimagesize($_FILES["productimage"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["productimage"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["productimage"]["tmp_name"], $target_file)) {
			$name = $_POST['productname'];
			$price = $_POST['productprice'];
			$quantity = $_POST['quantity'];

			$sql="INSERT INTO `products`(`productname`, `productprice`, `quantity`, `productimage`) VALUES (?,?,?,?)";		
			$stmtinsert=$db->prepare($sql);
			$result = $stmtinsert->execute([$name,$price,$quantity,$target_file]);
		
		if($result){
			$message = "Successfully Saved";
			echo "<script type='text/javascript'>alert('$message');</script>";
			}
			else{
				echo "unable to insert";
			}

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

}
?>
		
		<h1 class='text-center text-success'>Register your Product</h1>
		<div class="jumbotron text-center">
				<form action="admin.php"  method="post" enctype="multipart/form-data">
					<p><input  type="text" name="productname" placeholder="Product Name" required /></p>
					<p><input  type="text" name="productprice" placeholder="Product Price" required /></p>
					<p><input  type="text" name="quantity" placeholder="Product Quantity" required /></p>
					<p><input  type="file" accept="img/jpeg" name='productimage' /></p>
					<input type="submit" name='submit' value="Submit" />
				</form>
			</div>
			<div class="offset-10 col-lg-2">
			<a href="/myphpproject2/logout2.php">Logout</a>
		</div>
</body>
</html>
	

