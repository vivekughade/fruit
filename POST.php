
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
        $_SESSION['userid'] = $_POST["Name"];
      $_SESSION['email'] = $_POST['email']; 
      $sql = "SELECT * FROM fila where email='".$email."' and password='".$password."'limit 1";
      $query = mysqli_query($conn,$sql);
      $email_count=mysqli_num_rows($query);

echo "reached";
if ($email_count) {
    
    				
    				
    					header("Location: /myphpproject2/home.php");
    				}
                    else 
                        { 
                           echo "wrong username or password";
                            
                  }
              }
$conn->close();

?>