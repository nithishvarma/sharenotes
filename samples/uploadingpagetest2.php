<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
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
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    </style>
</head>
<body>
    <!-- Navigation -->
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
                <a class="navbar-brand topnav" href="test.html">SHARENOTES</a>
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
    <div class="intro-header">
        <div class="container">
            <div class="container">
                <h1 style="margin-top:50px;"><u>UPLOAD YOUR FILE</u></h1>
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
else{
  // dne variables and set to empty values
  $nameErr = $branchErr = $yearErr = $sectionErr = $topicErr = $subjectErr=$fileErr="";
$name = $section = $year = $branch = $subject = $topic= "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

$count=1;
  if (empty($_POST["Name"])) {  
    $nameErr = "Name is required";
     $count=0;
  } else { 

    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      
      $nameErr = "Only letters and white space allowed"; 
      $count=0;
    }
  }
  
  if (empty($_POST["Year"])) {
    
   $yearErr = "Year is required";
    $count=0;
  } 
    
  if (empty($_POST["Branch"])) {
    
    $branchErr = "Branch is required";
    $count=0;
  } 
 

  if (empty($_POST["Section"])) {
    
    $sectionEr="Section is required";
    $count=0;
  } 

  if (empty($_POST["Subject"])) {
    
    $subjectErr = "Subject is required";
    $count=0;
  } 
  if (empty($_POST["Topic"])) {
    
    $subjectErr = "Topic is required";
    $count=0;
  } 
  if(empty($_FILES["fileToUpload"]["name"])){
          echo "<h2>hi you have not chosen any file<h2>";
    $fileErr="you must choose your file";
    $count=0;
  }
   
if($count===1)
{
     $value_x=0;
    $name =$_POST["Name"];
  $section= $_POST["Section"]; 
  $year = $_POST["Year"];
    $branch = $_POST["Branch"];
  $subject =$_POST["Subject"];
  $topic=$_POST["Topic"];
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$FileType = pathinfo($target_file,PATHINFO_EXTENSION);
$target_file = $target_dir . basename($_FILES["fileToUpload"]["size"]) .".". $FileType;

// Check if file already exists
if (file_exists($target_file)) {
                  //gobal $x;----------------------------------------------------------*******
                    $sql = "SELECT value_x,filepath FROM notes";
                    $result = $conn->query($sql);
                     // $row = $result->fetch_assoc();
                    
                      if ($result->num_rows > 0) {
                         // output data of each row
                          while($row = $result->fetch_assoc()) {
                               // echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
                                 if($target_file == $row["filepath"])
                                  {
                                    $value_x=$row["value_x"];
                                    $value_x++;
                                    echo $value_x;
                                  }
                                  else {}
                                 }


                      }
                      else{echo "nothing";}
                      $sql = "UPDATE notes SET value_x='{$value_x}' WHERE filepath='{$target_file}'";

                            if ($conn->query($sql) === TRUE) {
                                        echo "Record updated successfully";
                                               } else {
                                     echo "Error updating record: " . $conn->error;}
 
                     // echo $row["value_x"];  
                      //echo $row["filepath"];  
  
                    $target_dir = "uploads/sub/";
                   // $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                    //$uploadOk = 1;
                    //$FileType = pathinfo($target_file,PATHINFO_EXTENSION);;
                    $target_file = $target_dir . basename($_FILES["fileToUpload"]["size"]) ."(".$value_x.").". $FileType;
                     echo $value_x;
   
    
    //echo "Sorry, file already exists.";
    //$uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($FileType != "jpg" && $FileType != "png" && $FileType != "jpeg"
&& $FileType != "pdf" ) {
    echo "Sorry, only JPG, JPEG, PNG & pdf files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded1 in try again.";
// if everything is ok, try to upload file
} else {
  global $target_file;
  echo $target_file;
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                            echo $target_file."<br>";
        
    } else {
        echo "Sorry, there was an error uploading2 your file try again.";
    }
}
if($uploadOk != 0)
{
 $sql="INSERT INTO notes (name,year,branch,section,subject,topic,filepath,value_x) 
       VALUES ('{$name}','{$year}','{$branch}','{$section}','{$subject}','{$topic}','{$target_file}','{$value_x}')";
    if($conn->query($sql) === TRUE){

    echo "your file  is uploaded created successfully ";
    echo "thanks for your contribution";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
}
}
}

?>
                <form style="margin-top: 100px;" method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>"  enctype="multipart/form-data">
                    <div class=" form-group row">
                        <label for="name" class="col-sm-2 col-form-label" style="font-size:30px;">Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputPassword3" placeholder="Your name" name="Name">

                            <span class="error"><?php echo $nameErr;?></span><br /><br />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Year" class="col-sm-2 col-form-label" style="font-size:30px;">year</label>
                        <div class="col-sm-8">
                            <select name="Year" class="form-control" id="inputPassword3" placeholder="year">
                    <option value="1">I</option>
                     <option value="2">II</option>
                    <option value="3">III</option>
                  <option value="4">IV</option>
                  </select>
                    <span class="error"><?php echo $yearErr;?></span><br /><br />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label" style="font-size:30px;">Branch</label>
                        <div class="col-sm-8">
                            <select name="Branch" class="form-control" id="inputPassword3" placeholder="Branch">
                       <option value="CSE">CSE</option>
                       <option value="ECE">ECE</option>
                      <option value="MECH">MECH</option>
                       <option value="EEE">EEE</option>
                  </select>
                     <span class="error"> <?php echo $branchErr;?></span><br /><br />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label" style="font-size:30px;">Section</label>
                        <div class="col-sm-8">
                            <select name="Section"  class="form-control" id="inputPassword3" placeholder="Branch">
            <option value="Cse1">Cse1</option>
            <option value="Cse2">Cse2</option>
            <option value="Cse3">Cse3</option>
            <option value="Ece1">Ece1</option>
            <option value="Ece2">Ece1</option>
            <option value="Ece3">Ece1</option>
            <option value="Mech1">Mech1</option>
            <option value="Mech2">Mech2</option>
            <option value="EEE1">EEE1</option>
            <option value="Civil">Civil</option>
                    </select>
                    <span class="error">* <?php echo $sectionErr;?></span><br /><br />
                    </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label" style="font-size:30px;">Subject</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputPassword3" name="Subject" placeholder="Subject">
                            <span class="error"><?php echo $subjectErr;?></span><br /><br />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label" style="font-size:30px;">Topic</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputPassword3" name="Topic" placeholder="topic">
                            <span class="error"> <?php echo $topicErr;?></span><br /><br />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label" style="font-size:30px;">FILE</label>
                        <div class="col-sm-8">
                           <input type="file" name="fileToUpload" id="fileToUpload">
        <span class="error">* <?php echo $fileErr;?></span><br /><br />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary"  > Submit</button>
            </div>
        </div>
    <!-- jQue    <script src="js/bootstrap.min.js"></script>
ry -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
</body>
</html>