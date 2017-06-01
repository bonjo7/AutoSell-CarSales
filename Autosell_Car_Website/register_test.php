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
			$password = md5($password);
			$sql = "INSERT INTO users(username, email, password) VALUES('$username', '$email', '$password')";
			mysqli_query($db, $sql);
			$_SESSION['message'] = "Successful Registration";
			$_SESSION['username'] = $username;
		
		}else{
			$_SESSION['message'] = "The passwords do not match, please try again";
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
    <link href="file:///C|/Users/bonjo1983/Desktop/BernardThompson_JohnWalsh_CA1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="file:///C|/Users/bonjo1983/Desktop/BernardThompson_JohnWalsh_CA1/css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="file:///C|/Users/bonjo1983/Desktop/BernardThompson_JohnWalsh_CA1/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
   
    
   
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Register
                    <small>Fill in your details</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="file:///C|/Users/bonjo1983/Desktop/BernardThompson_JohnWalsh_CA1/index.html">Home</a>
                    </li>
                    
                    <li class="active">Register</li>
                </ol>
               
            </div>
        </div>
        <!-- /.row -->

        <!-- Intro Content -->
        <div class="row">
            
                <h2>Please provide your details</h2>
                <br>
                <h4>
                
                <?php
					if(isset($_SESSION['message']))
					{
							echo "<div id='error_msg'>".$_SESSION['message']."</div>";
							unset($_SESSION['message']);
					}
				?>
                </h4>
                <br>
                
                <form method="post" action="file:///C|/Users/bonjo1983/Desktop/BernardThompson_JohnWalsh_CA1/register.php">
                
                	<table>
                    	<tr>
                        	<td>Username:</td>
                            <td><input type="text" name="username" class="textInput"></td>
                        </tr>
                        <tr>
                        	<td>Email:</td>
                            <td><input type="email" name="email" class="textInput"></td>
                        </tr>
                        <tr>
                        	<td>Password:</td>
                            <td><input type="password" name="password" class="textInput"></td>
                        </tr>
                        <tr>
                        	<td>Repeat Password:</td>
                            <td><input type="password" name="password2" class="textInput"></td>
                        </tr>
                        
                        <tr>
                        	<td></td>
                            <td><input type="submit" name="register_btn" value="Register"></td>
                        </tr>
                    </table>
                
                </form>
                
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
    <script src="file:///C|/Users/bonjo1983/Desktop/BernardThompson_JohnWalsh_CA1/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="file:///C|/Users/bonjo1983/Desktop/BernardThompson_JohnWalsh_CA1/js/bootstrap.min.js"></script>

</body>

</html>
