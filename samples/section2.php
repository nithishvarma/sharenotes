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
 
 $sql="SELECT * FROM subjects WHERE  (year LIKE'".$_POST["year"]."%') AND ( branch LIKE '".$_POST["bran"]."%')";
	     $result=$conn->query($sql);
	     $rows=$result->fetch_all(MYSQLI_ASSOC);
	     $row="";
  $output='<option value="">Select subject</option>';
   foreach($rows as $row)
  {
  	$output .='<option value="'.$row["subject"].'">'.$row["subject"].'</option>';
  }
  echo $output;
