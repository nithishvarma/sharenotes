<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password,'sharenotes');

// Check connection
if ($conn->connect_error) {
    
    die("Connection failed: " . $conn->connect_error);
}
     if(empty($_POST["p"]))
     {
        echo "enter username";
     }
     else
     {
         $sql="SELECT * FROM student WHERE username='{$_POST["p"]}'";
         $result=$conn->query($sql);
         $row=$result->fetch_all(MYSQLI_ASSOC);
	     if(!empty($row))
       {
          echo "this name already exists";
       }
       else{
          echo "";
       }
}
