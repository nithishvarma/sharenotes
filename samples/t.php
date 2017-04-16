<?php 
  // Start the session
session_start();
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
    <style type="text/css">
    .banner{
      background-image: url("https://previews.123rf.com/images/6kor3dos/6kor3dos1207/6kor3dos120700185/14522943-Two-businessmen-shake-hands-through-screens-of-laptops-Stock-Photo.jpg");
    }
    .container-fluid{
    min-height:300px;
    }
    </style>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>



<script type='text/javascript'>
        $(document).ready(function () {
            $('#email').keyup(function () {
                var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

                if (re.test($(this).val())) {

                   $(this).css("background-color", "white");

                } else {

                   $(this).css("background-color", "red");
                }
            });
            
                          
        });
        $(document).ready(function(){
 $("#toggle2").change(function(){
  
  // Check the checkbox state
  if($(this).is(':checked')){
   // Changing type attribute
   $("#password").attr("type","text");
   
   // Change the Text
   $("#toggleText2").text("Hide");
  }else{
   // Changing type attribute
   $("#password").attr("type","password");
  
   // Change the Text
   $("#toggleText2").text("Show password");
  }
 
 });
});
      $(document).ready(function(){
 $("#toggle").change(function(){
  
  // Check the checkbox state
  if($(this).is(':checked')){
   // Changing type attribute
   $("#password2").attr("type","text");
   
   // Change the Text
   $("#toggleText").text("Hide");
  }else{
   // Changing type attribute
   $("#password2").attr("type","password");
  
   // Change the Text
   $("#toggleText").text("Show password");
  }
 
 });
});
    </script>
    

    <script  type="text/javascript" src="js/jquery.js"></script>
    <script   type="text/javascript">
