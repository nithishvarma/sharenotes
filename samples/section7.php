<!DOCTYPE html>
<html>
<head>
<script>
    $(document).ready(function(){
        $('[data-toggle="popover"]').popover(); 
    });
    </script>
</head>
<body>
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
if(empty($_POST["year"]))
{
     $_POST["year"]='%';
}
if(empty($_POST["bran"]))
{
     $_POST["bran"]='%';
}
if(empty($_POST["subject"]))
{
     
     $_POST["subject"]='%';
     
}
if(empty($_POST["topic"]))
{
     $_POST["topic"]='%';
}
if($_POST["year"]=="I")
{
  $sql="SELECT DISTINCT * FROM `notes` WHERE (topic LIKE '".$_POST["topic"]."%') AND (subject LIKE '".$_POST["subject"]."%') AND (year='".$_POST["year"]."') AND (branch LIKE '".$_POST["bran"]."%') ORDER BY time DESC";
}
else{
$sql="SELECT DISTINCT * FROM `notes` WHERE (topic LIKE '".$_POST["topic"]."%') AND (subject LIKE '".$_POST["subject"]."%') AND (year LIKE '".$_POST["year"]."%') AND (branch LIKE '".$_POST["bran"]."%') ORDER BY time DESC";
}
$result=$conn->query($sql);
         $rows=$result->fetch_all(MYSQLI_ASSOC);
         $row="";
         $count=0;
      $num_rows = count($rows);
      $row="";
      $i=0;
      if(empty($rows))
      {
           echo '<div class="content-section-a">
                 
                   <div class="container">
                      <h2 style="text-align:center; margin-top:200px;margin-bottom:200px;">SORRY NO RESULTS FOUND ON YOUR SEARCH</h2>
                      </div>
                      </div>';
      }
      else{
           echo '<div class="content-section-a" style="background-color:white;">';
            foreach($rows as $row)
            {
               $count++;
               $t=strrpos($row["filepath"],"/");
               $file=substr($row["filepath"],$t+1);
               $type=substr($row["filepath"],strrpos($row["filepath"],"."));
               $d=$row["description"];
               $g=strlen($row["section"]);
                 $f=$row["section"][$g-1];
                 $row["section"][$g-1]='-';
                 $row["section"]=$row["section"].$f;   
                echo '<div class="col-lg-4 col-sm-10" style="margin-top:25px;">
                    <div class="well drop-shadow">
                            <div class="row">
                                <div class="col-lg-6 col-xs-6">
                                    <h4>'.$row["topic"].'</h4>
                                    <h4>'.$row["subject"].'</h4>
                                    <h4>
                                     <br>
                                    <h5><span id="ff1">Uploader</span> -  <span id="gh"> '.$row["name"].'</span></h5>
                                    <h5><span id="ff2">Year</span>   -    <span id="gh">'.$row["year"].' year'.' </span></h5>
                                    <h5><span id="ff3">Section</span> -     <span id="gh">'.$row["section"].'</span></h5>
                                        </div>
                                <div class="col-lg-6 col-xs-6">
                                     <button class="btn btn-danger" data-toggle="popover" data-placement="bottom" data-content="'.$row["description"].'">Description</button>
                                    </div>
                    </div>
                        <ul class="list-inline">
                                <li><button class="btn glyphicon glyphicon-open-file"><a href="download.php?file='.$row["filepath"].' ">file.'.$type.'</a></button></li>
                             
                                 <span>views</span> <span id="g"> '.$row["views"].'</span></li>
                                                   </ul>
                         <p style="text-align:right;">Uploaded on '.$row["time"].'</p>
                        </div>
                    </div>';
            }
      }
?>
</body>
</html>