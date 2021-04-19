
<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn) {
   echo "Connection successful";
}
else{
    echo"No connection";
}
   if(isset($_POST['submit'])){
$email = $_POST['email'];
$password = $_POST['password'];
$_SESSION['email'] = $_POST['email']; 
$_SESSION['password'] = $_POST['password'];
if($email == "vivekughade11@gmail.com" && $password == "vivek@123")

 {
    
    				
    				
    					header("Location: /myphpproject2/admin.php");
    				}
                    else 
                        { 
                           echo "wrong username or password";
                            
                  }
              }
$conn->close();

?>