$(document).ready(function () {
    $("#sreguser").keyup(function() {  
  var s = $(this).val();

  $.ajax({    //create an ajax request to load_page.php
    type: "POST",
    url: "section3.php", 
    data: {
          p:s,
        },            
    dataType: "html",   //expect html to be returned                
    success: function(response){                    
        $("#g").html(response); 
        //alert(response);
    }
  });       
});
    $("#bt").click(function(){
    	var s = $("#susr").val();
    	 $.ajax({    //create an ajax request to load_page.php
    		    type: "POST",
    		    url: "section8.php", 
    		    data: {
    		          d:s,
    		        },            
    		    dataType: "html",   //expect html to be returned                
    		    success: function(response){                    
    		        $("#g").html(response); 
    		    }
    		  });  
    });
    
});
</script>
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
                <a class="navbar-brand topnav" href="openingpage.php">SHARENOTES</a>
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
    function emailverification()
    {
          
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
      
       $tlogpasswordErr=$tregpasswordErr="";
       $tregemailErr=$slogpasswordErr=$sregpasswordErr=$sregemailErr="";
       $err="";
       $err1="";
       $err2="";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<span>hi</span>";
          if(!empty($_POST["sloguser"]))
          {
             $count=1;

               if($count)
               {
                      
                    $sql="SELECT * FROM student WHERE username='{$_POST["sloguser"]}' and password='{$_POST["slogpassword"]}'";
                   $result=$conn->query($sql);
                   $row=$result->fetch_all(MYSQLI_ASSOC);
                       
                   if(empty($row))
                   {
                           
                          $err="wrong details try again";
                   }
                   else{
                      $_SESSION["username"]=$_POST["sloguser"];
                      $err= '
                        <div class="center">
                        <a href="uploadingpage.php" class="btn btn-primary">welcome back '.$_POST["sloguser"].' click me</a></div>
                        ';
                   }
               }
          }
         else if(!empty($_POST["sreguser"]))
          {
          if(empty($_POST["sregpassword"]))
               {
                         $err1="please give passsword";
                         $count=0;
               }
               if(empty($_POST["sregemail"]))
               {
                    $err2="please give your email";
                    $count=0;
               }
               
                   $sreguser=$_POST["sreguser"];
                   $sregpassword=$_POST["sregpassword"];
                   $sregemail=$_POST["sregemail"];
                   $sql="INSERT INTO student (username,password,email) 
                VALUES ('{$sreguser}','{$sregpassword}','{$sregemail}')";
                   if($conn->query($sql)== true)
                   {
                        
                        $_SESSION["username"]=$_POST["sreguser"]; 
                        
                        $err= '
                        <div class="center">
                        <a href="uploadingpage.php" class="btn btn-primary">thanks for your details click me to continue</a></div>
                        ';
                        
                   }
                   
               }
         else if(!empty($_POST["tloguser"]))
          {
            $count=1;
          if(empty($_POST["tlogpassword"]))
               {
                       $tlogpasswordErr="please give password"; 
                       $count=0; 
               }
               if($count)
               {
                   $tloguser=$_POST["tloguser"];
                   $tlogpassword=$_POST["tlogpassword"];
               $result=$conn->query("SELECT * FROM teacher WHERE (username='{$tloguser}' AND password='{$tlogpassword}')");
                   if(empty($result))
                   {
                          $Err="wrong details try again";
                   }
                   else{
                     $row=$result->fetch_all(MYSQLI_ASSOC);
                     $_SESSION["username"]=$row["username"];
                     header("Location:uploadingpage.php");
                      
          }
          }
          }
         else  if(!empty($_POST["treguser"]))
          {
             $count=1;
          if(empty($_POST["tregpassword"]))
               {
                         $tregpasswordErr="please give password";
                         $count=0;
               }
          if(empty($_POST["tregemail"]))
               {
                    $tregemailErr="please give your email";
                    $count=0;
               }
               if($count)
               {
               $treguser=$_POST["treguser"];
                   $tregpassword=$_POST["tregpassword"];
                   $tregemail=$_POST["tregemail"];
                   $sql="INSERT INTO teacher (username,password,email) 
                VALUES ('{$treguser}','{$tregpassword}','{$tregemail}')";
                   if($conn->query($sql)== true)
                   {
                      $_SESSION["username"]=$treguser;
                       header("Location:uploadingpage.php");
                   }
               }
          }
          else{
            $err= "please fill the details";
          }
    }
    }
 
    ?>

    <div class="content-section-a" style="background-color:azure;">
        <div class="container-fluid">
          <div style="align:center;"><?php  echo $err;?></div>
          <div style="align:center;"><?php  echo $err1;?></div>
          <div style="align:center;"><?php  echo $err2;?></div>
            <div class="row">
                <div class="col-lg-5 col-sm-6 ">
                  
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <div><h1>Teachers login</h1></div>
                    <button class="btn btn-primary " data-toggle="collapse" data-target="#d">LOGIN</button>
                    <button class="btn btn-primary " data-toggle="collapse" data-target="#di">REGISTER</button>
                    <div class="collapse" id="d">
                       <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" >
                            <div class="form-group" class="collapse" id="d">
                                <label for="usr">Name:</label>
                                <input type="text" class="form-control" id="usr" name="tloguser" >
                            </div>
                            <div class="form-group" class="collapse" id="d">
                                <label for="pwd">Password:</label>
                                <input type="password" class="form-control" id="pwd" name="tlogpassword">
                            </div>
                               <button type="submit" class="btn btn-danger">submit</button>
                        </form>
                    </div>
                    <div class="collapse" id="di">
                       <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" >
                            <div class="form-group" class="collapse" id="di">
                                <label for="usr">Name:</label>
                                <input type="text" class="form-control" id="usr" name="treguser">
                            </div>
                            <div class="form-group" class="collapse" id="di">
                                <label for="usr">Email</label>
                                <input type="text" class="form-control" id="usr" name="tregemail">
                            </div>
                            <div class="form-group" class="collapse" id="di">
                                <label for="pwd">Password:</label>
                                <input type="password" class="form-control" id="pwd" name="tregpassword">
                            </div>
                            <button type="submit" class="btn btn-danger">submit</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 col-sm-6 ">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <div><h1>Student login</h1></div>
                    <button class="btn btn-primary " data-toggle="collapse" data-target="#t">LOGIN</button>
                    <button class="btn btn-primary " data-toggle="collapse" data-target="#ti">REGISTER</button>
                    <div class="collapse" id="t">
                        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" >
                            <div class="form-group" class="collapse" id="t">
                                <label for="usr">Roll no:</label>
                                <input type="text" class="form-control" id="susr" name="sloguser">
                            </div>
                            <div class="form-group" class="collapse" id="t">
                                <label for="pwd">Password:</label>
                                <input type="password" class="form-control" id="password" name="slogpassword">
                                <input type='checkbox' id='toggle2' value='0' onchange='togglePassword(this);'> <span id="toggleText2">Show password</span>
                            </div>
                                 <div class="row">
                                 <div class="col-md-6">
                                 <button class="btn-primary" id="bt">Generate password</button>
                                </div>
                                <div class="col-md-6">
                                 <input type="submit" class="btn btn-danger">
                                 </div>
                                 </div>
                                 <span id="g"></span>
                        </form>
                    </div>
                    <div class="collapse" id="ti">
                        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" >
                            <div class="form-group" class="collapse" id="ti">
                                <label for="usr">Roll no:</label>
                                <input type="text" class="form-control" id="sreguser" name="sreguser">
                                <span id="g"></span>
                            </div>
                            <div class="form-group" class="collapse" id="ti">
                                <label for="pwd">Password:</label>
                                <input type="password" class="form-control" id="password2" name="sregpassword">
                               <input type='checkbox' id='toggle' value='0' onchange='togglePassword(this);'> <span id='toggleText'>Show password</span>
                            </div>
                            <div class="form-group" class="collapse" id="ti" class="st">
                                <label for="usr">Email:</label>
                                <input type="text" class="form-control" id="email" name="sregemail" >
                                 
                            </div>
                            <button type="submit" class="btn btn-danger" id="pp">submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <span></span><br />
            <span></span><br />
        </div>
         <a name="contact"></a>
    <div class="banner img-responsive">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-xs-6">
                    <h2>Connect with us:</h2>
                </div>
                <div class="col-lg-5 col-xs-3">
                    <ul>
                        <li>
                            <a href="https://www.facebook.com/tuttor.co/" class="fa fa-2x fa-facebook-official social_icons" aria-hidden="true"></a>
                            <a href="https://twitter.com/" class="fa fa-3x fa-twitter social_icons" aria-hidden="true"></a>
                            <a href="https://www.linkedin.com/" class="fa fa-3x fa-linkedin-square social_icons" aria-hidden="true"></a>
                            <a href="https://plus.google.com/" class="fa fa-3x fa-google-plus social_icons" aria-hidden="true"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /.container -->
    </div>
    <!-- /.banner -->
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-group" >
                        <li >
                            <h3 style="text-align:center;">ShareNotes</h3>
                        </li>
                        <li 
                          <h4 style="text-align:center;"><a href="#">Let share the Knowlege</a></h4>
                        </li>
                        <li 
                          <h4 style="text-align:center;">If you have knowledge,
let others light their candles in it.</h4>
                        </li>
                        
                    </ul>
                     <nav class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
          <div class="input-group input-group-md">
            <input type="text" class="form-control" placeholder="Email Address">
            <a class="input-group-addon" href="/feedback">Subscribe</a>
          </div>
        </nav>

                </div>
            </div>
        </div>
    </footer>
        <!-- jQuery -->
        <script src="js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
</body>
</html>