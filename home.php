<?php

session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>home_page</title>
	
<link rel='stylesheet' href='bootstrap.min.css' />
<script type='text/javascript' src='index.js'></script>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



</head >
<body style="background-color: violet">
<div class="fluid-container">
	<div class="row">
		<div class="col-lg-9">
			<h1 style="text-align: center;text-shadow: currentColor;">Welcome to Home Page</h1>
		</div>
			<div class="col-lg-3">
	 			<?php echo $_SESSION['email']; ?> <br><br>
	   			<a href="/myphpproject2/logout.php" style="color:plum,background-color:black" class="btn btn-primary">logout</a>
	   		</div>
	    </div>
	 <?php
//session_start();

require_once('./config.php');

if(isset($_POST['submit']))
{
  $id = $_POST['id'];
  $quantity = $_POST['quantity'];
  $productname = $_POST['name'];
  $productprice = $_POST['price'];
  $sql="select quantity from products where productid = ".$id;
 $data = $db->query($sql)->fetchAll();
 foreach ($data as $row ) {
if($quantity < $row['quantity']){
  $sql2 = "INSERT INTO `admins`(`id`,`userid`, `productname`, `quantity`, `totalprice`) VALUES (?,?,?,?,?)";
  $stmt1 = $db->prepare($sql2);
    $res = $stmt1->execute([$id,$_SESSION['userid'],$productname,$quantity,(int)$quantity*(int)$productprice]);
    if($res)
    {
      echo "product ordered successfully";
    }
    else{
      echo "unable to fetch the records from the database";
    }
  $sql1 = "UPDATE `products` SET `quantity`=".(int)((int)$row['quantity'] - (int)$quantity)." WHERE productid = ".$id;
   $result = $db->query($sql1);
   if($result)
   {
    echo "your product will be dispatch on 10th October 2020";
   }
   else{
    echo "unable to process your request";
   }
  echo "you cannot buy this product";
}
   # code...
 }
 
}

else{
$sql="select * from products";
 $data = $db->query($sql)->fetchAll();


?>
<div class="container">
  <h2 class ="text-center text-primary">Product Details</h2>          
    
        <?php
foreach ($data as $row) {
          ?>
            <div class='jumbotron'>
        <form action='home.php' method='post'>
        <input type='text' name='id' value=<?php
       echo $row['productid'];
        ?> />
      
          <img src=<?php
echo 'http://localhost:9000/myphpproject2/'.$row['productimage'];
          ?> height='50px' width='50px' style="border-radius:50%"/>
      
        <input type='text' name='name' value=<?php
        echo $row['productname'];
        ?>  />
       <input type='text' name='price' value=<?php
        echo $row['productprice'];
        ?>  />
        <input type='number' placeholder='enter quantity' name='quantity' />
        <input type='submit' name='submit' value = 'order here' />
      </form>
</div>
      <?php
}
      ?>


</div>
<?php
}
?>
    </div>
</body>
</html>