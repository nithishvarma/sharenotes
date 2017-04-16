<?php
// Start the session
session_start();
if(empty($_SESSION["username"]))
{
   header('Location:t.php');
}
error_reporting(0);
?>

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
    
    <style>
    .file {
  visibility: hidden;
  position: absolute;
}
#topic{
        height: 32px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
    }
   .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
        background-color:white;
    }
    .t input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
    .result p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
         background-color:white;
    }
    .result p:hover{
        background: #f2f2f2;
    } 
      </style>
     <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script  type="text/javascript" src="js/jquery.js"></script>
    <script   type="text/javascript">
$(document).ready(function () {
	$('.t input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        var y=$("#year").val();
        var  s=$("#branch").val();
        
        if(inputVal.length){
            $.get("section5.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".t").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
    $(document).click(function (e)
    		{

    		  var container = $(".result");

    		   if (!container.is(e.target) && container.has(e.target).length === 0)
    		  {
    			   $(".result p").parent(".result").empty();

    		   }

    		});
	$(document).on('click', '.browse', function(){
		  var file = $(this).parent().parent().parent().find('.file');
		  file.trigger('click');
		});
		$(document).on('change', '.file', function(){
		  $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
		});
    $("#branch").change(function() {  
  var sid = $(this).val();

  $.ajax({    //create an ajax request to load_page.php
    type: "POST",
    url: "section.php", 
    data: {
    	   bran:sid,
    	  },            
    dataType: "html",   //expect html to be returned                
    success: function(response){                    
        $("#section").html(response); 
        //alert(response);
    }
  });       
});
    $("#topic").change(function(){
        $("#topic").print();
    });
});
$(document).ready(function () {
    $("#branch").change(function() {  
  var sid = $(this).val();
  var yid=$("#year").val();

  $.ajax({   
    type: "POST",
    url: "section2.php", 
    data: {
    	   bran:sid,
    	   year:yid,
    	  },            
    dataType: "html",   //expect html to be returned                
    success: function(response){                    
        $("#subject").html(response); 
        
    }
  });       
});
    $("#topic").change(function(){
        $("#topic").print();
    });
}); 
    </script>
</head>
<body>
    
    <?php 
       function load_branch()
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
	     $sql="SELECT DISTINCT branch FROM branchoptions";
	     $result=$conn->query($sql);
	     $rows=$result->fetch_all(MYSQLI_ASSOC);
	     $row="";
	     foreach($rows as $row)
	     {
	     	$output .='<option value="'.$row["branch"].'">'.$row["branch"].'</option>';
	     }
	 	return $output;
	 }   
    ?>
    <?php 
      $u=$_SESSION["username"];
  $servername = "localhost";
$username = "root";
$password = "";
// Create connection
$conn = new mysqli($servername, $username, $password,'sharenotes');
$success1="hi";
// Check connection
if ($conn->connect_error) {
    
    die("Connection failed: " . $conn->connect_error);
}
else{
	  $success1="";
	  $success2="";
   $subjectErr="";
  $nameErr = $branchErr = $yearErr = $sectionErr = $topicErr =$descriptionErr=$fileErr="";
$name = $section = $year = $branch = $subject = $topic= "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
$count=1;
  if (empty($_POST["Name"])) {  
    $success1 = "Name is required";
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
 
  if ($_POST["Section"]=="") {
    $sectionErr ="Section is required";
    $count=0;
  } 

  if ($_POST["Subject"]=="") {
    $subjectErr = "Subject is required";
    $count=0;
  } 
  if (empty($_POST["Topic"])) {
    
    $topicErr = "Topic is required";
    $count=0;
  } 
  if (empty($_POST["Description"])) {
    
    $descriptionErr = "Description is required";
    $count=0;
  } 
  if(empty($_FILES["fileToUpload"]["name"])){
  	$fileErr="you must upload your file";
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
  $description=$_POST["Description"];
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
&& $FileType != "pdf" && $fileType !="ppt") {
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
 $sql="INSERT INTO notes (name,year,branch,section,subject,topic,filepath,value_x,description) 
       VALUES ('{$name}','{$year}','{$branch}','{$section}','{$subject}','{$topic}','{$target_file}','{$value_x}','{$description}')";
    if($conn->query($sql) === TRUE){

    $success1="your file  is uploaded created successfully ";
    $success2= "thanks for your contribution";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
}
}
}  
?>
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
                <a class="navbar-brand topnav" href="openingpage.php">SHARENOTES</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                   <li>
                     <a href="uploads.php"><span class="glyphicon glyphicon-new-window"></span>Uploads</a>
                    </li>
                    <li>
                      <a href="logout.php">Logout</a>
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
                   
                  <span><?php echo $success1;?></span>
                  <span> <?php echo $success2;?></span>

                                <form style="margin-top: 100px;" method="post" action="/samples/uploadingpage.php"  enctype="multipart/form-data">
                    <div class=" form-group row">
                        <label for="name" class="col-sm-2 col-form-label" style="font-size:30px;">Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputPassword3" placeholder="Your name" name="Name" value="<?php echo $u;?>" readonly="readonly">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Year" class="col-sm-2 col-form-label" style="font-size:30px;">year</label>
                        <div class="col-sm-8">
                            <select name="Year" class="form-control" id="year" placeholder="year">
                    <option value="I">I</option>
                     <option value="II">II</option>
                    <option value="III">III</option>
                  <option value="IV">IV</option>
                  </select>
                    <span class="error"><?php echo $yearErr;?></span><br /><br />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label" style="font-size:30px;">Branch</label>
                        <div class="col-sm-8">
                            <select name="Branch" class="form-control " id="branch" placeholder="Branch">
                            <option value="">select branch</option>
                               <?php echo load_branch();?>
                  </select>
                     <span class="error"><?php echo $branchErr;?> </span><br /><br />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label" style="font-size:30px;">Section</label>
                        <div class="col-sm-8">
                            <select name="Section"  class="form-control" id="section" >
                            <option value="">select section</option>                                      
                    </select>
                    <span class="error">*<?php echo $sectionErr;?> </span><br /><br />
                    </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label" style="font-size:30px;">Subject</label>
                        <div class="col-sm-8">
                           <select name="Subject" class="form-control" id="subject">
                           <option value="">select subject</option>
                           </select>
                            <span class="error"><?php echo $subjectErr;?></span><br /><br />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label" style="font-size:30px;">Topic</label>
                        <div class="col-sm-8">
                        <div class="t">
                            <input type="text" class="form-control" id="topic" name="Topic" placeholder="topic">
                            <span class="error"> <?php echo $topicErr;?></span><br /><br />
                            <div class="result"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label" style="font-size:30px;">Description</label>
                        <div class="col-sm-8">
                            <div class="form-group">
    <textarea  rows="3" class="form-control" placeholder="Description"  name="Description"></textarea>
</div>
                    <span class="error"> <?php echo $descriptionErr;?></span><br /><br />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label" style="font-size:30px;">FILE</label>
                        <div class="col-sm-8">
                           <div class="form-group">
    <input type="file" name="fileToUpload" class="file">
    <div class="input-group col-xs-12">
      <input type="text" class="form-control input-lg" readonly="readonly" placeholder="Upload File">
      <span class="input-group-btn">
        <button class="browse btn btn-primary input-lg" type="button"><i class="glyphicon glyphicon-search"></i> Browse</button>
      </span>
    </div>
           <span class="error"> <?php echo $fileErr;?></span><br /><br />
  </div>
                        </div>
                    </div>
                       <div class="row">
                       <div class="col-sm-6">
                    <input type="submit" class="btn btn-primary">
                    </div>
                    <div class="col-sm-6">
                    <a href="openingpage.php" class="btn btn-primary">Back</a>
                    </div>
                    </div>
                    </form>
   
                    </div>
                   

            </div>
        </div>
    
</body>
</html>