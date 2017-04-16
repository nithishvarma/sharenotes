<?php 
error_reporting(0);
session_start();
if(empty($_SESSION["{$_GET["file"]}"]))
{
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

       $sql="SELECT views FROM notes WHERE filepath='{$_GET["file"]}'";
        $result=$conn->query($sql);
         $row=$result->fetch_all(MYSQLI_ASSOC);
         $t=$row[0]["views"];
         $t=$t+1;
         echo $t;
      $sql="UPDATE notes SET views='{$t}' WHERE filepath='{$_GET["file"]}'";
      $result=$conn->query($sql);
     $_SESSION["{$_GET["file"]}"]=1;
     
    }
}
header('Location: '.$_GET["file"].'');

?>