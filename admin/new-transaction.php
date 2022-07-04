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
 $admin_id = $_SESSION['alogin'];
 $item_name = $_POST['assets'];
 $type = $_POST['type'];
 $quantity = $_POST['quantity'];
 $unit_price = $_POST['unit_price'];
 $description = $_POST['description'];
 $total_price = $unit_price*$quantity;
 $customer_full_name = $_POST['customer_full_name'];
 $customer_phone_number = $_POST['customer_phone_number'];
 $last_updated = $_POST['last_updated'];
$sql="INSERT INTO transactions(admin_id,item_name,type,quantity,unit_price,description,total_price,
customer_full_name,customer_phone_number,last_updated) VALUES('$admin_id', '$item_name','$type', '$quantity','$unit_price', '$description','$total_price', '$customer_full_name','$customer_phone_number', '$last_updated')";
$query = $dbh->prepare($sql);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Role added successfully";
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
            <h2 class="title">transaction</h2>
        </div>
        
    </div>
<!-- /.row -->
<div class="row breadcrumb-div">
<div class="col-md-6">
<ul class="breadcrumb">
    <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
    <li class="active">New transaction</li>
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
                                                    <h5>New transaction</h5>
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
        <label for="fullname" class="control-label">Full Name</label>
        <div class="">
            <input type="text" name="customer_full_name" class="form-control" id="fullname" required="required" autocomplete="off">
        </div>
    </div>
    <div class="form-group has-success">
        <label for="phone" class="control-label">Phone Number</label>
        <div class="">
            <input type="number" name="customer_phone_number" class="form-control" id="phone" required="required" autocomplete="off">
        </div>
    </div>
    <div class="form-group has-success">
        <label for="description" class="control-label">Description</label>
        <div class="">
            <input type="text" name="description" class="form-control" id="description" required="required" autocomplete="off">
        </div>
    </div>
<div class="form-group has-success">
        <label for="assets" class="control-label">Assets</label>
        <div class="">
        <select name="assets" id="assets" class="form-control">
        <?php $sql = "SELECT * from assets";
                $query = $dbh->prepare($sql);
                $query->execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                $cnt=1;
                $id=$row['id'];
                if($query->rowCount() > 0)
                {
                foreach($results as $result)
                {   ?>
                <option value="<?php echo $result->id ?>"><?php echo $result->name ?></option>
                    <?php }}?>
            </select>
        </div>
    </div>

    <div class="form-group has-success">
        <label for="assets" class="control-label">Type</label>
        <div class="">
        <select name="type" id="type" class="form-control">
                <option value="rent">Rent</option>
                <option value="other">Other</option>
               
            </select>
        </div>
    </div>
    
    <div class="form-group has-success">
        <label for="quantity" class="control-label">Quntity</label>
        <div class="">
            <input type="number" name="quantity" class="form-control" id="quantity" required="required" autocomplete="off">
        </div>
    </div>
    <div class="form-group has-success">
        <label for="price" class="control-label">unit Price</label>
        <div class="">
            <input type="number" name="unit_price" class="form-control" id="price" required="required" autocomplete="off">
        </div>
    </div>
    <div class="form-group has-success">
        <label for="return" class="control-label">Return Date</label>
        <div class="">
            <input type="date" name="last_updated" class="form-control" id="return" required="required" autocomplete="off">
        </div>
    </div>

<div class="form-group">
        <div class="text-center">
            <button type="submit" name="submit" class="btn btn-primary">Add</button>
            <button class="btn btn-primary"><a href="manage-candidate.php">Back</a></button>
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
