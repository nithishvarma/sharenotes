<?php 
  // Start the session
session_start();


function sendEmail($newPass,$email){
  $senderName = 'AdMIN';
  $senderEmail = 'sharethenotes62@gmail.com';
  $toEmail = $email;
  $mail_body =  $newPass;
  $subject = 'Your password';
  $header = 'From: '. $senderName . ' <' . $senderEmail . '>\r\n';
  if(mail($toEmail, $subject, $mail_body, $header))
  {
       return "password is sent to your mail";
  }
  else{
      return "not send";
  }
}
 
function createRandomString($length = 7) {
  $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz23456789';
  srand((double)microtime()*1000000);
  $i = 0;    $pass = '' ;
  while ($i <= $length) {
    $num = rand() % 33;
    $tmp = substr($chars, $num, 1);
    $pass = $pass . $tmp;        $i++;
  }
  return $pass;
}
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password,'sharenotes');
// Check connection
if ($conn->connect_error) {
    
    die("Connection failed: " . $conn->connect_error);
}
else{

       $sql="SELECT email FROM student WHERE username='nithish'";
        $result=$conn->query($sql);
         $row=$result->fetch_all(MYSQLI_ASSOC);
         if(empty($row))
         {
            echo 'wrong username';
         }
   else{
   $newPass =  createRandomString();
$newEncPass = md5($newPass);
 //echo $newPass;
 
 $t= sendEmail($newPass,$row[0]["email"]);
  echo $t;
 
}
   }
 
?>