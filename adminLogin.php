<!DOCTYPE html>
<html>

<head>
 <link rel='stylesheet' href='bootstrap.min.css' />
  <style>
    body{
     background-color:plum;
    font-size:14px;
    color:blue;
    }
    input[type='text']{
  padding:5px;
  font-size: 10px;
  width:30%;
  text-align: center;


}
input[type='password']{
  padding:5px;
  font-size: 10px;
  width:30%;
  text-align: center;
}
input[type='submit']{
  color:white;
  background:#c3c3c3;
  width:20%;
  height: 30px;
}
h2 
{
  text-align: justify-all;
}

  </style>
  </head>
<body>
<div class="jumbotron text-center">
  <form action="./Get.php" method="post">
    <div class="row">
      <div class="col-md-3">
            <a href="/myphpproject2/index.php" style="color:plum,background-color:black" class="btn">Start Page</a>
      </div>
      <div class="col-md-9">r
        <h2>Login with Us</h2>
        <input type="text" name="email" placeholder="Username" required>
        </div>
    </div>
    <div class="row">
    	 <div class="col-md-12">
	    	 <input type="password" name="password" placeholder="Password" required></br>
 		 </div></br>
 	</div>	</br>
 <div class="row">
      <div class="col-md-12">
        <input type="submit" name="submit" value="Login">
      </div>
 </div>
  </form>
  <div class="bottom-container">
  <div class="row">
    <div class="col">
      <a href="/myphpproject2/sign_up.php" style="color:plum,background-color:black" class="btn">Sign up</a>
    </div>
  </div>
</div>
</div>
</body>
</html>