<?php 
  // Start the session
session_start();?>
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
    <style type="text/css">
      body {
    padding-top: 50px;
}
.dropdown.dropdown-lg .dropdown-menu {
    margin-top: -1px;
    padding: 6px 20px;
}
.input-group-btn .btn-group {
    display: flex !important;
}
.btn-group .btn {
    border-radius: 0;
    margin-left: -1px;
}
.btn-group .btn:last-child {
    border-top-right-radius: 4px;
    border-bottom-right-radius: 4px;
}
.btn-group .form-horizontal .btn[type="submit"] {
  border-top-left-radius: 4px;
  border-bottom-left-radius: 4px;
}
.form-horizontal .form-group {
    margin-left: 0;
    margin-right: 0;
}
.form-group .form-control:last-child {
    border-top-left-radius: 4px;
    border-bottom-left-radius: 4px;
}

@media screen and (min-width: 768px) {
    #adv-search {
        width: 500px;
        margin: 0 auto;
    }
    .dropdown.dropdown-lg {
        position: static !important;
    }
    .dropdown.dropdown-lg .dropdown-menu {
        min-width: 500px;
    }
}
         </style>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script  type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript">
    $(document).ready(function () {
        $("#branch").click(function() {  
      var sid = $(this).val();
      var yid=$("#year").val();
      $.ajax({    //create an ajax request to load_page.php
        type: "POST", 
        data: {
        	   bran:sid,
        	   year:yid,
        	  }, 
            url: "section2.php",           
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
            $("#subject").html(response); 
        }
      });       
    });
        $("#year").click(function() {  
            var sid = $("#branch").val();
            var yid=$(this).val();
            $.ajax({    //create an ajax request to load_page.php
              type: "POST", 
              data: {
              	   bran:sid,
              	   year:yid,
              	  }, 
                  url: "section2.php",           
              dataType: "html",   //expect html to be returned                
              success: function(response){                    
                  $("#subject").html(response); 
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
                <div class="container">
  <div class="row">
    <div class="col-md-12">
            <div class="input-group" id="adv-search">
                <input type="text" class="form-control" placeholder="Search for snippets" />
                <div class="input-group-btn">
                    <div class="btn-group" role="group">
                        <div class="dropdown dropdown-lg">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                <form class="form-horizontal" role="form">
                                  <div class="form-group">
                                    <label for="filter">Filter by</label>
                                    <select class="form-control">
                                        <option value="0" selected>All Snippets</option>
                                        <option value="1">Featured</option>
                                        <option value="2">Most popular</option>
                                        <option value="3">Top rated</option>
                                        <option value="4">Most commented</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="contain">Author</label>
                                    <input class="form-control" type="text" />
                                  </div>
                                  <div class="form-group">
                                    <label for="contain">Contains the words</label>
                                    <input class="form-control" type="text" />
                                  </div>
                                  <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                </form>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                    </div>
                </div>
            </div>
          </div>
        </div>
  </div>
</div>
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
    $yearErr=$sectionErr=$branchErr=$subjectErr='';
    $count=1;
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
     if (empty($_POST["Year"])) {
      echo "c";
   $yearErr = "Year is required";
    $count=0;
  } 
    
  if (empty($_POST["Branch"])) {
  
    $branchErr = "Branch is required";
    $count=0;
  } 
 
  if (empty($_POST["Subject"])) {
      
    $subjectErr = "Subject is required";
    $count=0;
  }
   if($count==1)
   {
   	      echo "hi";
             $_SESSION["Year"] = $_POST["Year"];
             $_SESSION["Branch"] = $_POST["Branch"];
             $_SESSION["Subject"]=$_POST["Subject"];
         header("Location:retrivingpage.php");
   }
  }
  }

  ?> 
          <h1 style="text-align:center;margin-top:25px;"><u>Which file</u></h1>
      <form style="margin-top: 100px;" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" >
       <div class="form-group row">
                        <label for="Year" class="col-sm-12 col-form-label" style="font-size:30px;" >Year</label>
                        <div class="col-sm-4" style="margin-left:400px;">
                            <select name="Year" class="form-control" id="year" placeholder="year">
                    <option value="1">I</option>
                     <option value="2">II</option>
                    <option value="3">III</option>
                  <option value="4">IV</option>
                  </select>
                    <span class="error"><?php echo $yearErr;?></span><br /><br />
                        </div>
                    </div>
        <div class="form-group row">
                        <label for="Year" class="col-sm-2 col-form-label" style="font-size:30px;" >Branch</label> 
                 
                        <div class="col-sm-8">
                            <select name="Branch" class="form-control" id="branch" placeholder="Branch">
                            <option value="">select branch</option>
                             
                  </select>
                     <span class="error"><?php echo $branchErr;?></span><br /><br />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label" style="font-size:30px;">Subject</label>
                        <div class="col-sm-8">
                            <select name="Subject" class="form-control" id="subject" placeholder="Subject" value="">
                            <option value="">Select option</option>
                            </select>
                            <span class="error"><?php echo $subjectErr;?></span><br /><br />
                        </div>
                    </div>
                     <div class="col-sm-11">
                    <input type="submit" class="btn btn-success">
                    </div>
       </form>
       </div>
       </div>
       <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
       </body>
    </html>