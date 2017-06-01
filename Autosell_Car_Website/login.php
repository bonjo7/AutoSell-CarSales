<?php
session_start();
//connect to database
$db=mysqli_connect("localhost","root","","authentication");
if(isset($_POST['login_btn']))
{
    $username=mysql_real_escape_string($_POST['username']);
    $password=mysql_real_escape_string($_POST['password']);
    $sql=" SELECT * FROM users WHERE username='$username' AND password='$password' ";
    $result=mysqli_query($db,$sql);
    if(mysqli_num_rows($result) == 1)
    {
        $_SESSION['message']="<span style='color: green'> You are now Loggged In";
		header("location: addcar.php");
    }
   else
   {
        $_SESSION['message']="<span style='color: red'>Username and Password combiation incorrect";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AutoSell - Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

     <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><img src="images/logo.png" width="443" height="25" alt="AutoSell logo"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                
                <li>
                        <a href="allcars.html">All Cars</a>
                    </li>
                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Car Make <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="allcars.html">Alfa Romeo (0)</a>
                            </li>
                            <li>
                                <a href="bmw.html">BMW (1)</a>
                            </li>
                            <li>
                                <a href="allcars.html">Citroen (0)</a>
                            </li>
                            <li>
                                <a href="allcars.html">Fiat (0)</a>
                            </li>
                            <li>
                                <a href="ford.html">Ford (2)</a>
                            </li>
                            <li>
                                <a href="allcars.html">Honda (0)</a>
                            </li>
                            <li>
                                <a href="allcars.html">Hyundai (0)</a>
                            </li>
                            <li>
                                <a href="allcars.html">Kia (0)</a>
                            </li>
                            <li>
                                <a href="mazda.html">Mazda (1)</a>
                            </li>
                            <li>
                                <a href="allcars.html">Mercedes Benz (0)</a>
                            </li>
                            
                            <li>
                                <a href="nissan.html">Nissan (2)</a>
                            </li>
                            <li>
                                <a href="opel.html">Opel (3)</a>
                            </li>
                            <li>
                                <a href="peugeot.html">Peugeot (1)</a>
                            </li>
                            <li>
                                <a href="renault.html">Renault (1)</a>
                            </li>
                            <li>
                                <a href="allcars.html">Skoda (0)</a>
                            </li>
                            
                           <li>
                                <a href="toyota.html">Toyota (4)</a>
                          </li>
                            <li>
                                <a href="vw.html">VW (1)</a>
                            </li>
                            <li>
                                <a href="allcars.html">Volvo (0)</a>
                            </li>
                            <li>
                                <a href="allcars.html">Other</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sell<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="login.php">Login</a>
                            </li><li>
                                <a href="register.php" onclick="window.open(this.href, 'mywin',
'left=20,top=20,width=500,height=550,toolbar=1,resizable=0'); return false;" >Register</a>
                            </li>
                            
                      </ul>
                  </li>
                    <li>
                        <a href="contact.html">Contact</a>
                    </li>
                   
                    </li>
              </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    
   
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
         <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Login
                    
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    
                    <li class="active">Login</li>
                </ol>
               
            </div>
        </div>
        <!-- /.row -->
                <div class="row">
                <div class="col-lg-12">
                
                <ol class="breadcrumb">
                <h3>
                <?php
					if(isset($_SESSION['message']))
					{
							echo "<div id='error_msg'>".$_SESSION['message']."</div>";
							unset($_SESSION['message']);
					}
				?>
                </h3>
                </ol>
                </div>
                <br>
                 <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-check"></i>Enter your details</h4>
                    </div>
                    <div class="panel-body">
                <form method="post" action="login.php">
                
                	<table>
                    	<tr>
                        	<td>Username:</td>
                            <td><input type="text" name="username" class="textInput"></td>
                        </tr>
                        
                        <tr>
                        	<td>Password:</td>
                            <td><input type="password" name="password" class="textInput"></td>
                        </tr>
                        
                        
                        <tr>
                        	<td></td>
                            <td><input type="submit" name="login_btn" value="Login"></td>
                        </tr>
                    </table>
                
                </form>
                </div></div></div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; AutoSell 2017</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
