<?php 

if ($_POST) {
	session_start();
	
	$connection = mysqli_connect("localhost", "root", "", "new5") or die("Connection Error ".mysqli_error($connection));
	
	
	if (isset($_POST['register'])) { 
		// get data entered by the user
        $phone = strip_tags($_POST['Phone']);
		$message = strip_tags($_POST['Message']);
		
	if(empty($phone)){
		$error = "Phone number must not be empty!";
		} elseif(empty($message)){
			$error = "message must not empty!";
			echo "phone and message must not empty!";
		}  else {
			$sql = "INSERT INTO tbl_freesms(phone, message) 
						VALUES ('$phone','$message')";
				$result = $connection->query($sql) or die(mysqli_error($connection));
			
				$_SESSION['sms'] = "Receiver number: +2519 $phone <br> Your Message:  $message";
						
				header("location: welcome.php");
				}
				}
				}
		
?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-Language" content="en" />
	
	<link rel="stylesheet" type="text/css" href="style.css" />	
	<html xmlns="http://www.w3.org/1999/xhtml">


    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="css/stgyle.css" type="text/css"/>
	<title>MistrawiSMS</title>
</head>
<body>

<?php include_once('header.php'); ?>




<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
           

<div class="container">
 <div class="panel panel-primary">   <h3 class="text-center">Welcome to MistrawiSMS</h3> </div>
    <div class="row">
        <div class="col-lg-12" id="accounts">
            <div class="panel panel-primary">
                <div class="panel-heading">MistrawiSMS</div>
                <div class="panel-body">
                 
                   
		    
		    		    
		    <form method="post" action="index.php">
		    <center>
			    <table>
			    	<tr>
				        <td><label> Receiver Phone Number +251</label></td>
			            <td><input type="number" required name="Phone" style="border:2px solid blue;" placeholder="Receiver phone number" required></td>
			        </tr>
			        <br>
			    	
		  <tr>
		  <td scope="col"><label>Your Message</label></td>
         <td>
         <textarea name="Message" id="textarea" style="border:2px solid blue;" placeholder="Your Message"></textarea required>
         </td>
          </tr>
          
			     
			        <tr>
			            <td></td>
			            <td align="right"><input type="submit" class="button" name="register" value="Send"></td>
			        </tr>
			  
			    </table>
			</center>
		    </form>
		      <tr>
			            
			     <td align="left"> Have you completed the payment ?      <a href="payment" type="submit" class="button" >Yes</a>  <a href="payment/register.php" type="submit" class="button" >No</a></td>
			        </tr>
		</div>
	</div>

	<div class="clearfix"></div>
                   
                </div>
            </div>
        </div>
    </div>
</div>

      <h4 align="center">Copywrite &copy; tito</h4>
</body>
</html>
