<?php
	session_start();
	
	$db = mysqli_connect("localhost", "root", "", "authentication");
	
	if(isset($_POST['register_btn']))
	{
		$username = mysql_real_escape_string($_POST['username']);
		$email = mysql_real_escape_string($_POST['email']);
		$password = mysql_real_escape_string($_POST['password']);
		$password2 = mysql_real_escape_string($_POST['password2']);
		 
	
		if($password == $password2)
		{
			
			$sql = "INSERT INTO users(username, email, password) VALUES('$username', '$email', '$password')";
			mysqli_query($db, $sql);
			$_SESSION['message'] = "<span style='color: green'>Successful Registration - You can now login";
			
		
		}else{
			$_SESSION['message'] = "<span style='color: red'>The passwords do not match, please try again";
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

    <title>AutoSell - Register</title>

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
               
                <img src="images/logo.png" width="443" height="25" alt="AutoSell logo">
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
           
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    
   
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
         <div class="row">
        		<div class="col-lg-12">
                <h1 class="page-header">Register 
                    
                </h1>
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
                        <h4><i class="fa fa-fw fa-check"></i>Register your details</h4>
                    </div>
                    <div class="panel-body">
                <form method="post" action="register.php">
                
                	<table>
                    	<tr>
                        	<td>&nbsp; &nbsp;&nbsp; &nbsp;Username:</td>
                            <td><input type="text" name="username" class="textInput" required></td>
                        </tr>
                        <tr>
                        	<td>&nbsp; &nbsp;&nbsp; &nbsp;Email:</td>
                            <td><input type="email" name="email" class="textInput" required>
                            </td>
                        </tr>
                        <tr>
                        	<td>&nbsp; &nbsp;&nbsp; &nbsp;Password:</td>
                            <td><input type="password" name="password" class="textInput" required>
                            </td>
                        </tr>
                        <tr>
                        	<td>&nbsp; &nbsp;&nbsp; &nbsp;Repeat Password:</td>
                            <td><input type="password" name="password2" class="textInput" required>
                           </td>
                        </tr>
                        
                        <tr>
                        	<td></td>
                            <td><input type="submit" name="register_btn" value="Register"></td>
                        </tr>
                        
                        <tr>
                        <td></td>
                        <td>
                        <input type="button" value="Close this window" onclick="self.close()">
                        </td>
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
