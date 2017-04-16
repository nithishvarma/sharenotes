<?php
error_reporting(0);
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
    $sql="SELECT * FROM notes WHERE filepath='{$_POST["p"]}'";
         $result=$conn->query($sql);
         $row=$result->fetch_all(MYSQLI_ASSOC);
         $row['downloads']++;
      $sql="UPDATE notes SET downloads='{$row['downloads']}' WHERE filepath='{$_POST["p"]}'";
      $result=$conn->query($sql);
         echo '<span>'.$row["downloads"].'</span>';
}
?>