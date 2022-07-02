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
 $middle_name=$_POST['middle_name'];
 $last_name=$_POST['last_name'];
 $dob=$_POST['dob'];
 $spouse_first_name=$_POST['spouse_first_name'];
 $spouse_middle_name=$_POST['spouse_middle_name'];
 $spouse_last_name=$_POST['spouse_last_name'];
 $spouse_dob=$_POST['spouse_dob']; 
 $address=$_POST['address']; 
 $phone_number=$_POST['phone_number']; 
 $number_of_children=$_POST['number_of_children']; 
 $emergency_contact=$_POST['emergency_contact']; 
 $password=MD5($_POST['password']); 
 $image = $_FILES['image']['name'];
 $image = $phone_number.'.png';
 move_uploaded_file($_FILES['image']['tmp_name'], 'images/'.$image);
$sql="INSERT INTO  members(first_name,middle_name,last_name,dob,spouse_first_name,spouse_middle_name,spouse_last_name,spouse_dob,address,phone_number,number_of_children,emergency_contact,password,photo)
VALUES(:first_name,:middle_name,:last_name,:dob,:spouse_first_name,:spouse_middle_name,:spouse_last_name,:spouse_dob,:address,:phone_number,:number_of_children,:emergency_contact,:password,:photo)";
$query = $dbh->prepare($sql);
$query->bindParam(':first_name',$first_name,PDO::PARAM_STR);
$query->bindParam(':middle_name',$middle_name,PDO::PARAM_STR);
$query->bindParam(':last_name',$last_name,PDO::PARAM_STR);
$query->bindParam(':dob',$dob,PDO::PARAM_STR);
$query->bindParam(':spouse_first_name',$spouse_first_name,PDO::PARAM_STR);
$query->bindParam(':spouse_middle_name',$spouse_middle_name,PDO::PARAM_STR);
$query->bindParam(':spouse_last_name',$spouse_last_name,PDO::PARAM_STR);
$query->bindParam(':spouse_dob',$spouse_dob,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':phone_number',$phone_number,PDO::PARAM_STR);
$query->bindParam(':number_of_children',$number_of_children,PDO::PARAM_STR);
$query->bindParam(':emergency_contact',$emergency_contact,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->bindParam(':photo',$image,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Member info added successfully";
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
<h2 class="title">Member Admission</h2>

</div>

<!-- /.col-md-6 text-right -->
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
                                                    <h5>Add admin info</h5>
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
<form class="" action="#" method="post" enctype="multipart/form-data">
<div class="form-group has-success">
<label for="default" class="control-label">first_name</label>
<div class="">
<input type="text" name="first_name" class="form-control" id="first_name" required="required" autocomplete="off">
</div>
</div>

<div class="form-group has-success">
<label for="default" class="control-label">middle_name</label>
<div class="">
<input type="text" name="middle_name" class="form-control" id="middle_name" required="required" autocomplete="off">
</div>
</div>

<div class="form-group has-success">
<label for="default" class="control-label">last_name</label>
<div class="">
<input type="text" name="last_name" class="form-control" id="last_name" required="required" autocomplete="off">
</div>
</div>

<div class="form-group has-success">
    <label for="default" class="control-label">dob</label>
    <div class="">
    <input type="date" name="dob" class="form-control" id="dob" required="required" autocomplete="off">
    </div>
</div>

<div class="form-group has-success">
<label for="default" class="control-label">spouse_first_name</label>
<div class="">
<input type="text" name="spouse_first_name" class="form-control" id="spouse_first_name" required="required" autocomplete="off">
</div>
</div>

<div class="form-group has-success">
<label for="default" class="control-label">spouse_middle_name</label>
<div class="">
<input type="text" name="spouse_middle_name" class="form-control" id="spouse_middle_name"  required="required" autocomplete="off">
</div>
</div>

<div class="form-group has-success">
<label for="default" class="control-label">spouse_last_name</label>
<div class="">
<input type="text" name="spouse_last_name" class="form-control" id="spouse_last_name" required="required" autocomplete="off">
</div>
</div>

<div class="form-group has-success">
<label for="default" class="control-label">spouse_dob</label>
<div class="">
<input type="date" name="spouse_dob" class="form-control" id="spouse_dob" required="required" autocomplete="off">
</div>
</div>


<div class="form-group has-success">
        <label for="address" class="control-label">address</label>
        <div class="">
            <input type="text"  name="address" class="form-control" id="date">
        </div>
    </div>

    <div class="form-group has-success">
<label for="phone_number" class="control-label">phone_number</label>
<div class="">
<input type="number" name="phone_number" class="form-control" id="phone_number" required="required" autocomplete="off">
</div>
</div>

<div class="form-group has-success">
<label for="number_of_children" class="control-label">number_of_children</label>
<div class="">
<input type="number" name="number_of_children" class="form-control" id="number_of_children" maxlength="15" required="required" autocomplete="off">
</div>
</div>

<div class="form-group has-success">
<label for="emergency_contact" class="control-label">emergency_contact</label>
<div class="">
<input type="text" name="emergency_contact" class="form-control" id="emergency_contact" required="required" autocomplete="off">
</div>
</div>

<div class="form-group has-success">
    <label for="password" class="control-label">password</label>
    <div class="">
        <input type="text" name="password" class="form-control" id="password" required="required" autocomplete="off">
    </div>
</div>

<div class="form-group has-success">
    <label for="password" class="control-label">Picture</label>
    <div class="">
        <input type="file" name="image" class="form-control" id="image" required="required" autocomplete="off">
    </div>
</div>
    
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
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
