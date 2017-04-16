<?php 
 session_start();
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
    <link href="http://localhost/samples/font-awesome/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
   <link href="https://fonts.googleapis.com/css?family=Advent+Pro" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
    body{
    font-family: 'Advent Pro Medium', sans-serif;
    }
    h4{
    font-family: 'Advent Pro', sans-serif;
    }
    .drop-shadow {
        -webkit-box-shadow: 0 0 5px 2px grey;
        box-shadow: 3px 3px 5px 3px #f5f5f5;
   
    }
    element.style {
    width: 300px;
}
      .error{
         font-color:red;
         }
         body {
    padding-top: 50px;
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
#gh{
   padding:5px;
    font-family: 'Advent Pro', Roberto,Medium-Italic;
   }
   #ff1{
      margin-right:1px;
     }
     #ff2{
       margin-right:30px;
       }
   #ff3{
      margin-right:12px;
      }
       
    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <script>
    $(document).ready(function(){
        $('[data-toggle="popover"]').popover(); 
    });
    </script>
    
    </script>
    
    <script type="text/javascript">
    
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
        	       
      $("#subject").select2({
                  
                });
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
            var sid = $('#branch').val();
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
        $("#branch").click(function() {  
            var sid = $('#branch').val();
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
        
        $("#bts").click(function() {  
          var yid=$("#year").val();
          var bid=$("#branch").val();
          var sid=$("#subject").val();
          var tid=$("#topic").val();
          $.ajax({    //create an ajax request to load_page.php
              type: "POST", 
              data: {
                     topic:tid,
                     year:yid,
                     bran:bid,
                     subject:sid,
                    },   
              url: "section7.php",         
              dataType: "html",   //expect html to be returned                
              success: function(response){                    
                  $("#ret").html(response); 
              }
            });   
          
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
     function subjectload()
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
         $sql="SELECT DISTINCT subject FROM subjects";
         $result=$conn->query($sql);
         $rows=$result->fetch_all(MYSQLI_ASSOC);
         $row="";
         foreach($rows as $row)
         {
            $output .='<option value="'.$row["subject"].'">'.$row["subject"].'</option>';
         }
        return $output;
     } 
   function notesload()
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
         $sql="SELECT * FROM `notes`ORDER BY time DESC";
         $result=$conn->query($sql);
         $rows=$result->fetch_all(MYSQLI_ASSOC);
         $row="";
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
    
<nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header" >
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
                
                <ul class="nav navbar-nav" style="margin:auto">
                    <li>
                        <div class="col-md-6 col-sm-6 col-sm-offset-2 col-xs-offset-1"  style="margin-top:10px;">
            <div class="input-group" id="adv-search" >
             <div class="t">
                <input type="text" class="form-control" placeholder="Search for topic" id="topic" value="">
                <div class="result"></div>
                </div>
                <div class="input-group-btn">
                    <div class="btn-group" role="group">
                        <div class="dropdown dropdown-lg">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                <form class="form-horizontal" role="form">
                                  <div class="form-group">
                                    <label for="filter">Filter by</label>
                                    <select class="form-control" placeholder="year" id="year" data-native-menu="false" value="">
                                        <option value="" >All years</option>
                                        <option value="I">I</option>
                                        <option value="II">II</option>
                                        <option value="III">III</option>
                                        <option value="IV">IV</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="contain">Branch</label>
                                    <select class="form-control" placeholder="year" id="branch" data-native-menu="false">
                                        <option value="">All branches</option>
                                        <?php echo load_branch();?>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="contain">Subject</label></br>
                                    <select class="form-control" placeholder="year" id="subject" style="width:100%">
                                       <option value="">ALL subjects</option>
                                         <?php echo subjectload();?>
                                    </select data-native-menu="false">
                                  </div>
                                 
                                </form>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="bts"><span class="glyphicon glyphicon-search" aria-hidden="true" ></span></button>
                        </form>
                    </div>
                </div>
            </div>
          </div>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#about">Feedback</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
</nav>
<div id="ret">
<?php notesload();?>
</div>


<br>

</body>
    