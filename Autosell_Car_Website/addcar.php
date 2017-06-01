<?php
	session_start();
	//connect to database
	require('dbconx.php');
	
	$regErr = $manErr = $modelErr = $yearErr = $typeErr = $doorsErr = $fuelErr = $emailErr = "";
	
	if(isset($_POST['addcar_btn']))
{	
	$registration = mysql_real_escape_string($_POST['registration']);
	$manufacture = mysql_real_escape_string($_POST['manufacture']);	
	$model = mysql_real_escape_string($_POST['model']);	
	$color = mysql_real_escape_string($_POST['color']);	
	$year = mysql_real_escape_string($_POST['year']);	
	$type = mysql_real_escape_string($_POST['type']);	
	$doors = mysql_real_escape_string($_POST['doors']);	
	$cc = mysql_real_escape_string($_POST['cc']);	
	$fuel = mysql_real_escape_string($_POST['fuel']);	
	$email = mysql_real_escape_string($_POST['email']);	
	$phone = mysql_real_escape_string($_POST['phone']);
	
	$errMsg = array();
	
	
	//Check that registration is input
	if (empty($_POST["registration"])) {
    $regErr = "Registration is required";
	$errMsg [] ="Registration is required";
  } else {	
	//Convert to upper case
	$registration = strtoupper("$registration");
	//Check registration number only contains alphanumeric characters
	if(!ctype_alnum($registration)){
	$errMsg [] = "Only numbers and letters are allowed, no spaces";
	}
  }
  //Check to ensure car registration dosen't already exist in database
 if($registration){
            $sql = "SELECT * FROM usedcars WHERE registration = '".$registration."'";
            $res = mysqli_query($db,$sql) or die(mysql_error());
            if(mysqli_num_rows($res) > 0){
                $errMsg[] = "The registration you supplied is already in the database!";
			}
        }
  //Check that manufacture is input
  if (empty($_POST["manufacture"])) {
    $manErr = "Manufacturer is required";
	$errMsg [] ="Manufacturer is required";
  } 
  //Check that model is input
  if (empty($_POST["model"])) {
    $modelErr = "Model is required";
	$errMsg [] ="Model is required";
  } 
	//Check that year is input
  if (empty($_POST["year"])) {
    $yearErr = "Year is required";
	$errMsg [] ="Year is required";
  } else {
    // check if year is between 1960 and 2017
    if ($year <= '1960' || $year >= '2017' ) {
      $errMsg []  = "Only years from 1960 - 2017 may be entered"; 
    }
  }
  //Check that type is input
  if (empty($_POST["type"])) {
    $typeErr = "Type is required";
	$errMsg [] ="Type is required";
  } 
  //Check that doors is input
  if (empty($_POST["doors"])) {
    $doorsErr = "Number of doors required";
	$errMsg [] ="Number of doors required";
  } else{
	  //Ensure minimum door number is 1 and max is 7
	  if($doors > '7' || $doors < '1'){
            $errMsg [] = "Number of doors must be between 1 and 7!";
        }}
  //Check that fuel is input
  if (empty($_POST["fuel"])) {
    $fuelErr = "Fuel is required";
	$errMsg [] ="Fuel is required";
  } 
  //Check that email is input
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
	$errMsg [] ="Email is required";
  } else {
    
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errMsg [] = "Invalid email format "; 
    }
  }
  //Check that email or phone is entered as required
  if(!$email && !$phone){
      $errMsg[] = "You must provide an email address or a phone number!";
        }
	
	//Check error messages in array, if yes, display errors
	if(count ($errMsg) > 0)
	foreach($errMsg AS $errors){
		$errors;
		$errorsOut = $errors . "<br>";	
		$_SESSION['errMessage']="<span style='color: red'> '". $errors."'<br>";
		$_SESSION['message']="<span style='color: red'> Errors found please try again"; 
		//Set the color of the error message/s to red
		echo "<div id='error_msg'>".$_SESSION['errMessage']."</div>";
		
    }
	//If no errors enter into database
    else
    {
		$sql = "INSERT INTO usedcars (registration, manufacturer, model, color, year, type, doors, cc, fuel, phone, email) VALUES('$registration', '$manufacture', '$model', '$color', '$year', '$type', '$doors', '$cc', '$fuel', '$phone', '$email')";
		
		$result = mysqli_query($db,$sql);
		  //If successfully entered display success message
		if($result){
		$_SESSION['message']="<span style='color: green'> Car Added Successfully"; 
		}
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

    <title>AutoSell - Add Car</title>

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
                            </li>
                            <li>
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
        <div class="row">
        		<div class="col-lg-12">
                <h1 class="page-header">Add Car 
                    
                </h1>
                
                <ol class="breadcrumb">
                <h3>
                
                <?php
				//Display session message, either success or failure as above
					if(isset($_SESSION['message']))
					{
							echo "<div id='error_msg'>".$_SESSION['message']."</div>";
							
							unset($_SESSION['message']);
							
					}
				?>
                </h3>
                </ol>
                
                </div>
                </div>
                <br>
                <p><span class="error">* Required fields</span></p>
                
                <form  method="post" action="addcar.php">
                
                <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-check"></i>Add Car Details</h4>
                    </div>
                    <div class="panel-body">
                	<table>
                    
                    	<tr>
                        	<td>Registration:</td>
                            <td><input type="text" name="registration" class="textInput">
                            	<span class="error">*</span><?php
								//Display error message
								 echo $regErr;?></span></td>
                        </tr>
                        
                        <tr>
                        	<td>Manufacturer: </td>
                        	<td><select name="manufacture">
                            		<option value ="" selected="selected">- Please Select -</option>
                                    <option value ="alfa">Alfa Romeo</option>
                                    <option value ="bmw">BMW</option>
                                    <option value ="citroen">Citroen</option>
                                    <option value ="fiat">Fiat</option>
                                    <option value ="ford">Ford</option>
                                    <option value ="honda">Honda</option>
                                    <option value ="hyundai">Hyundai</option>
                                    <option value ="kia">Kia</option>
                                    <option value ="mazda">Mazda</option>
                                    <option value ="merc">Mercedes Benz</option>
                                    <option value ="nissan">Nissan</option>
                                    <option value ="opel">Opel</option>
                                    <option value ="peugeot">Peugeot</option>
                                    <option value ="renault">Renault</option>
                                    <option value ="skoda">Skoda</option>
                                    <option value ="toyota">Toyota</option>
                                    <option value ="vw">VW</option>
                                    <option value ="volvo">Volvo</option>
                                    <option value ="other">Other</option>
                             	</select>
                                <span class="error">*<?php echo $manErr;?></span>
                            </td>
                        </tr> 
                        
                        <tr>
                        	<td>Model: </td>
                            <td><input type="text" name="model" class="textInput">
                            	<span class="error">*<?php echo $modelErr;?></span></td>
                        </tr>
                        
                        <tr>
                        	<td>Colour: </td>
                            <td><input type="text" name="color" class="textInput">
                            	</td>
                        </tr>
                        
                        <tr>
                        	<td>Year: </td>
                            <td><input type="number" name="year" class="textInput">
                            	<span class="error">*<?php echo $yearErr;?></span></td>
                        </tr></table>
                        </div></div></div>
                        <div class="col-md-4">
                <div class="panel panel-default">
                    
                    <div class="panel-body">
                        <table><tr>
                       		<td>Type: 
                            <span class="error">*<?php echo $typeErr;?></span></td>
                            </tr>
                            
                            <tr>
                            <td>&nbsp; &nbsp;&nbsp; &nbsp;Please Select</td>
                            <td><input type="radio" name="type"  value="" class="textInput" checked="checked"></td>
                        </tr>
                            
                            <tr>
                            <td>&nbsp; &nbsp;&nbsp; &nbsp;Saloon</td>
                            <td><input type="radio" name="type"  value="saloon" class="textInput"></td>
                        </tr>
                        <tr>
                            <td>&nbsp; &nbsp;&nbsp; &nbsp;Hatch/b</td>
                            <td><input type="radio" name="type"  value="hatchback" class="textInput"></td>
                        </tr>
                        <tr>
                            <td>&nbsp; &nbsp;&nbsp; &nbsp;Estate</td>
                            <td><input type="radio" name="type"  value="estate" class="textInput"></td>
                        </tr>
                        <tr>
                            <td>&nbsp; &nbsp;&nbsp; &nbsp;Coupe</td>
                            <td><input type="radio" name="type"  value="coupe" class="textInput"></td>
                        </tr>
                        <tr>
                            <td>&nbsp; &nbsp;&nbsp; &nbsp;7 Seater</td>
                            <td><input type="radio" name="type"  value="7seater" class="textInput"></td>
                        </tr>
                        
                        <tr>
                        	<td>No of doors: </td>
                            <td><input type="number" name="doors" class="textInput">
                            	<span class="error">*<?php echo $doorsErr;?></span></td>
                        </tr>
                        	<td>CC: </td>
                            <td><input type="text" name="cc" class="textInput"></td>
                        </tr></table>
                        </div></div></div>
                        <div class="col-md-4">
                <div class="panel panel-default">
                    
                    <div class="panel-body">
                        <table><tr>
                         <tr>
                       		<td>Fuel:
                            <span class="error">*<?php echo $fuelErr;?></span> </td>
                            </tr>
                            <tr>
                            <td>&nbsp; &nbsp;&nbsp; &nbsp;Please Select</td>
                            <td><input type="radio" name="fuel"  value="" class="textInput" checked="checked"></td>
                        </tr>
                            <tr>
                            <td>&nbsp; &nbsp;&nbsp; &nbsp;Petrol</td>
                            <td><input type="radio" name="fuel"  value="petrol" class="textInput"></td>
                        </tr>
                        <tr>
                            <td>&nbsp; &nbsp;&nbsp; &nbsp;Diesel</td>
                            <td><input type="radio" name="fuel"  value="diesel" class="textInput"></td>
                        </tr>
                        <tr>
                            <td>&nbsp; &nbsp;&nbsp; &nbsp;Electric</td>
                            <td><input type="radio" name="fuel"  value="electric" class="textInput"></td>
                        </tr>
                        <tr>
                            <td>&nbsp; &nbsp;&nbsp; &nbsp;Gas</td>
                            <td><input type="radio" name="fuel"  value="gas" class="textInput"></td>
                        </tr>
                        
                        <tr>
                        	<td>Email:</td>
                            <td><input type="text" name="email" class="textInput">
                            <span class="error">*<?php echo $emailErr;?></span></td>
                        </tr>
                        
                        <tr>
                        	<td>Phone:</td>
                            <td><input type="tel" name="phone" class="textInput"></td>
                        </tr>
                        
                        <tr>
                            <td><input type="submit" name="addcar_btn" value="Submit"></td>
                        </tr>
                          
                    </table>
                </div></div></div>
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
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
