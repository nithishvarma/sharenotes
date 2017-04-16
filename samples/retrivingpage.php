<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sharing the notes</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript">
$(document).ready(function () {
 $("#ss").click(function(){
   var s=$(this).data('datac'); 
   $.ajax({    //create an ajax request to load_page.php
        type: "POST", 
        data: {
              p:s,
            }, 
            url: "section4.php",           
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
            $("#g").html(response); 
            //alert(response);
        }
      });       
    });
});
</script>
</head>
<body>
 <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav" href="#">SHARENOTES</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#about">Feedback</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
<?php
  session_start();
   $year=$_SESSION["Year"];
   $branch=$_SESSION["Branch"];
   $subject=$_SESSION["Subject"];
   $servername = "localhost";
   
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password,'sharenotes');
function like(){
  $username = "root";
     $password = "";
// Create connection
$conn = new mysqli($servername, $username, $password,'sharenotes');
       echo "hi";
}

// Check connection
if ($conn->connect_error) {
      
    echo '<div class="container">
             <div style="margin-top: 200px;">CONNECT ERROR <?php echo $conn->connect_error; ?></div> 
             </div>';
}
else{
    $count=0;
      $result=$conn->query("SELECT * FROM notes WHERE (year='{$year}' AND branch='{$branch}') AND (subject='{$subject}')");
      $rows=$result->fetch_all(MYSQLI_ASSOC);
      if(empty($rows)){
              echo $_SESSION["Subject"],'
                 <div class="content-section-a">
                 
                   <div class="container">
                      <h2 style="text-align:center; margin-top:200px;margin-bottom:200px;">SORRY NO RESULTS FOUND IN YOUR SECTION</h2>
                      </div>
                      </div>'; 
      }
      else {
      $count=0;
      $num_rows = count($rows);
      $row="";
      $i=0;
      echo '<div class="content-section-a" style="background-color:white;">';
            foreach($rows as $row)
            {
               $count++;
               $t=strrpos($row["filepath"],"/");
               $file=substr($row["filepath"],$t+1);
               $d=$row["description"];
                $i=$i+1;
                 $downloads=$row['downloads'];
                echo '<div class="col-lg-4 col-sm-6" style="margin-top:25px;">
                    <div class="well ">
                            <div class="row">
                                <div class="col-lg-4">
                                    <h4>'.$row["name"].'</h4>
                                    <h5>'.$row["year"].'</h5>
                                    <h5>'.$row["branch"].'</h5>
                                    <h5>'.$row["section"].'</h5>
                                        </div>
                                <div class="col-lg-8">
                                    <button class="btn btn-danger" data-toggle="collapse" data-target="#'.$i.'">Description</button>
                                    <div class="collapse" id="'.$i.'" style="margin-top:10px;">
                                        <span>'.$row["description"].'</span>
                                    </div>
                                    </div>
                    </div>
                        <ul class="list-inline">
                                <li><button class="btn glyphicon glyphicon-open-file"><a href="'.$row["filepath"].'">'.$file.'</a></button></li>
                                <li><a href="download.php?nama='.$file.'" class="btn" data-datac="'.$row["filepath"].'" id="ss"><span class="glyphicon glyphicon-save"></span></a>
                                  <span id="g">'.$row["downloads"].'</span></li>
                                                   </ul>
                       <span style="align:right;">Uploaded on '.$row["time"].'</span>
                        </div>
                    </div>';
            }
     
      }
   if($count<6)
   {
        $count=6-$count;
        while($count)
        {
           echo '<div class="col-lg-4 col-sm-6" style="margin-top:25px;">
                <div class="well" style="height:200px;">
                </div>
                </div>';
           $count--;
        }
   }
}
   
 ?>
 <script src="js/bootstrap.min.js"</script>
 <script src="js/bootstrap.js"</script>
 <script src="js/jquery.js"></script>
 </body>
 </html>
