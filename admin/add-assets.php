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
 $name=$_POST['name'];
 $code=$_POST['code'];
 $description=$_POST['description']; 
 $unit_price=$_POST['unit_price'];
 $quantity = $_POST['quantity'];
 $date_added=$_POST['date_added'];
 $last_updated=$_POST['last_updated'];

$sql="INSERT INTO  assets(name,code,description,unit_price,quantity,date_added,last_updated) VALUES(:name,:code,:description,:unit_price,:quantity,:date_added,:last_updated)";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':code',$code,PDO::PARAM_STR);
$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->bindParam(':unit_price',$unit_price,PDO::PARAM_STR);
$query->bindParam(':quantity',$quantity,PDO::PARAM_STR);
$query->bindParam(':date_added',$date_added,PDO::PARAM_STR);
$query->bindParam(':last_updated',$last_updated,PDO::PARAM_STR);

$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Assets added successfully";
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
    <li class="active">Asset Registration</li>
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
                                                    <h5>Update asset info</h5>
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
        <label for="success" class="control-label">Name</label>
        <div class="">
            <input type="text" name="name" class="form-control" id="name" required="required" autocomplete="off">
        </div>
    </div>

<div class="form-group has-success">
    <label for="success" class="control-label">Code</label>
    <div class="">
        <input type="text" name="code" class="form-control" id="code" required="required" autocomplete="off">
    </div>
</div>

<div class="form-group has-success">
<label for="success" class="control-label">Description</label>
<div class="">
<input type="text" name="description" class="form-control" id="description" required="required" autocomplete="off">
</div>
</div>

<div class="form-group has-success">
    <label for="success" class="control-label">Unit_price</label>
    <div class="">
        <input type="number" name="unit_price" class="form-control" id="unit_price" required="required" autocomplete="off">
    </div>
</div>
<div class="form-group has-success">
    <label for="success" class="control-label">Quantity</label>
    <div class="">
        <input type="number" name="quantity" class="form-control" id="quantity" required="required" autocomplete="off">
    </div>
</div>
<div class="form-group has-success">
    <label for="success" class="control-label">Date added</label>
    <div class="">
        <input type="date" name="date_added" class="form-control" id="date_added" required="required" autocomplete="off">
    </div>
</div>
<div class="form-group has-success">
    <label for="success" class="control-label">Last updated</label>
    <div class="">
        <input type="date" name="last_updated" class="form-control" id="last_updated" required="required" autocomplete="off">
    </div>
</div>

<div class="form-group">
        <div class="text-center">
            <button type="submit" name="submit" class="btn btn-primary">Add</button>
            <button type="submit" name="submit" class="btn btn-primary"><a href="manage-assets.php">Back</a></button>
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
