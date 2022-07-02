<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if(strlen($_SESSION['alogin'])=="")
{   
header("Location: index.php"); 
}

if(isset($_POST['submit']))
{
 $first_name=$_POST['first_name'];
 $last_name=$_POST['last_name'];
 $phone_number=$_POST['phone_number']; 
 $email=$_POST['email'];
 $password = $_POST['password'];
$sql="INSERT INTO  admin(first_name,last_name,phone_number,email,password) VALUES(:first_name,:last_name,:phone_number,:email,:password)";
$query = $dbh->prepare($sql);
$query->bindParam(':first_name',$first_name,PDO::PARAM_STR);
$query->bindParam(':last_name',$last_name,PDO::PARAM_STR);
$query->bindParam(':phone_number',$phone_number,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);

$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Admin info added successfully";
}
else 
{
$error="Something went wrong. Please try again";
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include('includes/head.php'); ?>
</head>
<body class="top-navbar-fixed">
<div class="main-wrapper">

<!-- ========== TOP NAVBAR ========== -->
<?php include('includes/topbar.php');?> 
<!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
<div class="content-wrapper">
<div class="content-container">

<!-- ========== LEFT SIDEBAR ========== -->
<?php include('includes/leftbar.php');?>  
<!-- /.left-sidebar -->

<div class="main-page">
<div class="container-fluid">
    <div class="row page-title-div">
        <div class="col-md-6">
            <h2 class="title">Update admin</h2>
        </div>
        
    </div>
<!-- /.row -->
<div class="row breadcrumb-div">
<div class="col-md-6">
<ul class="breadcrumb">
    <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Member Admission</li>
</ul>
</div>
</div>
<!-- /.row -->
</div>
                        <section class="section">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Update admin info</h5>
                                                </div>
                                            </div>
                                        <div class="panel-body">
<?php if($msg){?>
<div class="alert alert-success left-icon-alert" role="alert">
<strong>Well done!</strong><?php echo htmlentities($msg); ?>
</div><?php } 
else if($error){?>
<div class="alert alert-danger left-icon-alert" role="alert">
        <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
    </div>
    <?php } ?>
<form class="" action="#" method="post">
    <div class="form-group has-success">
        <label for="success" class="control-label">first_name</label>
        <div class="">
            <input type="text" name="first_name" class="form-control" id="first_name" required="required" autocomplete="off">
        </div>
    </div>

<div class="form-group has-success">
    <label for="success" class="control-label">last_name</label>
    <div class="">
        <input type="text" name="last_name" class="form-control" id="last_name" required="required" autocomplete="off">
    </div>
</div>

<div class="form-group has-success">
<label for="success" class="control-label">Phone</label>
<div class="">
<input type="text" name="phone_number" class="form-control" id="phone_number" required="required" autocomplete="off">
</div>
</div>

<div class="form-group has-success">
    <label for="success" class="control-label">Email</label>
    <div class="">
        <input type="email" name="email" class="form-control" id="email" required="required" autocomplete="off">
    </div>
</div>
<div class="form-group has-success">
    <label for="success" class="control-label">Password</label>
    <div class="">
        <input type="password" name="password" class="form-control" id="password" required="required" autocomplete="off">
    </div>
</div>

<div class="form-group">
        <div class="text-center">
            <button type="submit" name="submit" class="btn btn-primary">Add</button>
        </div>
    </div>
</form>
        </div>
    </div>
</div>
<!-- /.col-md-12 -->
</div>
</div>
</section>
</div>
</div>
</div>
<!-- /.content-container -->
</div>
<!-- /.content-wrapper -->
</div>
<?php include('includes/footer.php'); ?>
</body>
</html>
