
<?php
session_start();
include_once('config.php');

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}

function getName($n) { 
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
    $randomString = ''; 
  
    for ($i = 0; $i < $n; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString .= $characters[$index]; 
    } 
  
    return $randomString; 
}

if(isset($_POST['submit']))
  
{
   $mailto = $_POST['email'];
    $mailSub = 'Enter the below password for updating your password';
    $mailMsg = 'you got it';

    $sql="select password from mila where email = '".$mailto."'";
    $result = $db->query($sql)->fetchAll();
    foreach ($result as $row)
    {
        $mailMsg = $row['password'];
    }
   require '/myphpproject2/PHPmailer.php';
   $mail = new PHPMailer();
   $mail ->IsSmtp();
   $mail ->SMTPDebug = 0;
   $mail ->SMTPAuth = true;
   $mail ->SMTPSecure = 'ssl';
   $mail ->Host = "smtp.gmail.com";
   $mail ->Port = 465; // or 587
   $mail ->IsHTML(true);
   $mail ->Username = "vivekughade11@gmail.com";
   $mail ->Password = "kankar@pathar#";
   $mail ->SetFrom("vivekughade11@gmail.com");
   $mail ->Subject = $mailSub;
   $mail ->Body = $mailMsg;
   $mail ->AddAddress($mailto);

   if(!$mail->Send())
   {
       echo "Mail Not Sent";
   }
   else
   {
       echo "Mail Sent";
   }
}
?>
<!DOCTYPE HTML>
<html>
<head>
<style type="text/css">
 border-radius:5px;
 
 h1{
  color:darkgreen;
  font-size:22px;
  text-align:center;
 }
.jumbotron{
  text-align:center;
  color:white;
  background:#b3b3b3;
  padding:20px;
}
p{
  font-weight: bold;
  font-size: 40px;
  text-align:center;
}
input[type='email']{
  padding:5px;
  font-size: 20px;
  width:50%;
  text-align: center;
}
input[type='submit']{
  color:white;
  background:#c3c3c3;
  width:50%;
  height: 30px;
}
</style>
</head>
<body>

  <div class='jumbotron'>
    <h1>Forgot Password<h1>
<form action='forget.php' method='post'>
<p><input type='email' name='email' placeholder='Enter your Email' /></p>
<p><input type='submit' name='submit' value='submit' /></p>
</form>
</div>
</body>
</html>