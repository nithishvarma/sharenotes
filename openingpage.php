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
    #gog{
      color:red;
      }
      
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

    <div class="intro-header">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1>SHARE THE NOTES</h1>
                         <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">
                        <?php 
                          if(empty($_SESSION["username"]))
                          {
                            echo '
                            <li>
                                <a href="t.php" class="btn  btn-md btn-link" style="font-size:x-large">Upload</a>
                            </li>
                            ';
                          }
                          else{
                          echo '
                            <li>
                                <a href="uploadingpage.php" class="btn btn-link btn-md" style="font-size:x-large">Upload</a>
                            </li>';
                          }
                              ?>
                              <li>
                                <a href="di.php" class="btn btn-link btn-md" style="font-size:x-large">Download</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->
    <!-- /.intro-header -->
    <!-- /.intro-header -->
    <!-- Page Content -->
    <div style="background-color:azure">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h1 class="section-heading">For teachers</h1>
                    <p class="lead"> </p>

                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="" alt="">
                                
                </div>
            </div>
        </div>
        <!-- /.container -->
    </div>

    <div class="content-section-a">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-6 ">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Download section </h2>
                    <p class="lead">
                        Here you can download you required notes<br />
                        Go to download link and have your notes
                    </p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="https://marketplace.canva.com/MACH9sfAmr0/1/thumbnail_large/canva-book-download-related-icons-image-MACH9sfAmr0.png" alt="">
                </div>
            </div>

        </div>
    </div>
    <!-- /.container -->
    </div>
    <!-- /.content-section-a -->

    <div class="content-section-b" style="background-color:	#F0FFF0">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Upload section</h2>
                    <p class="lead"> Upload to notes to help your friends <br />Login to upload to your notes</p>
                </div>
                <div class="col-lg-5 col-sm-pull-6  col-sm-6">
                    <img class="img-responsive" src="https://thumbs.dreamstime.com/z/moving-documents-19346709.jpg" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-b -->
    <!-- /.content-section-a -->


    <a name="contact"></a>
    <div class="banner img-responsive">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <h2>Connect with us:</h2>
                </div>
                <div class="col-lg-5">
                    <ul>
                        <li>
                            <a href="https://www.facebook.com/tuttor.co/" class="fa fa-2x fa-facebook-official social_icons" aria-hidden="true" id="fac"></a>
                            <a href="https://twitter.com/" class="fa fa-3x fa-twitter social_icons" aria-hidden="true"></a>
                            <a href="https://www.linkedin.com/" class="fa fa-3x fa-linkedin-square social_icons" aria-hidden="true"></a>
                            <a href="https://plus.google.com/" class="fa fa-3x fa-google-plus social_icons" aria-hidden="true" id="gog"></a>
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